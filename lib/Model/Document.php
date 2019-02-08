<?php


class Model_Document extends Model_Table {
	public $table = "document";

	function init(){
		parent::init();

		$this->hasOne('DocumentType','documenttype_id');
		$this->hasOne('Customer','customer_id');
		$this->addField('content')->type('text')->display(['form'=>'RichText']);
		$this->add('filestore/Field_File');
	}
}