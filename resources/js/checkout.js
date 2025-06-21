$(document).ready(function(){
				$('input[name="payment"]').on('change', function() {
					if ($('#payment-1').is(':checked')) {
						$('#bank-details').show();
					} else {
						$('#bank-details').hide();
					}
				});

				// Demo logic cho việc chọn địa chỉ (cần dữ liệu thực tế và logic phức tạp hơn)
				$('#province').on('change', function(){
					var selectedProvince = $(this).val();
					// Xóa các lựa chọn cũ
					$('#district').empty().append('<option value="">Chọn Quận/Huyện</option>');
					$('#ward').empty().append('<option value="">Chọn Phường/Xã</option>');

					if (selectedProvince === 'hanoi') {
						$('#district').append('<option value="badinh">Ba Đình</option><option value="hoankiem">Hoàn Kiếm</option>');
					} else if (selectedProvince === 'hcm') {
						$('#district').append('<option value="q1">Quận 1</option><option value="q3">Quận 3</option>');
					}
					// Thêm logic tương tự cho các tỉnh/thành khác
				});

				$('#district').on('change', function(){
					var selectedDistrict = $(this).val();
					$('#ward').empty().append('<option value="">Chọn Phường/Xã</option>');
					if (selectedDistrict === 'badinh') {
						$('#ward').append('<option value="phucxa">Phúc Xá</option><option value="trucbach">Trúc Bạch</option>');
					} else if (selectedDistrict === 'q1') {
						$('#ward').append('<option value="tandinh">Tân Định</option><option value="dakao">Đa Kao</option>');
					}
					// Thêm logic tương tự
				});

				// Tương tự cho địa chỉ giao hàng
				$('#shipping-province').on('change', function(){
					var selectedProvince = $(this).val();
					$('#shipping-district').empty().append('<option value="">Chọn Quận/Huyện</option>');
					$('#shipping-ward').empty().append('<option value="">Chọn Phường/Xã</option>');
					// Logic tải quận/huyện
				});
				$('#shipping-district').on('change', function(){
					// Logic tải phường/xã
				});


				// Xử lý nút áp dụng mã giảm giá (demo)
				$('#apply-discount-btn').on('click', function(e){
					e.preventDefault();
					var discountCode = $('input[name="discount-code"]').val();
					if(discountCode.toLowerCase() === 'giamgia10'){
						alert('Áp dụng mã giảm giá 10% thành công!');
						// Cần logic cập nhật lại tổng tiền ở đây
					} else if(discountCode === '') {
						alert('Vui lòng nhập mã giảm giá.');
					}
					else {
						alert('Mã giảm giá không hợp lệ hoặc đã hết hạn.');
					}
				});

				// Client-side validation demo (Bootstrap có thể xử lý một phần)
				$('.order-submit').on('click', function(e){
					var formValid = true;
					// Kiểm tra các trường bắt buộc trong .billing-details
					$('.billing-details input[required]').each(function(){
						if($(this).val() === ''){
							$(this).css('border-color', 'red');
							formValid = false;
						} else {
							$(this).css('border-color', '#E4E7ED');
						}
					});
					$('.billing-details select[required]').each(function(){
						if($(this).val() === ''){
							$(this).css('border-color', 'red');
							formValid = false;
						} else {
							$(this).css('border-color', '#E4E7ED');
						}
					});

					if (!$('#terms').is(':checked')) {
						alert('Bạn cần đồng ý với điều khoản và điều kiện.');
						formValid = false;
					}

					if(!formValid){
						e.preventDefault(); // Ngăn chặn việc submit nếu form không hợp lệ
						alert('Vui lòng điền đầy đủ các thông tin bắt buộc và đồng ý với điều khoản.');
					} else {
						// Nếu form hợp lệ, có thể thực hiện submit hoặc các hành động khác
						alert('Đơn hàng của bạn đang được xử lý!');
						// Ví dụ: $(this).closest('form').submit();
					}
				});


			});