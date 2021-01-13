<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;


class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => 'admin',
            'name' => 'Didarul Islam Akand',
            'email' => 'admin@admin.com',
            'bkash' => '008801700000000',
            'nagad' => '008801700000000',
            'bank_name' => 'Datch Bangla Bank',
            'bank_branch' => 'Narshingdi',
            'bank_account' => '00155500044000',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
