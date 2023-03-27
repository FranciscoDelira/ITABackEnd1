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
        Schema::create('workorders', function (Blueprint $table) {
            $table->id();
            $table->integer('orderFolio');
            $table->string('password');
            $table->enum('maintenanceType',['Interno','Externo']);
            $table->enum('serviceType',['Eléctrico','Plomería','Herrería','Pintura','Obra Civil','Otro']);
            $table->string('employeeName');
            $table->date('maintenanceDate');
            $table->string('jobDescription');
            $table->unsignedBigInteger('maintenancerequest_id');
            $table->foreign('maintenancerequest_id')->references('id')->on('maintenancerequests')->onDelete('cascade')->onUpdate('cascade');           
            $table->boolean('released');
            $table->date('releasedDate');
            $table->boolean('approved');
            $table->string('approversName');
            $table->date('dateApproved');
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
        Schema::dropIfExists('workorders');
    }
};
