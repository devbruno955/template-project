<?php 

class menuGeral{
	public $texto;
	public $link;
	public $status;
	public $class;
	public $tag;

			public function geraMenu($texto, $link){
				return "<a href='".$link."'>"."<".$this->tag." class='".$this->class."' >".$texto."</".$this->tag."></a>";
				// saida <suaTag class='sua_class'>Seu texto</sua tag
			}

}


?>