<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\src\Classes\ClassesController;

use App\Http\Controllers\src\Libraries\LibrariesController;
use App\Http\Controllers\src\Projects\ProjectsController;

class Classes extends ClassesController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function create() 
    {
        return response()->success($this->getCreateData());
    }

    public function store(Request $request)
    {
        $entity = $this->save($request->all());

        return response()->success([
            'entity' => $entity
        ]);
    }

    public function index(Request $request)
    {
        $this->GETToORM['pagination'] = false;
        $entities = $this->GETToORM($request->all())->get();

        return response()->success([
            'entities' => $entities
        ]);
    }
}
