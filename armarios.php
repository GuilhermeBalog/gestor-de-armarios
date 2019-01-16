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
        <!-- Modal de cadastro padrão-->
        <div id="cadastrar_armario" class="modal">
        	<div class="row modal-content">
        		<h4>Cadastro de Armário</h4>
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
        		<form method="post" action="/actions/cadastrar_armario.php" id="form_padrao">
                    <div class="col s12" id="varios">
                        <div class="input-field col s12 l6">
                            <label for="nr_inicio">Número do Primeiro Armário</label>
                            <input type="number" id="nr_inicio" name="nr_inicio" class="validate" required min="1">
                            <span class="helper-text" data-error="Digite um número maior que zero" data-success="Certo"></span>
                        </div>
                        <div class="input-field col s12 l6">
                            <label for="nr_fim">Número do Último Armário</label>
                            <input type="number" id="nr_fim" name="nr_fim" class="validate" required min="1">
                            <span class="helper-text" data-error="Digite um número maior que o primeiro" data-success="Certo"></span>
                        </div>
                    </div>
                    <div class="col s12" id="um">
                        <div class="input-field col s12">
                            <label for="cd_armario">Número do Armário</label>
                            <input type="number" id="cd_armario" name="cd_armario" required>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="input-field col s12">
                            <select name="id_local" id="id_local" required>
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
                    <div class="input-field col s12">
                        <input type="submit" class="btn col s12 l6 offset-l3" value="Cadastrar">
                    </div>
		        </form>
        	</div>
        </div>
        <!-- Fim do modal de cadastro padrão -->

        <!-- Modal de cadastro com local específico -->
        <div id="cadastrar_com_local" class="modal">
        	<div class="modal-content">
        		<h4>Cadastro de Armário</h4>
        		<p>
                    <label class="black-text">
                        <input type="radio" checked class="with-gap" name="tp_cadastro" id="rd_varios_local">
                        <span>Vários Armários</span>
                    </label>
                    <label class="black-text">
                        <input type="radio" class="with-gap" name="tp_cadastro" id="rd_um_local">
                        <span>1 Armário</span>
                    </label>
                </p>
        		<form method="post" action="/actions/cadastrar_armario.php" id="form_local">
                    <div class="col s12" id="varios_local">
                        <div class="input-field col s12 l6">
                            <label for="nr_inicio_local">Número do Primeiro Armário</label>
                            <input type="number" id="nr_inicio_local" name="nr_inicio" class="validate" required min="1">
                            <span class="helper-text" data-error="Digite um número maior que zero" data-success="Certo"></span>
                        </div>
                        <div class="input-field col s12 l6">
                            <label for="nr_fim_local">Número do Último Armário</label>
                            <input type="number" id="nr_fim_local" name="nr_fim" class="validate" required min="1">
                            <span class="helper-text" data-error="Digite um número maior que o primeiro" data-success="Certo"></span>
                        </div>
                    </div>
                    <div class="col s12" id="um_local">
                        <div class="input-field col s12">
                            <label for="cd_armario">Número do Armário</label>
                            <input type="number" id="cd_armario" name="cd_armario" required>
                        </div>
                    </div>
                    <div class="col s12">
                    	<div class="input-field col s12">
                    		<label for="local">Local do Armário</label>
                    		<input type="text" id="local" readonly="true">
                    		<input type="hidden" id="id_local_local" name="id_local">
                    	</div>
                    </div>
                    <div class="input-field col s12">
                        <input type="submit" class="btn col s12 l6 offset-l3" value="Cadastrar">
                    </div>
                </form>
        	</div>
        </div>
        <!-- Fim do modal específico -->
        <div class="row s12" style="margin-bottom: 0px;">
            <main id="pag-content">
                <div class="col s12"> 
                    <h3>Armários 
                    	<a href="#cadastrar_armario" class="modal-trigger btn btn-floating red">
                    		<i class="material-icons">add</i>
                    	</a>
                    </h3>
                    <div class="col s12" style="margin-bottom: 10px">
	                    <div class="col s12 m8">
		                    <div class="progress">
		                    	<div class="determinate" style="width: <?php echo $admin->contar_ocupacao();?>%"></div>
		                    </div>
		                </div>
	                    <div class="col s12 m4">
	                    	<?php echo $admin->contar_ocupacao();?>% de ocupação
	                    </div>
	                </div>
	                <div class=" col s12">
	                    <ul class="collapsible expandable">
		                    <?php
								//Exibir os Armários ordenados por local
								$query_local = $admin->consultar_local();
								if(!empty($query_local)){
									while($local = $query_local->fetch_object()){
										if(isset($_GET['local'])){
											if($local->cd_local == $_GET['local']){
												echo "<li class='active'>";
											}else{
												echo "<li>";
											}
										}else{
											echo "<li>";
										}
										echo "<div class='collapsible-header'>";
										echo "<i class='material-icons'>place</i>";
										echo $local->nm_local;
										echo "</div>";
										echo "<div class='collapsible-body'>";
										$query_armario = $admin->consultar_armario("", $local->cd_local);
										if(!empty($query_armario)){
											while($armario = $query_armario->fetch_object()){
												$query_ocupacao = $admin->consultar_aluguel("", $armario->cd_armario);
												if(!empty($query_ocupacao)){
													$cor = "red";
												}else{
													$cor = "green";
												}
												echo "<div class='armario $cor valign-wrapper white-text'>";
												echo $armario->cd_armario;
												echo "</div>";
											}
											?>
											<a href='#cadastrar_com_local' class='modal-trigger btn btn-floating green' style='margin:4px' onclick="select_local(<?php echo $local->cd_local;?>, '<?php echo $local->nm_local;?>')">
											<i class='material-icons'>add</i>
											</a>
											<?php
										}else{
											?>
											<div class='grey-text'>
											<h4>Sem armários aqui!</h4>
											<a href='#cadastrar_com_local' class='modal-trigger' onclick="select_local(<?php echo $local->cd_local?>, '<?php echo $local->nm_local; ?>')">Clique para cadastrar um armário em <?php echo $local->nm_local?></a>
											</div>
											<?php
										}
										echo "</div>";
									}
								}else{
									echo "<div class='center grey-text'>";
									echo "<h4>Sem armários ainda!</h4>";
									echo "<a href='#cadastrar_armario' class='modal-trigger'>Clique aqui para cadastrar armários</a>";
									echo "</div>";
								}
							?>
						</ul>
					</div>
                </div>
            </main>
        </div>
        <script type="application/javascript" src="/js/jquery-3.3.1.min.js"></script>
        <script type="application/javascript" src="/js/materialize.js"></script>
        <script type="application/javascript" src="/js/toggle_cadastro_armario.js"></script>
        <script type="application/javascript" src="/js/select_local.js"></script>
        <script type="application/javascript" src="/js/menu_li_active.js"></script>
        <script type="application/javascript">
            $(document).ready(function(){
                $('.sidenav').sidenav();
                $('.collapsible').collapsible();
                $('.modal').modal();
                $('select').formSelect();
				elem = $("#id_local");
				var instance = M.FormSelect.getInstance(elem);
				console.log(instance.dropdown);
            });
        </script>
    </body>
</html>
