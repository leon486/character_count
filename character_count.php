<?php
	require_once('CharacterCounter.inc.php');
	
	$filename = $argv[1];	
	echo CharacterCounter::findWordWithMostRepeatedChars($filename)."\n";

?> 