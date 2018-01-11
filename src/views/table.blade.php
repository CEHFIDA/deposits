@extends('adminamazing::teamplate')

@section('pageTitle', 'Депозиты')
@section('content')
    <script>
        var route = '{{ route('home') }}';
        var message = 'Вы точно хотите удалить данное сообщение?';
    </script>
    @push('display')
        
        <a href="{{route('AdminDepositsCreate')}}" class="btn hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> Создать депозит</a>
    @endpush
    <div class="row">
        <!-- Column -->
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title pull-left">@yield('pageTitle')</h4>
                    <div class="pull-right">
                        @if($view == 'index')
                            <a href="{{route('AdminDeposits', ['view' => 'table'])}}"><i class="mdi mdi-table-large"></i></a>
                        @else
                            <a href="{{route('AdminDeposits', ['view' => 'index'])}}"><i class="mdi mdi-apps"></i></a>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Вышестоящий</th>
                                    <th>Сумма</th>
                                    <th>Дата</th>
                                    <th>План</th>
                                    <th>Начисления</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deposits as $deposit)
                                    <tr>
                                        <td>{{$deposit->id}}</td>
                                        <td>
                                            <a href="{{route('AdminUsersEdit', $deposit->user_id)}}">{{$deposit->email}}</a>
                                        </td>
                                        <td>
                                            @if($deposit->parent_email)
                                                <a href="{{route('AdminUsersEdit', $deposit->parent_id)}}">{{$deposit->parent_email}}</a>
                                            @endif
                                        </td>
                                        <td>{{$deposit->title}}, {{$deposit->currency}}<br/>{{$deposit->amount}} / {{$deposit->amount_default_currency}} USD</td>
                                        <td>{{$deposit->created_at}}</td> 
                                        <td>{{$deposit->percent}}% на {{$deposit->accruals}} дней</td>
                                        <td>{{$deposit->count_accruals}} / {{$deposit->accruals}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            <nav aria-label="Page navigation example" class="m-t-40">
                {{ $deposits->links('vendor.pagination.bootstrap-4') }}
            </nav>
        </div>
        <!-- Column -->    
    </div>
@endsection