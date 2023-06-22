@extends('layouts.layout')

@section('title', 'TOP | Password-Reminder')
    
@section('menubar')
  @parent
  <a href="/">TOP</a>
@endsection

@section('content')

@if (session('feedback.success'))
    <p style="color:aqua;">{{ session('feedback.success') }}</p>
@endif

<div class="menu grid grid-cols-1 sm:grid-cols-2 gap-2.5" >
  <form action="{{ route('password.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label>Import CSV File</label>    
    <button type="submit" class="float-right sm:float-none">Import</button>
    <input type="file" accept=".csv" name="file" class="w-64 md:w-auto" />    
  </form>  
 
  <form action="{{ route('password.export') }}" method="post" class="pt-1">
    @csrf    
    <label>Export CSV File</label>
    <button type="submit"class="float-right sm:float-none">Export</button>
  </form>

  <form action="{{ route('password.search') }}" method="post">
    @csrf
    <label for="site">Search WebSite</label>
    <button type="submit"class="float-right sm:float-none mt-2">Search</button>
    <input type="text" name="site" id="site" class="w-32 md:w-64" />          
  </form>  

  <form action="{{ route('password.show.create', ['id' => $newId]) }}" method="get" class="pt-1">
    @csrf    
    <label>Create Account</label>
    <button type="submit"class="float-right sm:float-none">CREATE</button>
  </form>  
</div>

<hr size="1" />

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
  @foreach ($passwords as $password)    
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
  @endforeach  
</div>  
@endsection

@section('footer')
copyright 2023 MyBrotherJake
@endsection
