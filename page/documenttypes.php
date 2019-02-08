<?php


class page_documenttypes extends Page {

	function init(){
		parent::init();

		$c = $this->add('CRUD');
		
		$c->setModel('DocumentType');

		$not_ref=  $c->addRef('Notification');

		$c->grid->addQuickSearch(['name']);
	}
	
}