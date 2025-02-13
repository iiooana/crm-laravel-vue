<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    protected $class = User::class;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Ioana',
            'last_name' => 'M',
            'password' => 'HelloIoana!2',   

        ]);
        User::factory()->count(2)->create();
    }
}
