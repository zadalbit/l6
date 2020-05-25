<?php

namespace App\Http\Controllers\src\Projects\Validators;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

use App\Traits\ValidationRulesUniversalizerTrait;
use App\Http\Controllers\src\Projects\ProjectsController;

class StoreProjectValidation extends FormRequest
{
    use ValidationRulesUniversalizerTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request, ProjectsController $projects_controller)
    {
        $rules = [
            'name' => 'required|string|unique:App\Http\Controllers\src\Projects\ProjectModel,name'
        ];

        $array_name = $projects_controller->request_array_name;
        $request_data = $request->all();

        return $this->universalizeRules($rules, $request_data, $array_name);
    }
}
