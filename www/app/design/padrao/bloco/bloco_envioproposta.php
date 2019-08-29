<?  
 if(file_exists(WWW_MOD."/propostas.inc")){?>
	 
	<style>
	input, textarea {
		background: -moz-linear-gradient(center top , #FFFFFF, #EEEEEE 1px, #FFFFFF 25px) repeat scroll 0 0 transparent;
		border: 1px solid #E5E5E5;
		box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
		font: 14px/100% Verdana,Tahoma,sans-serif;
		height: 19px;
		outline: 0 none;
		padding: 9px;
		width: 178px;
	}
	</style>
	<?
		$ddd = "DDD"; 
		if($login_user['ddd']){
				$ddd = $login_user['ddd'];
		} 
		$telefone = "Telefone";
		if($login_user['mobile']){
				$telefone = $login_user['mobile'];
		} 
		$nome = "Seu Nome";
		if($login_user['realname']){
				$nome = utf8_decode($login_user['realname']);
		}
		$email = "Seu Email";
		if($login_user['email']){
				$email = $login_user['email'];
		}
		
	?>						
	<div style="display:none;" class="tips"><?=__FILE__?></div>
	 <div class="proposta">
				<div class="box_abas">
				  <div class="box prop">
					<div class="floatfix"><!-- --></div>
						<div class="det_form">
						  <span>ENVIE SUA PROPOSTA</span>
						</div>
						<div class="corpopropo">
						<form name="form2" method="post" action="#">
						 
						<input type="hidden" value="<?=$team['id']?>" name="idoferta_proposta" id="idoferta_proposta">

						  <dl style="margin-top: 5px;">
							<dt class="clearFix"> 
							<input value="<?=$nome?>" type="text" maxlength="40" class="email" id="nome_proposta" name="nome_proposta">
							</dt>
						  </dl>
						  <dl style="margin-top: 5px;">
							<dt class="clearFix"> 
							<input type="text" maxlength="80" class="email" id="email_proposta" name="email_proposta" value="<?=$email?>">
							</dt>
						  </dl> 
						  
						  <dl style="margin-top: 5px;">
							<dt class="clearFix"> 
						 
							<!-- <input value="<?=$ddd?>" style="font-size:14px;width: 21px;" type="text"  maxlength="3" class="telefone" id="ddd_proposta" name="ddd_proposta">-->
							<input  value="<?=$telefone?>"  type="text"   maxlength="13" class="telefone" id="telefone_proposta" name="telefone_proposta">
							</dt>
						  </dl>
						  <dl style="margin-top: 5px;">
							<dt class="clearFix"> 
								<textarea style="height:126px;"   cols="20" rows="4" class="mensagem_proposta" id="proposta" name="proposta"   >Sua mensagem</textarea>
							</dt>
						  </dl>
						  <dl style="margin-top: 5px;">
							<dt class="clearFix">
								<div style="clear:both; width:100%; margin-left: 12px;">
									<a class="link-1" style="" href="javascript:enviaproposta();"><em><b>Enviar</b></em></a>
							 </dt>
						  </dl>
						</form>
					  </div>
				  </div>
				</div>
			  </div>
	 
	 <script>
	J(".det_form").corner("round 3px"); 
	</script>

<? } ?>