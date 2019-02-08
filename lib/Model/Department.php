<?php


class Model_Department extends Model_Table {
	public $table ="department";

	function init(){
		parent::init();

		$this->addField('name');
		
		$this->hasMany('Post','department_id');

		$this->addExpression('post_count')->set($this->refSQL('Post')->count())->sortable(true);

		$this->is([
			'name|to_trim|required|len|>3'
		]);

		$this->addHook('beforeDelete',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeDelete(){
		if($this->ref('Post')->count()->getOne()){
			throw new \Exception("Cannot delete, contains posts", 1);
			
		}
	}
}