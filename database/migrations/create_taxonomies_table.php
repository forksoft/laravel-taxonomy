<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxonomiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->createVocabulariesTable();
        
        $this->createTermsTable();
        
        $this->createVocabulariablesTable();
        
        $this->createTermablesTable();
    }

    /**
     * Taxonomy vocabularies table
     */
    public function createVocabulariesTable()
    {
        Schema::create('vocabularies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('system_name')->unique();
            $table->string('name');
            $table->text('description')->nullable();
//            $table->json('additionally')->nullable();
        });
    }

    /**
     * Taxonomy terms table
     */
    public function createTermsTable()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('system_name')->nullable()->unique(); # if needed, ex. from statuses

            $table->nestedSet(); //Nested https://github.com/lazychaser/laravel-nestedset
            // Similar:
            /*
            $table->unsignedInteger('_lft')->default(0);
            $table->unsignedInteger('_rgt')->default(0);
            $table->unsignedInteger('parent_id')->nullable();
            */

            $table->integer('weight')->default(0);
            $table->string('vocabulary');
            $table->timestamps();
        });
    }

    /**
     * Таблица сущностей "привязанных" к словарям
     */
    public function createVocabulariablesTable()
    {
        Schema::create('vocabularyables', function (Blueprint $table) {
            $table->unsignedInteger('vocabulary_id');
            $table->morphs('vocabularyable');

            $table->foreign('vocabulary_id')
                ->references('id')
                ->on('vocabularies')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Таблица сущностей "привязанных" к термам
     */
    public function createTermablesTable()
    {
         Schema::create('termables', function (Blueprint $table) {
             $table->unsignedInteger('term_id');
             $table->morphs('termable');
    
             $table->foreign('term_id')
                 ->references('id')
                 ->on('terms')
                 ->onDelete('CASCADE');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('termables');
        Schema::dropIfExists('vocabularyables');
        Schema::dropIfExists('terms');
        Schema::dropIfExists('vocabularies');
    }
}
