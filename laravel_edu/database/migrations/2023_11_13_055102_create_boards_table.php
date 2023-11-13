<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            // 글번호, 제목, 내용, 작성일, 수정일, 삭제일자
            $table->id(); //big_int, pk, auto_increment
            $table->string('title',50); //var_char(50), not null
            $table->string('content', 1000); //var_char(1000), not null
            $table->timestamps(); //created_at, updated_at 생성 null 허용
            $table->softDeletes(); // deleted_at, null 허용
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
};
