<!DOCTYPE html>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <p>@{{ message }}</p>
                    <input v-model="message">
                    <button v-on:click="showCNHello">说中文！</button>
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>

                <div class="title list">
                    <input v-model="newTodo" v-on:keyup.enter="addTodo">
                    <ul>
                        <li v-for="todo in todos">
                            @{{ todo.text }}
                            <button v-on:click="removeTodo($index)">&times;</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        new Vue({
            el: '.title',
            data: {
                message: 'Hello MasterHo1228!'
            },
            methods: {
                showCNHello: function () {
                    this.message = '欢迎欢迎，热烈欢迎~~!';
                }
            }
        });

        new Vue({
            el: '.list',
            data: {
                newTodo: '',
                todos: [
                    { text: '从前有座山' },
                    { text: '山上有辆AE86' },
                    { text: 'AE86里面有个老司机' }
                ]
            },
            methods: {
                addTodo: function () {
                    var text = this.newTodo.trim();
                    if (text) {
                        this.todos.push({ text: text });
                        this.newTodo = ''
                    }
                },
                removeTodo: function (index) {
                    this.todos.splice(index, 1)
                }
            }
        })
    </script>
</html>
