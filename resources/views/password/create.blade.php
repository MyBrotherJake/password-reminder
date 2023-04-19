@extends('layouts.layout')

@section('title', 'CREATE | Password-Reminder')
    
@section('menubar')
  @parent
  <a href="/password">TOP</a>    
@endsection

@section('content')
<p>{{ $name }}</p>

@error('site', 'mail', 'password')
  <p style="color: red">{{ $message }}</p>
@enderror

<div class="create">
  <form action="{{ route('password.create') }}" method="post">        
    @csrf
    <label for="site">WebSite</label>
    <input type="text" name="site" id="site" value={{ old('site') }}>        
    <label for="mail">Mail Address</label>
    <input type="text" name="mail" id="mail" value={{ old('mail') }}>
    <label for="account">Acount</label>
    <input type="text" name="account" id="account" value={{ old('account') }}>
    <label for="password">Password</label>
    <input type="text" name="password" id="password" value={{ old('password') }}>
    <label for="bikou">Other</label>
    <textarea name="bikou" id="bikou" cols="30" rows="10">{{ old('bikou') }}</textarea>  
    <button type="submit">CREATE</button>    
  </form>
</div>
@endsection

@section('footer')
copyright 2023 jake
@endsection
