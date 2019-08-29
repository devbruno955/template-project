<div style="display:none;" class="tips"><?=__FILE__?></div>
<?php
	$sqlP = "select * from partner where tipo='Imobiliaria' order by id DESC";
	$rsP  = mysql_query($sqlP);
?>
<div class="listResales">
	<ul>
		<?php
			while($row = mysql_fetch_assoc($rsP)) {		
			
			/* Imagem da revenda. */
			$logo = $row['imagem'];			
			$imageResale = !(empty($logo)) ? $INI['system']['wwwprefix'] . "/media/" . $logo : $INI['system']['wwwprefix'] . "/skin/padrao/images/semfoto.jpg";
			
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
		?>
		<li>
			<p class="titleResales">
				<?php echo utf8_decode($row['title']); ?> - <?php echo utf8_decode($row['estado']); ?>
			</p>
			<p class="imageResales">
				<img src="<?php echo $imageResale; ?>">
			</p>
			<p class="descriptionResales">
				Endereço: <?php echo utf8_decode($endereco); ?> <br />
				Telefone: <?php echo $row['phone'] == "undefined" ? "-" : $row['phone']; ?> <br />
				Telefone celular: <?php echo $row['mobile'] == "undefined" ? "-" : $row['mobile']; ?> <br />
				Email: <?php echo $row['contact']; ?>
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