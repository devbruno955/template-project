<?php

include ('../app.php');

/* A��o para armazenar a ID dos an�ncios nos favoritos. */
if(isset($_POST["action"]) and $_POST["action"] == "AddFavorite") {

	if(isset($_POST["id"]) and !(empty($_POST["id"]))) {
		
		/* Verifica se o an�ncio realmente existe. */
		$id = (int) strip_tags($_POST["id"]);
		
		$sql = "select * from team where id = " . $id;
		$rs = mysql_query($sql);
		$num = mysql_num_rows($rs);
		
		/* Caso tenha encontrado o an�ncio. */
		if($num >= 1) {
		
			/* Inicia a sess�o para armazenar os an�ncios. */
			session_start();
			
			/* Adiciona, apenas se o an�ncio n�o estiver na lista de favoritos. */
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