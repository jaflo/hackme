<html>
<head>
<title><?php global $sitename; echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="<?php url("style.css"); ?>">
</head>
<body>
<header>
	<h1><a href="<?php url(""); ?>"><?php echo $sitename; ?></a></h1>
	<?php if ($loggedin) { ?>
	<div class="right">
		<a href="<?php url("profile.php?u=".$user["username"]); ?>"><?php echo $user["username"]; ?></a>
		<a href="<?php url("?logout"); ?>">Log out</a>
	</div>
	<?php } ?>
</header>
<main>
