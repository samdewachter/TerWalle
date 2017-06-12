<?php

	/* DASBOARD */
	Breadcrumbs::register('dashboard', function($breadcrumbs)
	{
	    $breadcrumbs->push('Dasboard', url('admin'));
	});

	/* WEBSITE SETTINGS */

	Breadcrumbs::register('website settings', function($breadcrumbs)
	{
		$breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Website settings', url('admin/websitesettings'));
	});

	Breadcrumbs::register('cover foto aanpassen', function($breadcrumbs)
	{
		$breadcrumbs->parent('website settings');
	    $breadcrumbs->push('Cover foto aanpassen', url('admin/websitesettings/coverphoto'));
	});

	/* EVENTS */
	Breadcrumbs::register('evenementen', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Evenementen', url('admin/evenementen'));
	});

	Breadcrumbs::register('evenement aanpassen', function($breadcrumbs, $event)
	{
	    $breadcrumbs->parent('evenementen');
	    $breadcrumbs->push( $event->title .' aanpassen', url('admin/evenementen/'. $event->id .'/edit'));
	});

	Breadcrumbs::register('evenement aanmaken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('evenementen');
	    $breadcrumbs->push('Evenement aanmaken', url('admin/evenementen/add'));
	});

	Breadcrumbs::register('evenement zoeken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('evenementen');
	    $breadcrumbs->push('Evenement zoeken', url('admin/evenementen/zoeken'));
	});

	/* NEWS */
	Breadcrumbs::register('nieuwtjes', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Nieuwtjes', url('admin/nieuwtjes'));
	});

	Breadcrumbs::register('nieuwtje aanpassen', function($breadcrumbs, $news)
	{
	    $breadcrumbs->parent('nieuwtjes');
	    $breadcrumbs->push( $news->title .' aanpassen', url('admin/nieuwtjes/'. $news->id .'/edit'));
	});

	Breadcrumbs::register('nieuwtje aanmaken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('nieuwtjes');
	    $breadcrumbs->push('Nieuwtje aanmaken', url('admin/nieuwtjes/add'));
	});

	Breadcrumbs::register('nieuwtje zoeken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('nieuwtjes');
	    $breadcrumbs->push('Nieuwtje zoeken', url('admin/nieuwtjes/zoeken'));
	});

	/* PHOTOS */
	Breadcrumbs::register('albums', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Albums', url('admin/albums'));
	});

	Breadcrumbs::register('album aanpassen', function($breadcrumbs, $album)
	{
	    $breadcrumbs->parent('albums');
	    $breadcrumbs->push($album->album_name . ' aanpassen', url('admin/albums/'. $album->id .'/edit'));
	});

	Breadcrumbs::register('album aanmaken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('albums');
	    $breadcrumbs->push('Album aanmaken', url('admin/albums/add'));
	});

	Breadcrumbs::register('album zoeken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('albums');
	    $breadcrumbs->push('Album zoeken', url('admin/albums/zoeken'));
	});

	Breadcrumbs::register("foto's toevoegen", function($breadcrumbs, $album)
	{
	    $breadcrumbs->parent('album aanpassen', $album);
	    $breadcrumbs->push("Foto's toevoegen", url('admin/album/'. $album->id .'/fotos/add'));
	});

	/* MEMBERS */
	Breadcrumbs::register('leden', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Leden', url('admin/leden'));
	});

	Breadcrumbs::register('lid aanpassen', function($breadcrumbs, $member)
	{
	    $breadcrumbs->parent('leden');
	    $breadcrumbs->push( $member->first_name .' aanpassen', url('admin/leden/'. $member->id .'/edit'));
	});

	Breadcrumbs::register('lid aanmaken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('leden');
	    $breadcrumbs->push('Lid aanmaken', url('admin/leden/add'));
	});

	Breadcrumbs::register('lid zoeken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('leden');
	    $breadcrumbs->push('Lid zoeken', url('admin/leden/zoeken'));
	});

	/* GROCERIES */
	Breadcrumbs::register('boodschappenlijsten', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Boodschappenlijsten', url('admin/boodschappen'));
	});

	Breadcrumbs::register('boodschappenlijst aanpassen', function($breadcrumbs, $grocery)
	{
	    $breadcrumbs->parent('boodschappenlijsten');
	    $breadcrumbs->push( $grocery->name .' aanpassen', url('admin/boodschappen/'. $grocery->id .'/edit'));
	});

	Breadcrumbs::register('boodschappenlijst aanmaken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('boodschappenlijsten');
	    $breadcrumbs->push('Boodschappenlijst aanmaken', url('admin/boodschappen/add'));
	});

	Breadcrumbs::register('boodschappenlijst zoeken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('boodschappenlijsten');
	    $breadcrumbs->push('Boodschappenlijst zoeken', url('admin/boodschappen/zoeken'));
	});

	/* REPORTS */
	Breadcrumbs::register('verslagen', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Verslagen', url('admin/verslagen'));
	});

	Breadcrumbs::register('verslag aanpassen', function($breadcrumbs, $report)
	{
	    $breadcrumbs->parent('verslagen');
	    $breadcrumbs->push( $report->name .' aanpassen', url('admin/verslagen/'. $report->id .'/edit'));
	});

	Breadcrumbs::register('verslag aanmaken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('verslagen');
	    $breadcrumbs->push('Verslag aanmaken', url('admin/verslagen/add'));
	});

	Breadcrumbs::register('verslag zoeken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('verslagen');
	    $breadcrumbs->push('Verslag zoeken', url('admin/verslagen/zoeken'));
	});

	Breadcrumbs::register('soort verslag', function($breadcrumbs, $kind_of_report)
	{
		switch ($kind_of_report) {
    		case 'kernverslag':
    			$name = 'kernverslagen';
    			break;

    		case 'activiteitenverslag':
    			$name = 'activiteitenverslagen';
    			break;

    		case 'ander':
    			$name = 'andere verslagen';
    			break;
    		
    		default:
    			$name = 'andere verslagen';
    			break;
    	}

	    $breadcrumbs->parent('verslagen');
	    $breadcrumbs->push($name , url('admin/verslagen/'. $kind_of_report .'/all'));
	});

	/* POLLS */
	Breadcrumbs::register('polls', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Polls', url('admin/polls'));
	});

	Breadcrumbs::register('poll aanpassen', function($breadcrumbs, $poll)
	{
	    $breadcrumbs->parent('polls');
	    $breadcrumbs->push( $poll->title .' aanpassen', url('admin/poll/'. $poll->id .'/edit'));
	});

	Breadcrumbs::register('poll aanmaken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('polls');
	    $breadcrumbs->push('Poll aanmaken', url('admin/poll/add'));
	});

	Breadcrumbs::register('poll zoeken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('polls');
	    $breadcrumbs->push('Poll zoeken', url('admin/poll/zoeken'));
	});

	/* TAPLIST */
	Breadcrumbs::register('taplijst', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Taplijst overzicht', url('admin/taplijst'));
	});

	/* PRESALE */

	Breadcrumbs::register('voorverkoop', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Voorverkoop', url('admin/voorverkoop'));
	});

	Breadcrumbs::register('voorverkoop aanpassen', function($breadcrumbs, $presale)
	{
	    $breadcrumbs->parent('voorverkoop');
	    $breadcrumbs->push( $presale->title .' aanpassen', url('admin/voorverkoop/'. $presale->id .'/edit'));
	});

	Breadcrumbs::register('voorverkoop aanmaken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('voorverkoop');
	    $breadcrumbs->push('Voorverkoop aanmaken', url('admin/voorverkoop/add'));
	});

	Breadcrumbs::register('voorverkoop zoeken', function($breadcrumbs)
	{
	    $breadcrumbs->parent('voorverkoop');
	    $breadcrumbs->push('Voorverkoop zoeken', url('admin/voorverkoop/zoeken'));
	});

?>