<?php

	include "conexao.php";
	session_start();
	$email_user=$_SESSION['email_user'];
	$id_user=$_SESSION['id_login'];
 	// acentuação
	  mysqli_query($conexao,"SET NAMES 'utf8'");  
	  mysqli_query($conexao,'SET character_set_connection=utf8');
	  mysqli_query($conexao,'SET character_set_client=utf8');  
	  mysqli_query($conexao,'SET character_set_results=utf8');  


	$nome_dados=$_POST["nome_dados"];
	$telefone_dados=$_POST["telefone_dados"];
	$rg_dados=$_POST["rg_dados"];
	$data_nasc_dados=$_POST["data_nasc_dados"];


	$query_select=mysqli_query($conexao,"select * from tb_dadoscliente WHERE cod_dadosC=$id_user");
	

	if ($query_select->num_rows>0) { 
		$update="UPDATE `tb_dadoscliente` SET `nome_dadosC`='$nome_dados',`telefone_dadosC`='$telefone_dados',`rg_dadosC`='$rg_dados',`dt_nasc_dadosC`='$data_nasc_dados' WHERE cod_dadosC=$id_user";
		$query_up=mysqli_query($conexao, $update); //insere os dados pessoais na tb_dadoscliente

		if ($query_up>0) {
			echo "O cadastro foi atualizado com sucesso!";
		}
		else{
			echo "Erro ao atualizar cadastro! Confira novamente os campos.";
		}
	}


	else{
		$insert_da="insert into tb_dadoscliente (cod_dadosC,login_dadosC,nome_dadosC,telefone_dadosC,rg_dadosC,dt_nasc_dadosC) values ($id_user,'$email_user','$nome_dados','$telefone_dados', $rg_dados ,'$data_nasc_dados')";
		$query=mysqli_query($conexao, $insert_da); //insere os dados pessoais na tb_dadoscliente

		if ($query>0) {
			echo "O cadastro foi salvo com sucesso!";
		}
		else{
			echo "Erro ao salvar cadastro! Confira novamente os campos.";
		}
	}

	




	