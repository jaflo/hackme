<?php

// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "hackthis");
if ($mysqli->connect_errno) {
	die($mysqli->connect_errno.": ".$mysqli->connect_error);
}

// Some info about the website
$sitename = "Social"; // maybe Association or Congregation?
$baseurl = "http://localhost/hackthis/";

// Used to load views
function loadView($name) {
	global $loggedin;
	global $user;
	include("views/".$name.".php");
}

// Runs an SQL query and returns the result (if any)
function execSQL($sql) {
	global $mysqli;
	$query = $mysqli->query($sql);
	if (!$query) {
		die($mysqli->errno.": ".$mysqli->error);
	} else {
		return $query;
	}
}

function url($path, $return = false) {
	global $baseurl;
	if ($return) return $baseurl.$path;
	echo $baseurl.$path;
}

function redirect($page) {
	header("Location: ".url($page, true));
	exit;
}

// Returns an array of user information from username
function getUser($username) {
	$result = execSQL("SELECT * FROM users WHERE username='".strtolower($username)."'");
	$user = array(
		"id" => 0,
		"username" => "",
		"about" => "",
		"profileimage" => "",
	);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$user = array(
				"id" => $row["id"],
				"username" => $row["username"],
				"about" => $row["about"],
				"profileimage" => $row["profileimage"],
			);
		}
	}
	return $user;
}

// Formats a human-readable date difference (from https://css-tricks.com/snippets/php/time-ago-function/)
function ago($tm,$rcs = 0) {
	$cur_tm = time(); $dif = $cur_tm-$tm-60*60*7; // Timezone difference
	$pds = array('second','minute','hour','day','week','month','year','decade');
	$lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
	for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);
	$no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
	if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
	return $x;
}

session_start();

$loggedin = isset($_COOKIE["username"]);
$user = array(
	"id" => 0,
	"username" => "",
);
if ($loggedin) {
	$user = array(
		"id" => $_COOKIE["id"],
		"username" => $_COOKIE["username"],
	);
}

?>
