<?php

use App\Models\Cure;
use App\Models\User;
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
        Schema::create('temporary_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cure::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->integer('qty');
            $table->decimal('price', $precission = 18, $scale = 2);
            $table->decimal('subtotal', $precission = 18, $scale = 2);
            $table->date('expired');
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
        Schema::dropIfExists('temporary_purchases');
    }
};
