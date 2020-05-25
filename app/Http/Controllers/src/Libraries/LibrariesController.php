<?php

namespace App\Http\Controllers\src\Libraries;

use App\Http\Controllers\Controller;

use App\Http\Controllers\src\Libraries\LibraryModel;

class LibrariesController extends Controller implements ControllerInterface
{
    public $request_array_name = 'library'; 
    public $collection_array_name = 'libraries'; 

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
        $this->model = new LibraryModel;
    }
}
