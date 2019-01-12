<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gestor de Armários | Login</title>
        <link rel="stylesheet" href="/css/materialize.css">
        <link rel="stylesheet" href="/css/material_icons.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="manifest" href="/manifest.json">
    </head>
    <body>
        <div class="row s12" style="margin-bottom: 0;">
            <div class="col l6 orange hide-on-med-and-down total-height valign-wrapper">
                <div class="col s12 center">
                    <i class="material-icons large white-text">lock</i>
                    <h1>Gestor de Armários</h1>
                </div>
            </div>
            <div class="col s12 m10 l6 offset-m1 white total-height center valign-wrapper">
                <div class="col s10 offset-s1 center">
                    <div class="col s12 hide-on-large-only">
                        <i class="material-icons large  orange-text">lock</i>
                        <h3 class="h3-logo">Gestor de Armários</h3>
                    </div>
                    <h1 class="hide-on-small-only">Login</h1>
                    <form action="actions/login.php" method="post">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <label for="tx_login">Usuário:</label>
                            <input type="text" id="tx_login" name="tx_login" required>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <label for="tx_pass">Senha:</label>
                            <input type="password" id="tx_pass" name="tx_pass" required>
                        </div>
                        <div class="input-field col s12">
                            <input type="submit" class="btn btn-large orange" value="Entrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="application/javascript" src="/js/jquery-3.3.1.min.js"></script>
        <script type="application/javascript" src="/js/materialize.js"></script>
    </body>
</html>