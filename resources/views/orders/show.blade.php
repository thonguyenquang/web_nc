
@extends('layouts.main')
@section('content')
<div class="container py-5" style="max-width: 700px;">
    <div class="card shadow-lg border-0">
        <div class="card-body p-4" style="background: rgba(255,255,255,0.97); border-radius: 16px;">
            <div class="text-center mb-4">
                <i class="bi bi-receipt-cutoff" style="font-size: 2.5rem; color: #a05c5c;"></i>
                <h2 class="mt-2 mb-0" style="font-family: 'Playfair Display', serif; color: #a05c5c;">Chi tiết đơn hàng</h2>
            </div>
            <div class="row mb-3 g-3">
                <div class="col-md-6">
                    <div class="border rounded p-3 h-100 bg-light">
                        <div class="mb-2"><span class="fw-bold">Mã đơn hàng:</span> #{{ $order->id }}</div>
                        <div class="mb-2"><span class="fw-bold">Trạng thái:</span> <span class="badge bg-info text-dark px-3 py-2" style="font-size:1rem;">{{ $order->status }}</span></div>
                        <div><span class="fw-bold">Ngày đặt:</span> {{ $order->created_at->format('d/m/Y H:i') }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border rounded p-3 h-100 bg-light">
                        <div class="mb-2"><span class="fw-bold">Khách hàng:</span> {{ $order->fullname }}</div>
                        <div class="mb-2"><span class="fw-bold">Điện thoại:</span> {{ $order->phone }}</div>
                        <div class="mb-2"><span class="fw-bold">Email:</span> {{ $order->email }}</div>
                        <div><span class="fw-bold">Địa chỉ:</span> {{ $order->address }}, {{ $order->ward }}, {{ $order->district }}, {{ $order->province }}</div>
                        @if($order->note)
                            <div class="mt-2"><span class="fw-bold">Ghi chú:</span> {{ $order->note }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <h5 class="mb-3 mt-4" style="color: #a05c5c;"><i class="bi bi-box-seam"></i> Sản phẩm</h5>
            <div class="table-responsive">
                <table class="table table-bordered align-middle bg-white">
                    <thead class="table-light">
                        <tr>
                            <th>Sản phẩm</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-end">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>
                                    @if($item->product && $item->product->image)
                                        <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px; margin-right: 8px;">
                                    @endif
                                    {{ $item->product->name ?? 'Sản phẩm đã xoá' }}
                                </td>
                                <td class="text-center">{{ $item->quantity }}</td>
                                <td class="text-end">{{ number_format($item->price * $item->quantity) }} VNĐ</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Tổng cộng:</td>
                            <td class="text-end fw-bold text-danger" style="font-size:1.2rem;">{{ number_format($order->total_price) }} VNĐ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('orders.track', $order->id) }}" class="btn btn-outline-primary px-4"><i class="bi bi-truck"></i> Theo dõi đơn hàng</a>
                <a href="{{ route('layouts.home') }}" class="btn btn-link">Về trang chủ</a>
            </div>

            @foreach($order->items as $item)
            @php $product = $item->product; @endphp
        
            @if($product)
                <div class="mt-4 border-top pt-3">
                    <h6>Đánh giá cho: {{ $product->name }}</h6>
                    <p>★ Trung bình: {{ number_format($product->averageRating(), 1) }} / 5</p>
        
                    @php
                        $userReview = $product->reviews->where('user_id', Auth::id())->first();
                    @endphp
        
                    @if ($order->status === 'completed')
                        @if ($userReview)
                            <p>Bạn đã đánh giá: {{ $userReview->rating }} sao</p>
                            <p>{{ $userReview->comment }}</p>
                            <button class="btn btn-sm btn-warning btn-review-edit"
                                data-product-id="{{ $product->id }}"
                                data-rating="{{ $userReview->rating }}"
                                data-comment="{{ $userReview->comment }}">
                                Sửa đánh giá
                            </button>
                        @else
                            <button class="btn btn-sm btn-primary btn-review"
                                data-product-id="{{ $product->id }}">
                                Viết đánh giá
                            </button>
                        @endif
                    @else
                        <p class="text-muted">Bạn có thể đánh giá sau khi đơn hàng hoàn thành.</p>
                    @endif
        
                    <div class="mt-2">
                        <h6>Các đánh giá khác:</h6>
                        @forelse($product->reviews as $review)
                            <p><strong>{{ $review->user->name }}</strong>: {{ $review->rating }} sao</p>
                            <p>{{ $review->comment }}</p>
                        @empty
                            <p>Chưa có đánh giá nào.</p>
                        @endforelse
                    </div>
                </div>
            @endif
        @endforeach
        


        </div>
    </div>
</div>
<!-- Modal đánh giá -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="reviewForm" class="modal-content">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Đánh giá sản phẩm</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="product_id" name="product_id">
          <div class="mb-3">
            <label class="form-label">Số sao (1-5)</label>
            <input type="number" min="1" max="5" class="form-control" id="rating" name="rating" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Bình luận</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
        </div>
      </form>
    </div>
  </div>
  
  <!-- Bootstrap & Ajax -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
      document.addEventListener("DOMContentLoaded", function () {
          const reviewModal = new bootstrap.Modal(document.getElementById('reviewModal'));
          const reviewForm = document.getElementById('reviewForm');
          const productInput = document.getElementById('product_id');
          const ratingInput = document.getElementById('rating');
          const commentInput = document.getElementById('comment');
  
          document.querySelectorAll('.btn-review, .btn-review-edit').forEach(btn => {
              btn.addEventListener('click', function () {
                  productInput.value = this.dataset.productId;
                  ratingInput.value = this.dataset.rating || '';
                  commentInput.value = this.dataset.comment || '';
                  reviewModal.show();
              });
          });
  
          reviewForm.addEventListener('submit', function (e) {
              e.preventDefault();
              const productId = productInput.value;
              const url = `/reviews/${productId}`;
              const data = {
                  rating: ratingInput.value,
                  comment: commentInput.value,
                  _token: '{{ csrf_token() }}'
              };
  
              fetch(url, {
                  method: 'POST',
                  headers: {
                      'Accept': 'application/json',
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': data._token
                  },
                  body: JSON.stringify(data)
              })
              .then(response => {
                  if (!response.ok) throw response;
                  return response.json();
              })
              .then(result => {
                  alert(result.message);
                  location.reload(); // Reload lại để xem đánh giá mới
              })
              .catch(async error => {
                  let message = 'Đã có lỗi xảy ra.';
                  if (error.json) {
                      const json = await error.json();
                      message = json.message || message;
                  }
                  alert(message);
              });
          });
      });
  </script>
  
@endsection
