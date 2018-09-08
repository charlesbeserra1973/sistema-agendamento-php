<?php
include "../php/conexao.php";
// acentuação
mysqli_query($conexao,"SET NAMES 'utf8'");  
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');  
mysqli_query($conexao,'SET character_set_results=utf8'); 


$id_noti=$_GET["id_noti"]; 
echo $id_noti;
	
	$up_visu=mysqli_query($conexao,"UPDATE tb_notificacoes SET status_notifica='Visualizado' WHERE id_notifica=$id_noti");

	if ($up_visu>0) {
		header('Location:sucess.php');
	}
	else{
		header('Location:erro.php');
	}

?>