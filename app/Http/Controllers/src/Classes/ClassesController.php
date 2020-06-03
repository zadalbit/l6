<?php

namespace App\Http\Controllers\src\Classes;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerInterface;

use App\Http\Controllers\src\Classes\ClassModel;

use App\Http\Controllers\src\Libraries\LibrariesController;
use App\Http\Controllers\src\Projects\ProjectsController;

use App;

class ClassesController extends Controller implements ControllerInterface
{
    public $request_array_name = 'class'; 
    public $collection_array_name = 'classes'; 

    public $model;
    public $projects_controller;
    public $libraries_controller;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function setModel()
    {
        $this->model = new ClassModel;
    }

    public function setProjectsController(ProjectsController $projects_controller)
    {
        $this->projects_controller = $projects_controller;
    }

    public function setLibrariesController(LibrariesController $libraries_controller)
    {
        $this->libraries_controller = $libraries_controller;
    }

    public function getCreateData() 
    {
        App::call( [ $this, 'setProjectsController' ] );
        App::call( [ $this, 'setLibrariesController' ] );

        return [
            $this->projects_controller->collection_array_name => $this->projects_controller->getAll(),
            $this->libraries_controller->collection_array_name => $this->libraries_controller->getAll(),
        ];
    }
}
