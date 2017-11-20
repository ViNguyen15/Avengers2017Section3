<?php
class Puzzle{
	public $id; // int
	public $question; // string
	public $answer; // string
	public $hint; // string
	public $rewardId; // id of item
        public $rewardAmount;

	public function __construct($id, $question, $answer, $hint, $rewardId, $rewardAmout){
		$this->id = $id;
		$this->question = $question;
		$this->answer = $answer;
		$this->hint = $hint;
		$this->rewardId = $rewardId;
                $this->rewardAmount = $rewardAmout;
	}

}
?>