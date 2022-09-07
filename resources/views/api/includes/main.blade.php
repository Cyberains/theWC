<!DOCTYPE html>
<html>

<!-- HEADER START -->
<head>

	@yield('title')
	@include('api.includes.header')
    
</head>
<!-- HEADER END -->
@yield('style')
<!-- BODY STARTS -->
<body>
	   
        @yield('body')

        @yield('modal')

        <!-- SCRIPT STARTS -->
        @include('api.includes.script')

        @yield('customscript')
        
        <!-- SCRIPT ENDS -->
</body>
<!-- BODY ENDS -->
</html>