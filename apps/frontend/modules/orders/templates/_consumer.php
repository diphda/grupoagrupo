<?php
/*
 © Copyright 2013diphda.net && sodepaz.org
info@diphda.net
sodepaz@sodepaz.org


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
<div class="order_actions_list"><?php include_partial("orders/consumer_order_actions",array("state"=>$order->OrderState,"order"=>$order))?></div>
<?php include_partial("orders/order_data",array("order"=>$order))?>
<?php include_partial("orders/order_detail",array("state"=>$order->OrderState,"order"=>$order,"limit_state"=>array(1,2,6,7),
  "url"=>"consumer_group/change_order_consumer","url_delete"=>"consumer_group/deleteconsumerorder","detail"=>$detail))?>