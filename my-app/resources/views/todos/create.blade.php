<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="p-4 space-y-4 max-w-md">
  <div class="flex items-center gap-4">
    <h1 class="text-2xl font-bold">Create Todo</h1>
    <span class="flex-1"></span>
    <a href="{{ route('todo.home') }}" class="bg-orange-300 hover:bg-orange-500 p-1 border rounded">Back</a>
    {{-- logout --}}
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button class="p-1 border rounded bg-rose-300 hover:bg-rose-500">Logout</button>
    </form>
  </div>
  <form action="{{ route('todo.store') }}" class="flex flex-col space-y-4" method="POST">
    @csrf
    <input class="p-1 border rounded" type="text" name="title" placeholder="Title">
    <textarea class="p-1 border rounded" name="description" placeholder="Description"></textarea>
    <input class="p-1 border rounded bg-sky-400 hover:bg-sky-600" type="submit" value="Create">
  </form>
  {{-- errors --}}
  @if ($errors->any())
    <ul class="p-4 border rounded bg-red-100 text-red-500">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif
</body>

</html>
