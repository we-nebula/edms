<?php


class page_employees extends Page {

	function init(){
		parent::init();

		$c = $this->add('CRUD');
		$c->setModel('Staff');

	}
	
}