<?php

class Parceiro{
  
	public function getParceiros(){ 
	
		$sql 	= "select * from partner where tipo = 'Imobiliaria'  order by rand()";
		$result = mysql_query($sql); 
		return $result;
		 
	}
	public function getParceiro($partner_id){ 
	
		$sql 	= "select * from partner where  display='Y' and id =  $partner_id";
		$result = mysql_query($sql); 
		$dados 	= mysql_fetch_assoc($result);
		return $dados;	
	}
}


?>