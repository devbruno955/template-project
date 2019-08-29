<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
				 <div class="option_box">
					<div class="top-heading group"> <div class="left_float"><h4>Inscritos em Newsletter</h4></div>
						<div class="top-heading group"> <div class="left_float"><h4>Usuários</h4></div> 
							<div style="padding: 10px;">	
								<ul class="filter" style="top:47px;">
									<li><form action="/vipmin/misc/subscribe.php" method="get">Cidade:<input type="text" name="cs" value="<?php echo htmlspecialchars($cs); ?>" class="h-input" />&nbsp;Email:<input type="text" name="like" value="<?php echo htmlspecialchars($like); ?>" class="h-input" />&nbsp;<input type="submit" value="Pesquisar" class="formbutton"  style="padding:1px 6px;"/><form></li>
								</ul>
							</div>	
						</div> 
						
				 <div class="paginacaotop" style="width:50%"><?php echo $pagestring; ?></div>
					</div> 
					<div class="sect">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="350">Email </th><th width="80">Cidade</th><th width="350">Chave</th><th width="80">operação</th></tr>
						<?php if(is_array($subscribes)){foreach($subscribes AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
							<td nowrap><?php echo $one['email']; ?></td>
							<td nowrap><?php echo $cities[$one['city_id']]['name']; ?></td>
							<td nowrap><?php echo $one['secret']; ?></td>
							<td class="op" nowrap><a ask="Deletar ou não?" href="/ajax/manage.php?action=subscriberemove&id=<?php echo $one['id']; ?>" class="ajaxlink">deletar</a></td>
						</tr>
						<?php }}?>
						<tr><td colspan="6"><?php echo $pagestring; ?></tr>
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


