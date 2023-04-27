@extends('layouts.layout')

@section('title', 'TOP | Password-Reminder')
    
@section('menubar')
  @parent
  <a href="/password">TOP</a>    
@endsection

@section('content')
<p>{{ $name }}</p>

@if (session('feedback.success'))
    <p style="color:aqua;">{{ session('feedback.success') }}</p>
@endif

<div class="search">
  <form action="{{ route('password.search') }}" method="post">
    @csrf
    <label for="password-content">Search WebSite</label>
    <input type="text" name="site" id="site">        
    <button type="submit">Search</button>
  </form>
</div>

<form action="{{ route('password.show.create', ['id' => 0]) }}" method="get">
@csrf
<button type="submit">CREATE</button>
</form>

<div>
  @foreach ($passwords as $password)
      <details>
        <summary>
          {{ $password->site }} 
          <div class="form-btn">            
            <form action="{{ route('password.show.create', ['id' => $password->id]) }}" method="get">
              @csrf
              <button type="submit">EDIT</button>
            </form>
            <form action="{{ route('password.delete', ['id' => $password->id]) }}" method="post">
              @method('DELETE')
              @csrf
              <button type="submit" onclick="return confirm('Do you want to delete?')">DELETE</button>
            </form>          
          </div>        
        </summary>        
        <dl>
          <dt>Mail Address:</dt>
          <dd><input type="text" name="maddr" value="{{ $password->maddr }}" readonly></dd>
          <dt>Account:</dt>
          <dd><input type="text" name="account" value="{{ $password->account }}" readonly></dd>
          <dt>Password:</dt>
          <dd><input type="text" name="pass" value="{{ $password->pass }}" readonly></dd>
          <dt>Other:</dt>
          <dd><textarea name="bikou"cols="30" rows="10" readonly>{{ $password->bikou }}</textarea></dd>                    
        </dl>        
      </details>
    
  @endforeach  
</div>  
@endsection

@section('footer')
copyright 2023 jake
@endsection
