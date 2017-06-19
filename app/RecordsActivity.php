<?php

namespace App;

use App\Events\ActivityLogged;
use App\CoreMember;
use ReflectionClass;
use Auth;
use Mail;
use App\Mail\NewsCreated;
use App\Mail\EventCreated;
use App\Mail\AlbumCreated;
use App\Mail\GroceryCreated;
use App\Mail\PollCreated;
use App\Mail\PresaleCreated;
use App\Mail\ReportCreated;
use App\Mail\TapListCreated;
use App\Mail\ContactMessageCreated;


trait RecordsActivity
{
	/**
	 * Register the necessary event listeners.
	 *
	 * @return void
	 */
	protected static function bootRecordsActivity()
	{
		foreach (static::getModelEvents() as $event) {
			static::$event(function ($model) use ($event) {
				$model->recordActivity($event);
			});
		}
	}

	/**
	 * Record activity for the model.
	 *
	 * @param  string $event
	 * @return void
	 */
	public function recordActivity($event)
	{
		$emails = [];

		$core_members = CoreMember::all();

		foreach ($core_members as $core_member) {
			$emails[] = $core_member->User->email;
		}

		if (Auth::check() && strtolower(((new ReflectionClass($this))->getShortName())) == "user") {
			$activity = Activity::create([
				'subject_id' => $this->id,
				'subject_type' => get_class($this),
				'name' => $this->getActivityName($this, $event),
				'user_id' => Auth::user()->id
			]);

			// $this->sendMail('user', $activity);

			event(new ActivityLogged($activity));
		} elseif(strtolower(((new ReflectionClass($this))->getShortName())) != "user") {

			if (strtolower(((new ReflectionClass($this))->getShortName())) == "contactmessage" && !Auth::check()) {
				$user_id = 0;
			} else {
				$user_id = Auth::user()->id;
			}

			$activity = Activity::create([
				'subject_id' => $this->id,
				'subject_type' => get_class($this),
				'name' => $this->getActivityName($this, $event),
				'user_id' => $user_id
			]);

			switch ($activity->name) {
				case 'created_event':
					Mail::to($emails)->queue(new EventCreated($activity));
					break;

				case 'created_album':
					Mail::to($emails)->queue(new AlbumCreated($activity));
					break;

				case 'created_grocery':
					Mail::to($emails)->queue(new GroceryCreated($activity));
					break;

				case 'created_news':
					Mail::to($emails)->queue(new NewsCreated($activity));
					break;

				case 'created_poll':
					Mail::to($emails)->queue(new PollCreated($activity));
					break;

				case 'created_presale':
					Mail::to($emails)->queue(new PresaleCreated($activity));
					break;

				case 'created_taplist':
					Mail::to($emails)->queue(new TapListCreated($activity));
					break;

				case 'created_report':
					Mail::to($emails)->queue(new ReportCreated($activity));
					break;

				case 'created_contactmessage':
					Mail::to($emails)->queue(new ContactMessageCreated($activity));
					break;
				
				default:
					break;
			}

			event(new ActivityLogged($activity));
		} else {
			return;
		}
	}

	/**
	 * Prepare the appropriate activity name.
	 *
	 * @param  mixed  $model
	 * @param  string $action
	 * @return string
	 */
	protected function getActivityName($model, $action)
	{
		$name = strtolower((new ReflectionClass($model))->getShortName());

		return "{$action}_{$name}";
	}

	/**
	 * Get the model events to record activity for.
	 *
	 * @return array
	 */
	protected static function getModelEvents()
	{
		if (isset(static::$recordEvents)) {
			return static::$recordEvents;
		}

		return [
			'created', 'deleted', 'updated'
		];
	}

	protected function sendMail($mailName, $activity)
	{
		$emails = [];

		$core_members = CoreMember::all();

		foreach ($core_members as $core_member) {
			$emails[] = $core_member->User->email;
		}

		Mail::to('samdewachter@hotmail.be')->send(new $mailName($activity));

		// Mail::queue('emails.'. $view, ['activity' => $activity], function ($message) use ($emails)
		// {
		// 	$message->from('me@gmail.com', 'Christian Nwamba');
		// 	$message->to($emails)->subject('This is test e-mail');  
		// });
	}
}