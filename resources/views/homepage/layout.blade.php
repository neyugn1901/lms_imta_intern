<!DOCTYPE html>
<html lang="en">

<head>
    @include('homepage.component.head')
</head>

<body>

    <div class="main-wrapper">

        <header class="header">
           @include('homepage.component.topbar')
        </header>


        <section class="home-slide d-flex align-items-center">
           @include('homepage.component.homeside')
        </section>

        <section class="section student-course">
            @include('homepage.component.student-course')
        </section>


        <section class="section how-it-works">
            @include('homepage.home.category')
        </section>


        <section class="section new-course">
           @include('homepage.home.course')
        </section>


        <section class="section master-skill">
            @include('homepage.component.new')
        </section>


        <section class="section trend-course">
           @include('homepage.home.trend-course')

            @include('homepage.home.instructors')  
        </section>

        @include($template)

        <footer class="footer">

            @include('homepage.component.footer')

        </footer>

    </div>


  @include('homepage.component.script')
</body>



</html>