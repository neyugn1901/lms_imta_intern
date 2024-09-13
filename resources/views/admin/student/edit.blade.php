<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Chỉnh sửa người dùng</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('admin.instructor.index') }}">Học viên</a>
            </li>
            <li class="active">
                <strong>Chỉnh sửa</strong>
            </li>
        </ol>
    </div>
</div>

<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Cập nhật thông tin học viên</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $student->username) }}">
                        @error('username')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fullname">Họ tên:</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" value="{{ old('fullname', $student->fullname) }}">
                        @error('fullname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Số điện thoại:</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $student->phone) }}">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="dob">Ngày sinh:</label>
                        <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob', $student->dob) }}">
                        @error('dob')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $student->address) }}">
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sex">Giới tính:</label>
                        <select name="sex" id="sex" class="form-control">
                            <option value="">Chọn giới tính</option>
                            <option value="male" {{ old('sex', $student->sex) == 'male' ? 'selected' : '' }}>Nam</option>
                            <option value="female" {{ old('sex', $student->sex) == 'female' ? 'selected' : '' }}>Nữ</option>
                        </select>
                        @error('sex')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $student->email) }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control">
                            <option value="beginner" {{ old('level', $student->level) == 'beginner' ? 'selected' : '' }}>Beginner</option>
                            <option value="intermediate" {{ old('level', $student->level) == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="advanced" {{ old('level', $student->level) == 'advanced' ? 'selected' : '' }}>Advanced</option>
                        </select>
                        @error('level')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Ảnh đại diện (để trống nếu không thay đổi):</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        @if($student->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->username }}" width="100">
                           
                        </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('admin.student.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
