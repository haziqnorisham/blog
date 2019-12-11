<?php
	session_start();
	if( $_POST["post_id"]) {
		include_once("pdo.php");

		
		$sql = "DELETE FROM posts WHERE posts.post_id = ?";
		$stmt= $pdo->prepare($sql);
		$stmt->execute([$_POST["post_id"]]);
	}
	#header("Location: http://localhost/blog");
	header("Location: /blog");
?>