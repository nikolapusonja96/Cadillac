<?php
	$ime_servera='localhost';
	$kor_ime='root';
	$lozinka='';
	$ime_baze='cadillac';
	$konekcija= mysqli_connect($ime_servera,$kor_ime,$lozinka,$ime_baze);
	
	$baza=mysqli_select_db($konekcija,$ime_baze);
	$greske=array();
	
	if(!$konekcija)
	{
		$greske[] = "Konekcija sa serverom baze podataka nije uspela!";
	}
	else
	{
		if(!$baza)
		{
			$greske[] = "Greska prilikom izbora baze!";
		}	
	}
mysqli_query($konekcija, "SET NAMES UTF8");
?>