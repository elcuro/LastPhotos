<?php
    Cache::config('last_photos', Configure::read('Cache.defaultConfig'));

    Croogo::hookComponent('*', 'LastPhotos.LastPhotos');
    Croogo::hookBehavior('Nodeattachment', 'LastPhotos.LastPhotos');

	CroogoNav::add('settings.children.last_photos', array(
		'title' => 'LastPhotos',
		'url' => array(
			'admin' => true,
			'plugin' => 'settings',
			'controller' => 'settings',
			'action' => 'prefix',
			'LastPhotos',
		),
	));	
?>