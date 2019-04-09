<?php  

include("konekcija.inc"); 
if(isset($_POST["mail1"]))
{
 $mail = mysqli_real_escape_string($konekcija, $_POST["mail1"]);
 $upit = "SELECT * FROM korisnici WHERE mail = '".$mail."'";
 $rez = mysqli_query($konekcija, $upit);
 echo mysqli_num_rows($rez);
}
if(isset($_POST["username1"]))
{
 $username = mysqli_real_escape_string($konekcija, $_POST["username1"]);
 $upit = "SELECT * FROM korisnici WHERE korisnicko_ime = '".$username."'";
 $rez = mysqli_query($konekcija, $upit);
 echo mysqli_num_rows($rez);
}
?>