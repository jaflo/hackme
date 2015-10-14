<?php include("header.php");
if ($loggedin) {
	if (isset($_POST["username"]) && isset($_POST["about"])) {
		// Modify existing profile
		$result = execSQL("UPDATE users SET about='".$_POST["about"]."', profileimage='".$_POST["profileimage"].
			"' WHERE username='".strtolower($_POST["username"])."'");
		redirect("profile.php?u=".$_POST["username"]);
	} else {
		redirect("");
	}
}
include("footer.php"); ?>
