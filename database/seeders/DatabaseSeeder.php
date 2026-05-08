<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pagina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',*/
            $user=new User();
            $user->name='Ruby Esmeralda Sosa Estrella';
            $user->email='ruby.estrella.775@gmail.com';
            $user->password = bcrypt('123456');
            $user->save();

            Pagina::factory(100)->create();
            /*
            $this->call([
                PaginasSeeder::class
            ]);*/
    }
}//para tener un conjunto de datos, que se levante y se guarde en la base de datos, si no se pasa la pagina, datos estaticos
