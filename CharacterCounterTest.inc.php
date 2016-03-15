<?php
/*
Author:
	Leonardo Matos
Title:
	CharacterCounterTest, Class that tests the other class
*/
class CharacterCounterTest extends PHPUnit_Framework_TestCase{

	public function testFindWordWithMostRepeatedChars(){
		$this->assertEquals('people', CharacterCounter::findWordWithMostRepeatedChars('test.txt'));
	}
}
?> 