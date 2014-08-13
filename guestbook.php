<?php

	// This sets up our connection to the MySQL server
	$db = mysqli_connect( 'localhost', 'root', 'root' );
	mysqli_select_db( $db, 'ga' );

	// These line make the raw user form input safe to insert into MySQL.
	// Note the if(...) statements mean it only executes if the relevant
	// keys exist in the $_POST array
	if ( !empty( $_POST['firstname'] ) ) {
		$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
	}

	if ( !empty( $_POST['lastname'] ) ) {
		$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
	}

	if ( !empty( $_POST['comment'] ) ) {
		$comment = mysqli_real_escape_string($db, $_POST['comment']);
	}
?>
<!DOCTYPE html>
<html>
	<body>
		<!-- This is the HTML code to render the form. -->
		<form action="guestbook.php" method="POST">
			<p><b>Please sign the guest book</b></p>
			<p>First Name: <input name="firstname" /></p>
			<p>Last Name: <input name="lastname" /></p>
			<p>Comment: <input name="comment" /></p>
			<p><input type="submit" value="Submit" /></p>
		</form>

		<?php 
			// This inserts data into MySQL if the variables were set above.
			if ( !empty( $firstname ) && !empty( $lastname ) && !empty( $comment ) ) {
				$sql = "INSERT INTO mytable (firstname, lastname, comment) VALUES ('$firstname', '$lastname', '$comment')";
				mysqli_query( $db, $sql );
				$safe_firstname = htmlspecialchars( $_POST['firstname'] );
				echo "<p>Thanks for signing, $safe_firstname!</p>";
			}

			// Fetch all rows form the table and print them.
			$sql = "SELECT * FROM mytable";
			$result = mysqli_query( $db, $sql );
			// Loop over the result set.
			while ( $data = mysqli_fetch_assoc( $result ) ) {
				print "<p>" . $data['firstname'] . ' ' . $data['lastname'] . ' says ' . $data['comment'] . "</p>";
			}
		?>
	</body>
<html>