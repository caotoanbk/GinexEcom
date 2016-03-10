@extends('admin.layouts.master')

@section('content')

    @if($goods->count() > 0)
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">Goods list</div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover table-responsive datatable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Route</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Checked</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($goods as $good)
                        <tr>
                            <td>{{ $good->name }}</td>
                            <td>{{ $good->route }}</td>
                            <td>{{ $good->description }}</td>
                            <td>{{ $good->date }}</td>
                            <td>{{ $good->time }}</td>
                            <td>true</td>
                            <td>
                                {!! link_to_route('goods.accept', 'Accept', [$good->id], ['class' => 'btn btn-xs btn-info']) !!}
                                {!! Form::open(['style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => 'return confirm(\'' . 'Are you sure?' . '\');',  'route' => array('goods.destroy', $good->id)]) !!}
                                {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @else
        No entries found
    @endif
@endsection
