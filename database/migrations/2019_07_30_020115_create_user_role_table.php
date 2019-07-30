<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id', 'fk_userrole_rol')
            ->references('id')->on('role')
            ->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_userrole_user')
            ->references('id')->on('user')
            ->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('estado');
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
        Schema::dropIfExists('user_role');
    }
}
