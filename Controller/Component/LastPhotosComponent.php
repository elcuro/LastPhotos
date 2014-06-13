<?php

App::uses('Component', 'Controller');
App::uses('Model', 'Nodeattachment.Model/Nodeattachment');

class LastPhotosComponent extends Component {

/**
 * Photos for layout
 *
 * @var array
 * @access public
 */
	public $photosForLayout = array();


/**
 * Startup
 *
 * @param Controller $controller instance of controller
 * @return void
 */
	public function startup(Controller $controller) {
		$Nodeattachment = new Nodeattachment();

		$options = array(
			'conditions' => array(
				'Nodeattachment.type' => 'image'),
			'order' => 'Nodeattachment.updated DESC',
			'limit' => Configure::read('LastPhotos.limit'),
			'cache' => array(
				'name' =>  'last_photos',
				'config' => 'last_photos',
			),			
		);

		$this->photosForLayout = $Nodeattachment->find('all', $options);

	}

/**
 * beforeRender
 *
 * @param object $controller instance of controller
 * @return void
 */
	public function beforeRender(Controller $controller) {
		$controller->set('last_photos', $this->photosForLayout);
	}

}
