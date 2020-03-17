<?php
namespace App\Checker;

use App\Checker\Validator\AdminValidator;

class AdminChecker
{
    private $adminValidator;

    public function __construct(AdminValidator $adminValidator)
    {
        $this->adminValidator = $adminValidator;
    }

    public function checkAdmin($request)
    {
        $validator = $this->adminValidator->verifyAdmin($request);
        if ($validator !== true) {
            throw new \Exception($validator, 400);
        }
    }
}
