<?php

/**
 * ConsumerGroup
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    grupos_consumo
 * @subpackage model
 * @author     info@diphda.net
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ConsumerGroup extends BaseConsumerGroup
{
    public function getClass()
    {
        return "ConsumerGroup";
    }

    public function getTotalMembers()
    {
        $query=Doctrine::getTable("Consumer")->createQuery()->where("consumer_group_id=?",$this->id)->andWhere("consumer_state_id=2")->execute();

        return count($query);
    }

    public function getJoinRequestPending()
    {
        $query=Doctrine::getTable("Consumer")->createQuery()->where("consumer_group_id=?",$this->id)->andWhere("consumer_state_id=4")->execute();
         
        return $query->count();
    }

    public function hasJoinRequestPending()
    {
        $query=Doctrine::getTable("Consumer")->createQuery()->where("consumer_group_id=?",$this->id)->andWhere("consumer_state_id=4")->execute();
         
        if ($query->count()){
            return true;
        }

        return false;
    }

    public function isNear($city)
    {
        $real_distance=$this->getCityDistance($city);
        if ($this->distance>=$real_distance)
        {
            return true;
        }
         
        return false;
    }

    public function getCityDistance($city)
    {
        /*
         * Esto lo he sacado de aquí, es la fórmula de Haversine para el cálculo de distancias.
        * http://www.tufuncion.com/distancia-coordenadas
        */

        $latitudeAbs=deg2rad($this->City->latitude-$city->latitude);
        $longitudeAbs=deg2rad($this->City->longitude-$city->longitude);
        $alfa=pow(sin($latitudeAbs/2),2)+cos(deg2rad($this->City->latitude))*cos(deg2rad($city->latitude))*pow(sin($longitudeAbs/2),2);
        $c=2*atan2(sqrt($alfa),sqrt(1-$alfa));
        return $distance=6378*$c;
    }

    public function getEmailAddress()
    {
        if ($this->email)
        {
            return $this->email;
        }

        return $this->Consumer->email;
    }

    public function getAceptedProviders($limit=null)
    {
        $query=Doctrine::getTable("Provider")->createQuery("l")
        ->leftJoin("l.AceptedProviderConsumerGroup s")
        ->where("consumer_group_id=?",$this->id)
        ->andWhere("acepted_provider_state_id=?",1)
        ->andWhere("provider_state_id=?",1);

        if ($limit)
        {
            $query->orderBy("s.created_at desc")->limit($limit);
        }

        return $query->execute();
    }


    public function hasAcceptedProviders()
    {
        $query=Doctrine::getTable("Provider")->createQuery("l")
        ->leftJoin("l.AceptedProviderConsumerGroup s")
        ->where("consumer_group_id=?",$this->id)
        ->andWhere("acepted_provider_state_id=?",1);

        if ($query->count()){
            return true;
        }

        return false;
    }

    public function getOpenOrders()
    {
        return $query=Doctrine::getTable("Orders")->createQuery()
        ->where("consumer_group_id=?",$this->id)
        ->andWhere("date_in <=?",date("Y-m-d"))
        ->andWhere("date_out >=?",date("Y-m-d"))
        ->andWhere("order_state_id=?",1)
        ->execute();

    }

    public function getOrdersState($state_id)
    {
        return $query=Doctrine::getTable("Orders")->createQuery()
        ->where("consumer_group_id=?",$this->id)
        ->andWhere("order_state_id=?",$state_id)
        ->execute();
    }


    /*
     * devuelve verdadero o falso según exista o no algún pedido en e
    * estado definido
    */

    public function hasOrderState($state_id)
    {
        $query=Doctrine::getTable("Orders")->createQuery("a")
        ->where("order_state_id=?",$state_id)
        ->andWhere("consumer_group_id=?",$this->id);

        if ($query->count())
        {
            return true;
        }

        return false;
    }


    /*
     * devuelve verdadero o falso según exista o no algún pedido
    */

    public function hasOrder()
    {
        $query=Doctrine::getTable("Orders")->createQuery("a")
        ->where("consumer_group_id=?",$this->id);

        if ($query->count())
        {
            return true;
        }

        return false;
    }



    /*
     * devuelve los últimos post del foro del grupo
    * en principio hay un único foro para cada grupo
    */
    public function getLatestPost($limit)
    {
        return $query=Doctrine::getTable("sfSimpleForumPost")
        ->createQuery()
        ->where("forum_id=?",$this->getUniqueForum()->id)
        ->orderBy("created_at desc")
        ->limit($limit)
        ->execute();
    }

    /*
     * Devuelve el objeto sfSimpleForumForum correspondiente a este grupo de consumo
    */
    public function getUniqueForum()
    {
        $forums=$this->sfSimpleForumForum;//esto devuelve un array con 1 elemento en principio

        return $forums[0];
    }
    /*
     * El usuario que se le pasa pertenece a este grupo?
    */
    public function belongGroup($consumer)
    {
        if ($consumer->consumer_state_id==2&&$consumer->consumer_group_id==$this->id)
        {
            return true;
        }

        return false;
    }
    
    public function hasActiveInvitations()
    {
        if (count($this->getConsumerGroupInvitation()))
        {
            return true;
        }
        
        return false;
    }
}


