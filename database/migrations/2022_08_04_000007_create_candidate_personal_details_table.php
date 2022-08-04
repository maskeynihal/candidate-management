<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatePersonalDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('candidate_personal_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('emergency_contact_number')->nullable();
            $table->date('join_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
