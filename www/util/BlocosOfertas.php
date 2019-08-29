<?php



class BlocosOfertas{

  	

	public $ofertadestaqueprincipal;	

	public $nomeurl; 		

	public $descricao; 	

	public $codigo; 	

	public $iptu; 	

	public $area; 	

	public $quartos; 	

	public $suites; 	

	public $banheiros; 	

	public $vagas; 	

	public $varandas; 	

	public $adicionais; 

	public $caracteristicas;

	public $economia; 	

	public $porcentagem; 	

	public $linkoferta; 	

	public $tituloferta; 	

	public $imagemoferta;        

	public $id;			 

	public $detalhe_oferta; 

	public $url_comprar; 

	public $metodo_pagamento; 

	public $bonuslimite;		 

	public $fim_oferta;		 

	public $inicio_oferta;	 

	public $tipo_oferta;		 

	public $obs_pagamento;	 

	public $venda_maxima;		 

	public $minimo_pessoa;	 

	public $minimo_ativar;	 

	public $id_parceiro;		 

	public $preco_comissao;	 

	public $id_categoria;		 

	public $id_cidade;

	public $id_estado;

	public $cidade;

	public $layout;			 

	public $vendidos;			 

	public $preco;			 

	public $processo_compra;			 

	public $preco_antigo;		  

	public $pre_number;		 

	public $per_number;		 

	public $imagemoferta2;

	public $imagemoferta3;

	public $imagemoferta4;

	public $imagemoferta5;

	public $imagemoferta6;

	public $imagemoferta7;

	public $imagemoferta8;	

	public $imagemoferta9;	

	public $imagemoferta10;	

	public $tambarraprogresso;	

	public $porcentoarrecadado;	

	public $oferta_ativa;	

	public $titulofertaresumo;	

	public $republicacao;	

	public $pontos;	

	public $pontosgerados;	

	public $mostrarpreco;	

	public $visualizados;	

	public $mostrarseguranca;	

	public $tipo_imovel;

	public $nome_cidade;

	public $nome_estado;

	public $financiamento;

	public $video1;

	public $video2;

	

	public function getDados($team,$nm_imagem=false){

  

		global $INI;

		

		$this->id 				= $team['id'];

		$this->pontosgerados  	= number_format($team['pontosgerados'],null,"",".");

		$this->pontos 		 	= number_format($team['pontos'],null,"",".");

		$this->oferta_ativa 	= false; 

		$this->detalhe_oferta	= $team['notice']; 

		$this->visualizados		= $team['visualizados']; 

		$this->republicacao		= $team['republicacao']; 

		$this->mostrarseguranca	= $team['mostrarseguranca']; 

		$this->metodo_pagamento	= $team['metodo_pagamento']; 

		$this->bonuslimite		= $team['bonuslimite']; 

		$this->mostrarpreco		= $team['mostrarpreco']; 

		$this->fim_oferta		= $team['end_time']; 

		$this->inicio_oferta	= $team['begin_time']; 

		$this->tipo_oferta		= $team['team_type']; 

		$this->obs_pagamento	= $team['detail']; 

		$this->venda_maxima		= $team['max_number'];

		$this->url_comprar		= $team['url_comprar'];

		$this->processo_compra	= $team['processo_compra'];

		$this->minimo_pessoa	= $team['minimo_pessoa'];

		$this->minimo_ativar	= $team['min_number'];

		$this->id_parceiro		= $team['partner_id']; 

		$this->id_categoria		= $team['group_id'];

		$this->id_cidade		= $team['city_id'];

		$this->id_estado		= $team['imob_estado'];

		$this->layout			= $team['layout'];

		$this->vendidos			= $team['now_number'];

		$this->pre_number		= $team['pre_number']; 

		$this->per_number		= $team['per_number']; 

		$this->restante			= $team['max_number'] - $team['now_number'];

		$this->tipo_imovel	 	= $team['imob_tipo'];

		$this->financiamento 	= $team['imob_financiamento'];
		
		$this->condominio		= $team['imob_condominio']; 

		

		if(!(empty($this->id_cidade))) {

			$this->nome_cidade = $this->id_cidade;

		}

		else {

			$this->nome_cidade = "--";

		}	

		

		if(!(empty($this->id_estado))) {

			$this->nome_estado = $this->getEstado($this->id_estado);

		}

		else {

			$this->nome_estado = "--";

		}

		

		if(!(empty($this->tipo_imovel))) {

			$sqlT = "select nome from tipoimoveis where id = " . $this->tipo_imovel;

			$rsT = mysql_query($sqlT);

			$imovel = mysql_fetch_assoc($rsT);

			$this->tipo_imovel = $imovel["nome"];

		}

		else {

			$this->tipo_imovel = "--";

		}

		

		if(!(empty($team['imob_codigo']))) {

			$this->codigo = $team['imob_codigo'];

		}

		else {

			$this->codigo = "--";

		}

		

		if(!(empty($team['imob_iptu']))) {

			$this->iptu = "R$ " . number_format($team['imob_iptu'], 2, ',', '.');

		}

		else {

			$this->iptu = "--";

		}		

		

		if(!(empty($team['imob_area'])) || $team['imob_area'] != 0) {

			$this->area = $team['imob_area'] . " m²";

		}

		else {

			$this->area = "--";

		}		

		

		if(!(empty($team['imob_quartos'])) || $team['imob_quartos'] != 0) {

			$this->quartos = $team['imob_quartos'];

		}

		else {

			$this->quartos = "--";

		}		

		

		if(!(empty($team['imob_suite'])) || $team['imob_suite'] != 0) {

			$this->suites = $team['imob_suite'];

		}

		else {

			$this->suites = "--";

		}		

		

		if(!(empty($team['imob_banheiro'])) || $team['imob_banheiro'] != 0) {

			$this->banheiros = $team['imob_banheiro'];

		}

		else {

			$this->banheiros = "--";

		}	

		

		if(!(empty($team['imob_vagas'])) || $team['imob_vagas'] != 0) {

			$this->vagas = $team['imob_vagas'];

		}

		else {

			$this->vagas = "--";

		}		

		

		if(!(empty($team['imob_varandas']))) {

			$this->varandas = $team['imob_varandas'];

		}

		else {

			$this->varandas = "--";

		}

		

		$this->verificatipo($team);

	

		$this->nomeurl 			= urlamigavel(tratanome($team['title']));

		$descricao 				= nl2br(utf8_decode($team['summary']));

		

		$adicionais = utf8_decode($this->getmaisdescricao($team, $adicionais));

		$caracteristicas = utf8_decode($this->getDescricaoImovel($team, $caracteristicas));

		$this->descricao 		= $descricao;

		$this->adicionais 		= explode(",", $adicionais);

		$this->caracteristicas 	= explode("&", $caracteristicas);

		$this->linkoferta 		= $this->getLinkOferta($team); 

		$this->tituloferta 		= buscaTituloAnuncio($team);



		if($this->metodo_pagamento=="dinheiro"){

			$this->titulofertaresumo = utf8_encode(substr(buscaTituloAnuncio($team),0,90) ."...") ;

		}

		else{

			$this->titulofertaresumo =  substr(buscaTituloAnuncio($team),0,90) ."..." ;

		}

		$this->oferta_esgotada	=	false;

		$this->oferta_cancelada	=	false;

		$this->preco_comissao   = 	number_format($team['preco_comissao'],2, ',', '.'); 

		$esgotado 				=	false;

		$end_time 				= 	date('YmdHis', $team['end_time']); 

		$date 					= 	date('YmdHis');

	 

	 	if($team['preco_comissao']!="" and $team['preco_comissao']!="0.00" ){

			$this->precovirtual		= $this->preco_comissao;

		}

		else{

			$this->precovirtual		= $this->preco;

		}

		

		if($this->tipo_oferta == "normal" or $this->tipo_oferta == "cupom"){

			if($team['max_number']!="" and $team['max_number']!=0){

				if((int)$this->vendidos >= (int)$this->venda_maxima){

					$this->oferta_esgotada=true;

				} 

			} 

			if( $end_time < $date ){

				$this->oferta_cancelada=true;

			}

		} 

		if( $end_time  < $date){

				$this->oferta_cancelada=true;

			}

			

		if(!$this->oferta_esgotada and !$this->oferta_cancelada and (int)$this->vendidos >= (int)$this->minimo_ativar){

			$this->oferta_ativa 	= true;

		}

		

		if($team['image'] != "" or !is_null($team['image'])){

			$this->imagemoferta 	= $INI['system']['wwwprefix']."/media/".$team['image'];

		}if($team['image1'] != "" or !is_null($team['image1'])){

			$this->imagemoferta2 	= $INI['system']['wwwprefix']."/media/".$team['image1'];

		}if($team['image2'] != "" or !is_null($team['image2'])){ 

			$this->imagemoferta3 	= $INI['system']['wwwprefix']."/media/".$team['image2']; 

		}if($team['gal_image1'] != "" or !is_null($team['gal_image1'])){

			$this->imagemoferta4 	= $INI['system']['wwwprefix']."/media/".$team['gal_image1'];

		}if($team['gal_image2'] != "" or !is_null($team['gal_image2'])){

			$this->imagemoferta5 	= $INI['system']['wwwprefix']."/media/".$team['gal_image2'];

		}if($team['gal_image3'] != "" or !is_null($team['gal_image3'])){

			$this->imagemoferta6 	= $INI['system']['wwwprefix']."/media/".$team['gal_image3']; 

		}if($team['gal_image4'] != "" or !is_null($team['gal_image4'])){

			$this->imagemoferta7 	= $INI['system']['wwwprefix']."/media/".$team['gal_image4'];

		}if($team['gal_image5'] != "" or !is_null($team['gal_image5'])){ 

			$this->imagemoferta8 	= $INI['system']['wwwprefix']."/media/".$team['gal_image5'];

		}if($team['gal_image6'] != "" or !is_null($team['gal_image6'])){ 

			$this->imagemoferta9 	= $INI['system']['wwwprefix']."/media/".$team['gal_image6']; 

		}if($team['gal_image7'] != "" or !is_null($team['gal_image7'])){ 		

			$this->imagemoferta10 	= $INI['system']['wwwprefix']."/media/".$team['gal_image7']; 

		}if($team['gal_image8'] != "" or !is_null($team['gal_image8'])){	

			$this->imagemoferta11 	= $INI['system']['wwwprefix']."/media/".$team['gal_image8'];

		}if($team['gal_image9'] != "" or !is_null($team['gal_image9'])){

			$this->imagemoferta12 	= $INI['system']['wwwprefix']."/media/".$team['gal_image9'];

		}if($team['gal_image10'] != "" or !is_null($team['gal_image10'])){

			$this->imagemoferta13 	= $INI['system']['wwwprefix']."/media/".$team['gal_image10'];

		}if($team['gal_image11'] != "" or !is_null($team['gal_image11'])){

			$this->imagemoferta14 	= $INI['system']['wwwprefix']."/media/".$team['gal_image11'];

		}if($team['gal_image12'] != "" or !is_null($team['gal_image12'])){

			$this->imagemoferta15 	= $INI['system']['wwwprefix']."/media/".$team['gal_image12'];

		}if($team['gal_image13'] != "" or !is_null($team['gal_image13'])){

			$this->imagemoferta16 	= $INI['system']['wwwprefix']."/media/".$team['gal_image13'];

		}if($team['gal_image14'] != "" or !is_null($team['gal_image14'])){

			$this->imagemoferta17 	= $INI['system']['wwwprefix']."/media/".$team['gal_image14'];

		}if($team['gal_image15'] != "" or !is_null($team['gal_image15'])){

			$this->imagemoferta18 	= $INI['system']['wwwprefix']."/media/".$team['gal_image15'];

		}if($team['gal_image16'] != "" or !is_null($team['gal_image16'])){

			$this->imagemoferta19 	= $INI['system']['wwwprefix']."/media/".$team['gal_image16'];

		}if($team['gal_image17'] != "" or !is_null($team['gal_image17'])){

			$this->imagemoferta20   = $INI['system']['wwwprefix']."/media/".$team['gal_image17'];

		}

		

		if(!(empty($team['video1']))) {

			$video					=  	explode("/", $team['video1']); 
			$video 					= 	end($video);
			$video					=  	explode("v=", $video); 	
			$this->video1 			= 	end($video);	 

		}

		else {

			$this->video1 = "--";

		}

		//$this->video2		 	= $INI['system']['wwwprefix']."/media/".$team['video2']; 		 

	}

	

	public function getDescricaoImovel($team, $caracteristicas) {

		

		if(!(empty($team["imob_codigo"]))) {

			$caracteristicas .= "Código: " . $team["imob_codigo"];

		}

		else {

			$caracteristicas .= "--";

		}				

		

		if(!(empty($team["imob_area"]))) {

			$caracteristicas .= "&Área total: " . $team["imob_area"] . "m²";

		}

		else {

			$caracteristicas .= "&--";

		}	

		

		if(!(empty($team["imob_area_p"]))) {

			$caracteristicas .= "&Área privativa: " . $team["imob_area_p"] . "m²";

		}

		else {

			$caracteristicas .= "&--";

		}		

		if(!(empty($team["imob_condominio"]))) {

			$caracteristicas .= "&Condomínio: R$ " . number_format($team["imob_condominio"],2,",",".");

		}

		else {

			$caracteristicas .= "&--";

		}

		

		if(!(empty($team["imob_quartos"]))) {

			$caracteristicas .=  "&Quartos: " . $team["imob_quartos"];

		}

		else {

			$caracteristicas .= "&--";

		}	

		

		if(!(empty($team["imob_suite"]))) {

			$caracteristicas .=  "&Suítes: " . $team["imob_suite"];

		}

		else {

			$caracteristicas .= "&--";

		}

		

		if(!(empty($team["imob_banheiro"]))) {

			$caracteristicas .=  "&Banheiros: " . $team["imob_banheiro"];

		}

		else {

			$caracteristicas .= "&--";

		}	

		

		if(!(empty($team["imob_vagas"]))) {

			$caracteristicas .=  "&Vagas: " . $team["imob_vagas"];

		}

		else {

			$caracteristicas .= "&--";

		}	

		

		if(!empty($team["team_price"]) && $this->mostrapreco == 1) {

			$caracteristicas .=  "&Preço: R$" . number_format($team["team_price"], 2, ",", ".");;

		}

		else {

			$caracteristicas .= "&--";

		}	

		

		

		if(!(empty($team["imob_iptu"]))) {

			$caracteristicas .=  "&IPTU: " . $team["imob_iptu"];

		}

		else {

			$caracteristicas .= "&--";

		}

		return $caracteristicas;

	}



	public function getCidade($idcidade){

		

			$sql 	= "select nome from cidades where id = " . $idcidade;

			$rsd 	= mysql_query($sql);

			$row 	= mysql_fetch_object($rsd) ; 

			return $row->nome;

					

	} 

	

	public function getEstado($idestado){

		

			$sql 	= "select nome from estados where uf = '" . $idestado . "'";

			$rsd 	= mysql_query($sql);

			$row 	= mysql_fetch_object($rsd) ; 

			return $row->nome;

					

	} 

	

	public function getmaisdescricao($team, $descricao){

		 		

		$addArray = explode(',', $team['imob_adicionais']);



		if(in_array("ArCondicionado", $addArray)) $descricao .=   "Ar Condicionado, "; 

		if(in_array("ArmarioCozinha", $addArray)) $descricao .=  "Armario de Cozinha, "; 

		if(in_array("ArmarioEmbutido", $addArray)) $descricao .=  "Armário Embutido, " ; 

		if(in_array("BanheiroIndependente", $addArray)) $descricao .=  "Banheiro Independente, "; 

		if(in_array("Canil", $addArray)) $descricao .=  "Canil, "; 

		if(in_array("Churrasqueira", $addArray)) $descricao .=  "Churrasqueira, "; 

		if(in_array("ConexaoInternet", $addArray)) $descricao .=  "Conexão com a Internet, "; 

		if(in_array("CozinhaMontada", $addArray)) $descricao .=  "Cozinha Montada"; 

		if(in_array("DependenciaEmpregada", $addArray)) $descricao .=  "Dependência de Empregados, "; 

		if(in_array("Despensa", $addArray)) $descricao .=  "Despensa, "; 

		if(in_array("EnergiaSolar", $addArray)) $descricao .=  "Energia Solar, "; 

		if(in_array("EspacoGourmet", $addArray)) $descricao .=  "Espaço Gourmet, "; 

		if(in_array("FrenteParaMar", $addArray)) $descricao .=  "De Frente Para o Mar, "; 

		if(in_array("GaragemCoberta", $addArray)) $descricao .=  "Garagem Coberta, "; 

		if(in_array("GaragemIndependente", $addArray)) $descricao .=  "Garagem Independente, "; 

		if(in_array("Hidromassagem", $addArray)) $descricao .=  "Hidromassagem, "; 

		if(in_array("Hidrometro", $addArray)) $descricao .=  "Hidromêtro Individual, "; 

		if(in_array("IsolamentoAcustico", $addArray)) $descricao .=  "Isolamento Acústico, "; 

		if(in_array("JanelaIsolamentoAcustico", $addArray)) $descricao .=  "Janelas com Isolamento Acústico, "; 

		if(in_array("Lavabo", $addArray)) $descricao .=  "Lavabo, "; 

		if(in_array("Lavanderia", $addArray)) $descricao .=  "Lavanderia, "; 

		if(in_array("Piscina", $addArray)) $descricao .=  "Piscina, "; 

		if(in_array("QdaPeteca", $addArray)) $descricao .=  "Quadra de Peteca, "; 

		if(in_array("QdaSquash", $addArray)) $descricao .=  "Quadra de Squash, "; 

		if(in_array("QdaTenis", $addArray)) $descricao .=  "Quadra de Tênis, "; 

		if(in_array("QdaPoliesportiva", $addArray)) $descricao .=  "Quadra Poliesportiva, "; 

		if(in_array("QuartoEmpregada", $addArray)) $descricao .=  "Quarto de Empregada, "; 

		if(in_array("Sauna", $addArray)) $descricao .=  "Sauna, "; 

		if(in_array("TVACabo", $addArray)) $descricao .=  "TV à Cabo, "; 

		if(in_array("Varanda", $addArray)) $descricao .=  "Varanda, "; 

		if(in_array("VistaDefinitiva", $addArray)) $descricao .=  "Vista Definitiva, "; 

		if(in_array("AndarInteiro", $addArray)) $descricao .=  "Andar Inteiro, "; 

		if(in_array("AreaPrivativa", $addArray)) $descricao .=  "Área Privativa, "; 

		if(in_array("EstacVisitas", $addArray)) $descricao .=  "Estacionamento para Visitas, "; 

		if(in_array("ArCondCentral", $addArray)) $descricao .=  "Ar Condicionado Central, "; 

		if(in_array("AreaVerde", $addArray)) $descricao .=  "Área Verde, "; 

		if(in_array("Bicicletario", $addArray)) $descricao .=  "Bicicletário, "; 

		if(in_array("CampoFutebol", $addArray)) $descricao .=  "Campo de Futebol, "; 

		if(in_array("Heliponto", $addArray)) $descricao .=  "Heliponto, "; 

		if(in_array("Interfone", $addArray)) $descricao .=  "Interfone, "; 

		if(in_array("LavanderiaColetiva", $addArray)) $descricao .=  "Lavanderia Coletiva, "; 

		if(in_array("Playground", $addArray)) $descricao .=  "Playground, "; 

		if(in_array("Restaurante", $addArray)) $descricao .=  "Restaurante, "; 

		if(in_array("SaladeGinastica", $addArray)) $descricao .=  "Sala de Ginástica, "; 

		if(in_array("SalaoDeFesta", $addArray)) $descricao .=  "Salão de Festa, "; 

		if(in_array("SalaoDeJogos", $addArray)) $descricao .=  "Salão de Jogos, "; 

		if(in_array("BloqueioElevador", $addArray)) $descricao .=  "Bloqueio de Elevador, "; 

		if(in_array("CercaEletrica", $addArray)) $descricao .=  "Cerca Elétrica, "; 

		if(in_array("CircuitoInternoTV", $addArray)) $descricao .=  "Circuito Interno de TV, "; 

		if(in_array("ElevadorComSenha", $addArray)) $descricao .=  "Elevador com Senha, "; 

		if(in_array("GuaritaPortaria", $addArray)) $descricao .=  "Guarita na Portaria, "; 

		if(in_array("Porteiro12Horas", $addArray)) $descricao .=  "Porteiro 12 Horas, "; 

		if(in_array("Porteiro24Horas", $addArray)) $descricao .=  "Porteiro 24 Horas, "; 

		if(in_array("SegurancaInterna", $addArray)) $descricao .=  "Segurança Interna, "; 

		if(in_array("SegurancaNaRua", $addArray)) $descricao .=  "Segurança na Rua, "; 

		if(in_array("SegurancaPatrimonial", $addArray)) $descricao .=  "Segurança Patrimonial"; 



		return $descricao;

	}

	public function verificatipo($team){

	  

			 if($this->tipo_oferta =="pacote"){

			 

				// busca a oferta filha com valor mais barato para substituir no detalhe da oferta pacote

				$sql 	= "select id,team_price,market_price from team where idpacote = ".$team['id']."  and begin_time < '".time()."' and end_time > '".time()."' and now_number < max_number order by team_price asc limit 1 ";

				$rsd 	= mysql_query($sql);

				$row 	= mysql_fetch_assoc($rsd) ; 

			 

				if(mysql_num_rows($rsd)>0){

					$this->preco			= number_format($row['team_price'], 2, ',', '.'); 

					$this->preco_antigo		= number_format($row['market_price'], 2, ',', '.');  

					$this->economia 		= number_format($row['market_price'] - $row['team_price'],2, ',', '.'); 

					$this->porcentagem 		= round(100 - $row['team_price']/$row['market_price']*100,0);

				}

				else{

					$sql 	= "select id,team_price,market_price from team where idpacote = ".$team['id']."  order by team_price asc limit 1 ";

					$rsd 	= mysql_query($sql);

					$row 	= mysql_fetch_assoc($rsd) ; 

					

					$this->preco			= number_format($row['team_price'], 2, ',', '.'); 

					$this->preco_antigo		= number_format($row['market_price'], 2, ',', '.');  

					$this->economia 		= number_format($row['market_price'] - $row['team_price'],2, ',', '.'); 

					$this->porcentagem 		= round(100 - $row['team_price']/$row['market_price']*100,0);

				}

			}

			else{

				$this->preco			= number_format($team['team_price'], 2, ',', '.'); 

				$this->preco_antigo		= number_format($team['market_price'], 2, ',', '.');  

				$this->economia 		= number_format($team['market_price'] - $team['team_price'],2, ',', '.'); 

				$this->porcentagem 		= round(100 - $team['team_price']/$team['market_price']*100,0);	

			}

	}

	

	public function ofertas_destaques(){ 

	  

		global $city,$PATHSKIN;

		

		$order = " order by `sort_order` DESC, `id` DESC ";

		if( $INI['option']['ofertasdestaquerand'] == "Y"){

			$order =  "order by rand()";

		} 

	  

		$sql 		 = "select * from team where id <> ".$this->ofertadestaqueprincipal." and  posicionamento = 1 and city_id in(".$city['id'].",0 )  and begin_time < '".time()."' and end_time > '".time()."' and now_number < max_number $order ";

		$rsd 		 = mysql_query($sql);

		

		while ($team = mysql_fetch_assoc($rsd)) {

		

			$this->getDados($team);

			include(DIR_BLOCO."/bloco_oferta_meio_home.php");

			

		 }  

	}

	public function ofertas_destaques_website_produtoafiliado(){ 

	    global $PATHSKIN;

		

		$order = " order by `sort_order` DESC, `id` DESC ";

		if( $INI['option']['ofertasdestaquerand'] == "Y"){

			$order =  "order by rand()";

		} 

	  

		$sql 		 = "select * from produtos_afiliados where id <> ".$this->ofertadestaqueprincipal." and posicionamento = 1 and  begin_time < '".time()."' and end_time > '".time()."'  $order ";

		$rsd 		 = mysql_query($sql);

		

		while ($team = mysql_fetch_assoc($rsd)) {

		

			$this->getDados($team);

			include(DIR_BLOCO."/bloco_oferta_meio_home.php");

			

		 }

	}

	

	public function getLinkOferta($team){ 

	     global $INI;

		 

		 $destino =  "produto";

		 

	    return $INI['system']['wwwprefix']."/".$destino."/". $team['id']."/".urlamigavel( tratanome(buscaTituloAnuncio($team)));

	}	

	

	public function getComissao($team){ 

	       

		if($team){

			if($team['preco_comissao'] != "" and $team['preco_comissao'] != "0" and $team['preco_comissao'] != "0.00"){

				$comissao = true;

				return number_format($team['preco_comissao'], 2, ',', '.');

			}

		}

		return false;

	}	

	 

	public function ofertas_recentes($start,$per_page,$idofertadetalhe=false){ 

	    global  $city,$PATHSKIN,$INI,$ROOTPATH;

		 

		 $this->getOfertaDestaqueHome();

		 

		if($_REQUEST["idcategoria"]){

			$sqlcat =  " and group_id = ".$_REQUEST["idcategoria"];

		}

		if($idofertadetalhe){

			$sqlcat .=" and id <> ".$idofertadetalhe;

		}

	 



		$sql 		= "select * from partner where tipo='Imobiliaria' order by id DESC limit $start,$per_page";

		$rsd 		= mysql_query($sql);

		  

		while ($partner = mysql_fetch_assoc($rsd))







		{ 

			 include(DIR_BLOCO."/lista_imobiliarias.php"); 

			 

		}

		return $temoferta;

	}



	public function lista_construtores($start,$per_page,$idofertadetalhe=false){ 

	    global  $city,$PATHSKIN,$INI,$ROOTPATH;

		 

		 $this->getOfertaDestaqueHome();

		 

		if($_REQUEST["idcategoria"]){

			$sqlcat =  " and group_id = ".$_REQUEST["idcategoria"];

		}

		if($idofertadetalhe){

			$sqlcat .=" and id <> ".$idofertadetalhe;

		}

	 



		$sql 		= "select * from partner where tipo='construtor' or tipo='Construtor' order by id DESC limit $start,$per_page";

		$rsd 		= mysql_query($sql);

		  

		while ($partner = mysql_fetch_assoc($rsd))







		{ 

			 include(DIR_BLOCO."/lista_imobiliarias.php"); 

			 

		}

		return $temoferta;

	}



	public function lista_corretores($start,$per_page,$idofertadetalhe=false){ 

	    global  $city,$PATHSKIN,$INI,$ROOTPATH;

		 

		 $this->getOfertaDestaqueHome();

		 

		if($_REQUEST["idcategoria"]){

			$sqlcat =  " and group_id = ".$_REQUEST["idcategoria"];

		}

		if($idofertadetalhe){

			$sqlcat .=" and id <> ".$idofertadetalhe;

		}

	 



		$sql 		= "select * from partner where tipo='Corretor' or tipo='corretor' order by id DESC limit $start,$per_page";

		$rsd 		= mysql_query($sql);

		  

		while ($partner = mysql_fetch_assoc($rsd))







		{ 

			 include(DIR_BLOCO."/lista_imobiliarias.php"); 

			 

		}

		return $temoferta;

	}



	  

	public function produtoafiliado_categoria($start,$per_page){ 

	

	    global  $city,$PATHSKIN,$INI,$ROOTPATH;

		 

		$sql 		= "select * from produtos_afiliados where posicionamento <> 5 and begin_time < '".time()."' and group_id = ".$_REQUEST['idcategoria']." order by `begin_time` DESC , `now_number` DESC limit $start,$per_page ";

		$rsd 		= mysql_query($sql);

		   

		while ($value = mysql_fetch_assoc($rsd))

		{ 

			$temoferta = true;

			$this->getDados($value,"recentes_mod2.jpg");

			include(DIR_BLOCO."/bloco_recentes.php"); 

			 

		}

		return $temoferta;

	}	

	

	public function ofertas_categoria($start,$per_page){ 

	

	    global  $city,$PATHSKIN,$INI,$ROOTPATH ;

		 

		$sql 		= "select * from team where  begin_time < '".time()."' and group_id = ".$_REQUEST['idcategoria']." order by `begin_time` DESC  limit $start,$per_page ";

		$rsd 		= mysql_query($sql);



		if(!$rsd){

				echo mysql_error();

				exit;

		}

		

		while ($value = mysql_fetch_assoc($rsd))

		{ 

			$temoferta = true;

			$this->getDados($value,"recentes_mod2.jpg");

			 

			require DIR_BLOCO."/bloco_recentes.php"; 

			 

		}

		return $temoferta;

	}		



	

	public function tem_outras_ofertas(){ 

	

		global $city,$id_ofertas_destaque, $idoferta,$id_oferta_destaque,$idcidade,$horaatual;

 

		if($this->ofertadestaqueprincipal != ""){

			$sqlaux = " and id not in (".$this->ofertadestaqueprincipal.")";

		} 

		if($id_oferta_destaque!= ""){ // oferta destaque

			$sqlaux .= " and id not in ($id_oferta_destaque)";

		} 

		if($id_ofertas_destaque!= ""){ // multi ofertas destaques

			$sqlaux.= " and id not in ($id_ofertas_destaque)";

		} 

		$sql   = "select id from team where  city_id in(".$city['id'].",0 ) and posicionamento=4 and  begin_time < '".time()."' and end_time > '".time()."' $sqlaux order by `sort_order` DESC, `id` DESC LIMIT 1";

		$maisofertas  	= mysql_query($sql);

		if(mysql_num_rows($maisofertas) > 0){

			return true;

		}

		else{

			return false;

		}

	}	

	

	public function tem_ofertas_cidade(){ 

	

		global $city ;



		$posicao = "3,4,1,5";

 

		if($this->ofertadestaqueprincipal != ""){

		//	$sqlaux = " and id not in (".$this->ofertadestaqueprincipal.")";

		} 

		if($id_oferta_destaque!= ""){ // oferta destaque

		//	$sqlaux .= " and id not in ($id_oferta_destaque)";

		} 

		if($id_ofertas_destaque!= ""){ // multi ofertas destaques

			//$sqlaux.= " and id not in ($id_ofertas_destaque)";

		} 

	    $sql   = " select id from team where city_id in(".$city['id'].",0 )   and begin_time < '".time()."' and end_time > '".time()."' $sqlaux  limit 1 ";

		$maisofertas  	= mysql_query($sql);

		if(mysql_num_rows($maisofertas) > 0){

			return true;

		}

		else{

			return false;

		}

	}

	public function tem_ofertas_anunciante($idanunciante){ 

	  

		$sql   = " select id from produtos_afiliados where partner_id=$idanunciante and  begin_time < '".time()."' and end_time > '".time()."' and posicionamento <> 5 order by `sort_order` DESC, `id` DESC  limit 1 ";

		$maisofertas  	= mysql_query($sql);

		if(mysql_num_rows($maisofertas) > 0){

			return true;

		}

		else{

			return false;

		}

	}

	

	public function tem_ofertas_parceiro_posicao($posicao){ 

	

		global $city,$id_oferta_destaque,$idoferta ;

  

		if($this->ofertadestaqueprincipal != ""){

			$sqlaux = " and id not in (".$this->ofertadestaqueprincipal.")";

		} 

		if($id_oferta_destaque!= ""){ // oferta destaque

			$sqlaux .= " and id not in ($id_oferta_destaque)";

		} 

		if($id_ofertas_destaque!= ""){ // multi ofertas destaques

			$sqlaux.= " and id not in ($id_ofertas_destaque)";

		} 

	    $sql   = "select id from team where city_id in(".$city['id'].",0 ) and posicionamento in($posicao) and begin_time < '".time()."' and end_time > '".time()."' $sqlaux order by `sort_order` DESC, `id` DESC limit 1";

		$maisofertas  	= mysql_query($sql);

		if(mysql_num_rows($maisofertas) > 0){

			return true;

		}

		else{

			return false;

		}

	}

	

	public function tem_ofertas_afiliado_posicao($posicao){ 

	

		global $city,$id_oferta_destaque,$idoferta ;

  

		if($this->ofertadestaqueprincipal != ""){

			$sqlaux = " and id not in (".$this->ofertadestaqueprincipal.")";

		} 

		if($id_oferta_destaque!= ""){ // oferta destaque

			$sqlaux .= " and id not in ($id_oferta_destaque)";

		} 

		if($id_ofertas_destaque!= ""){ // multi ofertas destaques

			$sqlaux.= " and id not in ($id_ofertas_destaque)";

		} 

		$sql   = "select id from produtos_afiliados where  posicionamento in($posicao) and begin_time < '".time()."' and end_time > '".time()."' $sqlaux order by `sort_order` DESC, `id` DESC limit 1";

		$maisofertas  	= mysql_query($sql);

		if(mysql_num_rows($maisofertas) > 0){

			return true;

		}

		else{

			return false;

		}

	}

  

	public function blocos_website_produtosafiliados($posicao){ 

	

		global $idoferta,$city,$PATHSKIN,$INI;

	 

		if($this->ofertadestaqueprincipal != ""){

			$sqlaux = " and id not in (".$this->ofertadestaqueprincipal.")";

		} 

		$sql  			= "select * from produtos_afiliados where posicionamento in($posicao) and begin_time < '".time()."' and end_time > '".time()."' $sqlaux order by `sort_order` DESC, `id` DESC ";

		$result  		= mysql_query($sql);	



		while ($value = mysql_fetch_assoc($result)){ 



			$botao = "btn-quero.png";

			if($value['team_type']=="off"){

				$botao = "bt_imprimir_cupom.png";

			}

			else if($value['team_type']=="cupom"){

				$botao = "comprar_cupom.png";

			} 

			 $this->getDados($value,"lateral.jpg"); 

			 include(DIR_BLOCO."/bloco_oferta.php"); 

		}

	}

	

	public function coluna_direita($posicao){ 

	

		global $idoferta,$city,$PATHSKIN,$INI;



		if($this->ofertadestaqueprincipal != ""){

			$sqlaux = " and id not in (".$this->ofertadestaqueprincipal.")";

		} 

		 

		$order = " order by `sort_order` DESC, `id` DESC ";

		if( $INI['option']['rand_direita'] == "Y"){

			$order =  "order by rand()";

		}

		if( $INI['option']['ofertas_finalizadas_direita'] == "N"){

			$condicao =  " and end_time > '".time()."'";

		} 



	     $sql  			= "select * from team where posicionamento in($posicao)  and city_id in(0,".$city['id']." )  and begin_time < '".time()."' $sqlaux  $condicao $order ";

		$result  		= mysql_query($sql);	



		while ($value = mysql_fetch_assoc($result)){ 

    

			if( !strpos($_SERVER["QUERY_STRING"],"IDOFERTASDESTAQUE")){

			 }

			$botao = "btn-quero.png";

			if($value['team_type']=="off"){

				$botao = "bt_imprimir_cupom.png";

			}

			else if($value['team_type']=="cupom"){

				$botao = "comprar_cupom.png";

			} 

			

			if($posicao=="10"){

				$this->getDados($value,"lateral_nacional.jpg"); 

				include(DIR_BLOCO."/bloco_oferta_nacional.php");  

			}

			else{

				$this->getDados($value,"lateral.jpg"); 

				include(DIR_BLOCO."/bloco_oferta_direita.php"); 

			}

		}

	}

	

	public function blocos($posicao){ 

	

		global $idoferta,$city,$PATHSKIN,$INI;



		if($this->ofertadestaqueprincipal != ""){ 

			$sqlaux = " and id not in (".$this->ofertadestaqueprincipal.")";

		} 

		else if($idoferta != ""){ 

			$sqlaux = " and id not in (".$idoferta.")";

		} 

		if($sqlaux==""){

			$posicao = "4";

		}

	    $sql  			= "select * from team where posicionamento in($posicao)  and city_id in(0,".$city['id']." )  and begin_time < '".time()."' and end_time > '".time()."' $sqlaux order by `sort_order` DESC, `id` DESC ";

		$result  		= mysql_query($sql);	

 

		while ($value = mysql_fetch_assoc($result)){ 

    

			if( !strpos($_SERVER["QUERY_STRING"],"IDOFERTASDESTAQUE")){

			 }

		 

			 $this->getDados($value,"lateral.jpg"); 

			 include(DIR_BLOCO."/bloco_oferta.php"); 

		}

	}

	

	public function getBlocoPrincipal($idoferta){ 

		global $PATHSKIN,$login_user_id,$INI,$ROOTPATH,$team,$city;

		require_once(DIR_BLOCO."/bloco_home.php");

		 

	}		

	

	public function getBlocoDetalheProduto($idoferta,$tipo=null){ 

		global $PATHSKIN,$login_user_id,$INI,$ROOTPATH,$team,$login_user;

		

		$partner   = Table::Fetch('partner',$team['partner_id']);

		require_once(DIR_BLOCO."/detalhe_produto.php"); 

	}		

	

	public function getBlocoDireita(){ 

		global $PATHSKIN,$login_user_id,$INI,$ROOTPATH,$team;

		include_once(DIR_BLOCO."/coluna_direita.php");

		 

	}	

	 

	public function getOferta($idOferta){ 

	

		$sql  			= "select * from team where team_id = $idOferta ";

		$result  		= mysql_query($sql);

		$team 			= mysql_fetch_assoc($result);



		$nomeurl 	=    urlamigavel( tratanome($value['title'])) ;

		$temoferta	=	true;

		$end_time 	= 	date('YmdHis', $value['end_time']); 

		$date 		= 	date('YmdHis');

		$ofertafechada = false;

		 if( $end_time  < $date){

			$ofertafechada = true;

			 continue;

		  }

		$esgotado =	false;

		if($value['now_number'] >= $value['max_number']){

			$esgotado=true;

		}

		$discount_rate = round(100 - $value['team_price']/$value['market_price']*100,0);

		$summary = substr($value['summary'],0,200)."...";

		

		if($value['now_number'] < $value['min_number']){  

			$min = $value['min_number'] - $value['now_number'] ; 

		}

		$imagem  	=  $value['image'] ; 

		if( !strpos($_SERVER["QUERY_STRING"],"IDOFERTASDESTAQUE")){

			//$value['title'] =  utf8_decode($value['title']);

		 }

		$botao = "btn-quero.png";

		if($value['team_type']=="off"){

			$botao = "bt_imprimir_cupom.png";

		}

		else if($value['team_type']=="cupom"){

			$botao = "comprar_cupom.png";

		}

		 

		$comissao = false;

		if($team['preco_comissao'] != "" and $team['preco_comissao'] != "0" and $team['preco_comissao'] != "0.00"){

			$comissao = true;

			$valoronline = number_format($team['preco_comissao'], 2, ',', '.');

		}

	

		$team['economia'] 		= number_format($team['market_price'] - $team['team_price'],2);

		$team['linkoferta']		= $INI['system']['wwwprefix']."/produto/". $team['id']."/".urlamigavel( tratanome(buscaTituloAnuncio($team))) ;

		$team['tituloferta'] 	= utf8_decode(buscaTituloAnuncio($team)); 

		$team['imagemoferta'] 	= $INI['system']['wwwprefix']."/media/".$team['image']; 

		$team['desconto'] 		= round(100 - $team['team_price']/$team['market_price']*100,0);

		

		return $team;

		  

	} 



	public function getOfertaDestaqueHome($idoferta=false){ 

	

		global $city,$INI,$ROOTPATH;

		$horaatual =  time();  

		 

		 $order = " order by `sort_order` DESC, `id` DESC "; 

		 $sql   = "select * from team where posicionamento in(6)  and city_id in(0,".$city['id']." )  and begin_time < '".time()."' and end_time > '".time()."' $order limit 1";

		 $result  		= mysql_query($sql);

		  

		 if($idoferta){ 

			$aux_imagem= "destaque.jpg";

			$sql  			= "select * from team where id = $idoferta $order limit 1";

			$result  		= mysql_query($sql);

		 }

		 

		if(mysql_num_rows($result) == 0){

			$sql  			= "select * from team where posicionamento <> '5' and city_id in(0,".$city['id']." )  and begin_time < '".time()."' and end_time > '".time()."' $order  limit 1";

			$result  		= mysql_query($sql);

		}

		 

		$team 	= mysql_fetch_assoc($result); 

		

		if($team){

		

			$this->ofertadestaqueprincipal = $team['id'];

			$this->getDados($team,$aux_imagem);

		   

		}

		

		return $team;

	 

	}



}



 

?>