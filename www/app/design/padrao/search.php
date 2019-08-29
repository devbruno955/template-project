<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110925788-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-110925788-1');
</script>


<?php  
		 require_once("app/design/realcon/head_html.php");
		
		/* Parâmetros recebidos via GET que serão utilizados em todos os blocos
		   desta página.	
		*/
		$anuncio = strip_tags($_GET["anuncio"]);
		$tipo = strip_tags($_GET["tipo"]);
		$quartos = strip_tags($_GET["quartos"]);
		$vagas = strip_tags($_GET["vagas"]);
		$bairro = strip_tags($_GET["bairro"]);
		$cidade = strip_tags($_GET["cidade"]);
		$estado = strip_tags($_GET["estado"]);	
		$idparceiro = 	strip_tags($_GET["idparceiro"]);
		$cep = 	strip_tags($_GET["cep"]);
		$condominio = 	strip_tags($_GET["condominio"]);
	
		/* Parâmetro tipo de anúncio. */
		if(!(empty($anuncio))) { 
			if($anuncio == "comprar") { 
				$anuncioSearch = 0;
			}
			
			if($anuncio == "alugar") { 
				$anuncioSearch = 1;
			} 			
			
			if($anuncio == "alugar-temporada") { 
				$anuncioSearch = 2;
			} 			
			
			if($anuncio == "lancamentos") { 
				$anuncioSearch = 3;
			} 	
			
			if($anuncio == "finalidade_todos") { 
				$anuncioSearch = 5;
			} 
			
			if($anuncioSearch != 5) {
				$anuncioSql = " imob_finalidade = '" . $anuncioSearch . "' ";
			}
			else {
				$anuncioSql = " imob_finalidade is not null ";
			}
		}
		else { 
			$anuncioSql = " imob_finalidade is not null ";
		}

		/* Parâmetro tipo de imóvel. */
		if($tipo == "todos-tipos") { 
			$tipoSql = " imob_tipo is not null ";
		}
		else { 
			$tipo . "<br />";
			$tipos_imoveis = str_replace("-", " ", $tipo);
			
			/* Busca a ID do tipo de imóvel escolhido na busca. */
			$sql = "select id from tipoimoveis where nome = '" . $tipos_imoveis . "'";
			$rs = mysql_query($sql);
			$tipo_id = mysql_fetch_assoc($rs);
			$tipoSql = " imob_tipo = '" . $tipo_id['id'] . "' ";
		}

		/* Parâmetro quantidade de quartos. */
		if($quartos == "varios-quartos") { 
			$quartosSql = " imob_quartos is not null ";
		}
		else { 
			$numero_quartos = explode("-", $quartos);
			
			if($numero_quartos[0] == 5) {
				$quartosSql = " imob_quartos >= " . (int) $numero_quartos[0] . " ";	
			}
			else {
				$quartosSql = " imob_quartos = " . (int) $numero_quartos[0] . " ";	
			}
		}

		/* Parâmetro quantidade de vagas. */
		if($vagas == "varias-vagas") { 
			$vagasSql = " imob_vagas is not null ";
		}
		else { 
			$numero_vagas = explode("-", $vagas);
			$vagasSql = " imob_vagas = " . (int) $numero_vagas[0] . " ";	
		}

		/* Parâmetro bairro. */
		if($bairro == "todos-bairros") { 
			$bairroSql = " imob_bairro is not null ";
		}
		else { 
			$bairro_anuncio = $bairro;
			$bairroSql = " imob_bairro = " . $bairro_anuncio. " ";	
		}

		/* Parâmetro cidade. */
		if($cidade == "todas-cidades") {
			
			$cidade = "todas as cidades";
			$cidadeSql = " imob_cidade is not null and ";
		}
		else { 
			$cidade_aux = $cidade;
			$cidade = str_replace("-", " ", $cidade); 

			/* Busca a ID da cidade escolhida na busca. */
			//$sql = "select id from cidades where nome = '" . $cidade . "' and uf='$estado'";
			//$rs = mysql_query($sql);
			//$cidade_id = mysql_fetch_assoc($rs);
			if(!empty($cidade)){
				$cidadeSql = " imob_cidade LIKE '%" . $cidade . "%' and ";	
			}
		}

		/* Parâmetro estado. */
		if($estado == "todos-estados") { 
			$estadoSql = " imob_estado is not null ";
		}
		else { 
			$estado_anuncio = str_replace("-", " ", $estado);
			$estadoSql = " imob_estado = '" . $estado_anuncio . "' ";	
		}		
		
		/* Parâmetro CEP. */
		if($cep == "todos-cep") { 
			$cepSql = " imob_cep is not null ";
		}
		else { 
			$cep = str_replace(".", "", $cep);
			$cep_anuncio = str_replace("-", "", $cep);
			$cepSql = " imob_cep = '" . $cep_anuncio . "' ";	
		}		
		
		/* Parâmetro condomínio. */
		if($condominio == "com-e-sem-condominio") { 
			$condominioSql = " (imob_condominio > 0.00 or imob_condominio = 0.00) ";
		}		
		else if($condominio == "com-condominio") { 
			$condominioSql = " imob_condominio > 0.00 ";
		}
		else { 
			$condominioSql = " imob_condominio = 0.00 ";
		}
		
		$Condition = " ( begin_time < '" . time() . "' and end_time > '" . time() . "' ) and (status is null or status = 1 ) and ( desativado is null or desativado !='s')  and ( pago = 'sim' or anunciogratis = 's' ) ";

		/* SQL para buscar anúncios de acordo com os parâmetros enviados. */

		if($idparceiro){
			$sql = "select * from team where " . $Condition . " and  partner_id = ".$idparceiro." order by rand()";
		}else{
			 $sql = "select * from team where " . $Condition . " and " . $cepSql . " and " . $anuncioSql . " and " . $tipoSql . " and " . $quartosSql . " and " . $vagasSql . " and " . $bairroSql . " and " . $cidadeSql . " " . $estadoSql . " and " . $condominioSql . " order by rand()";
		}

		$busca = mysql_query($sql);
		$row = mysql_num_rows($busca);

		if(empty($row)) {
			
			$rowA = 0;
		}
		else {
			
			$rowA = $row;
		}
		
	?>
	<body>
		<script type="text/javascript" src="<?=$ROOTPATH?>/js/FilterSearch.js"></script> 
		<style>
			section {
				background: none;
			}			
			.col.col-xs-12.col-sm-12.col-md-12.col-lg-12.nopadmar, .col.col-xs-12.col-sm-3.col-md-3.col-lg-3.sec-qr {
				width: 270px;
			}
			.form-inline {
				padding: 8px 11px;
			}
			.ul-linha2 {
				float: right;
				margin-right: 326px;
				margin-top: 33px;
			}
		</style>
		<script>
			jQuery('document').ready(function(){
				jQuery('#breadcrumb-quantidade').html(<?php echo $row; ?>);
			});
		</script>
		<div style="display:none;" class="tips"><?=__FILE__?></div>
		<div class="tail-top">  
			<?php
				require_once(DIR_BLOCO . "/bloco_busca_topo.php");
			?>
			<div class="main">
				
				<div id="resultado" class="container-fluid page-container">

					<?php require_once(DIR_BLOCO . "/header.php"); ?>
					<?php require_once(DIR_BLOCO. "/breadcrumb.php"); ?>
					<?php require_once(DIR_BLOCO. "/box_banner_search.php"); ?>  
					<?php require_once(DIR_BLOCO. "/filtro_pesquisa.php"); ?>
					<?php require_once(DIR_BLOCO. "/box_resultado.php"); ?>
				</div>
			</div>
		</div>
		<?php
			require_once(DIR_BLOCO . "/rodape.php");
		?>
	</body>
</html>