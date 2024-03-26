<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('person_id')->unique();
            $table->string('email')->unique();
            $table->text('password');
            $table->string('plain_password')->nullable();
            $table->enum('role', ['student', 'teacher', 'admin'])->default('student');
            $table->string('admission_year')->default('');
            $table->rememberToken();
            $table->timestamps();
        });

        // Создание администратора - для того, чтобы был изначальный пользователь-админ
        \App\Models\User::create([
            'person_id' => 'admin',
            'email' => 'admin@ulstu.com',
            'password' => bcrypt('admin'),
            'plain_password' =>'admin',
            'role' => 'admin',
            'admission_year' => 'admin',
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
