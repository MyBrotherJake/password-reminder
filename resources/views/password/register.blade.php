@extends('layouts.layout')

@section('title', 'CREATE | Password-Reminder')
    
@section('menubar')
  @parent
  <a href="/password">TOP</a>    
@endsection

@section('content')
<p>{{ $name }}</p>

@error('site')
  <p style="color: red">Required the WebSite.</p>
@enderror

@error('mail')
  <p style="color: red">Required the Mail Address.</p>
@enderror

@error('password')
  <p style="color: red">Required the Password.</p>
@enderror

<div class="create">
  <form action="{{ route('password.create', ['id' => $id]) }}" method="post">        
    @csrf
    <label for="site">WebSite</label>
    <input type="text" name="site" id="site" value={{ $values->site }}>        
    <label for="mail">Mail Address</label>
    <input type="text" name="mail" id="mail" value={{ $values->maddr }}>
    <label for="account">Acount</label>
    <input type="text" name="account" id="account" value={{ $values->account }}>
    <label for="password">Password</label>
    <input type="text" name="password" id="password" value={{ $values->pass }}>
    <label for="bikou">Other</label>
    <textarea name="bikou" id="bikou" cols="30" rows="10">{{ $values->bikou }}</textarea>  
    <button type="submit">REGISTER</button>    
  </form>
</div>
@endsection

@section('footer')
copyright 2023 jake
@endsection
