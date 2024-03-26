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
        Schema::table('tenants', function (Blueprint $table) {
            $table->integer('age')->comment('年齢')->after('name');
            $table->date('birth')->comment('生年月日')->after('age');
            $table->string('address')->comment('住所')->after('birth');
            $table->string('tel', 20)->comment('電話番号')->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->dropColumn('age', 'birth', 'address', 'tel');
        });
    }
};
