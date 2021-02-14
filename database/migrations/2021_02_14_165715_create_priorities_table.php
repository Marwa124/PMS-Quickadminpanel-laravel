<?php

use App\Models\Priority;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrioritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->string('priority_en')->nullable();
            $table->string('priority_ar')->nullable();
            $table->timestamps();
        });


        Priority::create(
            [

                'priority_en' => 'High',
                'priority_ar' => 'مرتفع',
            ]
        );

        Priority::create([

            'priority_en' => 'Medium',
            'priority_ar' => 'متوسط',
        ]);
        Priority::create([

            'priority_en' => 'Low',
            'priority_ar' => 'منخفض',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priorities');
    }
}
