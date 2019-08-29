<?php
include ('../app.php');
echo "<!--".PHP_EOL;
print_r($_POST);
echo "-->".PHP_EOL;
if (isset($_POST['filtro'])) {
	$FILTRO = $_POST['filtro'];
	echo "<option></option>";
	switch ($FILTRO) {
	
	case 'cidades':
		$cidades = mysql_query("SELECT * FROM `cidades` WHERE uf = '{$_POST['estado']}' ORDER BY nome ASC");		
		while ($row = mysql_fetch_array($cidades, MYSQL_ASSOC)) {
			$nome = tratamento_string($row["nome"]);
			echo "<option value='{$row['id']}'>".$row['nome']."</option>";		
		}		
		break;		
		
		case 'cidadesAdmin':
		$cidades = mysql_query("SELECT * FROM `cidades` WHERE uf = '{$_POST['estado']}' ORDER BY nome ASC");		
		while ($row = mysql_fetch_array($cidades, MYSQL_ASSOC)) {
			$nome = tratamento_string($row["nome"]);
			echo "<option value='{$row['id']}'>".$row['nome']."</option>";		
		}		
		break;		
	case 'cidades_new':
		$cidades = mysql_query("SELECT * FROM `cidades` WHERE uf = '{$_POST['estado']}' ORDER BY nome ASC");		
		while ($row = mysql_fetch_array($cidades, MYSQL_ASSOC)) {
			$nome = tratamento_string($row["nome"]);
			
			if($row['nome'] == $_POST['cidade']){
				echo "<option selected value='{$row['id']}'>".$row['nome']."</option>";
			}else{
				echo "<option value='{$row['id']}'>".$row['nome']."</option>";	
			}
				
		}		
		break;			
			
	case 'bairros':
		$cidade = $_POST['cidade'];
		$bairro = $_POST['bairro'];
		$bairros = mysql_query("SELECT nome, id FROM `bairros` WHERE cidade = '{$cidade}' order by nome");
		if (mysql_num_rows($bairros) <= 0) {
			echo "<option value='0'>Nenhum bairro cadastrado</option>";
		} else {
			while($row = mysql_fetch_array($bairros, MYSQL_ASSOC)) {

				if($row['nome'] == $bairro){
					echo "<option selected value='{$row['id']}'>".$row['nome']."</option>";
				}else{
					echo "<option value='{$row['id']}'>".$row['nome']."</option>";	
				}
			}
		}
		break;
		
	case 'cidades_anuncios':
		$estado = $_POST['estado'];
		$cidades_anuncios = mysql_query("select imob_cidade from team where imob_estado = '" . $estado . "' and ( status is null or status = 1 ) and (pago = 'sim' or anunciogratis = 's') and begin_time < '".time()."' and end_time > '".time()."' and imob_cidade is not null group by imob_cidade");		
		if (mysql_num_rows($cidades_anuncios) <= 0) {
			echo "<option value='0'>Nenhum an&uacute;ncio para esta cidade</option>";
		} else {
			echo "<option value=''>Todas as cidades</option>";
			while ($row = mysql_fetch_array($cidades_anuncios, MYSQL_ASSOC)) {			
				echo "<option value='{$row['imob_cidade']}'>{$row['imob_cidade']}</option>";		
			}
		}		
		break;
		
	case 'bairros_anuncios':
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