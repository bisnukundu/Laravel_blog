<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'teams', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->string( 'name' );
            $table->text( 'about' );
            $table->string( 'profession' );
            $table->string( 'facebook' )->nullable;
            $table->string( 'twitter' )->nullable;
            $table->string( 'google_plus' )->nullable;
            $table->string( 'image' );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'teams' );
    }
}
