<?php

/**
 * PaymentMethodTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PaymentMethodTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object PaymentMethodTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PaymentMethod');
    }

    public function getPaymentMethodProvider($id)
    {
        return $query=self::getInstance()->createQuery("a")->leftJoin("a.Provider p")->where("p.id=?",$id);
    }
}