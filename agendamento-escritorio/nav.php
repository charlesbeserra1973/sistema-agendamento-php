<?php
	include "php/conexao.php";
	SESSION_START(); 
// acentuação
  mysqli_query($conexao,"SET NAMES 'utf8'");  
  mysqli_query($conexao,'SET character_set_connection=utf8');
  mysqli_query($conexao,'SET character_set_client=utf8');  
  mysqli_query($conexao,'SET character_set_results=utf8');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cabeçalho</title>
	<meta charset="UTF-8">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="ajax.js"></script>
	<!-- Font Awesome --> 
    <script defer src="font-awesome/fontawesome-all.js"></script>
	<!-- Jquery -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Css -->
	<link rel="stylesheet" href="css/nav.css">
</head>
<body>

	<!-- pop up LOGIN e CADASTRO -->
	<div id="pop-logcad">
	    <div class="loginecadastro" id="div-login">
	    	<span class="fechar" onclick="fecharLog()"><i class="fas fa-times"></i></span><br><br>
	    	<form method="post" id="form_login" action="">
	      	<label style="margin-bottom: 6px; margin-top: 13px;">  <i class="fas fa-at"></i> E-mail:</label><br>
	      		<input type="text" name="email_log" required=""><br>
	      	<label style="margin-bottom: 6px; margin-top: 13px;">  <i class="fas fa-lock"></i> Senha:</label><br>
	      		<input type="password" name="senha_log" required=""><br>
	      	<button name="btn-login-entrar" id="btn-login-entrar" class="bk-azul-escuro color-white">Entrar</button><br>
	      	<p id="resp_login" ></p>
	      </form>
	    </div>  




	    <div class="loginecadastro" id="div-cadastro">
	    	<span class="fechar" onclick="fecharCad()"><i class="fas fa-times"></i></span><br><br>
	    	<form method="post" action="" id="form_cadastro">
	    	<label style="margin-bottom: 6px; margin-top: 13px;">  <i class="fas fa-user"></i> Qual seu nome completo?</label><br>
	      		<input type="text" name="nome_cad" required><br>
	      	<label style="margin-bottom: 6px; margin-top: 13px;">  <i class="fas fa-at"></i> Digite seu e-mail:</label><br>
	      		<input type="text" name="email_cad" required><br>
	      	<label style="margin-bottom: 6px; margin-top: 13px;">  <i class="fas fa-lock"></i> Digite a senha:</label><br>
	      		<input type="password" name="senha_cad" required><br>
	      	<label style="margin-bottom: 6px; margin-top: 13px;">  <i class="fas fa-lock"></i> Digite novamente a senha:</label><br>
	      		<input type="password" name="clone_senha_cad" required><br>

	      	<button name="btn-cadastrar" id="btn-cadastrar" class="bk-azul-escuro color-white">Cadastrar</button><br>
	      	<p id="resp_cadastro" > </p>
	      	</form>
	    </div>	
	</div>





	<nav class="color-white bk-azul"> 
		<div id="div-cabecalho-1">
			<a href="index.php" class="link-nav">
				<p id="logo">R.Sanches</p>
			</a>
		</div>

		<div id="div-cabecalho-2">
			<a href="#" class="color-white" onclick="fecharmobile()"><p id="fecharM">fechar</p></a>
			<?php 
			if(isset($_SESSION['logado'])==false){ 
				echo '<a href="#" class="link-nav color-white" onclick="popLogin()"> <span id="login-nav">
						<i class="fas fa-sign-in-alt la icons2"></i>Login
					  </span></a> 

					  <span class="separador"> | </span>';

				echo '<a href="#" class="link-nav color-white" onclick="popCadastrar()"> <span id="cadastro-nav">
						<i class="fas fa-users icons2"></i>Cadastrar-se
					 </span></a>

					  <span class="separador"> | </span>';

				echo '<a href="sobre.php" class="link-nav color-white"> <span id="sobre"> Sobre </a> ';	
			}
			else {
				if ($_SESSION['logado']>0){
				$email_user=$_SESSION['email_user'];
				$cod_dados=$_SESSION['id_login'];
					echo '<a href="agendamento.php" class="link-nav color-white"> <span id="agendamentos-nav" title="'.$email_user.'">
						<i class="far fa-calendar-alt icons2"></i>Meus Agendamentos
					  </span></a> 

					  <span class="separador"> | </span>';
					  
					echo '<form action="php/sair" style="display: inline;">
							<button type="submit" id="button_nav" class="color-white">
							<span id="sair-nav" title="'.$email_user.'"> <i class="fas fa-sign-out-alt icons2"></i>Sair</span>
							</button>
						  </form>

					  <span class="separador"> | </span>';

					echo '<a href="sobre.php" class="link-nav color-white"> <span id="sobre"> Sobre </a> ';
				}
			}
			?>
		</div><!-- div-cabecalho-2 -->
		<div id="div-cabecalho-3">
			<a href="#" class="color-white" onclick="menuM()"><i class="fas fa-bars"></i></a>
		</div>

		 
	</nav>
</body>


<script type="text/javascript">

   		var logcad=document.getElementById("pop-logcad");
   		var poplogin=document.getElementById("div-login");
   		var popcadastro=document.getElementById("div-cadastro");
   		var mobile=document.getElementById("div-cabecalho-2");

    function popLogin(){
   		logcad.style.display="block";
   		poplogin.style.display="block";
    }

    function popCadastrar(){
   		logcad.style.display="block";
   		popcadastro.style.display="block";
    }

    function fecharLog(){
    	logcad.style.display="none";
   		poplogin.style.display="none";
    }

    function fecharCad(){
   		logcad.style.display="none";
   		popcadastro.style.display="none";
    }

    function menuM(){
    	mobile.style.display="block";
    }

    function fecharmobile(){
   		mobile.style.display="none";
   	}
</script>

</html>