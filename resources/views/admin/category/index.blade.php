<!-- Trang index danh mục -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>{{ config('apps.category.title') }}</h2>
        <ol class="breadcrumb" style="margin-bottom:10px;">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="active"><strong>{{ config('apps.category.title') }}</strong></li>
        </ol>
    </div>
    <div class="col-lg-4">
        <div class="text-right">
            <!-- Có thể thêm các nút chức năng khác ở đây nếu cần -->
        </div>
    </div>
</div>

<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ config('apps.category.tableHeading') }}</h5>
                <div class="ibox-tools">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tạo Danh mục
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
                <form action="{{ route('admin.category.index') }}" method="GET" class="form-inline mb-3">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Tìm kiếm theo tên danh mục" value="{{ request('search') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </form>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th> <!-- Thêm cột ảnh -->
                            <th>Tên Danh mục</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" width="50" height="50">
                                    @else
                                        <span>Không có ảnh</span>
                                    @endif
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>{{ $category->active ? 'Kích hoạt' : 'Không kích hoạt' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Không có danh mục nào</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

               
            </div>
        </div>
    </div>
</div>
