<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if (!Schema::hasTable('store_files')) {
            Schema::create('store_files', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('Name');
                $table->string('fileName');
                $table->bigInteger('userId');
                $table->float('fileSize', 10, 6);
                $table->string('extention');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_files');
    }
}
