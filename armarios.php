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
                    <h3>Armários</h3>
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
										echo "<li>";
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
											echo "<a href='cadastro_armario.php?local=$local->cd_local' class='btn btn-floating green' style='margin:4px'>";
											echo "<i class='material-icons'>add</i>";
											echo "</a>";
											
										}else{
											echo "<div class='grey-text'>";
											echo "<h4>Sem armários aqui!</h4>";
											echo "<a href='cadastro_armario.php?local=$local->cd_local'>Clique para cadastrar um armário em $local->nm_local</a>";
											echo "</div>";
										}
										echo "</div>";
									}
								}else{
									echo "<div class='center grey-text'>";
									echo "<h4>Sem armários ainda!</h4>";
									echo "<a href='#!'>Clique aqui para cadastrar armários</a>";
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
        <script type="application/javascript" src="/js/menu_li_active.js"></script>
        <script type="application/javascript" src="/js/saudacao.js"></script>
        <script type="application/javascript">
            $(document).ready(function(){
                $('.sidenav').sidenav();
                $('.collapsible').collapsible();
            });
        </script>
    </body>
</html>
