<?php

namespace App\Core\Forms;

use App\Core\Model;

class Form
{
    private Model $model;

    public static function begin(string $method, string $action)
    {
        echo "<form method=\"$method\" action=\"$action\">";
        return new self;
    }

    public function field(Model $model, string $attribute, string $fieldType = '')
    {
        return new Field($model, $attribute, $fieldType);
    }

    public static function end()
    {
        echo "</form>";
        return new self;
    }
}
