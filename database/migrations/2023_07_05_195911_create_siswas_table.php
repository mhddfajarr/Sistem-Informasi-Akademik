<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('nip');
            $table->string('nama_siswa');
            $table->string('tmpt_tgl_lahir')->nullable();
            $table->enum('jenis_kel', ['Laki-laki', 'Perempuan']);
            $table->foreignId('kelas_id');
            $table->text('alamat')->nullable();
            $table->bigInteger('no_hp')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('agama')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('foto')->nullable()->default('default.png');
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
        Schema::dropIfExists('siswas');
    }
}
