<?php
	 SESSION_START();
   $_SESSION['logado']=0;
   session_destroy();
   header("location: ../index.php");
   exit;
?>