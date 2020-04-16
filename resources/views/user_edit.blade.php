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
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref">
    <div class="content">
        <div class="title m-b-md">
            User Controll
        </div>

        <div>
            <form action="" method="post">
                <input name="first_name" value="{{$user->first_name}}" placeholder="Имя" required>
                <input name="second_name" value="{{$user->second_name}}" placeholder="Фамилия" required>
                <input name="patronymic" value="{{$user->patronymic}}" placeholder="Отчетсво">
                <input name="email" value="{{$user->email}}" placeholder="Email" required>
                <select name="city">
                    @foreach($cities as $city)
                        <option value="{{$city->name}}" {{(old("city") == $city->name ? "selected":"")}}>{{$city->name}}</option>
                    @endforeach
                </select>
                <button type="submit">Найти</button>
                <a href="{{route('users.create')}}">Создать</a>
            </form>
        </div>
        <br>
    </div>
</div>
</body>
</html>
