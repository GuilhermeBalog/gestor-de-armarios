<?php include_once "init/init.php"; ?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gestor de Armários | Alunos</title>
        <link rel="stylesheet" href="/css/materialize.css">
        <link rel="stylesheet" href="/css/material_icons.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="manifest" href="/manifest.json">
    </head>
    <body>
        <?php
            include_once "components/menu.php";
        ?>
        <!-- Editar Aluno -->
        <div id="editar_aluno" class="modal">
            <div class="row modal-content">
                <h4>Edição de Aluno</h4>
                <form action="/actions/editar_aluno.php" method="post">
                    <input type="hidden" id="editar_st_aluno" name="st_aluno">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">assignment_ind</i>
                        <input type="text" name="cd_aluno" id="editar_cd_aluno" required>
                        <label for="editar_cd_aluno">RM do Aluno</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">face</i>
                        <input type="text" name="nm_aluno" id="editar_nm_aluno" required>
                        <label for="editar_nm_aluno">Nome do Aluno</label>
                    </div>
                    <div class="input-field col s12 m2">
                        <input type="number" name="nr_ano" id="editar_nr_ano" min="1" max="3" placeholder="1, 2, 3" required>
                        <label for="editar_nr_ano">Ano</label>
                    </div>
                    <div class="input-field col s12 m10" id="select_curso">
                        <select name="id_curso" id="editar_id_curso">
                            <option value='' disabled selected>Escolha um curso</option>
                        </select>
                        <label for="editar_id_curso">Curso</label>
                    </div>
                    <div class="input-field col s12">
                        <button class="btn col s12 l6 offset-l3">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Fim do Editar Curso -->

        <!-- Cadastro de Aluno -->
        <div id="cadastrar_aluno" class="modal">
            <div class="row modal-content">
                <h4>Cadastro de Aluno</h4>
                <form action="/actions/cadastrar_aluno.php" method="post">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">assignment_ind</i>
                        <input type="text" name="cd_aluno" id="cd_aluno" required>
                        <label for="cd_aluno">RM do Aluno</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">face</i>
                        <input type="text" name="nm_aluno" id="nm_aluno" required>
                        <label for="nm_aluno">Nome do Aluno</label>
                    </div>
                    <div class="input-field col s12 m2">
                        <input type="number" name="nr_ano" id="nr_ano" min="1" max="3" placeholder="1, 2, 3" required>
                        <label for="nr_ano">Ano</label>
                    </div>
                    <div class="input-field col s12 m10">
                        <select name="id_curso" id="id_curso">
                            <?php
                                $cursos = $admin->consultar_curso();
                                echo "<option value='' disabled selected>Escolha um curso</option>";
                                if(!empty($cursos)){
                                    while($curso = $cursos->fetch_object()){
                                        echo "<option value='$curso->cd_curso'>$curso->nm_curso</option>";
                                    }
                                }
                            ?>
                        </select>
                        <label for="id_curso">Curso</label>
                    </div>
                    <div class="input-field col s12">
                        <button class="btn col s12 l6 offset-l3">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Fim do Cadastro de Curso -->
        <div class="row s12" style="margin-bottom: 0px;">
            <main id="pag-content">
                <h3>Alunos</h3>
                <table>
                    <thead>
                        <tr>
                            <th colspan="6" class="center-align">
                                <h4>Lista de Alunos&nbsp;
                                    <a href="#!" data-target="cadastrar_aluno" class="btn-floating red modal-trigger">
                                        <i class="material-icons">add</i>
                                    </a>
                                </h4>
                            </th>
                        </tr>
                        <tr>
                            <th>RM</th>
                            <th>Nome</th>
                            <th>Sala</th>
                            <th>Status</th>
                            <th>Inativar/<br>&nbsp;&nbsp;Ativar</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $alunos = $admin->consultar_aluno();
                        if(!empty($alunos)){
                            while($aluno = $alunos->fetch_object()){
                                if($aluno->st_aluno == 1){
                                    $aluno->st_aluno = "Ativo";
                                    $icon = "delete";
                                }else{
                                    $aluno->st_aluno = "Inativo";
                                    $icon = "check";
                                }
                                ?>
                                <tr id="aluno_<?php echo $aluno->cd_aluno; ?>" data-cd-aluno="<?php echo $aluno->cd_aluno; ?>" data-nm-aluno="<?php echo $aluno->nm_aluno; ?>"  data-nr-ano="<?php echo $aluno->nr_ano; ?>" data-st-aluno="<?php echo $aluno->st_aluno; ?>">
                                    <td><?php echo $aluno->cd_aluno; ?></td>
                                    <td><?php echo $aluno->nm_aluno; ?></td>
                                    <td><?php echo $aluno->nm_sala; ?></td>
                                    <td><?php echo $aluno->st_aluno; ?></td>
                                    <td><a href="/actions/toggle_aluno.php?cd=<?php echo $aluno->cd_aluno; ?>" class="btn-floating"><i class="material-icons"><?php echo $icon; ?></i></a></td>
                                    <td><a data-target="editar_aluno" href="#!" onclick="editar_dados('aluno',<?php echo $aluno->cd_aluno; ?>,['cd_aluno','nm_aluno','nr_ano']);select_curso(<?php echo $aluno->id_curso; ?>)" class="btn-floating modal-trigger"><i class="material-icons">edit</i></a></td>
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
        <script type="application/javascript" src="/js/select_curso.js"></script>
        <script type="application/javascript">
            $(document).ready(function(){
                $('.sidenav').sidenav();
                $('.modal').modal();
                $('select').formSelect();
            });
        </script>
    </body>
</html>