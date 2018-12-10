<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>

        <link rel="icon" type="image/x-icon" href="/favicon.ico">

        <title>{{ config('app.name', '综合查询系统') }}</title>

        <script src="http://localhost:8098"></script>
        <script type='text/javascript'>
            // 全局JavaScript变量
            // 我们会将其添加到 Axios 请求头，以便在每个请求中传递来阻止恶意请求
             window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>

        <div id="app">
            <router-view></router-view>
        </div>

        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    </body>
</html>