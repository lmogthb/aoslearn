<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnadirRoleCampo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('rol')->default('user');;
        });
    }

    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('rol');
        });
    }
}
