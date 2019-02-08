<?php


class page_entities extends Page {

	function init(){
		parent::init();

		$c = $this->add('CRUD');
		$c->setModel('Entity');

	}
	
}