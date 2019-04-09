<?php
	session_start();
	
	include("konekcija.inc");
	
	if(isset($_REQUEST['login-submit']))
	{
		$korIme=$_REQUEST['tbUsername'];
		$pass=md5($_REQUEST['password']);
		
		
		$upit="SELECT * FROM korisnici k INNER JOIN uloge u ON k.id_uloga=u.id_uloga WHERE korisnicko_ime='$korIme' AND sifra='$pass'";
		$rez=mysqli_query($konekcija,$upit);
		
		if(mysqli_num_rows($rez) == 0)
		{
			echo"<script>alert('Greška prilikom logovanja')</script>";
		}
		
		else
		{
			$r = mysqli_fetch_array($rez);
			
			$_SESSION['idU'] = $r['id_uloga'];		
			$_SESSION['uloga'] = $r['naziv_uloga'];
			$_SESSION['korIme'] = $r['korisnicko_ime'];
			$_SESSION['id_user'] = $r['id_korisnik'];
			
			
			switch($_SESSION['uloga'])
			{
				case 'admin':
					header('Location: admin.php');
					break;
					
				case 'user':
					header('Location: user.php');
					break;
			}
		}	
	}
?>
<!DOCTYPE html> 
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8"/>
	<meta name="author" content="NikolaPusonja"/>
		<link rel="shortcut icon" href="images/c1.ico"/>

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
				$upit="SELECT * FROM meni WHERE id_meni IN(1,2,14,4,5)";
				$rez=mysqli_query($konekcija, $upit);
				
				echo"<ul>";
				while($r=mysqli_fetch_array($rez)){
					echo "<li><a href=".$r['link'].">".$r['naziv_link']."</a></li>";
				}
				echo"</ul>";
			}
			else if(isset($_SESSION['idU']) && $_SESSION['uloga']=='admin')
			{
				$upit="SELECT * FROM meni WHERE id_meni IN(1,2,14,4,5)";
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
		<div id="sredina_logovanje">
			
				<h2>Unesite podatke:</h2><br/>
				<form method="post" action="logovanje.php">
					<p class="forma">Username:</p><input type="text" name="tbUsername" id="tbUsername" placeholder="Korisničko ime"/>
					<p class="forma">Password:</p><input type="password" name="password" id="password" placeholder="Lozinka"/><br/>
					<input type="submit"  id="login-submit" name="login-submit" value="Log In"/>
					
				</form>
			
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