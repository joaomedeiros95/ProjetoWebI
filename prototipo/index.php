<?php include_once('header.php') ?>

<div class="row">
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <img src="img/avatar.png" class="img-responsive center-block" width="100px" height="100px"/>

                    <p class="text-center text-rows-index">Profissionais Qualificados</p>
                </div>
                <!--/.col-xs-12 -->
                <div class="col-xs-12 col-md-4">
                    <img src="img/saude.png" class="img-responsive center-block" width="100px" height="100px"/>

                    <p class="text-center text-rows-index">Melhor Assistência Médica</p>
                </div>
                <!--/col-xs-12 -->
                <div class="col-xs-12 col-md-4">
                    <img src="img/web.png" class="img-responsive center-block" width="100px" height="100px"/>

                    <p class="text-center text-rows-index">Hospital Completo com um Click</p>
                </div>
                <!--/.col-xs-12 -->
            </div>
            <!--/.row -->
        </div>
        <!--/.container -->
    </div>
</div>

<div class="container paginas" id="home">
	
	<h2>Bem vindo ao Hospital Web</h2>

    	
	<p>O Hospital Web é um sistema de gestão hospitalar online, o intuito desse sistema é acelerar e tornar totalmente digital 
	    o cadastro de consultas e exames de um hospital ou clínica. Esse sistema foi pensando para facilitar a interação do paciente 
		com seu hospital ou clínica como para a administração  do mesmo, esse gestor online vai mudar o jeito atual de como marcar e 
		gerênciar consultas e exames trazendo benéficios mutuos para os pacientes  médicos e gestores.</p>

    <hr>
</div>


<div class="container paginas" id="sobre">

	<h2>Sobre</h2>

    <p> Após muitos anos de trabalho árduo, estudos e pesquisa construímos o melhor hospital do estado, toda
	a nossa equipe é composta por profissionais bem qualificados e com muita experiência no mercado, devemos o nosso
	sucesso a rapidez e qualidade dos serviços prestados com a ajuda do nosso sistema de gestão online que melhorou a logística
	do atendimento e manutenção do hospital.</p>

    <hr>
</div>

<div class="container paginas" id="contato">
	
	<h2>Contato</h2>

    <form class="form-horizontal center-block" style="width: 70%;">
            <!-- Text input-->
            <div class="form-group">
                <label  for="textinput">Nome</label>
                <input id="textinput" name="textinput" type="text" placeholder="Seu nome..." class="input-sm form-control " required="">

            </div>

            <!-- Text input-->
            <div class="form-group">
                <label  for="email">Email</label>
                <input id="email" name="email" type="text" placeholder="Seu email..." class="input-sm form-control " required="">
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label  for="assunto">Assunto</label>
                <input id="assunto" name="assunto" type="text" placeholder="Digite um assunto..." class="input-sm form-control " required="">

            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label  for="texto">Texto</label>
                <textarea id="texto" name="texto" class="input-sm form-control" >Escreva aqui sua dúvida...</textarea>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label  for="enviar"></label>
                <button id="enviar" name="enviar" class="btn btn-danger">Enviar</button>
            </div>

    </form>


</div>
	
<?php include_once('footer.php') ?>

<script type="text/javascript">
    //Inicia o jQuery
    $(function(){
        //chama a função de scroll
        navegation($('ul.menu a'),700);
    });

    //função para o scroll do menu
    function navegation(elemento,desconto){
        elemento.bind('click',function(event){
            var $anchor = $(this);
            var calculo = $($anchor.attr('href')).offset().top;
            if(desconto){
                var goto = calculo-desconto;
            }else{
                var goto = calculo;
            }

            $('html, body').stop().animate({
                scrollTop: goto
            }, 900,'easeInOutExpo');

            event.preventDefault();
        });
    }
</script>