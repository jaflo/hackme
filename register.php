<?php include("header.php");
if (isset($_POST["username"]) && ($_POST["password"] == $_POST["password2"])) {
	// Add new profile to databse
	execSQL("INSERT INTO users (username, password) ".
		"VALUES ('".strtolower($_POST["username"])."', '".sha1($_POST["password"])."')");
}
redirect("");
include("footer.php"); ?>
