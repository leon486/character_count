<?php
	require_once('CharacterCounter.inc.php');
	
	$filename = $argv[1];	
	
	$CharacterCounter = new CharacterCounter($filename);
	echo $CharacterCounter->findWordWithMostRepeatedChars();
?> 