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
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('Employee_No.')->nullable()->index();
            $table->text('First_Name')->nullable();
            $table->text('Middle_Name')->nullable();
            $table->longText('Last_Name');
          
        });
    }

    /**
     * Reverse the migrations.
     *bu
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
};
