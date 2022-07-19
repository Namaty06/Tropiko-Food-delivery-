<?php

use App\Models\Vendor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('orderPhone');
            $table->string('orderEmail');
            $table->foreignId('city_id')->nullable()->constrained()->onDelete('set null');
            $table->string('address');
            $table->string('logo');         
            $table->time('open_time');
            $table->time('close_time');
            $table->foreignId('vendor_id')->constrained()->onDelete('cascade');
            $table->string('day_off')->nullable();

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
        Schema::dropIfExists('restaurants');
    }
}
