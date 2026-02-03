<?php

use App\Enums\PropertyStatus;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('arabic_title');
            $table->text('short_description')->nullable();
            $table->text('arabic_short_description')->nullable();
            $table->text('description');
            $table->text('arabic_description');
            $table->string('slug')->unique();

            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('property_location');

            $table->json('tags')->nullable();
            $table->boolean('is_featured')->default(0);

            $table->unsignedBigInteger('category_id');
            $table->boolean('status')->default(1);
            $table->timestamps();
            
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
