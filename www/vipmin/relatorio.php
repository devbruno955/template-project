<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

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

$team = Table::Fetch('team', $id);

$consulta = array();
$consulta[] = 'SELECT * FROM estados order by nome';
$consulta = implode("\n", $consulta);
mysql_set_charset('utf8', $conecta);
$resultado = mysql_query($consulta);
$i = 0;

?>
 
		<?php while($reg = mysql_fetch_array($resultado)) : ?>
		<?php if($i % 2) { $style = 'background-color: #CCCCCC;'; } else { $style = ''; } ?>
		<?php
			$sql1 = "select sum(clicados) as total from team where imob_estado='".$reg['uf']."'";
			$rs = mysql_query($sql1);
			$row = mysql_fetch_object($rs);
			$totalacessos_por_uf = $row->total;  
			if($totalacessos_por_uf==""  or $totalacessos_por_uf ==0){
				continue;
			}
			?>
			<h3><?= $reg['nome'] ?> ( <?=$reg['uf']?> )  - <?=$totalacessos_por_uf?> acessos(s)</h3>  
		 
			<? 
			//$sql2 = "select * from partner where estado='".$reg['uf']."' order by title";
			$sql2 = " select   p.title, sum( t.clicados) as total  from partner p,team t where p.estado='".$reg['uf']."' and  t.imob_estado = p.estado  and t.partner_id = p.id group by p.title  order by total desc";
			$rs2 = mysql_query($sql2);
			while($row2 = mysql_fetch_object($rs2)){
			
				$parceiro =  $row2->title ; 
				//$parceiro = ucwords($parceiro); 
				//$parceiro = strtoupper($parceiro); 
				$idparceiro = $row2->id;  
				
				//$sql3 = "select sum(clicados) as total from team where imob_estado='".$reg['uf']."' and partner_id=".$idparceiro;
				//$rs3 = mysql_query($sql3);
				//$row3 = mysql_fetch_object($rs3);
				$totalacessos_por_uf = $row2->total; 
				if($totalacessos_por_uf==""  or $totalacessos_por_uf ==0){
				 $totalacessos_por_uf="0";
				}
				?>
				<?= $parceiro ?>   - <?=$totalacessos_por_uf?> acessos(s) 
				 
				<?	echo "<br>";
			}
		?>
		
		<?php $i++; endwhile; ?> 
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