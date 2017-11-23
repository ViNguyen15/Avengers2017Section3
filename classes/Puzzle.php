<?php
class Puzzle{
	public $id; // int
	public $question; // string
	public $answer; // string
	public $hint; // string
	public $rewardId; // id of item
        public $rewardAmount;
	public $completed;

	public function __construct($id, $question, $answer, $hint, $rewardId, $rewardAmout){
		$this->id = $id;
		$this->question = $question;
		$this->answer = $answer;
		$this->hint = $hint;
		$this->rewardId = $rewardId;
                $this->rewardAmount = $rewardAmout;
		$this->completed = 0;
	}

	public function display(){


		echo "<puzzle style='background-image:url(\"images/rooms/puzzle.png\")'>";

		if ($this->completed == 0){
			echo "<p>".$this->question.
			"
			<input id='answer' type='textbox' /> <submit onclick='tryAnswer()' onclick='tryAnswer()'>submit</submit>
			</p>";
			echo "<gethint onmouseover='displayHint()' onmouseout='hideHint()'>Hint</gethint>";
			echo "<hint id='hint' style='visibility:hidden'>$this->hint</hint>";
		} else {
			echo "<p> You have completed this puzzle! ";
			echo "<submit onclick='Controller(\"goBack\",1)'>Go back!</submit> </p>";
		}
		echo "</puzzle>";
	}



}
?>