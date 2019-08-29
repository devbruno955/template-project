<?php
include ('../../app.php');
echo "<!--".PHP_EOL;
print_r($_POST);
echo "-->".PHP_EOL;
if (isset($_POST['filtro'])) {
	$FILTRO = $_POST['filtro'];
	echo "<option></option>";
	switch ($FILTRO) {
	
	case 'cidades':
		$cidades = mysql_query("SELECT a.* FROM `cidades` a WHERE a.uf = '{$_POST['estado']}' ORDER BY a.nome ASC");		
	 
		while ($row = mysql_fetch_array($cidades, MYSQL_ASSOC)) {			
			echo "<option value='{$row['nome']}'>{$row['nome']}</option>";		
		}
		 
		break;		
	case 'cidades_home':
		$estado = $_POST['estado'];
		$cidades_anuncios = mysql_query("select imob_cidade from team where imob_estado = '" . $estado . "' and ( status is null or status = 1 ) and (pago = 'sim' or anunciogratis = 's') and begin_time < '".time()."' and end_time > '".time()."' group by imob_cidade");		
		if (mysql_num_rows($cidades_anuncios) <= 0) {
			echo "<option value='0'>Nenhum an&uacute;ncio para esta cidade</option>";
		} else {
			echo "<option value=''>Todas as cidades</option>";
			while ($row = mysql_fetch_array($cidades_anuncios, MYSQL_ASSOC)) {			
				echo "<option value='{$row['imob_cidade']}'>{$row['imob_cidade']}</option>";		
			}
		}		
		break;	 
	case 'bairros_home':
		$cidade = $_POST['cidade'];
		$bairros = mysql_query("select imob_bairro from team where imob_cidade = '" . $cidade . "' and ( status is null or status = 1 ) and (pago = 'sim' or anunciogratis = 's') and begin_time < '".time()."' and end_time > '".time()."' and imob_bairro is not null group by imob_bairro");
		if (mysql_num_rows($bairros) <= 0) {
			echo "<option value='0'>Nenhum bairro cadastrado</option>";
		} else {
			echo "<option value=''>Todos os bairros</option>";
			while($row = mysql_fetch_array($bairros, MYSQL_ASSOC)) {
				echo "<option value='{$row['imob_bairro']}'>".utf8_encode(getBairro($row['imob_bairro']))."</option>";
			}
		}
		break;
			
	
	default:
		echo "<option>Erro ao filtrar</option>";
		break;
	}
}
?>