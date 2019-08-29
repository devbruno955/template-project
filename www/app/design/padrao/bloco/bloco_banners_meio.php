<div style="display:none;" class="tips"><?=__FILE__?></div>
<?php 
 if($INI['option']['bannermeio'] == "Y" or  $INI['option']['bannermeio']=="" ) {   
 
	$ban =  trim($INI['bulletin']['bannermeio']) ;
	if( !empty($ban)){ ?>  
		<div style="text-align:center;clear:both;" class="bannermeio"><?php echo trim($INI['bulletin']['bannermeio']); ?></div>
	 <?php }  
	 
 }
 ?>
 
 
 
 