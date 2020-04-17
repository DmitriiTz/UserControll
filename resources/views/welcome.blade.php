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
            <form method="post" action="{{route('users.store')}}">
                @csrf
                @method('POST')
                <input name="first_name" placeholder="Имя" required>
                <input name="second_name" placeholder="Фамилия" required>
                <input name="patronymic" placeholder="Отчетсво">
                <input name="email" placeholder="Email" required>
                <select name="city_id">
                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
                <button type="submit">Создать пользователя</button>
            </form>
        </div>
        <br>
        <hr>
        <div>
            <table style="text-align: left">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>Email</th>
                    <th>Город</th>
                    <th>Действия</th>
                </tr>
                <tr>
                    <th></th>
                    <th>
                        <form method="get" action="{{route('index')}}">
                            <input name="name" placeholder="Введите ФИО">
                            <button type="submit">Найти</button>
                        </form>
                    </th>
                    <th></th>
                    <th>
                        <form method="get" action="{{route('index')}}">
                            <select name="city_id">
                                <option value="">Все</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit">Сортировать</button>
                        </form>
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->city->name}}</td>
                        <td>
                            <form method="GET" action="{{route('users.edit', $user->id)}}">
                                <button type="submit">Редактировать</button>
                            </form>
                        <td>
                            <form method="POST" action="{{route('users.destroy', $user->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
