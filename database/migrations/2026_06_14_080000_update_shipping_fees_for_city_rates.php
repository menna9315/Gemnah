<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('shipping_fees', function (Blueprint $table) {
            if (Schema::hasColumn('shipping_fees', 'singleton_key')) {
                $table->dropUnique('shipping_fees_singleton_key_unique');
                $table->dropColumn('singleton_key');
            }

            if (! Schema::hasColumn('shipping_fees', 'city')) {
                $table->string('city')->after('id');
            }

            $table->unique('city');
        });
    }

    public function down(): void
    {
        Schema::table('shipping_fees', function (Blueprint $table) {
            $table->dropUnique('shipping_fees_city_unique');

            if (! Schema::hasColumn('shipping_fees', 'singleton_key')) {
                $table->unsignedTinyInteger('singleton_key')->nullable()->unique()->after('id');
            }
        });
    }
};
