<?php  
	require_once("include/head.php");
	require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "/include/code/minhaconta.php");
?>
<div style="display:none;" class="tips"><?=__FILE__?></div> 
	<body id="page1" class="webstore home">	
		<!-- Responsivo -->
		<div class="containerM">
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/header.php"); ?>	
			</div>			
			<div class="row">
				<div class="titlePage">
					<p>Minha conta</p>
				</div>
			</div>
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/minhacontaM.php"); ?>
			</div>
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/rodapeM.php"); ?>				
			</div>			
		</div>
	</body>
</html>
