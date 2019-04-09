function posalji(){
	var ime = document.getElementById("tbName").value;
	var email = document.getElementById("tbEmail_kontakt").value;
	var poruka = document.getElementById("textarea").value;
	
	var reIme = /^[A-Z][a-z]{2,20}(\s[A-Z][a-z]{2,20})+$/;
	var reEmail =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	
	var greske = new Array();
	
	if(!reIme.test(ime)){	
		document.getElementById("tbName").style.borderColor="red";
		alert("Nije ispravno popunjeno ime.");
		greske.push("Ime nije u dobrom formatu!");
	}
	if(!reEmail.test(email)){
		document.getElementById("tbEmail_kontakt").style.borderColor="red";
		alert("Nije ispravno popunjen email!");
		greske.push("Email nije u dobrom formatu!");
	}
	if(poruka==""){
		
		document.getElementById("textarea").style.borderColor="red";
		alert("Ne moze se poslati prazna poruka.");
		greske.push=("Poruka mora biti ispisana!");
	}
	if(greske.length===0){
	location="mailto:nikola.pusonja.9.15@ict.edu.rs?subject=New Message&body=Ime: " + ime + " <br/> Email : " + email + "<br/> Poruka: " + poruka;
	alert ("Poslali ste email!");
	//document.getElementById("tbEmail_kontakt").style.borderColor="green";
	//document.getElementById("textarea").style.borderColor="green";
	//document.getElementById("tbName").style.borderColor="green";
	}
}