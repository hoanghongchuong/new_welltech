<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->default(0);
            $table->string('name_vi')->unique();
            $table->string('name_en')->unique();
            $table->string('slug_en')->unique();
            $table->string('slug_vi')->unique();
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->text('description_vi')->nullable();
            $table->text('description_en')->nullable();
            $table->text('content_vi')->nullable();
            $table->text('content_en')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
