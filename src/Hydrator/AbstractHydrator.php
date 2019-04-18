<?php

namespace ChatApi\Hydrator;

use ChatApi\Entity\AbstractEntity;

/**
 * AbstractHydrator class base hydrator for all hyderators which responsible for mapping received json from chat-api
 * based on a specific map
 * @package ChatApi/Hydrator
 * @author Mohamed Faesal <mohamed.feasal@gmail.com>
 **/
abstract class AbstractHydrator
{
    /**
     * hydrate response and map it to entity
     * @param $row array response message
     * @return AbstractEntity
     */
    public function hydrate(array $row) : AbstractEntity
    {
        $entityMap = $this->getEntityMap();
        $entity    = $this->getEntity();
        foreach ($row as $key => $value) {
            if (isset($entityMap[$key])) {
                $propertyName = $entityMap[$key];
                if (property_exists($entity, $propertyName)) {
                    $entity->{$propertyName} = $value;
                }
            }
        }
        return $entity;
    }

    /**
     * return a key and value array which will be mapped to a specific property in entity
     * @return array
     */
    abstract protected function getEntityMap() : array;

    /**
     * return an entity instance which will be filled with data based on entity map
     * @return AbstractEntity
     */
    abstract protected function getEntity() : AbstractEntity;
}
