<?php

	include "php/conexao.php";
 	// acentuação
	mysqli_query($conexao,"SET NAMES 'utf8'");  
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');  
	mysqli_query($conexao,'SET character_set_results=utf8');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rodapé</title>
	<meta charset="UTF-8">
	<!-- Font Awesome --> 
    <script defer src="font-awesome/fontawesome-all.js"></script> 
    <!-- Css -->
	<link rel="stylesheet" href="css/footer.css"> 
</head>


<body>
	<footer class="bk-azul">
	   <div id="div-contato">
	      <form method="POST" action="" id="form_contato">

	      	<h3 class="color-white-box"><i class="far fa-envelope"></i> Entre em contato!</h3>

	         <label class="label-cont color-white-box" for="contato-nome">Nome</label>
	         <input type="text" name="contato_nome" id="contato_nome" placeholder="Digite seu nome completo" maxlength="120" required> 


	         <label class="label-cont color-white-box" for="contato-telefone">Telefone</label>
	         <input type="text" name="contato_telefone" id="contato_telefone" maxlength="11" required><br>


	         <label class="label-cont color-white-box" for="contato-email">E-mail</label>
	         <input type="text" name="contato_email" id="contato_email" maxlength="60"> 


	         <label class="label-cont color-white-box" id="Menviada" for="contato-assunto">Assunto</label>
	         <input type="text" name="contato_assunto" id="contato_assunto" maxlength="30" required><br>
 

	         <textarea placeholder="Escreva sua mensagem aqui" name="contato_mensagem" maxlength="600" required></textarea><br>
	         <p>
	         	<span style="margin:10px;padding: 0;" class="color-white" id="resp_contato"></span>
	         	<button type="submit" id="btn-enviar" name="btn-enviar" style="color: #192B35; background: #f7f7f7;">Enviar</button>
	         </p>
	      </form>
	   </div>



	    


	   <div id="div-endereco">
	      <h4 class="margin0 color-white-box"><i class="fas fa-map-marker-alt"></i> Unidade em Mauá</h4>
	      <p class="margin0 color-white-box">Rua das Flores, 152 | Parque Boa Esperança <br> Mauá - São Paulo <br><i class="fas fa-phone"></i> 11 0000-0000</p><br>
	      <h4 class="margin0 color-white-box"><i class="fas fa-map-marker-alt"></i> Unidade em Ribeirão Pires</h4>
	      <p class="margin0 color-white-box">Rua José Fagundes, 3522 | Bairro Pedreira <br> Ribeirão Pires - São Paulo <br><i class="fas fa-phone"></i> 11 0000-0000</p>
	   </div>
</footer>
<p style="text-align: center; font-size: 12px; font-style: italic; padding: 0 0 12px 0; margin: 0;" class="bk-azul color-white">Desenvolvido por Ana Caroline Lisboa Silva | 2018</p> 
</body>
</html>