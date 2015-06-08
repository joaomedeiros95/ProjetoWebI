<?php include_once('header.php') ?>

<div class="row">
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <img src="img/avatar.png" class="img-responsive center-block" width="100px" height="100px"/>

                    <p class="text-center text-rows-index">Alguma explicação</p>
                </div>
                <!--/.col-xs-12 -->
                <div class="col-xs-12 col-md-4">
                    <img src="img/saude.png" class="img-responsive center-block" width="100px" height="100px"/>

                    <p class="text-center text-rows-index">Alguma explicação</p>
                </div>
                <!--/col-xs-12 -->
                <div class="col-xs-12 col-md-4">
                    <img src="img/web.png" class="img-responsive center-block" width="100px" height="100px"/>

                    <p class="text-center text-rows-index">Alguma explicação</p>
                </div>
                <!--/.col-xs-12 -->
            </div>
            <!--/.row -->
        </div>
        <!--/.container -->
    </div>
</div>

<div class="container" id="sobre">
    <h2>Sobre</h2>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dignissim nisi sodales pretium ornare. In rhoncus
        nunc eros, consectetur viverra dui hendrerit non. Donec quam eros, mattis a tristique sed, cursus sit amet diam.
        Vivamus eget mauris eu odio tristique luctus. Aenean quis mollis ipsum. Nullam eu euismod magna. Pellentesque
        molestie magna sit amet congue aliquet. Nam pharetra ipsum in purus accumsan tempor. Integer lectus ligula,
        dictum eu pellentesque non, rhoncus ut nibh.</p>

    <p>Quisque tempor tempor posuere. Aliquam laoreet ac purus volutpat imperdiet. Integer id venenatis leo. Sed
        consectetur sem et metus suscipit eleifend. Sed nec nulla vel eros finibus pretium. Pellentesque tristique urna
        cursus rutrum pellentesque. Aliquam volutpat condimentum dui ac pretium. Nulla id mi mi. Donec vel quam
        tristique, porta enim ultrices, pharetra libero. Ut in lacus scelerisque, posuere elit at, pellentesque mi.
        Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur sit amet dictum sapien, sit amet
        porttitor magna. Donec a sagittis velit.</p>

    <p>Sed nisl turpis, sollicitudin non dapibus ultrices, molestie nec leo. Vivamus non lorem vel lorem euismod
        pharetra hendrerit ac libero. Etiam finibus id lorem a aliquet. Sed tristique dolor non fermentum molestie. In
        hendrerit rhoncus ultricies. Morbi eget dui semper, fringilla quam et, volutpat dolor. Morbi vitae nisi orci.
        Nam</p>
<br>
<br>
<br>
	<div class="contato" id="contato">
	
	<h2>Contato</h2>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dignissim nisi sodales pretium ornare. In rhoncus
        nunc eros, consectetur viverra dui hendrerit non. Donec quam eros, mattis a tristique sed, cursus sit amet diam.
        Vivamus eget mauris eu odio tristique luctus. Aenean quis mollis ipsum. Nullam eu euismod magna. Pellentesque
        molestie magna sit amet congue aliquet. Nam pharetra ipsum in purus accumsan tempor. Integer lectus ligula,
        dictum eu pellentesque non, rhoncus ut nibh.</p>

    <p>Quisque tempor tempor posuere. Aliquam laoreet ac purus volutpat imperdiet. Integer id venenatis leo. Sed
        consectetur sem et metus suscipit eleifend. Sed nec nulla vel eros finibus pretium. Pellentesque tristique urna
        cursus rutrum pellentesque. Aliquam volutpat condimentum dui ac pretium. Nulla id mi mi. Donec vel quam
        tristique, porta enim ultrices, pharetra libero. Ut in lacus scelerisque, posuere elit at, pellentesque mi.
        Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur sit amet dictum sapien, sit amet
        porttitor magna. Donec a sagittis velit.</p>

    <p>Sed nisl turpis, sollicitudin non dapibus ultrices, molestie nec leo. Vivamus non lorem vel lorem euismod
        pharetra hendrerit ac libero. Etiam finibus id lorem a aliquet. Sed tristique dolor non fermentum molestie. In
        hendrerit rhoncus ultricies. Morbi eget dui semper, fringilla quam et, volutpat dolor. Morbi vitae nisi orci.
        Nam</p>
	
	
	
	</div>
	
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