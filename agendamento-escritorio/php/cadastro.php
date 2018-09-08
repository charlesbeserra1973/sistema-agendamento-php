<?php
	include "conexao.php";
 	// acentuação
	  mysqli_query($conexao,"SET NAMES 'utf8'");  
	  mysqli_query($conexao,'SET character_set_connection=utf8');
	  mysqli_query($conexao,'SET character_set_client=utf8');  
	  mysqli_query($conexao,'SET character_set_results=utf8'); 

	$nome_cad=$_POST["nome_cad"];
	$email_cad=$_POST["email_cad"];
	$senha_cad=$_POST["senha_cad"];
	$clone_senha_cad=$_POST["clone_senha_cad"];
	date_default_timezone_set("Brazil/East");
	$dataatual=date("Y-m-d");



	$select="select email_login from tb_login where email_login='$email_cad' ";
	$query=mysqli_query($conexao,$select);


	if ($query->num_rows>0){
		echo "E-mail já cadastrado!";
	}
	else{
		if ($senha_cad!=$clone_senha_cad) {
			echo "As senhas não correspondem!";
		}
		else{
			$insert="insert into tb_login (data_login,nome_login,email_login,senha_login) values ('$dataatual','$nome_cad','$email_cad','$senha_cad')";
			$query_insert=mysqli_query($conexao , $insert);
						
			if ($query_insert>0) { echo "Cadastrado com sucesso!"; }
			else{ echo "Erro! Não foi cadastrado!";  }			
		}
	}



	$scont=	"SELECT * FROM tb_login WHERE data_login='$dataatual'";
	$qcont=mysqli_query($conexao,$scont);
	$i=0;
		while($l=mysqli_fetch_array($qcont)){ $i++; }
	 
	if ($i == 1) { //se o cadastro a cima correr tudo certo, haverá um cadastro registrado em tb_login, que gera a notificação
		$icont=mysqli_query ($conexao,'INSERT INTO `tb_notificacoes`( `titulo_notifica`, `texto_notifica`, `data_notifica`, `status_notifica`) VALUES ("Cadastros","Houve um cadastro na data hoje.","'.$dataatual.'","Não visualizado")');	 
	}
	else{
		$ucont=mysqli_query ($conexao,'UPDATE `tb_notificacoes` SET `texto_notifica`="Houve '.$i .' cadastros na data hoje.",`status_notifica`="Não visualizado" WHERE titulo_notifica="Cadastros" AND data_notifica="'.$dataatual.'"'); //caso haja mais cadastros, apenas atualiza os numeros
	}	
?>