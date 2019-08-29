<?php    
require_once("include/head.php"); 
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "/include/code/alugar-imovel.php");
if (!$_POST) { 
	// descomentar para testes
	 redirect(WEB_ROOT . '/index.php'); 
}
?>  
<div style="display:none;" class="tips"><?=__FILE__?></div> 
	<body id="page1" class="webstore home">	
	<script language="javascript"> 
		function enviapag(valor){ 
			J("#"+valor).submit();
		} 
	</script>
		<!-- Responsivo -->
		<div class="containerM">
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/header.php"); ?>	
			</div>			
			<div class="row">
				<div class="titlePage">
					<p>Pedido</p>
				</div>
			</div>
			<div class="row">
				<div class="infoOrder">
					<h2>Número da reserva: <?=$idreserva?></h2>
					<?php   
						if($tipo!="pagamentooffline"){
						
					?>
					<h2>Escolha sua forma de pagamento abaixo:</h2>
					<?php
							require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "/include/botoespagamento.php");
						}
						else {
					?> 
					<h2>Aguarde o contato do proprietário do imóvel</h2>
					<p> Olá <?=utf8_decode($login_user['realname'])?>, um email foi enviado para o proprietário do imóvel com a sua solicitação de reserva.</p>
					<p> O proprietário irá entrar em contato com você por telefone ou email em até 24h.</p> 
					<p>Obrigado por visitar o nosso site, volte sempre !</p>
					<?php
						}
					?>
				</div>
			</div>
			<div class="row">
				<div class="titlePage">
					<p>Detalhes da reserva</p>
				</div>
				<div class="infoOrder">
					<img src="<?=$INI['system']['wwwprefix']."/media/".$anuncio['image']?>" />	
					<br />					
					<h2><?=utf8_decode($anuncio['title'])?></h2>
					<p>A reserva é para o período de <b><?=$_POST['inicioperiodo']?> até <?=$_POST['fimperiodo']?></b>.</p>
					<p><b>Hóspedes:</b> <?=$adulto?> adulto(s) e <?=$crianca?> criança(s).</p>
					<p>O valor de 1 diária é <b> R$ <?=number_format($valordiaria,2, ',', '.') ?></b>.</p>
					<? if($tipo=="onlineparcial"){ ?>
					<p>Você solicitou  <b> <?=$diarias?></b> diária(s) dando um total de  <b> R$ <?=number_format($valortotal,2, ',', '.'); ?></b>.</p>
					<p>Lembre-se que o restante no valor de <b> R$ <?=number_format($valorrestante,2, ',', '.')  ?></b> deverá ser pago somente no local.</p>
					<?php } ?>
				</div>	
				<br />
			</div>
			<? if(!empty($anuncio[informacoespagamento])){?>			
			<div class="row">
				<div class="titlePage">
					<p>Outras informações</p>
				</div>
				<div class="infoOrder">
					<?php echo strip_tags($anuncio['informacoespagamento']); ?>				
				</div>
				<br />
			</div>	
			<?php } ?>			
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/rodapeM.php"); ?>				
			</div>			
		</div>
	</body>
</html>