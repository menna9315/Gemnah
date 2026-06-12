<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GEMNAH</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #172033;
        }

        main {
            width: min(760px, calc(100% - 32px));
        }

        a {
            color: #155eef;
            font-weight: 700;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <main>
        <h1>Frontend Module</h1>
        <p>The public frontend module is ready.</p>
        <p><a href="{{ route('backend.login') }}">Open backend login</a></p>
    </main>
</body>
</html>
