<?php 

require_once "menu.class.php";

$menu =  new menuGeral;

$menu->tag = 'li';
$menu->class = 'nada';

echo $menu->geraMenu('Meu novo item', 'http://wwwgoogle.com');

?>