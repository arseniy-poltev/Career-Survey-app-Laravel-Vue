<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->enum('status', ['NEW', 'ANSWERED', 'COMMENTED', 'FINISHED'])->default('NEW');
            $table->string('hash', 32);

            $table->string('hrcoach_name', 255);
            $table->string('hrcoach_organisation', 255)->nullable();
            $table->string('hrcoach_email', 255);

            $table->string('client_name', 255)->nullable();
            $table->string('client_organisation', 255)->nullable();
            $table->string('client_email', 255)->nullable();
            $table->string('client_address', 255)->nullable();
            $table->string('client_city', 255)->nullable();
            $table->string('client_state', 255)->nullable();
            $table->string('client_postal_code', 255)->nullable();

            $table->enum('gender', ['MALE', 'FEMALE'])->nullable();
            $table->string('position', 255)->nullable();
            $table->string('department', 255)->nullable();

            $table->date('start_date')->nullable();
            $table->date('interview_date')->nullable();

            $table->enum('generation', ['x','y','z','boomer','veteran'])->nullable();

            $table->text('background')->nullable();
            $table->text('role')->nullable();
            $table->text('experience')->nullable();
            $table->text('expectations')->nullable();
            $table->text('gain')->nullable();
            $table->text('achieve')->nullable();
            $table->text('reason')->nullable();
            $table->text('contribution')->nullable();

            $table->tinyInteger('q10')->nullable();
            $table->tinyInteger('q11')->nullable();
            $table->tinyInteger('q12')->nullable();
            $table->tinyInteger('q13')->nullable();
            $table->tinyInteger('q14')->nullable();

            $table->tinyInteger('q20')->nullable();
            $table->tinyInteger('q21')->nullable();
            $table->tinyInteger('q22')->nullable();
            $table->tinyInteger('q23')->nullable();
            $table->tinyInteger('q24')->nullable();

            $table->tinyInteger('q30')->nullable();
            $table->tinyInteger('q31')->nullable();
            $table->tinyInteger('q32')->nullable();
            $table->tinyInteger('q33')->nullable();
            $table->tinyInteger('q34')->nullable();
            $table->tinyInteger('q35')->nullable();

            $table->tinyInteger('q410')->nullable();
            $table->tinyInteger('q411')->nullable();
            $table->tinyInteger('q412')->nullable();
            $table->tinyInteger('q413')->nullable();
            $table->tinyInteger('q414')->nullable();

            $table->tinyInteger('q420')->nullable();
            $table->tinyInteger('q421')->nullable();
            $table->tinyInteger('q422')->nullable();
            $table->tinyInteger('q423')->nullable();
            $table->tinyInteger('q424')->nullable();

            $table->tinyInteger('q510')->nullable();
            $table->tinyInteger('q511')->nullable();
            $table->tinyInteger('q512')->nullable();
            $table->tinyInteger('q513')->nullable();
            $table->tinyInteger('q514')->nullable();
            $table->tinyInteger('q515')->nullable();
            $table->tinyInteger('q516')->nullable();
            $table->tinyInteger('q517')->nullable();
            $table->tinyInteger('q518')->nullable();

            $table->tinyInteger('q520')->nullable();
            $table->tinyInteger('q521')->nullable();
            $table->tinyInteger('q522')->nullable();
            $table->tinyInteger('q523')->nullable();
            $table->tinyInteger('q524')->nullable();
            $table->tinyInteger('q525')->nullable();
            $table->tinyInteger('q526')->nullable();
            $table->tinyInteger('q527')->nullable();
            $table->tinyInteger('q528')->nullable();

            $table->text('comments_business')->nullable();
            $table->text('comments_effectiveness')->nullable();
            $table->text('comments_self')->nullable();

            $table->tinyInteger('qm')->nullable();
            $table->text('comments_model')->nullable();

            $table->text('comments_culture_staff')->nullable();
            $table->text('comments_culture_management')->nullable();
            $table->text('comments_join')->nullable();
            $table->text('comments_stay')->nullable();

            $table->text('comments_change')->nullable();

            $table->text('plan_business')->nullable();
            $table->text('plan_effectiveness')->nullable();
            $table->text('plan_self')->nullable();
            $table->text('plan_model')->nullable();
            $table->text('plan_culture_staff')->nullable();
            $table->text('plan_culture_management')->nullable();
            $table->text('plan_change')->nullable();

            $table->unsignedInteger('user_id')->default(false);
            $table->boolean('paid')->default(false);

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
        Schema::dropIfExists('surveys');
    }
}
