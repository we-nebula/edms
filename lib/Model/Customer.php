<?php



class Model_Customer extends Model_Table {
	public $table = 'customer';

	function init(){
		parent::init();

		$this->addField('name');

		$this->hasMany('Document','customer_id');

		$this->add('dynamic_model/Controller_AutoCreator');

	}
}