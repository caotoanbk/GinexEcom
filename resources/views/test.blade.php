@foreach($tests as $test)
 <div> {{ date_format(date_create($test->test), 'H:i d/m/y') }} </div> 
@endforeach
