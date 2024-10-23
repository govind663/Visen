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
        Schema::create('investors_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('investor_image')->nullable();
            $table->string('investor_designation')->nullable();
            $table->text('investor_address')->nullable();
            $table->string('investor_name')->nullable();
            $table->string('investor_email')->nullable();
            $table->string('investor_tel')->nullable();
            $table->string('investor_fax')->nullable();
            $table->string('investor_website')->nullable();
            $table->string('status')->nullable()->comment('1 => Active, 2 => Inactive');
            $table->integer('inserted_by')->nullable();
            $table->timestamp('inserted_at')->nullable();
            $table->integer('modified_by')->nullable();
            $table->timestamp('modified_at')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investors_contacts');
    }
};
