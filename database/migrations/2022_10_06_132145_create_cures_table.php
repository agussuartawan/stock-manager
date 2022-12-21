<?php

use App\Models\CureType;
use App\Models\CureUnit;
use App\Models\Rack;
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
        Schema::create('cures', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(CureType::class)->constrained()->onUpdate('cascade');
            $table->foreignIdFor(CureUnit::class)->constrained()->onUpdate('cascade');
            $table->string('code')->unique();
            $table->string('name');
            $table->integer('minimum_stock');
            $table->decimal('purchase_price', $precission = 18, $scale = 2);
            $table->decimal('selling_price', $precission = 18, $scale = 2);
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
        Schema::dropIfExists('cures');
    }
};