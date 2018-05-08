<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'coupons', function ( Blueprint $table )
        {
            $table->increments( 'id' );
            $table->string( 'code' )->unique();
            $table->boolean( 'level_free' )->default( false );
            $table->boolean( 'disposable' )->default( false );
            $table->boolean( 'period_monthly' )->default( false );
            $table->boolean( 'period_yearly' )->default( false );
            $table->enum( 'discount_type', [
                'set_fixed_price',
                'fixed_amount_discount',
                'percentage_discount',
            ] );
            $table->float( 'discount_value' );
            $table->unsignedInteger( 'billing_cycles' );
            $table->timestamp( 'expires_at' );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'coupons' );
    }
}
