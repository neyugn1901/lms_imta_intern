<div class="container">
    <div class="section-header aos" data-aos="fade-up">
        <div class="section-sub-head">
            <span>What’s New</span>
            <h2>Featured Courses</h2>
        </div>
        <div class="all-btn all-category d-flex align-items-center">
            {{--  <a href="{{ route('courses.index') }}" class="btn btn-primary">All Courses</a>  --}}
        </div>
    </div>
    <div class="section-text aos" data-aos="fade-up">
        <p class="mb-0">Explore our latest courses and start learning today.</p>
    </div>
    <div class="course-feature">
        <div class="row">
            @foreach($courses as $course)
                <div class="col-lg-4 col-md-6 mb-4 d-flex">
                    <div class="course-box d-flex flex-column aos" data-aos="fade-up">
                        <div class="product">
                            <div class="product-img">
                                <a href="">
                                    <img class="img-fluid" alt="{{ $course->course_name }}" src="{{ asset('storage/' . $course->image) }}">
                                </a>
                                <div class="price">
                                    <h3>{{ number_format($course->price, 0, ',', '.') }} VND</h3>
                                </div>
                            </div>
                            <div class="product-content mt-3">
                                <h3 class="title instructor-text">
                                    <a href="">{{ $course->course_name }}</a>
                                </h3>
                                <div class="course-info d-flex align-items-center mt-2">
                                    <p class="mb-0 mr-3">Level: {{ ucfirst($course->level) }}</p>
                                    <p class="mb-0">Category: {{ $course->category->name }}</p> <!-- Hiển thị danh mục -->
                                </div>
                                <div class="course-info d-flex align-items-center">
                                    <div class="rating-img d-flex align-items-center">
                                    <img src="{{ asset('assets_home/img/icon/icon-01.svg') }}" alt="Img">
                                    <p>10+ Lesson</p>
                                    </div>
                                    <div class="course-view d-flex align-items-center">
                                    <img src="{{ asset('assets_home/img/icon/icon-02.svg') }}" alt="Img">
                                    <p>8hr 30min</p>
                                    </div>
                                    </div>
                                <div class="course-actions d-flex justify-content-between align-items-center mt-3">
                                    <!-- Phần Đánh Giá -->
                                    <div class="rating m-0 d-flex align-items-center">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating ml-2">
                                            <span>4.2</span> (15)
                                        </span>
                                    </div>
                                    <div class="all-btn all-category d-flex align-items-center">
                                        <form action="{{ route('home.cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                            <button type="submit" class="btn btn-primary">BUY NOW</button>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
