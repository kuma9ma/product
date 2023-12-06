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
        Schema::create('vitals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->comment('ユーザーID');
            $table->bigInteger('tenant_id')->unsigned()->index()->comment('入居者ID');
            $table->float('kt')->nullable()->comment('熱');
            $table->integer('sbp')->nullable()->comment('収縮期血圧');
            $table->integer('dbp')->nullable()->comment('拡張期血圧');
            $table->integer('spo2')->nullable()->comment('血中酸素濃度');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vitals');
    }
};
