<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Đã vô hiệu hóa drop bảng order_items để giữ lại bảng cho chức năng đặt hàng
        // Schema::dropIfExists('order_items');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Không cần tạo lại bảng ở đây
    }
};
