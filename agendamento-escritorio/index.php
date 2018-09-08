<!DOCTYPE html>
<html>
<head>
	<title>Roberta Sanches | Consultora Financeira Pessoal</title>
	<meta charset="UTF-8">
   <!-- Icon -->
   <link rel="icon" href="imagens/icon.jpg"> 
   <!-- Css --> 
   <link rel="stylesheet" href="css/index.css">
</head>
<body>
	
   <?php include "nav.php"; ?>

	<div id="container">
		<div id="rgba">
			
			<div id="conteudoum" class="color-white">
				<h1>Roberta Sanches, Consultora Financeira Pessoal</h1>
				<h3>A solução para sua vida financeira!</h3>
				<p> Irei te ajudar elaborando um planejamento e controle em sua vida financeira, para aumentar os resultados de suas atividades, sanar suas dívidas e ter melhor qualidade de vida. Você também irá aprender a melhorar seus hábitos de consumo e ter mais controle e conhecimento que irão lhe ajudar no futuro. Agende já a sua consulta!
               </p>
            <?php
               	if(isset($_SESSION['logado'])==false){          
					echo '<button onclick="popLogin()" class="bk-azul-escuro principal">Agendar Consultoria</button>';
				}
				else if (isset($_SESSION['logado'])==true AND $_SESSION['logado']>0){
					echo '<a href="agendamento.php" > <button class="bk-azul-escuro principal">Agendar Consultoria </button></a>';
				}
			?>
				<a href="sobre.php"><button class="bk-azul-escuro principal">Sobre</button></a>
            	<p id="gratis">A primeira consulta é grátis!</p>
			</div>
		</div>
	</div>

   <?php include "rodape.php"; ?>
</body>


</html>