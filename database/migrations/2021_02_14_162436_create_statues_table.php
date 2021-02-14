<?php

use App\Models\Statue;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statues', function (Blueprint $table) {
            $table->id();
            $table->string('status_en')->nullable();
            $table->string('status_ar')->nullable();
            $table->timestamps();
        });

        Statue::create(
            [

                'status_en' => 'answered',
                'status_ar' => 'تم الاجابه عليها',
            ]
        );

        Statue::create([

            'status_en' => 'closed',
            'status_ar' => 'مغلقه',
        ]);
        Statue::create([

            'status_en' => 'opened',
            'status_ar' => 'بدء العمل بها',
        ]);
        Statue::create([

            'status_en' => 'in_progress',
            'status_ar' => 'قيد العمل',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statues');
    }
}
