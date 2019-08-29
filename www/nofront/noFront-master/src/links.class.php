<?php 

class links{
	public $rota;
	public $pagina;
	public $extencao;
			public function redirec(){
				$caminho = $this->rota.$this->pagina.$this->extencao;
					 $redirect = "$caminho";
	 				 header("location:$redirect");
			}
}

?>