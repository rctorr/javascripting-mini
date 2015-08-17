<?php /* Ininicio de un código en php */
    echo $_GET['nombre']."<br />";
    echo $_GET['email'];
    /*echo imprime*/

    $nombre = $_GET['nombre'];
    $email = $_GET['email'];
    /*$algo define una variable*/
    $destino = "rictor@cuhrt.com, kairy159@gmail.com";
    $subject = "Registro a Javascripting-mini";
    $mensaje = $nombre . "\n". $email;
    /*$header = "From: rictor@cuhrt.com";*/
        /*direccion de correo de quien envia*/

    mail($destino, $subject, $mensaje);
    
    /*$mensajeu = "Tu registro se a realizado con exito al taller de Javascripting-minique se llevara a cabo el dia lunes 24 de Agosto del 2015 de 10:00 a 14:00 hrs.\n Para mas información visita el sitio web javascripting-mini.cuhrt.com o escribe a rictor@cuhrt.com o a kairy159@gmail.com o a tallerescomunitarios@fch.org.mx\n Esperamos contar con tu asistencia.\nAtte.: Javascripting-mini.";
    mail($email, $subject , $mensajeu, $header);*/

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
			    <section id="trans" class="container 75%">
                    <h2>Mini Javascripting</h2>
                    <h3>(Casa Mesones)</h3>
                    <p>Workshop open source creado con Node que corre en tu terminal. Hazlo por tu cuenta (ya que son autodirigidos) o asiste a Casa Mesones. <!--<a href="http://skel.io">Skel</a>.--></p>
                    <p>Aprende los elemtos basicos de Javascript. No se requiere experiencia previa en programacion.</p>
                </section>
			</section>
			
		<!-- Main -->
			<div id="main" class="container 75%">
				<!-- formulario -->
				
				<h2>Registro</h2>		
                
                              
                              <form action="index.php" method="get">
                              <div class="row">
                              <section class="10u">
                              <input type="text" name="nombre" required placeholder="Escribe tu nombre" required /> </br>
                              <input type="email" name="email" required placeholder="Escribe tu correo electronico" required/> 
                              </section>
                            <section class="2u">
                               <input type="submit" value="R" class="button alt icon fa-check">
                               
                            </section>
                                
                </div>
                </form> 
                <div class="row">
                    <p class="6u">Asistiran: XX Workshoperos</p>
                    <p class="6u">Quedan: YY Conexiones disponibles</p>
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