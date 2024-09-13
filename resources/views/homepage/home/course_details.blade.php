<section class="page-content course-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Thông tin tổng quan khóa học -->
                <div class="card overview-sec">
                    <div class="card-body">
                        <h5 class="subs-title">Overview</h5>
                        <h6>{{ $course->course_name }}</h6>
                        <p>{{ $course->description }}</p>
                    </div>
                </div>

                <!-- Thông tin chi tiết khóa học -->
                <div class="card course-details-sec">
                    <div class="card-body">
                        <h5 class="subs-title">Course Details</h5>
                        <ul>
                            <li><strong>Level:</strong> {{ $course->level }}</li>
                            <li><strong>Price:</strong> {{ $course->price }} VND</li>
                            <li><strong>Category:</strong> {{ $course->category->name }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Phần hình ảnh và video khóa học -->
                <div class="card media-sec">
                    <div class="card-body">
                        <h5 class="subs-title">Media</h5>
                        <div class="media-wrap">
                            <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" class="img-fluid">
                            <a href="{{ $course->video }}" class="btn btn-primary mt-3">Watch Course Video</a>
                        </div>
                    </div>
                </div>

                <!-- Phần tải xuống tài liệu khóa học -->
                <div class="card file-sec">
                    <div class="card-body">
                        <h5 class="subs-title">Course Files</h5>
                        <a href="{{ asset('storage/' . $course->file) }}" class="btn btn-secondary" download>Download Course File</a>
                    </div>
                </div>
            </div>

            
            <div class="col-lg-4">
                <!-- Thông tin chung về khóa học -->
                <div class="card summary-sec">
                    <div class="card-body">
                        <h4>Course Summary</h4>
                        <ul>
                            {{--  <li><strong>Lessons:</strong> {{ $course->lessons_count }}</li>
                            <li><strong>Duration:</strong> {{ $course->duration }} hours</li>
                            <li><strong>Students Enrolled:</strong> {{ $course->students_enrolled }}</li>  --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
