<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div>  
<?php
	
	/* Todos os anúncios em destaque e ativos com limite pré determinado no vipmin, é exibido na home. */
	$ordem =  'rand()';
	
	$sql = "select * from team where  ehdestaque = 'Y' and desativado <> 's' and (status is null or status = 1) and (pago = 'sim' or anunciogratis = 's') and begin_time < '".time()."' and end_time > '".time()."' order by $ordem limit ".$INI['system']['qtde_anuncios_destaque_home'];
	$rs = mysql_query($sql);
	
    if(mysql_num_rows($rs)){?>	
		 
		<div style="text-align:center;clear:both;"><h1><?=utf8_decode($INI['system']['txt2'])?></h1></div>

		<div class="row-fluid">
			<ul class="thumbnails">
				<?php 
				
					while($anuncio = mysql_fetch_assoc($rs)) { 
						unset($vagas);
						unset ($quartos);
						
						/* Caso não tenha nenhuma imagem em destaque. */
						//if(empty($anuncio["imgdestaque"])) {
							//$anuncio["imgdestaque"] = $PATHSKIN . "/images/semfoto.jpg";
						//}
						
						/* Informações como cidade, estado e bairro são buscados para ser impresso. */
						$sqlC = "select nome from cidades where id = '" . $anuncio["city_id"];
						$rsC = mysql_query($sqlC);
						$cidade = mysql_fetch_assoc($rsC);
						
						if(!(empty($anuncio["imob_estado"])) && !(empty($cidade["nome"]))) {
							
							$localizacao = $anuncio["imob_estado"] . " - " . $cidade["nome"];
						}
						
						if(!(empty($anuncio["imob_tipo"]))) {
							
							$sqlT = "select nome from tipoimoveis where id = '" . $anuncio["imob_tipo"] . "'";
							$rsT = mysql_query($sqlT);
							$tipo = mysql_fetch_assoc($rsT);
						}
						else {
							$bairro = utf8_decode("Bairro não informado.");
						}
						
						/* Número de vagas e de quartos são exibidos juntamente com o thumb do anúncio. */
						if(!(empty($anuncio["imob_vagas"]))) {
							$vagas = "Total de vagas: " . $anuncio["imob_vagas"];
						}
						
						if(!(empty($anuncio["imob_quartos"]))) {
							$quartos = "Total de quartos: " . $anuncio["imob_quartos"];
						}
						
						if(!(empty($anuncio["imob_area"]))) {
							$area = utf8_decode("Área: " . $anuncio["imob_area"] . "m²");
						}
						
						$url = UrlAnuncio($anuncio["id"]);
				?>
				<li style="background-color:#fff;" class="span3">
					<a href="<?php echo $url; ?>" target="_blank">
						<div style="background: #FFFFFF; opacity: 0.7; position: absolute; margin: 127px 0px 0px 5px; color:#000; letter-spacing: 0px; padding: 5px; line-height: 15px; font-size: 12px;font-weight: bold; width: 202px; height: 27px; overflow:hidden;">
							<?php echo utf8_decode(str_replace(" ,", ",", $anuncio["title"])); ?>
						</div>
					</a>
					<div class="thumbnail">
						<a href="<?php echo $url; ?>" target="_blank">
							<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $anuncio["img0"]; ?>" style="width: 212px; height: 159px;" alt="221x159" data-src="holder.js/221x159">					<!-- <img src="<?php echo $ROOTPATH; ?>/media/<?php echo $anuncio["imgdestaque"]; ?>" style="width: 212px; height: 159px;" alt="221x159" data-src="holder.js/221x159"> -->
						</a>
					<div class="caption">
					<div id="loc_364" class="textoLanc02">
						<?php echo $localizacao; ?>
					</div>
					<div class="textoLanc03">
						<?php echo utf8_decode("Imóvel: " . $tipo["nome"]); ?>
					</div>
					<div class="textoLanc04">
						<ul>
							<li class="Residencial Parc Mantova " id="nomeEmpreendimento_364">
								<?php echo $quartos; ?>
							</li>
							<li>
								<?php echo $vagas; ?>
								</li>					
							<li>
								<?php echo $area; ?>
							</li>					
							<li>
								<?php 
								 if($anuncio[mostrarpreco] == 1){ 
								
								if($anuncio['team_price'] != "0.00") { ?>
								<?php echo "Valor: R$ " . number_format($anuncio['team_price'], 2, ",", "."); ?>
								<?php } else { ?>
								<?php echo "Valor: -"; ?>
								<?php } 
								 }
								?>
							</li>
						</ul>
					</div>
					<div style="height:10px;"></div>
					<a href="<?php echo $url; ?>" target="_blank">
						<div id="364" class="btn btn-netimoveis detalheEmpreendimento--">
						<i class="icon-list icon-white"></i> ver detalhe</div>
					</a>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>

   <? } ?>
