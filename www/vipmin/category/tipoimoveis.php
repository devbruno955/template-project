<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
 
$count = Table::Count('tipoimoveis', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
 
$tipoimoveis = DB::LimitQuery('tipoimoveis', array( 
	'order' => 'ORDER BY nome ASC',
	'size' => $pagesize,
	'offset' => $offset,
));

include template('manage_category_tipoimoveis');
