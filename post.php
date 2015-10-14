<?php include("header.php");
if ($loggedin) {
	if (isset($_POST["color"]) && isset($_POST["content"])) {
		// Save post to database
		$result = execSQL("INSERT INTO posts (username, content, color) ".
			"VALUES ('".strtolower($user["username"])."', '".$_POST["content"]."', '".$_POST["color"]."')");
	}
	redirect("");
}
include("footer.php"); ?>
