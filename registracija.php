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
	<script type="text/javascript" src="jquery1.js"></script>
	<script type="text/javascript" src="jquery.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	 

	<title>Cadillac</title>
	<script>  
 $(document).ready(function(){  
   $('#tbMail').keyup(function(){

     var mail = $(this).val();

     $.ajax({
      url:'check.php',
      method:"POST",
      data:{mail1:mail},
      success:function(data)
      {
       if(data != 0)
       {
        $('#sMail').html('<span class="red_mail">Mail je vec u upotrebi.</span>');
        $('#sbPrijava').attr("disabled", true);
       }
       else
       {
        $('#sMail').html('<span class="green_mail">Mail je slobodan</span>');
        $('#sbPrijava').attr("disabled", false);
       }
      }
     })

  });
  $('#tbKorisnickoIme').keyup(function(){

     var username = $(this).val();

     $.ajax({
      url:'check.php',
      method:"POST",
      data:{username1:username},
      success:function(data)
      {
       if(data != 0)
       {
        $('#sUsername').html('<span class="red_mail">Korisnicko ime je vec u upotrebi.</span>');
        $('#sbPrijava').attr("disabled", true);
       }
       else
       {
        $('#sUsername').html('<span class="green_mail">Korisnicko ime je slobodno</span>');
        $('#sbPrijava').attr("disabled", false);
       }
      }
     })
	})
 });

	
  
</script>

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
				$upit="SELECT * FROM meni WHERE id_meni IN(1,2,4,14,5,10)";
				$rez=mysqli_query($konekcija, $upit);
				
				echo"<ul>";
				while($r=mysqli_fetch_array($rez)){
					echo "<li><a href=".$r['link'].">".$r['naziv_link']."</a></li>";
				}
				echo"</ul>";
			}
			else if(isset($_SESSION['idU']) && $_SESSION['uloga']=='admin')
			{
				$upit="SELECT * FROM meni WHERE id_meni IN(1,2,4,14,5,13)";
				$rez=mysqli_query($konekcija, $upit);
				
				echo"<ul>";
				while($r=mysqli_fetch_array($rez)){
					echo "<li><a href=".$r['link'].">".$r['naziv_link']."</a></li>";
				}
				echo"</ul>";
			}
			else
			{
				$upit="SELECT * FROM meni WHERE id_meni IN(1,2,4,14,5)";
				$rez=mysqli_query($konekcija, $upit);
				
				echo"<ul>";
				while($r=mysqli_fetch_array($rez)){
					echo "<li><a href=".$r['link'].">".$r['naziv_link']."</a></li>";
				}
				echo"</ul>";
			}
			?>
		</div>
		<div id="sredina_registracija">
			
				<h2>Unesite Vaše podatke:</h2><br/>
				<form method="POST" action="registracija.php">
					<p class="forma">Ime:</p><input type="text" name="tbIme" id="tbIme" placeholder="Ime"/><br/>
					<p class="forma">Prezime:</p><input type="text" name="tbPrezime" id="tbPrezime" placeholder="Prezime"/><br/>
					<p class="forma">Username:</p><input type="text" name="tbKorisnickoIme" id="tbKorisnickoIme" placeholder="Korisničko ime"/><span id="sUsername"></span>
					<p class="forma">Password:</p><input type="text" name="tbSifra" id="tbsifra" placeholder="Lozinka"/><br/>
					<p class="forma">E-mail:</p><input type="text" name="tbMail" id="tbMail" placeholder="E-mail"/><span id="sMail"></span><br/>
					<input type="submit"  id="sbPrijava" name="sbPrijava" value="Prijava"/>
				</form>
			    
				<?php
				if(isset($_REQUEST['sbPrijava'])){
	
					$ime = $_REQUEST['tbIme'];
					$prezime = $_REQUEST['tbPrezime'];
					$korisnickoIme = $_REQUEST['tbKorisnickoIme'];
					$sifra = $_REQUEST['tbSifra'];
					$sifra1= md5($sifra);
					$mail = $_REQUEST['tbMail'];		
					$regIme="/^[A-Z]{1}[a-z]{2,19}$/";
					$regPrezime="/^[A-Z]{1}[a-z]{2,19}$/";
					$regKorisnickoIme="/^[a-zA-Z]{2,19}[0-9]{3,10}$/";
					$regSifra="/^[a-zA-Z]{2,19}[0-9]{3,10}$/";
					$regMail="/^(([^<>()\[\]\\.,;:\s@']+(\.[^<>()\[\]\\.,;:\s@']+)*)|('\.+'))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
		
					$greske = array();
					
					if(!preg_match($regIme, $ime))
					{
						$greske[] = "Ime nije u dobrom formatu! Mora počinjati velikim slovom i imati od 3 do 19 slovnih karaktera.&nbsp<p class='primer'>(Primer: Pera)</p><br/>";
					}
					
    
					if(!preg_match($regPrezime, $prezime))
					{
						$greske[] = "Prezime nije u dobrom formatu!Mora počinjati velikim slovom i imati od 3 do 20 slovnih karaktera.&nbsp<p class='primer'>(Primer: Peric)</p><br/>";
					}
					
					if(!preg_match($regKorisnickoIme, $korisnickoIme))
					{
						$greske[] = "Korisničko ime nije u dobrom formatu! Mora imati od 2 do 19 slovnih karaktera i od 3 do 10 brojeva.&nbsp<p class='primer'>(Primer: pera123)</p><br/>";
					}
					if(!preg_match($regSifra, $sifra))
					{
						$greske[] = "Šifra nije u dobrom formatu! Mora imati od 2 do 19 slovnih karaktera i od 3 do 10 brojeva.&nbsp<p class='primer'>(Primer: pera123)</p><br/>";
					}
       
					if(!preg_match($regMail, $mail))
					{
						$greske[] = "Mejl nije u dobrom formatu!&nbsp<p class='primer'>(Primer: pera@gmail.com)</p>";
					}

 
					if(count($greske) != 0)
					{
						echo "<ul class='greske'>";
					foreach($greske as $g)
					{
						echo "<li class='greske'>".$g."</li>";
					}
						echo "</ul>";
					}
					else
					{
						
						include ("konekcija.inc");
						$upit= "INSERT INTO korisnici VALUES ('','$ime','$prezime','$korisnickoIme','$sifra1','$mail',1)";
						$rezultat=mysqli_query($konekcija,$upit);
						mysqli_close($konekcija);
						if(!$rezultat){
							echo "<h3 style='color:red;'>Neuspešan upis u bazu</h3>";
							echo "<a href='registracija.php'> Kliknite ovde da se vratite na registraciju!</a> ";
						}
						else {
							echo "<h3 style='color:green;'>Uspešno ste se registrovali!<br/>Sad se možete ulogovati sa parametrima koje ste uneli!</h3>";
							echo "<a href='index.php'>Kliknite ovde da se vratite na početnu stranicu sajta</a> ";
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
					include("konekcija.inc");
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