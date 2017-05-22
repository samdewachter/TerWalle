<?php

	use App\PollResult;

	function Test($user_id, $poll_id, $answer_id){
		if (PollResult::where([['user_id', $user_id], ['poll_id', $poll_id], ['answer_poll_id', $answer_id]])->exists()) {
			echo 'checked';
		}
	}
	
?>