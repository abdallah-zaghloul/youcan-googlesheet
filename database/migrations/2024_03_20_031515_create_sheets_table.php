<?php

use App\Models\Sheet;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    protected Sheet $sheet;

    public function __construct()
    {
        $this->sheet = app(Sheet::class);
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->sheet->getTable(), function (Blueprint $table) {
            $table->uuid($this->sheet->getKeyName())->primary();
            $table->string($this->sheet::NAME);
            $table->string($this->sheet::STORE_ID);
            $table->json($this->sheet::FIELDS);
            $table->boolean($this->sheet::IS_ACTIVE);
            $table->timestamp($this->sheet::CREATED_AT);
            $table->timestamp($this->sheet::UPDATED_AT);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->sheet->getTable());
    }
};
