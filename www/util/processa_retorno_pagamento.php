<?php
  
 if($RetornoPagamento->status_transacao == STATUS_APROVADO){
 
	Util::log($RetornoPagamento->id_anuncio." - Status aprovado. Preparando para atualizar tabela de anuncios.");
	Util::log($RetornoPagamento->id_anuncio. " - Verificando a existencia do anuncio...");
	
	/***************************** TRATAMENTO DE SERVICO E CREDITO ****************************************/
	if($RetornoPagamento->pedido_inexistente){
		Util::log($RetornoPagamento->id_anuncio. " - anuncio nao foi localizado nos registros. Parando retorno.");  
		exit;
	}
	else{
		Util::log($RetornoPagamento->id_anuncio. " - Anuncio ". $RetornoPagamento->id_anuncio." encontrado. Verificando status do pagamento.");
	} 
	
	/***************************** INICIO DA ATUALIZACAO DO ANUNCIO NO SITE ****************************************/
	 
	if($RetornoPagamento->status_pedido_site == '' or $RetornoPagamento->status_pedido_site == 'nao' or $republica=="true"){  // se o anuncio estiver com status ja pago porem for uma republicacao, devera proceguir
		Util::log($RetornoPagamento->id_anuncio. " - Anuncio encontrado com status nao pago. Preparando para atualizar...");
		 
		  if($republica=="true"){
				Util::log($RetornoPagamento->id_anuncio. " - republicacao retorno automatico.");
				$idanuncio = $RetornoPagamento->id_anuncio;
				$team = Table::Fetch('team', $idanuncio);

				$idplano =  busca_plano_cliente($team['partner_id']);
				alteradatafim_anuncio($idanuncio,$idplano); 
			  
				$partner_plano_id = get_partner_plano_id($team['partner_id']);
				
				if($partner_plano_id == $team[partner_plano_id]){
				
					$sql =	"update team set contador=contador+1 where id=".$idanuncio;
					$rs =    mysql_query($sql);	
				} 
				atualiza_partner_plano_id($idanuncio,$partner_plano_id); 
				
			//$RetornoPagamento->id_anuncio = verificarepublicacao($republica,$RetornoPagamento->id_anuncio);
		 }
		 
	     Util::log($RetornoPagamento->id_anuncio. " - alterando o periodo do anuncio");
		 insere_dados_pagamento($RetornoPagamento->id_anuncio,$RetornoPagamento->idPedido,$RetornoPagamento->valor_unitario,$RetornoPagamento->partner_id,$idplano,"Sucesso","Retorno Automatico - ".$RetornoPagamento->status_transacao);
	     
		Util::log($RetornoPagamento->id_anuncio. " - buscando o id da tabela partner_planos para atualizar o status");		 
		//$dias 	= getdiasplano($idplano);
		 
		$sql =	"select id from partner_planos where partner_id=".$RetornoPagamento->partner_id." and plano_id=".$idplano. " order by id DESC limit 1";
		$rs = @mysql_query($sql);
		$row = mysql_fetch_object($rs);
		$id = $row->id;
		
		Util::log($RetornoPagamento->id_anuncio. " - $sql");
		
		Util::log($RetornoPagamento->id_anuncio. " - Atualizando a tabela partner_planos com status pago para id $id ");
		$sql =	"update partner_planos set status='pago' where id=".$id;
		$rs = @mysql_query($sql);
		if($rs){
			Util::log($RetornoPagamento->id_anuncio. " - atualizacao partner_planos feita com sucesso");
		}
		else{
			Util::log($RetornoPagamento->id_anuncio. " - Nao foi possivel atualizar partner_planos  ".mysql_error());
		}
		
		Util::log($RetornoPagamento->id_anuncio. " - $sql");
		
		Util::log($RetornoPagamento->id_anuncio. " - Atualizando a quantidade de anuncios para o plano escolhido... id anunciante: ".$RetornoPagamento->partner_id);
		   	
		 $planos_publicacao = Table::Fetch('planos_publicacao', $idplano); 
	  
		$qtdeanuncio = $planos_publicacao['qtdeanuncio'];
		if(!empty($qtdeanuncio)){
		
				$partner = Table::Fetch('partner', $RetornoPagamento->partner_id );
				Util::log($RetornoPagamento->id_anuncio. " - quantidade no campo atual do anunciante: ".$partner['max_anuncios']);
				
				if(empty($partner['max_anuncios']) or $partner['max_anuncios'] == -1 ){
					$sql	=	"update partner set max_anuncios=".$qtdeanuncio." where id=".$RetornoPagamento->partner_id;
					$rs =      mysql_query($sql);
					if($rs){
						Util::log($RetornoPagamento->id_anuncio. " - atualizado para exatos $qtdeanuncio anuncios no pacote");
					}
					else{
						Util::log($RetornoPagamento->id_anuncio. " - erro na atualizaчуo para exatos $qtdeanuncio anuncios no pacote");
					}
			
				}
				else{
					$sql	=	"update partner set max_anuncios=max_anuncios+".$qtdeanuncio." where id=".$RetornoPagamento->partner_id;
					$rs = @mysql_query($sql);
					if($rs){
						Util::log($RetornoPagamento->id_anuncio. " - atualizado para  ".$partner['max_anuncios']." +  $qtdeanuncio anuncios no pacote");
					}
					else{
						Util::log($RetornoPagamento->id_anuncio. " - erro na atualizaчуo para ".$partner['max_anuncios']." + $qtdeanuncio anuncios no pacote");
					}
				}
			 
			if($planos_publicacao['ehdestaque']=="Y"){
				$aux = ",ehdestaque='Y'";
			}	 	
		
			$sql =	"update team set usou_bonus='sim',pago='sim' $aux where id=".$RetornoPagamento->id_anuncio;
			$rs = @mysql_query($sql);
			if($rs){
				Util::log($RetornoPagamento->id_anuncio. " - Campo usou_bonus e pago atualizado para sim com sucesso");
			}
			else{
				Util::log($RetornoPagamento->id_anuncio. " - Nao foi possivel atualizar o campo usou_bonus e pago. ".mysql_error());
			}
			 /*
			 ID PLANO JС Щ INSERIDO NA TELA DE ESCOLHA DO PLANO AO CLICAR EM PAGAR 
			if( $idplano ){
				$dias 	= getdiasplano($idplano);
				$sql	=	"INSERT INTO `partner_planos`( partner_id,data, plano_id,dias ) values ( '".$RetornoPagamento->partner_id."','".$data."','".$idplano."','".$dias."')";
				$rs 	=  mysql_query($sql);
				if($rs){
					Util::log($RetornoPagamento->id_anuncio. " - Plano $idplano pago com sucesso. Inserindo na tabela partner_planos");
				 }
				else{
					Util::log($RetornoPagamento->id_anuncio. " - Nao foi possivel inserir o idplano na tabela partner_planos. ".mysql_error());
				}
			}
			else{
				Util::log($RetornoPagamento->id_anuncio. " - Campo idplano esta vazio");
			}*/
		
		}
		else{
			Util::log($RetornoPagamento->id_anuncio. " - sem atualizaчуo de anuncios no pacote. Quantidade 0,vazia ou nula: $qtdeanuncio");
		}
	
	}
	else if ( $RetornoPagamento->status_pedido_site == 'sim' ) { // pago == sim
		Util::log($RetornoPagamento->id_anuncio. " - Anuncio ja estava com status de pago no banco de dados. saindo...");
	}
	

	
	Utility::Redirect( WEB_ROOT );	
} 
	
?>