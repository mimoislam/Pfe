<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scan_engs', function (Blueprint $table) {
            $table->id();
            $table->string('ipAddress');
            $table->enum('status',\App\Enums\ScanEngStatus::getValues())->default(\App\Enums\ScanEngStatus::RESTING);
            $table->integer('port');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scan_engs');
    }
};
