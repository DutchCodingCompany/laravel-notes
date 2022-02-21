<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create(config('notes.table'), function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->morphs('notable');
            $table->foreignId('user_id')
                ->nullable()
                ->references('id')->on('users')
                ->cascadeOnUpdate();
            $table->boolean('system')
                ->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(config('notes.table'));
    }
};
