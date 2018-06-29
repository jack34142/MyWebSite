@extends('layouts.indexCommon')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('resources/views/memo/css/memo.css')}}"/>

<div style="float: left; width: 100%;">
    <div class="serch">
        <form action="" method="get">
            <table>
            <tr>
                <td>文章搜索</td>
                <td></td>
            </tr>
            <tr>
                <td><input size="18" type="text" name="search"/></td>
                <td><input type="submit"/></td>
            </tr>
            <tr>
                <td><a href="{{url('memo')}}">清除搜索</a></td>
                <td></td>
            </tr>

            </table>
        </form>
    </div>
    
    <div class="pageBG">
        <table id="subject" class="subject">
            <tr>
                <td>科目</td>
                <td>標題</td>
                <td>日期</td>
            </tr>
            @foreach($article as $val)
            <tr>
                <td>{{$val->subject}}</td>
                <td><a href='{{url("memo/$val->id")}}' target='_parent'>{{$val->title}}</a></td>
                <td>{{date("Y/m/d",strtotime($val->time))}}</td>
            </tr>
            @endforeach
        </table>
    
        {{$article->links()}}
    </div>

    
</div>

<script>
$(document).ready(function(){
    changeHref();
});

function changeHref(){
    var urlParam = location.search;
    if(urlParam){
        var paramSplitByQuestion = urlParam.split("?");
        var paramSplitByAnd = paramSplitByQuestion[1].split("&");

        var search;

        for (var i = paramSplitByAnd.length-1; i >= 0 ; i--) {
            if(paramSplitByAnd[i].substring(0,6) === "search"){
                search = paramSplitByAnd[i].split("=")[1];
                break;
            }
        }
        
        if(search){
            for(var i = 0; i<$(".pagination a").length; i++){
                var pageList = $(".pagination a:eq("+i+")");
                var lastUrl = pageList.attr("href");
                pageList.attr("href", lastUrl + "&search=" + search);
            }
        }
    }
}

</script>

@endsection
