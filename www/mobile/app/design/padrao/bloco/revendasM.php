<div style="display:none;" class="tips"><?=__FILE__?></div>
<?php
	
	$sqlP = "select * from user where tipoanunciante = 'Revenda'";
	$rsP = mysql_query($sqlP);
?>
<div class="listResales">
	<ul>
		<?php
			while($row = mysql_fetch_assoc($rsP)) {
			
			/* Imagem da revenda. */
			$logo = $row['imagem'];			
			$imageResale = !(empty($logo)) ? $INI['system']['wwwprefix'] . "/media/" . $logo : $INI['system']['wwwprefix'] . "/skin/padrao/images/no_image_resales.jpg";
			
			/* Endereço da revenda. */
			unset($endereco);
			
			if($row['address']!=""){
				$endereco .= $row['address'];
			}
			if($row['numero']!=""){
				$endereco .= ", " . $row['numero']. " ";
			}
			if($row['bairro']!=""){
				$endereco .= "- ".$row['bairro']. " ";	
			}
			if($row['cidade']!=""){
				$endereco .= ", ".$row['cidade']. " ";
			}
			if($row['cep']!="") {
				$endereco .= $row['cep']. " ";
			}
			
			if($row['homepage']!=""){
				$endereco .= "<a target='_blank' href=" . $row['homepage'] . ">" . $row['homepage'] . "</a>";
			}
			
			$endereco = empty($endereco) ? "" : $endereco;	

			/* Formas de contato da revenda. */
			$site = empty($row['site']) ? "" : $row['site'];
			
			$TelefoneTamanho = strlen($row['telefonefixo']);
			$CelularTamanho = strlen($row['celular']);
			$WhatsTamanho = strlen($row['nextel']);
			
			$telefone = $row['telefonefixo'];
			$celular = $row['celular'];
			$whats = $row['nextel'];
			$dddfixo = $row['ddd'];
			$ddd2_  = $row['ddd3'];
			$dddcel = $row['ddd2'];
			
			if($TelefoneTamanho == 8) {
				
				$parte_um = substr($telefone, 0 , 4);
				$separador = "-";
				$parte_dois = substr($telefone, 4, 8);
				
				$telefone = "(" . $dddfixo . ") " . $parte_um . $separador . $parte_dois;
			}
			else if($TelefoneTamanho == 9) {
			
				$parte_um = substr($telefone, 0 , 5);
				$separador = "-";
				$parte_dois = substr($telefone, 5, 8);
				
				$telefone = "(" . $dddfixo . ") " . $parte_um . $separador . $parte_dois;		
			}	
		?>
		<li>
			<p class="titleResales">
				<?php echo utf8_decode($row['realname']); ?> - <?php echo utf8_decode($row['estado']); ?>
			</p>
			<p class="imageResales">
				<img src="<?php echo $imageResale; ?>">
			</p>
			<p class="descriptionResales">
				Endereço: <?php echo utf8_decode($endereco); ?> <br />
				Telefone: <?php echo $telefone; ?> <br />
				Site: <a class="linkPage" target="_blank" href="<?php echo $site; ?>"><?php echo strtolower(utf8_decode($site));?></a>
				<a class="linkStock" href="<?php echo $ROOTPATH; ?>/?busca=true&idparceiro=<?php echo $row['id']; ?>">
					Ver estoque
				</a>
			</p>
		</li>
		<?php 
			}
		?>
	</ul>
</div>