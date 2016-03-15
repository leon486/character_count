<?php
/*
Author:
	Leonardo Matos
Title:
	character_count.php, Main file for the solution of the character counting problem supplied
Description:
	This file recieves the supplied parameter and passes it to the class method in the CharacterCounter class to later return the answer.
	The class was moved to a different file to adhere to OOP standards.
*/
	require_once('CharacterCounter.inc.php');
	
	$filename = $argv[1];	
	echo CharacterCounter::findWordWithMostRepeatedChars($filename)."\n";

?> 