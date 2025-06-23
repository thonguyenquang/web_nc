
# 🌸 Website Bán Hoa – Laravel eCommerce Flower Shop

## 📌 Giới thiệu
Dự án **Website Bán Hoa** là một nền tảng thương mại điện tử đơn giản được xây dựng bằng Laravel, phục vụ cho mục đích bán các sản phẩm hoa tươi như: hoa bó, hoa giỏ, hoa cưới, hoa chúc mừng,… Dự án hỗ trợ đầy đủ các chức năng mua hàng, quản lý đơn hàng, đánh giá sản phẩm và phân hệ quản trị viên – shipper.

Website hướng đến việc cung cấp một **trải nghiệm mua sắm tiện lợi**, **giao diện thân thiện**, và quy trình đặt hoa nhanh chóng, dễ sử dụng cho mọi đối tượng khách hàng.

## 🛠️ Các chức năng chính

### 💐 Dành cho người dùng:
- Đăng ký / Đăng nhập
- Xem danh sách sản phẩm hoa theo danh mục (hoa sinh nhật, hoa chúc mừng, hoa tình yêu,...)
- Xem chi tiết sản phẩm
- Tìm kiếm hoa theo tên
- Thêm sản phẩm vào giỏ hàng
- Đặt hàng và thanh toán (COD hoặc quét QR VietQR)
- Theo dõi trạng thái đơn hàng
- Viết đánh giá và bình luận

### 👨‍💼 Dành cho quản trị viên (Admin):
- Quản lý danh mục, thương hiệu, sản phẩm
- Quản lý đơn hàng: duyệt đơn, gán shipper, xem lịch sử đơn
- Quản lý người dùng và phân quyền
- Quản lý nhân sự giao hàng (shipper)
- Dashboard thống kê cơ bản

### 🚚 Dành cho Shipper:
- Nhận đơn hàng đã được gán
- Cập nhật trạng thái giao hàng: đang giao, giao thành công, yêu cầu hủy đơn
- Xác nhận hủy đơn nếu cần

## ✅ Ưu điểm
- 🔹 **Giao diện trực quan**, thân thiện với người dùng và dễ thao tác
- 🔹 Sử dụng Laravel giúp **quản lý code rõ ràng**, có sẵn phân tầng Controller – Model – View
- 🔹 Có phân quyền người dùng rõ ràng (User – Admin – Shipper)
- 🔹 Hỗ trợ thanh toán bằng QR VietQR
- 🔹 Có hệ thống đánh giá sản phẩm, tăng tính tương tác
- 🔹 Hệ thống quản trị đơn giản, dễ mở rộng

## ❌ Nhược điểm
- 🔸 Chưa tích hợp các cổng thanh toán điện tử như MoMo, VNPay
- 🔸 Trang admin chưa có dashboard biểu đồ hoặc báo cáo trực quan
- 🔸 Thiếu các chức năng marketing như voucher, giảm giá theo dịp
- 🔸 Giao diện chưa có thiết kế mobile-first (responsive chưa hoàn chỉnh)
- 🔸 Chưa có hệ thống gợi ý sản phẩm (recommendation)

## 🧰 Công nghệ sử dụng
| Thành phần | Công nghệ |
|-----------|-----------|
| Backend | Laravel 10 (PHP 8.x) |
| Frontend | Blade Template + Bootstrap 5 |
| Cơ sở dữ liệu | MySQL / MariaDB |
| Quản lý DB | phpMyAdmin |
| Xác thực | Laravel Auth (custom login) |
| Thanh toán | COD |
| Phân quyền | Middleware + Role logic (User, Admin, Shipper) |


> 📦 Dữ liệu mẫu đã được seed sẵn. Tài khoản demo:
> - Admin: `admin@gmail.com` / `password`
> - Shipper: `shipper@gmail.com` / `password`
> - Khách: `user@gmail.com` / `password`

## 🔮 Hướng phát triển trong tương lai
- Tích hợp thanh toán điện tử (VNPay, MoMo, ZaloPay)
- Xây dựng hệ thống khuyến mãi (mã giảm giá, flash sale, loyalty)
- Phân tích doanh thu và hiển thị biểu đồ trong trang quản trị
- Hệ thống gợi ý sản phẩm thông minh theo hành vi người dùng
- Phát triển ứng dụng mobile hoặc Progressive Web App (PWA)


