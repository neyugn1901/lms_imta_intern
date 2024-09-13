<!-- Trang tạo danh mục mới -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Tạo Danh Mục Mới</h2>
        <ol class="breadcrumb" style="margin-bottom:10px;">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('admin.category.index') }}">{{ config('apps.category.title') }}</a>
            </li>
            <li class="active"><strong>Tạo Danh Mục</strong></li>
        </ol>
    </div>
</div>

<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tạo Danh Mục Mới</h5>
                <div class="ibox-tools">
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
                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Tên Danh Mục -->
                    <div class="form-group">
                        <label for="name">Tên Danh Mục</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên danh mục" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Mô Tả -->
                    <div class="form-group">
                        <label for="description">Mô Tả</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Trạng Thái -->
                    <div class="form-group">
                        <label for="active">Trạng Thái</label>
                        <select name="active" id="active" class="form-control">
                            <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>Kích hoạt</option>
                            <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>Không kích hoạt</option>
                        </select>
                        @error('active')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Hình Ảnh -->
                    <div class="form-group">
                        <label for="image">Hình Ảnh</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nút Tạo Danh Mục -->
                    <button type="submit" class="btn btn-primary">Tạo Danh Mục</button>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>
