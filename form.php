<?php

	if ( !empty( $_POST['firstname'] ) ) {
		$firstname = htmlspecialchars($_POST['firstname']);
	}

	if ( !empty( $_POST['lastname'] ) ) {
		$lastname = htmlspecialchars($_POST['lastname']);
	}
?>
<!DOCTYPE html>
<html>
	<body>
		<form action="form.php" method="POST">
			<p>First Name: <input name="firstname" /></p>
			<p>Last Name: <input name="lastname" /></p>
			<p><input type="submit" value="Submit" /></p>
		</form>

		<?php 
			if ( !empty( $firstname ) && !empty( $lastname ) ) {
				print "<p><b>Hello $firstname $lastname!</b></p>";
			}
		?>
	</body>
<html>