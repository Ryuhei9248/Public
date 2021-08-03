<?php

namespace App\Http\Controllers;

use App\Models\User; // App\Models\User クラスをインポートする
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id); // ユーザーID:1 のユーザー情報を取得して $user 変数に代入する
        return view('users.show', ['user' => $user]); // $user を出力して処理をストップする
    }
}
