<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'comments', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->string( 'comment' );
            $table->unsignedInteger( 'posts_id' );
            $table->timestamps();
            $table->foreign( 'posts_id' )->references( 'id' )->on( 'posts' )->onDelete( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'comments' );
    }
}
