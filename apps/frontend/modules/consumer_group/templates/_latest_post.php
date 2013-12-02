<?php
/*
 © Copyright 2012 diphda.net && Sodepaz
 info@diphda.net


 Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los términos de la Licencia
 Pública General de GNU según es publicada por la Free Software Foundation, bien de la versión 3 de dicha
 Licencia o bien (según su elección) de cualquier versión posterior.

 Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA GARANTÍA, incluso sin l
 garantía MERCANTIL implícita o sin garantizar la CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la
 Licencia Pública General de GNU para más detalles.

 Debería haber recibido una copia de la Licencia Pública General junto con este programa. Si no ha sido así,
 escriba a la Free Software Foundation, Inc., en 675 Mass Ave, Cambridge, MA 02139, EEUU.

 La licencia se encuentra en el archivo licencia.txt*/
?>
<div class="utilities"><span class="post_head"><?php echo link_to(__("Últimos post del foro"),"consumer_group/forum")?></span>
<div class="clear"></div>
<ul>
<?php foreach ($consumer_group->getLatestPost(5) as $post):?>
	<li><?php echo link_to($post->title,"@forum_message?id=".$post->id)?></li>
	<?php endforeach;?>
</ul>
</div>