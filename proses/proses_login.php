<?php

	require("../core/core.php");
		$username = $_POST['username'];
		$password = $_POST['password'];
		$core = new Core();
		$core->login($username, $password);
?>
