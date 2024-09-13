<div class="container">
    <div class="section-header aos" data-aos="fade-up">
        <div class="section-sub-head">
            <span>Favourite Course</span>
            <h2>Top Category</h2>
        </div>
        <div class="all-btn all-category d-flex align-items-center">
            {{--  <a href="{{ route('category.index') }}" class="btn btn-primary">All Categories</a>  --}}
        </div>
    </div>
    <div class="section-text aos" data-aos="fade-up">
        <p>CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS</p>
    </div>
    <div class="owl-carousel mentoring-course owl-theme aos" data-aos="fade-up">
        @foreach($categories as $category)
            <div class="feature-box text-center ">
                <div class="feature-bg">
                    <div class="feature-header">
                        <div class="feature-icon">
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                        </div>
                        <div class="feature-cont">
                            <div class="feature-text">{{ $category->name }}</div>
                        </div>
                    </div>
                  
                </div>
            </div>
        @endforeach
    </div>
</div>
