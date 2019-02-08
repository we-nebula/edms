<?php


class Model_Post extends Model_Table {
	public $table ="post";

	function init(){
		parent::init();

		$this->hasOne('Department','department_id');

		$this->addField('name');
		
		$this->add('dynamic_model/Controller_AutoCreator');
	}
}