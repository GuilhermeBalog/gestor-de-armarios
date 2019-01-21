var um = $('#um').detach();
var varios;
$('#rd_um').on('change', function(){
    varios = $('#varios').detach();
    $('#form_padrao').prepend(um);
});
$('#rd_varios').on('change', function(){
    um = $('#um').detach();
    $('#form_padrao').prepend(varios)
});
$("#nr_inicio").on('change', function(){
    var min = parseInt($(this).val()) + 1;
    $("#nr_fim").attr("min", min);
});

var um_local = $('#um_local').detach();
var varios_local;
$('#rd_um_local').on('change', function(){
    varios_local = $('#varios_local').detach();
    $('#form_local').prepend(um_local);
});
$('#rd_varios_local').on('change', function(){
    um_local = $('#um_local').detach();
    $('#form_local').prepend(varios_local)
});
$("#nr_inicio_local").on('change', function(){
    var min = parseInt($(this).val()) + 1;
    $("#nr_fim_local").attr("min", min);
});