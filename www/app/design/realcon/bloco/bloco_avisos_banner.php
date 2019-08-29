<div style="display:none;" class="tips"><?=__FILE__?></div>
<?php 
$ban =  trim($INI['bulletin'][0]) ;
if( !empty($ban)){ ?>  
	<div style="margin-top:8px;"><?php echo trim($INI['bulletin'][0]); ?></div>
 <?php }?>
 
<?php  
	
	if (!$city) $city = get_city();
	if (!$city) $city = array_shift($hotcities);
	if (!$city) $city['id'] = $_COOKIE["codcidade"];
	
 $ban =  trim($INI['bulletin'][$city['id']]) ;
if( !empty($ban)){ ?> 
	<div style="margin-top:8px;"><?php echo trim($INI['bulletin'][$city['id']]); ?></div>
<?php }?>
 