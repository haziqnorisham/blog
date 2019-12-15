<?php
	session_start();

	if(isset( $_SESSION['user_id'])){
		echo "user_id = ".$_SESSION['user_id'];
	}

	if(isset( $_SESSION['flash'])){
	  echo $_SESSION['flash'];
	  unset($_SESSION['flash']);
	}

	include_once("pdo.php");
	$stmt = $pdo->query("SELECT posts.post_id, posts.title, posts.pub_date, posts.body, users.name, users.user_id FROM posts inner join users on posts.user_id = users.user_id");
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			table {			  
			  border-style: double;
			  margin-bottom: 10px;
			}

			.post {
			  width: 100%;
			  border-style: double;
			  margin-bottom: 10px;
			}

			.post_body {
			  text-align: center;
			  border-top: 1px solid #ddd;
			  font-family: "century gothic";
			}

			.post_buttons {
			  text-align: center;
			}

			.new_post {
			  width: 100%;
			  border-style: double;
			  margin-bottom: 10px;
			  text-align: center;
			}


		</style>
	</head>	

	<body>
		<table>
			<tr>
				<td><a href="index.php">Home</a></td>
				<?php
					if(isset( $_SESSION['user_id'])){
						echo '
							<td><a href="logout.php">Logout</a></td>							
							';
					}
					else{
						echo '<td><a href="login.php">Login</a></td><td><a href="register.php">Register</a></td>';
					}
				?>		
							
			</tr>
		</table>

		<?php
		if(isset( $_SESSION['user_id'])){
		echo '
	
		<table class="new_post">
			<tr>
				<td>
				<form action="new_post.php" method="post" id="add_post">
			      Title:<br>
			      <input type="text" name="title">
			      <br>
			      Content:<br>
			      <textarea name="body" form="add_post">Enter text here...</textarea>
			      <br><br>
			      <input type="submit" value="Create New Post">
			    </form> 
			    </td>
		    </tr>
	    </table>';}?>
		<?php
			$x = 0;
			while ( $x < count($rows)) {
		?>
		<table class="post">
			<tr><th><?= $rows[$x]["title"]?></th></tr>
			<tr><th>By : <?= $rows[$x]["name"]?></th></tr>
			<tr><th><?= $rows[$x]["pub_date"]?></th></tr>
			<tr>
				<td class="post_body">
					<?= $rows[$x]["body"]?>
				</td>
			</tr>
			<?php
				if(isset( $_SESSION['user_id']) && ($_SESSION["user_id"] == $rows[$x]["user_id"])){
					echo (' 
			<tr>
				<td class="post_buttons">
					<form action="delete_post.php" method="post">
					<input type="hidden" name="post_id" value= '.$rows[$x]["post_id"].' >
					<input type="submit" value="Delete Post" name="delete">
					</form>
				</td>
			</tr>');}
			?>

		</table>
		
		<?php
			$x++;
			}
		?>
	</body>

</html>