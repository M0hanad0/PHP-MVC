<?php

namespace App\Core;

abstract class Model
{
    public array $errors = [];

    public function loadData($data)
    {
        $vars = get_class_vars(get_class($this));
        $properties = array_keys($vars);
        $cleanProperties = array_map('strtolower', $properties);

        foreach ($data as $key => $val) {
            $cleanKey =  preg_replace('/[^A-Za-z_]/', '', strtolower($key));;
            if (($index = array_search($cleanKey, $cleanProperties)) !== false) {
                $this->{$properties[$index]} = $val;
            }
        }
    }

    abstract public function validators(): array;

    public function validate()
    {
        foreach ($this->validators() as $attribute => $rules) {
            foreach ($rules as $rule) {
                $value = $this->{$attribute};

                if (!$rule->rule($value, $this)) {
                    $this->addError($attribute, $rule->errorMsg());
                }
            }
        }
        return empty($this->errors);
    }

    public function addError(string $attribute, string $errorMsg)
    {
        $this->errors[$attribute][] = $errorMsg;
    }

    public function hasError(string $attribute)
    {
        return array_key_exists($attribute, $this->errors);
    }

    public function firstErrorMsg(string $attribute)
    {
        return $this->hasError($attribute) ? $this->errors[$attribute][0] : '';
    }
}
