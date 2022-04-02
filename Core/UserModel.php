<?php

namespace App\core;

use App\core\Db\DbModel;

abstract class UserModel extends DbModel
{
    /**
     * @return mixed
     */
    abstract public function getDisplayName();
}