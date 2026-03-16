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
        Schema::create('our_work_records', function (Blueprint $table) {
            $table->id();

            $table->string("short")->nullable();
            $table->text('description')->nullable();

            $table->date("date_from")->nullable();
            $table->date("date_to")->nullable();
            $table->string("author_name")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_work_records');
    }
};
