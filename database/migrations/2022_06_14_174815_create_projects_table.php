<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("title")->unique();
            $table->text("description");
            $table->string("image_link");
            $table->string("live_url");
            $table->string("github_url")->nullable();
            $table->text("roles_json");
            $table->text("technologies_json");
            $table->boolean("is_featured");
            $table->timestamps();
            $table->integer("order");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
