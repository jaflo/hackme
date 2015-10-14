<?php
loadView("start");
if (isset($_GET["wrong"])) {
	echo '<div class="error">Invalid login</div>';
}
?>
<h2>Welcome</h2>
<p style="margin-top:0">
	A very rudimentary and basic PHP website. Full of bugs and security holes. How many can you find?
	Some filler text to make this look better:
	Customer-focused game changers are becoming company-wide ballpark figure experts.
	Dynamically touching base about leveraging market foci will make us leaders in the wholesale industry leader industry.
</p>
<form method="post" action="<?php url(""); ?>" id="login">
	<div class="loginregistertoggle">Login <span>Signup</span></div>
	<input type="text" name="username" placeholder="Username" />
	<input type="password" name="password" placeholder="Password" />
	<button type="submit">Login</button>
</form>
<form method="post" action="<?php url("register.php"); ?>" id="signup">
	<div class="loginregistertoggle"><span>Login</span> Signup</div>
	<input type="text" name="username" placeholder="Username" />
	<input type="password" name="password" placeholder="Password" />
	<input type="password" name="password2" placeholder="Repeat" />
	<button type="submit">Sign up</button>
</form>
