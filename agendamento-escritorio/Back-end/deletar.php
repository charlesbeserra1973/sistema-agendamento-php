<?php
include "../php/conexao.php";
$id_contato=$_POST["id_contato"];
$del_mensagem=$_POST["del_mensagem"]; 

	if($del_mensagem=="Excluir Mensagem") {	
		$deletar_cont=mysqli_query($conexao,"delete from tb_contato where id_contato=$id_contato"); 
		
		if($deletar_cont>0){
			header('Location:sucess.php');
		}
		else{
			header('Location:erro.php');
		}
	}

?>