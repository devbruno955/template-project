<? if($INI['option']['cidadesdestaque'] == "Y" or $INI['option']['cidadesdestaque'] =="" ){?>

	<div style="display:none;" class="tips"><?=_FILE_?></div> 
	<?php

	/* Contador iniciado com valor 0. São 4 cidades por linha. */
	$j = 0;

	$sql = "select id, destaque, descricao, imagem, nome, uf from cidades where destaque = 1 order by rand() limit 8";
	$rs = mysql_query($sql) or die (mysql_error());
	if(mysql_num_rows($rs)){ 
	?>
		<div style="text-align:center;"><h1><?=utf8_decode($INI['system']['txt5'])?></h1></div>
		<div class="row hidden-xs">
			<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 box-celula linha-1">
				<ul class="ul-celula">
					<?php
						while($cidades = mysql_fetch_assoc($rs)) {
						
							$uf = strtoupper(tratamento_string($cidades["uf"]));
							$nome = utf8_decode($cidades["nome"]);
							$nome = removeAcentos2($nome);
							$nome = tratamento_string($nome);
 
							$nome = removeAcentos2($nome);
							
							$cidade = $cidades['id'];
							
							$link = $ROOTPATH . "/finalidade_todos/todos-tipos/varios-quartos/varias-vagas/todos-bairros/" . $nome . "/" . $uf . "/todos-cep/com-e-sem-condominio/";
							
							if($j <= 3) {
					?>
					<li>
						<a data-lastsearch="<?php echo utf8_decode($cidades["uf"]) . "." . utf8_decode($cidades["nome"]); ?>" data-nome="<?php echo utf8_decode($cidades["uf"]) . " | " . utf8_decode($cidades["nome"]); ?>" data-busca="<?php echo utf8_decode($cidades["uf"]) . "(" . utf8_decode($cidades["nome"]) . ")"; ?>" class="a-celula" href="<?php echo $link; ?>">
						<img class="img-responsive ig-xpro2" src="<?php echo $ROOTPATH; ?>/media/<?php echo $cidades["imagem"]; ?>" alt="<?php echo utf8_decode($cidades["nome"]); ?>">
							<h4 class="name"><?php echo utf8_decode($cidades["nome"]); ?></h4>
						</a>
						<div class="box-link box-link-sm">
							<ul class="ul-link">
								<li>
									<p><?php echo utf8_decode($cidades["descricao"]); ?></p>
								</li>
							</ul>
						</div>
					</li>
					<?php 
						}
						  else { 
					?>
				<?php if($j == 4) { ?>
				</ul>
			</div>
			<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 box-celula">
				<ul class="ul-celula">
				<?php } ?>
					<li>
						<img class="img-responsive ig-xpro2" src="<?php echo $ROOTPATH; ?>/media/<?php echo $cidades["imagem"]; ?>" alt="<?php echo utf8_decode($cidades["nome"]); ?>">
						<a data-lastsearch="<?php echo utf8_decode($cidades["uf"]) . "." . utf8_decode($cidades["nome"]); ?>" data-nome="<?php echo utf8_decode($cidades["uf"]) . " | " . utf8_decode($cidades["nome"]); ?>" data-busca="<?php echo utf8_decode($cidades["uf"]) . "(" . utf8_decode($cidades["nome"]) . ")"; ?>" class="a-celula" href="<?php echo $link; ?>">
							<h4 class="name"><?php echo utf8_decode($cidades["nome"]); ?></h4>
						</a>
						<div class="box-link box-link-sm">
							<ul class="ul-link">
								<li>
									<p><?php echo utf8_decode($cidades["descricao"]); ?></p>
								</li>
							</ul>
						</div>
					</li>
				<?php } $j ++; } ?>
				</ul>		
			</div>
		</div>
	<? } ?>
 <? } ?>