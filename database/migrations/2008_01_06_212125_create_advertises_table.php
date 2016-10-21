<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
<<<<<<< HEAD
            $table->integer('role_id')->unsigned()->index()->foreign()->references("id")->on("roles")->onDelete("cascade");
            $table->integer('user_id')->unsigned()->index()->foreign()->references("id")->on("users")->onDelete("cascade");
=======
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
            $table->string('ads_title')->unique();
            $table->string('ads_content');
            $table->boolean('is_active')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->string('ads_image');
            $table->string('image_path');
            $table->string('image_extension', 10);
            $table->integer('ads_price');
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
        Schema::drop('category_types');
    }
}
