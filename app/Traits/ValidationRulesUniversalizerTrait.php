<?php

namespace App\Traits;

trait ValidationRulesUniversalizerTrait
{
    public function universalizeRules($rules, $request_data, $array_name) 
    {
        if (isset($request_data[$array_name]) && is_array($request_data[$array_name])) {
            $return = array();

            foreach ($request_data[$array_name] as $key => $value) {
                if (is_numeric($key)) {
                    foreach ($rules as $field => $rule) {
                        $return[$array_name . '.' . $key . '.' . $field] = $rule;
                    }
                } else {
                    if(isset($rules[$key]) && !isset($return[$array_name . '.' . $key])) {
                        foreach ($rules as $field => $rule) {
                            $return[$array_name . '.' . $field] = $rule;
                        }
                    }
                }
            }

            return $return;
        } else {
            return [
                $array_name => 'required|array'
            ];
        }
    }
}
