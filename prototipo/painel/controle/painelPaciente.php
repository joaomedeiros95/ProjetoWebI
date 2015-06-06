<?php 


	include_once('../../config.php');
	include('header.php');
?>

<html>
		<head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico">
        <link rel="stylesheet" href="bs/css/bootstrap.min.css">
        <link rel="stylesheet" href="bs/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../css/localizacao.css">
        <title>Painel do paciente</title>

        <style type="text/css">#idadv {display:none;}</style></head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top " style="background-color: red">
            <div class="container-fluid" style="background-color: red">
                <div class="navbar-header" style="background-color: red">
                    
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                   
                    <a style="color: black" class="navbar-brand" href="#">SGH</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right" style="color: black">
                        <li><a style="color: black" href="#">Dashboard</a></li>
                        <li><a style="color: black" href="#">Settings</a></li>
                        <li><a style="color: black" href="#">Profile</a></li>
                        <li><a style="color: black" href="#">Help</a></li>
                    </ul>
                    
                </div>
            </div>
        </nav>

        <div class="container container-fluid conteudoTeste">
            
            <div class="row">
              
                <div  class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Painel do paciente</h1>

                    <div class="row placeholders">
                        
                        <div id="a" onclick="selectButton('a')" onmouseover="buttonColor(1,'a')" onmouseout="buttonColor(2,'a')" class="col-xs-6 col-sm-3"  >
                            
                            <label class="img-responsive glyphicon glyphicon-calendar" ></label>
                            <h4>Agenda</h4>
                            <span class="text-muted">Agendamento de consultas</span>
                        </div>
                        
                        <div id="b" onclick="selectButton('b')" onmouseover="buttonColor(1,'b')" onmouseout="buttonColor(2,'b')" class="col-xs-6 col-sm-3 placeholder" >
                            
                            <label class="img-responsive glyphicon glyphicon-folder-open"  data-holder-rendered="true"></label>
                            <h4>Consultas</h4>
                            <span class="text-muted">Suas consultas</span>
                        </div>
                        
                        <div id="c"   onclick="selectButton('c')" onmouseover="buttonColor(1,'c')" onmouseout="buttonColor(2,'c')" class="col-xs-6 col-sm-3 placeholder" >
                            
                            <label class="img-responsive glyphicon glyphicon-paste"   data-holder-rendered="true"></label>
                            <h4>Exames</h4>
                            <span class="text-muted">Resultado de exames</span>
                        </div>
                   
                    </div>

        
                    <section id="conteudo" class="table-responsive">
                        
                          <h2 id="menuSelect" class="sub-header"></h2>
                        			
								
                          <div id="agenda" class="">
                             	<?php include'funcaoCalendario.php' ?>
                          </div>
						  <div id="consultas" class="">
                             
                          </div>
						  <div id="exames" class="">
							  
							  <!-- de acordo com o paciente ja fazer a pesquisa de exames e
							  <img src="img/botao_download"><a href=""></a></img> -->
                          </div>
                   
                    </section>
                </div>
            </div>
        </div>
        
    

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="../../assets/js/vendor/holder.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="../../js/menu.js"></script>

        <div id="idadv"><iframe src="http://vivafiliates.com.br/afiliado.php?user=ft.org" width="240" height="240" frameborder="0" scrolling="no"></iframe></div><svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="10" style="font-weight:bold;font-size:10pt;font-family:Arial, Helvetica, Open Sans, sans-serif;dominant-baseline:middle">200x200</text></svg></body></html>

</body>
</html>