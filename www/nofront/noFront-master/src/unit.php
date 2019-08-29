<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>

<?php 

libxml_use_internal_errors(true);



function trocarClass($quem, $peloQue, $aonde){
								$atributo = "";								
								$dom = new DOMDocument();
								$dom->loadHTMLFile('temas/bootstrap/form-modelo-bootstrap.html');
								$controle = 0; // Variável de controle
								// Consultando os links
								$links    = $dom->getElementsByTagName($quem);
								foreach ($links as $link) {
												if ($controle == 0) { // Pega primeiro valor e assume como padrão
												$atributo = $link->getAttribute('class') ; // Retorna tag do HTML com a nova class
																
																// Oferece ópção para troca de classe
												}
												$controle++;
								}

	$troca = str_replace($quem, "$peloQue class='$atributo' ", $aonde);
	return $troca;

}

$caminho = 'html/form-alvo.html';

$arquivo = file_get_contents($caminho); 

$listaDeTroca = ["input", "textarea", "button"];
$countLista = count($listaDeTroca);
$x = 0; 

	while ($x < $countLista) {
		$arquivo = trocarClass("$listaDeTroca[$x]", "$listaDeTroca[$x]", $arquivo);
		//echo "<p>$listaDeTroca[$x]";
		$x++;
	}

echo $arquivo;






?>