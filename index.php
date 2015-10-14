<?php include("header.php");
if ($loggedin) {
	if (isset($_GET["logout"])) {
		// Delete session, remove cookies to logout
		// http://php.net/manual/en/function.session-destroy.php
		setcookie("id", "", time() - 42000);
		setcookie("username", "", time() - 42000);
		setcookie(session_name(), "", time() - 42000);
		session_destroy();
		redirect("");
	}
	loadView("home");
} else {
	if (isset($_POST["username"]) && isset($_POST["password"])) {
		// Check if user with given credentials exists
		$result = execSQL("SELECT * FROM users WHERE username='".strtolower($_POST["username"]).
			"' AND password='".sha1($_POST["password"])."'");
		if ($result->num_rows > 0) {
			// Correct username and password
			while ($row = $result->fetch_assoc()) {
				$expire = 60*60*12; // Cookies expire in 12 hours
				setcookie("id", $row["id"], time() + $expire);
				setcookie("username", $row["username"], time() + $expire);
			}
			redirect("");
		} else {
			redirect("?wrong");
		}
	} else {
		loadView("welcome");
	}
}
include("footer.php"); ?>
