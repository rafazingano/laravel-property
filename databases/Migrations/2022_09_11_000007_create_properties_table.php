<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('property_types');
            $table->foreignId('user_id')->constrained('users');
            $table->string('code');
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(true);
            $table->integer('bedrooms')->nullable()->comment('Número de quartos');
            $table->integer('suites')->nullable()->comment('Número de suítes');
            $table->integer('bathrooms')->nullable()->comment('Número de banheiros');
            $table->integer('garage_spots')->nullable()->comment('Número de vagas de garagem');
            $table->decimal('total_area', 8, 2)->nullable()->comment('Área total do imóvel');
            $table->decimal('usable_area', 8, 2)->nullable()->comment('Área útil do imóvel');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('property_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('iptu', 8, 2)->nullable()->comment('Valor do IPTU');
            $table->decimal('condo_price', 8, 2)->nullable()->comment('Valor do condomínio');
            $table->decimal('fire_insurance_price', 8, 2)->nullable()->comment('Valor do seguro contra incêndio');
            $table->decimal('cleaning_fee_price', 8, 2)->nullable()->comment('Valor da taxa de limpeza');
            $table->string('property_tax_period')->nullable()->comment('Período do imposto do imóvel');
            $table->string('financeable')->nullable()->comment('Financiável');
            $table->string('readjustment_index')->nullable()->comment('Índice de reajuste');
            $table->boolean('accepts_tradeins')->nullable()->comment('Aceita permuta');
            $table->timestamps();
        });


        Schema::create('property_seo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('canonical_url')->nullable();
            $table->text('tags')->nullable();
            $table->timestamps();
        });

        Schema::create('property_finality', function (Blueprint $table) {
            $table->foreignId('finality_id')->constrained('property_finalities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('property_id')->constrained('properties')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('price', 8, 2)->nullable();
        });

        Schema::create('property_feature', function (Blueprint $table) {
            $table->foreignId('feature_id')->constrained('property_features')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('property_id')->constrained('properties')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('property_infrastructure', function (Blueprint $table) {
            $table->foreignId('infrastructure_id')->constrained('property_infrastructures')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('property_id')->constrained('properties')->onUpdate('cascade')->onDelete('cascade');
        });

        /*Schema::create('property_people', function (Blueprint $table) {
            $table->foreignId('people_id')->constrained('property_people');
            $table->foreignId('property_id')->constrained('properties');
            $table->integer('percentage')->nullable();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('property_people');
        Schema::dropIfExists('property_infrastructure');
        Schema::dropIfExists('property_feature');
        Schema::dropIfExists('property_finality');
        Schema::dropIfExists('property_seo');
        Schema::dropIfExists('property_details');
        Schema::dropIfExists('properties');
    }
}
