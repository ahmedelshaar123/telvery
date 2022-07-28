<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
		Schema::table('shippings', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('shippings', function(Blueprint $table) {
			$table->foreign('governorate_id')->references('id')->on('governorates')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('coupons', function(Blueprint $table) {
			$table->foreign('brand_id')->references('id')->on('brands')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('coupons', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('brand_id')->references('id')->on('brands')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('reviews', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('reviews', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('client_product', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('client_product', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('replies', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('replies', function(Blueprint $table) {
			$table->foreign('review_id')->references('id')->on('reviews')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('reactions', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('reactions', function(Blueprint $table) {
			$table->foreign('review_id')->references('id')->on('reviews')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('delivery_costs', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('delivery_costs', function(Blueprint $table) {
			$table->foreign('governorate_id')->references('id')->on('governorates')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('coupon_id')->references('id')->on('coupons')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('shipping_id')->references('id')->on('shippings')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('payment_method_id')->references('id')->on('payment_methods')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('order_statuses', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('orders')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('order_product', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('orders')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('order_product', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('linked_products', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('linked_products', function(Blueprint $table) {
			$table->foreign('linked_product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('carts', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('carts', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('users_category_id_foreign');
        });
		Schema::table('shippings', function(Blueprint $table) {
			$table->dropForeign('shippings_client_id_foreign');
		});
		Schema::table('shippings', function(Blueprint $table) {
			$table->dropForeign('shippings_governorate_id_foreign');
		});
		Schema::table('coupons', function(Blueprint $table) {
			$table->dropForeign('coupons_brand_id_foreign');
		});
		Schema::table('coupons', function(Blueprint $table) {
			$table->dropForeign('coupons_user_id_foreign');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_brand_id_foreign');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_category_id_foreign');
		});
		Schema::table('reviews', function(Blueprint $table) {
			$table->dropForeign('reviews_client_id_foreign');
		});
		Schema::table('reviews', function(Blueprint $table) {
			$table->dropForeign('reviews_product_id_foreign');
		});
		Schema::table('client_product', function(Blueprint $table) {
			$table->dropForeign('client_product_client_id_foreign');
		});
		Schema::table('client_product', function(Blueprint $table) {
			$table->dropForeign('client_product_product_id_foreign');
		});
		Schema::table('replies', function(Blueprint $table) {
			$table->dropForeign('replies_client_id_foreign');
		});
		Schema::table('replies', function(Blueprint $table) {
			$table->dropForeign('replies_review_id_foreign');
		});
		Schema::table('reactions', function(Blueprint $table) {
			$table->dropForeign('reactions_client_id_foreign');
		});
		Schema::table('reactions', function(Blueprint $table) {
			$table->dropForeign('reactions_review_id_foreign');
		});
		Schema::table('delivery_costs', function(Blueprint $table) {
			$table->dropForeign('delivery_costs_product_id_foreign');
		});
		Schema::table('delivery_costs', function(Blueprint $table) {
			$table->dropForeign('delivery_costs_governorate_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_client_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_user_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_coupon_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_shipping_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_payment_method_id_foreign');
		});
		Schema::table('order_statuses', function(Blueprint $table) {
			$table->dropForeign('order_statuses_order_id_foreign');
		});
		Schema::table('order_product', function(Blueprint $table) {
			$table->dropForeign('order_product_order_id_foreign');
		});
		Schema::table('order_product', function(Blueprint $table) {
			$table->dropForeign('order_product_product_id_foreign');
		});
		Schema::table('linked_products', function(Blueprint $table) {
			$table->dropForeign('linked_products_product_id_foreign');
		});
		Schema::table('linked_products', function(Blueprint $table) {
			$table->dropForeign('linked_products_linked_product_id_foreign');
		});
		Schema::table('carts', function(Blueprint $table) {
			$table->dropForeign('carts_client_id_foreign');
		});
		Schema::table('carts', function(Blueprint $table) {
			$table->dropForeign('carts_product_id_foreign');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_user_id_foreign');
		});
	}
}
