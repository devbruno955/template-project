<div class="content-wrapper" style="position: relative; left: 5px;">
	<?php 
//include "classesTestes.php";
require_once "../kratosConfig.php";
include "../SRP/selectPorId.model.php";
?>

<?php 

$id = $_GET['id'];
$tabela = $_GET['de'];
$aplicativo = $_GET['aplicacao'];
$campo  = $_GET['em'];
$banco = DATA_SYS;

?>




<center>
	<h1>Confirmação</h1>

Deseja realmente concluir essa ação (<?php echo "<b>".$aplicativo."</b>";?>)
	<?php 
	echo  "o item " ;
	echo "<b>";
	$app = new SelectPorIdMetodo($id, $tabela, $campo, 'PDOselectPorId', $banco); 
	echo $_SESSION['retorno'];
	echo "</b>";
	echo " em ". $tabela."?";

	include "appHelper/forms/".$aplicativo.".php" ;


	?>

<button type="button" class="btn btn-danger">Não</button>
</a>
</form>
	
</center>

