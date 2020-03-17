<?php
namespace App\Checker\Validator;

use Illuminate\Support\Facades\Validator;

class AdminValidator
{
    public function verifyAdmin($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ], [
            'name.required' => '請輸入名稱',
            'name.string' => '名稱格式錯誤',
            'name.max' => '名稱長度限定255',
            'password.required' => '請輸入密碼',
            'password.string' => '密碼格式錯誤',
            'password.min' => '密碼長度最少6',
        ]);
        if ($validator->fails()) {
            $errorMsg = $validator->errors()->first();
            return $errorMsg;
        }
        return true;
    }
}
