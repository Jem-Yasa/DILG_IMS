<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('office'); // Matches the "Office" dropdown
            $table->string('ics_rrsp_no')->nullable(); // Matches "ICS/RRSP No."
            $table->string('article_inventory_type'); // Matches "Article Inventory Type"
            $table->text('description'); // Matches "Description"
            $table->string('unit_measure'); // Matches "Unit of Measure"
            $table->decimal('unit_value', 10, 2); // Matches "Unit Value"
            $table->integer('quantity'); // Matches "Quantity"
            $table->decimal('total_cost', 10, 2); // Matches "Total Cost"
            $table->string('inventory_item_no')->nullable(); // Matches "Inventory Item No."
            $table->date('date_acquired'); // Matches "Date Acquired"
            $table->string('estimated_useful_life')->nullable(); // Matches "Estimated Useful Life"
            $table->string('accountable_officer'); // Matches "Accountable Officer"
            $table->string('status')->nullable(); // Matches "Status"
            $table->text('remarks')->nullable(); // Matches "Remarks"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
