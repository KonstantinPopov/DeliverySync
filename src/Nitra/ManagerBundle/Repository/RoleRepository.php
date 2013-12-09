<?php
namespace Nitra\ManagerBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * RoleRepository
 */
class RoleRepository extends EntityRepository
{
    /**
     * возвращает список ролей для формы групп
     * @return type список ролей
     */
    public function getRolesToChoice()
    {
        $result = $this->createQueryBuilder('r')
                        ->select('r.name, r.description')
                        ->orderBy('r.description')
                        ->getQuery()
                        ->getArrayResult();
        $roles = array();
        foreach ($result as $role)
        {
            $roles[$role['name']] = $role['description'];
        }
        
        // вернуть массив ролей-привелегий
        return $roles;
    }
}
