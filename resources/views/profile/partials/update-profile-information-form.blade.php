<form method="post" action="{{ route('profile.update') }}" class="row g-3">
    @csrf
    @method('patch')
    <div class="col-12">
        <label for="name" class="form-label">Họ và tên</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
        @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
        @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="alert alert-warning mt-2 p-2">
                Địa chỉ email của bạn chưa được xác minh.
                <button form="send-verification" class="btn btn-link p-0 align-baseline">Gửi lại email xác minh</button>
            </div>
            @if (session('status') === 'verification-link-sent')
                <div class="alert alert-success mt-2 p-2">Đã gửi lại email xác minh!</div>
            @endif
        @endif
    </div>
    <div class="col-12 text-end">
        <button type="submit" class="btn btn-success px-4">Lưu thay đổi</button>
        @if (session('status') === 'profile-updated')
            <span class="text-success ms-3">Đã lưu.</span>
        @endif
    </div>
</form>
