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
            // Check if the column 'status' exists before attempting to drop it
            if (Schema::hasColumn('collections', 'status')) {
                $table->dropColumn('status');
            }

            // Check if the column 'isActive' does not exist before attempting to add it
            if (!Schema::hasColumn('collections', 'isActive')) {
                $table->boolean('isActive')->default(true);
            }
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
