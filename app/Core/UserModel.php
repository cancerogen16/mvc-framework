<?php

namespace App\Core;

abstract class UserModel extends DbModel
{
    /**
     * @return mixed
     */
    abstract public function getDisplayName();
}