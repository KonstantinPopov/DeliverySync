<?php

namespace  Nitra\DeliveryBundle\LoaderDeliveryPeriod;

use Nitra\DeliveryBundle\Entity\DeliveryService as DeliveryService;


interface iLoaderDeliveryPeriod
{
        /**
         * Устанавливает entity manager для класса
         */
        public function setEntityManager($em);
        
        /**
         * Устанавливает дату отправки необходима в запросе к api
         */
        public function setStartDate($startDate);
        
        /**
         * Устанавливает службу доставки
         */
        public function setDeliveryService(DeliveryService $ds);
        
        /**
         * выполняет загрузку сроков доставки
         */
        public function loadDeliveryPeriod();
        
}