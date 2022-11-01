<?php

use App\Models\CureSale;
use App\Models\Stock;
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
        Schema::create('cure_sale_stock', function (Blueprint $table) {
            $table->unsignedBigInteger('cure_sale_id');
            $table->foreign('cure_sale_id')->references('id')->on('cure_sale');
            $table->foreignIdFor(Stock::class)->constrained();
            $table->integer('qty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cure_sale_stock');
    }
};