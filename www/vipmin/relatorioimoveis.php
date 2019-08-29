<?php
 
require_once(dirname(dirname(__FILE__)) . '/app.php');
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/x-msexcel; charset='utf-8'");
header("Content-Disposition: attachment;filename = \"Relatorio.xls\"");
header("Content-Description: VipCom");

function numeroToMoeda($numero, $qtdDecimais = 2) {
	$numero = number_format($numero, $qtdDecimais);
	$numero = explode('.', $numero);
	return sprintf('%s,%s', str_replace(',', '.', $numero[0]), $numero[1]);
}
function str2num($str){ 
  if(strpos($str, '.') < strpos($str,',')){ 
            $str = str_replace('.','',$str); 
            $str = strtr($str,',','.');            
        } 
        else{ 
            $str = str_replace(',','',$str);            
        } 
        return (float)$str; 
} 
 

$id = abs(intval($_GET['id']));

$partner_id = abs(intval($_SESSION['partner_id']));

$login_partner = Table::Fetch('partner', $partner_id);

 
$consulta = array();
$consulta[] = 'SELECT  t.*,b.nome as nomebairro, c.nome as nomecidade 
FROM `team` AS t 
LEFT JOIN bairros AS b ON t.imob_bairro = b.id
LEFT JOIN cidades AS c ON c.id = t.city_id';

//$consulta[] = sprintf('WHERE o.team_id = %s', $id);

$consulta[] = 'ORDER BY b.nome ASC';

$consulta = implode("\n", $consulta);

mysql_set_charset('utf8', $conecta);

$resultado = mysql_query($consulta);

$i = 0;

?>
 <img  width="230"  border="0" src="<?=$ROOTPATH?>/include/logo/logo.png"> 

<table cellpadding="3" cellspacing="3" border="0"> 
	<thead>
		<tr>
			<th> </th> 
		</tr>
	</thead>
	
	<tbody>
	 
		<tr style="background-color: #ffff; width:500px"> 
			<td>  
			<br> 
			</td>		
			<td>  
			<br> 
			</td>
			<td>  
			<br> 
			</td>
			<td>  
			<br> 
			</td>	
		 	 
			<td colspan="3"> teste  teste teste teste teste teste  teste teste teste teste<br>
			<br> teste  teste teste teste teste
			<br> teste  teste teste teste teste
			<br> 
			</td> 
		</tr>
		  
		
	</tbody>
</table>


<table cellpadding="3" cellspacing="3" border="1">
	<thead>
		<tr>
			<th>ID </th>
			<th>BAIRRO </th>
			<th>TIPO </th> 
			<th> FINALIDADE</th>  
			<th> VALOR</th>  
			<th> OPCIONAIS</th>  
			<th> CLIQUES</th>  
		</tr>
	</thead>
	<tbody>
		<?php while($reg = mysql_fetch_array($resultado)) : ?>
		<?php if($i % 2) { $style = 'background-color: #fff;'; } else { $style = ''; } ?>
		<?php
		$Finalidades = Array(
		  "Venda",
		  "Aluguel",
		  "Temporada"
		 );

		$Tipo = gettipoimovel($reg['imob_tipo']); 
			
		?>
		<tr style="background-color: #CCCCCC;"> 
			<td style="text-align:left"><?=utf8_decode($reg['id'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['nomebairro'])?></td>
			<td style="text-align:left"><?=$Tipo ?></td> 
			<td style="text-align:left"><?=$Finalidades[$reg['imob_finalidade']]?></td> 
			<td style="text-align:left"><?=number_format($reg['team_price'], 2, ',', '.') ?></td> 
			<td style="text-align:left"><?=$reg['imob_adicionais'] ?></td>  
			<td style="text-align:left"><?=$reg['clicados'] ?></td>  
		</tr>
		 
		<?php $i++; endwhile; ?>
		
	</tbody>
</table>

<?
function remover_caracter($string) {
    $string = preg_replace("/[áàâãä]/", "a", $string);
    $string = preg_replace("/[ÁÀÂÃÄ]/", "A", $string);
    $string = preg_replace("/[éèê]/", "e", $string);
    $string = preg_replace("/[ÉÈÊ]/", "E", $string);
    $string = preg_replace("/[íì]/", "i", $string);
    $string = preg_replace("/[ÍÌ]/", "I", $string);
    $string = preg_replace("/[óòôõö]/", "o", $string);
    $string = preg_replace("/[ÓÒÔÕÖ]/", "O", $string);
    $string = preg_replace("/[úùü]/", "u", $string);
    $string = preg_replace("/[ÚÙÜ]/", "U", $string);
    $string = preg_replace("/ç/", "c", $string);
    $string = preg_replace("/Ç/", "C", $string);
    $string = preg_replace("/[][><}{)(:;,!?*%~^`&#@]/", "", $string);
    $string = preg_replace("/ /", "_", $string);
    return $string;
}
?>