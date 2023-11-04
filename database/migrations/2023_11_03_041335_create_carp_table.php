<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\softDeletes;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carp', function (Blueprint $table) {
            $table->id();
            $table->string('carp_code', 15);
            $table->bigInteger('initiator_id')->unsigned()->index();
            $table->foreign('initiator_id')->references('id')->on('employees')->onDelete('cascade');
            $table->bigInteger('recipient_id')->unsigned()->index();
            $table->foreign('recipient_id')->references('id')->on('employees')->onDelete('cascade');
            $table->bigInteger('verified_by')->unsigned()->index()->nullable();
            $table->foreign('verified_by')->references('id')->on('employees')->onDelete('cascade');
            $table->date('due_date');
            $table->enum('effectiveness', ['Effective', 'Not Effective'])->nullable();
            $table->date('status_date');
            $table->enum('stage', ['Open', 'Closed', 'Voided', 'Re-Open', 'Responded', 'Verified']);
            $table->enum('status', ['Open', 'Closed', 'Canceled']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carp');
    }
};
