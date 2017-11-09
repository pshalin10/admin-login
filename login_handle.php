<?php 

	$page_title = 'Kean Career Services';
	include ('includes/header.html');
	include ('includes/db_config.php');

	// Add the POST data to initial cookies.
	error_reporting(E_ALL | E_STRICT);

	// Verify user.
	$query = sprintf("SELECT * FROM Consultants WHERE UPPER(username) = '%s'", strtoupper($_POST['login_username']));
	$result = mysqli_query($conex, $query);

	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			// Verify username and password.
			$query = sprintf("SELECT id, username, password FROM Consultants WHERE UPPER(username) = '%s' AND password = '%s'", strtoupper($_POST['login_username']), $_POST['login_password']);
			$result = mysqli_query($conex, $query);

			if ($result) {
				if (mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_array($result);
					session_start();
					$_SESSION["user_id"] = $row[0];
					setcookie("logged_in", TRUE, time() + 86400); // Logged in
					header("Location: staff.php");
				} else {
					echo "<p class='error'>User \"" . $_POST['login_username'] . "\" exists but password does not match.</p>";
					echo "<br><a href='staff.php'>TRY AGAIN</a>";
				}
			} else {
				echo "<p class='error'>Problem trying to login: " . mysqli_error();
				echo "<br>Contact Administrator!</p>";
				echo "<br><a href='staff.php'>TRY AGAIN</a>";
			}
		} else {
			echo "<p class='error'>User \"" . $_POST['login_username'] . "\" does not exist in the database.</p>";
			echo "<br><a href='staff.php'>TRY AGAIN</a>";
		}
	} else {
		echo "<p class='error'>Problem trying to login: " . mysqli_error();
		echo "<br>Contact Administrator!</p>";
		echo "<br><a href='staff.php'>TRY AGAIN</a>";
	}

	// Free resources.
	mysqli_free_result($result);
	mysqli_close($conex);

	include ('includes/footer.html');
?>
