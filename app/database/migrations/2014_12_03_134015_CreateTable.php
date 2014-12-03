<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
/*
|--------------------------------------------------------------------------
| Migration CreateTable
|--------------------------------------------------------------------------
|
| ici le script de migration pour recrée la bdd originel à modifier.
| ci dessous les differente etape pour se servir de la migration : ( commencer par l'etape 2)
| 1-moi$ php artisan migrate:make CreateTable
| permet de cree se fichier avec les fonction up et down empty 
| apres voir rempli se fichier et supprimer toute les tables de la bdd
| 2-moi$ php artisan migrate
| lance le fichier de migration
| 3-moi$ php artisan migrate:rollback
| permet de revenir en arriere ( supprime la migration ( en cas d'erreur ou de clean)
| refaire etape 2 pour recrée la table
|
|
*/
class CreateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('users',function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('nom');
				$table->string('prenom');
				$table->string('password');
				$table->timestamps();

			});
			Post::create([
				'nom' => "root",
				'prenom' => "root",
				'password' => "63a9f0ea7bb98050796b649e85481845"
			]	);

			Schema::create('librairies',function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('code');
				$table->string('createur');
				$table->string('slug');
				$table->string('actif');
				$table->timestamps();

			});
			Schema::create('historiques',function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('torrent');
				$table->string('user');
				$table->timestamps();

			});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
			Schema::drop('users');
			Schema::drop('librairies');
			Schema::drop('historiques');
	}

}
