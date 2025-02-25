<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_type');
            $table->string('entry_name');
            $table->date('date_acquired');
            $table->string('ics_rrsp_no')->nullable();
            $table->string('reference')->nullable();
            $table->string('semi_expendable_name')->nullable();
            $table->string('semi_expendable_no')->nullable();
            $table->text('item_description')->nullable();
            $table->string('estimated_useful_life')->nullable();
            $table->string('status')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('office_officer')->nullable();
            $table->decimal('amount', 10, 2);
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
