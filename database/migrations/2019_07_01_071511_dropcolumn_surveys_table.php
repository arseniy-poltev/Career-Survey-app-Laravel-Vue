<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropcolumnSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('surveys', 'client_address'))
        {
            Schema::table('surveys', function (Blueprint $table)
            {
                $table->dropColumn('client_address');
            });
        }

        if (Schema::hasColumn('surveys', 'client_city'))
        {
            Schema::table('surveys', function (Blueprint $table)
            {
                $table->dropColumn('client_city');
            });
        }

        if (Schema::hasColumn('surveys', 'client_state'))
        {
            Schema::table('surveys', function (Blueprint $table)
            {
                $table->dropColumn('client_state');
            });
        }

        if (Schema::hasColumn('surveys', 'client_postal_code'))
        {
            Schema::table('surveys', function (Blueprint $table)
            {
                $table->dropColumn('client_postal_code');
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if ( !Schema::hasColumn('surveys', 'client_address')) {
            Schema::table('surveys', function (Blueprint $table) {
                $table->string('client_address', 255)->nullable();
            });
        }

        if ( !Schema::hasColumn('surveys', 'client_city')) {
            Schema::table('surveys', function (Blueprint $table) {
                $table->string('client_city', 255)->nullable();
            });
        }

        if ( !Schema::hasColumn('surveys', 'client_state')) {
            Schema::table('surveys', function (Blueprint $table) {
                $table->string('client_state', 255)->nullable();
            });
        }

        if ( !Schema::hasColumn('surveys', 'client_postal_code')) {
            Schema::table('surveys', function (Blueprint $table) {
                $table->string('client_postal_code', 255)->nullable();
            });
        }
    }
}
