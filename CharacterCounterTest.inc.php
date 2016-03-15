<?php
/*
Author: Leonardo Matos
Title: CharacterCounterTest, Class that tests the other class
*/
class CharacterCounterTest extends PHPUnit_Framework_TestCase{

	public function testFindWordWithMostRepeatedChars(){
		$CharacterCounter = new CharacterCounter();
		$CharacterCounter->setFilename('test.txt');
		$this->assertEquals('people', $CharacterCounter->findWordWithMostRepeatedChars());
		return $CharacterCounter;
	}
	
	/**
	* @depends testFindWordWithMostRepeatedChars
	*/
	#Setting the filename should set the counter and filename to null
	public function testSetFilename($CharacterCounter){
		$CharacterCounter->setFilename('test.txt');
		$this->assertEquals('test.txt', $CharacterCounter->getFilename());
		$this->assertEquals(null, $CharacterCounter->getWordWithMostRepeatedChars());
		$this->assertEquals(null, $CharacterCounter->getCharRepeatCount());
	}
}
?> 