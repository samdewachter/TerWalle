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

        // echo "<pre>";
        // var_dump($polls[0]->Answers[3]->Results);
        // echo "</pre>";
    	return view('admin.polls.showPolls', compact('polls'));
    }

    public function newPoll()
    {
    	return view('admin.polls.addPoll');
    }

    public function addPoll(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'deadline' => 'required|date|after:yesterday',
            'answers.*' => 'required',
        ], [
            'title.required' => 'Het titel veld is verplicht.',
            'deadline.required' => 'Het deadline veld is verplicht.',
            'deadline.date' => 'Het deadline veld moet een datum formaat zijn.',
            'deadline.after' => 'De deadline datum moet vandaag of een datum na vandaag zijn.',
            'answers.*.required' => 'Het antwoord veld is verplicht.'
        ]);

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

    	return redirect('/admin/polls')->with('message', ['gelukt', 'Poll succesvol aangemaakt.']);
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
    		return redirect('/admin/polls')->with('message', ['gelukt', 'Antwoord succesvol opgeslagen.']);
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

    public function deletePoll(Poll $poll)
    {
        if ($poll->delete()) {
            return redirect('/admin/polls')->with('message', ['gelukt', 'Poll succesvol verwijderd.']);
        }
        return redirect('/admin/polls')->with('message', ['error', 'Er liep iets fout bij het verwijderen van de poll.']);
    }

    public function editPoll(Poll $poll)
    {
        return view('admin.polls.editPoll', compact('poll'));
    }

    public function updatePoll(Request $request, Poll $poll)
    {
        $this->validate($request, [
            'title' => 'required',
            'deadline' => 'required|date|after:yesterday',
            'oldAnswers.*' => 'required',
        ], [
            'title.required' => 'Het titel veld is verplicht.',
            'deadline.required' => 'Het deadline veld is verplicht.',
            'deadline.date' => 'Het deadline veld moet een datum formaat zijn.',
            'deadline.after' => 'De deadline datum moet vandaag of later zijn.',
            'oldAnswers.*.required' => 'Het antwoord veld is verplicht.'
        ]);
        
        $poll->title = $request->title;
        $poll->deadline = $request->deadline;
        $oldAnswers = $poll->Answers;

        foreach ($oldAnswers as $oldAnswer) {
            $answer = AnswerPoll::find($oldAnswer->id);
            $answer->answer = $request->oldAnswers[$answer->id];
            $answer->save();
        }

        if ($request->answers && count($request->answers) > 0) {
            foreach ($request->answers as $answer) {
                $pollAnswer = new AnswerPoll();

                $pollAnswer->answer = $answer;
                $pollAnswer->poll_id = $poll->id;
                $pollAnswer->save();
            }
        }

        if ($poll->save()) {
            return redirect('/admin/polls')->with('message', ['gelukt', 'Poll succesvol aangepast.']);
        }
        return redirect('/admin/polls')->with('message', ['error', 'Er liep iets fout bij het aanpassen van de poll.']);
    }
}
