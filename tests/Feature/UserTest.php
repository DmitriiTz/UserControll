<?php

namespace Tests\Feature;

use App\City;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testCityCreate()
    {
        $cities = factory(City::class, 10)->create();
        $this->assertTrue(!empty($cities));
    }

    public function testUserCreate()
    {
        Session::start();
        $citi = factory(City::class)->create();
        $data = [
            "_token" => csrf_token(),
            "_method" => 'POST',
            "first_name" => 'first_name',
            "second_name" => 'second_name',
            "patronymic" => 'patronymic',
            "email" => 'email@test',
            "city_id" => $citi->id
        ];

        $response = $this->post(route('users.store'), $data);

        $response->assertStatus(302);
    }

    public function testUserUpdate()
    {
        Session::start();
        $citi = factory(City::class)->create();

        $user = factory(User::class)->create([
            "first_name" => 'first_name',
            "second_name" => 'second_name',
            "patronymic" => 'patronymic',
            "email" => 'email@test',
            "city_id" => $citi->id,
        ]);

        $data = [
            "_token" => csrf_token(),
            "_method" => 'POST',
            "first_name" => 'first_name',
            "second_name" => 'second_name',
            "patronymic" => 'patronymic',
            "email" => 'email@test',
            "city_id" => $citi->id
        ];

        $response = $this->put(route('users.update', ['user' => $user->id]), $data);

        $response->assertStatus(302);
    }
}


