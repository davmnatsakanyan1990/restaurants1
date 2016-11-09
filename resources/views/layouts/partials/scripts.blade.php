{{--libraries--}}

<script src="{{asset('lib/jquery-3.1.0.min.js')}}"></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
<script src="{{asset('lib/fancybox/lib/jquery-1.10.1.min.js')}}"></script>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="{{asset('lib/fancybox/lib/jquery.mousewheel-3.0.6.pack.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/fancybox/source/jquery.fancybox.pack.js')}}"></script>




<!-- jQuery library -->

{{--<script type='text/javascript' src='http://yerevancar.am/wp-content/themes/yerevancar/incl/fancybox/source/jquery.fancybox.pack.js?ver=4.5.4'></script>--}}

<script src="{{asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('lib/angular/angular.min.js')}}"></script>
<script src="{{asset('lib/angular-route/angular-route.js')}}"></script>

<script src="{{asset('/ng/app.js')}}"></script>

{{--services--}}
<script src="{{asset('ng/service/services.js')}}"></script>

{{--controllers--}}
<script src="{{asset('ng/controller/MapController.js')}}"></script>
<script src="{{asset('ng/controller/RootCtrl.js')}}"></script>
<script src="{{asset('ng/controller/currentCtrl.js')}}"></script>

{{--directives--}}
<script src="{{asset('ng/directive/scroll.js')}}"></script>
<script src="{{asset('ng/directive/starRating.js')}}"></script>

{{--other js files--}}

{{--<script src="{{asset('lib/star/star.js')}}"></script>--}}

<script src="{{asset('js/animateMenu.js')}}"></script>
<script src="{{asset('js/slider2.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkB3G-qzliKWCg-x_LYj_BlP5wNRvg2BA&libraries=places" async defer></script>