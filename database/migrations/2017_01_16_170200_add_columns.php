<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('tasks', function (Blueprint $table) {
          $table->string('address')->after('name');
          $table->integer('address_num')->after('address');
          $table->string('entrance')->after('address_num');
          $table->string('floor')->after('entrance');
          $table->integer('appartment')->after('floor');
          $table->string('reg_number')->after('appartment');
          $table->string('telephone')->after('reg_number');
          $table->boolean('is_checked')->after('telephone');
          $table->date('date_of_last_check')->after('is_checked');
          $table->date('date_scheduled')->after('date_of_last_check');
          $table->integer('equip_value')->after('date_scheduled');
          $table->string('type')->after('equip_value');
          $table->text('notes')->after('type');
          $table->enum('status', array('непроверен', 'обаждане', 'отложен', 'насрочен', 'проблем', 'проверен'))->after('notes');
          $table->enum('inspector', array('Д', 'Г', 'К'))->after('status');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('tasks', function($table)
      {
        $table->dropColumn(['address', 'address_num', 'entrance', 'floor', 'appartment', 'reg_number', 'telephone', 'is_checked', 'date_of_last_check', 'date_scheduled', 'equip_value', 'type', 'notes', 'status', 'inspector']);
      });
    }
}
