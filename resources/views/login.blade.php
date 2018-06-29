@extends('layouts.indexCommon')
@section('content')

<div style="text-align: center; padding: 32px;"><form>
    {{ csrf_field() }}
    
    帳號：<input type="text" name="userid" value="{{$userid}}"/><br/>
    密碼：<input type="password" name="passwd" value=""/><br/>
    <input type="checkbox" name="memory" {{$memory}} />記住帳號
    <input type="button" value="登入" onclick="Check()"/>
    <a href="{{url('register')}}">註冊帳號</a>
</form></div>    
    





<script>
var Check = function(){
    $.post('',$('form:first').serialize(),function(data){
        alert(data);
        if(data.match("歡迎登入")){
            window.parent.location = "{{url('')}}";
        }
    },'text')
}
$("input").keyup(function(){
    //keyCode == 13 -> enter
    if(event.keyCode == 13){
        Check();
    }
});

</script>

@endsection
