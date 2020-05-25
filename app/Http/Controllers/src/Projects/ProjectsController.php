<?php

namespace App\Http\Controllers\src\Projects;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerInterface;

use App\Http\Controllers\src\Projects\ProjectModel;

class ProjectsController extends Controller implements ControllerInterface
{
    public $request_array_name = 'project'; 
    public $collection_array_name = 'projects'; 

    public $model;

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
        $this->model = new ProjectModel;
    }
}
