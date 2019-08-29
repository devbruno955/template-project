<!-- Busca original do template -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="b-find">
                                <ul class="b-find-nav nav nav-tabs" id="findTab" role="tablist">
                                    <li class="b-find-nav__item nav-item"><a class="b-find-nav__link nav-link active" id="tab-allCar" data-toggle="tab" href="#content-allCar" role="tab" aria-controls="content-allCar" aria-selected="true">Busca</a></li>
                                    
                                </ul>
                                <div class="b-find-content tab-content" id="findTabContent">
                                    <div class="tab-pane fade show active" id="content-allCar">
                                        <form class="b-find__form">
                                            <div class="b-find__row">
                                                <div class="b-find__main">
                                                    <div class="b-find__inner">
                                                        <div class="b-find__item">
                                                            <div class="b-find__label"><span class="b-find__number">01</span> Select Make</div>
                                                            <div class="b-find__selector">
                                                                <select class="selectpicker" data-width="100%" data-style="ui-select">
                                                                    <option value="finalidade_todos">Finalidade</option>
                                                                    <option value="finalidade_todos">Todos</option>
                                                                    <option value="comprar">Comprar</option>
                                                                    <option value="alugar">Alugar</option>
                                                                    <!--<option value="alugar-temporada">Alugar temporada</option>-->
                                                                    <option value="lancamentos">Lançamentos</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="b-find__item">
                                                            <div class="b-find__label"><span class="b-find__number">02</span> Select a Model</div>
                                                            <div class="b-find__selector">
                                                                <select class="selectpicker" data-width="100%" data-style="ui-select">
                                                                    <option>Model 1</option>
                                                                    <option>Model 2</option>
                                                                    <option>Model 3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="b-find__item">
                                                            <div class="b-find__label"><span class="b-find__number">03</span> Price Range</div>
                                                            <div class="b-find__selector">
                                                                <select class="selectpicker" data-width="100%" data-style="ui-select">
                                                                    <option>Max $5000</option>
                                                                    <option>Max $15000</option>
                                                                    <option>Max $25000</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="b-find__btn btn btn-primary">Search</button>
                                            </div>
                                            <div class="b-find__checkbox-group"><span class="b-find__checkbox-item">
                            <input class="forms__check" id="newCars" type="checkbox" checked="checked"/>
                            <label class="forms__label forms__label-check" for="newCars">New Cars</label></span><span class="b-find__checkbox-item">
                            <input class="forms__check" id="usedCars" type="checkbox"/>
                            <label class="forms__label forms__label-check" for="usedCars">Used Cars</label></span></div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="content-newCars">
                                        <form class="b-find__form">
                                            <div class="b-find__row">
                                                <div class="b-find__main">
                                                    <div class="b-find__inner">
                                                        <div class="b-find__item">
                                                            <div class="b-find__label"><span class="b-find__number">01</span> Select Make</div>
                                                            <div class="b-find__selector">
                                                                <select class="selectpicker" data-width="100%" data-style="ui-select">
                                                                    <option>Audi</option>
                                                                    <option>BMV</option>
                                                                    <option>Opel</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="b-find__item">
                                                            <div class="b-find__label"><span class="b-find__number">02</span> Select a Model</div>
                                                            <div class="b-find__selector">
                                                                <select class="selectpicker" data-width="100%" data-style="ui-select">
                                                                    <option>Model 1</option>
                                                                    <option>Model 2</option>
                                                                    <option>Model 3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="b-find__item">
                                                            <div class="b-find__label"><span class="b-find__number">03</span> Price Range</div>
                                                            <div class="b-find__selector">
                                                                <select class="selectpicker" data-width="100%" data-style="ui-select">
                                                                    <option>Max $5000</option>
                                                                    <option>Max $15000</option>
                                                                    <option>Max $25000</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="b-find__btn btn btn-primary">Search</button>
                                            </div>
                                            <div class="b-find__checkbox-group"><span class="b-find__checkbox-item">
                            <input class="forms__check" id="newCars2" type="checkbox" checked="checked"/>
                            <label class="forms__label forms__label-check" for="newCars2">New Cars</label></span><span class="b-find__checkbox-item">
                            <input class="forms__check" id="usedCars2" type="checkbox"/>
                            <label class="forms__label forms__label-check" for="usedCars2">Used Cars</label></span></div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="content-usedCars">
                                        <form class="b-find__form">
                                            <div class="b-find__row">
                                                <div class="b-find__main">
                                                    <div class="b-find__inner">
                                                        <div class="b-find__item">
                                                            <div class="b-find__label"><span class="b-find__number">01</span> Select Make</div>
                                                            <div class="b-find__selector">
                                                                <select class="selectpicker" data-width="100%" data-style="ui-select">
                                                                    <option>Audi</option>
                                                                    <option>BMV</option>
                                                                    <option>Opel</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="b-find__item">
                                                            <div class="b-find__label"><span class="b-find__number">02</span> Select a Model</div>
                                                            <div class="b-find__selector">
                                                                <select class="selectpicker" data-width="100%" data-style="ui-select">
                                                                    <option>Model 1</option>
                                                                    <option>Model 2</option>
                                                                    <option>Model 3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="b-find__item">
                                                            <div class="b-find__label"><span class="b-find__number">03</span> Price Range</div>
                                                            <div class="b-find__selector">
                                                                <select class="selectpicker" data-width="100%" data-style="ui-select">
                                                                    <option>Max $5000</option>
                                                                    <option>Max $15000</option>
                                                                    <option>Max $25000</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="b-find__btn btn btn-primary">Search</button>
                                            </div>
                                            <div class="b-find__checkbox-group"><span class="b-find__checkbox-item">
                            <input class="forms__check" id="newCars3" type="checkbox" checked="checked"/>
                            <label class="forms__label forms__label-check" for="newCars3">New Cars</label></span><span class="b-find__checkbox-item">
                            <input class="forms__check" id="usedCars3" type="checkbox"/>
                            <label class="forms__label forms__label-check" for="usedCars3">Used Cars</label></span></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- end .b-find-->