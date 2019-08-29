<?php
	include("../../app.php");

	$userid 	= $login_user_id;
	$partnerid 	= $_SESSION['partner_id'];

	$condition = array();

	$condition[] = " desativado <> 's' ";
	$condition[] = " begin_time < '" . time() . "' and end_time > '" . time() . "' ";
	$condition[] = " status is null or status = 1 ";
	$condition[] = " pago = 'sim' or anunciogratis = 's' ";

	$condition[] = "partner_id = ".$partnerid;

	$count = Table::Count('team', $condition);

	?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.return-btn{
			text-decoration: none;
			width: 20%;
			text-align: center;
			display: block;
			margin: 0 auto;
			margin-top: 0px;
			font-size: 20px;
			font-weight: bold;
			font-family: arial;
			color: #8f8f8f;
			margin-top: 10%;
			border-radius: 5px;
			padding: 10px;
			color: #fff;
			background: #03a6e6;
			box-shadow: 3px 5px 10px #c8c8c8;
		}
	</style>
	<title></title>
</head>
<body>
	<?php
		if($count > 0){
	?>
		<script type="text/javascript">
			alert("Esse cadastro possui anuncios cadastrados e ativos. Desative ou exclua seu anuncios antes de apagar a conta.");
		</script>
	
		<a href='/adminanunciante' class="return-btn">RETORNAR</a>
	<?php
		exit;
	}else{
		Table::Delete("user", $userid);
		Table::Delete("partner", $partnerid);
		unset($_SESSION['partner_id']);
		unset($_SESSION['user_id']);
	?>
		<script type="text/javascript">
			alert(utf8_decode("Usuário excluído com sucesso! Você será deslogado...."));
		</script>
	
		<a href='/adminanunciante' class="return-btn">RETORNAR</a>
	<?php
	}
	?>
</body>
</html>