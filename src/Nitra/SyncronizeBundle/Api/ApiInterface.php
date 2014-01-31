<?php
namespace Nitra\SyncronizeBundle\Api;

/**
 * ApiInterface
 */
interface ApiInterface
{
    
//    /**
//     * Конструктор
//     */
//    abstract public function __construct(EntityManager $em, Request $request);
    
    /**
     * вернуть флаг валидации API
     */
    abstract public function isValid();
    
    /**
     * валидировать API
     * @return string - текст сообщения об ошибке 
     * @return false  - валидация пройдена успешно
     */
    abstract public function validateApi();
    
    /**
     * выполнить API
     */
    abstract public function processApi();
    
}