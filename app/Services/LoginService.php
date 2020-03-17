<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Auth;

class LoginService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function checkLogin($params)
    {
        if (Auth::attempt([
            'name' => $params['name'],
            'password' => $params['password']
        ])) {
            // 登入成功
        } else {
            // 創建使用者            
            $isCreated = $this->userRepository->create($params);
            if ($isCreated === false) {
                throw new \Exception('發生錯誤，請聯絡管理員', 400);
            }
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
    }
}
