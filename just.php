#!/usr/bin/php
<?php

	include 'database.php';

	//echo $DB_DSN1;
	//echo $DB_DSN2;
	//echo $DB_USER;
	//echo $DB_PASSWORD;

	try
	{
		$db = new PDO($DB_DSN1, $DB_USER, $DB_PASSWORD);

		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$database = "CREATE DATABASE `example`";

		$db->exec($database);

		echo "Database created successfully\n";
	} catch (PDOException $e) {
        echo "ERROR CREATING DB: \n".$e->getMessage()."\nAborting process\n";
        exit(-1);
    }

	try
	{
		$db = new PDO($DB_DSN2, $DB_USER, $DB_PASSWORD);

		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$table = "CREATE TABLE `user` (`user_id` INT(11) NOT NULL AUTO_INCREMENT, `first_name` varchar(255) NOT NULL, `last_name` varchar(255) NOT NULL, `user_name` varchar(255) NOT NULL, `email` varchar(255) NOT NULL, `password` varchar(255) NOT NULL, `code` INT(11) NOT NULL, `active` INT(11) NOT NULL DEFAULT '0', `notif` INT(11) NOT NULL DEFAULT '1', PRIMARY KEY (user_id))";

		$db->exec($table);

		echo "Table created successfully\n";
	} catch (PDOException $e) {
        echo "ERROR CREATING DB: \n".$e->getMessage()."\nAborting process\n";
        exit(-1);
    }
    try
	{
		$db = new PDO($DB_DSN2, $DB_USER, $DB_PASSWORD);

		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$table = "CREATE TABLE `images` (`image_id` INT(11) NOT NULL AUTO_INCREMENT, `image_name` varchar(255) NOT NULL, `user_name` varchar(255) NOT NULL, `text` varchar(255) NOT NULL, `creation_date` datetime, primary key (image_id))";

		$db->exec($table);

		echo "Table created successfully\n";
	} catch (PDOException $e) {
        echo "ERROR CREATING DB: \n".$e->getMessage()."\nAborting process\n";
        exit(-1);
    }
    try
	{
		$db = new PDO($DB_DSN2, $DB_USER, $DB_PASSWORD);

		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$table = "CREATE TABLE `likes` (`like_id` INT(11) NOT NULL AUTO_INCREMENT, image_id INT(11) NOT NULL, `user_name` varchar(255) NOT NULL, PRIMARY KEY (like_id))";

		$db->exec($table);

		echo "Table created successfully\n";
	} catch (PDOException $e) {
        echo "ERROR CREATING DB: \n".$e->getMessage()."\nAborting process\n";
        exit(-1);
    }
    try
	{
		$db = new PDO($DB_DSN2, $DB_USER, $DB_PASSWORD);

		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$table = "CREATE TABLE `comments` (`comment_id` INT(11) NOT NULL AUTO_INCREMENT, image_id INT(11) NOT NULL, `comment` varchar(255) NOT NULL, `user_name` varchar(255) NOT NULL, PRIMARY KEY (comment_id))";

		$db->exec($table);

		echo "Table created successfully\n";
		header("Location: home.php");
	} catch (PDOException $e) {
        echo "ERROR CREATING DB: \n".$e->getMessage()."\nAborting process\n";
        exit(-1);
    }
?>