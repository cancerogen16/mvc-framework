<?php

namespace App\core\Forms;

class TextareaField extends BaseField
{
    public function renderInput(): string
    {
        return sprintf('<textarea name="%s" id="%s" class="form-control%s" rows="3">%s</textarea>',
            $this->attribute,
            $this->attribute,
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->model->{$this->attribute},
        );
    }
}