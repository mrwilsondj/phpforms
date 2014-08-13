<?php

$db = mysqli_connect( 'localhost', 'root', 'root' );
mysqli_select_db( $db, 'ga' );

// Inserting a record
$sql = "INSERT INTO mytable (firstname, lastname, comment) VALUES ('John', 'Doe', 'Hello')";
mysqli_query( $db, $sql );

$sql = "INSERT INTO mytable (firstname, lastname, comment) VALUES ('Jane', 'Doe', 'Good-bye')";
mysqli_query( $db, $sql );



// Retrieving a record

$sql = "SELECT * FROM mytable WHERE lastname='Doe'";
$result = mysqli_query( $db, $sql );

while ( $data = mysqli_fetch_assoc( $result ) ) {
	print "<p>" . $data['firstname'] . ' ' . $data['lastname'] . ' says ' . $data['comment'] . "</p>";
}