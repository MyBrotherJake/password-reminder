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

<div class="form-btn" style="margin-bottom:20px;">
  <form action="{{ route('password.search') }}" method="post">
    @csrf
    <label for="password-content">Search WebSite</label>
    <input type="text" name="site" id="site">        
    <button type="submit">Search</button>
  </form>
  <form action="{{ route('password.show.create', ['id' => 0]) }}" method="get">
    @csrf
    <button type="submit">CREATE</button>
  </form>
</div>
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
          <dd>
            <input type="text" name="maddr" id="maddr" value="{{ $password->maddr }}" readonly>
            <button class="copy" onclick="onClickCopy('maddr')">COPY</button>
          </dd>
          
          <dt>Accou1nt:</dt>
          <dd>
            <input type="text" name="account" id="account" value="{{ $password->account }}" readonly>
            <button class="copy" onclick="onClickCopy('account')">COPY</button>
          </dd>          
          
          <dt>Password:</dt>
          <dd>
            <input type="text" name="pass" id="pass" value="{{ $password->pass }}" readonly>
            <button class="copy" onclick="onClickCopy('pass')">COPY</button>
          </dd>
          
          <dt>Other:</dt>
          <dd>            
            <textarea name="bikou" id="bikou" cols="30" rows="10" readonly>{{ $password->bikou }}</textarea>
            <button class="copy" onclick="onClickCopy('bikou')">COPY</button>
          </dd>                              
          
        </dl>        
      </details>
    
  @endforeach  
</div>  
@endsection

@section('footer')
copyright 2023 jake
@endsection
