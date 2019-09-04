<?php

		require("../core/core.php");
		$core = new Core();
		$id_j = $_GET['id_j'];
		$core->hapusJurnal($id_j);
?>