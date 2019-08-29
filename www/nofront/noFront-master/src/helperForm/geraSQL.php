<div class="content-wrapper">

	<?php 

$montaValores = array();
$montaCampos = array();

$sqlValores = "";
$sqlCampos = "";


foreach ($_POST as $campo => $valor) { 

	$$campo = $valor;

	array_push($montaValores, $valor);
	array_push($montaCampos, $campo);

	$sqlValores = $sqlValores . "'".$valor."',"; // Prepara string para valores em SQL
	$sqlCampos = $sqlCampos . "`".$campo."`,"; // Prepara string para campos em SQL
}

//echo "<p>".$sqlValores;
//echo "<p>".$sqlCampos;

	

$resultadoCampos = substr($sqlCampos,0,-1);
$resultadoValores = substr($sqlValores,0,-1);




?>

<h3>SQL de homologação</h3>
<pre>
	CREATE TABLE `homol3` (
  `id` int(11) NOT NULL,
<?php 

$montaValores = array();
$montaCampos = array();


foreach ($_POST as $campo => $valor) { 

	$$campo = $valor;

	array_push($montaValores, $valor);
	array_push($montaCampos, $valor);

	echo "<br>`$campo` varchar(255) NULL,";
}
?>
  `tabela` varchar(255) CHARACTER SET latin1 NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
</pre>

	
</div>