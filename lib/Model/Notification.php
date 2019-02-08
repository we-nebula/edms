<?php


class Model_Notification extends Model_Table {
	public $table ="notification";

	function init(){
		parent::init();

		$this->hasOne('DocumentType','documenttype_id');
		$this->addField('name')->sortable(true);

		$this->addField('type')->enum(['SMS','Email']);
		$this->addField('shoot_after_days')->type('number');
		
		$this->addField('notify_to_posts');
		$this->addField('notify_to_employees');

		$this->addField('sms_content')->type('text');
		$this->addField('email_subject');
		$this->addField('email_body')->type('text')->display(['form'=>'RichText']);
		
		$this->is([
			'name|to_trim|required'
		]);

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}