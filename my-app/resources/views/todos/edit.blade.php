<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-4">
  {{-- Todoの編集画面 --}}
  <div class="space-y-4">
    <div class="flex">
      <h1>Edit Todo</h1>
      <span class="flex-1"></span>
      {{-- homeへ遷移 --}}
      <a href="{{ route('todo.home') }}" class="border rounded p-1 bg-blue-400 hover:bg-blue-600">Home</a>
    </div>
    <div>
      {{-- todoのデータを表示 --}}
      <h2>{{ $todo->title }}</h2>
      {{-- もしTodoに"descriptionが存在すれば表示"" --}}
      @if ($todo->description)
        <p class="text-sm text-gray-400">{{ $todo->description }}</p>
      @endif
    </div>
    {{-- todoの"completed"をtrueにする処理 --}}
    <form method="POST" action="{{ route('todo.update', ['todo' => $todo->id]) }}">
      @csrf
      @method('PUT')
      <button class="border rounded p-1 bg-green-400 hover:bg-green-600" type="submit">Complete</button>
    </form>
    {{-- errors --}}
    @if ($errors->any())
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    {{-- todoの削除処理 --}}
    <form method="POST" action="{{ route('todo.destroy', ['todo' => $todo->id]) }}">
      @csrf
      @method('DELETE')
      <button class="border rounded p-1 bg-rose-400 hover:bg-rose-600" type="submit">Delete</button>
    </form>
  </div>
</body>
</html>