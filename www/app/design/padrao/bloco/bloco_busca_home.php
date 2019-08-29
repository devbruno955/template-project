<script src=https://code.jquery.com/jquery-migrate-1.4.1.min.js></script>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="b-find">

                <ul class="b-find-nav nav nav-tabs" id="findTab" role="tablist">
                    <li class="b-find-nav__item nav-item"><a class="b-find-nav__link nav-link active" id="tab-allCar" data-toggle="tab" href="#content-allCar" role="tab" aria-controls="content-allCar" aria-selected="true">Busca</a></li>

                </ul>
                <hr>

                <?php

/* Estados são recuperados e preenchidos no select de busca. */
$estados = mysql_query('SELECT * FROM `estados`') or die(mysql_error());

/* Caso o parâmetro com o estado exista e for diferente de vazio, as cidades são recuperadas
   e o select é preenchido.
*/
if(isset($_REQUEST['uf']) and !(empty($_REQUEST['uf']))) {	
	$cidade = strip_tags($_REQUEST['uf']);
	$cidades = mysql_query("SELECT * FROM cidades WHERE uf =  '{$cidade}'") or die(mysql_error());
}

/* Neste ponto é buscado os tipos de imóveis previamente cadastrados pelo administrador. */
$tipos = mysql_query("SELECT * FROM  tipoimoveis order by nome") or die(mysql_error());

?>
                    <div style="display:none;" class="tips">
                        <?=__FILE__?>
                    </div>
                    <script>
                        urlFiltro = "<?php echo $ROOTPATH; ?>/ajax/filtro_pesquisa.php";
                        jQuery(function() {

                            //jQuery('#cep').mask('99.999-999');

                            jQuery('#uf').bind('change', function(ev) {
                                jQuery.ajax({
                                    type: 'POST',
                                    url: urlFiltro,
                                    data: {
                                        filtro: 'cidades',
                                        estado: jQuery('#uf').val()
                                    },
                                    beforeSend: function() {
                                        jQuery('#city').html('<option>Carregando...</option>');
                                        jQuery('#select_imob_bairro').html('<option></option>');
                                    },
                                    success: function(r) {
                                        jQuery('#city').html(r);
                                    }
                                });
                            });
                        });
                    </script>
                    <!--<link href="http://www.jqueryrain.com/wp-content/plugins/wp-bar/wpbar.css" rel="stylesheet" type="text/css" />-->
                    <link href="<?php echo $PATHSKIN; ?>/css/bootstrap-chosen.css" rel="stylesheet" type="text/css" />
                    <!--<script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>-->
                    <script src="<?php echo $ROOTPATH; ?>/js/chosen.jquery.min.js"></script>
                    <script>
                        
                        jQuery(function() {

                            /* Inicializa o plugin. */
                            jQuery('.chosen-select').chosen();
                            jQuery('.chosen-select-deselect').chosen({
                                allow_single_deselect: true
                            });

                            jQuery('.chosen-select').on('change', function(evt, params) {

                                var type = jQuery(this).attr('id');
                                var selectedValue = params.selected;

                                /* Busca as cidades de acordo com o estado escolhido. */
                                if (type == 'uf') {
                                    jQuery.ajax({
                                        type: 'POST',
                                        url: urlFiltro,
                                        data: {
                                            filtro: 'cidades_anuncios',
                                            estado: jQuery('#uf').val()
                                        },
                                        beforeSend: function() {
                                            jQuery('#city_id').html('<option>Carregando...</option>');
                                        },
                                        success: function(r) {
                                            jQuery('#city_id').html(r);
                                            jQuery('#city_id').find('option:first-child').prop('selected', true).end().trigger('chosen:updated');
                                        }
                                    });
                                }

                                if (type == 'city_id') {
                                    jQuery.ajax({
                                        type: 'POST',
                                        url: urlFiltro,
                                        data: {
                                            filtro: 'bairros_anuncios',
                                            cidade: jQuery('#city_id').val()
                                        },
                                        beforeSend: function() {
                                            jQuery('#location').html('<option>Carregando...</option>');
                                        },
                                        success: function(r) {
                                            jQuery('#location').html(r);
                                            jQuery('#location').find('option:first-child').prop('selected', true).end().trigger('chosen:updated');
                                        }
                                    });
                                }
                            });
                        });
                    </script>
                    <style>
                        /*.chosen-container-single .chosen-single {
                            height: 42px;
                            line-height: 42px;
                            border-radius: 0px;
                        }

                        .chosen-container-single .chosen-search input[type="text"] {
                            width: 85%;
                            font-size: 13px;
                        }

                        .select.select-large.select-tipo.field-search {
                            padding-right: 3.1px;
                        }

                        .chosen-container-single .chosen-single span {
                            padding: 0 1.5em 0 20px !important;
                            font-size: 13px !important;
                        }*/
                    </style>
                    <div class="home-title">
                        <div class="txthome" style="color:#fff;">
                            <?=utf8_decode($INI['system']['txt8'])?>
                        </div>
                        <div class="txthomesub" style="color:#fff;">
                            <?=utf8_decode($INI['system']['txt9'])?>
                        </div>
                    </div>

                    <div class="text-center" id="search-home">

                        <form id="search-form">
                            <table>

                                <div class="div-search" id="input-default">

                                    <tr>

                                        <section class="col col-xs-12 col-sm-12 col-md-11 col-lg-11 sec-11">
                                            <section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar">
                                                <div class="select select-large field-search select-transacao">
                                                    <td>
                                                        <select class="comprar" name="transacao" id="sl-transacao">
                                                            <option value="finalidade_todos">Finalidade</option>
                                                            <option value="finalidade_todos">Todos</option>
                                                            <option value="comprar">Comprar</option>
                                                            <option value="alugar">Alugar</option>
                                                            <!--<option value="alugar-temporada">Alugar temporada</option>-->
                                                            <option value="lancamentos">Lançamentos</option>
                                                        </select>
                                                </div>
                                                <td>
                                                    <div class="select select-large select-tipo field-search">
                                                        <select name="tipoimovel" id="sl-tipoimovel" class="chosen-select tipoimovel">
                                                            <option value="">Tipo de Imóvel</option>
                                                            <?php
									while($row = mysql_fetch_assoc($tipos)) {

										$nome = utf8_decode(tratamento_string($row["nome"]));
								?>
                                                                <option value="<?php echo $nome; ?>">
                                                                    <?php echo utf8_decode($row["nome"]); ?>
                                                                </option>
                                                                <?php
									}
								?>
                                                        </select>
                                                    </div>
                                                </td>
                                            </section>
                                            </td>

                                            <section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar">
                                                <div class="select select-large field-search select-transacao">
                                                    <td>
                                                        <select class="quantidade_quartos" id="quantidade_quartos">
                                                            <option value="0">Quartos</option>
                                                            <option value="1-quarto">1 quarto</option>
                                                            <option value="2-quartos">2 quartos</option>
                                                            <option value="3-quartos">3 quartos</option>
                                                            <option value="4-quartos">4 quartos</option>
                                                            <option value="5-quartos">5+ quartos</option>
                                                        </select>
                                                        <i class="seta"></i>
                                                </div>

                                                </td>
                                    </tr>

                                    <tr>

                                        <div class="select select-large select-tipo field-search">
                                            <td>
                                                <select class="quantidade_vagas" id="quantidade_vagas">
                                                    <option value="0">Vagas</option>
                                                    <option value="1-vaga">1 vaga</option>
                                                    <option value="2-vagas">2 vagas</option>
                                                    <option value="3-vagas">3 vagas</option>
                                                    <option value="4-vagas">4 vagas</option>
                                                    <option value="5-vagas">5+ vagas</option>
                                                </select>
                                                <i class="seta"></i>
                                        </div>
                                        </td>
                                        </section>

                                        <section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar">
                                            <div class="select select-large field-search select-transacao">
                                                <td>
                                                    <select id="uf" name="uf" class="chosen-select uf">
                                                        <option value="">Todos os estados</option>
                                                        <?php
								while ($row = mysql_fetch_array($estados,  MYSQL_ASSOC)) {

									if (isset($_REQUEST['uf']) && $_REQUEST['uf'] == $row['uf']) {
										echo "<option value='{$row['uf']}' selected>".utf8_decode($row['nome'])."</option>";
									} 
									else { 
										echo "<option value='{$row['uf']}'>".utf8_decode($row['nome'])."</option>";
									}
								}
							?>

                                                    </select>
                                                </td>
                                                <i class="seta"></i>
                                            </div>
                                            <div class="select select-large select-tipo field-search">
                                                <td>
                                                    <select data-placeholder="Todas as cidades" id="city_id" name="city_id" class="chosen-select uf">
                                                        <option value="">Todas as cidades</option>
                                                    </select>
                                                </td>
                                                <i class="seta"></i>

                                    </tr>
                                    </div>
                                    </section>
                                    <section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar">
                                        <div class="select select-large select-tipo field-search">
                                            <tr>
                                                <td>
                                                    <select data-placeholder="Condomínio" id="condominio" name="condominio" class="chosen-select uf">
                                                        <option value="">Condomínio</option>
                                                        <option value="com-condominio">Com condomínio</option>
                                                        <option value="sem-condominio">Sem condomínio</option>
                                                        <option value="com-e-sem-condominio">Com e sem condomínio</option>
                                                    </select>
                                                </td>
                                                <i class="seta"></i>
                                        </div>
                                        <div class="select select-large field-search select-transacao">
                                            <td>
                                                <select data-placeholder="Todos os bairros" id="location" name="location" class="chosen-select uf">
                                                    <option value="">Todos os bairros</option>
                                                </select>
                                            </td>

                                            <i class="seta"></i>
                                        </div>
                                        <div class="select select-large select-tipo field-search" style="display:none;">
                                            <input type="text" value="" placeholder="CEP" name="cep" class="form-inline input-large tt-input" id="cep" autocomplete="off" spellcheck="false" style="position: relative; vertical-align: top; background-color: transparent; padding: 0px 1.5em 0px 20px; height: 42px; font-size: 13px; width: 138px;" dir="auto">
                                        </div>
                                    </section>
                                    </section>

                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <section class="col col-xs-12 col-sm-12 col-md-1 col-lg-1 sec-btn" style="margin-top: 0px;">
                                                <span class="form-inline btn btn-localidade btn-amarelo btn-search-home" id="search-imovel">
					<i class="b-find__btn btn btn-primary">Buscar</i>
				</span>
                                        </td>
                                    </tr>
                                    </section>
                                </div>

                            </table>
                        </form>
                    </div>

            </div>
        </div>
    </div>
</div>