<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110925788-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-110925788-1');
</script>





<div style="display:none;" class="tips"><?=__FILE__?></div>
<!-- 
<?php 

$flag = 0;

if(!(empty($login_user["id"]))) {
	$flag = 1;
}

?> 
<div id="resultado-menu">
	<div class="home-menu" id="home-menu-sup">
		<a class="menu menu-sup" href="#"><i class="fa fa-bars"></i></a>
		<div class="arrow-up hide"></div>
		<a itemprop="url" href="<?php echo $ROOTPATH; ?>" class="logo">
			<img style="margin-top: -10px; margin-left: 10px;" width="130px" height="auto" src="<?php echo $ROOTPATH; ?>/include/logo/logo.png" alt="<?php echo $INI['system']['name']; ?>" itemprop="logo">
		</a>
	</div>
	<div class="form-busca-topo">
        <div class="select select-large field-search select-transacao search-top-tipo">
            <select class="search-top-tipo" name="transacao" id="sl-tipoanuncio-top">
				<option value="comprar">Comprar</option>
				<option value="alugar">Alugar</option>
			</select>          
        </div>
        <div class="select select-large select-tipo field-search search-top-imovel">
            <select class="sl-tipoimovel search-top-imovel" name="tipoimovel" id="sl-tipoimovel-top">
				<option value="">Tipos de imóvel</option>
				<?php
					/* Neste ponto é buscado os tipos de imóveis previamente cadastrados pelo administrador. */
					$tipos = mysql_query("SELECT * FROM  tipoimoveis order by nome") or die(mysql_error());
					
					while($row = mysql_fetch_assoc($tipos)) {
					
						$nome = tratamento_string($row["nome"]);
				?>
				<option value="<?php echo utf8_encode($nome); ?>"><?php echo utf8_decode($row["nome"]); ?></option>
				<?php
					}
				?>
			</select>           
        </div>
        <div class="localidade div-search field-search search-top-place">
            <div class="search-box">
                <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;">
					<input type="text" value="" class="form-inline input-large tt-hint" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: rgb(255, 255, 255) none repeat scroll 0% 0%;" readonly="" autocomplete="off" spellcheck="false" tabindex="-1">
					<input type="text" value="" placeholder="PESQUISE POR BAIRRO" name="location" class="form-inline input-large tt-input search-top-place" id="location-top" autocomplete="off" spellcheck="false" style="position: relative; vertical-align: top; background-color: transparent;" dir="auto">
					<pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Open Sans&quot;,sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: optimizelegibility; text-transform: none;">
					</pre>
					<span class="tt-dropdown-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none; right: auto;">
						<div class="tt-dataset-bairro"></div>
						<div class="tt-dataset-cidade"></div>
					</span>
				</span>
                <i class="clear-input input-typeahead fa fa-times-circle"></i>
            </div>
        </div>
        <span class="form-inline btn btn-localidade btn-amarelo btn-search-home search-top-btn" id="search-imovel-top">
            <i class="fa fa-search fa-lg"></i>
        </span>        
    </div>
	<div class="form_publish">
		<div class="insert-box">
			<span class="label-free">
				<a style="font-size: 20px;padding: 5px;" class="btn btn-large btn-orange <?php if($flag == 0) { ?> tk_logar <?php } ?>" href="<?php if($flag == 0) { ?>#<?php } else { echo $ROOTPATH; ?>/adminanunciante/<?php } ?>" >Anunciar</a>
			</span>
		</div>
	</div>
</div>

-->