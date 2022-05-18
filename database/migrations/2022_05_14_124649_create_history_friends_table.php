<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_friends', function (Blueprint $table) {
            $table->id();
            $table->foreignId('groups_id')->constrained('groups')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->string('no_tlp');
            $table->string('alamat');
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
        Schema::dropIfExists('history_friends');
    }
}
