<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('order');
   
$count = Table::Count('planos_pacote', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$orders = DB::LimitQuery('planos_pacote', array( 
	'order' => 'ORDER BY id',
	'size' => $pagesize,
	'offset' => $offset,
));

  
include template('manage_order_pacotes');
 