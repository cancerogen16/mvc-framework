<?php

namespace App\Core;

use App\Core\Db\DbModel;

abstract class UserModel extends DbModel
{
    /**
     * @return mixed
     */
    abstract public function getDisplayName();
}