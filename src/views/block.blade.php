@push('scripts')
    <script src="http://localhost:3001/vendor/adminamazing/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script>
        $(function(){
            var sparklineLogin = function() { 
                $('#sparklinedash1').sparkline([ {{$imploade_data}}], {
                    type: 'bar',
                    height: '100',
                    barWidth: '4',
                    resize: true,
                    barSpacing: '5',
                    barColor: '#03a9f3'
                });
            }
            var sparkResize;

            $(window).resize(function(e) {
                clearTimeout(sparkResize);
                sparkResize = setTimeout(sparklineLogin, 500);
            });
            sparklineLogin();
        })
    </script>
@endpush
<div style="margin-top: 1.25rem;">
    <div class="row">
        <div class="col-8">
            <span class="display-6">{{$deposits_today}} 
                @if($deposits_yesterday >= $deposits_today)
                    <i class="ti-angle-down font-14 text-danger"></i>
                @else
                    <i class="ti-angle-up font-14 text-success"></i>
                @endif
            </span>
            <h6>Депозитов сегодня</h6>
        </div>
        <div class="col-4 align-self-center text-right p-l-0">
            <div id="sparklinedash1"></div>
        </div>
    </div>
</div>