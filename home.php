<?php require_once 'init/init.php'; ?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gestor de Armários | Home</title>
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
                    <h1><span id="saudacao">Olá</span>, <?php echo $_SESSION['nm_user'] ?>! </h1> 
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
            });
        </script>
    </body>
</html>