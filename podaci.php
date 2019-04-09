<?php
include("konekcija.inc");
$ispis = '';
if(isset($_POST["search1"]))
{
	$search = mysqli_real_escape_string($konekcija, $_POST["search1"]);
	$upit = "SELECT * FROM proizvodi WHERE naziv_proizvod LIKE '%".$search."%' OR cena_proizvod LIKE '%".$search."%'";
}
else
{
	$upit = "SELECT * FROM proizvodi ORDER BY id_proizvod";
}
$rezultat = mysqli_query($konekcija, $upit);
if(mysqli_num_rows($rezultat) > 0)
{
	$ispis .= '<table align=center width=600 height=300>
				<tr>
					<th class="th1">Naziv</th>
					<th class="th1">Cena</th>
					<th class="th1">Slika</th>							
				</tr>';
	while($r = mysqli_fetch_array($rezultat))
	{
		$ispis .= '<tr>
					<td class="td1">'.$r["naziv_proizvod"].'</td>
					<td class="td1">'.$r["cena_proizvod"].'</td>
					<td class="td_img"><img src='.$r["putanja"].' alt="img_c"/></td>	
				</tr>';
	}
	echo $ispis;
}
else
{
	echo "Nema rezultata";
}
?>