<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

            public function up()
            {
                Schema::create('blog_post_tag', function (Blueprint $table) {
                    $table->id(); // Primary key

                    $table->unsignedBigInteger('blog_post_id');
                    $table->foreign('blog_post_id')->references('id')->on('blog_posts')->onDelete('cascade');

                    $table->unsignedBigInteger('tag_id');
                    $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

                    $table->unique(['blog_post_id', 'tag_id']); // Ensure the combination of blog_post_id and tag_id is unique
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
        Schema::dropIfExists('blog_post_tag');
    }
}
