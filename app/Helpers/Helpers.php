<?php

	use App\PollResult;

	function Test($user_id, $poll_id, $answer_id){
		if (PollResult::where([['user_id', $user_id], ['poll_id', $poll_id], ['answer_poll_id', $answer_id]])->exists()) {
			echo 'checked';
		}
	}

	function clean($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

	   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
	}
	
?>