<div style="display:none;" class="tips"><?=__FILE__?></div>  
 
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/responsive.css">
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/planos.css">
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css"> 
	<?php
	
		/* Primeiro � verificado se existe usu�rio logado e se trata de uma particular ou revenda. */
		if(isset($login_user) and !(empty($login_user))){
		
			/* Neste ponto verifico se o usu�rio j� pegou o plano gr�tis alguma vez. Caso afirmativo
			   o plano gratuito n�o ser� exibido.
			*/
			$sql = "SELECT * FROM `partner_planos` WHERE plano_id = 10 AND partner_id = " . $login_user['id'];
			$rs = mysql_query($sql);
			$num = mysql_num_rows($rs);
			
			$rule = 0;
			
			if($num >= 1) { 
					/* Caso o usu�rio j� tenha adquirido um plano gr�tis, e enviado o ID do plano gr�tis que � 10. */
					$rule = 10; 
					?>
					<div class="MsgPlano">
						<p>&nbsp; &nbsp;<img src="<?php echo $PATHSKIN;?>/images/atention.png">Voc� n�o pode mais escolher o plano gr�tis. Escolha outro plano de sua prefer�ncia.</p>
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

		$destaque = $row['ehdestaque'] == "Y" ? "Sim" : "N�o";
		$video = $row['temvideo'] =='VIDEO' ? "Sim" : "N�o";
		
		?>
		<div class="listPlans">
			<ul class="pricing p-<?=$cor?>">
				<li>
					<img src="http://bread.pp.ua/n/settings_g.svg" alt="">
					<big><?=utf8_decode($row['nome'])?></big>
				</li>
				<li>Fotos nos resultados das buscas<br /><b>Sim</b></li>
				<li>V�deo no an�ncio<br /><b><?php echo $video; ?></b></li>
				<li>Saiba quantos acessos o an�ncio recebeu<br /><b>Sim</b></li>
				<li>Propostas diretamente em seu e-mail, sem intermedi�rios e risco de Spam<br /><b>Sim</b></li>
				<li>Per�odo de publica��o<br /><b><?php echo $row['dias']; ?> dias</b></li>
				<li>Fotos no an�ncio<br /><b>10</b></li>
				<li>An�ncios da vitrine - Tela principal do site<br /><b><?php echo $destaque; ?></b></li>
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
					<button onclick="location.href="<?php echo $ROOTPATH; ?>"');" data-type="<?php echo $row['gratis']; ?>" data-id="<?php echo $row['id']; ?>" <?php if(!$login_user){ ?> class="tk_logar" <? }else {?> class="submit_form_pg" <?}?>>Permanecer gr�tis</button>																		<?php } ?>
				</li>
			</ul>
		</div>
	<? } ?> 
	</div>
	<div class="btnFormPag">
		<a id="btnBuscar" class="btnSubmit <?php if($login_user) { ?>tk_logar<?php } ?>" href="javascript:fazeranuncio();">CADASTRAR AN�NCIO</a>
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
				alert("Voc� precisa aceitar a pol�tica de uso para prosseguir.")
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
			alert('O usu�rio est� vazio. Por favor, entre em contato conosco')
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
						alert("J� existe um plano ativo em sua conta. Voc� deve publicar todos os an�ncios restantes antes de adquirir um novo plano de an�ncios");
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
