<?php

  include "conexao.php"; 

  $data_agenda=$_POST["data_consulta"];
  $local_agenda=$_POST["local_consulta"];

    
    // Atualiza a variável com o nome do local sem acento, p/ executar o select no banco
    if ($local_agenda=="Mauá - SP") {
      $local_agenda="Maua - SP"; 
    }
    elseif ($local_agenda=="Ribeirão Pires - SP") {
      $local_agenda="Ribeirao Pires - SP";
    }
    
    
    
    $sh="SELECT horario_agenda FROM tb_agendamento WHERE data_agenda='$data_agenda' AND status_agenda='Agendado' AND local_agenda='$local_agenda'";
    $qh=mysqli_query($conexao, $sh); 
    $array_h = array("8:00", "8:40", "9:20","10:00","10:40","11:20","12:40","13:20","14:00","14:40","15:20","16:00","16:40");
     

                             
    while ($l=mysqli_fetch_array($qh)) {
      $hora=$l["horario_agenda"]; //seleciona os horários agendados, vindo do banco de dados
      $achar_posicao = array_search("$hora", $array_h);  //procura em qual posição do $array_h está o horario vindo do banco.
      array_splice($array_h, $achar_posicao , 1); //quando achar a posição com determinada hr, exclui do $array_h para evitar varios agendamentos com o mesmo horario no mesmo dia
    }

    for ($h=0; $h < count($array_h) ;$h++) { 
      $posicao=$array_h[$h];
      echo"<option value='".$posicao."'>".$posicao."</option>"; //gera as opções de horários disponíveis no front end, via ajax
    }

?>