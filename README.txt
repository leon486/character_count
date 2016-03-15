DESCRIPTION:
	by: Leonardo Matos
	This is the answer to the requested character counting programming problem sent over email.
	
	This answer to the supplied programing problem includes the following files:
		-character_count.php
			Main file, run this file using the specified instructions below.
		-CharacterCounter.inc.php
			Class file that contains a class method for counting the words.
		-CharacterCounterTest.inc.php
			Test file to test the class using PHPUnit.
		-test.txt
			Test text file used to verify the correct operation of the Class.
		-rain.txt
			A .txt file containing the 'rain' sample text suplied over email.
		-shakespeare.txt
			A .txt file containing the 'shakespeare' sample text suplied over email.

TO RUN:
	Use the following invocation:
		➜ php character_count.php shakespeare.txt
	
	The two parts of this invocation are:
		-'php character_count.php' Executes the character_count.php
		-'shakespeare.txt' Instructs the script to use this file to find the word with the most repeated characters.