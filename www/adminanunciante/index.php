<?php

require_once(dirname(dirname(__FILE__)) . '/app.php');
  
if(file_exists(WWW_MOD."/anunciante.inc")){
	
	need_anunciante();
	require_once( 'team/index.php' );
}
else{?>
	<h2>Este módulo não está habilitado!</h2>
<?}?>




