<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $GETToORM = [
        'pagination' => true,
        'items_per_page' => 10,
        'page' => 1,
    ];

    public function GETToORM($get)
    {
    	$this->setModel();
        
    	return $this->model;
    }

    public function getAll()
    {
        $this->setModel();

        return $this->model->all();
    }

    public function save($data)
    {
        $this->setModel();

        $another_model = $this->model;
        $another_model_changed = false;

		$attributes = $this->model->getTableColumns();

        foreach ($data[$this->request_array_name] as $key => $value) {
            if (is_numeric($key)) {
                foreach ($value as $field => $field_value) {
                    if (in_array($field, $attributes)) {
                        $this->model->$field = $field_value;
                    }
                }
                $this->model->save();
                $this->setModel();
            } else {
                if (in_array($key, $attributes)) {
                    $another_model->$key = $value;
                    $another_model_changed = true;
                }
            }
        }

        if ($another_model_changed) {
            $another_model->save();
        }

        return $this->model;
    }
}
