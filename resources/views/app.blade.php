<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog Ql</title>

        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <script defer src="{{mix('js/app.js')}}"></script>
    </head>
    <body class="antialiased">
        <div id="app">

            <p>
                <router-link :to="{ name:'index' }">Index</router-link>
                <router-link to="/posts/1">Posts</router-link>
            </p>


            <router-view></router-view>

        </div>
    </body>
</html>
