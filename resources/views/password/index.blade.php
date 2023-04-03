<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PasswordReminder</title>
</head>
<body>
  <h1>PasswordReminder</h1>
  <p>{{ $name }}</p>
  <div>
    <form action="{{ route('password.search') }}" method="post">
      @csrf
      <label for="password-content">Search Password</label>
      <input type="text" name="site" id="site">        
      <button type="submit">Search</button>
    </form>
  </div>
  <div>
    <table style="background-color: bisque; border:1px solid black;">
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
</body>
</html>