var span = document.getElementById('saudacao');
var date = new Date();
var hora = date.getHours();
var mensagem;
if(hora >= 0 && hora < 5){
	mensagem = 'Boa madruga';
}else if(hora >= 5 && hora < 12){
	mensagem = 'Bom dia';
}else if(hora >= 12 && hora < 19){
	mensagem = 'Boa tarde';
}else if(hora >= 19 && hora <= 23){
	mensagem = 'Boa noite';
}
span.innerHTML = mensagem;
