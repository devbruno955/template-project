<?php

include ('../app.php');

/* Aзгo para armazenar a ID dos anъncios nos favoritos. */
if(isset($_POST["action"]) and $_POST["action"] == "AddFavorite") {

	if(isset($_POST["id"]) and !(empty($_POST["id"]))) {
		
		/* Verifica se o anъncio realmente existe. */
		$id = (int) strip_tags($_POST["id"]);
		
		$sql = "select * from team where id = " . $id;
		$rs = mysql_query($sql);
		$num = mysql_num_rows($rs);
		
		/* Caso tenha encontrado o anъncio. */
		if($num >= 1) {
		
			/* Inicia a sessгo para armazenar os anъncios. */
			session_start();
			
			/* Adiciona, apenas se o anъncio nгo estiver na lista de favoritos. */
			if(!(in_array($id, $_SESSION["IdAnuncio"]))) {
				
				$_SESSION["IdAnuncio"][] = $id;
				echo 1;
			}
			else {
				
				foreach ($_SESSION['IdAnuncio'] as $key => $val) {
					if($val == $id){
						unset($_SESSION['IdAnuncio'][$key]);
					}
				}
				echo 0;
			}
		}
		else {
			
			/* Tratamento de erro! */
			return false;
		}
	}
	else {
		
		/* Tratamento de erro! */
		return false;
	}	
}
else {
	
	/* Tratamento de erro! */
	return false;
}

?>