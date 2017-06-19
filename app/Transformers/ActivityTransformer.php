<?php
namespace App\Transformers;
use App\Activity;
use League\Fractal\TransformerAbstract;
use Mail;

class ActivityTransformer extends TransformerAbstract
{
	public function transform(Activity $activity)
	{
		return [
			"description" => call_user_func_array([$this, $activity->name], [$activity])['description'][0],
			"title" => call_user_func_array([$this, $activity->name], [$activity])['title'][0],
			"lapse" => $activity->created_at->diffForHumans(),
			"user" => $activity->user,
		];
	}

	/* EVENTS */
	protected function created_event(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft een evenement genaamd '" . $activity->subject->title  . "' aangemaakt."];
		$text['title'] = ["Event aangemaakt"];
		return $text;
	}
	protected function deleted_event(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft het evenement genaamd '" . $activity->subject->title  . "' verwijderd."];
		$text['title'] = ["Event verwijderd"];
		return $text;
	}
	protected function updated_event(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft het evenement genaamd '" . $activity->subject->title  . "' aangepast."];
		$text['title'] = ["Event aangepast"];
		return $text;
	}

	/* ALBUMS */
	protected function created_album(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft een album genaamd '" . $activity->subject->album_name  . "' aangemaakt."];
		$text['title'] = ["Album aangemaakt"];
		return $text;
	}
	protected function deleted_album(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft het album genaamd '" . $activity->subject->album_name  . "' verwijderd."];
		$text['title'] = ["Album verwijderd"];
		return $text;
	}
	protected function updated_album(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft het album genaamd '" . $activity->subject->album_name  . "' aangepast."];
		$text['title'] = ["Album aangepast"];
		return $text;
	}

	/* NEWS */
	protected function created_news(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft een nieuwtje genaamd '" . $activity->subject->title  . "' aangemaakt."];
		$text['title'] = ["Nieuwtje aangemaakt"];
		return $text;
	}
	protected function deleted_news(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft het nieuwtje genaamd '" . $activity->subject->title  . "' verwijderd."];
		$text['title'] = ["Nieuwtje verwijderd"];
		return $text;
	}
	protected function updated_news(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft het nieuwtje genaamd '" . $activity->subject->title  . "' aangepast."];
		$text['title'] = ["Nieuwtje aangepast"];
		return $text;
	}

	/* MEMBERS */
	protected function created_user(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft een lid genaamd '" . $activity->subject->first_name . " " . $activity->subject->last_name . "' aangemaakt."];
		$text['title'] = ["Lid aangemaakt"];
		return $text;
	}
	protected function deleted_user(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft het lid genaamd '" . $activity->subject->first_name . " " . $activity->subject->last_name . "' verwijderd."];
		$text['title'] = ["Lid verwijderd"];
		return $text;
	}
	protected function updated_user(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft het lid genaamd '" . $activity->subject->first_name . " " . $activity->subject->last_name . "' aangepast."];
		$text['title'] = ["Lid aangepast"];
		return $text;
	}

	/* GROCERIES */
	protected function created_grocery(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft een boodschappenlijst genaamd '" . $activity->subject->name . " aangemaakt."];
		$text['title'] = ["Boodschappenlijst aangemaakt"];
		return $text;
	}
	protected function deleted_grocery(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft de boodschappenlijst genaamd '" . $activity->subject->name . "' verwijderd."];
		$text['title'] = ["Boodschappenlijst verwijderd"];
		return $text;
	}
	protected function updated_grocery(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft de boodschappenlijst genaamd '" . $activity->subject->name . "' aangepast."];
		$text['title'] = ["Boodschappenlijst aangepast"];
		return $text;
	}

	/* REPORTS */
	protected function created_report(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft een verslag genaamd '" . $activity->subject->name . " aangemaakt."];
		$text['title'] = ["Verslag aangemaakt"];
		return $text;
	}
	protected function deleted_report(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft het verslag genaamd '" . $activity->subject->name . "' verwijderd."];
		$text['title'] = ["Verslag verwijderd"];
		return $text;
	}
	protected function updated_report(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft het verslag genaamd '" . $activity->subject->name . "' aangepast."];
		$text['title'] = ["Verslag aangepast"];
		return $text;
	}

	/* POLLS */
	protected function created_poll(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft een poll genaamd '" . $activity->subject->title . " aangemaakt."];
		$text['title'] = ["poll aangemaakt"];
		return $text;
	}
	protected function deleted_poll(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft de poll genaamd '" . $activity->subject->title . "' verwijderd."];
		$text['title'] = ["poll verwijderd"];
		return $text;
	}
	protected function updated_poll(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft de poll genaamd '" . $activity->subject->title . "' aangepast."];
		$text['title'] = ["poll aangepast"];
		return $text;
	}

	/* TAPLIST */
	protected function created_tapList(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft een tapper genaamd '" . $activity->subject->title . "' toegevoegd."];
		$text['title'] = ["Tapper toegevoegd"];
		return $text;
	}
	protected function deleted_tapList(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft de tapper genaamd '" . $activity->subject->title . "' verwijderd."];
		$text['title'] = ["Tapper verwijderd"];
		return $text;
	}
	protected function updated_tapList(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft de tapper genaamd '" . $activity->subject->title . "' aangepast."];
		$text['title'] = ["Tapper aangepast"];
		return $text;
	}

	/* PRESALE */
	protected function created_presale(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft een voorverkoop moment genaamd '" . $activity->subject->description . "' toegevoegd."];
		$text['title'] = ["Voorverkoop toegevoegd"];
		return $text;
	}
	protected function deleted_presale(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft het voorverkoop moment genaamd '" . $activity->subject->description . "' verwijderd."];
		$text['title'] = ["Voorverkoop verwijderd"];
		return $text;
	}
	protected function updated_presale(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft het voorverkoop moment genaamd '" . $activity->subject->description . "' aangepast."];
		$text['title'] = ["Voorverkoop aangepast"];
		return $text;
	}

	/* CONTACT */
	protected function created_contactmessage(Activity $activity)
	{
		$text = [];
		$text['description'] = [$activity->subject->name ." heeft een contact bericht verstuurd."];
		$text['title'] = ["Nieuw contact bericht"];
		return $text;
	}

	protected function updated_contactmessage(Activity $activity)
	{
		$text = [];
		if ($activity->subject->answered) {
			$text['description'] = [$activity->user->first_name ." heeft een contact bericht van ". $activity->subject->name . " beantwoord."];
		} else {
			$text['description'] = [$activity->user->first_name ." heeft zijn antwoord naar ". $activity->subject->name . " verwijderd."];
		}
		
		$text['title'] = ["Nieuw contact bericht"];
		return $text;
	}
	// protected function deleted_presale(Activity $activity)
	// {
	// 	$text = [];
	// 	$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft het voorverkoop moment genaamd '" . $activity->subject->description . "' verwijderd."];
	// 	$text['title'] = ["Voorverkoop verwijderd"];
	// 	return $text;
	// }
	// protected function updated_presale(Activity $activity)
	// {
	// 	$text = [];
	// 	$text['description'] = [$activity->user->first_name . " " . $activity->user->last_name . " heeft het voorverkoop moment genaamd '" . $activity->subject->description . "' aangepast."];
	// 	$text['title'] = ["Voorverkoop aangepast"];
	// 	return $text;
	// }
}