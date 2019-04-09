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
	<script language="JavaScript" src="jquery-3.1.1.min (1).js"></script>
	<script type="text/javascript" src="jquery1.js"></script>
	<script type="text/javascript" src="jquery.js"></script>
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
		<div id="sredina">
			
			

			<div id="basic">
				<h4>
				Kadilak (engl. Cadillac), zvanično Kadilak motor kar divižon, proizvođač je luksuznih automobila u sastavu Dženeral motorsa. Najvažnija tržišta Kadilaka su SAD, Kanada, i Kina. Takođe, vozila ovog proizvođača se prodaju u još 34 zemlje sveta.[1]
Kadilak je trenutno drugi najstariji američki proizvođač automobila posle Bjuika, i jedna je od najstarijih marki automobila. Kadilaka je 1902. osnovao Henri Liland,[2] vrhunski mehaničar i preduzimač. On je preduzeće nazvao po Antoanu Lomeu de la Motu Kadilaku, osnivaču Detroita a Kadilakov amblem u osnovi ima njegov grb.[2]
Dženeral motors je 1909. kupio Kadilaka, da bi tokom narednih šest godina omogućio masovnu proizvodnju automobila ovog proizvođača. Takođe, Kadilak se u tom razdoblju pozicionirao kao glavni proizvođač luksuznih automobila u SAD. Kadilak je uveo tehnološke novine, među kojima su potpuni električni sistemi, poluautomatski sistem prenosa i čelični krov.
 
				</h4>
				
			</div>
			<div id="slajder">
				<?php
					$upit="SELECT * FROM slajder";
					$rez=mysqli_query($konekcija,$upit);
					while($r=mysqli_fetch_array($rez)){
						        echo"<img src='".$r['putanja_slike']."' alt='slide1' width='800' height='400' class='show'/>";

					}
				?>
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
					$upit="SELECT * FROM meni WHERE id_meni IN(1,2,4,5,15)";
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