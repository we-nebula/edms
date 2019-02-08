<?php


class Model_DocumentType extends Model_Table {
	public $table ="document_type";
	
	public $acl='DocumentType';
	public $acl_type='DocumentType';

	public $status=[
		'Active',
		'InActive',
		"DeactivateRequest"
	];

	public $actions=[
		'Active'=>['view','edit','delete','deactivate','communication'],
		'InActive'=>['view','edit','delete','activate','communication'],
		'DeactivateRequest'=>['view','edit','delete','deactivate','activate']
	];

	function init(){
		parent::init();

		$this->hasOne('Employee','created_by_id')->system(true)->defaultValue(@$this->app->auth->model->id);
		$this->addField('for_entity')->enum($this->app->getConfig('entities'));
		$this->addField('name')->sortable(true);
		$this->addField('maintain_version')->type('boolean')->defaultValue(true);
		$this->addField('is_mendatory')->type('boolean')->defaultValue(true);
		$this->addField('allowed_multiple')->type('boolean')->defaultValue(false);
		$this->addField('doc_type')->enum(['RichText','MS Word','MS_Excel','PDF','Image'])->mandatory(true);
		$this->addField('status')->enum($this->status)->defaultValue('Active');
		
		$this->hasMany('Notification','documenttype_id');
		$this->is([
			'name|to_trim|required|len|>3'
		]);
		$this->add('dynamic_model/Controller_AutoCreator');
	}
}