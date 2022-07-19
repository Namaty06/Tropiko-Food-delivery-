<?php

use App\Models\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('role');
            $table->timestamps();
        });
      /*  $data =  array(
            [
                'status' => 'Category1',
            ],
            [
                'name' => 'Category2',
            ],
            [
                'name' => 'Category3',
            ],
        );
        foreach ($data as $datum){
            $category = new Status(); //The Category is the model for your migration
            $category->name =$datum['name'];
            $category->save();
        }*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
