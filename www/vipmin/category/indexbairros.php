<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
$condition = array();

$count = Table::Count('bairros', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
 
$categories = DB::LimitQuery('bairros', array(
	'condition' => $condition,
	'order' => 'ORDER BY nome ASC',
	'size' => $pagesize,
	'offset' => $offset,
));

include template('manage_category_indexbairros');
