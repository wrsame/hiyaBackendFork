<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //status kolonnen er ændret til isActive bool

    public function up(): void
    {
        Schema::table('collections', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->boolean('isActive')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('collections', function (Blueprint $table) {
            //
        });
    }
};
