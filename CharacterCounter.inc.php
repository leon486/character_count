<?php
/*
Author:
	Leonardo Matos
Title:
	CharacterCounter, Class that has a method that finds the word with the most repeated chars in a file.
Description:
	The findWordWithMostRepeatedChar method iterates over every character in the file and keeps a track of the number of times a character appears in a word using a hashmap. It should run at O(n) time.
*/
class CharacterCounter{		
	public function findWordWithMostRepeatedChars($filename){
		if(empty($filename)){
			echo "Please specify a filename as a parameter\n";
			exit;
		}
		$wordWithMostRepeatedChars	= null;
		$charRepeatCount		 	= null;
	
		#Read file
		$file = fopen($filename, "r") or die("Unable to open file: $filename, closing...");
		$text = fread($file,filesize($filename));
		fclose($file);
		
		#If file is empty just return an empty result.
		if (strlen($text) < 1){
			return '';
		}
		
		#Splits the string into an array of any group of characters surrounded by any amount of whitespaces. It also uses the \p{P} to also match any unicode punctuation character.
		$words = preg_split('/((^\p{P}+)|(\p{P}*\s+\p{P}*)|(\p{P}+$))/', strtolower($text), -1, PREG_SPLIT_NO_EMPTY);

		#Iterate over all the words in the file.
		foreach($words as $word){
			$wordlen = strlen($word);
			$hash = [];
			
			#Iterate over all chars in the word.
			for($i = 0; $i <= $wordlen; $i++ ) {
				$letter = substr($word,$i,1);
				
				#If it is a character ([a-z][A-Z] add it to the hashmap)
				if (ctype_alpha($letter)){
					$hash[$letter] = $hash[$letter] + 1;
				}
			}
			
			#Have a 'Tournament' over the charRepeatCount among all words in the file.
			$maxCharsRepeated = max(array_values($hash));
			if($maxCharsRepeated > $charRepeatCount || is_null($charRepeatCount)){
				$charRepeatCount			=	$maxCharsRepeated;
				$wordWithMostRepeatedChars	=	$word;
			}
		}
		
		#Return the tournament winner
		return $wordWithMostRepeatedChars;
	}
}
?> 