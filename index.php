<?php
	$sid=$_GET["sid"];
	$web=$_GET["web"];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CREA SCHEDA PRODOTTO</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/x-icon" href="favicon.ico">
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
	</head>
	<style>
		@font-face {
		font-family: "RalewayM";
		src: url(fonts/raleway/Raleway-Medium.ttf) format("truetype");
		}
		@font-face {
		font-family: "RalewayL";
		src: url(fonts/raleway/Raleway-Light.ttf) format("truetype");
		}
		table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
		padding:5px;
		}
	</style>
	<body>
		
		<div data-role="page" id="crea-scheda" data-theme="none" align="center">
			<div class="ui-content" id="pdf">
				
				<table style="width:95%">
					<tr><td id="nome-prodotto" colspan="2" style="font-family:RalewayL;font-size:24px;font-weight:bold"><?php include("php/nomeprodotto.php");?></td></tr>
					<tr style="background-color:rgb(191,191,191);text-align:center;font-size:20px;font-weight:bold"><td id="comunicazioni">COMUNICAZIONI</td><td>SCHEDA PRODOTTO</td></tr>
					<tr style="font-size:20px;font-weight:bold"><td id="comunicazioni">Ecologia</td><td>Produttore</td></tr>
					<tr><td width="50%"><?php include("php/ecologia.php");?></td><td style="text-align:center"><img src="loghi/<?php include("php/logo.php");?>" width="250px"></td></tr>
				</table>
				
				<div data-role="footer" data-position="fixed">
					<br>
					
					<form style="width:50%" data-ajax="false"> 
						<label for="sid">INSERIRE SID</label>
						<input type="text" method="GET" name="sid" action="index.php?" id="sid" autocomplete="on" data-ajax="false">
					</form>
					
				</div>
	
			</div>
			<button data-ajax="false" id="makepdf" style="width:256px">SCARICA PDF</button>
						<script>
					let sid = '<?php echo $sid;?>';
					$(document).on('click','#makepdf',function(){
						var doc = new jsPDF();
						doc.addHTML($('#pdf'), 3, 15, {
							'background': '#fff',
							'border':'2px solid white',
							}, function() {
							//window.open(doc.output('bloburl'))
							doc.save(sid.toUpperCase()+'_SCHEDA_PRODOTTO.pdf');
						});
					});
					
				</script>
		</div>
		<div data-role="page" id="datain">
		<div class="ui-content">
			<label for="sid">Ricerca per SID o Codice Articolo Fornitore</label>
			<input type="text" id="cerca" autocomplete="on" value="">
			<a href="#" data-role="button" onClick="ricercaProdotto()">RICERCA</a>
			<div id="debug"></div>
			<div id="contenuto" style="display:none">
				<a href="#crea-scheda" data-role="button" data-transition="slide" >RITORNA ALLE SCHEDE</a>
				<label for="nomeprodotto">Nome Prodotto</label>
				<input type="text" id="nomeprodotto" value="">
				<label for="eco">Ecologia</label>
				<input type="text" id="eco" value="">
			<a href="!#" data-role="button" onClick="aggiornaDati()">AGGIORNA DATI</a>
			
			</div>
			</div>
			<script src="js/datain.js?v010"></script>
		</div>
		
	</body>
</html>