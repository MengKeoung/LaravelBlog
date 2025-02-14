<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key (id)
            $table->string('title');  // Blog title
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');  // Foreign key to categories table
            $table->text('content');  // Content of the blog post
            $table->timestamp('creation')->nullable();  // Custom creation timestamp
            $table->timestamp('modified')->nullable();  // Custom modified timestamp
            $table->timestamps();  // created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
