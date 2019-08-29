<?php
error_reporting(0);
if (empty($_GET['tipo'])) {
                die('Erro 4 - Entre em contato com o desenvolvedor');
}
$tabela = $_GET['tipo'];
//require_once("resolve.php"); // Insere constantes de subsistemas (caminho do banco, etc)
include "../kratosConfig.php";
require_once("privado.php"); // Insere constantes de subsistemas (caminho do banco, etc)
$id_recebido = $_GET['id'];
$dbhost      = HOST_SYS;
$dbuser      =  USER_SYS;
$dbpass      = PASSWORD_SYS;
$dbname      = DATA_SYS;
foreach ($_POST as $campo => $valor) { // Pega todos os campos de requests POSTs e armazena em array
                $$campo = $valor;
                $conn   = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                if (!$conn) {
                                die('Could not connect: ' . mysqli_error());
                }
             //   echo 'Connected successfully<br>';
                $sql = ' UPDATE ' . $tabela . ' SET ' . $campo . '="' . $valor . '" WHERE id=' . '"' . $id_recebido . '"';
                // echo "<p>$sql"; // Para ver SQL se acontecer algum problema
                if (mysqli_query($conn, $sql)) {
                              //  echo "Record updated successfully";
                } else {
                                echo "Error updating record: " . mysqli_error($conn);
                }
}
mysqli_close($conn);
switch ($tabela) {
                case "modificar":
                                $mensagem = "Os dados foram adcionados no sistema";
                                echo '<script language= "JavaScript">location.href="call.php?page=successView&console=' . $mensagem . '";</script>';
                                break;
                default:
                                $mensagem = "Os dados foram adcionados no sistema";
                                echo '<script language= "JavaScript">location.href="call.php?page=successView&console=' . $mensagem . '";</script>';
                                break;
}
?>