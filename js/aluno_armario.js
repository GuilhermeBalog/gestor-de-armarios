function aluno_armario(armario, status){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			document.getElementById('ver_armario').innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "actions/consultar_aluno_armario.php?armario=" + armario + "&status=" + status, true);
	xhttp.send();
}