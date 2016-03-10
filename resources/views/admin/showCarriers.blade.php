
@extends('admin.layouts.master')

@section('content')



    @if($carriers->count() > 0)
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">Carriers list</div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover table-responsive datatable">
                    <thead>
                    <tr>
                        <th>Route</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($carriers as $carrier)
                        <tr>
                            <td>{{ $carrier->route }}</td>
                            <td>{{ $carrier->price }}</td>
                            <td>{{ $carrier->date }}</td>
                            <td>
                               @if(!$carrier->checked)  {!! link_to_route('carriers.accept', 'Accept', [$carrier->id], ['class' => 'btn btn-xs btn-info']) !!} @endif
                                {!! Form::open(['style' => 'display: inline-block;', 'method' => 'get', 'onsubmit' => 'return confirm(\'' . 'Are you sure?' . '\');',  'route' => array('carriers.destroy', $carrier->id)]) !!}
							</td>
							<td>
                                {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                            </td>
                                {!! Form::close() !!}
							<td>
                              {!! link_to_route('carriers.deny', 'Deny', [$carrier->id], ['class' => 'btn btn-xs btn-warning']) !!} 
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
