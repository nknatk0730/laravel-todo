<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-4 max-w-md">
  {{-- ログイン中ユーザーのTodoをリスト表示。Todoが存在しない場合の画面も作る --}}
  <div class="space-y-4">
    <div class="flex">
      <h1>Todo List</h1>
      <span class="flex-1"></span>
      {{-- logout --}}
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="border rounded p-1 bg-rose-400 hover:bg-rose-600" type="submit">Logout</button>
      </form>
    </div>
    {{-- todo.createへ遷移 --}}
    <a href="{{ route('todo.create') }}" class="flex max-w-fit border rounded p-1 bg-blue-400 hover:bg-blue-600">Create</a>
    @if ($todos->isEmpty())
      <p>Todoがありません</p>
    @endif
    {{-- "completed"がfalseのTodoのみ表示 --}}
    @foreach ($todos as $todo)
      @if (!$todo->completed)
        <a class="flex border rounded p-1 bg-gray-200 hover:bg-gray-300" href="{{ route('todo.edit', ['todo' => $todo->id]) }}">{{ $todo->title }}</a>
      @endif
    @endforeach

  </div>



      {{-- <ul class="space-y-4">
        @foreach ($todos as $todo)
        @endforeach
      </ul> --}}
</body>
</html>