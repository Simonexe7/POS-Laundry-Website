<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('namaUser', 100);
            $table->string('username', 30)->unique();
            $table->timestamp('username_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('id_outlet')->constrained('outlet');
            $table->enum('role', ['admin', 'kasir', 'owner']);
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
        Schema::dropIfExists('user');
    }
};
