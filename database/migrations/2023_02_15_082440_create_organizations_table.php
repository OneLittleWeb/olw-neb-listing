<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('Slug')->unique();
            $table->string('County');
            $table->string('City');
            $table->text('GMapsLink')->nullable();
            $table->string('OrganizationName')->nullable();
            $table->string('OrganizationGMapsId')->nullable();
            $table->string('RateStars')->nullable();
            $table->string('ReviewsTotalCount')->nullable();
            $table->string('OrganizationCategory')->nullable();
            $table->string('OrganizationAddress')->nullable();
            $table->string('OrganizationWebsite')->nullable();
            $table->string('OrganizationPhoneNr')->nullable();
            $table->string('OrganizationPlusCode')->nullable();
            $table->text('OrganizationWorkTime')->nullable();
            $table->text('PopularLoadTimes')->nullable();
            $table->string('CoordinatesLatitude')->nullable();
            $table->string('CoordinatesLongitude')->nullable();
            $table->text('OrganizationShortDescription')->nullable();
            $table->text('OrganizationHeadPhotoFile')->nullable();
            $table->text('OrganizationPhotosFiles')->nullable();
            $table->text('OrganizationEmail')->nullable();
            $table->string('OrganizationFacebook')->nullable();
            $table->string('OrganizationInstagram')->nullable();
            $table->string('OrganizationTwitter')->nullable();
            $table->string('OrganizationLinkedIn')->nullable();
            $table->string('OrganizationYouTube')->nullable();
            $table->string('OrganizationYelp')->nullable();
            $table->string('OrganizationTripAdvisor')->nullable();
            $table->string('OrganizationSearchRequest')->nullable();
            $table->text('EmbedMapCode')->nullable();
            $table->string('OrganizationSkype')->nullable();
            $table->string('OrganizationTelegram')->nullable();
            $table->string('OrganizationPhoneFromTheWebsite')->nullable();
            $table->string('OrganizationGUID')->nullable();
            $table->string('OrganizationTikTok')->nullable();
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
        Schema::dropIfExists('organizations');
    }
}
