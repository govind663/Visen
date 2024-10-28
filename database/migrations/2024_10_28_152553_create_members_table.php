<?php

use App\Models\MeetOurMinds;
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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MeetOurMinds::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->string('memberName')->nullable();
            $table->string('memberPosition')->nullable();
            $table->text('memberDescription')->nullable();
            $table->text('socialMediaIcon')->nullable();
            $table->text('socialMediaLink')->nullable();
            $table->string('memberProfilePic')->nullable();
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
        Schema::dropIfExists('members');
    }
};
