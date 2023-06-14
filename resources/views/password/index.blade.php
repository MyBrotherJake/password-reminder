@extends('layouts.layout')

@section('title', 'TOP | Password-Reminder')
    
@section('menubar')
  @parent
  <a href="/password">TOP</a>
@endsection

@section('content')

@if (session('feedback.success'))
    <p style="color:aqua;">{{ session('feedback.success') }}</p>
@endif

<!--<div class="flex mx-24 mb-5">  -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  gap-2.5 p-2" >
  <form action="{{ route('password.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label>Import CSV File</label>    
    <input type="file" accept=".csv" name="file">
    <button type="submit">Import</button>
  </form>  
  
  <form action="{{ route('password.search') }}" method="post">
    @csrf
    <label for="site">Search WebSite</label>
    <input type="text" name="site" id="site" class="border">        
    <button type="submit">Search</button>
  </form>  

  <form action="{{ route('password.show.create', ['id' => $newId]) }}" method="get">
    @csrf    
    <label>Create New Account</label>
    <button type="submit">CREATE</button>
  </form>
  
  <form action="{{ route('password.export') }}" method="post">
    @csrf    
    <label>Export CSV File</label>
    <button type="submit">Export</button>
  </form>
  
</div>

<hr size="1" />

<div class="grid grid-cols-3">
  @foreach ($passwords as $password)
    <div class="col">
      <details>
        <summary>
          {{ $password->site }}           
          <div class="flex mr-96 ml-2.5 mb-5">            
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
            <input type="text" name="maddr" id={{ "maddr".$password->id }} value="{{ $password->maddr }}" readonly>
            <button class="copy" onclick="onClickCopy('{{ addslashes('maddr'.$password->id) }}')">COPY</button>
          </dd>
          
          <dt>Account:</dt>
          <dd>
            <input type="text" name="account" id={{ "account".$password->id }} value="{{ $password->account }}" readonly>
            <button class="copy" onclick="onClickCopy('{{ addslashes('account'.$password->id) }}')">COPY</button>
          </dd>          
          
          <dt>Password:</dt>
          <dd>
            <input type="password" name="pass" id={{ "pass".$password->id }} value="{{ $password->pass }}" readonly>
            <button class="copy" onclick="onClickCopy('{{ addslashes('pass'.$password->id) }}')">COPY</button>
          </dd>
          
          <dt>Other:</dt>
          <dd>            
            <textarea name="bikou" id={{ "bikou".$password->id }} cols="30" rows="10" class="border-solid border" readonly>{{ $password->bikou }}</textarea>
            <button class="copy" onclick="onClickCopy('{{ addslashes('bikou'.$password->id) }}')">COPY</button>
          </dd>              
        </dl>        
      </details>    
    </div>
  @endforeach  
</div>  
@endsection

@section('footer')
copyright 2023 jake
@endsection
