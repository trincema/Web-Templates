<?php
	$db_hostname="127.0.0.1:3306";
	$db_username="root";
	$db_password="";
	$database="taskboard";

	function initializeDatabase() {
		$db_hostname="127.0.0.1:3306";
		$db_username="root";
		$db_password="";
		$database="taskboard";


		$connection = mysqli_connect($db_hostname, $db_username, $db_password);
		if(!$connection) {
			echo"Database Connection Error: ".mysqli_connect_error();
		} else {
			$sql = 'CREATE Database IF NOT EXISTS ' . $database;
			$retval = mysqli_query( $connection, $sql );
			if(! $retval ) {
				echo"Could not create database: ".mysqli_connect_error();
			}

			$sql = "CREATE Table IF NOT EXISTS $database.UserRoles (".
				"id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,".
				"user_role VARCHAR(15) NOT NULL)";
			$retval = mysqli_query( $connection, $sql );
			if(! $retval ) {
				echo"Could not create table UserRoles".mysqli_error($connection);
			} else {
				$sql = "SELECT * FROM $database.UserRoles";
				$retval = mysqli_query( $connection, $sql );
				if(! $retval ) {
					echo "Could not create table UserRoles".mysqli_connect_error();
				}
				$count = mysqli_num_rows($retval);
				if($count == 0) {
					$sql = "INSERT INTO $database.UserRoles (user_role) VALUES ('Admin')";
					mysqli_query( $connection, $sql );
					$sql = "INSERT INTO $database.UserRoles (user_role) VALUES ('Technician')";
					mysqli_query( $connection, $sql );
					$sql = "INSERT INTO $database.UserRoles (user_role) VALUES ('Guest')";
					mysqli_query( $connection, $sql );
				}
			}

			$sql = "CREATE Table IF NOT EXISTS $database.Users (".
				"id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,".
				"first_name VARCHAR(20) NOT NULL,".
				"last_name VARCHAR(20) NOT NULL,".
				"email VARCHAR(30) NOT NULL,".
				"password VARCHAR(20) NOT NULL,".
				"user_role VARCHAR(10) NOT NULL,".
				"CONSTRAINT fk_role FOREIGN KEY (user_role) REFERENCES UserRoles(id))";
			$retval = mysqli_query( $connection, $sql );
			if(! $retval ) {
				echo"Could not create table UserRoles".mysqli_error($connection);
			}

		}

		mysqli_close($connection);
	}
