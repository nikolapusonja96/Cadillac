<?php
	session_start();
	include("konekcija.inc");
	
	
?>
<!DOCTYPE html> 
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8"/>
	<meta name="author" content="NikolaPusonja"/>
		<link rel="shortcut icon" href="images/c1.ico"/>

	<script language="JavaScript" src="jquery-3.1.1.min (1).js"></script>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="fajl.js"></script>
	
	<title>Cadillac</title>
</head>
<body>
	<?php
		include("konekcija.inc");
	?>
	<div id="omot">
		<div id="header">
			<a href="index.php">
				<div id="logo"></div>
			</a>
			<?php
			if(isset($_SESSION['idU']) && $_SESSION['uloga']=='user'){
				echo"<div class='admin'>
					<p>Korisničko ime:&nbsp<b><i>" .$_SESSION['korIme']."</i></b></p>
					<p>Uloga:&nbsp<b><i>".$_SESSION['uloga']."</i></b></p>
					<a href='logout.php'>Logout</a>
				</div>";
			}
			else if(isset($_SESSION['idU']) && $_SESSION['uloga']=='admin'){
				echo"<div class='admin'>
					<p>Korisničko ime:&nbsp<b><i>" .$_SESSION['korIme']."</i></b></p>
					<p>Uloga:&nbsp<b><i>".$_SESSION['uloga']."</i></b></p>
					<a href='logout.php'>Logout</a>
				</div>";
			}
			else{
			echo"<div id='lg_sg'>
				<form>
					<a href='logovanje.php'>
						<input type='button' title='Log In' value='Log In'/>
					</a>
					<a href='registracija.php'>
						<input type='button' title='Sign up' value='Sign Up'/>
					</a>
				</form>
			</div>";
			
			
			
			}
			?>
		</div>
		<div id="meni">
			<?php
			include("konekcija.inc");
			if(isset($_SESSION['idU']) && $_SESSION['uloga']=='user')
			{
				$upit="SELECT * FROM meni WHERE id_meni IN(1,2,14,4,5,6)";
				$rez=mysqli_query($konekcija, $upit);
				
				echo"<ul>";
				while($r=mysqli_fetch_array($rez)){
					echo "<li><a href=".$r['link'].">".$r['naziv_link']."</a></li>";
				}
				echo"</ul>";
			}
			else if(isset($_SESSION['idU']) && $_SESSION['uloga']=='admin')
			{
				$upit="SELECT * FROM meni WHERE id_meni IN(1,2,14,4,5,13)";
				$rez=mysqli_query($konekcija, $upit);
				
				echo"<ul>";
				while($r=mysqli_fetch_array($rez)){
					echo "<li><a href=".$r['link'].">".$r['naziv_link']."</a></li>";
				}
				echo"</ul>";
			}
			else
			{
				$upit="SELECT * FROM meni WHERE id_meni IN(1,2,14,4,5)";
				$rez=mysqli_query($konekcija, $upit);
				
				echo"<ul>";
				while($r=mysqli_fetch_array($rez)){
					echo "<li><a href=".$r['link'].">".$r['naziv_link']."</a></li>";
				}
				echo"</ul>";
			}
			?>
		</div>
		<div id="sredina_kontakt">
				<h2 align="left">Send us a message:</h2>
			<div id="forma_kontakt">
				<form action="kontakt.php" method="post">
					<table border="0" width="400" height="400" > 
						<tr>
							<td class="bold">E-mail:</td>
							<td>
								<input type="text" id="tbEmail_kontakt" name="email_kontakt" placeholder="E-mail adresa."/>
							</td>
						</tr>
						<tr>
							<td class="bold">Ime i prezime:</td>
							<td>
								<input type="text" id="tbName" name="tbName" placeholder="Name."/>
							</td>
						</tr>
						<tr>
							<td class="bold">Message:</td>
							<td>
								<textarea name="textarea" id="textarea" rows="5" cols="40"></textarea>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="button" value="Send" onclick="posalji();"/>
							</td>
						</tr>
					</table>
				</form>
			</div>
				<h2 align="center">Our Location:</h2>
			<div id="mapa">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d188704.90952641628!2d-83.23929112962645!3d42.35287947670247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8824ca0110cb1d75%3A0x5776864e35b9c4d2!2z0JTQtdGC0YDQvtC40YIsINCc0LjRh9C40LPQtdC9LCDQodGY0LXQtNC40ZrQtdC90LUg0JTRgNC20LDQstC1!5e0!3m2!1ssr!2srs!4v1518453395278" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
		<div class="cistac"></div>
		<div id="footer">
			<div id="social_networks" class="all_footer">
				<a href="http://www.twitter.com"><div class="socnet twitter"></div></a>
				<a href="http://www.facebook.com"><div class="socnet fb"></div></a>
				<a href="http://www.instagram.com"><div class="socnet instagram"></div></a>
			</div>
			<div id="mfooter" class="all_footer">
				<br/><br/><br/><br/><br/><br/><a href="autor.php"><p><b>&copy </b>Nikola Pušonja.</p></a>
			</div>
			<div id="linkovi" class="all_footer">
					<?php
					$upit="SELECT * FROM meni WHERE id_meni IN(1,15,4,5)";
					$rez=mysqli_query($konekcija, $upit);
					
					echo"<ul>";
					while($r=mysqli_fetch_array($rez)){
					echo "<li><a href=".$r['link'].">".$r['naziv_link']."</a></li>";
					}
					echo"</ul>";
			   ?>
			</div>
		</div>

	</div>
</body>






















</html>