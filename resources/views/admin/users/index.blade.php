<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>{{ config('apps.user.title') }}</h2>
        <ol class="breadcrumb" style="margin-bottom:10px;">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="active"><strong>{{ config('apps.user.title') }}</strong></li>
        </ol>
    </div>
</div>
<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ config('apps/user/tableHeading') }}</h5>
                <div class="ibox-tools">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tạo Người Dùng
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
                            <th>Tên người dùng</th>
                            <th>Email</th>
                            <th>Loại người dùng</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="user-item username">{{ $user->username }}</div>
                                </td>
                                <td>
                                    <div class="user-item email">{{ $user->email }}</div>
                                </td>
                                <td>
                                    @if ($user->user_category_id)
                                        @php
                                            $category = $userCategories->firstWhere('id', $user->user_category_id);
                                        @endphp
                                        <div class="user-item category">{{ $category ? $category->name : 'No Category' }}</div>
                                    @else
                                        No Category
                                    @endif
                                </td>
                                
                                <td class="text-center">
                                    <!-- Nút Chỉnh Sửa -->
                                    <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <!-- Nút Chi tiết -->
                                    <a href="{{ route('admin.users.show', ['id' => $user->id]) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <!-- Nút Xóa -->
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?');">
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
