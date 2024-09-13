<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>{{ config('apps.instructor.title') }}</h2>
        <ol class="breadcrumb" style="margin-bottom:10px;">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="active"><strong>{{ config('apps.instructor.title') }}</strong></li>
        </ol>
    </div>
</div>
<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ config('apps/instructor/tableHeading') }}</h5>
                <div class="ibox-tools">
                    <a href="{{ route('admin.instructor.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tạo Giảng Viên
                    </a>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a></li>
                        <li><a href="#">Config option 2</a></li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($instructors as $instructor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="user-item username">{{ $instructor->username }}</div>
                                </td>
                                <td>
                                    <div class="user-item email">{{ $instructor->email }}</div>
                                </td>                                                         
                                <td class="text-center">
                                    <!-- Nút Chỉnh Sửa -->
                                    <a href="{{ route('admin.instructor.edit', ['id' => $instructor->id]) }}" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <!-- Nút Chi tiết -->
                                    <a href="{{ route('admin.instructor.show', ['id' => $instructor->id]) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <!-- Nút Xóa -->
                                    <form action="{{ route('admin.instructor.destroy', $instructor->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa giảng viên này không?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
