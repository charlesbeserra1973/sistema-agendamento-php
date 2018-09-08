<?php
	include "../php/conexao.php";
	// acentuação
    mysqli_query($conexao,"SET NAMES 'utf8'");  
    mysqli_query($conexao,'SET character_set_connection=utf8');
    mysqli_query($conexao,'SET character_set_client=utf8');
    mysqli_query($conexao,'SET character_set_results=utf8');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Back End</title>
	<meta charset="UTF-8">
	<!-- Icon -->
	<link rel="icon" href="../imagens/icon.jpg">
	<!-- Font Awesome -->
    <script defer src="../font-awesome/fontawesome-all.js"></script>
    <!-- Jquery -->
    <script type="text/javascript" src="jquery.min.js"></script>
    <!-- Css -->
	<link rel="stylesheet" href="style.css">

</head>

<body>
	<div id="container">
		
		<div id="menu" class="box-shadow tab">
			<a href="#" class="tablinks" onclick="tabs(event, 'div-notifica')" id="btn-maua"> <p class="li">Notificações <i class="fas fa-sign-out-alt icons"></i></p> </a>
			<a href="#" class="tablinks" onclick="tabs(event, 'div-maua')" id="btn-maua"> <p class="li">Agendamentos em Mauá <i class="fas fa-sign-out-alt icons"></i></p> </a>
			<a href="#" class="tablinks" onclick="tabs(event, 'div-ribeirao')" id="btn-ribeirao"> <p class="li">Agendamentos em Ribeirão Pires <i class="fas fa-sign-out-alt icons"></i></p> </a>
			<a href="#" class="tablinks" onclick="tabs(event, 'div-mensagem')" id="btn-mensagem"> <p class="li">Mensagens <i class="fas fa-sign-out-alt icons"></i></p> </a>
			<a href="../index.php" id="btn-mensagem"> <p class="li">Front-end: Roberta Sanches <i class="fas fa-sign-out-alt icons"></i></p> </a>
			<p style="text-align: center; font-size: 12px; font-style: italic;">Desenvolvido por Ana Caroline Lisboa Silva | 2018</p> 
		</div>

		<!-- _______________________________________________ -->

		<div id="principal" class="box-shadow divs"> 


			<div id="div-notifica" class="tabcontent">
				<?php
					$sel_noti=mysqli_query($conexao,"SELECT * FROM tb_notificacoes order by id_notifica desc"); 
 
				if ($sel_noti->num_rows>0) {
					while($row_noti=mysqli_fetch_array($sel_noti)){ 
						$id_noti=$row_noti['id_notifica'];
						$status=$row_noti['status_notifica'];
				 ?><form method='get' action='visualizar_not.php' >
					<p class='card card-noti'>
						<span style='margin-right:23px; font-style:italic;'> <?php echo date('d/m/Y', strtotime($row_noti['data_notifica'])) ?> </span> 
						<span> <?php echo $row_noti['texto_notifica'] ?> </span>
						<span style='float:right;'>
							<?php
							if ($status=="Não visualizado") {
								echo '<input type="hidden" name="id_noti" value="'.$id_noti.'">'; 
								echo '<button id="btn-visualizar" type="submit" title="Marcar como visualizado."><i class="fas fa-eye"></i></button>';
							} ?>														
						</span>
					</p>
				   </form>
				 <?php
					} // while
				}  //if
				else{ echo "<h2 class='inexistente'> Não há nenhuma notificação!</h2>";}
				?>
			</div>




			<div id="div-maua" class="tabcontent">
				<?php
					$pes="SELECT * FROM tb_agendamento INNER JOIN tb_dadoscliente ON (tb_agendamento.cod_dadosC=tb_dadoscliente.cod_dadosC) WHERE local_agenda ='Mauá - SP' order by id_agenda desc";
					$sel_maua=mysqli_query($conexao,$pes);
 
				if ($sel_maua->num_rows>0) {
					while($row_maua=mysqli_fetch_array($sel_maua)){ 
						$id_maua=$row_maua['id_agenda'];
						$status_maua=$row_maua['status_agenda'];	?>
					<div class="card cardmaua">
						<p style="font-size: 12px;"> agendado em <?php echo date('d/m/Y', strtotime($row_maua['dt_agenda'])); ?> </p>
						<h3 class="frase">Escritório: <?php echo $row_maua['local_agenda']; ?></h3>
		                <h4 class="espaco"><?php echo date('d/m/Y', strtotime($row_maua['data_agenda'])).' - '. $row_maua['horario_agenda'] .' - '.$status_maua; ?> </h4> 
		                <p class="frase"><span class="destaque">RG:</span> <?php echo $row_maua['rg_dadosC']; ?> </p>
		                <p class="frase"><span class="destaque">Nome:</span> <?php echo $row_maua['nome_dadosC']; ?> </p>
		                <p class="frase"><span class="destaque">Telefone:</span> <?php echo $row_maua['telefone_dadosC']; ?> </p>
		                <p class="frase"><span class="destaque">Data de Nascimento:</span> <?php echo $row_maua['dt_nasc_dadosC']; ?> </p>
						<?php   
	                    if($status_maua=="Agendado") { 
	                      echo '<form method="post" action="cancelEfinalizar.php">
	                              <input type="hidden" name="id_agenda" value='.$id_maua.'>
	                              <input type="submit" name="btn_agenda" class="excluir bk-vermelho" value="Cancelar Consultoria">
	                              <input type="submit" name="btn_agenda" class="excluir bk-laranja" value="Consultoria Finalizada">
	                              <br>
	                            </form>';
	                    }  
	                    ?>
					</div>
				<?php
					} // while
				}  //if
				else{ echo "<h2 class='inexistente'> Não há nenhum agendamento em Mauá!</h2>";}
				?>
			</div>




 


			<div id="div-ribeirao" class="tabcontent">
				<?php
					$pes_ribeirao="SELECT * FROM tb_agendamento INNER JOIN tb_dadoscliente ON (tb_agendamento.cod_dadosC=tb_dadoscliente.cod_dadosC) WHERE local_agenda ='Ribeirão Pires - SP' order by id_agenda desc";
					$sel_ribeirao=mysqli_query($conexao,$pes_ribeirao);
					 
				if ($sel_ribeirao->num_rows>0) {
					while($row_ribeirao=mysqli_fetch_array($sel_ribeirao)){ 
						$id_ribeirao=$row_ribeirao['id_agenda'];
						$status_ribeirao=$row_ribeirao['status_agenda'];
				?>
					<div class="card cardrib">
						<p style="font-size: 12px;"> agendado em <?php echo date('d/m/Y', strtotime($row_ribeirao['dt_agenda'])); ?> </p>
						 <h3 class="frase">Escritório: <?php echo $row_ribeirao['local_agenda']; ?></h3>
		                 <h4 class="espaco"><?php echo date('d/m/Y', strtotime($row_ribeirao['data_agenda'])).' - '. $row_ribeirao['horario_agenda'] .' - '.$status_ribeirao; ?> </h4> 
		                 <p class="frase"><span class="destaque">RG:</span> <?php echo $row_ribeirao['rg_dadosC']; ?> </p>
		                 <p class="frase"><span class="destaque">Nome:</span> <?php echo $row_ribeirao['nome_dadosC']; ?> </p>
		                 <p class="frase"><span class="destaque">Telefone:</span> <?php echo $row_ribeirao['telefone_dadosC']; ?> </p>
		                 <p class="frase"><span class="destaque">Data de Nascimento:</span> <?php echo $row_ribeirao['dt_nasc_dadosC']; ?> </p>
						<?php   
	                    if($status_ribeirao=="Agendado") { 
	                      echo '<form method="post" action="cancelEfinalizar.php">
	                              <input type="hidden" name="id_agenda" value='.$id_ribeirao.'>
	                              <input type="submit" name="btn_agenda" class="excluir bk-vermelho" value="Cancelar Consultoria">
	                              <input type="submit" name="btn_agenda" class="excluir bk-laranja" value="Consultoria Finalizada">
	                              <br>
	                            </form>';
	                    } 
	                    ?>
					</div>
				<?php
					} // while
				}  //if
				else{ echo "<h2 class='inexistente'> Não há nenhum agendamento em Ribeirão Pires!</h2>"; }
				?>
			</div>







			<div id="div-mensagem" class="tabcontent">
				<p style="padding: 0 30px; font-size: 20px; color: gray;"><b> Mensagens</b><!--  <span style="float: right; font-size: 15px;">Excluir todas <input type="checkbox" name=""></span> --></p>
				<?php
					$sel_cont=mysqli_query($conexao,'select * from tb_contato order by 	id_contato desc');

				if ($sel_cont->num_rows>0) {
					while($row_cont=mysqli_fetch_array($sel_cont)){ 
						$id_contato=$row_cont['id_contato'];
				?>
					<div class="card">
						<p style="font-size: 12px;"> enviada em <?php echo date('d/m/Y', strtotime($row_cont['data_contato'])); ?> </p>
						<h3 class="frase">Nome: <i><?php echo $row_cont['nome_contato']; ?></i> 
							<form method='post' action='deletar.php' onsubmit="return confirm('Realmente deseja apagar esta mensagem?')">
								<input type='hidden' name='id_contato' value=<?php  echo "$id_contato";?> >
								<!-- <input type="checkbox" name="" style="float: right;"> -->
								<input type='submit' name='del_mensagem' class='excluir bk-vermelho' value='Excluir Mensagem'>
							</form>
						</h3>
						<h4 class="espaco">Assunto: <i><?php echo $row_cont['assunto_contato']; ?></i> </h4> 
						<p class="frase">Telefone: <i><?php echo $row_cont['telefone_contato']; ?></i> </p>
						<p class="frase">E-mail: <i><?php echo $row_cont['email_contato']; ?></i> </p>
						<p class="frase">Mensagem: <i><?php echo $row_cont['mensagem_contato']; ?></i> </p>
					</div>
				<?php
					} // while
				}  //if
				else{ echo "<h2 class='inexistente'> Não há nenhuma mensagem!</h2>"; }
				?>
			</div><!-- mensagem -->




		</div><!-- principal -->
	</div><!-- container -->



<script>
function tabs(evt, div) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    } //adiciona o display none em cada div com a class tabcontent, uma a uma
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(div).style.display = "block";
    evt.currentTarget.className += " active";
}

</script>
</body>
</html>