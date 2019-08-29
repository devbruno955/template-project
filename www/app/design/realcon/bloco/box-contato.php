			<div style="display:none;" class="tips"><?=__FILE__?></div>
			<div class="LoadingImageContact" style="display:none;">
				<img src="<?php echo $PATHSKIN; ?>/images/loading.gif">
			</div>
			<div class="col col-xs-12 col-sm-12 col-md-6 col-lg-4 box-contato">
                <div class="MsgRetorno">
				</div> 
                <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 box-agencia-top nopadmar" style="width: 100%;" >
                    <h4 id="h4-nomeAgencia">Entre em Contato</h4>
                </div>
                <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar tel-agencia">
                    <a class="cor-F9683D tel-up a-tel block-tel" id="ver-telefone-h3" href="">
						<i class="fa fa-phone cor-F9683D"></i>&nbsp;
						<? if(!empty($telefone)){?>
							<span class="cel-contato" itemprop="telephone">
								<?php echo $telefone; ?>
							</span>
						<? } ?>
						<? if($celular != ""){?>
						<span class="cel-contato" itemprop="cellphone">
							<?php echo $celular; ?>
						</span>
						<? } ?>
					</a>
                </div>

                <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 sky-form-columns">
                    <form class="sky-form" id="form-contato1">
                        <fieldset>
                            <div class="row">
                                <section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 form-contato-lateral">
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="text" placeholder="Nome" class="name" id="name" name="name">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 form-contato-lateral">
                                    <label class="input">
                                        <i class="icon-append fa fa-envelope"></i>
                                        <input type="email" placeholder="E-mail" class="email" id="emaillateral" name="emaillateral">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 form-contato-lateral">
                                    <label class="input">
                                        <i class="icon-append fa fa-phone"></i>
                                        <input type="text" placeholder="Telefone" onkeypress='mascaraTelefone(this,telDig)' class="telefone" id="telefone1" name="telefone1" maxlength="15" autocomplete="off">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 form-contato-lateral">
                                    <label class="textarea">
                                        <textarea placeholder="Olá, eu gostaria de obter mais informações sobre este imóvel. Aguardarei o contato. Obrigado." id="mensagem" name="mensagem" cols="4" rows="4" maxlength="500">Olá, eu gostaria de obter mais informações sobre este imóvel. Aguardarei o contato. Obrigado.</textarea>
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 form-contato-lateral">
                                    <label class="checkbox ck-receber">
                                        <input type="checkbox" checked="" id="recebeinfo1">
                                		Me cadastrar na newsletter.
                                	</label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 form-contato-lateral">
                                    <button class="btn btn-laranja enviar-contato btn-enviar1" id="btn-enviarContatoLateral" type="button" data-type="left">
                                        <i class="fa fa-paper-plane"></i>&nbsp;&nbsp;ENVIAR CONTATO
                                    </button>
                                </section>
                            </div>
                        </fieldset>
                    </form>
					<?php if(false) {//if($this->financiamento == 1) { ?>
					<form method="post" action="post" class="sky-form" id="form-financiamento">
						<p>Ao enviar, você está concordando com os <a target="_blank" href="/termos-de-uso/">Termos de Uso.</a></p>
						<h3 class="title">SIMULAR FINANCIAMENTO</h3>
						<div class="row row-financiamento">
							<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 box-cinza">
								<fieldset>
									<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 valor-financiamento">
										<label class="descricao">Valor:</label>
										<label class="valor"><?php echo $this->preco; ?></label>
									</div>
									<div class="row">
										<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-5">
											<label class="campo">Entrada</label>
										</section>
										<section style="float: left;" class="col col-xs-12 col-sm-12 col-md-12 col-lg-7">
											<label class="input">
												<input type="text" placeholder="Entrada" id="entrada" name="entrada">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-5">
											<label class="campo">Prazo (em meses)</label>
										</section>
										<section style="float: left;" class="col col-xs-12 col-sm-12 col-md-12 col-lg-7">
											<label class="input">
												<input type="text" value="360" placeholder="Prazo (meses)" id="prazo" name="prazo" maxlength="3" autocomplete="off">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-5">
											<label class="campo">Taxa (% ao ano)</label>
										</section>
										<section style="float: left;" class="col col-xs-12 col-sm-12 col-md-12 col-lg-7">
											<label class="input">
												<input type="text" value="10,4" placeholder="Taxa (% ao ano)" id="taxa" name="taxa" maxlength="4" autocomplete="off">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<button class="btn btn-azul btn-calcular" id="btn-calcular" type="button">
												<i class="fa fa-calculator"></i><span id="calcular-texto">CALCULAR</span>
											</button>
										</section>
									</div>
									<div class="row divLoaderSimulador hide">
										<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<img src="<?php echo $PATHSKIN; ?>/images/gif-load.gif" class="pull-right loaderSimulador">
										</div>
									</div>
									<div class="row">
										<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<label class="campo calculo">Valor financiado</label>
											<label id="valorFin" class="valor-calculo pull-right">R$ <?php echo $this->preco; ?></label>
											
										</div>
									</div>
									<div class="row">
										<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<label class="campo calculo">Primeira parcela</label>
											<label id="primeiraParcela" class="valor-calculo pull-right">R$&nbsp;<span id="span-valor-primeira">0,00</span></label>
										</div>
									</div>
									<div class="row">
										<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<label class="campo calculo">Última parcela</label>
											<label id="ultimaParcela" class="valor-calculo pull-right">R$&nbsp;<span id="span-valor-ultima">0,00</span></label>
										</div>
									</div>
									<div class="row">
										<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<small class="info">* As taxas apresentadas possuem caráter meramente informativo</small>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</form>
					<?php } ?>
                </div>
            </div>