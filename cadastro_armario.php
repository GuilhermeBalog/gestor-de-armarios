<?php include_once 'init/init.php'; ?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gestor de Armários | Armários</title>
        <link rel="stylesheet" href="/css/materialize.css">
        <link rel="stylesheet" href="/css/material_icons.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="manifest" href="/manifest.json">
    </head>
    <body>
        <?php
            include_once "components/menu.php";
        ?>
        <div class="row s12" style="margin-bottom: 0px;">
            <main id="pag-content">
                <div class="col s12"> 
                    <h3>Cadastrar Armários</h3>
                    <p>
                        <label class="black-text">
                            <input type="radio" checked class="with-gap" name="tp_cadastro" id="rd_varios">
                            <span>Vários Armários</span>
                        </label>
                        <label class="black-text">
                            <input type="radio" class="with-gap" name="tp_cadastro" id="rd_um">
                            <span>1 Armário</span>
                        </label>
                    </p>
                    <form method="post">
                        <div class="col s12" id="varios">
                            <div class="input-field col s12 l6">
                                <label for="nr_inicio">Número do Primeiro Armário</label>
                                <input type="number" id="nr_inicio" name="nr_inicio" class="validate" required placeholder="Ex. 1" min="1">
                                <span class="helper-text" data-error="Digite um número maior que zero" data-success="Certo"></span>
                            </div>
                            <div class="input-field col s12 l6">
                                <label for="nr_fim">Número do Último Armário</label>
                                <input type="number" id="nr_fim" name="nr_fim" class="validate" required placeholder="Ex. 120" min="1">
                                <span class="helper-text" data-error="Digite um número maior que o primeiro" data-success="Certo"></span>
                            </div>
                        </div>
                        <div class="col s12" id="um">
                            <div class="input-field col s12">
                                <label for="cd_armario">Número do Amário</label>
                                <input type="number" id="cd_armario" name="cd_armario" required placeholder="Ex. 42">
                            </div>
                        </div>
                        <div class="col s12 l6">
                            <div class="input-field col s12">
                                <select name="id_local" required>
                                    <?php
                                        $query = $admin->consultar_local();
                                        if(!empty($query)){
                                            while($local = $query->fetch_object()){
                                                $selected = '';
                                                if(isset($_GET['local'])){
                                                    if($local->cd_local == $_GET['local']){
                                                        $selected = 'selected';
                                                    }
                                                }
                                                echo "<option value='$local->cd_local' $selected>$local->nm_local</option>";    
                                            }
                                        }else{
                                            echo "<option value='' disabled selected>";
                                        }
                                    ?>
                                </select>
                                <label>Local do Armário</label>
                            </div>
                        </div>
                        <div class="col s12 l1 center">
                            <div class="input-field col s12">
                                <input type="submit" class="btn" value="Cadastrar">
                            </div>
                        </div>
    		        </form>
                </div>
            </main>
        </div>
        <script type="application/javascript" src="/js/jquery-3.3.1.min.js"></script>
        <script type="application/javascript" src="/js/materialize.js"></script>
        <script type="application/javascript" src="/js/menu_li_active.js"></script>
        <script type="application/javascript" src="/js/saudacao.js"></script>
        <script type="application/javascript">
            $(document).ready(function(){
                $('.sidenav').sidenav();
                $('select').formSelect();

                var um = $('#um').detach();
                var varios;
                $('#rd_um').on('change', function(){
                    varios = $('#varios').detach();
                    $('form').prepend(um);
                });
                $('#rd_varios').on('change', function(){
                    um = $('#um').detach();
                    $('form').prepend(varios)
                });
/*
                $('input[type="radio"]').on('change', function(){
                	$('#varios').toggle();
                	$('#um').toggle();
                });*/
                $("#nr_inicio").on('change', function(){
                    var min = parseInt($(this).val()) + 1;
                    $("#nr_fim").attr("min", min);
                });
            });
        </script>
    </body>
</html>
