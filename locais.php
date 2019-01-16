<?php include_once "init/init.php"; ?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gestor de Armários | Locais</title>
        <link rel="stylesheet" href="/css/materialize.css">
        <link rel="stylesheet" href="/css/material_icons.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="manifest" href="/manifest.json">
    </head>
    <body>
        <?php
        include_once "components/menu.php";
        ?>
        <!-- Editar Local -->
        <div id="editar_local" class="modal">
            <div class="row modal-content">
                <h4>Edição de Local</h4>
                <form action="/actions/editar_local.php" method="post">
                    <input type="hidden" id="editar_cd_local" name="cd_local">
                    <input type="hidden" id="editar_st_local" name="st_local">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">school</i>
                        <input type="text" name="nm_local" id="editar_nm_local">
                        <label for="editar_nm_local">Nome do Local</label>
                    </div>
                    <div class="input-field col s12">
                        <button class="btn col s12 l6 offset-l3">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>
        <!-- Fim do Editar Local -->

        <!-- Cadastro de Local -->
        <div id="cadastrar_local" class="modal">
            <div class="row modal-content">
                <h4>Cadastro de Local</h4>
                <form action="/actions/cadastrar_local.php" method="post">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">school</i>
                        <input type="text" name="nm_local" id="nm_local">
                        <label for="nm_local">Nome do Local</label>
                    </div>
                    <div class="input-field col s12">
                        <button class="btn col s12 l6 offset-l3">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>
        <!-- Fim do Cadastro de Local -->
        <div class="row s12" style="margin-bottom: 0px;">
            <main id="pag-content">
                <h3>Locais</h3>
                <table>
                    <thead>
                    <tr>
                        <th colspan="6" class="center-align">
                            <h4>Lista de Locais&nbsp;
                                <a href="#!" data-target="cadastrar_local" class="btn-floating red modal-trigger">
                                    <i class="material-icons">add</i>
                                </a>
                            </h4>
                        </th>
                    </tr>
                    <tr>
                        <th>Código</th>
                        <th>Nome do Local</th>
                        <th>Status</th>
                        <th>Inativar/<br>&nbsp;&nbsp;Ativar</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $locals = $admin->consultar_local();
                    if(!empty($locals)){
                        while($local = $locals->fetch_object()){
                            if($local->st_local == 1){
                                $local->st_local = "Ativo";
                                $icon = "delete";
                            }else{
                                $local->st_local = "Inativo";
                                $icon = "check";
                            }
                            ?>
                            <tr id="local_<?php echo $local->cd_local; ?>" data-nm-local="<?php echo $local->nm_local; ?>" data-st-local="<?php echo $local->st_local; ?>">
                                <td><?php echo $local->cd_local; ?></td>
                                <td><?php echo $local->nm_local; ?></td>
                                <td><?php echo $local->st_local; ?></td>
                                <td><a href="/actions/toggle_local.php?cd=<?php echo $local->cd_local; ?>" class="btn-floating"><i class="material-icons"><?php echo $icon; ?></i></a></td>
                                <td><a data-target="editar_local" href="#!" onclick="editar_dados('local',<?php echo $local->cd_local; ?>,['st_local','nm_local'])" class="btn-floating modal-trigger"><i class="material-icons">edit</i></a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </main>
        </div>
        <script type="application/javascript" src="/js/jquery-3.3.1.min.js"></script>
        <script type="application/javascript" src="/js/materialize.js"></script>
        <script type="application/javascript" src="/js/menu_li_active.js"></script>
        <script type="application/javascript" src="/js/editar_dados.js"></script>
        <script type="application/javascript">
            $(document).ready(function(){
                $('.sidenav').sidenav();
                $('.modal').modal();
            });
        </script>
    </body>
</html>