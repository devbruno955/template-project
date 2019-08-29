<?php error_reporting(E_ALL ^ E_NOTICE);

if (empty($_GET['tipo'])) {
	die('Erro 4 - Entre em contato com o desenvolvedor');
}


$tabela = $_GET['tipo'];

//require_once("resolve.php"); // Insere constantes de subsistemas (caminho do banco, etc)
require_once("privado.php"); // Insere constantes de subsistemas (caminho do banco, etc)

$montaValores = array();
$montaCampos = array();

$sqlValores = "";
$sqlCampos = "";


foreach ($_POST as $campo => $valor) { // Pega todos os campos de requests POSTs e armazena em array

	$$campo = $valor;

	array_push($montaValores, $valor);
	array_push($montaCampos, $campo);

	$sqlValores = $sqlValores . "'".$valor."',"; // Prepara string para valores em SQL convertendo array em string
	$sqlCampos = $sqlCampos . "`".$campo."`,"; // Prepara string para campos em SQL convertendo array em string
}

//echo "<p>".$sqlValores;
//echo "<p>".$sqlCampos;

include "../SRP/insertMetodo.controller.php";
include "../kratosConfig.php";



$resultadoCampos = substr($sqlCampos,0,-1); // Remove último caracter da string (a vírgula) para ser reconhecido como SQL válido
$resultadoValores = substr($sqlValores,0,-1);

$enviarParaBanco = DATA_SYS ;




$app = new InsertMetodo("$resultadoCampos", $resultadoValores, 'insertMySQLi', $enviarParaBanco , $tabela);

//echo "<h1>Resultado: $successs_sys</h1>";


switch ($tabela) {
    case "empresa":
        echo '<script language= "JavaScript">location.href="success.php?acesso=no";</script>';
        break;
    case "contratos":
        $mensagem = "Seu contrato foi adcionado ao sistema!";
        echo '<script language= "JavaScript">location.href="call.php?page=successView&console='.$mensagem.'";</script>';
        break;
    case "custos":
        $mensagem = "O valor de custo foi adcionado no sistema";
        echo '<script language= "JavaScript">location.href="call.php?page=successView&console='.$mensagem.'";</script>';
        break;

        default:
        $mensagem = "Sua solicitação foi enviada para o sistema";
        echo '<script language= "JavaScript">location.href="call.php?page=successView&console='.$mensagem.'";</script>';
        break;
}

?>

<!--
<script language= "JavaScript">
location.href="index.php?acesso=no";
</script>



?>
