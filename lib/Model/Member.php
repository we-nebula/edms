<?php


class Model_Member extends Model_Table {
	public $table ='member';

	function init(){
		parent::init();

		$this->addField('first_name')->sortable(true);
		$this->addField('middle_name');
		$this->addField('last_name');
		$this->addField('count')->type('money');

		$this->addField('DOB')->type('datetime');

		$this->is([
			'first_name|to_trim|required|len|>3'
		]);

		// $this->add('dynamic_model/Controller_AutoCreator');
	}
}