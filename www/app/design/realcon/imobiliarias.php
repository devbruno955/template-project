<?php 
require_once("include/head.php"); 
$pagetitle = $category['name']; 
 
?> 
<style> 
.filterbar-full {width: 100%;}
.titulo-busca h4 {    color: #303030; font-size: 17px;}

dd.planoNitroHomeDesc p, dd.planoNitroDesc p, dd.planoTurboDesc p, dd.planoGratisDesc p {
    line-height: 26px; 
}

.planoNitroHome dd.titulo-busca {
    background: none;
    border-bottom: none;
}
</style>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/paginacao.js" ></script>
<body id="page1"> 
<div style="display:none;" class="tips"><?=__FILE__?></div>
<div class="tail-top">
<?php  require_once(DIR_BLOCO."/bloco_background.php"); ?>
    <div class="main"> 
		<?php  require_once(DIR_BLOCO."/header.php"); ?>
		<section id="content">     
            <div class="inside">  
				<div class="col-1f">     
						<div class="search-background" style="z-index:999;margin-left:110px;">
						   <img src="<?=$PATHSKIN?>/images/loader.gif" alt="" /> 
						</div>
						<div class="titpages">Imobiliárias</div> 
						<div id="pgofertas" style="margin-top:12px;"></div> 
						
						<!-- NUMERO DAS PÁGINAS -->
						<br style="clear:both;">
						<div id="pgofertas">
						<? require_once("include/paginacao.php"); ?> 
						</div> 
				</div> 
			</div>
        </section>
    </div>
</div>  
 <?php require_once(DIR_BLOCO."/rodape.php"); ?> 
</body>
</html>
