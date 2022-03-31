<?php

namespace App\Core;

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

    public static function field(Model $model, string $attribute)
    {
        return new Field($model, $attribute);
    }
}