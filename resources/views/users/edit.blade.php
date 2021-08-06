@foreach($errors->all() as $message)
  <div>{{ $message }}</div>
@endforeach

@if(Session::has('message'))
  <div>{{ Session::get('message') }}</div>
@else
  変更ボタンを押してください
@endif

<form method="POST" action="http://localhost:8000/me">
    @csrf
    <label>名前: </label><input type="text" name="name" value="{{ $user->name }}" /> <!-- <input>タグではフォームデータがこの名前とデータがセットで送信される -->
    <label>メールアドレス: </label><input name="email" type="email" value="{{ $user->email }}" />
    <button type="submit">変更</button>
</form>