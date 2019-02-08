<?php


class page_departments extends Page {

	function init(){
		parent::init();



		$c = $this->add('CRUD');
		$c->setModel('Department');
		$post_ref= $c->addRef('Post');

	}
	
}