<?php

use App\Models\Cure;
use App\Models\Purchase;
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
        Schema::create('cure_purchase', function (Blueprint $table) {
            $table->foreignIdFor(Cure::class)->constrained()->onUpdate('cascade');
            $table->foreignIdFor(Purchase::class)->constrained()->onUpdate('cascade');
            $table->integer('qty');
            $table->decimal('price', $precission = 18, $scale = 2);
            $table->decimal('subtotal', $precission = 18, $scale = 2);
            $table->date('expired');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cure_purchase');
    }
};
