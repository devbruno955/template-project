<?php include template("manage_header");?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
			<div class="option_box">
				 <div class="top-heading group"> <div class="left_float"><h4>Bairros</h4></div> 
				
					<div style="padding: 10px;">
						<ul id="log_tools"> <li id="log_switch_referral"><a title="Cadastrar <?php echo $cates[$zone]; ?>" href="/vipmin/category/editbairros.php">Adicionar<?php echo $cates[$zone]; ?></a></li> </ul> 
					 </div>
						
				</div> 
			 
					<div class="paginacaotop"><?php echo $pagestring; ?></div>
					 
					 <div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						 <tr>
						 <th width="20">UF</th>
						 <th width="300">Cidade</th>
						 <th>Bairro</th>
						 <th width="150">Operações</th>
						 </tr>
						<?php if(is_array($categories)){
						foreach($categories AS $index=>$one) { 
                            $cidade = mysql_fetch_row(mysql_query('SELECT * FROM cidades WHERE id = ' . $one['cidade']));    
                        ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>>
							<td><?php echo $cidade[2]; ?></td>
							<td><?php echo $cidade[1]; ?></td>
							<td><?php echo $one['nome']; ?></td>
							<td class="op">
							 <div style="float: left; margin-right: 2px;">
							 <a href="/vipmin/category/editbairros.php?&id=<?php echo $one['id']; ?>"><img alt="Editar" title="Editar" src="/media/css/i/editar.png" style="width: 22px;">
							 <a href="/ajax/manage.php?action=excluir&tabela=bairros&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Você tem certeza que deseja apagar esse registro ?" ><img alt="Excluir" title="Excluir" style="width: 22px;" src="/media/css/i/excluir.png"></a>
							
							 </a>
							 </div>
						    </td>
							<?}  ?>
						</tr>
						<?php }?>
						<tr><td colspan="8"><?php echo $pagestring; ?></td></tr>
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
 