<?php


class Model_Staff extends Model_Table {
	public $table ='staff';
	public $acl='Staff';
	public $acl_type='Staff';

	public $status=[
		'Active',
		'InActive',
		"DeactivateRequest"
	];

	public $actions=[
		'Active'=>['view','edit','delete','deactivate','communication','email'],
		'InActive'=>['view','edit','delete','activate','communication'],
		'DeactivateRequest'=>['view','edit','delete','deactivate','activate']
	];

	function init(){
		parent::init();

		$this->hasOne('Post','post_id');

		$this->addField('name')->sortable(true);
		$this->addField('username');
		$this->addField('password')->type('password');
		$this->addField('status')->enum($this->status)->defaultValue('Active');

		$this->addField('scope')->enum(['SuperUser','Admin','User']);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function page_email($page){
		$page->add('View')->set('HAHAHAH');
	}

	function isSuperUser(){
		return $this['scope'] == 'SuperUser';
	}
}