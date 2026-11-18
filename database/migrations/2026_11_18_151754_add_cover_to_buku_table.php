
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('buku', 'cover')) {
            Schema::table('buku', function (Blueprint $table) {
                $table->string('cover')->nullable();
            });
        }
    }

    public function down(): void
    {
        // Tidak menghapus kolom cover yang mungkin sudah digunakan.
    }
};
