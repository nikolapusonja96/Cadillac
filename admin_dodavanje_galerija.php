<?php
	session_start();
	include("konekcija.inc");
	
	if($_SESSION['uloga'] != 'admin')
	{
		header('Location:index.php');	
	}
	
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
				$upit="SELECT * FROM meni WHERE id_meni IN(1,2,14,4,5,10)";
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
			<h4 align="center">Dodavanje sadržaja</h4>
		<div id="admin_sredina_dodavanje">
			<form action="admin_dodavanje_galerija.php" name="forma" id="forma" method="POST" enctype="multipart/form-data">
			<table border="1">
			<tr>
				<td>Naziv proizvoda:</td>
				<td><input type="text" id="naziv_proizvod" name="naziv_proizvod"/></td>
			</tr>
			<tr>
				<td>Cena proizvoda:</td>
				<td><input type="text" id="cena_proizvod" name="cena_proizvod"/></td>
			</tr>
			<tr>
				<td>Slika:</td>
				<td>
					<input type="file" id="Slika" name="Slika" />
				</td>
			</tr>
		
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btnDodaj"  name="btnDodaj" value="Dodaj"/>
			</tr>
			</table> 
			</form>
			<?php
			if(isset($_REQUEST['btnDodaj'])){	
				$naziv=$_REQUEST['naziv_proizvod'];
				$cena=$_REQUEST['cena_proizvod'];
			
				$ime_proizvod=$_FILES['Slika']['name'];
				$tmp_proizvod=$_FILES['Slika']['tmp_name'];
		
				$putanja="img/Cadillac_slider/".$ime_proizvod;
		
				if(move_uploaded_file($tmp_proizvod,$putanja)){
					include("konekcija.inc");
					$upit_insert="INSERT INTO proizvodi VALUES('', '$naziv', '$cena', '$putanja')";
					$rez=mysqli_query($konekcija,$upit_insert);
					if(!$rez){
					echo"Greska prilikom upisa!!!";	
					}
					else{
						echo"<p class='green'>Proizvod je unet u bazu!</p>";
					}
				}
			}
?>
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
					$upit="SELECT * FROM meni WHERE id_meni IN(1,15,4,5,13)";
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