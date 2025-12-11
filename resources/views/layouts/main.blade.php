<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("header-title")</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @if($errors->any())
        <div class="block-error">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield("content")
</body>
</html>
