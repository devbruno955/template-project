<?php
libxml_use_internal_errors(true); // Desativa mensagens de duplicada de DOM

class testRecebeAtributo{
	
	protected $atributos; // Controla a quantidade máximade vezes que o loop será executado.
	private $seletor; // Evita confução com nome de variáveis de outros possíveis loops ($x ou $i)

	public $valores; // Armazena array recebida para uso posterior

	public function testRecebeAtributo(){
		$this->seletor = 0; // Por algum motivo que não quero investigar, a condicional for nñao está se comportando como eu esperava. Por isso estou usando while
			while ($this->seletor < $this->atributos) { 

								$dom = new DOMDocument();
								$dom->loadHTMLFile('../src/temas/bootstrap/form-modelo-bootstrap.html');
								$controle = 0; // Variável de controle
								// Consultando os links
								$links    = $dom->getElementsByTagName('input');
								foreach ($links as $link) {
												if ($controle == 0) { // Pega primeiro valor da class e assume como padrão (uma por tag)
													echo $link->getAttribute('class'); // Retorna tag do HTML com a nova class
																
												}
												$controle++;
								}

				/*echo "<p>Executando...".$this->valores[$this->seletor].""; */
				$this->seletor++;
			}


	}
	public function setAtributos($atributos){
			$this->valores = $atributos;
			$atributos = count($atributos);
			$this->atributos = $atributos;
	}
}




?>