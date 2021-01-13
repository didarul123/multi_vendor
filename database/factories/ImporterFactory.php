<?php

namespace Database\Factories;

use App\Models\Importer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;


class ImporterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Importer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => 'importer',
            'name' => 'Importer Khan',
            'email' => 'importer@importer.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
