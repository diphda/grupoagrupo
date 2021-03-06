<?php

/**
 * News
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    webs_proyectos
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class News extends BaseNews
{
  public function getImageThumb()
  {

    echo image_tag ('/images/'.basename(sfConfig::get('sf_upload_dir')).'/'
        .basename(sfConfig::get('sf_thumbnail_dir')).'/'.$this->image);
  }

  public function getCulture()
  {
    return sfContext::getInstance()->getUser()->getCulture();
  }

  public function getCultureTranslation()
  {
    return sfContext::getInstance()->getUser()->getFlash("cultureTranslation");
  }

  public function setCultureTranslation($cultureTranslation)
  {
    $this->cultureTranslation=$cultureTranslation;
  }


  public function setUp() {
    $this->hasMany('NewsTranslation', array(
        'local' => 'id',
        'foreign' => 'id'));
    parent::setUp();
  }

  public static function getFechaFormated($fecha)
  {
    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
    if ($mifecha[2]=='01'){
      $mes="Enero";
    }
    if ($mifecha[2]=='02'){
      $mes="Febrero";
    }
    if ($mifecha[2]=='03'){
      $mes="Marzo";
    }
    if ($mifecha[2]=='04'){
      $mes="Abril";
    }
    if ($mifecha[2]=='05'){
      $mes="Mayo";
    }
    if ($mifecha[2]=='06'){
      $mes="Junio";
    }
    if ($mifecha[2]=='07'){
      $mes="Julio";
    }
    if ($mifecha[2]=='08'){
      $mes="Agosto";
    }
    if ($mifecha[2]=='09'){
      $mes="Septiembre";
    }
    if ($mifecha[2]=='10'){
      $mes="Octubre";
    }
    if ($mifecha[2]=='11'){
      $mes="Noviembre";
    }
    if ($mifecha[2]=='12'){
      $mes="Diciembre";
    }
    $nueva_fecha=$mifecha[3]." de ".__($mes)." de ".$mifecha[1];
    return $nueva_fecha;
  }

  public static function getFechaFormatedNumbers($fecha)
  {
    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
    $nueva_fecha=$mifecha[3].".".$mifecha[2].".".$mifecha[1];
    return $nueva_fecha;
  }

  /*
   * Devuelve el texto para la lista de noticias de la portada
  */
  public function getHomeNewsList()
  {
    $html=$this->name.". ".$this->getHomeDescription();

    return $html;
  }



  public function getShortDescription($max=200)
  {

    return strip_tags(substr($this->content,0,$max)."...","<p>");
  }

  public function isInHome()
  {
    $query=Doctrine::getTable("Home")->findByObjectIdAndObjectClass($this->id,$this->getModel());

    if (count($query)){
      return true;
    }

    return false;
  }

  public function getModel()
  {

    return "News";
  }

  /*
   * Con esta función pretendo organizar la portada. Esta función está en todas las clases
  * de los objetos que aparecen en la portada.
  * Indica si ocupa todo el ancho de la portada o no
  */

  public function getLevel()
  {

    return true;
  }

  /*
   * Para saber si esta noticia es la última de la lista
  */
  /*public function isLastHome(){
   $query=Doctrine::getTable("Home")->findByObjectIdAndObjectClass($this->id,$this->getModel());
  $new=$query[0];

  $position=Doctrine::getTable("Home")->findAllSorted("DESCENDING");
  $lastPosition=$position[0];

  if ($lastPosition->position==$new->position){
  echo "·masnasdfasf";
  return true;
  } else {
  echo $lastPosition->position;
  }

  return false;
  }*/

  public function isNextHomeSame()
  {
    $query=Doctrine::getTable("Home")->findByObjectIdAndObjectClass($this->id,$this->getModel());
    $new=$query[0];
    $homes=Doctrine::getTable("Home")->findAllSorted("ASCENDING");
    $newKey=$homes->search($new);
    $next=$homes[$newKey+1];
    if ($new->object_class==$next->object_class){
      return true;
    }
    return false;
  }

  public function getDateCreatedAt()
  {
    $date=strtotime($this->getCreatedAt());

    return date("Y-m-d",$date);
  }
}
