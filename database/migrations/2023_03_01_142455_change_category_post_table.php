<?php

use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('category_post', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->foreignIdFor(Post::class)->change()->references('id')->on('posts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category_post', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->foreignId('post_id')->change()->references('id')->on('posts');
        });
    }
};
