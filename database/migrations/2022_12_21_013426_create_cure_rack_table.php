<?php

use App\Models\Cure;
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
        Schema::create('cure_rack', function (Blueprint $table) {
            $table->foreignIdFor(Cure::class)->constrained();
            $table->foreignIdFor(Rack::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cure_rack');
    }
};