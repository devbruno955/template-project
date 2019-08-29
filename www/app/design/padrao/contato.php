<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110925788-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-110925788-1');
</script>




<?php
	require_once("include/code/contato.php");
	$pagetitle = 'Por favor use o Formul&agrave;rio abaixo:';
?> 
<?php  require_once("include/head.php"); ?>
 
<body id="page1">
<div style="display:none;" class="tips"><?=__FILE__?></div>
<div class="tail-top">
	<?php  	
		require_once(DIR_BLOCO . "/bloco_busca_topo.php");
		require_once(DIR_BLOCO."/bloco_background.php"); 
	?>
    <div class="main">
       <?php  require_once(DIR_BLOCO."/header.php"); ?>
		<section id="content"> 
            <div class="inside"> 
				<div class="col-1f">  
					<div class="titpages"><?php echo $pagetitle ?> </div>
						 <form id="formcadcontato" name="formcadcontato" method="post" action="">
							<table width="629" border="0">
							  <tr>
								<td width="277">Nome</td>
								<td width="33">&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td width="305">Email</td>
							  </tr>
							  <tr>
								<td><label for="nomeuso2"></label>
								  <input style="width:324px;font-size:13px;color:#000;" name="title" type="text" id="title" onFocus="if(this.value =='Insira seu nome' ) this.value=''" onBlur="if(this.value=='') this.value='Insira seu nome'" value="Insira seu nome"  />
								  </td>
								<td>&nbsp;</td>
								<td><label for="email"></label> 
									<input style="width:299px;font-size:13px;color:#000;" name="contact" type="text" id="contact" onFocus="if(this.value =='Insira seu e-mail' ) this.value=''" onBlur="if(this.value=='') this.value='Insira seu e-mail'" value="Insira seu e-mail"  />
								</td>
							  </tr>
							   <tr>
								<td colspan="3" >Mensagem</td>
							 </tr>
							  <tr>
								<td colspan="3"><textarea style="margin-bottom:12px;height:168px;max-width:100%;width:97%;font-size:13px;color:#000;" cols="30" rows="5" name="content" id="content" ></textarea></td>
							  </tr> 
							  <tr>
								<td colspan="3"><a  href="javascript:cadastro();"  class="link-1"><em><b>ENVIAR</b></em></a></td>
							  </tr>
							</table>
						 </form> 
					</div> 
				</div>
        </section>
   </div>
</div> 
 
<?php require_once(DIR_BLOCO."/rodape.php"); ?>

<script language="javascript">
  
J("#menu1").attr("class","")
J("#menu2").attr("class","")
J("#menu3").attr("class","")
J("#menu4").attr("class","")

</script>

<script language="javascript">
	  
	function cadastro(){
	  
			if(J("#title").val() == "Insira seu nome"){
				alert("Por favor, informe o seu nome.")
				document.getElementById("title").focus();
				return;
			}
			 
				
			if(J("#contact").val() == "Insira seu e-mail"){
				alert("Por favor, informe o seu email.")
				document.getElementById("contact").focus();
				return;
			}
			  
 
			if( document.formcadcontato.content.value == ""){
				alert("Por favor, escreva a mensagem.")
				document.formcadcontato.content.focus();
				return;
			}		
			 
		   J("#formcadcontato").submit();	 
	}	
  	 
  <?php  
	if($enviou){ ?> 
		alert("Muito Obrigado por sua Mensagem! Responderemos o mais rápido possível de Segunda a Sexta, das 09:00 às 17:00 hs.")
		location.href  = '<?php echo $INI['system']['wwwprefix']?>/index.php';
	   <? }
	else if($_POST and !$enviou){?>
		alert("Não foi possível enviar os dados, tente novamente mais tarde.")
	<? } ?>
  
</script>		
</body>
</html>
