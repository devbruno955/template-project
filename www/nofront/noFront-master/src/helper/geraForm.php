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

<h3>Form de homologação</h3>
	<pre>
			<?php 

			$montaValores = array();
			$montaCampos = array();


			foreach ($_POST as $campo => $valor) { 

				$$campo = $valor;

				array_push($montaValores, $valor);
				array_push($montaCampos, $valor);

				$string = "$valor <input type='text' name='$campo' id='$campo'><br>";
				echo "
				";

				echo htmlspecialchars($string) ;
			}
			?>
  </pre>