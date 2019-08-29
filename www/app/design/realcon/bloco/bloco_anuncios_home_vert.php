<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 

<?
 $Finalidades = Array(
  "Venda",
  "Aluguel",
  "Temporada"
 );

$Tipo = gettipoimovel($team['imob_tipo']);
	 
?>
<div class="filterbar-full">
	<dl class="bg-busca planoNitroHome">
		<dt>
			<a href="<?php echo $BlocosOfertas->linkoferta ?>" target="_blank"><img style="width:140px;height:100px; padding-left:7px;" src="<?=getImagem($team,$nmimagem)?>" title="<?=$titulo?>" alt="<?=$titulo?>"></a>
		</dt>
		<dd class="titulo-busca"><h4><?=$titulo?> <? if($BlocosOfertas->mostrarpreco=="1"){?><span class="preco_busca"> R$ <?=$BlocosOfertas->preco?></span><? } ?></h4></dd>
		<dd class="planoNitroHomeDesc" style="width:167px;"><p> <B>Tipo:</B> <?=$Tipo?> <B> Finalidade: </B><?=$Finalidades[$team['imob_finalidade']]?></p>
		</dd>
		<dd class="planoNitroHomeDesc"  style="width:269px;">
		   <? if(!empty($team['imob_bairro'])){ echo "<B>Bairro:</B>". getBairro($team['imob_bairro']); } ?>
			 <? if(!empty($team['imob_quartos'])){ echo "- ".$team['imob_quartos']. " quarto(s)"; } ?> 
		</dd>	
		<dd class="planoNitroHomeDesc"  style="width:67px;">
			<p><? if(!empty($team['imob_vagas'])){ echo $team['imob_vagas']. " vaga(s)"; } ?></p>
		</dd>
		 
	</dl>
</div> 