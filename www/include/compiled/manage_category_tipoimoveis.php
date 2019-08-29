<?php include template("manage_header");?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
			<div class="option_box">
				 <div class="top-heading group"> <div class="left_float"><h4>Tipo de Imóveis</h4></div> 
				
					<div style="padding: 10px;">
						<ul id="log_tools"> <li id="log_switch_referral"><a title="Cadastrar" href="/vipmin/category/edittipoimoveis.php">Adicionar </a></li> </ul> 
					 </div>
						
				</div> 
			 
					<div class="paginacaotop"><?php echo $pagestring; ?></div>
					 
					 <div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						 <tr>
						 <th width="20">ID</th>
						 <th width="300">Nome</th> 
						 <th width="150">Operações</th>
						 </tr>
						<?php if(is_array($tipoimoveis)){
						foreach($tipoimoveis AS $index=>$one) { 
                            
                        ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>>
							<td><?php echo $one['id']; ?></td> 
							<td><?php echo $one['nome']; ?></td>
							<td class="op">
							 <div style="float: left; margin-right: 2px;">
							 <a href="/vipmin/category/edittipoimoveis.php?&id=<?php echo $one['id']; ?>"><img alt="Editar" title="Editar" src="/media/css/i/editar.png" style="width: 22px;">
							 </a>
							  <a href="/ajax/manage.php?&action=deletetipo&id=<?php echo $one['id']; ?>"><img alt="Excluir" title="Excluir" src="/media/css/i/excluir.png" style="width: 22px;">
							 </div>
						    </td>
							<?}  ?>
						</tr>
						<?php }?>
						<tr><td colspan="4"><?php echo $pagestring; ?></td></tr>
						</table>
					</div>
				</div>	
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->


 
 <script>
  function msg_edit(){
	jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Aguarde enquanto carregamos os dados...</div>"});
}
 </script>
 
  <script>
  function msg(){
		return true;
 }
 </script>
 