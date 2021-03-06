<?php

/**
 * ShippingModeTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ShippingModeTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ShippingModeTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ShippingMode');
    }

    public function getShippingModeProvider($id)
    {
        return $query=self::getInstance()->createQuery("a")->leftJoin("a.Provider p")->where("p.id=?",$id);
    }
}