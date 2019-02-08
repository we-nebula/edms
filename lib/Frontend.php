<?php
class Frontend extends ApiFrontend {
    
    public $title = "We :: Commission System";

    function init() {
        parent::init();

        $app_paths = array('vendor','shared/addons2','shared/addons');

         $this->api->pathfinder
            ->addLocation(array(
                'addons' => $app_paths,
                'css' => ['templates'],
            ))
            ->setBasePath($this->pathfinder->base_location->getPath());
        
        $this->add('jUI');
        $this->dbConnect();
       
        $auth=$this->add('BasicAuth');
        $auth->setModel('Staff','username','password');
        $auth->check();

        $this->app->employee = $auth->model;
      
        $m=$this->add('Menu_Horizontal',null,'Menu');
        $m->addMenuItem('index','Dashboard');
        $t = $m->addMenu('System');
        $t->addItem('Document Types','documenttypes');
        $t->addItem('Departments / Posts','departments');
        $t->addItem('Employees/Staff','employees');
        $t = $m->addMenu('Plan');
        $t->addItem('a','B');
        $t = $m->addMenu('Commissions');
        $t->addItem('a','B');
        $m->addMenuItem('logout','Logout');
            ;

        $this->addLayout('UserMenu');

        $this->addStylesheet('we');

    }
}
