<?php loadView("start"); ?>
<h2>Home</h2>
<form method="post" action="<?php url("post.php"); ?>" id="share">
	<textarea name="content" placeholder="Share something!"></textarea>
	<input name="color" type="text" />
	<button type="submit">Share</button>
</form>
<div id="posts">
<?php
// Get the newest 50 posts
$posts = execSQL("SELECT * FROM posts ORDER BY created DESC LIMIT 50");
if ($posts->num_rows > 0) {
	// Loop through the posts
	while ($post = $posts->fetch_assoc()) {
?>
	<div id="<?php echo $post["id"]; ?>">
		<div class="sideline" style="border-color:<?php echo $post["color"]; ?>"></div>
		<div class="profileimage" style="background-image:url(<?php echo getUser($post["username"])["profileimage"]; ?>)"></div>
		<a href="<?php url("profile.php?u=".$post["username"]); ?>"><?php echo $post["username"]; ?></a>,
		wrote <?php echo ago(strtotime($post["created"])); ?> ago<?php if ($user["username"] == $post["username"]) {
		// If this is my post, offer deletion link ?>
			<a href="<?php url("deletepost.php?post=".$post["id"]); ?>">&times;</a><?php } ?>:
		<div><?php echo $post["content"]; ?></div>
	</div>
<?php
    }
} else {
	echo "No posts";
}
?>
</div>
