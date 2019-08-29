<div style="display:none;" class="tips"><?=__FILE__?></div>

	<? 
if(isset($_REQUEST['vendedor'])){
	$_SESSION['vendedor'] = $_REQUEST['vendedor'];
}

?>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery(".btn-custom-1").click(function(){

            //Data de expiração
            var days = 365;
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            var expires = date.toGMTString();

            // Cria o cookie
            document.cookie = 'cookiesagree=cookietrue;expires='+expires;
            jQuery(".row-cookies-agree").hide();
        });
    });
</script>
 
 <?php
   /* if(!isset($_COOKIE['cookiesagree']) AND !$_COOKIE['cookiesagree'] == "cookietrue"){
?>
<div class="row-cookies-agree">
    <div class="row-custom-1">
        USAMOS COOKIES E OUTRAS TECNOLOGIAS NESTE PORTAL COM O OBJETIVO DE:<br>
        (A) Personalizar conte&uacute;do aqui e nas redes sociais; (B) Analisar nosso tr&aacute;fego; (C) Compreender como voc&ecirc; usa este Portal; e (D) Partilhar algumas informa&ccedil;&otilde;es com parceiros comerciais. Leia nossas <a href="<?php echo $ROOTPATH.'/page/about_privacy/Politicas'; ?>">Pol&iacute;ticas</a>.
    </div>

    <button class="btn-custom-1">Aceitar</button>
</div>
<?php 
   }*/
?>

        
    </div>
    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 full-rodape hidden-xs hidden-sm">
        <div class="col col-xs-12 col-sm-12 col-md-3 col-lg-3 box-logo rodape-logo">
            
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar">
                <ul class="ul-linha1">                    
                    <li class="path"><a target="_blank" href="<?php echo $ROOTPATH; ?>/page/about_terms">Termos</a></li>
                    <li class="path"><a target="_blank" href="<?php echo $ROOTPATH; ?>/page/about_us">Quem somos</a></li>
                    <li class="path"><a target="_blank" href="<?php echo $ROOTPATH; ?>/page/about_privacy/Politica%20de%20Privacidade%20e%20Cookie">Pol&iacute;ticas</a></li>
                </ul>
            </div>
            <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar">
                <hr>
            </div>
            <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar">
                <ul class="ul-linha2">
                    <li>&copy; Copyright <?php echo date('Y')." ". utf8_decode($INI['system']['sitename']); ?>. Todos os direitos reservados.</li>                
                </ul>
            </div>
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-3 col-lg-3 box-social">
            <h5 class="nopadmar">Siga nas redes</h5>
           <ul class="social">
                <? if($INI['other']['facebook']){?>
                <li><a target="_blank" href="<?= $INI['other']['facebook'] ?>"><img src="<?php echo $PATHSKIN; ?>/images/facebook.png"></a></li>
                <?}if($INI['other']['twitter']){?>
                <li><a target="_blank" href="<?= $INI['other']['twitter'] ?>"><img src="<?php echo $PATHSKIN; ?>/images/twitter.png"></i></a></li>
                <?}if($INI['other']['googleplus']){?>
                <li><a target="_blank" href="<?= $INI['other']['googleplus'] ?>"><img src="<?php echo $PATHSKIN; ?>/images/google.png"></i></a></li>
                 <?}if($INI['other']['youtube']){?>
                <li><a target="_blank" href="<?= $INI['other']['youtube'] ?>"><img src="<?php echo $PATHSKIN; ?>/images/youtube.png"></i></a></li>
                 <?}if($INI['other']['instagram']){?>
                <li><a target="_blank" href="<?= $INI['other']['instagram'] ?>"><img style="width: 31px;" src="<?php echo $PATHSKIN; ?>/images/instagram.png"></i></a></li>
                <?}?>
            </ul>
        </div>
    </div>
</div>

<div style="display:none;" class="webdeveloper"><a  style="margin-left:10px;"href="#" onclick="javascript:J('.tips').css('display', 'block')">Ver local dos arquivos</a> | <a href="#" onclick="javascript:J('.tips').css('display', 'none')">Ocultar local dos arquivos</a>  | <a href="#" onclick="javascript:J('.webdeveloper').css('display', 'none')">Desligar Tkstore developer</a> <a style="float:left;" href="http://www.sistemacomprascoletivas.com.br" target="_blank"><img title="Vipcom - O seu sistema de compras coletivas definitivo - o melhor script de compra coletiva da atualidade." alt="Vipcom - O seu sistema de compras coletivas definitivo - o melhor script de compra coletiva da atualidade." src="<?=$PATHSKIN?>/images/logoweb.png" /></a></div>



<? if($INI['option']['bloco_tkdeveloper'] == "Y"){?>
    <script>
        J('.webdeveloper').css('display', 'block')
    </script>
<? } ?>

<script src="<?php echo $ROOTPATH.'/js/masterslider.min.js?ver=3.1.1'; ?>"></script>
