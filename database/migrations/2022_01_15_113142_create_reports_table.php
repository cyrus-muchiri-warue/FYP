<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('file_id');
            $table->text('url');
            $table->string('title');
            $table->text('textsnippet');
            $table->text('htmlsnippet');
            $table->string('minwordsmatched');
            $table->string('viewurl');
            $table->string('queryWords');
            $table->string('cost');
            
          
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
        Schema::dropIfExists('reports');
    }
}
