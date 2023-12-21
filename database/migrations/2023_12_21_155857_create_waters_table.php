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
        Schema::create('waters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->comment('ユーザーID');
            $table->bigInteger('tenant_id')->unsigned()->index()->comment('入居者ID');
            $table->string('name', 255)->comment('水分名');
            $table->integer('water')->comment('水分量');
            $table->date('date')->comment('日付');
            $table->time('time')->comment('時間');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waters');
    }
};
