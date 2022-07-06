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
        Schema::create('audit_server', function (Blueprint $table) {
            $table->id();
            $table->integer('audit_id');
            $table->integer('server_id');
            $table->integer('playbook_id');
            $table->string('ipAddress');
            $table->bigInteger('regex_id');

            $table->enum('status',\App\Enums\AuditServerStatus::getValues())->default(\App\Enums\AuditServerStatus::WORKING);

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
        Schema::dropIfExists('audit_server');
    }
};
