<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    protected Setting $setting;

    public function __construct()
    {
        $this->setting = app(Setting::class);
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->setting->getTable(), function (Blueprint $table) {
            $table->uuid($this->setting->getKeyName())->primary();
            $table->string($this->setting::CLIENT_ID);
            $table->string($this->setting::STORE_ID);
            $table->string($this->setting::SELLER_ID);
            $table->string($this->setting::CLIENT_SECRET);
            $table->json($this->setting::ACCESS_TOKEN)->nullable();
            $table->boolean($this->setting::IS_CONNECTED);
            $table->timestamp($this->setting::CREATED_AT);
            $table->timestamp($this->setting::UPDATED_AT);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->setting->getTable());
    }
};
