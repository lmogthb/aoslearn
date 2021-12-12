<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Solicitud;
use App\Models\Recurso;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        self::seedCategorias();
        $this->command->info('Tabla categorias inicializada con datos!');

        self::seedRecursos();
        $this->command->info('Tabla recursos inicializada con datos!');

		self::seedUsers();
		$this->command->info('Tabla usuarios inicializada con datos!');

		self::seedSolicitudes();
		$this->command->info('Tabla solicitudes inicializada con datos!');
    }

	private function seedCategorias(){
        DB::table('categorias')->delete();

		$categoria = new Categoria;
		$categoria->id_categoria = 1;
		$categoria->nombre_categoria = 'Python';
		$categoria->save();

	}

    private function seedRecursos(){
        DB::table('recursos')->delete();

		$recurso = new Recurso;
		$recurso->title = 'Programacion en Python';
		$recurso->video = 'https://www.youtube.com/watch?v=gOR9qZ3ZgwA';
		$recurso->autor = 'Victor Robles';
		$recurso->id_categoria = 1;
		$recurso->save();
    }

	private function seedSolicitudes(){
        DB::table('solicitudes')->delete();

		$solicitud = new Solicitud;
		$solicitud->title = 'Programacion en Python';
		$solicitud->video = 'https://www.youtube.com/watch?v=gOR9qZ3ZgwA';
		$solicitud->autor = 'Victor Robles';
		$solicitud->id_categoria = 1;
		$solicitud->save();
    }

	private function seedUsers(){
		DB::table('users')->delete();
		$user = new User;
		$user->name = 'Alejandro';
		$user->email = 'alejandro@gmail.com';
		$user->password = bcrypt('alejandro');
		$user->rol = 'admin';
		$user->save();

		$user2 = new User;
		$user2->name = 'Manolo';
		$user2->email = 'manolo@gmail.com';
		$user2->password = bcrypt('manolo');
		$user2->rol = 'user';
		$user2->save();
	}
}
