@extends('adminamazing::teamplate')

@section('pageTitle', 'Депозиты')
@section('content')
    <script>
        var route = '{{ route('home') }}';
        var message = 'Вы точно хотите удалить данное сообщение?';
    </script>
    <div class="row">
        <!-- Column -->
        <div class="col-12">
            <div class="row m-b-10">
                <div class="col-md-12">
                    <a href="{{route('AdminDepositsCreate')}}" class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> Создать депозит</a>
                </div>
            </div>
            <!-- Row -->
            <div class="row">
                @if(count($deposits) > 0)
                    @foreach($deposits as $deposit)
                        <div class="col-md-6">
                            <div class="card card-outline-info">
                                @if($deposit->deposit_end)
                                    <div class="ribbon ribbon-warning ribbon-right">Не активный</div>
                                @else
                                    <div class="ribbon ribbon-success ribbon-right">Активный</div>
                                @endif
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">{{$deposit->percent}}% на {{$deposit->accruals}} дней</h4>
                                </div>
                                <div class="card-block">
                                    <h3 class="card-title">{{$deposit->email}} <a href="{{route('AdminUsersEdit', $deposit->user_id)}}"><span class="label label-light-success">Профиль</span></a></h3>
                                    <p>
                                        Upline: {{$deposit->parent_email}}
                                        @if($deposit->parent_email)
                                            <a href="{{route('AdminUsersEdit', $deposit->parent_id)}}"><span class="label label-light-success">Профиль</span></a>
                                        @endif
                                    </p>
                                    <p class="card-text">{{$deposit->title}}: {{$deposit->amount}} {{$deposit->currency}} / {{$deposit->amount_default_currency}} USD</p>
                                    <p>Открыт: {{$deposit->created_at->diffForHumans()}} - {{$deposit->depositend_at->diffForHumans()}}</p>
                                    <p>Начисление: {{$deposit->accrual_at->diffForHumans()}}</p>
                                    <p>Начислений: {{$deposit->count_accruals}} / {{$deposit->accruals}}</p>
                                    <p><a href="{{route('AdminDepositsHistory', [$deposit->id, $deposit->user_id])}}">История начислений</a></p>
                                    <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$deposit->compleated_percents}}%;height:15px;" role="progressbar""> {{$deposit->compleated_percents}}% </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <div class="alert alert-warning text-center" style="">
                            <h4>Депозитов не найдено!</h4>
                        </div>
                    </div>
                @endif
            </div>
            <!-- End Row -->

            <nav aria-label="Page navigation example" class="m-t-40">
                {{ $deposits->links('vendor.pagination.bootstrap-4') }}
            </nav>            
        </div>
        <!-- Column -->    
    </div>
@endsection