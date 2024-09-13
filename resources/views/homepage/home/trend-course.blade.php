<div class="container">
    <div class="section-header aos" data-aos="fade-up">
        <div class="section-sub-head">
            <span>What’s New</span>
            <h2>TRENDING COURSES</h2>
        </div>
        <div class="all-btn all-category d-flex align-items-center">
            <a href="course-list.html" class="btn btn-primary">All Courses</a>
        </div>
    </div>
    <div class="section-text aos" data-aos="fade-up">
        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eget aenean accumsan bibendum gravida maecenas augue elementum et neque. Suspendisse imperdiet.</p>
    </div>
    <div class="owl-carousel trending-course owl-theme aos" data-aos="fade-up">
        @foreach($courses as $course)
        <div class="item">
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
                        <div class="course-info d-flex flex-column mt-2">
                            <p class="mb-1"><strong>Level:</strong> {{ ucfirst($course->level) }}</p>
                            <p class="mb-1"><strong>Category:</strong> {{ $course->category->name }}</p>
                        </div>
                        <div class="course-info d-flex align-items-center mt-2">
                            <div class="rating-img d-flex align-items-center mr-3">
                                <img src="{{ asset('assets_home/img/icon/icon-01.svg') }}" alt="Img">
                                <p class="mb-0">10+ Lesson</p>
                            </div>
                            <div class="course-view d-flex align-items-center">
                                <img src="{{ asset('assets_home/img/icon/icon-02.svg') }}" alt="Img">
                                <p class="mb-0">8hr 30min</p>
                            </div>
                        </div>
                        <div class="course-actions d-flex justify-content-between align-items-center mt-3">
                            <!-- Phần Đánh Giá -->
                            <div class="rating d-flex align-items-center">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i>
                                <span class="d-inline-block average-rating ml-2">
                                    <span>4.2</span> (15)
                                </span>
                            </div>
                            <!-- Nút Buy Now -->
                            <div class="all-btn all-category d-flex align-items-center">
                                <a href="checkout.html" class="btn btn-primary">BUY NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
