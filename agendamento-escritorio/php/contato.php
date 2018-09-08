<script type="text/javascript">
	function esconder(){
		var classes=document.getElementsByClassName("respMensa");
	    var i;
	    
	    for(i=0; i < classes.length; i++){
	    	classes[i].style.display="none";
	    }
	}
</script>
<?php
	include "conexao.php";
 	// acentuação
	  mysqli_query($conexao,"SET NAMES 'utf8'");  
	  mysqli_query($conexao,'SET character_set_connection=utf8');
	  mysqli_query($conexao,'SET character_set_client=utf8');  
	  mysqli_query($conexao,'SET character_set_results=utf8'); 


	$contato_nome=$_POST["contato_nome"];
	$contato_telefone=$_POST["contato_telefone"];
	$contato_email=$_POST["contato_email"];
	$contato_assunto=$_POST["contato_assunto"];
	$contato_mensagem=$_POST["contato_mensagem"];
	date_default_timezone_set("Brazil/East");
	$dataatual=date("Y-m-d");



	$insert="insert into tb_contato (nome_contato,telefone_contato,email_contato,assunto_contato,mensagem_contato,data_contato) values ('$contato_nome','$contato_telefone','$contato_email','$contato_assunto','$contato_mensagem','$dataatual')";
	$query=mysqli_query($conexao,$insert); 
	

	if($query>0){
		echo "<span class='respMensa'> Sua mensagem foi enviada! </span>";
		echo "<script>setTimeout('esconder()' , 9000);</script>";
	}
	else{
		echo "<span class='respMensa'> Ops! Sua mensagem não foi enviada! </span>"; 
		echo "<script>setTimeout('esconder()' , 9000);</script>"; 
	}



	$scont=	"SELECT * FROM tb_contato WHERE data_contato='$dataatual'";
	$qcont=mysqli_query($conexao,$scont);
	$i=0;
		while($l=mysqli_fetch_array($qcont)){ $i++; }
	 
	if ($i == 1) { 
		$icont=mysqli_query ($conexao,'INSERT INTO `tb_notificacoes`( `titulo_notifica`, `texto_notifica`, `data_notifica`, `status_notifica`) VALUES ("Mensagens","Há uma nova mensagem na caixa de entrada.","'.$dataatual.'","Não visualizado")');	 
	}
	else{
		$ucont=mysqli_query ($conexao,'UPDATE `tb_notificacoes` SET `texto_notifica`="Há '.$i .' novas mensagens na caixa de entrada.",`status_notifica`="Não visualizado"  WHERE titulo_notifica="Mensagens" AND data_notifica="'.$dataatual.'"');  
	}
?>
