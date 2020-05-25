<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\src\Projects\Validators\StoreProjectValidation;

use App\Http\Controllers\src\Projects\ProjectsController;

use App;

class Projects extends ProjectsController
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
        App::make(StoreProjectValidation::class);

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
