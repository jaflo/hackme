<?php include("header.php");
if ($loggedin) {
	if (isset($_GET["u"])) {
		// Find given profile in database
		$result = execSQL("SELECT * FROM users WHERE username='".$_GET["u"]."'");
		if ($result->num_rows > 0) {
			// Return profile page
			$row = $result->fetch_assoc();
			loadView("profile");
		} else {
			redirect("profile.php?u=".$user["username"]);
		}
	} else {
		redirect("profile.php?u=".$user["username"]);
	}
} else {
	redirect("");
}
include("footer.php"); ?>
