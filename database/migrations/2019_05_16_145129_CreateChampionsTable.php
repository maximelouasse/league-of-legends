<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChampionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avatars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('url');
		});
		
		Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key', 64);
            $table->timestamps();
            $table->string('name', 64);
		});
		
		Schema::create('summoner_spells', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 64);
		});
		
		Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('key', 64);
            $table->string('name', 64);
			$table->unsignedInteger('champion_id')->nullable();
			$table->foreign('champion_id')->references('id')->on('champions')->onDelete('cascade');
		});
		
		Schema::create('champions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->string('name', 64);
			$table->unsignedInteger('avatar_id')->nullable();
            $table->foreign('avatar_id')->references('id')->on('avatars')->onDelete('cascade');
		});
		
		Schema::create('champion_item', function(Blueprint $table)
		{
			$table->integer('champion_id')->unsigned()->nullable();
			$table->foreign('champion_id')->references('id')->on('champions')->onDelete('cascade');
			$table->integer('item_id')->unsigned()->nullable();
			$table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
			$table->timestamps();
		});

		Schema::create('champion_spell', function(Blueprint $table)
		{
			$table->integer('champion_id')->unsigned()->nullable();
			$table->foreign('champion_id')->references('id')->on('champions')->onDelete('cascade');
			$table->integer('summoner_spell_id')->unsigned()->nullable();
			$table->foreign('summoner_spell_id')->references('id')->on('summoner_spells')->onDelete('cascade');
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
		Schema::dropIfExists('avatar');
		Schema::dropIfExists('items');
		Schema::dropIfExists('summoner_spells');
		Schema::dropIfExists('skills');
		Schema::dropIfExists('champions');
		Schema::dropIfExists('champions_list_items');
		Schema::dropIfExists('champions_list_spells');
    }
}
