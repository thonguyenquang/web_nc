<div>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
        Xoá tài khoản
    </button>
    <!-- Modal xác nhận -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteAccountModalLabel">Xác nhận xoá tài khoản</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning">
                            <strong>Lưu ý:</strong> Khi xoá tài khoản, toàn bộ dữ liệu của bạn sẽ bị xoá vĩnh viễn. Hãy chắc chắn bạn đã sao lưu thông tin cần thiết!
                        </div>
                        <div class="mb-3">
                            <label for="delete_password" class="form-label">Nhập mật khẩu để xác nhận</label>
                            <input id="delete_password" name="password" type="password" class="form-control" placeholder="Mật khẩu">
                            @if($errors->userDeletion->has('password'))
                                <div class="text-danger small mt-1">{{ $errors->userDeletion->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                        <button type="submit" class="btn btn-danger">Xoá tài khoản</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
