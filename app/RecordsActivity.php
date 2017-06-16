<?php

namespace App;

use App\Events\ActivityLogged;
use App\CoreMember;
use ReflectionClass;
use Auth;
use Mail;

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
		if (Auth::check()) {
			$activity = Activity::create([
				'subject_id' => $this->id,
				'subject_type' => get_class($this),
				'name' => $this->getActivityName($this, $event),
				'user_id' => Auth::user()->id
			]);

			switch ($activity->name) {
				case 'created_event':
					$this->sendMail('event', $activity);
					break;

				case 'created_album':
					$this->sendMail('album', $activity);
					break;

				case 'created_grocery':
					$this->sendMail('grocery', $activity);
					break;

				case 'created_news':
					$this->sendMail('news', $activity);
					break;

				case 'created_poll':
					$this->sendMail('poll', $activity);
					break;

				case 'created_presale':
					$this->sendMail('presale', $activity);
					break;

				case 'created_user':
					$this->sendMail('user', $activity);
					break;

				case 'created_taplist':
					$this->sendMail('tapList', $activity);
					break;

				case 'created_report':
					$this->sendMail('report', $activity);
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

	protected function sendMail($view, $activity)
	{
		$emails = [];

		$core_members = CoreMember::all();

		foreach ($core_members as $core_member) {
			$emails[] = $core_member->User->email;
		}

		Mail::send('emails.'. $view, ['activity' => $activity], function ($message) use ($emails)
		{
			$message->from('me@gmail.com', 'Christian Nwamba');
			$message->to($emails)->subject('This is test e-mail');  
		});
	}
}