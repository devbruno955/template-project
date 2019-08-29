<? 
$nmimagem = "destaquefit";	
$logo 			= $partner[image] ;
$nomeparceiro 	= utf8_decode($partner[title]); 
$link 			= $ROOTPATH."/index.php?busca=true&idparceiro=".$partner[id];
$logocompleto 	= $INI['system']['wwwprefix']."/media/".$logo ;

$endereco="";
if($partner['address']!=""){
$endereco.=$partner['address']. " ";
$endegoogle .= $partner['address']. " ";}
if($partner['numero']!=""){
$endereco.=$partner['numero']. " ";
$endegoogle .= $partner['numero']. " ";}
if($partner['chavesms']!="")
$endereco.=$partner['chavesms']. " ";
if($partner['bairro']!=""){
$endereco.=$partner['bairro']. " ";	
$endegoogle .= $partner['bairro']. " ";}
if($partner['cidade']!=""){
$endereco.=", ".$partner['cidade']. " ";
$endegoogle .= $partner['cidade']. " ";}
if($partner['estado']!="") 
$endereco.= "- ".$partner['estado']. " "; 
if($partner['cep']!="")
$endereco.=$partner['cep']. " ";
if($partner['mobile']!="")
$endereco.=" <br><img style='margin-top:-6px;' src=".$PATHSKIN."/images/telefono-icon.png> ".$partner['mobile']. " ";
if($partner['homepage']!="")
$endereco.="<a target='_blank' href=".$partner['homepage'].">".$partner['homepage']. "</a>";
		
?>
<div style="display:none;" class="tips"><?=__FILE__?></div> 

<div class="filterbar-full">
	<dl class="bg-busca planoNitroHome">
		<dt>
			<a href="<?php echo $link ?>"><img style="padding-left:7px;max-height:97px;max-width:104px;" src="<?=$logocompleto?>" title="<?=$nomeparceiro?>" alt="<?=$nomeparceiro?>"></a>
		</dt>
		<dd class="titulo-busca" style="width:599px;"><h4><?=$nomeparceiro?> - <?=utf8_decode($partner['cidade'])?> </h4></dd>
		<dd class="planoNitroHomeDesc" style="width:78%"><p><?=utf8_decode($endereco)?> <span><a style="text-decoration:none;color:#244973;" href="<?php echo $link ?>"><b>Ver Estoque</b></a></span></p></dd>  
		
	</dl>
</div> 
