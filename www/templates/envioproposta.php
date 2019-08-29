 <?php
   
	require_once(dirname(dirname(__FILE__)). '/app.php'); 
	
	$idoferta = strip_tags($_REQUEST['id']);
	$nome = utf8_decode(strip_tags(strval($_REQUEST['nome'])));
	$email = strip_tags(strval($_REQUEST['email'])); 
	$telefone = strip_tags(strval($_REQUEST['telefone']));
	$mensagem = utf8_decode(strip_tags(strval($_REQUEST['mensagem']))); 
	$data = date("d/m/Y H:i:s");
	  
	$team  = Table::Fetch('team', $idoferta);
	
	if($team['financiamento'] == 0 || empty($team['financiamento'])) {
		$financiamento = "Não aceita financiamento.";
	}
	else {
		$financiamento = "Aceita financiamento.";
	}
	
	$link = UrlAnuncio($team['id']);
    $nomesite = htmlentities($INI['system']['sitename'], ENT_COMPAT, 'UTF-8');
 
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	</head>
	<body>
		<style>
		
			body {
				color: #656565;
				font-family: "Merriweather Sans",sans-serif;
				margin: 0 auto;
			}
		
			.main {
				margin: 0 auto;
				position: relative;
				width: 1200px;
			}
			
			.content-page {
				background: #fcfcfc none repeat scroll 0 0;
				border: 1px solid #eee;
				margin-bottom: 35px;
				margin-top: 85px;
				padding: 15px;
			}

			#resultado-menu {
				background-color: white;
				border-bottom: 1px solid #e4e4e4;
				display: inline-block;
				height: 58px;
				left: 0;
				position: fixed;
				right: 0;
				top: 0;
				vertical-align: middle;
				z-index: 1000;
			}
			
			.insert-box {
				float: right;
				margin: -56px 80px 0;
			}
			
			.label-free {
				display: inline-block;
				padding-right: 6px;
				padding-top: 0px;
				position: relative;
				margin-top: -17px;
			}
			
			.btn {
				-moz-border-bottom-colors: none;
				-moz-border-left-colors: none;
				-moz-border-right-colors: none;
				-moz-border-top-colors: none;
				background-repeat: repeat-x;
				border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) #b3b3b3;
				border-image: none;
				border-radius: 4px;
				border-style: solid;
				border-width: 1px;
				box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
				color: #ffffff;
				cursor: pointer;
				display: inline-block;
				font-size: 14px;
				line-height: 20px;
				margin-bottom: 0;
				padding: 4px 12px;
				text-align: center;
				text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
				vertical-align: middle;
			}
			
			.btn-orange {
				background-color: #f70;
				color: #fff;
				height: 30px;
				text-transform: uppercase;
				width: 180px;
				font-weight: bold;
			}
			
			a {
				text-decoration: none;
			}

			.home-menu {
				padding: 17px;
			}
			
			.title {
				color: #5d5d5d;
				font-size: 18px;
				font-weight: 700;
				margin-bottom: 20px;
				text-transform: uppercase;
			}
			
			p {
				font-size: 14px;
				margin: 0;
			}
			
			.text {
				font-size: 16px;
				padding: 5px;
				line-height: 20px;
				text-align: left;
			}
			
			.subtitle {
				font-size: 16px;
				font-weight: bold;
				padding-bottom: 10px;
				text-transform: uppercase;
			}
			
			.footer {
				background-color: #555555;
				float: left;
				height: 210px;
				margin: 0 auto;
				position: relative;
				width: 100%;
			}
			
		</style>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="Content-Language" content="pt-br" />
		<div class="tail-top">
			<div id="resultado-menu">
				<div id="home-menu-sup" class="home-menu">
					<a href="#" class="menu menu-sup"><i class="fa fa-bars"></i></a>
					<div class="arrow-up hide"></div>
					<a target="_blank" class="logo" href="<?php echo $ROOTPATH; ?>" itemprop="url">
						<img width="130px" height="auto" itemprop="logo" alt="logo netimoveis" src="<?php echo $ROOTPATH; ?>/include/logo/logo.png" style="margin-top: -10px; margin-left: 10px;">
					</a>
				</div>
				<div class="form_publish">
					<div class="insert-box">
						<span class="label-free">
							<a title="Inserir anúncio" href="<?php echo $ROOTPATH; ?>/adminanunciante/" class="btn btn-large btn-orange  tk_logar  cboxElement" style="font-size: 20px;padding: 5px;">Anunciar</a>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="main">
			<div class="content-page">
				<p class="title">Nova proposta</p>
				<p class="subtitle">
					<img src="<?php echo $PATHSKIN; ?>/images/info.png"> 
					O an&uacute;ncio #<?php echo $team['id']; ?> recebeu uma nova proposta!
				</p>
				<p class="text">T&iacute;tulo: <?php echo $team['title']; ?></p>
				<p class="text">Estado: <?php echo $team['imob_estado']; ?></p>
				<p class="text">Quartos: <?php echo $team['imob_quartos']; ?></p>
				<p class="text">Vagas: <?php echo $team['imob_vagas']; ?></p>
				<p class="text">Banheiro: <?php echo $team['imob_banheiro']; ?></p>
				<p class="text">Financiamento: <?php echo utf8_encode($financiamento); ?></p>
				<p class="text">Pre&ccedil;o: <?php echo $currency . " " . number_format($team['team_price'],2, ',', '.'); ?></p>
				<p class="subtitle" style="margin-top:30px;">Dados do interessado</p>
				<p class="text">Nome: <?php echo utf8_encode($nome); ?></p>
				<p class="text">Email: <?php echo $email; ?></p>
				<p class="text">Telefone: <?php echo $telefone; ?></p>
				<p class="text">Mensagem: <?php echo utf8_encode($mensagem); ?></p>
				<p class="text" style="margin-top:20px;">
					<img src="<?php echo $PATHSKIN; ?>/images/calendar-clock.png">
					Data e hora do contato: <?php echo $data; ?>
				</p>
				<p class="text" style="margin-top:20px;">Clique<a target="_blank" href="<?php echo $link; ?>" > aqui </a> para acessar o an&uacute;ncio.</p>
				<p class="text" style="margin-top:20px;">
					<img src="<?php echo $PATHSKIN; ?>/images/atention.png">
					Para aumentar as chances de venda, responda o interessado o mais breve poss&iacute;vel, e procure sanar todos as d&uacute;vidas de seu cliente.
					Caso feche neg&oacute;cio, n&atilde;o se esque&ccedil;a de apagar o an&uacute;ncio da sua conta.
				</p>
			</div>
		</div>
		<div id="footerVipcom" class="footer ">
		</div>
	</body>
</html>