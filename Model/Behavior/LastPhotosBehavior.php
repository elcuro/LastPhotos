<?php

App::uses('ModelBehavior', 'Model');

/**
 * LastPhotos behavior
 * - delete caches
 *
 */
class LastPhotosBehavior extends ModelBehavior {

/**
 * afterSave is called after a model is saved.
 *
 * @param Model $model Model using this behavior
 * @param boolean $created True if this save created a new record
 * @param array $options Options passed from Model::save().
 * @return boolean
 * @see Model::save()
 */
	public function afterSave(Model $model, $created, $options = array()) {
		$this->_deleteCache();
		return true;
	}

/**
 * After delete is called after any delete occurs on the attached model.
 *
 * @param Model $model Model using this behavior
 * @return void
 */
	public function afterDelete(Model $model) {
		$this->_deleteCache();
	}

/**
 * Delete cache
 *
 * @return void
 **/
	private function _deleteCache() {
		$cacheName = 'last_photos_' . Configure::read('Config.language');
		Cache::delete($cacheName, 'last_photos');
	}		

}
