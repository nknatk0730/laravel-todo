<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  {{-- ログイン中ユーザーのTodoをリスト表示。Todoが存在しない場合の画面も作る --}}
  <div>
    <h1>Todo List</h1>
    @if ($todos->isEmpty())
      <p>Todoがありません</p>
    @else
      <ul>
        @foreach ($todos as $todo)
          <li>
            <p>{{ $todo->title }}</p>
          </li>
        @endforeach
      </ul>
    @endif
</body>
</html>