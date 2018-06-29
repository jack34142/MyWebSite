@extends('layouts.indexCommon')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('resources/views/memo/css/article.css')}}"/>
    {!! $content !!}
<script>
$("document").ready(function(){
    var engi = document.getElementsByClassName("engineer");
    Array.prototype.forEach.call(engi, function(val){
        newVal = val.innerHTML.replace(/\　/g, '&nbsp;&nbsp;');
        val.innerHTML = newVal;
    });
});
</script>
@endsection