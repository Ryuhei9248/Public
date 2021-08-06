<?php

namespace App\Http\Controllers;

use App\Models\User; // App\Models\User クラスをインポートする
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id); // ユーザーID:1 のユーザー情報を取得して $user 変数に代入する
        return view('users.show', ['user' => $user]); // $user を出力して処理をストップする 第二引数は"['渡す先での変数名' => 今回渡す変数]"
    }

    public function edit(){
        
        $user = Auth::user();
        
        return view('users.edit', ['user' => $user]);
    }

    public function update(UpdateRequest $request)
    {
        $user = Auth::user();
        $user->fill($request->all());
        $user->save();
        
        return redirect()->back()->with(['message' => '更新しました！']); //redirect()->back() で前の URL にリダイレクト with() で変数と値をセッションに保持
    }
}
