<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\src\Libraries\LibrariesController;

class Libraries extends LibrariesController
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

    public function store(Request $request)
    {
        $entity = $this->save($request->all());

        return response()->success([
            'entity' => $entity
        ]);
    }

    public function index(Request $request)
    {
    	$entities = $this->GETToORM($request->all())->get();

    	return response()->success([
		    'entities' => $entities
		]);
    }
}
