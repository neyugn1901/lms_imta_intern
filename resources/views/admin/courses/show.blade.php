<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Chi tiết khóa học</h2>
        <ol class="breadcrumb" style="margin-bottom:10px;">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('admin.courses.index') }}">Khóa học</a>
            </li>
            <li class="active"><strong>Chi tiết</strong></li>
        </ol>
    </div>
</div>

<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Thông tin chi tiết khóa học</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-4">
                        @if ($course->image)
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" width="200" height="200">
                            </div>
                        @else
                            <div class="text-center">
                                <p>No Image</p>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-8">
                        <h4>Thông tin khóa học</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Tên khóa học</th>
                                <td>{{ $course->course_name }}</td>
                            </tr>
                            <tr>
                                <th>Mô tả</th>
                                <td>{{ $course->description }}</td>
                            </tr>
                            <tr>
                                <th>Danh mục</th>
                                <td>{{ $course->category->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Cấp độ</th>
                                <td>{{ $course->level }}</td>
                            </tr>
                            <tr>
                                <th>Giá</th>
                                <td>{{ $course->price }}</td>
                            </tr>
                            <tr>
                                <th>Video</th>
                                <td>
                                    @if ($course->video)
                                        <video width="320" height="240" controls>
                                            <source src="{{ asset('storage/' . $course->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @else
                                        <p>No Video</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Tài liệu</th>
                                <td>
                                    @if ($course->file)
                                        <a href="{{ asset('storage/' . $course->file) }}" download>Tải xuống tài liệu</a>
                                    @else
                                        <p>No File</p>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- Nút Trở về danh sách ở dưới -->
                <div class="text-right mt-3">
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-left"></i> Trở về danh sách
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
