<?php

namespace App\Core;

class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_EMAIL = 'email';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';

    public string $type;

    public Model $model;

    public string $attribute;

    /**
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf('
        <div class="mb-3">
            <label for="%s" class="form-label">%s</label>
            <input type="%s" name="%s" value="%s" class="form-control%s" id="%s">
            <div class="invalid-feedback">%s</div>
        </div>
        ',
            $this->attribute,
            $this->model->getLabel($this->attribute),
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->attribute,
            $this->model->getFirstError($this->attribute) ?? '',
        );
    }

    /**
     * @return $this
     */
    public function passwordField(): Field
    {
        $this->type = self::TYPE_PASSWORD;

        return $this;
    }

    /**
     * @return $this
     */
    public function emailField(): Field
    {
        $this->type = self::TYPE_EMAIL;

        return $this;
    }
}