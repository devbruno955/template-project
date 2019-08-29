<?php  
		 require_once("include/head.php");
		
		/* Par�metros recebidos via GET que ser�o utilizados em todos os blocos
		   desta p�gina.	
		*/

		$parametros = explode("/",$_GET["parametros"]);
		//print_r($parametros);
		$anuncio 	= strip_tags($_GET["anuncio"]);
		$tipo 		= $parametros[0];
		$quartos 	= $parametros[1];
		$vagas 		= $parametros[2];
		$bairro 	= $parametros[3];
		$cidade 	= $parametros[4];;
		$estado 	= $parametros[5];;	
		$idparceiro = 	strip_tags($_GET["idparceiro"]);
	
		/* Par�metro tipo de an�ncio. */
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
			$anuncioSql = " imob_finalidade = '" . $anuncioSearch . "' ";
		}
		else { 
			$anuncioSql = " imob_finalidade is not null ";
		}

		/* Par�metro tipo de im�vel. */
		if($tipo == "todos-tipos") { 
			$tipoSql = " imob_tipo is not null ";
		}
		else { 
			$tipo . "<br />";
			$tipos_imoveis = str_replace("-", " ", $tipo);
			
			/* Busca a ID do tipo de im�vel escolhido na busca. */
			$sql = "select id from tipoimoveis where nome = '" . $tipos_imoveis . "'";
			$rs = mysql_query($sql);
			$tipo_id = mysql_fetch_assoc($rs);
			$tipoSql = " imob_tipo = '" . $tipo_id['id'] . "' ";
		}

		/* Par�metro quantidade de quartos. */
		if($quartos == "varios-quartos") { 
			$quartosSql = " imob_quartos is not null ";
		}
		else { 
			$numero_quartos = explode("-", $quartos);
			$quartosSql = " imob_quartos = " . (int) $numero_quartos[0] . " ";	
		}

		/* Par�metro quantidade de vagas. */
		if($vagas == "varias-vagas") { 
			$vagasSql = " imob_vagas is not null ";
		}
		else { 
			$numero_vagas = explode("-", $vagas);
			$vagasSql = " imob_vagas = " . (int) $numero_vagas[0] . " ";	
		}

		/* Par�metro bairro. */
		if($bairro == "todos-bairros") { 
			$bairroSql = " imob_bairro is not null ";
		}
		else { 
			$bairro_anuncio = str_replace("-", " ", $bairro);
			$bairroSql = " imob_bairro = '" . $bairro_anuncio . "' ";	
		}

		/* Par�metro cidade. */
		if($cidade == "todas-cidades") {
			
			$cidade = "todas as cidades";
			$cidadeSql = " imob_cidade is not null and ";
		}
		else { 
			$cidade = str_replace("-", " ", $cidade); 
			/* Busca a ID da cidade escolhida na busca. */
			//$sql = "select id from cidades where nome = '" . $cidade . "' and uf='$estado'";
			//$rs = mysql_query($sql);
			//$cidade_id = mysql_fetch_assoc($rs);
			if(!empty($cidade)){
				$cidadeSql = " imob_cidade LIKE '%" . removeAcentos(utf8_decode($cidade)) . "%' and ";	
			}
		}

		/* Par�metro estado. */
		if($estado == "todos-estados") { 
			$estadoSql = " imob_estado is not null ";
		}
		else { 
			$estado_anuncio = str_replace("-", " ", $estado);
			$estadoSql = " imob_estado = '" . $estado_anuncio . "' ";	
		}		
		
		/* Par�metro CEP. 
		if($cep == "todos-cep") { 
			$cepSql = " imob_cep is not null ";
		}
		else { 
			$cep = str_replace(".", "", $cep);
			$cep_anuncio = str_replace("-", "", $cep);
			$cepSql = " imob_cep = '" . $cep_anuncio . "' ";	
		}*/
		
		$Condition = "( begin_time < '" . time() . "' and end_time > '" . time() . "' ) and (status is null or status = 1 ) and ( desativado is null or desativado !='s')  and ( pago = 'sim' or anunciogratis = 's' ) ";

		/* SQL para buscar an�ncios de acordo com os par�metros enviados. */

		if($idparceiro){
			$sql = "select * from team where  " . $Condition . "   and  partner_id = ".$idparceiro." order by create_time limit 20";
		}else{
			$sql = "select * from team where  " . $Condition . " and " . $anuncioSql . " and " . $tipoSql . " and " . $quartosSql . " and " . $vagasSql . " and " . $bairroSql . " and " . $cidadeSql . " " . $estadoSql . " order by create_time limit 20";
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
<div style="display:none;" class="tips"><?=__FILE__?></div> 
	<body id="page1" class="webstore home">	
		<!-- Responsivo -->
		<div class="containerM">
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/header.php"); ?>
				<div class="titlePage">
					<p>Buscando im�veis</p>
				</div>		
				<?php require_once(DIR_BLOCO_M . "/bloco_filtroM.php"); ?>
			</div>			
			<div class="row">
				<div class="titlePage">
					<p>Resultados da busca</p>
				</div>	
				<?php require_once(DIR_BLOCO_M . "/searchM.php"); ?>				
			</div>				
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/rodapeM.php"); ?>				
			</div>			
		</div>
	</body>
</html>
