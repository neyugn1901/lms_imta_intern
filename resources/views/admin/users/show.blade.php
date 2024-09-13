
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Chi tiết người dùng</h2>
        <ol class="breadcrumb" style="margin-bottom:10px;">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}">Người dùng</a>
            </li>
            <li class="active"><strong>Chi tiết</strong></li>
        </ol>
    </div>
</div>

<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Thông tin chi tiết người dùng</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-4">
                        @if ($user->image)
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $user->image) }}" width="200" height="200">

                            </div>
                        @else
                            <div class="text-center">
                                <p>No Image</p>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-8">
                        <h4>Thông tin cá nhân</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Họ tên</th>
                                <td>{{ $user->fullname }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Ngày sinh</th>
                                <td>{{ $user->dob }}</td>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <th>Giới tính</th>
                                <td>{{ $user->sex }}</td>
                            </tr>
                            <tr>
                                <th>Loại người dùng</th>
                                <td>
                                    @if ($user->usercategory)
                                        {{ $user->usercategory->name }}
                                    @else
                                        No Category
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- Nút Trở về danh sách ở dưới -->
                <div class="text-right mt-3">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-left"></i> Trở về danh sách
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
