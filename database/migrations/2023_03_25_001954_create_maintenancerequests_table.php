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
        Schema::create('maintenancerequests', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->integer('folio');
            $table->date('requestDate');
            $table->unsignedBigInteger('personaldata_id');
            $table->foreign('personaldata_id')->references('id')->on('personaldatas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('requestDescription');
            $table->enum('status',['Pendiente','Por liberar','Liberada']);
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
        Schema::dropIfExists('maintenancerequests');
    }
};
