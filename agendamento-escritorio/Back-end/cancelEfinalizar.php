<?php

	include "../php/conexao.php";

	$id_agenda=$_POST["id_agenda"]; 
	$btn_agenda=$_POST["btn_agenda"]; 

	if ($btn_agenda=="Cancelar Consultoria") {
		$insert_can="UPDATE `tb_agendamento` SET `status_agenda`='Cancelado pelo Administrador' WHERE `id_agenda`=$id_agenda";
		$query_can=mysqli_query($conexao, $insert_can);

		if ($query_can>0) {
			header('Location:sucess.php');
		}
		else{
			header('Location:erro.php');
		}	 
	}

	elseif ($btn_agenda=="Consultoria Finalizada") {
		$insert_fin="UPDATE `tb_agendamento` SET `status_agenda`='Consultoria Finalizada' WHERE `id_agenda`=$id_agenda";
		$query_fin=mysqli_query($conexao, $insert_fin);

		if ($query_fin>0) {
			header('Location:sucess.php');
		}
		else{
			header('Location:erro.php');
		}	 
	}
	
?>
