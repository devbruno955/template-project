 <div style="display:none;" class="tips"><?=__FILE__?></div>   
<?  
if(empty($_SESSION['inicioperiodo']) or $_SESSION['inicioperiodo'] == "31-12-1969" or $_SESSION['inicioperiodo']=="inicio" ){
	 $_SESSION['inicioperiodo']	=  date("d-m-Y");
	 $_SESSION['fimperiodo'] 	= date('d-m-Y', strtotime("+1 days"));
} 
if(empty($_SESSION['fimperiodo']) or $_SESSION['fimperiodo'] == "31-12-1969" or $_SESSION['fimperiodo']=="fim" ){
	 $_SESSION['inicioperiodo']	=  date("d-m-Y");
	 $_SESSION['fimperiodo'] 	= date('d-m-Y', strtotime("+1 days"));
}
$inicioperiodo 	= data($_SESSION['inicioperiodo']);
$fimperiodo 	=  data($_SESSION['fimperiodo']);

?> 
  
<?
//$arr_datas_agendadas = getdatasagendadas(); 
 $dtreservas_anuncio = getReservas_anuncio($team['id']);
 $disabledDays = trata_datas($team['datasbloqueadas']);
 //print_r($disabledDays);
 
?>
<script> 
// buscando as datas ja agendadas e pagas (transformando array em php para array js)
//var disabledDays = [<?php echo '"'.implode('","', $arr_datas_agendadas).'"' ?>];

// buscando as datas bloqueadas
//var str_Days = "<?php echo  $datasbloqueadas ?>"
//var disabledDays = str_Days.split(",");
var disabledDays = [<?php echo '"'.implode('","', $disabledDays).'"' ?>];
var dias_reservados = [<?php echo '"'.implode('","', $dtreservas_anuncio).'"' ?>];

/*
 for(var i=0;i<4;i++){
        alert(disabledDays[i]);
    }
	
 */
 
disabledDays = J.merge( J.merge( [], disabledDays ), dias_reservados );

 
J(function() { J( "#inicioperiodo" ).datepicker({  
	dateFormat: 'dd/mm/yy', dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'], dayNamesMin: ['D','S','T','Q','Q','S','S','D'], dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'], monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'], monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'], 
	showOtherMonths: true,
	selectOtherMonths: true, 
	rangeSelect: true,  
	onClose: function(dates) { verreserva()  },  
	 //showButtonPanel:true,
	  beforeShowDay: noWeekendsOrHolidays,
	 beforeShowDay: diafuturo, 
	showOn: "button", buttonImage: "<?=$PATHSKIN?>/images/calendar.png", buttonImageOnly: true,
	// showOnFocus: false, showTrigger: '<?=$PATHSKIN?>/images/calendar.png',
	 }); 
}); 
J(function() { J( "#fimperiodo" ).datepicker({ 
	dateFormat: 'dd/mm/yy', dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'], dayNamesMin: ['D','S','T','Q','Q','S','S','D'], dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'], monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'], monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'], 
	showOtherMonths: true,
	selectOtherMonths: true,
	rangeSelect: true,   
	onClose: function(dates) { verreserva()  }, 
	 //showButtonPanel:true,
	 beforeShowDay: diafuturo, 
	showOn: "button", buttonImage: "<?=$PATHSKIN?>/images/calendar.png", buttonImageOnly: true,
	// showOnFocus: false, showTrigger: '<?=$PATHSKIN?>/images/calendar.png',
	 }); 
}); 
 
/* utility functions */
function diafuturo(date) { 
	var m = date.getMonth(), d = date.getDate(), y = date.getFullYear(); 
	var outraData = new Date();
		outraData.setDate(outraData.getDate() -1); // diminui 1 dia
		  
		if( outraData > date) { 
			return [false];
		}
		
		if(!noWeekendsOrHolidays(date)){
			return false;
		}
		
	return [true];
}
/* utility functions */
function nationalDays(date) { 
  
	var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
	 
	for (i = 0; i < disabledDays.length; i++) {
		//console.log( disabledDays[i]);
		//alert(d + '/' + (m+1)+ '/' + y);
		// console.log('checando: ' + d + '/' + (m+1) + '/' + y);
		if(J.inArray(d + '/' + (m+1)+ '/' + y,disabledDays) != -1 || new Date() > date) {
 			 //alert(d + '/' + (m+1)+ '/' + y);
			 console.log('encontrado:  ' + d + '/' + (m+1)+ '/' + y );
			return false;
		}
	}
	// console.log('good:  ' + (m+1) + '-' + d + '-' + y);
	return [true];
}
function noWeekendsOrHolidays(date) {
	var noWeekend = jQuery.datepicker.noWeekends(date); 
	return noWeekend[0] ? nationalDays(date) : noWeekend[0];
	//return  nationalDays(date);
}
J(document).ready(function(){    
	verreserva();
});	
  
 
<?php if($login_user_id){?>
	J(document).ready(function(){   
		J(".boname").on("click",function() { 
		 
			if(J("#statusreserva").val() == "1"){
				 J("#dadosreserva").submit();
			}
			else{
				alert("O período selecionado está indisponível. Por favor, tente outras datas !")
				 //jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/atencao.png> <font color='black' size='10'>O período selecionado está indisopnível.</font>"});
			
			} 
		});
	});
<? } else { ?>
	J('document').ready(function(){
		
		J(".boname").on("click",function() { 
			
			location.href = "<?php echo $ROOTPATH; ?>/mlogin";
		});
	});
<?php } ?>

J(document).ready(function(){   
	J("#hosadulto").on("change",function() {  
		verreserva();
	});
	
	J("#hoscrianca").on("change",function() {  
		verreserva();
	});
});	
J(document).ready(function(){   
	J("#inicioperiodo").on("change",function() {  
		verreserva();
	});
	
	J("#fimperiodo").on("change",function() {  
		verreserva();
	});
});	
</script> 
<form  method="POST" id="dadosreserva" name="dadosreserva" action="<?=$ROOTPATH?>/alugar-imovel/">
<div class="LoadingImageContact" style="display:none;">
	<img src="<?php echo $PATHSKIN; ?>/images/loading.gif">
</div>
<div class="box-disponibilidade"> 
	<div class="titledispo"> Insira as datas da viagem para ver o total e sua disponibilidade. </div> 
	<div>  
		<div class="row">   
			<div class="dvdtini"><input  value="<?=$inicioperiodo?>" placeholder="Chegada" type="text" size="10" class="embeddetail is-datepick addetalhe_datainicio" name="inicioperiodo" id="inicioperiodo"></div>
			<div class="dvdtfim"><input value="<?=$fimperiodo?>" placeholder="Saída" type="text" size="10" class="embeddetail is-datepick addetalhe_datafim" name="fimperiodo" id="fimperiodo"></div>
		</div>  
		<div class="row">   
			<div class="dvdtini">
			<input   placeholder="Adultos" onKeyPress="return SomenteNumero(event);"  type="text" alt="Quantidade de adultos" title="Quantidade de adultos"  maxlength="3" class="embeddetail is-datepick addetalhe_datainicio" name="hosadulto" id="hosadulto">
			</div>
			<div class="dvdtfim">
			<input   placeholder="Crianças" onKeyPress="return SomenteNumero(event);"  type="text" title="Quantidade de crianças" alt="Quantidade de crianças"  maxlength="3" class="embeddetail is-datepick addetalhe_datainicio" name="hoscrianca" id="hoscrianca">
			</div>
		</div> 
	</div>
	<div class="loadingdis" id="reservaloading"></div> 
	<div class="retornodisponibilidade" id="ajaxretornodisp"></div>
	
	<div style="width:100%;text-align:center;">  
		<button class="btn btntopodestaque enviar-contato btn-enviar1 boname" id="btn-reserva" type="button" data-type="left">
			   <i class="fa fa-paper-plane"></i>
			   <? 
				   if($team['tipo'] =="pagamentooffline"){
					echo "Enviar email ao proprietário";
				   }
				   else   if($team['tipo'] =="onlineparcial"){
					echo "Reservar Imóvel";
				   } 
				   else   if($team['tipo'] =="onlineintegral"){
					echo "Reservar Imóvel";
				   }
			   ?>
		</button> 
	</div>
	
 
 
</div>
 
 <input type="hidden" value="<?=$team['id']?>" id="idanuncio" name="idanuncio">  
 <input type="hidden"  id="statusreserva" name="statusreserva">  
 
</form> 
												