<form method="post" action="{{ route('password.update') }}" class="row g-3">
    @csrf
    @method('put')
    <div class="col-12">
        <label for="update_password_current_password" class="form-label">Mật khẩu hiện tại</label>
        <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
        @if($errors->updatePassword->has('current_password'))
            <div class="text-danger small mt-1">{{ $errors->updatePassword->first('current_password') }}</div>
        @endif
    </div>
    <div class="col-12">
        <label for="update_password_password" class="form-label">Mật khẩu mới</label>
        <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
        @if($errors->updatePassword->has('password'))
            <div class="text-danger small mt-1">{{ $errors->updatePassword->first('password') }}</div>
        @endif
    </div>
    <div class="col-12">
        <label for="update_password_password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
        <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
        @if($errors->updatePassword->has('password_confirmation'))
            <div class="text-danger small mt-1">{{ $errors->updatePassword->first('password_confirmation') }}</div>
        @endif
    </div>
    <div class="col-12 text-end">
        <button type="submit" class="btn btn-success px-4">Lưu thay đổi</button>
        @if (session('status') === 'password-updated')
            <span class="text-success ms-3">Đã đổi mật khẩu.</span>
        @endif
    </div>
</form>
