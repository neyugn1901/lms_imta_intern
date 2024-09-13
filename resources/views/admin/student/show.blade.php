
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Chi tiết học viên</h2>
        <ol class="breadcrumb" style="margin-bottom:10px;">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('admin.student.index') }}">Học viên</a>
            </li>
            <li class="active"><strong>Chi tiết</strong></li>
        </ol>
    </div>
</div>

<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Thông tin chi tiết học viên</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-4">
                        @if ($student->image)
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $student->image) }}" width="200" height="200">

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
                                <td>{{ $student->fullname }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>{{ $student->username }}</td>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <td>{{ $student->phone }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $student->email }}</td>
                            </tr>
                            <tr>
                                <th>Ngày sinh</th>
                                <td>{{ $student->dob }}</td>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <td>{{ $student->address }}</td>
                            </tr>
                            <tr>
                                <th>Giới tính</th>
                                <td>{{ $student->sex }}</td>
                            </tr>
                            <tr>
                                <th>Level</th>
                                <td>{{ $student->level }}</td>
                            </tr>
                           
                        </table>
                    </div>
                </div>
                <!-- Nút Trở về danh sách ở dưới -->
                <div class="text-right mt-3">
                    <a href="{{ route('admin.student.index') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-left"></i> Trở về danh sách
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
