@extends('layouts.indexCommon')
@section('content')
<div style="text-align: center; padding: 32px;"><form>
    {{ csrf_field() }}
    
    帳號：<input type="text" name="userid" value="{{$userid}}"/><br/>
    密碼：<input type="password" name="passwd" value=""/><br/>
    確認密碼：<input type="password" name="passwd_confirmation" value=""/><br/>
    <input type="button" value="註冊" onclick="Check()"/>
    <a href="{{url('login')}}">返回登入</a>
</form></div>



<script>
var Check = function(){
    $.post('',$('form:first').serialize(),function(data){
        alert(data);
        if(data.match("註冊成功")){
            window.parent.location = "{{url('login')}}";
        }
    },'text');
};
$("input").keyup(function(){
    //keyCode == 13 -> enter
    if(event.keyCode == 13){
        Check();
    }
});
</script>

@endsection
