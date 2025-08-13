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
        Schema::table('cerpens', function (Blueprint $table) {
            //
            $table->string('writer')->nullable()->after('judul');
            $table->string('class')->nullable()->after('writer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cerpens', function (Blueprint $table) {
            //
            $table->dropColumn(['writer', 'class']);
        });
    }
};
