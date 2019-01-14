<?php include_once "init/init.php"; ?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gestor de Armários | Administradores</title>
        <link rel="stylesheet" href="/css/materialize.css">
        <link rel="stylesheet" href="/css/material_icons.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="manifest" href="/manifest.json">
    </head>
    <body>
        <?php
        include_once "components/menu.php";
        ?>
        <!-- Editar Login -->
        <div id="editar_login" class="modal">
            <div class="row modal-content">
                <h4>Edição de Administrador</h4>
                <form action="/actions/editar_login.php" method="post">
                    <input type="hidden" id="editar_cd_login" name="cd_login">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">school</i>
                        <input type="text" name="nm_user" id="editar_nm_user">
                        <label for="editar_nm_user">Nome do Administrador</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">assignment</i>
                        <input type="text" name="tx_login" id="editar_tx_login">
                        <label for="editar_tx_login">Novo Login</label>
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
        <!-- Fim do Editar Login -->

        <!-- Cadastro de Login -->
        <div id="cadastrar_login" class="modal">
            <div class="row modal-content">
                <h4>Cadastro de Administrador</h4>
                <form action="/actions/cadastrar_login.php" method="post">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">assignment</i>
                        <input type="text" name="nm_user" id="nm_user">
                        <label for="nm_user">Nome do Administrador</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" name="tx_login" id="tx_login">
                        <label for="tx_login">Login</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input type="password" name="tx_pass" id="tx_pass">
                        <label for="tx_pass">Senha</label>
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
        <!-- Fim do Cadastro de Login -->
        <div class="row s12" style="margin-bottom: 0px;">
            <main id="pag-content">
                <h3>Administradores</h3>
                <table>
                    <thead>
                    <tr>
                        <th colspan="6" class="center-align">
                            <h4>Lista de Administradores&nbsp;
                                <a href="#!" data-target="cadastrar_login" class="btn-floating red modal-trigger">
                                    <i class="material-icons">add</i>
                                </a>
                            </h4>
                        </th>
                    </tr>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $admins = $admin->consultar_usuario();
                    if(!empty($admins)){
                        while($admin = $admins->fetch_object()){
                            ?>
                            <tr id="login_<?php echo $admin->cd_login; ?>" data-nm-user="<?php echo $admin->nm_user; ?>" data-tx-login="<?php echo $admin->tx_login; ?>">
                                <td><?php echo $admin->cd_login; ?></td>
                                <td><?php echo $admin->nm_user; ?></td>
                                <td><?php echo $admin->tx_login; ?></td>
                                <td><a data-target="editar_login" href="#!" onclick="editar_dados('login',<?php echo $admin->cd_login; ?>,['nm_user','tx_login'])" class="btn-floating modal-trigger"><i class="material-icons">edit</i></a></td>
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