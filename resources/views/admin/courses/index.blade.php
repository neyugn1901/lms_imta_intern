<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>{{ config('apps.course.title') }}</h2>
        <ol class="breadcrumb" style="margin-bottom:10px;">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="active"><strong>{{ config('apps.course.title') }}</strong></li>
        </ol>
    </div>
    <div class="col-lg-4">
        <div class="text-right">
            <!-- Optional content -->
        </div>
    </div>
</div>

<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ config('apps.course.tableHeading') }}</h5>
                <div class="ibox-tools">
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tạo Khóa học
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
                <!-- Thanh tìm kiếm -->
                <form action="{{ route('admin.courses.index') }}" method="GET" class="form-inline mb-3">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Tìm kiếm theo tên khóa học" value="{{ request('search') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </form>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên khóa học</th>
                            <th>Loại khóa học</th>
                            <th>Cấp độ</th>
                            <th>Giá</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course->course_name }}</td>
                                <td>{{ $course->category->name ?? 'N/A' }}</td>
                                <td>{{ $course->level }}</td>
                                <td>{{ $course->price }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.courses.show', $course->course_id) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.courses.edit', $course->course_id) }}" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.courses.destroy', $course->course_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa khóa học này không?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Không có khóa học nào</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
