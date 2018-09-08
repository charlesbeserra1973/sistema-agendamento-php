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
	<title>Agendamento | R.Sanches</title>
  <meta charset="UTF-8">
   <!-- Icon -->
   <link rel="icon" href="imagens/icon.jpg"> 
	 <!-- Font Awesome -->
   <script defer src="font-awesome/fontawesome-all.js"></script> 
   <!-- Css --> 
   <link rel="stylesheet" href="css/agendamento.css">
   <!-- Jquery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>


  <script type="text/javascript">
    function dataEhora(){
      var data_consulta=document.getElementById("data_consulta").value;
      var local_consulta=document.getElementById("local_consulta").value;
      var resp_consulta=document.getElementById("resp_consulta").value;
      
      if (data_consulta && local_consulta && resp_consulta !="") {
        document.getElementById("dt_a").value=data_consulta;
        document.getElementById("hr_a").value=resp_consulta;
        document.getElementById("loc_a").value=local_consulta;
      }
    }
  </script>
</head>

<body>
	
   <?php include "nav.php";
    ?>

	<div id="container-agen">
		<div id="rgba">


      <?php
        if(isset($_SESSION['logado'])==true AND $_SESSION['logado']>0){
          $busca=mysqli_query($conexao,"SELECT * FROM  tb_dadoscliente WHERE cod_dadosC=$cod_dados");
          $row_busca=mysqli_fetch_array($busca);
          $nome_dadosC=$row_busca['nome_dadosC'];
          $telefone_dadosC=$row_busca['telefone_dadosC'];
          $rg_dadosC=$row_busca['rg_dadosC'];
      ?>



      <div id="container-a">
        <div id="div-ag" class="bk-azul-escuro box-s">
          <h2 class="color-white"><i class="far fa-calendar-alt" style="margin-right: 6px; font-size: 24px;"></i> Agendamento</h2>

  		    <div id="agendamento" class="box-s">

            <form id="form_dados" method="post" action="">
              <div> <!-- inline/dois inputs na mesma linha -->
                <div style="width: 60%; float: left;">
                  <label>Nome Completo</label><br>
                    <?php echo '<input type="text" name="nome_dados" maxlength="120" value="'.$row_busca['nome_dadosC'].'"  required style="width: 170px;" ><br>'; ?>
                </div>
                <div style="width: 40%; float: left;">
                  <label>Telefone</label><br>
                    <?php echo '<input type="text" name="telefone_dados" maxlength="11" value="'.$row_busca['telefone_dadosC'].'"  required style="width: 110px;"><br>'; ?>
                </div>
              </div> 

              <div> <!-- inline/dois inputs na mesma linha -->
                <div style="width: 50%; float: left;">
                  <label>RG</label><br>
                    <?php echo '<input type="text" name="rg_dados" maxlength="9" value="'.$row_busca['rg_dadosC']. '" required style="width: 110px;"> '; ?>
                </div>
                <div style="width: 50%; float: left;">
                  <label>Data de Nascimento</label><br>
                    <?php echo '<input type="date" name="data_nasc_dados" value="'.$row_busca["dt_nasc_dadosC"].'" required style="width: 125px; padding: 4px;">' ; ?>
                </div>
              </div>
              <button type="submit" id="ad_local" class="bk-azul-escuro color-white"> Atualizar Dados </button>
            </form>




              <br style="clear: both;">
              <hr style="margin: 9px 0;">




              <form id="form_consulta" method="post" action=""> 
                <label>Data e Local</label><br>
                  <p style="margin: 0;"> 
                    <select id="local_consulta" name="local_consulta">
                      <option>Mauá - SP</option>
                      <option>Ribeirão Pires - SP</option>
                    </select>
                    <input type="date" id="data_consulta" name="data_consulta" required> 
                  </p>

                  <p style="margin: 0;">                   
                    <input type="submit" value="Gerar Horários" id="gerarhr"> <!-- gera o horario através do php e volta a resposta pelo ajax -->
                    <select id="resp_consulta" style="width: 90px; padding: 6px;"> <!-- recebe options pelo php --> </select>
                  </p> 
                <button type="button" onclick="dataEhora()" id="ad_local" class="bk-azul-escuro color-white"> Adicionar Local e Data </button>
              </form>

              <form id="form_agendamento" method="post" action="" style="clear: both;">
                <!-- exibe data e horario escolhido -->
                <p style="margin: 0;"> 
                  <input type="text" style="width: 67px; margin: 5px 0;" id="dt_a" name="data_agenda" readonly>  
                  <input type="text" style="width: 33px; margin: 5px 0;" id="hr_a" name="horario_agenda" readonly>  
                  <input type="text" style="width: 113px; margin: 5px 0;" id="loc_a" name="local_agenda" readonly>
                </p>
                <hr style="margin: 0;">
                <button type="submit" id="agendar" class="bk-azul-escuro color-white"> Agendar Consultoria </button>
                <br style="clear: both;"> 
                <p id="resp_agenda">  </p> <!-- recebe resposta no php, via ajax -->
              </form>
            </div><!-- agendamento -->
        </div><!-- div-ag -->



        <!-- _________________________________________________________________________________________________________ -->




        <div id="div-todos" class="box-s bk-azul-escuro ">
          <h3 style="margin: 7px;" class="color-white">Meus Agendamentos</h3>
          <?php 
            $sel_agenda=mysqli_query($conexao,"SELECT * FROM tb_agendamento INNER JOIN tb_dadoscliente ON (tb_agendamento.cod_dadosC=tb_dadoscliente.cod_dadosC) where tb_dadoscliente.login_dadosC='$email_user' order by tb_agendamento.id_agenda desc");  

          if ($sel_agenda->num_rows>0) {
            while($row_agenda=mysqli_fetch_array($sel_agenda)){ 
              $id_agenda=$row_agenda['id_agenda'];
              $status=$row_agenda['status_agenda'];
              ?>

              <div class="card">
                 <p style="font-size: 16px;" class="frase destaque">Escritório: <?php echo $row_agenda['local_agenda'].' - <span id="cor">'. $status .'</span>'; ?></p>
                 <p class="espaco destaque font15"><?php echo date('d/m/Y', strtotime($row_agenda['data_agenda'])).' - '.$row_agenda['horario_agenda']; ?> </p> 
                 <p class="frase font15"><span class="destaque">RG:</span> <?php echo $row_agenda['rg_dadosC']; ?> </p>
                 <p class="frase font15"><span class="destaque">Nome:</span> <?php echo $row_agenda['nome_dadosC']; ?> </p>
                 <p class="frase font15"><span class="destaque">Telefone:</span> <?php echo $row_agenda['telefone_dadosC']; ?> </p>
                 <p class="frase font15"><span class="destaque">Data de Nascimento:</span> <?php echo date('d/m/Y', strtotime($row_agenda['dt_nasc_dadosC'])); ?> </p>
                  <?php   
                    if($status=="Agendado") {
                  ?>
                    <form method="post" action="" id="form_cancel" onsubmit='return confirm("Realmente deseja cancelar o agendamento?")'>
                      <input type="hidden" name="id_agenda" value=<?php echo $id_agenda?> />
                      <input type="submit" name="del_mensagem" class="cancel_cons" value="Cancelar Consultoria">
                    </form> 
                  <?php
                    } //if($status=="Agendado")
                  ?>
              </div><!-- card -->

          <?php
            } // fecha o while mysqli_fetch_array
          } // fecha o if num_rows
          else{
            echo "<h2 class='inexistente'> Não há nenhum agendamento!</h2>";
          }   ?>
        </div><!--  div-todos -->
      </div><!-- container-a -->

      <?php
        } //se o usuário estiver logado
        else{
          echo "<div id='restrito' class='bk-azul color-white'>";
          echo '<i class="fas fa-ban" style="font-size:50px;"></i><br><br>';
          echo "<h1 style='margin:0;'>É necessário estar logado para acessar esta página!</h1><br>";
          echo "<h3 style='margin:0;'> <a href='index.php' class='color-white'>Ir para tela inicial</a></h3>";
          echo "</div>";
        }

      ?>
    </div><!-- rgba -->
	</div><!-- container-agen -->

<!-- 
#008B00
#8B0000
#EE7600 
-->

  <?php include "rodape.php"; ?>
</body>