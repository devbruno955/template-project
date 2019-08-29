<div style="display:none;" class="tips"><?=__FILE__?></div>
<script>
	/*J('document').ready(function(){
		
		//Redireciona usuário para a página do anúncio. 
		J('.btn-detalhe').click(function() {
			
			var UrlAnuncio = J(this).attr('data-url');
			location.href = UrlAnuncio;
		});		
	}); */
</script>
<style>
	.col.col-xs-12.col-sm-12.col-md-8.col-lg-8 {
		float: left !important;
	}
	.box-dados {
		color: #666;
	}	
	#resultado .box-resultado ul.ul-resultado li .box-valor {
		margin-left: 230px;
	}
</style>
<div class="col col-xs-12 col-sm-12 col-md-9 col-lg-9 box-resultado hidden-xs hidden-sm">
	<button class="btn btn-valor btn-branco" data-ordenar="asc" id="btn-ordenacao-por-valor">
		<i class="fa fa-sort-numeric-asc" id="ordenacao-por-valor-icone"></i><span id="ordenacao-por-valor">Ordenar do menor para o maior valor</span>
	</button>
	<ul id="myTab" role="tablist" class="nav nav-tabs">
		<li class="<?php if($_GET['anuncio'] == "finalidade_todos") {?>active<?php } ?> presentation-tag" role="presentation" data-transacao="todos" id="presentation-tag-todos"><a data-toggle="tab" role="tab" aria-controls="finalidade_todos#5" class="TipoAnuncio" href="#">Todos</a></li>
		<li class="<?php if($_GET['anuncio'] == "comprar") {?>active<?php } ?> presentation-tag" role="presentation" data-transacao="comprar" id="presentation-tag-comprar"><a data-toggle="tab" role="tab" aria-controls="comprar#0" class="TipoAnuncio" href="#">Venda</a></li>
		<li class="<?php if($_GET['anuncio'] == "alugar") {?>active<?php } ?> presentation-tag" role="presentation" data-transacao="alugar" id="presentation-tag-alugar"><a data-toggle="tab" role="tab" aria-controls="alugar#1" class="TipoAnuncio" href="#">Locação</a></li>
		<li class="<?php if($_GET['anuncio'] == "lancamentos") {?>active<?php } ?> presentation-tag" role="presentation" data-transacao="lancamentos" id="presentation-tag-lancamento"><a data-toggle="tab" role="tab" aria-controls="lancamentos#3" class="TipoAnuncio" href="#">Lançamentos</a></li>
		<!--<li class="<?php if($_GET['anuncio'] == "alugar-temporada") {?>active<?php } ?> presentation-tag" role="presentation" data-transacao="temporada" id="presentation-tag-temporada"><a data-toggle="tab" role="tab" aria-controls="alugar-temporada#2" class="TipoAnuncio" href="#">Temporada</a></li>-->
		<li class="<?php if($_GET['anuncio'] == "favoritos") {?>active<?php } ?> presentation-tag" role="presentation" data-transacao="favoritos" id="presentation-tag-favoritos"><a data-toggle="tab" role="tab" aria-controls="favoritos#4" class="TipoAnuncio" href="#">Favoritos</a></li>
	</ul>
	<div class="tab-content">		
		<div class="hide" id="divBlock"></div>
		<div id="venda" class="tab-pane active" role="tabpanel">
			<div class="LoadingImage" style="display:none;">
				<img src="<?php echo $PATHSKIN; ?>/images/loading.gif">
			</div>
			<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar" id="lista-venda">
				<ul style="display: block;" class="ul-resultado paginacao paginacao_numero_1">
					<?php 
						if($rowA >= 1) {
							while($anuncios = mysql_fetch_assoc($busca)) { 
								
								/* Busca o bairro referente ao anúncio em questão. */
								$sql = "select nome from bairros where id = '" . $anuncios['imob_bairro'] . "'";
								$rs = mysql_query($sql);
								$bairro = mysql_fetch_assoc($rs);
								
								/* Tratamento da imagem do imóvel. */
								if(empty($anuncios['img0'])) {
									
									$imagem = $PATHSKIN . "/images/produto-sem-foto.jpg";
								}
								else {
									
									$imagem = $ROOTPATH . "/media/" . $anuncios['img0'];
								}	

								/* Tratamento do número de quartos do imóvel. */
								if(empty($anuncios['imob_quartos']) || $anuncios['imob_quartos'] == 0) {
									$quartos = "--";
								}
								else {
									$quartos = $anuncios['imob_quartos'];
								}							
								
								/* Tratamento do número de vagas do imóvel. */
								if(empty($anuncios['imob_vagas']) || $anuncios['imob_vagas'] == 0) {	
									$vagas = "--";
								}
								else {
									$vagas = $anuncios['imob_vagas'];
								}

								/* Tratamento do código do imóvel. */
								if(empty($anuncios['imob_codigo'])) {
									$codigo = "--";
								}
								else {
									$codigo = $anuncios['imob_codigo'];
								}							
								
								/* Tratamento do número de suítes do imóvel. */
								if(empty($anuncios['imob_suite']) || $anuncios['imob_suite'] == 0) {
									
									$suite = "--";
								}
								else {
									
									$suite = $anuncios['imob_suite'];
								}							
								
								/* Tratamento do número de banheiros do imóvel. */
								if(empty($anuncios['imob_banheiro']) || $anuncios['imob_banheiro'] == 0) {
									
									$banheiro = "--";
								}
								else {
									
									$banheiro = $anuncios['imob_banheiro'];
								}							
								
								/* Tratamento da área do imóvel. */
								if(empty($anuncios['imob_area']) || $anuncios['imob_area'] == 0) {
									
									$area = "--";
								}
								else {
									
									$area = $anuncios['imob_area'];
								}
								
								/* Preparação da url do anúncio. */
								$UrlAnuncio = UrlAnuncio($anuncios['id']);
					?>		
						
						<li class="imovel-venda ">																		
							<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar nopadmar-hover"> 
								<div style="padding: 5px; border: 4px solid #FFF;" class="col col-xs-12 col-sm-12 col-md-4 col-lg-4 box-foto">
									<a href="<?php echo $UrlAnuncio; ?>" target="_blank">
										<div class="img-offer">
											<img src="<?php echo $imagem; ?>">
										</div>
									</a>
								</div>  
									<ul class="ul-label hide">  
										<li style="padding: 5px;">&nbsp;</li>
									</ul> 
									<div class="col col-xs-12 col-sm-12 col-md-8 col-lg-8 nopadmar box-dados"> 
										<div class="col col-xs-12 col-sm-12 col-md-8 col-lg-8">
											<a href="<?php echo $UrlAnuncio; ?>" target="_blank"><h4 class="tipo-imovel"><?php echo utf8_decode($anuncios['title']); ?></h4>  </a>
											<p><?php echo substr(utf8_decode($anuncios['summary']), 0, 200); ?></p> 
											<ul class="ul-caracteristica"> 
												<li>   
													<h4 class="numero"><?php echo $quartos; ?></h4>  
													<h5>quartos</h5> 
												</li>   
												<li>     
													<h4 class="numero"><?php echo $suite; ?></h4>
													<h5>suíte</h5> 
												</li> 
												<li>     
													<h4 class="numero"><?php echo $banheiro; ?></h4>
													<h5>banho</h5> 
												</li>  
												<li>    
													<h4 class="numero"><?php echo $vagas; ?></h4> 
													<h5>vaga</h5>
												</li>    
											</ul>   
										</div> 
										<div class="col col-xs-12 col-sm-12 col-md-4 col-lg-4 box-valor">
											<? if($anuncios['mostrarpreco'] == 1){ ?>   
											<h2 class="cor-F9683D valor">R$ <?php echo number_format($anuncios['team_price'] , 2, ',', '.'); ?></h2> 
											<? } ?>
											<?php if($anuncios['imob_financiamento'] == 1) { ?>
											<span class="label label-primary">aceita financiamento</span>
											<?php } ?>
											<h5 class="codigo">código: <strong><?php echo $codigo; ?></strong></h5>  
											<h6 class="area"><?php echo $area; ?> m²</h6>
											<a href="<?php echo $UrlAnuncio; ?>"  target="_blank">
												<button class="btn btn-detalhe btn-laranja" data-url="<?php echo $UrlAnuncio; ?>" target="_blank">Detalhe</button> 
											</a>
											<?php
												if(!in_array($anuncios["id"], $_SESSION["IdAnuncio"])){
											?>
												<button data-id="<?php echo $anuncios["id"]; ?>" id="btn<?php echo $anuncios["id"]; ?>" class="btn btn-favorito"><i class="fa fa-heart"></i></button> 
											<?php
												}else{
											?>
												<button data-id="<?php echo $anuncios["id"]; ?>" id="btn<?php echo $anuncios["id"]; ?>" class="btn btn-favorito-active"><i class="fa fa-heart"></i></button> 
											<?php
												}
											?>
										</div> 
									</div> 
								<div style="height:1px;" class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nomar">  
								<hr style="margin-bottom: 0!important; margin-top: 0!important;"> 
								</div>
							</div>											
						</li>
				
					<?php } } else { ?>
						<li class="imovel-venda result-none">
							<img src="<?php echo $PATHSKIN; ?>/images/home.png">
							<p class="text-resul-none">Não encontramos nenhum anúncio com os dados informados.<p>
						</li>
					<?php } ?>
				</ul>
		</div>
	</div>
	<div id="locacao" class="tab-pane" role="tabpanel">
		<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar" id="lista-locacao"></div>
	</div>
	<div id="favoritos" class="tab-pane" role="tabpanel">
		<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar" id="lista-favoritos"></div>
	</div>
	<div id="panel-out-info" style="opacity: 0.25;"></div>
	</div>
</div>


