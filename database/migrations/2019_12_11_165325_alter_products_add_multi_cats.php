<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductsAddMultiCats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_category_id');
            $table->char('product_id', 36);
        });

        $prods = \App\Product::all();
        foreach ($prods as $prod) {
            \DB::table('product_category_product')->insert(['product_id' => $prod->id, 'product_category_id' => $prod->product_category_id]);
        }

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('product_category_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
