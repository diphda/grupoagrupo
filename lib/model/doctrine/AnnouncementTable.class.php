<?php

/**
 * AnnouncementTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AnnouncementTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AnnouncementTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Announcement');
    }
}