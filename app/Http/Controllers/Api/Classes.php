<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\src\Classes\ClassesController;

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
        //
    }

    public function store(Request $request)
    {
        $entity = $this->save($request->all());

        return response()->success([
            'entities' => $entity
        ]);
    }

    public function index(Request $request)
    {
        $this->GETToORM['pagination'] = false;
        $entities = $this->GETToORM($request->all())->get();

        return response()->success([
            'entity' => $entities
        ]);
    }
}
