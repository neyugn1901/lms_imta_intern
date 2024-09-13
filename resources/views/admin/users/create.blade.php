<!-- Trang thêm mới người dùng -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Thêm mới người dùng</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('users.index') }}">Người dùng</a>
            </li>
            <li class="active">
                <strong>Thêm mới</strong>
            </li>
        </ol>
    </div>
</div>

<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Nhập thông tin người dùng</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Các trường thông tin người dùng -->
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
                        @error('username')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fullname">Họ tên:</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" value="{{ old('fullname') }}">
                        @error('fullname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Số điện thoại:</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="dob">Ngày sinh:</label>
                        <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob') }}">
                        @error('dob')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sex">Giới tính:</label>
                        <select name="sex" id="sex" class="form-control">
                            <option value="">Chọn giới tính</option>
                            <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>Nam</option>
                            <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>Nữ</option>
                        </select>
                        @error('sex')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Mật khẩu:</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Xác nhận mật khẩu:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Ảnh đại diện:</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Thêm ô chọn loại người dùng -->
                    <div class="form-group">
                        <label for="user_category_id">Loại người dùng:</label>
                        <select name="user_category_id" id="user_category_id" class="form-control">
                            <option value="">Chọn loại người dùng</option>
                            @foreach ($userCategories as $userCategory)
                                <option value="{{ $userCategory->id }}" {{ old('user_category_id') == $userCategory->id ? 'selected' : '' }}>
                                    {{ $userCategory->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_category_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
