<?php
/*
Author: Leonardo Matos
Title: CharacterCounter, Class that has a method that finds the word with the most repeated chars in a file.
Description: The findWordWithMostRepeatedChar method iterates over every character in the file and keeps a track of the number of times a character appears in a word using a hashmap
*/
class CharacterCounter{
	private $filename;							# The filename being read.
	private $wordWithMostRepeatedChars	= null;	# The word that has the most repeated number of characters.
	private $charRepeatCount			= null; # The count of the time that is most repeated character is repeated.
	
	#Constructor, has a filename by default
	public function __construct($filename='shakespeare.txt'){
		if(empty($filename)){
			$filename='shakespeare.txt';
		}
		$this->filename = $filename;
	}
		
	public function getFilename(){
		return $this->filename;
	}
	
	public function getWordWithMostRepeatedChars(){
		return $this->wordWithMostRepeatedChars;
	}
	
	public function getCharRepeatCount(){
		return $this->charRepeatCount;
	}
	
	#setFilename
	#Changing the filename resets the most repeated file and the count to 0.
	#If the file is being changed, then the file and counts would no longer apply. 
	public function setFilename($filename){
		$this->filename 					= $filename;
		$this->wordWithMostRepeatedChars	= null;
		$this->charRepeatCount				= null;
	}
	
		
	private function readFile(){
		$file = fopen($this->filename, "r") or die("Unable to open file: $this->filename, closing...");
		$text = fread($file,filesize($this->filename));
		fclose($file);
		return $text;
	}
		
	public function findWordWithMostRepeatedChars(){
		#Reset word and counter
		$this->wordWithMostRepeatedChars = null;
		$this->charRepeatCount		 	 = null;
		
		#Read file		
		$text = $this->readFile();
		
		#If file is empty just return an empty result.
		if (strlen($text) < 1){
			$this->wordWithMostRepeatedChars = '';
			$this->charRepeatCount		 	 = 0;
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
					$tmp_max 	   = max(array_values($hash));
				}
			}
			
			#Have a 'Tournament' over the charRepeatCount among all words in the file.
			if($tmp_max > $this->charRepeatCount || is_null($this->charRepeatCount)){
				$this->charRepeatCount				=	$tmp_max;
				$this->wordWithMostRepeatedChars	=	$word;
			}
		}
		
		#Return the tournament winner
		return $this->wordWithMostRepeatedChars;
	}
}
?> 