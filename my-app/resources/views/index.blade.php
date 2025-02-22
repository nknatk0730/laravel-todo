<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-4 space-y-4 h-dvh">
  <header>
    <h1 class="text-lg font-semibold">Todo App</h1>
  </header>
  <div class="flex-1 space-y-4">
    {{-- このアプリの説明 --}}
    <p>Todo Appは、タスクを管理するためのアプリです。</p>
    {{-- このアプリの使い方 --}}
    <h2>使い方</h2>
    <ol>
      <li>タスクを入力して「追加」ボタンをクリックする</li>
      <li>タスクを完了したら「完了」ボタンをクリックする</li>
      <li>タスクを削除したい場合は「削除」ボタンをクリックする</li>
    </ol>
    <div class="flex gap-8">
      {{-- 登録画面へ遷移するリンク --}}
      <a href="{{ route('register') }}" class="p-1 border rounded text-gray-100 bg-emerald-500 hover:bg-emerald-700">登録画面へ</a>
      {{-- ログイン画面へ遷移するボタン --}}
      <a href="{{ route('login') }}" class="p-1 border rounded text-gray-100 bg-sky-500 hover:bg-sky-700">ログイン画面へ</a>
    </div>
  </div>
  <footer class="sticky top-full">
    <div class="flex">
      <div class="flex items-center gap-4">
        {{-- このアプリの開発者 --}}
        <h2>開発者</h2>
        <p class="text-sm">Edo Murasaki</p>
      </div>
      <span class="flex-1"></span>
      {{-- このアプリのバージョン --}}
      <div class="flex items-center gap-4 text-sm text-gray-400">
        <h2>バージョン</h2>
        <p>1.0.0</p>
      </div>
    </div>
  </footer>
</body>
</html>