<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Poll;
use App\AnswerPoll;
use App\PollResult;

class PollController extends Controller
{
    public function showPolls()
    {
    	$polls = Poll::all();

        echo "<pre>";
        var_dump($polls[0]->answers[1]->Results[0]->User);
        echo "</pre>";
    	// return view('admin.polls.showPolls', compact('polls'));
    }

    public function newPoll()
    {
    	return view('admin.polls.addPoll');
    }

    public function addPoll(Request $request)
    {
    	$poll = new Poll();

    	$poll->title = $request->title;
    	$poll->deadline = $request->deadline;

    	if (!$poll->save()) {
    		return redirect('/admin/polls')->with('message', ['error', 'Er liep iets fout bij het aanmaken van de poll.']);
    	}

    	foreach ($request->answers as $answer) {
    		$pollAnswer = new AnswerPoll();

    		$pollAnswer->poll_id = $poll->id;
    		$pollAnswer->answer = $answer;

    		if (!$pollAnswer->save()) {
    			return redirect('/admin/polls')->with('message', ['error', 'Er liep iets fout bij het aanmaken van de vragen.']);
    		}
    	}

    	return redirect('/admin/polls')->with('message', ['success', 'Poll succesvol aangemaakt.']);
    }

    public function addResult(Request $request, $poll)
    {
        $userId = Auth::user()->id;

        if (PollResult::where([['user_id', $userId], ['poll_id', $poll]])->exists()) {
            PollResult::where([['user_id', $userId], ['poll_id', $poll]])->delete();
        } 

        $poll_answer_id = (integer)$request->poll_answer_id;

        $poll_answer = AnswerPoll::find($poll_answer_id);

        $poll_id = $poll_answer->poll_id;

    	$result = new PollResult();

    	$result->answer_poll_id = $poll_answer_id;
        $result->poll_id = $poll_id;
    	$result->user_id = $userId;

    	if ($result->save()) {
    		return redirect('/admin/polls')->with('message', ['success', 'Antwoord succesvol opgeslagen.']);
    	}
    	return redirect('/admin/polls')->with('message', ['error', 'Er liep iets fout bij het verzenden van jouw antwoord.']);
    }

    public function getResults(Poll $poll)
    {
        $data = [];

        foreach ($poll->Answers as $answer) {
            $data["answers"][] = $answer->answer;
            $data["votes"][] = count($answer->Results);
        }

        return $data;

        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
}
