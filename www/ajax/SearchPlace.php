<?php

include ('../app.php');

/* É verificado o que o usuário digitou no campo de busca. Assim é feito a busca. */
if(isset($_POST["place"]) and !(empty($_POST["place"])))
{
	/* O único tipo é "search-place". */
	$place = strip_tags($_POST["place"]);
	$cidade = strip_tags($_POST["city"]);
	$uf = strip_tags($_POST["state"]);
	$type = strip_tags($_POST["type"]);
	
	if($type == "search-place")
	{
		/* É buscado as ofertas que estão ativas com o limite de busca de 20. */
		$sql = "select id, cidade, nome from bairros where nome like '" . $place . "%' limit 20";
		$rs = mysql_query($sql);
		$row = mysql_num_rows($rs);
		
		/* É feito o retorno de acordo com a busca na base de dados. */
		if($row >= 1)
		{
			while($place = mysql_fetch_assoc($rs)) 
			{
				$sqlC = "select nome from cidades where id = '" . $place['cidade'] . "'";
				$rsC = mysql_query($sqlC);
				$city = mysql_fetch_assoc($rsC);
				
				$url = tratamento_string($place['title']);
?>
	<li><a onclick = "J(this).SetCity('<?php echo $place['nome']; ?>');" name="<?php echo $place['nome']; ?>" class="CityChoose" href="#"><p><?php echo $place['nome']; ?>  - (<?php echo $city['nome']; ?>)</p></a></li>
<?php
			}
		}
		else 
		{
			echo "<li class='ResultNone'><p>Não encontramos nenhuma cidade!</p></li>";
		}
	}
	else
	{
		/* Caso o valor do $type seja inválido. */
		return false;
	}
}
else 
{
	return false;
}

?>