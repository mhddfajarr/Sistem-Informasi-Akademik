<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTataUsahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tata_usahas', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->bigInteger('nip');
            $table->string('nama_guru');
            $table->string('tmpt_tgl_lahir')->nullable();
            $table->enum('jenis_kel', ['Laki-laki', 'Perempuan'])->nullable();
            $table->text('alamat')->nullable();
            $table->bigInteger('no_hp')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('agama')->nullable();
            $table->string('foto')->default('default.png');
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tata_usahas');
    }
}
