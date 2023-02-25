function select_curso(cd_curso){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			document.getElementById('select_curso').innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "actions/select_curso.php?cd=" + cd_curso, true);
	xhttp.send();
}