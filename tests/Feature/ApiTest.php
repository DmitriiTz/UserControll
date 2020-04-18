<?php

namespace Tests\Feature;

use App\City;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $seed = new \DatabaseSeeder();
        $seed->run();

        $this->json('GET', route('api.index'))
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    "id",
                    "first_name",
                    "second_name",
                    "patronymic",
                    "email",
                    "city_id",
                    "created_at",
                    "updated_at",]
            ]);
    }

    public function testCityFilter()
    {
        $seed = new \DatabaseSeeder();
        $seed->run();

        $data = ["city_id" => 1];

        $this->json('GET', route('api.city'), $data)
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'first_name',
                    'second_name',
                    'patronymic',
                    'email',
                    'city_id',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    public function testNameFilter()
    {
        $seed = new \DatabaseSeeder();
        $seed->run();

        $data = ["name" => 'first_name second_name patronymic'];
        $response = $this->json('GET', route('api.name'), $data)
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'first_name',
                    'second_name',
                    'patronymic',
                    'email',
                    'city_id',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }
}
