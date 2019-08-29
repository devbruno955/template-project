<?php
libxml_use_internal_errors(true); // Desativa mensagens de duplicada de DOM

class recebeAtributo{
	
	protected $atributos; // Controla a quantidade máximade vezes que o loop será executado, e os valores para troca.
	private $seletor; // Evita confução com nome de variáveis de outros possíveis loops ($x ou $i)
	public $modelo; // Seta o modelo que será aplicado o layout
	public $alvo; // Seta a página que receberá o estilo
	public $class;
	public $tag;

	public $valores; // Armazena array recebida para uso posterior

	public function passaAtributo(){
		$this->seletor = 0; // Por algum motivo que não quero investigar, a condicional for nñao está se comportando como eu esperava. Por isso estou usando while
		$this->alvo = file_get_contents($this->alvo);
			while ($this->seletor < $this->atributos) { 

								$dom = new DOMDocument();
								$dom->loadHTMLFile($this->modelo);
								$controle = 0; // Variável de controle
								// Consultando os links
								$links    = $dom->getElementsByTagName($this->valores[$this->seletor]); // Seleione a tag de pesquisa atual
								foreach ($links as $link) {
												if ($controle == 0) { // Pega primeiro valor da class e assume como padrão (uma por tag)
													$this->tag = $this->valores[$this->seletor];
													$this->class = $link->getAttribute('class'); // Retorna tag do HTML com a nova class
													$this->alvo = str_replace("<$this->tag", "<$this->tag class='$this->class' ", $this->alvo);
																
												}
												$controle++;
								}

				/*echo "<p>Executando...".$this->valores[$this->seletor].""; */
				$this->seletor++;
			}
			echo "<p>".$this->alvo;


	}
	public function setAtributos($atributos){
			$this->valores = $atributos;
			$atributos = count($atributos);
			$this->atributos = $atributos;
	}
}




?>