<?php


class page_index extends Page {

	function init(){
		parent::init();

		$c = $this->add('CRUD');
		$c->setModel('Customer');
	}
	
}