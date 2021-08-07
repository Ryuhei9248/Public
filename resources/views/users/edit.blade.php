@extends('layouts.app')

@section('content')
<div style="margin-left:15px; margin-bottom:15px">
@foreach($errors->all() as $message)
  <div>{{ $message }}</div>
@endforeach

@if(Session::has('message'))
  <div>{{ Session::get('message') }}</div>
@else
変更ボタンを押してください
@endif
</div>

<form method="POST" action="{{ route('users.update') }}" >
    <div class="form-group col-md-4">
    @csrf
    <label>名前</label>
    <input type="text" class="form-control" name="name" value="{{ $user->name }}" /> <!-- <input>タグではフォームデータがこの名前とデータがセットで送信される -->
    </div>
    <div class="form-group col-md-4">
    <label>メールアドレス</label>
    <input name="email" type="email" class="form-control" value="{{ $user->email }}" />
    </div>
    <button type="submit" class="btn btn-primary" style="margin-left:15px">変更</button>
</form>
@endsection