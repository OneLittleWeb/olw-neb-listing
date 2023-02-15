<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('OrganizationId')->nullable();
            $table->string('OrganizationGUID')->nullable();
            $table->string('OrganizationGMapsId')->nullable();
            $table->string('ReviewId')->nullable();
            $table->string('ReviewerName')->nullable();
            $table->string('ReviewerReviewsCount')->nullable();
            $table->string('ReviewDate')->nullable();
            $table->string('ReviewRateStars')->nullable();
            $table->string('ReviewTextOriginal')->nullable();
            $table->text('ReviewTextTranslated')->nullable();
            $table->text('ReviewPhotosFiles')->nullable();
            $table->timestamps();

            $table->foreign('OrganizationId')
                ->references('id')->on('organizations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
