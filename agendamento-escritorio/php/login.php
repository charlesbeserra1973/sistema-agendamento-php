<?php
	include "conexao.php";
	SESSION_START();


	$email_log=$_POST["email_log"];
	$senha_log=$_POST["senha_log"];

	$select_login="select * from tb_login where email_login='$email_log' and senha_login='$senha_log' ";
	$query_login=mysqli_query($conexao,$select_login); 
	$result=mysqli_fetch_array($query_login);

	if ($result>0){
		$logado=1; 
		$_SESSION['logado']=$logado;
		$_SESSION['email_user']=$email_log;
		$_SESSION['id_login']=$result["id_login"];
		echo '<script>window.location.href = "index.php"</script>';
	}

	else{
		echo "E-mail ou/e senha incorretos!";
	}
?>