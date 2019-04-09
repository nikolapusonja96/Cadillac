<?php
	session_start();
	include("konekcija.inc");
?>
<!DOCTYPE html> 
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8"/>
		<link rel="shortcut icon" href="images/c1.ico"/>

	<meta name="author" content="NikolaPusonja"/>
	<script language="JavaScript" src="jquery-3.1.1.min (1).js"></script>
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
		<div id="sredina_sredina">
			<div class="text_autor">
				<p class="color">Moje ime je <b class='ime_hover'>Nikola Pušonja</b>. Student sam III godine Visoke škole za informacione i komunikacione tehnologije.
				<br/> Ovaj sajt je rađen kao projekat na kursu Web programiranje PHP2</p> <br/> <p>mail: nikola.pusonja.9.15@ict.edu.rs</p>
				<br/><br/>
			</div>
			<div class="slika">
				<img src="img/skype-photo.jpg" width="300" height="400" alt="autor"/>
			</div>
			<div id="anketa">
				<h2>Da li Vam se sviđa ovaj sajt?</h2>
		<form method="POST" action="autor.php" >
			<table  height="200" width="200" >
				<tr>
					<td>
						<input type="radio" name="anketa" id="rbAnketa" value="Da"/>Da.<br/>
					</td>
				</tr>
				<tr>
					<td>
						<input type="radio" name="anketa" id="rbAnketa" value="Ne"/>Ne.<br/>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="btnGlasaj" id="btnGlasaj" value="Glasaj"/>
						
					</td>
				</tr>
				
			</table>
		</form>
		<?php
		include "konekcija.inc";
		
		
		if(isset($_SESSION['id_user'])){
			$id = $_SESSION['id_user'];
		$upit = "SELECT user_id FROM anketa1 WHERE user_id=$id";
		$rez = mysqli_query($konekcija, $upit);
		//var_dump($id);
		$r1 = mysqli_fetch_array($rez);
		//var_dump($r1);
		}
		
		if(isset($_REQUEST['btnGlasaj']))
		{
		
		@$rezultat = $_REQUEST['anketa'];
		
		
		
		if(!isset($_SESSION['uloga']))
		{
			echo "Morate se ulogovati da biste glasali.";	
		}
		else{
		if($r1){
			
			echo "<h3 class='red'>Nemate pravo vise puta da glasate! Vec ste jednom glasali.</h3>";
		
			$upitPrikazDa="SELECT odgovor,COUNT(odgovor) AS BrojOdgovora FROM `anketa1` WHERE odgovor = 'Da' GROUP BY odgovor";
			$rezPrikaz=mysqli_query($konekcija, $upitPrikazDa);
        while($r=mysqli_fetch_array($rezPrikaz))
        {
			
            echo "<b>".$r['odgovor']." - ".$r['BrojOdgovora']." glas/a</b><br/>";
           
        }
		$upitPrikazNe="SELECT odgovor,COUNT(odgovor) AS BrojOdgovora FROM `anketa1` WHERE odgovor = 'Ne' GROUP BY odgovor";
			$rezPrikaz=mysqli_query($konekcija, $upitPrikazNe);
        while($r=mysqli_fetch_array($rezPrikaz))
        {
			
            echo "<b>".$r['odgovor']." - ".$r['BrojOdgovora']." glas/a</b><br/>";
           
		}
		
		} 
		
		else{
		
        if(empty($rezultat))
        {
            echo "Odaberite jedan odgovor!";
        }
        else{
			
			$upit="INSERT INTO anketa1 VALUES('','$rezultat',$id)";
			$rez=mysqli_query($konekcija,$upit);
			
			echo "<h3>Uspesno ste glasali!</h3>";
		
			$upitPrikazDa="SELECT odgovor,COUNT(odgovor) AS BrojOdgovora FROM `anketa1` WHERE odgovor = 'Da' GROUP BY odgovor";
			$rezPrikaz=mysqli_query($konekcija, $upitPrikazDa);
        while($r=mysqli_fetch_array($rezPrikaz))
        {
			
            echo "<b>".$r['odgovor']." - ".$r['BrojOdgovora']." glas/a</b><br/>";
           
        }
		$upitPrikazNe="SELECT odgovor,COUNT(odgovor) AS BrojOdgovora FROM `anketa1` WHERE odgovor = 'Ne' GROUP BY odgovor";
			$rezPrikaz=mysqli_query($konekcija, $upitPrikazNe);
        while($r=mysqli_fetch_array($rezPrikaz))
        {
			
            echo "<b>".$r['odgovor']." - ".$r['BrojOdgovora']." glas/a</b><br/>";
           
		}
       
		
        }
		}
		}
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