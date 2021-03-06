<?php

/**
 * LinkCategoryTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class LinkCategoryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object LinkCategoryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('LinkCategory');
    }
    
    public static function getLinksList($CategoryId,$limit){
        $query=Doctrine::getTable("Link")
        ->createQuery("a")
        ->where("link_category_id=?",$CategoryId)
        ->orderBy("position desc")
        ->limit($limit)
        ->execute();

        return $query;
    }
}