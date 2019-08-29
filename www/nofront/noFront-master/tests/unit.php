<!DOCTYPE html>
<html>
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<title></title>
</head>
<body>

<?php

require "../src/recebeAtributoHTML.php";

$app = new recebeAtributo() ;

$minhasTags = ["input", "button", "select", "label", "td", "div"];

$app->modelo = "../src/temas/bootstrap/form-modelo-bootstrap.html";
$app->alvo = '../src/html/form-alvo.html';

$app->setAtributos($minhasTags);

$app->passaAtributo();

?>

<?php

require "../src/recebeAtributoHTML.php";

$app = new recebeAtributo() ;

$minhasTags = ["input", "button", "select"];

$app->modelo = "../src/temas/bootstrap/form-modelo-bootstrap.html";
$app->alvo = '../src/html/form-alvo.html';

$app->setAtributos($minhasTags);

$app->passaAtributo();

?>

</body>
</html>

