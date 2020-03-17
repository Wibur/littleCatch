<?php

namespace App\Http\Controllers;

use App\Checker\AdminChecker;
use App\Services\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(
        Request $request,
        AdminChecker $adminChecker,
        LoginService $loginService
    ) {
        try {
            $adminChecker->checkAdmin($request);
            $loginService->checkLogin($request->only([
                'name',
                'password',
            ]));
            return redirect()->intended('home');
        } catch (\Exception $e) {
            return errorResponse($e->getCode(), $e);
        }
    }

    public function logout(LoginService $loginService)
    {
        try {
            $loginService->logout();
            return redirect()->intended('login');
        } catch (Exception $e) {
            return errorResponse($e->getCode(), $e);
        }
    }
}
