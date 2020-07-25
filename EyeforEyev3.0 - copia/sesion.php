<?php
	session_start();

	if (!$_SESSION["activo"]) {
		header("Location:index.php?sal=si");
	}
?>