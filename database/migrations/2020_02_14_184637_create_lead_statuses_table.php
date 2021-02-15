<?php

use App\Models\LeadStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_statuses', function (Blueprint $table) {

            $table->id();

            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();

            $table->timestamps();
        });

        LeadStatus::create(
            [

                'name_en' => 'busy',
                'name_ar' => 'مشغول',
            ]
        );
        LeadStatus::create(
            [

                'name_en' => 'call_later',
                'name_ar' => 'اتصل لاحقا',
            ]
        );

        LeadStatus::create(
            [

                'name_en' => 'no_answer',
                'name_ar' => 'لا اجابه',
            ]
        );

        LeadStatus::create(
            [

                'name_en' => 'not_interested',
                'name_ar' => 'غير مهتم',
            ]
        );
        LeadStatus::create(
            [

                'name_en' => 'out_of_service',
                'name_ar' => 'خارج الخدمه',
            ]
        );
        LeadStatus::create(
            [

                'name_en' => 'product_not_available',
                'name_ar' => 'المنتج غير متوفر',
            ]
        );

        LeadStatus::create(
            [

                'name_en' => 'switched_off',
                'name_ar' => 'مغلق',
            ]
        );



        LeadStatus::create(
            [

                'name_en' => 'undefined',
                'name_ar' => 'غير معروف',
            ]
        );

        LeadStatus::create(
            [

                'name_en' => 'whatsapp',
                'name_ar' => 'واتساب',
            ]
        );
        LeadStatus::create(
            [

                'name_en' => 'wrong_number',
                'name_ar' => 'رقم خاطي',
            ]
        );

        LeadStatus::create(
            [

                'name_en' => 'yes_interested',
                'name_ar' => 'مهتم',
            ]
        );

        LeadStatus::create(
            [

                'name_en' => 'yes_not_qualified',
                'name_ar' => 'غير مؤهل',
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_statuses');
    }
}