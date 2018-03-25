<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
          $table->string('cpu');
          $table->string('tocdocpu');
          $table->string('ram');
          $table->string('odia');
          $table->string('dungluongodia');
          $table->string('chipsetdohoa');
          $table->string('kichthuocmanhinh');
          $table->string('dophangiai');
          $table->string('hedieuhanh');
          $table->string('dungluongpin');
          $table->string('cameratruoc');
          $table->string('camerasau');
          $table->string('bangtang4g');
          $table->string('bluetooth');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('products', function (Blueprint $table) {
          $table->dropColumn('cpu');
          $table->dropColumn('tocdocpu');
          $table->dropColumn('ram');
          $table->dropColumn('odia');
          $table->dropColumn('dungluongodia');
          $table->dropColumn('chipsetdohoa');
          $table->dropColumn('kichthuocmanhinh');
          $table->dropColumn('dophangiai');
          $table->dropColumn('hedieuhanh');
          $table->dropColumn('dungluongpin');
          $table->dropColumn('camera');
          $table->dropColumn('congsac');
          $table->dropColumn('bangtang4g');
          $table->dropColumn('bluetooth');
      });
    }
}
