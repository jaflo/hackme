<?php
loadView("start");
global $row;
?>
<h2><?php echo $row["username"]; ?>'s profile</h2>
<div style="margin-bottom:4px">Joined <?php echo ago(strtotime($row["created"])); ?> ago</div>
<?php if ($user["username"] == $row["username"]) { // If this is my profile ?>
<form method="post" action="<?php url("updateprofile.php"); ?>" id="updateprofile">
	Profile-image URL: <input name="username" type="hidden" value="<?php echo $row["username"]; ?>" />
	<input name="profileimage" type="url" value="<?php echo $row["profileimage"]; ?>" />
	<textarea name="about" style="margin-top:4px"><?php echo $row["about"]; ?></textarea>
	Tell others about yourself.<button>Update</button>
</form>
<?php } else { ?>
<div class="inputlike"><?php echo $row["about"]; ?></div>
<?php } ?>
