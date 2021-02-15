<?php

use App\Models\LeadSource;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_sources', function (Blueprint $table) {
            $table->id();
            $table->string('lead_source')->nullable();
            $table->string('lead_source_ar')->nullable();
            $table->timestamps();
        });

        LeadSource::create([
            'lead_source' => 'Uploaded File',
            'lead_source_ar' => 'Uploaded File'
        ]);

        LeadSource::create([
            'lead_source' => 'Facebook',
            'lead_source_ar' => 'Facebook'
        ]);
        LeadSource::create(['lead_source' => 'Instagram', 'lead_source_ar' => 'Instagram']);
        LeadSource::create(['lead_source' => 'Personal', 'lead_source_ar' => 'Personal']);
        LeadSource::create(['lead_source' => 'Telemarketing', 'lead_source_ar' => 'Telemarketing']);
        LeadSource::create(['lead_source' => 'Referral', 'lead_source_ar' => 'Referral']);
        LeadSource::create(['lead_source' => 'OTG Website', 'lead_source_ar' => 'OTG Website']);
        LeadSource::create(['lead_source' => 'Linkedin', 'lead_source_ar' => 'Linkedin']);
        LeadSource::create(['lead_source' => 'Yellow Page', 'lead_source_ar' => 'Yellow Page']);
        LeadSource::create(['lead_source' => 'Personnel Recommendation', 'lead_source_ar' => 'Personnel Recommendation']);
        LeadSource::create(['lead_source' => 'Other', 'lead_source_ar' => 'Other']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_sources');
    }
}