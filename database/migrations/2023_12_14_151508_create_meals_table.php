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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->comment('ユーザーID');
            $table->bigInteger('tenant_id')->unsigned()->index()->comment('入居者ID');
            $table->integer('morning_main')->comment('朝主食');
            $table->integer('morning_side')->comment('朝おかず');
            $table->integer('lunch_main')->comment('昼主食');
            $table->integer('lunch_side')->comment('昼おかず');
            $table->integer('dinner_main')->comment('夕主食');
            $table->integer('dinner_side')->comment('夕おかず');
            $table->date('date')->comment('日付');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
