<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 40vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            User Controll
        </div>

        <div>
            <form action="" method="post">
                <input name="name">
                <select name="city">
                    @foreach($cities as $city)
                        <option value="{{$city->name}}"></option>
                    @endforeach
                </select>
                <button type="submit">Найти</button>
            </form>
        </div>

        <div>
            <table style="width: -webkit-fill-available">
                <thead>
                <tr>
                    <th>ФИО</th>
                    <th>Город</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($users as $user)
                        <td>{{$user->name}}</td>
                        <td>{{$user->city}}</td>
                        <td><a href="{{route('user.destroy', $user->id)}}">Удалить</a></td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
