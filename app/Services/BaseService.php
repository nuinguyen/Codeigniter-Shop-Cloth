<?php

namespace App\Services;
use App\Controllers\BaseController;

class BaseService
{
    /**
     * @var validation
     */
    public $validation;

    function __construct()
    {
      $this->validation = \Config\Services::validation();
    }
}
