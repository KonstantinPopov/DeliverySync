<?php
namespace Nitra\SyncronizeBundle\Services;

use Doctrine\Common\Cache\ApcCache;

/**
 * APC NitraSyncronizeApc
 */
class NitraSyncronizeApc extends ApcCache
{
    
    /**
     * Сохранить в кеше
     * @param string $key to get
     * @param bool $success of get operation
     * @param null $default data or function with data return if not in cache
     * @return mixed|null
     */
    public static function apcFetch($key, &$success, $default = null)
    {
        $has = null;
        $value = apc_fetch($key, $has);
        if (null !== $has) {
            $success = $has;
        } else {
            $success = $value !== false;
        }
        return $has ? $value : ($default instanceof \Closure ? $default() : $default);
    }
    
    /**
     * Сохранить $data в APC под значением $key
     * @param string $key to set
     * @param mixed $data to set
     * @param null $lifetime - lifetime in seconds
     * @param null $ns store key to namespace
     * @return bool success of storing
     */
    public static function apcStore($key, $data, $lifetime = null, $ns = null) 
    {
        if ($ns !== null) {
            $names = self::apcFetch('namespace_' . $ns, $has, array());
            $names[$key] = $key;
            self::apcStore('namespace_' . $ns, $names);
        }
        
        return apc_store($key, $data, $lifetime);

  }    
    
}
