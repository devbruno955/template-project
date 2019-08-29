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

<!-- selection board begin -->
<form id="search-form">
            <div class="selection-board">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="select-board">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-6">
                                        <div class="suitch">
                                            <select class="comprar" name="transacao" id="sl-transacao">
                                                            <option value="finalidade_todos">Finalidade</option>
                                                            <option value="finalidade_todos">Todos</option>
                                                            <option value="comprar">Comprar</option>
                                                            <option value="alugar">Alugar</option>
                                                            <!--<option value="alugar-temporada">Alugar temporada</option>-->
                                                            <option value="lancamentos">Lançamentos</option>
                                                        </select>
                                            <div class="icon">
                                                <i class="fas fa-sort-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6">
                                        <div class="suitch">
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
                                            <div class="icon">
                                                <i class="fas fa-sort-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6">
                                        <div class="suitch">
                                            <select class="quantidade_quartos" id="quantidade_quartos">
                                                            <option value="0">Quartos</option>
                                                            <option value="1-quarto">1 quarto</option>
                                                            <option value="2-quartos">2 quartos</option>
                                                            <option value="3-quartos">3 quartos</option>
                                                            <option value="4-quartos">4 quartos</option>
                                                            <option value="5-quartos">5+ quartos</option>
                                                        </select>
                                            <div class="icon">
                                                <i class="fas fa-sort-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6">
                                        <div class="suitch">
                                            <select class="quantidade_vagas" id="quantidade_vagas">
                                                    <option value="0">Vagas</option>
                                                    <option value="1-vaga">1 vaga</option>
                                                    <option value="2-vagas">2 vagas</option>
                                                    <option value="3-vagas">3 vagas</option>
                                                    <option value="4-vagas">4 vagas</option>
                                                    <option value="5-vagas">5+ vagas</option>
                                                </select>
                                            <div class="icon">
                                                <i class="fas fa-sort-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6">
                                        <div class="suitch">
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
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6">
                                        <div class="suitch">
                                            <select data-placeholder="Todas as cidades" id="city_id" name="city_id" class="chosen-select uf">
                                                        <option value="">Todas as cidades</option>
                                                    </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6">
                                        <div class="suitch">
                                            <select data-placeholder="Condomínio" id="condominio" name="condominio" class="chosen-select uf">
                                                        <option value="">Condomínio</option>
                                                        <option value="com-condominio">Com condomínio</option>
                                                        <option value="sem-condominio">Sem condomínio</option>
                                                        <option value="com-e-sem-condominio">Com e sem condomínio</option>
                                                    </select>
                                            <div class="icon">
                                                <i class="fas fa-sort-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6">
                                        <div class="suitch">
                                            <select data-placeholder="Todos os bairros" id="location" name="location" class="chosen-select uf">
                                                    <option value="">Todos os bairros</option>
                                                </select>
                                            <div class="icon">
                                                <i class="fas fa-sort-down"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!--
                                    <div class="col-xl-3 col-lg-3 col-md-6">
                                        <div class="price-range-slider">
                                            <div id="result">$0 - $269,000</div>

                                          <div id="my-slider" data-min="0" data-step="1" data-min-value="0" data-max-value="269000" data-max="269000" class="slider">
                                            <div class="slider-touch-left">
                                              <span></span>
                                            </div>
                                            <div class="slider-touch-right">
                                              <span></span>
                                            </div>
                                            <div class="slider-line">
                                              <span></span>
                                            </div>
                                          </div>
                                        </div>

                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-6">
                                        <div class="price-range-slider-2">
                                            <div id="result-2">0 SqFt - 2000 SqFt</div>

                                          <div id="my-slider-2" data-min="0" data-step="1" data-min-value="0" data-max-value="2000" data-max="2000" class="slider">
                                            <div class="slider-touch-left">
                                              <span></span>
                                            </div>
                                            <div class="slider-touch-right">
                                              <span></span>
                                            </div>
                                            <div class="slider-line">
                                              <span></span>
                                            </div>
                                          </div>
                                        </div>
                                    -->

                                    </div>
                                    <center>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="search-button">
                                                <button type="button" id="search-imovel">Buscar</button>
                                            </div>                                        
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- selection board end -->
</form>