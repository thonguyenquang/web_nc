<footer>
    <div class="footer1">
        <h2 style="font-family: 'Playfair Display', serif;">Fióre</h2>
        <div class="footer-title">
            <h4>Address</h4>
            <p>Peakview Tower, 36 Hoang Cau, Dong Da, Hanoi</p>
        </div>
        <div class="footer-title">
            <h4>Contact</h4>
            <p>012.xxxx.xxx</p>
            <p>support@gmail.com</p>
        </div>
    </div>

    <div class="footer2">
        <h2 class="timer">Working Hours</h2>
        <div class="time">
            <h4>Monday-Friday:</h4>
            <p>8.00am - 21.00pm</p>
        </div>
        <div class="time">
            <h4>Saturday-Sunday:</h4>
            <p>8.00am - 21.00pm</p>
        </div>
    </div>

    <div class="footer3">
        <h2>Let us reach you</h2>
        <form id="contactForm">
            <div class="form-group">
                <label class="required">*</label>
                <input type="text" name="fullname" class="form-control" placeholder="Nhập họ và tên">
                <div class="error"></div>
            </div>
            <div class="form-group">
                <label class="required">*</label>
                <input type="email" name="email" class="form-control" placeholder="Nhập email">
                <div class="error"></div>
            </div>
            <div class="form-group">
                <label class="required">*</label>
                <input type="tel" name="phone" class="form-control" placeholder="Nhập số điện thoại">
                <div class="error"></div>
            </div>
            <div class="form-group">
                <button type="submit">Gửi thông tin</button>
            </div>
        </form>
    </div>
</footer>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const inputs = this.querySelectorAll('.form-control');
    let isValid = true;

    inputs.forEach(input => {
        const errorDiv = input.nextElementSibling;
        const value = input.value.trim();
        const name = input.name;
        errorDiv.textContent = '';

        if (value === '') {
            errorDiv.textContent = 'Đây là trường bắt buộc';
            isValid = false;
        } else if (name === 'email' && !/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,6}$/.test(value)) {
            errorDiv.textContent = 'Email không hợp lệ';
            isValid = false;
        } else if (name === 'phone' && !/^\d{9,11}$/.test(value)) {
            errorDiv.textContent = 'Số điện thoại không hợp lệ ';
            isValid = false;
        }
    });

    if (isValid) {
        alert('Gửi thành công!');
        this.reset();
    }
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).on('submit', '.add-to-cart-form', function(e) {
    e.preventDefault();
    const form = $(this);

    $.ajax({
        url: form.attr('action'),
        method: 'POST',
        data: form.serialize(),
        success: function(response) {
            if (response.status === 'success') {
                $('#cart-count').text(response.cart_count);
            }
        },
        error: function() {
            alert('Lỗi khi thêm vào giỏ hàng.');
        }
    });
});
</script>

