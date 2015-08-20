<?php /* Ininicio de un código en php */
/*
    echo $_GET['nombre']."<br />";
    echo $_GET['email'];
*/    /*echo imprime*/
    error_reporting(E_ALL);

    /* Accedemos a la BD */
    $server = "localhost";
    $user = "cuhrtcom_jamini";
    $pass = "jsmini2015";
    $db = "cuhrtcom_jsmini";
    $n = 0; /* número de asistentes registrados */
    $ntotal = 30; /* número total de asistentes */
    $notificacion = "";

    $conn = new mysqli($server, $user, $pass, $db);
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_GET['email'])) {
        $nombre = $_GET['nombre'];
        $email = $_GET['email'];
        /*$algo define una variable*/
        $destino = "rictor@cuhrt.com, kairy159@gmail.com";
        $subject = "Registro a Javascripting-mini";
        $mensaje = $nombre . "\n". $email;
        $header = "From: rictor@cuhrt.com";
            /*direccion de correo de quien envia*/

        /* Hay que registrar el usuario en la BD */
        /* Se guardan los datos del aspirante */
        $sql = "INSERT INTO Asistente (`id`, `nombre`, `email`) values (NULL,'$nombre', '$email')";
        $irow = $conn->query($sql);
        if($irow) {
            $notificacion = "¡Su registro se ha realizado con éxito!";
        } else {
            die('Error: ('. $conn->errno .') '. $conn->error);
        }

        /* Este email se envía para notificar que este usuario se está registrando */
        $r = mail($destino, $subject, $mensaje, $header);
        /* Hay que determinar si el mensaje con mail() se envió de forma correcta */
        if($r == FALSE) { /* Tenemos error al enviar el mensaje? */
            $notificacion = "Ha habido un problema con su registro, contacte a alguno de los organizadores o intente realizar su registro de nuevo. Gracias";
        }


        $mensajeu = "Hola ".$nombre."\n\nTu registro se a realizado con éxito al taller de Javascripting-mini que se llevará a cabo el día lunes 24 de agosto del 2015 de 10:00 a 14:00 hrs.\n\n Para más información visita el sitio web http://javascripting-mini.cuhrt.com o escribe a:\n rictor@cuhrt.com, kairy159@gmail.com o tallerescomunitarios@fch.org.mx\n\nEsperamos contar con tu asistencia.\n\nAtte: Javascripting-mini";
        /* Este email se envía para notifcar al usuario que ya está registrando, así
        que a estas alturas ya debería de estar en la BD */

        mail($email, $subject , $mensajeu, $header);
        /* Hay que determinar si el mensaje con mail() se envió de forma correcta */
        if($r == FALSE) { /* Tenemos error al enviar el mensaje? */
            $error = "Ha habido un problema con su registro, contacte a alguno de los organizadores o intente realizar su registro de nuevo. Gracias";
        }
    }

    /* Se cuentan cuantos registros hay */
    $sql = "SELECT count(*) from Asistente";
    $irow = $conn->query($sql);
    if($irow) {
        $row = $irow->fetch_row();
        $n = $row[0];
    } else {
        die('Error: ('. $conn->errno .') '. $conn->error);
    }

    $conn->close();

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Javascripting-Mini</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body id="top">

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html">Javascripting-Mini</a></h1>
				<a href="#banner">Inicio</a>
				<a href="#main">Registro</a>
				<a href="#footer">Ubicación</a>
			</header>

		<!-- Nav -->
			<nav id="nav">
				<ul class="links">
					<li><a href="#top">Top</a></li>
					<li><a href="#content">Content</a></li>
					<li><a href="#elements">Elements</a></li>
					<li><a href="#grid">Grid System</a></li>
				</ul>
				<ul class="actions vertical">
					<li><a href="http://skel.io" class="button special fit">Download</a></li>
					<li><a href="http://skel.io" class="button fit">Documentation</a></li>
				</ul>
			</nav>

		<!-- Banner -->
			<section id="banner">
			    <section id="trans" class="container 75% 100%(medium)">
                    <h2>Mini Javascripting</h2>
                    <h3>(Casa Mesones)</h3>
                    <p>Workshop open source creado con Node que corre en tu terminal. Hazlo por tu cuenta (ya que son autodirigidos) o asiste a Casa Mesones. <!--<a href="http://skel.io">Skel</a>.--></p>
                    <p>Aprende los elemtos basicos de Javascript. No se requiere experiencia previa en programacion, sólo traer laptop para instalar el software.</p>
                    <p>Si tienes alguna duda puedes escribir a: kairy159@gmail.com o rictor@cuhrt.com</p>
                </section>
			</section>

		<!-- Main -->
			<div id="main" class="container 75%">
				<h2><i class="fa fa-pencil-square-o fa-3x"></i> Registro</h2>

                <form action="index.php" method="get">
                    <div class="row">
                        <section class="10u 12u$(small) 12u$(xsmall)">
                          <input type="text" name="nombre" required placeholder="Escribe tu nombre" required /> </br>
                          <input type="email" name="email" required placeholder="Escribe tu correo electronico" required/>
                        </section>
                        <section class="2u 12u$(small) 12u$(xsmall)">
                           <input type="submit" value="R">
                        </section>
                    </div>
                </form>
                <div class="container 75%">
                    <?php echo $notificacion; ?>
                </div>
                <div class="row">
                    <p class="6u">Asistiran: <?php echo $n; ?> Workshoperos</p>
                    <p class="6u">Quedan: <?php echo $ntotal-$n; ?> Conexiones disponibles</p>
                </div>

        </div>


		<!-- Footer -->
			<footer id="footer">
				<div class="container 75%">
				    <h2>Ubicación</h2>
					<div class="row">
                              <section class="8u 12u(small)">
                                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.6227089782365!2d-99.13679649999999!3d19.428701000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1fed2364cbc05%3A0x38d842e1ea4db162!2sFundaci%C3%B3n+del+Centro+Historico+de+la+Ciudad+de+M%C3%A9xico!5e0!3m2!1ses!2smx!4v1439499563350" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                              </section>
                            <section class="4u 8u(small)">
                               <p>Calle de Mesones 54, Col. Centro,Del. Cuauhtémoc, C.P. 06070 Ciudad de México, D.F.</p>
                            </section>

                </div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
