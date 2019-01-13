<?php include_once "init/init.php"; ?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gestor de Armários | Cursos</title>
        <link rel="stylesheet" href="/css/materialize.css">
        <link rel="stylesheet" href="/css/material_icons.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="manifest" href="/manifest.json">
    </head>
    <body>
        <?php
            include_once "components/menu.php";
        ?>
        <!-- Editar Curso -->
        <div id="editar_curso" class="modal">
            <div class="row modal-content">
                <h4>Edição de Curso</h4>
                <form action="/actions/editar_curso.php" method="post">
                    <input type="hidden" id="editar_cd_curso" name="cd_curso">
                    <input type="hidden" id="editar_st_curso" name="st_curso">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">school</i>
                        <input type="text" name="nm_curso" id="editar_nm_curso">
                        <label for="editar_nm_curso">Nome do Curso</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">assignment</i>
                        <input type="text" name="sg_curso" id="editar_sg_curso">
                        <label for="editar_sg_curso">Sigla do Curso</label>
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
        <!-- Fim do Editar Curso -->

        <!-- Cadastro de Curso -->
        <div id="cadastrar_curso" class="modal">
            <div class="row modal-content">
                <h4>Cadastro de Curso</h4>
                <form action="/actions/cadastrar_curso.php" method="post">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">school</i>
                        <input type="text" name="nm_curso" id="nm_curso">
                        <label for="nm_curso">Nome do Curso</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">assignment</i>
                        <input type="text" name="sg_curso" id="sg_curso">
                        <label for="sg_curso">Sigla do Curso</label>
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
        <!-- Fim do Cadastro de Curso -->
        <div class="row s12" style="margin-bottom: 0px;">
            <main id="pag-content">
                <h3>Cursos</h3>
                <table>
                    <thead>
                        <tr>
                            <th colspan="6" class="center-align">
                                <h4>Lista de Cursos&nbsp;
                                    <a href="#!" data-target="cadastrar_curso" class="btn-floating red modal-trigger">
                                        <i class="material-icons">add</i>
                                    </a>
                                </h4>
                            </th>
                        </tr>
                        <tr>
                            <th>Código</th>
                            <th>Sigla</th>
                            <th>Nome do Curso</th>
                            <th>Status</th>
                            <th>Inativar/<br>&nbsp;&nbsp;Ativar</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $cursos = $admin->consultar_curso();
                        if(!empty($cursos)){
                            while($curso = $cursos->fetch_object()){
                                if($curso->st_curso == 1){
                                    $curso->st_curso = "Ativo";
                                    $icon = "delete";
                                }else{
                                    $curso->st_curso = "Inativo";
                                    $icon = "check";
                                }
                                ?>
                                <tr id="curso_<?php echo $curso->cd_curso; ?>" data-sg-curso="<?php echo $curso->sg_curso; ?>"  data-nm-curso="<?php echo $curso->nm_curso; ?>" data-st-curso="<?php echo $curso->st_curso; ?>">
                                    <td><?php echo $curso->cd_curso; ?></td>
                                    <td><?php echo $curso->sg_curso; ?></td>
                                    <td><?php echo $curso->nm_curso; ?></td>
                                    <td><?php echo $curso->st_curso; ?></td>
                                    <td><a href="/actions/toggle_curso.php?cd=<?php echo $curso->cd_curso; ?>" class="btn-floating"><i class="material-icons"><?php echo $icon; ?></i></a></td>
                                    <td><a data-target="editar_curso" href="#!" onclick="editar_dados('curso',<?php echo $curso->cd_curso; ?>,['st_curso','sg_curso','nm_curso'])" class="btn-floating modal-trigger"><i class="material-icons">edit</i></a></td>
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