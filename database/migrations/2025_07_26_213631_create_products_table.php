<?php

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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('xml_id')->unique();
            $table->boolean('available');
            $table->string('url');
            $table->decimal('price', 10, 2);
            $table->string('currency', 10);
            $table->unsignedBigInteger('category_id');
            $table->json('pictures')->nullable();
            $table->boolean('pickup')->nullable();
            $table->boolean('delivery')->nullable();
            $table->string('name');
            $table->string('name_ua')->nullable();
            $table->string('vendor')->nullable();
            $table->text('description')->nullable();
            $table->text('description_ua')->nullable();
            $table->json('params')->nullable();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
