function editar_dados(tabela, codigo, lista){
    var elemento = document.getElementById(tabela+"_"+codigo);

    //Troca o código no modal
    document.getElementById("editar_cd_"+tabela).setAttribute("value",codigo);

    //Pega os outros dados
    for(var i = 0; i <= lista.length - 1; i++){
        console.log(i);
        editar = document.getElementById("editar_"+lista[i]);
        lista[i] = lista[i].replace("_","-");
        atributo = elemento.getAttribute("data-"+lista[i]);
        editar.value = atributo;
        M.updateTextFields();
    }
}