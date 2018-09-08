<?php

	include "conexao.php";
	session_start();
	$email_user=$_SESSION['email_user'];
    $cod_dados=$_SESSION['id_login'];
 	// acentuação
	  mysqli_query($conexao,"SET NAMES 'utf8'");  
	  mysqli_query($conexao,'SET character_set_connection=utf8');
	  mysqli_query($conexao,'SET character_set_client=utf8');  
	  mysqli_query($conexao,'SET character_set_results=utf8'); 
  

	  $data_agenda=$_POST["data_agenda"];
	  $horario_agenda=$_POST["horario_agenda"]; 
	  $local_agenda=$_POST["local_agenda"]; 
	  date_default_timezone_set("Brazil/East");
	  $dataatual=date("Y-m-d");
	 // _________________________________________________

	

 	$BuscaDados=mysqli_query($conexao,"select * from tb_dadoscliente WHERE cod_dadosC=$cod_dados");
	

if ($BuscaDados->num_rows>0) {
	// insere o agendamento na tb_agendamento SE o usuário já tiver colocado seus dados no banco de dados
	$insert_ag="insert into tb_agendamento (cod_dadosC,dt_agenda,local_agenda,data_agenda,horario_agenda,status_agenda) values ('$cod_dados','$dataatual','$local_agenda','$data_agenda','$horario_agenda','Agendado')"; 
	$query2=mysqli_query($conexao, $insert_ag);


		if ($query2>0) {
			echo "<span style='font-size: 13px; font-weight: bold;'>Sua consultoria foi agendada com sucesso! <br>Endereço dos escritórios no rodapé da página.</span>";
		}
		else{
			echo "<span style='font-size: 13px; font-weight: bold;'>Não foi possível realizar o agendamento! <br> Confira novamente os campos acima.</span>";
		}
}
else{
	echo "Insira seus dados antes de realizar o agendamento!";
}


	// insere uma nova notificação em tb_notificações
	$scont=	"SELECT * FROM tb_agendamento WHERE dt_agenda='$dataatual'";
	$qcont=mysqli_query($conexao,$scont);
	$i=0;
		while($l=mysqli_fetch_array($qcont)){ $i++; }
	 
	if ($i == 1) {
		$icont=mysqli_query ($conexao,'INSERT INTO `tb_notificacoes`( `titulo_notifica`, `texto_notifica`, `data_notifica`, `status_notifica`) VALUES ("Agendamentos","Há um novo agendamento.","'.$dataatual.'","Não visualizado")');	 
	}
	else{
		$ucont=mysqli_query ($conexao,'UPDATE `tb_notificacoes` SET `texto_notifica`="'.$i .' agendamentos foram realizados hoje.",`status_notifica`="Não visualizado"  WHERE titulo_notifica="Agendamentos" AND data_notifica="'.$dataatual.'"');
	}
?>
