<?php include template("manage_header"); ?> 
<?
if ($INI['cores']['textocabecalho'] == "") {
	$INI['cores']['textocabecalho'] = "#3f3f3f";
}if ($INI['cores']['linkscabecalho'] == "") {
	$INI['cores']['linkscabecalho'] = "#6f882a";
}if ($INI['cores']['fundosite'] == "") {
	$INI['cores']['fundosite'] = "#eee";
}if ($INI['cores']['fundonomecidades'] == "") {
	$INI['cores']['fundonomecidades'] = "#ff6600";
}if ($INI['cores']['btanunciarimovel1'] == "") {
	$INI['cores']['btanunciarimovel1'] = "#aaaaaa";
}if ($INI['cores']['btanunciarimoveldestaque1'] == "") {
	$INI['cores']['btanunciarimoveldestaque1'] = "#fee52e";
}if ($INI['cores']['btverdetalhe1'] == "") {
	$INI['cores']['btverdetalhe1'] = "#f97b15";
}if ($INI['cores']['btanunciarimovel2'] == "") {
	$INI['cores']['btanunciarimovel2'] = "#303030";
}if ($INI['cores']['btanunciarimoveldestaque2'] == "") {
	$INI['cores']['btanunciarimoveldestaque2'] = "#986218";
}if ($INI['cores']['btverdetalhe2'] == "") {
	$INI['cores']['btverdetalhe2'] = "#d56305";
}if ($INI['cores']['rodapesuperior'] == "") {
	$INI['cores']['rodapesuperior'] = "#555555";
}if ($INI['cores']['rodapeinferior'] == "") {
	$INI['cores']['rodapeinferior'] = "#333333";
}if ($INI['cores']['fundomenunavegacao1'] == "") {
	$INI['cores']['fundomenunavegacao1'] = "#828895";
}if ($INI['cores']['fundomenunavegacao2'] == "") {
	$INI['cores']['fundomenunavegacao2'] = "#303030";
}if ($INI['cores']['bordamenunavegacao'] == "") {
	$INI['cores']['bordamenunavegacao'] = "#4f5058";
}if ($INI['cores']['fundobotoescontato1'] == "") {
	$INI['cores']['fundobotoescontato1'] = "#aaaaaa";
}if ($INI['cores']['fundobotoescontato2'] == "") {
	$INI['cores']['fundobotoescontato2'] = "#303030";
}if ($INI['cores']['fundofiltrohome'] == "") {
	$INI['cores']['fundofiltrohome'] = "#471516";
}if ($INI['cores']['cabecalhofundofiltro'] == "") {
	$INI['cores']['cabecalhofundofiltro'] = "#ff6600";
}if ($INI['cores']['tituloanuncioresultado'] == "") {
	$INI['cores']['tituloanuncioresultado'] = "#ff6600";
} 
?>
 

<style type="text/css" media="screen">
	.colorwell {
		border: 2px solid #fff;
		width: 6em;
		text-align: center;
		cursor: pointer;
	}
	body .colorwell-selected {
		border: 2px solid #000;
		font-weight: bold;
	}
</style>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#demo').hide();
		var f = $.farbtastic('#picker');
		var p = $('#picker').css('opacity', 0.25);
		var selected;
		$('.colorwell')
		.each(function () { f.linkTo(this); $(this).css('opacity', 0.75); })
		.focus(function() {
			if (selected) {
				$(selected).css('opacity', 0.75).removeClass('colorwell-selected');
			}
			f.linkTo(this);
			p.css('opacity', 1);
			$(selected = this).css('opacity', 1).addClass('colorwell-selected');
		});
	});
</script>


<div id="bdw" class="bdw">
	<div id="bd" class="cf">
		<div id="partner"> 
			<div id="content" class="clear mainwide">
				<div class="clear box"> 
					<div class="box-content">   
						<div class="sect">
							<form method="post"> 

								<div class="option_box">
									<div class="top-heading group">
										<div class="left_float"><h4>Alteração de cores do site</h4></div>
										<div class="the-button">
											<input type="hidden" value="remote" id="deliverytype" name="deliverytype">
											<button onclick="doupdate();" id="run-button" class="input-btn" type="button">
												<div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?= $ROOTPATH ?>/media/css/i/lendo.gif" style="display: none;"></div>
												<div id="spinner-text"  >Salvar</div>
											</button>
										</div> 
									</div> 
									<div id="container_box">
										<div id="option_contents" class="option_contents"> 
											<div class="form-contain group" id="tabela-imagens">
												<span class="cpanel-date-hint">Note que se o componente que você está tentando alterar a cor não se encontra aqui, então este componente não é um elemento de cor, e sim uma imagem. Para alterar imagens <a href="/vipmin/system/imagens.php">clique aqui</a></span>
												<div>Após salvar, apert CTRL+F5 para remover o cache do navegador.</div><br>												<div id="picker"  style="opacity: 1; right: 50px; position: absolute; top: 322px;" ></div>	
												<div>Deixe o campo da cor vazio e salve para resetar</div><br>												<div id="picker"  style="opacity: 1; right: 50px; position: absolute; top: 322px;" ></div>	
												
											    <div  class="form-item" style="width:610px;margin-top:11px;">   <div   class="campocolor">Links do cabeçalho (home)<input style="margin-left:19px; width: 80px;" type="text"  name="cores[linkscabecalho]"  class="colorwell" value="<?php echo $INI['cores']['linkscabecalho']; ?>"  /> </div></div>
												<div  class="form-item" style="width:610px;margin-top:11px;">   <div   class="campocolor">Fundo nome das cidades<input style="margin-left:19px; width: 80px;" type="text"  name="cores[fundonomecidades]"  class="colorwell" value="<?php echo $INI['cores']['fundonomecidades']; ?>"  /> </div></div>
												<div  class="form-item" style="width:610px;margin-top:11px;">   <div   class="campocolor">Rodapé superior<input style="margin-left:19px; width: 80px;" type="text"  name="cores[rodapesuperior]"  class="colorwell" value="<?php echo $INI['cores']['rodapesuperior']; ?>"  /> </div></div>
												<div  class="form-item" style="width:610px;margin-top:11px;">   <div   class="campocolor">Rodapé inferior<input style="margin-left:19px; width: 80px;" type="text"  name="cores[rodapeinferior]"  class="colorwell" value="<?php echo $INI['cores']['rodapeinferior']; ?>"  /> </div></div>
												<div  class="form-item" style="width:610px;margin-top:11px;">   <div   class="campocolor">Fundo do menu de navegação <input style="margin-left:19px; width: 80px;" type="text"  name="cores[fundomenunavegacao1]"  class="colorwell" value="<?php echo $INI['cores']['fundomenunavegacao1']; ?>"  />-<input style="margin-left:19px; width: 80px;" type="text"  name="cores[fundomenunavegacao2]"  class="colorwell" value="<?php echo $INI['cores']['fundomenunavegacao2']; ?>"  /> borda:  <input style="margin-left:19px; width: 80px;" type="text"  name="cores[bordamenunavegacao]"  class="colorwell" value="<?php echo $INI['cores']['bordamenunavegacao']; ?>"  />  </div></div>
												 <!-- <div  class="form-item" style="width:610px;margin-top:11px;">   <div   class="campocolor">Titulo anúncio resultado (listagem)<input style="margin-left:19px; width: 80px;" type="text"  name="cores[tituloanuncioresultado]"  class="colorwell" value="<?php echo $INI['cores']['tituloanuncioresultado']; ?>"  /> </div></div>-->
												<div  class="form-item" style="width:610px;margin-top:11px;">   <div   class="campocolor">Botão anunciar imóvel (home) e contato<input style="margin-left:19px; width: 80px;" type="text"  name="cores[btanunciarimovel1]"  class="colorwell" value="<?php echo $INI['cores']['btanunciarimovel1']; ?>"  /> - <input style="margin-left:19px; width: 80px;" type="text"  name="cores[btanunciarimovel2]"  class="colorwell" value="<?php echo $INI['cores']['btanunciarimovel2']; ?>"  /> </div></div>
												<div  class="form-item" style="width:610px;margin-top:11px;">   <div   class="campocolor">Botão anunciar imóvel (destaque)<input style="margin-left:19px; width: 80px;" type="text"  name="cores[btanunciarimoveldestaque1]"  class="colorwell" value="<?php echo $INI['cores']['btanunciarimoveldestaque1']; ?>"  /> - <input style="margin-left:19px; width: 80px;" type="text"  name="cores[btanunciarimoveldestaque2]"  class="colorwell" value="<?php echo $INI['cores']['btanunciarimoveldestaque2']; ?>"  /> </div></div>
												<div  class="form-item" style="width:610px;margin-top:11px;">   <div   class="campocolor">Botão ver detalhe<input style="margin-left:19px; width: 80px;" type="text"  name="cores[btverdetalhe1]"  class="colorwell" value="<?php echo $INI['cores']['btverdetalhe1']; ?>"  /> - <input style="margin-left:19px; width: 80px;" type="text"  name="cores[btverdetalhe2]"  class="colorwell" value="<?php echo $INI['cores']['btverdetalhe2']; ?>"  /> </div></div>
												<!-- <div  class="form-item" style="width:610px;margin-top:11px;">   <div   class="campocolor">Botão de contato<input style="margin-left:19px; width: 80px;" type="text"  name="cores[fundobotoescontato1]"  class="colorwell" value="<?php echo $INI['cores']['fundobotoescontato1']; ?>"  />  - <input style="margin-left:19px; width: 80px;" type="text"  name="cores[fundobotoescontato2]"  class="colorwell" value="<?php echo $INI['cores']['fundobotoescontato2']; ?>"  /> </div></div>-->
												
											</div>
										</div>
									</div>
								</div> 
 
							</form>
						</div>
					</div>
					<div class="box-bottom"></div>
				</div>
			</div>

			<div id="sidebar">
			</div>

		</div>
	</div> <!-- bd end -->
</div> <!-- bdw end -->
<script>
	function validador(){
		return true;
	}
</script>