@extends('adminamazing::teamplate')

@section('pageTitle', 'Депозиты -> История начислений')
@section('content')
    <script>
        var route = '{{ route('home') }}';
        var message = 'Вы точно хотите удалить данное сообщение?';
    </script>
    <div class="row">
        <!-- Column -->
        <div class="col-12">
            <!-- Row -->
            <div class="card">
            	<div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Сума</th>
                                <th>Статус</th>
                                <th>Дата</th>
                                <th>Обновлен</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($history as $row)
	                            <tr>
                                    <td>{{$loop->iteration}}</td>
	                                <td>{{$row->id}}</td>
	                                <td>{{$row->amount}} {{$row->currency}} / {{$row->amount_default_currency}} USD</td>
	                                <td>{{$row->status}}</td>
	                                <td>{{$row->created_at}}</td>
	                                <td>{{$row->updated_at}}</td>
	                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- Column -->    
    </div>
@endsection