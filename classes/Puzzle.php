<?php
class Puzzle{
	private $id; // int
	private $question; // string
	private $answer; // string
	private $hint; // string
	private $reward; // item?

	public function __construct($id, $question, $answer, $hint, $reward){
		$this->id = $id;
		$this->question = $question;
		$this->answer = $answer;
		$this->hint = $hint;
		$this->reward = $reward;
	}

	public function getId(){
		return $this->id;
	}

	public function getQuestion(){
		return $this->question;
	}

	public function getAnswer(){
		return $this->answer;
	}

	public function getHint(){
		return $this->hint;
	}

	public function getReward(){
		return $this->reward;
	}
}
?>