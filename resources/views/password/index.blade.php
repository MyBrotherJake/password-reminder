@extends('layouts.layout')

@section('title', 'TOP | Password-Reminder')
    
@section('menubar')
  @parent
  <a href="/password">TOP</a>    
@endsection

@section('content')
<p>{{ $name }}</p>
<div class="search">
  <form action="{{ route('password.search') }}" method="post">
    @csrf
    <label for="password-content">Search WebSite</label>
    <input type="text" name="site" id="site">        
    <button type="submit">Search</button>
  </form>
</div>

<form action="{{ route('password.show.create') }}" method="get">
@csrf
<button type="submit">CREATE</button>
</form>

<div>
  <table>
    <tr>
      <th>ID</th>
      <th>WebSite</th>
      <th>Mail</th>
      <th>Account</th>
      <th>Password</th>
      <th>Other</th>
    </tr>
    @foreach ($passwords as $password)
      <tr>
        <td>{{ $password->id }}</td>
        <td>{{ $password->site }}</td>
        <td>{{ $password->maddr }}</td>
        <td>{{ $password->account }}</td>
        <td>{{ $password->pass }}</td>
        <td>{{ $password->bikou }}</td>
      </tr>        
    @endforeach
  </table>    
</div>  
@endsection

@section('footer')
copyright 2023 jake
@endsection
