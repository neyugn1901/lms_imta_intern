<div class="feature-instructors">
    <div class="section-header aos" data-aos="fade-up">
        <div class="section-sub-head feature-head text-center">
            <h2>Featured Instructors</h2>
            <div class="section-text aos" data-aos="fade-up">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eget aenean accumsan bibendum gravida maecenas augue elementum et neque. Suspendisse imperdiet.</p>
            </div>
        </div>
    </div>
    <div class="owl-carousel instructors-course owl-theme aos" data-aos="fade-up">
        @foreach ($instructors as $instructor)
        <div class="instructors-widget">
            <div class="instructors-img">
                {{--  <a href="{{ route('instructors.show', $instructor->id) }}">  --}}
                    <img class="img-fluid" alt="Img" src="{{ asset('storage/' . $instructor->image) }}">
                </a>
            </div>
            <div class="instructors-content text-center">
                <h5><a href="">{{ $instructor->fullname }}</a></h5>
                
                <div class="student-count d-flex justify-content-center">
                    <i class="fa-solid fa-user-group"></i>
                    {{--  <span>{{ $instructor->students_count }} Students</span>  --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
