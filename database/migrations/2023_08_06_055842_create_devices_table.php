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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_location_description');
            $table->enum('device_protocol', ['Mb_TCP', 'Mb_RTU', 'API']);
            $table->ipAddress('device_IP_address');
            $table->integer('device_IP_port');
            $table->integer('device_RTU_address');
            $table->json('device_schema');
            $table->string('device_collector_name')->unique();
            $table->enum('device_collector_status',[null, 'inactive', 'active'])->nullable();
            $table->foreignId('site_id')->constrained();
            $table->foreignId('image_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
