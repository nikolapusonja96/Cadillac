<?php  
 include("konekcija.inc");  
 $zapis_strana = 3;  
 $stranica = '';  
 $ispis = '';  
 if(isset($_POST["page1"]))  
 {  
      $stranica = $_POST["page1"];  
 }  
 else  
 {  
      $stranica = 1;  
 }  
 $start = ($stranica - 1)*$zapis_strana;  
 $upit = "SELECT * FROM proizvodi ORDER BY id_proizvod DESC LIMIT $start, $zapis_strana";  
 $rez = mysqli_query($konekcija, $upit);  
 while($r = mysqli_fetch_array($rez))  
 {  
      $ispis .= '  
           <div class="ispisSlike">
					<img src='.$r['putanja'].' width="300" alt='.$r['naziv_proizvod'].' height="300"/>
					<h4 align="center">Cena:'.$r['cena_proizvod'].'</h4>
      </div>';  
 }  
 $ispis .= '<br/><div class="cistac"></div><br/><div align="center">';  
 $upit_stranica = "SELECT * FROM proizvodi ORDER BY id_proizvod DESC";  
 $rez_stranica = mysqli_query($konekcija, $upit_stranica);  
 $broj_zapisa = mysqli_num_rows($rez_stranica);  
 $broj_stranica = ceil($broj_zapisa/$zapis_strana);  
 for($i=1; $i<=$broj_stranica; $i++)  
 {  
      $ispis .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 }  
 $ispis .= '</div><br /><br />';  
 echo $ispis;  
 ?>  