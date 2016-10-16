<?php
//No placeholders. Susceptible to SQL injection
$stmt = $pdo_dbh->query( "SELECT * FROM BankAccount WHERE username = '{$_POST['username']}' ");

//Unnamed placeholders.
$stmt = $pdo_dbh->prepare( "SELECT * FROM BankAccount WHERE username = ? " );
$stmt->execute( array( $_POST['username'] ) );

//Named placeholders.
$stmt = $pdo_dbh->prepare( "SELECT * FROM BankAccount WHERE username = :user " );
$stmt->bindParam(':user', $_POST['username']); 
$stmt->execute( );