<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110925788-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-110925788-1');
</script>

<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div>


<script type="text/javascript" src="<?php echo $ROOTPATH; ?>/js/SubmitContact.js"></script>



<?php
	if(!(empty($partner["mobile"]))) {
		$telefone = formataTel($partner["mobile"]);
	}
	else {
		$telefone = "--";
	}
	if(!(empty($partner["entrega_telefone"]))) {
		$celular = $partner["entrega_telefone"];
	}
	else {
		//$celular = "--";
	}

	$totalPhotos = countPhotos($team);
	
	$URL_ATUAL= "http://$_SERVER[HTTP_HOST]/?idofertatab=".$this->id;
 
	$tipoaba = $_REQUEST['tab'];
	 	  
	 
?> 

<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8 box-dados">
	<? include_once(DIR_BLOCO ."/breadcrumb-oferta.php");?>
	<div class="row tab-content">
		<? if( !empty($this->video1) and $this->video1 != "--") { 
			$stilofotos=' style="margin-top: 40px;"';
		?>
			<ul class="tabs-offer" role="tablist" id="myTab">
				<li id="presentation-tag-imagem" data-transacao="imagem" role="presentation" class="active presentation-tag"><a style="color:#666 !important;" href="<?=$URL_ATUAL?>&tab=foto" class="imagem-tab" role="tab" data-toggle="tab">Imagens</a></li>
				<li id="presentation-tag-video" data-transacao="video" role="presentation" class="presentation-tag"><a href="<?=$URL_ATUAL?>&tab=video" style="color:#666 !important;" class="video-tab" role="tab" data-toggle="tab">Vídeo</a></li>
			</ul>
	<?php } ?>
		
	<? if($tipoaba=="foto" or $tipoaba==""){?>
			<div id="fotos" class="col col-md-9 col-lg-9 tab-pane fotos active" role="tabpanel-di" <?=$stilofotos?>>
				<?php
					if($totalPhotos > 1){
				?>
				<div id="slides">
					<? if($team['img0']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img0'])?>" /><?}?>
						<? if($team['img1']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img1'])?>" /><?}?>
						<? if($team['img2']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img2'])?>" /><?}?>
						<? if($team['img3']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img3'])?>" /><?}?>
						<? if($team['img4']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title'])?>" src="<?=getImg($team['img4'])?>" /><?}?>
						<? if($team['img5']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img5'])?>" /><?}?>
						<? if($team['img6']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img6'])?>" /><?}?>
						<? if($team['img7']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img7'])?>" /><?}?>
						<? if($team['img8']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img8'])?>" /><?}?>
						<? if($team['img9']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img9'])?>" /><?}?>
						<? if($team['img10']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img10'])?>" /><?}?>
						<? if($team['img11']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img11'])?>" /><?}?>
						<? if($team['img12']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img12'])?>" /><?}?>
						<? if($team['img13']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img13'])?>" /><?}?>
						<? if($team['img14']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img14'])?>" /><?}?>
						<? if($team['img15']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img15'])?>" /><?}?>
						<? if($team['img16']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img16'])?>" /><?}?>
						<? if($team['img17']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img17'])?>" /><?}?>
						<? if($team['img18']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img18'])?>" /><?}?>
						<? if($team['img19']){?><img  title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img19'])?>" /><?}?>
				</div>
			<?php }else{ ?>
				<? if($team['img0']){?><img style="max-height: 560px;" title="<?=utf8_decode($team['title'])?>" alt="<?=utf8_decode($team['title']) ?>" src="<?=getImg($team['img0'])?>" /><?}?>
			<?php } ?>

				<div id="slidesjs-log">Imagem <span class="slidesjs-slide-number">1</span> de <?php echo $totalPhotos; ?></div>
			</div>
		<? } ?>
		<? if($tipoaba=="video"){?> 
			<div  class="col col-md-9 col-lg-9 tab-pane" role="tabpanel-di"  <?=$stilofotos?>>	
				<? if(!(empty($this->video1))) { ?> 
					<iframe width="700" height="400" src="https://www.youtube.com/embed/<?php echo $this->video1; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> 
				<? } ?> 
			</div> 
		<? } ?>
		
		<div class="col col-lg-3 col-md-3 hidden-sm hidden-xs panel-principal">
			<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 box-share">
				<div class="fb-like" data-href="<?=$ROOTPATH?>/imovel/curtiranuncio/<?=$this->id?>/" data-layout="button_count" 
				     data-action="like"  data-show-faces="true" data-share="true">
				</div>	
				<div style="float: left; margin: 5px 0px 0px 8px;" class="twitter-like">
					<a href="https://twitter.com/share" class="twitter-share-button"{count}>Tweet</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</div>
			</div>			
				<div class="item-list">
					<?php if($this->mostrarpreco == 1){ ?>
						<h5>Valor</h5>
						<h4 class="destaque"><?php echo "R$ " . $this->preco; ?></h4>
					<? } ?>			
				</div>			
				<div class="item-list">
					<h5>Condomínio</h5>
					<h4 class="destaque cond">
						<?php
							if(!(empty($this->condominio))) {
						?>
						<?php echo "R$ " . number_format($this->condominio,2,",","."); ?>
						<?php } else { ?>
						--
						<?php } ?>
				</h4>			</div>			<div class="item-list">
				<h5>Iptu</h5>
				<h4 class="destaque iptu"><?php echo $this->iptu; ?></h4>			</div>			<div class="item-list">				<h5 class="codigo">Código do imóvel</h5>				<h4 class="codigo" data-imo="15115" id="codigo_imovel"><?php echo $this->codigo; ?></h4>			</div>
			<div class="box-col" style="float:left;margin-top:15px;">
				<div class="col hidden-sm hidden-xs col-md-6 col-lg-6 box-info">
					<h5 class="valor-info">
						<img src="<?php echo $PATHSKIN; ?>/images/Length-32.png" class="info-img"><br><?php echo utf8_decode($this->area); ?></h5>
					<p>área</p>
				</div>
				<div class="col hidden-sm hidden-xs col-md-6 col-lg-6 box-info">
					<h5 class="valor-info">
						<img src="<?php echo $PATHSKIN; ?>/images/Hotel-32.png" class="info-img"><br><?php echo $this->quartos; ?></h5>
					<p>quartos</p>
				</div>
				<div class="col hidden-sm hidden-xs col-md-6 col-lg-6 box-info">
					<h5 class="valor-info">
						<img src="<?php echo $PATHSKIN; ?>/images/Shower-and-Tub-32.png" class="info-img"><br><?php echo $this->suites; ?></h5>
					<p>suíte</p>
				</div>
				<div class="col hidden-sm hidden-xs col-md-6 col-lg-6 box-info">
					<h5 class="valor-info">
						<img src="<?php echo $PATHSKIN; ?>/images/Bath-Room-32.png" class="info-img"><br><?php echo $this->banheiros; ?><br>
					</h5>
					<p>banheiros</p>
				</div>
				<div class="col hidden-sm hidden-xs col-md-6 col-lg-6 box-info">
					<h5 class="valor-info">
						<img src="<?php echo $PATHSKIN; ?>/images/Garage-Filled-32.png" class="info-img"><br><?php echo $this->vagas; ?><br>
					</h5>
					<p>vagas</p>
				</div>
				<div class="col hidden-sm hidden-xs col-md-6 col-lg-6 box-info">
					<h5 class="valor-info">
						<img src="<?php echo $PATHSKIN; ?>/images/varanda.png" class="info-img"><br><?php echo $this->varandas; ?><br>
					</h5>
					<p>varanda</p>
				</div>
			</div>
			<?php
				if(!in_array($this->id, $_SESSION["IdAnuncio"])){
			?>
				<button data-id="<?php echo $this->id; ?>" id="btn<?php echo $this->id; ?>" class="btn btn-favorito" style="height: 50px;margin-right: 100px;"><img id="img<?php echo $this->id; ?>" src="<?= $PATHSKIN."/images/heart-grey.png"?>"></button> 
			<?php
				}else{
			?>
				<button data-id="<?php echo $this->id; ?>" id="btn<?php echo $this->id; ?>" class="btn btn-favorito-active" style="height: 50px;margin-right: 100px;"><img id="img<?php echo $this->id; ?>" src="<?= $PATHSKIN."/images/heart.png"?>"></button> 
			<?php
				}
			?>
		</div>
	</div>
	<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 box-descricao" itemprop="description">
		<h5 class="title">mais sobre este imóvel</h5>
			<?php echo $this->descricao; ?>
			<br /><br />
		<span style="font-size:12px;"><span style="font-family: arial,helvetica,sans-serif;"><em><strong><span>(Os preços e informações poderão sofrer mudanças sem aviso prévio. Por este motivo, solicitamos a confirmação com nossos consultores.)</span></strong></em></span></span></p>
	</div>
	<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 box-descricao">
		<h5 class="title">características</h5>
		<ul class="ul-caracteristica">
		<?php 
			foreach($this->adicionais as $adicional) {
				if(!(empty($adicional)) && $adicional != " ") {
		?>
			<li><i class="fa fa-check cor-F9683D"></i><?php echo $adicional; ?></li>
		<?php
				}
			}
		?>
		</ul>
	</div>
	<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 box-descricao">
		<ul class="descricao-imovel hidden-xs hiddenn-sm">
			<?php 
				for($m = 0; $m < 8; $m ++) {
			?>
				<li><?php echo $this->caracteristicas[$m]; ?></li>
			<?php } ?>
		</ul>
		<?php include_once("bloco_local_parceiro.php"); ?>
		<small class="lbl-explicacao">* Esta é uma localização aproximada do imóvel.</small>
	</div>
	<div class="LoadingImageContact2" style="display:none;">
		<img src="<?php echo $PATHSKIN; ?>/images/loading.gif">
	</div>
	<div class="col col-md-12 col-lg-12 box-descricao contato2 hidden-xs hidden-sm">
		<h5 class="title">contato</h5>
		<div class="MsgRetorno2">
		</div>
		<div class="col col-md-6 col-lg-6 box-agencia nopadmar">
			<h4 id="h_nomeAgencia" style="margin: 0!important;"><?php  echo utf8_decode($partner['title']); ?></h4>
		</div>
		<div style="text-align: right;" class="col col-md-6 col-lg-6 box-tel text-right tel-agencia">
			<a class="cor-F9683D telcontato a-tel block-tel" style="margin: 0!important;" id="ver-telefone-h3-seg" href="#">
				<i class="fa fa-phone cor-F9683D"></i>&nbsp;
				<span class="cel-contato" style="margin-right:0px;">
					<?php echo $telefone; ?>
				</span>
				<span class="cel-contato" style="margin-right:0px;">
					<?php echo $celular; ?>
				</span>
			</a>
		</div>
		<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 sky-form-columns">
			<form method="post" action="post" class="sky-form" id="form-contato2">
				<fieldset>
					<div class="row">
						<section class="col col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" placeholder="Nome" class="name" id="name2" name="name2">
							</label>
						</section>
						<section class="col col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<label class="input">
								<i class="icon-append fa fa-envelope"></i>
								<input type="email" placeholder="E-mail" class="email" id="email2" name="email2">
							</label>
						</section>
						<section class="col col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<label class="input">
								<i class="icon-append fa fa-phone"></i>
								<input type="text" placeholder="Telefone" onkeypress='mascaraTelefone(this,telDig)' class="telefone" id="telefone2" name="telefone2" maxlength="15" autocomplete="off">
							</label>
						</section>
						<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<label class="textarea" style="width:717px;">
								<textarea style="height:150px;" placeholder="Olá, eu gostaria de obter mais informações sobre este imóvel. Aguardarei o contato. Obrigado." id="mensagem2" name="mensagem2" cols="4" rows="4" maxlength="500">Olá, eu gostaria de obter mais informações sobre este imóvel. Aguardarei o contato. Obrigado.</textarea>
							</label>
						</section>
					</div>
					<div class="row">
						<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<label class="checkbox ck-receber">
								<input type="checkbox" checked="" id="recebeinfo2">
								Me cadastrar na newsletter.
							</label>
						</section>
					</div>
					<div class="row">
						<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<p>Ao enviar, você está concordando com os <a target="_blank" href="<?php echo $ROOTPATH; ?>/page/about_terms">Termos de Uso.</a></p>
						</section>
						<?
	 echo "-vip-".$tipoaba;
?>

					</div>
					<div class="row">
						<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<button class="btn btn-laranja btn-enviar-contato-bottom enviar-contato pull-right" id="btn-enviarContatoInferior" type="button" data-type="bottom">
								<i class="fa fa-paper-plane"></i>&nbsp;&nbsp;ENVIAR CONTATO
							</button>
						</section>
					</div>
				</fieldset>
			</form>
			<? include_once(DIR_BLOCO ."/bloco_comentarios_facebook.php");?>
		</div>
	</div>
</div>


	<!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->
  <script>
    jQuery(function() {
      jQuery('#slides').slidesjs({
       
        play: {
          active: true,
          auto: true,
          interval: 4000,
          swap: false
        },
        callback: {
          loaded: function(number) {
            // Use your browser console to view log
           // console.log('SlidesJS: Loaded with slide #' + number);

            // Show start slide in log
            jQuery('#slidesjs-log .slidesjs-slide-number').text(number);
          },
          start: function(number) {
            // Use your browser console to view log
           // console.log('SlidesJS: Start Animation on slide #' + number);
          },
          complete: function(number) {
            // Use your browser console to view log
           // console.log('SlidesJS: Animation Complete. Current slide is #' + number);

            // Change slide number on animation complete
            jQuery('#slidesjs-log .slidesjs-slide-number').text(number);
          }
        },
      });
    });
  </script>

  <style>
    #slides {
	 width:800px;
      display: none
    }

    #slides .slidesjs-navigation {
      margin-top:5px;
    }

    a.slidesjs-next,
    a.slidesjs-previous,
    a.slidesjs-play,
    a.slidesjs-stop {
      background-image: url(<?php echo $ROOTPATH; ?>/js/jsslider/imgs/btns-next-prev.png);
      background-repeat: no-repeat;
      display:block;
      width:12px;
      height:18px;
      overflow: hidden;
      text-indent: -9999px;
      float: left;
      margin-right:5px;
    }

    a.slidesjs-next {
      margin-right:10px;
      background-position: -12px 0;
    }

    a:hover.slidesjs-next {
      background-position: -12px -18px;
    }

    a.slidesjs-previous {
      background-position: 0 0;
    }

    a:hover.slidesjs-previous {
      background-position: 0 -18px;
    }

    a.slidesjs-play {
      width:15px;
      background-position: -25px 0;
    }

    a:hover.slidesjs-play {
      background-position: -25px -18px;
    }

    a.slidesjs-stop {
      width:18px;
      background-position: -41px 0;
    }

    a:hover.slidesjs-stop {
      background-position: -41px -18px;
    }

    .slidesjs-pagination {
      margin: 7px 0 0;
      float: right;
      list-style: none;
    }

    .slidesjs-pagination li {
      float: left;
      margin: 0 1px;
    }

    .slidesjs-pagination li a {
      display: block;
      width: 13px;
      height: 0;
      padding-top: 13px;
      background-image: url(<?php echo $ROOTPATH; ?>/js/jsslider/imgs/pagination.png);
      background-position: 0 0;
      float: left;
      overflow: hidden;
    }

    .slidesjs-pagination li a.active,
    .slidesjs-pagination li a:hover.active {
      background-position: 0 -13px
    }

    .slidesjs-pagination li a:hover {
      background-position: 0 -26px
    }

    #slides a:link,
    #slides a:visited {
      color: #333
    }

    #slides a:hover,
    #slides a:active {
      color: #9e2020
    }
 
</style>

