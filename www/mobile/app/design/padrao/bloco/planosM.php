<div style="display:none;" class="tips"><?=__FILE__?></div>  
 
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/responsive.css">
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/planos.css">
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css"> 
	<?php
	
		/* Primeiro é verificado se existe usuário logado e se trata de uma particular ou revenda. */
		if(isset($login_user) and !(empty($login_user))){
		
			/* Neste ponto verifico se o usuário já pegou o plano grátis alguma vez. Caso afirmativo
			   o plano gratuito não será exibido.
			*/
			$sql = "SELECT * FROM `partner_planos` WHERE plano_id = 10 AND partner_id = " . $login_user['id'];
			$rs = mysql_query($sql);
			$num = mysql_num_rows($rs);
			
			$rule = 0;
			
			if($num >= 1) { 
					/* Caso o usuário já tenha adquirido um plano grátis, e enviado o ID do plano grátis que é 10. */
					$rule = 10; 
					?>
					<div class="MsgPlano">
						<p>&nbsp; &nbsp;<img src="<?php echo $PATHSKIN;?>/images/atention.png">Você não pode mais escolher o plano grátis. Escolha outro plano de sua preferência.</p>
					</div>
					<?php
			} 
			 $sql = "select * from planos_publicacao where ativo = 's' and id <> " . $rule; 
		}
		else{
			$sql = "select * from planos_publicacao where ativo = 's'";
		}
		
		$rs = mysql_query($sql);
	?>
	<div class="block">
	<?
	$cont = 0;				
	while($row = mysql_fetch_array($rs)){
		$cont++;
		if($cont==1){
			$cor = "yel";
		}
		else if($cont==2){
			$cor = "green";
		}	
		else if($cont==3){
			$cor = "blue";
		}
		else if($cont==4){
			$cor = "red";
		}
		else if($cont==5){
			$cor = "red";
		}	

		$destaque = $row['ehdestaque'] == "Y" ? "Sim" : "Não";
		$video = $row['temvideo'] =='VIDEO' ? "Sim" : "Não";
		
		?>
		<div class="listPlans">
			<ul class="pricing p-<?=$cor?>">
				<li>
					<img src="http://bread.pp.ua/n/settings_g.svg" alt="">
					<big><?=utf8_decode($row['nome'])?></big>
				</li>
				<li>Fotos nos resultados das buscas<br /><b>Sim</b></li>
				<li>Vídeo no anúncio<br /><b><?php echo $video; ?></b></li>
				<li>Saiba quantos acessos o anúncio recebeu<br /><b>Sim</b></li>
				<li>Propostas diretamente em seu e-mail, sem intermediários e risco de Spam<br /><b>Sim</b></li>
				<li>Período de publicação<br /><b><?php echo $row['dias']; ?> dias</b></li>
				<li>Fotos no anúncio<br /><b>10</b></li>
				<li>Anúncios da vitrine - Tela principal do site<br /><b><?php echo $destaque; ?></b></li>
				<?php if($row['gratis'] != 's') { ?>								
				<li>
					R$<h3> <?= number_format($row[valor],2, ',', '.')?></h3>
					<span>por <? if($row['dias']=="1"){echo " 30 dias "; } else { echo $row['dias']." dias";}?> </span>
				</li>	
				<?php } else { ?>															
				<li>				
					<big><?=utf8_decode($row['nome'])?></big> 
					<br>
					<br>
					<br>									
				</li>																
				<?php } ?>
				<li> 									
				<?php if($row['gratis'] != 's') { ?>
					<input id="planoanuncio" class="cinput inputradio" type="radio" value="<?php echo $row['id']; ?>" name="planoanuncio" >
					<br/>
					<br/>
					<b>Escolher plano #<?php echo $row['id']; ?> <?=utf8_decode($row['nome'])?></b>
					<?php } else { ?>	
					<button onclick="location.href="<?php echo $ROOTPATH; ?>"');" data-type="<?php echo $row['gratis']; ?>" data-id="<?php echo $row['id']; ?>" <?php if(!$login_user){ ?> class="tk_logar" <? }else {?> class="submit_form_pg" <?}?>>Permanecer grátis</button>																		<?php } ?>
				</li>
			</ul>
		</div>
	<? } ?> 
	</div>
	<div class="btnFormPag">
		<a id="btnBuscar" class="btnSubmit <?php if($login_user) { ?>tk_logar<?php } ?>" href="javascript:fazeranuncio();">CADASTRAR ANÚNCIO</a>
	</div>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
	<form id="anunciar" name="anunciar"  method="get" action="<?=$INI['system']['wwwprefix']?>/adminanunciante/team/edit.php"> 
		<input type="hidden" id="idplano" name="idplano" value="">  
	</form>
 <script>   
<?php if(isset($login_user[id])) { ?>
	var idusuariologado = <?=$login_user[id]?>;
<?php } ?>

  
function fazeranuncio(){
  
	    var checkplano="";
		J(".cinput:checked").each(function(){
			checkplano =  this.value  ;
		});  
	
		if(checkplano=="on"){
			alert("Por favor, escolha um plano")
			return;
		}
		
		/*
		var aceitar=''; 
		aceitar = J("input[type=checkbox][name=termosplano]:checked").val() 
		if( aceitar != "on" & aceitar != "1") {
				alert("Você precisa aceitar a política de uso para prosseguir.")
				return;
		} 
		*/
		
		planoanunciocheck = J("input[name='planoanuncio']:checked").val();
		J("#idplano").val(planoanunciocheck);
		
	    //situacaouser();   // desativado momentaneamente, aguardando feedback
 
		J("#anunciar").submit(); 	 	
  
}   
  
 var iduser=""; 
 
 // desativado momentaneamente, aguardando feedback
function situacaouser(){  
	var erro = false;
		if(iduser==""){
			iduser  = LOGINUID
		}	
		if(iduser==""){
			alert('O usuário está vazio. Por favor, entre em contato conosco')
			return;
		}
		J.ajax({
			   type: "POST",
			   cache: false,
			   async: false,
			   url: "<?php echo $INI['system']['wwwprefix']?>/include/funcoes.php",
			   data: "acao=verifica_situacao_plano_atual&idusuarioplano="+iduser,
			   success: function(retorno){
			   retorno = jQuery.trim(retorno);
				//alert("|"+retorno+"|")
			   if(jQuery.trim(retorno)!=""){   
					if(retorno=="0" || retorno=="-1" || retorno=="-2"  || retorno=="" || retorno=="-99"){
						 
					}
					else{  		    
						alert("Já existe um plano ativo em sua conta. Você deve publicar todos os anúncios restantes antes de adquirir um novo plano de anúncios");
						erro = true ;			 
					}
				} 
			   else {  		    
					alert( "Codigo 134 "+retorno);
					erro = true ;		 
				}		  
			}
		});
		
		if(!erro){ 
			J("#anunciar").submit(); 	 	
		}	 
}
	 
 </script>
