<?php

namespace App\Core\Forms;

use App\Core\Model;

class Field
{
    public const TEXT_FIELD = 'text';
    public const PASSWORD_FIELD = 'password';
    public const EMAIL_FIELD = 'email';

    private Model $model;
    private string $attribute;
    private string $fieldType = 'text';

    public function __construct(Model $model, string $attribute, string $fieldType = 'text')
    {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->fieldType = $fieldType;
    }

    public function __toString()
    {
        $value = $this->model->{$this->attribute};
        $hasError = $this->model->hasError($this->attribute);
        $firstErrorMsg = $this->model->firstErrorMsg($this->attribute);
        return sprintf(
            '
<div class="mb-3">
    <label for="%s" class="form-label">%s</label>
    <input type="%s" class="form-control %s" name="%s" id="%s" value="%s">
</div>
<div class="%s-feedback d-block">
   %s
</div>
',
            $this->attribute,
            $this->attribute,
            $this->fieldType,
            $hasError ? 'is-invalid' : '',
            $this->attribute,
            $this->attribute,
            $value,
            $hasError ? 'invalid' : 'valid',
            $firstErrorMsg
        );
    }
}
