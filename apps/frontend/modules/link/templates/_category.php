<?php
/*
© Copyright 2011 Francisco López Losada && Sodepaz
flopezlosada@yahoo.es


Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los términos de la Licencia
Pública General de GNU según es publicada por la Free Software Foundation, bien de la versión 3 de dicha
Licencia o bien (según su elección) de cualquier versión posterior.

Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA GARANTÍA, incluso sin la
garantía MERCANTIL implícita o sin garantizar la CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la
Licencia Pública General de GNU para más detalles.

Debería haber recibido una copia de la Licencia Pública General junto con este programa. Si no ha sido así,
escriba a la Free Software Foundation, Inc., en 675 Mass Ave, Cambridge, MA 02139, EEUU.

La licencia se encuentra en el archivo licencia.txt*/
?>
<?php use_helper("Text")?>
<div class=linkCategory>
<?php echo link_to(image_tag("links/".sfInflector::underscore(sfInflector::camelize($category->slug))),"@showLinkCategory?slug=".$category->slug)?>
<span class=title><?php echo link_to($category->name." (".$category->getLinks()." ".__("enlaces").")","@showLinkCategory?slug=".$category->slug)?></span>
<p><?php echo truncate_text($category->getContent("&",ESC_RAW),200,"...",true) ?></p>
<div class="clearer"></div>


</div>

