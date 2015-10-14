<?php include("header.php");
if ($loggedin) {
	if (isset($_GET["post"])) {
		$result = execSQL("DELETE FROM posts WHERE id='".$_GET["post"]."'");
	}
	redirect("");
}
include("footer.php"); ?>
