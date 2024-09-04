
    
    <!DOCTYPE html>
    <html>
    
    <head>
        @include('admin.component.head')
       
    </head>
    
    <body>
        <div id="wrapper">
            @include('admin.component.sidebar')
            <div id="page-wrapper" class="gray-bg dashbard-1">                    
                @include('admin.component.nav')
                @include($template)
                @include('admin.component.footer')
            </div>
        </div> 
        <!-- Mainly scripts -->
        @include('admin.component.script')
    </body>
    </html>
    