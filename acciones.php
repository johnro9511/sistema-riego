<!DOCTYPE HTML>
<html>
<head>
  <title>ACCIONES</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style type=»text/css»>

</style>
<?php
// SPECIFY USB PORT TO USE
$usb_comPort = "COM3";
//La siguiente linea configura el modo de conexion a el com3 y 9600 baudios

exec("mode COM3 BAUD=9600 PARITY=N data=8 stop=1 to=off dtr=off rts=off");

switch($_POST){
	case isset($_POST["submitOn"]):
		exec("ECHO 1 > $usb_comPort"); // Turn On LED 1
	break;

	case isset($_POST["submitOff"]):
		exec("ECHO 2 > $usb_comPort"); // Turn Off LED 1
	break;

	case isset($_POST["submitOn1"]):
		exec("ECHO 3 > $usb_comPort"); // Turn On LED 2
	// echo "encender led 2";
	break;

	case isset($_POST["submitOff1"]):
		exec("ECHO 4 > $usb_comPort"); // Turn Off LED 1
	break;

	case isset($_POST["submitOn2"]):
		exec("ECHO 5 > $usb_comPort"); // Turn On LED 3
	break;

	case isset($_POST["submitOff2"]):
		exec("ECHO 6 > $usb_comPort"); // Turn Off LED 1
	break;

	case isset($_POST["submitOn3"]):
		exec("ECHO 7 > $usb_comPort"); // Turn On LED 4
	break;

	case isset($_POST["submitOff3"]):
		exec("ECHO 8 > $usb_comPort"); // Turn Off LED 1
	break;

	case isset($_POST["allon"]):
		exec("ECHO 1,3,5,7 > $usb_comPort"); // Turn ON ALL 4 LED Bulbs
	break;

	case isset($_POST["alloff"]):
		exec("ECHO 2,4,6,8 > $usb_comPort"); // Turn OFF ALL 4 LED Bulbs
	break;
}
?>
</head>

<body style="background-color: blue;"><br><br>
	<center><div style="width: 50%; background-color: yellow; padding-top: 10px;">
		<h1>Control Panel</h1>
		<br>
		<form class="control-panel-frm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<input type="submit" class="s3d turnOn btn btn-success" name="submitOn" value="ENCENDER BOMBA">
			<input type="submit" class="s3d switchoff btn btn-danger" name="submitOff" value="APAGAR BOMBA">
			<br><br>

			<input type="submit" class="s3d turnOn btn btn-success" name="submitOn1" value="ENCENDER EXTRACTOR">
			<input type="submit" class="s3d switchoff btn btn-danger" name="submitOff1" value="APAGAR EXTRACTOR">
			<br><br>

			<input type="submit" class="s3d turnOn btn btn-success" name="submitOn2" value="ENCENDER LUCES">
			<input type="submit" class="s3d switchoff btn btn-danger" name="submitOff2" value="APAGAR LUCES">
			<br><br>

			<input type="submit" class="s3d turnOn btn btn-success" name="allon" value="ENCENDER TODOS">
			<input type="submit" class="s3d switchoff btn btn-danger" name="alloff" value="APAGAR TODOS">
		</form>
		<br>
	</div></center>
</body>	
</html>
