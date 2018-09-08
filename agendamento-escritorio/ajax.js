
$(document).ready(function(){
	$('#form_contato').submit(function(){
		var form = $(this).serialize();
		$.ajax({
			url:"php/contato.php",
			method:"POST",
			type:"POST",
			data:form, 
			success: function(return_contato) {
				// Imprime a resposta dentro da de id=div1
				$( "#resp_contato" ).html( return_contato );
				$('#form_contato')[0].reset();
			},
			error: function() {
				alert("Erro ao encontrar arquivo.");
			}
		});
		return false;
	});




	$('#form_cadastro').submit(function(){
		var form2 = $(this).serialize();
		$.ajax({
			url:"php/cadastro.php",
			method:"POST",
			type:"POST",
			data:form2, 
			success: function(return_cadastro) { 
				$( '#resp_cadastro' ).html(return_cadastro);
			},
			error: function() {
				alert("Erro ao encontrar arquivo.");
			}
		});
		return false;
	});





	$('#form_login').submit(function(){
		var form3 = $(this).serialize();
		$.ajax({
			url:"php/login.php",
			method:"POST",
			type:"POST",
			data:form3, 
			success: function(return_login) { 
				$( '#resp_login' ).html(return_login);
			},
			error: function() {
				alert("Erro ao achar caminho do arquivo");
			}
		});
		return false;
	});




	$('#form_consulta').submit(function(){
		var form4 = $(this).serialize();
		$.ajax({
			url:"php/consulta_horario.php",
			method:"POST",
			type:"POST",
			data:form4, 
			success: function(return_consulta) { 
				$( "#resp_consulta" ).html( return_consulta );
			},
			error: function() {
				alert("Erro ao achar caminho do arquivo");
			}
		});
		return false;
	});



	$('#form_dados').submit(function(){
		var form5 = $(this).serialize();
		$.ajax({
			url:"php/update_dados.php",
			method:"POST",
			type:"POST",
			data:form5, 
			success: function(return_dados) { 
				$( "#resp_agenda" ).html( return_dados );
			},
			error: function() {
				alert("Erro ao achar caminho do arquivo");
			}
		});
		return false;
	});



	$('#form_cancel').submit(function(){
		var form6 = $(this).serialize();
		$.ajax({
			url:"php/cancel_agenda.php",
			method:"POST",
			type:"POST",
			data:form6, 
			success: function(return_cancel) {
				alert( return_cancel )
			},
			error: function() {
				alert("Erro ao achar caminho do arquivo");
			}
		});
		return false;
	});



	$('#form_agendamento').submit(function(){
		var form7 = $(this).serialize();
		$.ajax({
			url:"php/insert_agenda.php",
			method:"POST",
			type:"POST",
			data:form7, 
			success: function(return_agendame) { 
				$( "#resp_agenda" ).html( return_agendame );				
				$( "#form_agendamento" )[0].reset(); 
				setTimeout(function(){ $(location).attr('href', 'agendamento.php'); }, 10000);
			},
			error: function() {
				alert("Erro ao achar caminho do arquivo");
			}
		});
		return false;
	});

});