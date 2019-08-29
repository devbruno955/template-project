<div class="listProposals">
	<ul>
<?php 
	if(is_array($orders)){foreach($orders AS $index=>$one) { 
	
		$color = $one['statuspagamento'] == "aprovado" ? "#5c9e0d" : "#DD3A1A";
?>
		<li>
			<h2><?php echo strtolower(utf8_decode(substr($teams[$one['idanuncio']]['title'],0,62)."...")); ?></h2>
			<p>
				<b>Início da estadia:</b> <?php echo date('d/m/Y', strtotime($one['inicioestadia']) ); ?>
			</p>
			<p>
				<b>Fim da estadia:</b> <?php echo date('d/m/Y', strtotime($one['fimestadia']) ); ?>
			</p>
			<p>
				<b>Diárias:</b> <?php echo $one['diarias']; ?>
			</p>			
			<p>
				<b>Valor total:</b> R$ <?php echo number_format($one['valortotal'], 2, ',', '.');  ?>
			</p>			
			<p>
				<b>Valor da reserva:</b> R$ <?php echo number_format($one['valorreserva'], 2, ',', '.');  ?>
			</p>			
			<p>
				<b>Valor restante:</b> R$ <?php echo number_format($one['valorrestante'], 2, ',', '.');  ?>
			</p>			
			<p>
				<b>Status do pagamento:</b> <span style="color:<?php echo $color; ?>;text-transform:capitalize;"><?php echo  $one['statuspagamento']; ?></span>
			</p>
		</li>
<?php
		}
	}
?>
	</ul>
</div>