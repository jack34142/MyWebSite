

@extends('layouts.indexCommon')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/resume.css')}}"/>
<div class="warning">* 如果版面有任何問題，重新整理可以解決任何問題，大概OAO。</div>
<div class="contentbg">
    <!--履歷的上半部分111111111111111111111111111111111111111111111111111111111-->
    <div class="topbg">
        <div class="face">
            <img width="176px" src="{{asset('resources/views/image/face.png')}}">
            <img src="{{asset('resources/views/image/check.png')}}">男性
            <img src="{{asset('resources/views/image/check.png')}}">未婚
            <img src="{{asset('resources/views/image/check.png')}}">已服役
        </div>
        <h1 style="margin-top:3%;  text-align: center;">李俊毅 JYUN,YI-LI</h1>
        <table class="status">
            <tr>
                <td>生日：83/09/14</td>
                <td>手機：暫不提供</td>   
            </tr>
            <tr>
                <td>學歷：元智大學電機系</td>
                <td>家電：暫不提供</td>   
            </tr>
            <tr>
                <td>居住區：桃園市龜山區</td>
                <td>信箱：jack34142@gmail.com</td>   
            </tr>
        </table>
        <div style="text-align: center">作品：<a href="http://galliard-horsepower.000webhostapp.com" target="_parent">https://goo.gl/zuxx4X</a></div>
    </div>
    <!--履歷的上半部分111111111111111111111111111111111111111111111111111111111-->

    <!--履歷的下半部分111111111111111111111111111111111111111111111111111111111-->
    <div class="midbg">
        <h2 class="title">個人簡歷</h2>
        <div class="content">
            　　我是李俊毅，畢業於元智大學電機系，喜歡程式語言，
            我的專長是網頁程式設計，自學前後端語言，學習的過程中當然沒少過挫折，
            但我仍一一的剋服了，因此我除了程式語言以外，對自己的問題解決能力也非常有信心。<br/>
            　　能夠獨立完成PHP的一些專案，個性方面比較隨和、幽默。另外我非常的熱愛學習，
            目前待業期間，在聯成電腦學習Java、Android APP等技能。
        </div>

        <div class="content_mid"><div style="float:left;"><h2 class="title">工作技能</h2>
        <table class="skill">
            <tr>
                <td>PHP</td>
                <td>★★★</td>
                <td>Ajax / json</td>
                <td>★★★</td>
            </tr>
            <tr>
                <td>MySQL</td>
                <td>★★</td>   
                <td>Laravel</td>
                <td>★★</td>
            </tr>
            <tr>
                <td>html / css</td>
                <td>★★★</td>   
                <td>Node.js</td>
                <td>★</td>
            </tr>
            <tr>
                <td>js / jQuery</td>
                <td>★★★</td>   
                <td>Linux</td>
                <td>★</td>
            </tr>
        </table>
        <div style="margin-top: 11px; text-align: center;">【專精 ★★★】　【了解 ★★】　【略懂 ★】</div></div>


        <div class="langue"><h2 class="title">語言能力</h2>
        <table class="lang">
            <tr>
                <td></td>
                <td>中</td>
                <td>台</td>
                <td>英</td>


            </tr>
            <tr>
                <td>聽</td>
                <td><img width="12px" src="{{asset('resources/views/image/green.png')}}"></td>
                <td><img width="12px" src="{{asset('resources/views/image/green.png')}}"></td>
                <td><img width="12px" src="{{asset('resources/views/image/orange.png')}}"></td>


            </tr>
            <tr>
                <td>說</td>
                <td><img width="12px" src="{{asset('resources/views/image/green.png')}}"></td>   
                <td><img width="12px" src="{{asset('resources/views/image/green.png')}}"></td>
                <td><img width="12px" src="{{asset('resources/views/image/orange.png')}}"></td>


            </tr>
            <tr>
                <td>讀</td>
                <td><img width="12px" src="{{asset('resources/views/image/green.png')}}"></td>   
                <td></td>
                <td><img width="12px" src="{{asset('resources/views/image/orange.png')}}"></td>


            </tr>
            <tr>
                <td>寫</td>
                <td><img width="12px" src="{{asset('resources/views/image/green.png')}}"></td>   
                <td></td>
                <td><img width="12px" src="{{asset('resources/views/image/orange.png')}}"></td>

            </tr>
        </table>
        <div style="text-align: center;">
            <img width="12px" src="{{asset('resources/views/image/green.png')}}"> 不錯
            <img width="12px" src="{{asset('resources/views/image/orange.png')}}"> 略懂
            <img width="12px" src="{{asset('resources/views/image/red.png')}}"> 糟糕</div></div></div>


        <h2 class="title">相關經驗</h2>
        <ul class="exp">
            <li>大學時期曾經獨立完成一個簡單的App，內容即是以網頁為架構，
            並搭配使用一些工具，將其直接製成 Android App。</li>
            <li>另外也有做過專題研究，主題是「獨居老人的跌倒偵測」，
            項目中主要是利用一種特殊的晶片來搜集wifi的訊號，
            再利用機器學習來分析大數據。項目中我扮演著非常重要的角色，
            除了大家都該做的一些工作外，我還擔當了進度規劃與工作分配的職務，
            我想我是做得非常的好，畢竟我們組拿到了全年級最高的分數，
            而我則是全組最高分。</li>
            <li>專題的成績並不只是局限於我們學校，我們組別也拿著專題的成果去參加亞台青的青年創業大賽，
            在一百多組的參賽團隊中脫穎而出，成為入圍團隊，代表台灣創客到四川成都去比賽，雖然沒有得名，
            但也是收益良多。</li>
        </ul>

    </div>
    <!--履歷的下半部分111111111111111111111111111111111111111111111111111111111-->
</div>

@endsection
