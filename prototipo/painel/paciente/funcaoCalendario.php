<?php

include_once('../../config.php');

function MostreSemanas()
{
	$semanas = "DSTQQSS";

	for( $i = 0; $i < 7; $i++ )
	 echo "<td class='tdCalendario'>".$semanas{$i}."</td>";

}

function verificaData(){

    $procedimento = new procedimentoDAO();
    $resultado =  $procedimento->quantidadeConsultas();
    $rs = mysqli_fetch_assoc($resultado);
    echo "O numero de consultas de hoje: ".$rs['totalConsulta']."</br>";

}

function vagasHoje($dia){

    $data = date('Y-m-').$dia;
    $procedimento = new procedimentoDAO();
    $resultado =  $procedimento->verificaVagas($data);

    if($resultado < 1){

        return 1;
    }else{
        return 0;
    }

}


function diasConsultas(){



    $procedimento = new procedimentoDAO();
    $resultados =  $procedimento->getALL();


    //$hoje = new DateTime(date('Y').date('M').date('D').date('H'));
    //$aux = date_format($hoje,'Ymd H: i: s H:i:s');
    //q$aux = date_timestamp_get('Y-m-d h:m:s');
    //echo $aux."</br>";
    verificaData();

    //procura pelas consultas
    $imprimi = "<tr>";
    while ($row = mysqli_fetch_assoc($resultados)) {
        $data = date($row['Hentrada']);

        //echo $data;

        $imprimi .= "<td>".$data."</td></br>";
        if ($row['tipo_procedimento'] == 3 && $data > '2015-06-04' ) {

            //echo "<td>" . $row['Hentrada'] . $row['nome'] . "</td>";
        }

    }
    $imprimi .= "</td>";

    echo $imprimi;
}


function GetNumeroDias( $mes )
{

	$dias = array(
			'01' => 31, '02' => 28, '03' => 31, '04' =>30, '05' => 31, '06' => 30,
			'07' => 31, '08' =>31, '09' => 30, '10' => 31, '11' => 30, '12' => 31
	);

    //modificaÃ§Ã£o para ano bissexto
	if (((date('Y') % 4) == 0 and (date('Y') % 100)!=0) or (date('Y') % 400)==0)
	{
	    $dias['02'] = 29;
	}

	return $dias[$mes];
}



function MostraCalendario($mes)
{

	$numero_dias = GetNumeroDias( $mes );	// retorna o nï¿½mero de dias que tem o mes desejado
	$diacorrente = 0;	
    //jddayofweek retorna o dia da semana
	$diasemana = jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,"01",date('Y')) , 0 );	// funï¿½ï¿½o que descobre o dia da semana

	echo "<table width='350' height='250' border = 0 cellspacing = '0'>";
	
	 echo "<tr>";
	   MostreSemanas();	// funï¿½ï¿½o que mostra as semanas aqui
	 echo "</tr>";

    for( $linha = 0; $linha < 6; $linha++ )
	{


	   echo "<tr>";

	   for( $coluna = 0; $coluna < 7; $coluna++ )
	   {
		echo "<td width = 40 height = 40 ";

		  if( ($diacorrente == ( date('d') - 1) && date('m') == $mes) )
		  {	
			   echo " id = 'diaSel' ";//o dia atual recebe o stylo

		  }
		  else
		  {      //o restante dos dias nÃ£o recebem o distaque
			     if(($diacorrente + 1) <= $numero_dias )
			     {
			         if( $coluna < $diasemana && $linha == 0)
				    {
					    echo " id = '' ";
				    }
				    else
				    {
				  	    echo " id = '' ";
				    }
			     }
			     else
			     {
				    echo " ";
			     }
		  }
		echo " >";


		   /* TRECHO IMPORTANTE: APARTIR DESTE TRECHO ï¿½ MOSTRADO UM DIA DO CALENDï¿½RIO (MUITA ATENï¿½ï¿½O NA HORA DA MANUTENï¿½ï¿½O) */

           if( $diacorrente + 1 <= $numero_dias )
           {
               if( $coluna < $diasemana && $linha == 0)
               {
                   echo " ";
               }
               else
               {
                   echo "<a href = " . $_SERVER["PHP_SELF"] . "?dia=" . ($diacorrente + 1) . ">" . ++$diacorrente . "</a>";//links dos dias


			    }
           }
           else
           {
			    break;
           }

		   /* FIM DO TRECHO MUITO IMPORTANTE */



		echo "</td>";

	   }
	   echo "</tr>";
	}

	echo "</table>";
}

function MostreCalendarioCompleto()
{
	    echo "<table class='calendario'>";
	    $cont = 1;
	    for( $j = 0; $j < 4; $j++ )
	    {
		  echo "<tr class='trCalendario'>";
		for( $i = 0; $i < 3; $i++ )
		{
		 
		  echo "<td class='tdCalendario'>";
			MostreCalendario( ($cont < 10 ) ? "0".$cont : $cont );  

		        $cont++;
		  echo "</td>";

	 	}
		echo "</tr>";
	   }
	   echo "</table>";
}

?>

<html>
 <head>

  <link rel="stylesheet" src="css\localizacao.css"


 </head>
 <body>


		<?php
	
		  MostraCalendario(date('m'));
          //diasConsultas();
		?>



 </body>
</html>