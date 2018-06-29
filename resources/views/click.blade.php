@extends('layouts.indexCommon')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/click.css')}}"/>

<div class="clickme" >
    <a class="btnA" onclick="AddTimes();">Click Me ！</a>
</div>
<h2 class="showtime" id="clicknum">總點擊次數：{{$times}}</h2>

<script>
var i=0;

function AddTimes(){
    $.post('click/0',{'_method':'put','_token':'<?php echo csrf_token(); ?>'},function(data){
        $('#clicknum').html('總點擊次數：'+data);
    }, "text");
}

</script>
@endsection
