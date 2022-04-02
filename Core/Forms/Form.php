<?php

namespace App\core\Forms;

use App\core\Model;

class Form
{
    /**
     * @param string $action
     * @param string $method
     * @return Form
     */
    public static function begin(string $action = '', string $method = 'post'): Form
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);

        return new Form();
    }

    /**
     * @return string
     */
    public static function end(): string
    {
        return '</form>';
    }

    /**
     * @param Model $model
     * @param string $attribute
     * @return InputField
     */
    public static function field(Model $model, string $attribute): InputField
    {
        return new InputField($model, $attribute);
    }

    /**
     * @param Model $model
     * @param string $attribute
     * @return TextareaField
     */
    public static function textareaField(Model $model, string $attribute): TextareaField
    {
        return new TextareaField($model, $attribute);
    }
}