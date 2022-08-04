<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCandidatePersonalDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('candidate_personal_details', function (Blueprint $table) {
            $table->unsignedBigInteger('candidate_id')->nullable();
            $table->foreign('candidate_id', 'candidate_fk_7096338')->references('id')->on('candidates');
        });
    }
}
