<!DOCTYPE html>
<html lang="en">
@include('themes.app.head')
<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            @include('themes.app.aside')
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('themes.app.header')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    {{$slot}}
                </div>
                @include('themes.app.footer')
            </div>
        </div>
    </div>
    @include('themes.app.js')
    @yield('custom_js')
</body>
</html>