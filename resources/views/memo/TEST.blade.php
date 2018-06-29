@extends('layouts.indexCommon')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('resources/views/memo/css/article.css')}}"/>
<div class="tagY">
    
<h2>File 類別</h2>
<h3>一、File 類別</h3>
<div class="content">
<p>(1) 套件路徑在 java.io<br/>
(2) 用途是將「路徑(目錄)」或「路徑與檔名」打包成物件</p>

建立物件：<br/>
<div class="engineer">
File 物件 = new File(路徑)<br/>
File 物件 = new File(路徑與檔名)<br/>
File 物件 = new File(路徑,檔名)
</div>

(1) 編譯時不會對內容的真實性做檢查<br/>
(2) File 類別提供的成員方法，是類似一般作業系統中的「檔案總管」功能。 (詳見附錄)<br/>
(3) Java 1.4 開始有更進階的檔案總管功能，<br/>
　稱為「NIO」或「NIO2」，Java 1.7 則正式放入 jdk 中
</div>

<h3>二、檔案 IO</h3>
<div class="content">
區分為兩大類別，分別是 Character Stream 與 Byte Stream。

<p>1. Character Stream<br/>
　(1) 以16 bit 為 IO單元<br/>
　(2) 類別名稱為 xxxxxReader, xxxxxWriter<br/>
　　註：僅適用於文字檔案</p>

<p>2. Byte Stream<br/>
　(1) 以8 bit 為 IO單元<br/>
　(2) 類別名稱為 xxxxxInputStream, xxxxxOuputStream<br/>
　　註：僅適任何類型態的檔案</p>
</div>

<h3>三、Character Stream</h3>
<div class="content">

<p>1.<br/>
<img src="/resources/views/memo/image/IO001.png"></p>

ex.
<div class="engineer">
import java.io.*;<br/>

public class EX01{<br/>
　　public static void main(String[] args) throws Exception{<br/>
　　　　String file = "test01.txt";<br/>
　　　　String str1 = "ABCDEFGHIJKLMNO";<br/>
　　　　String str2 = "This is a book.\n";<br/><br/>

　　　　FileWriter output = new FileWriter(file);<br/><br/>

　　　　System.out.println("正在寫入檔案 ... " + file);<br/>
　　　　output.write(str1);<br/>
　　　　output.write(str2);<br/>
　　　　output.write(str1,3,8);<br/><br/>

　　　　output.close();<br/>
　　　　System.out.println("檔案寫入完畢");<br/>
　　}<br/>
}
</div>
<p>得到檔案如下：<br/>
<img src="/resources/views/memo/image/IO002.png"><br/>
你可能覺得奇怪，<br/>
明明就有打"\n"啊，<br/>
怎麼這個文字檔沒有換行啊？</p>

簡單來說，<br/>
"\n"對文字檔來說就是一個看不見的符號，<br/>
對螢幕緩充區來說，這個符號表示換行 。

<p>2.<br/>
<img src="/resources/views/memo/image/IO003.png"></p>

想在文字檔中換行，我們可以這樣寫：
<div class="engineer">
import java.io.*;<br/>

public class EX02{<br/>
　　public static void main(String[] args) throws Exception{<br/>
　　　　String file = "test02.txt";<br/>
　　　　String str1 = "ABCDEFGHIJKLMNO";<br/>
　　　　String str2 = "This is a book.\n";<br/><br/>

　　　　BufferedWriter output =<br/>
　　　　　　new BufferedWriter(new FileWriter(file));<br/><br/>

　　　　System.out.println("正在寫入檔案 ... " + file);<br/>
　　　　output.write(str1);<br/>
　　　　output.newLine();　　<span>//換列</span><br/>
　　　　output.write(str2);<br/>
　　　　output.newLine();　　<span>//換列</span><br/>
　　　　output.write(str1,3,8);<br/>
　　　　output.newLine();　　<span>//換列</span><br/><br/>

　　　　output.close();<br/>
　　　　System.out.println("檔案寫入完畢");<br/>
　　}<br/>
}
</div>

<p>如此一來就會得到這個樣子的檔案：<br/>
<img src="/resources/views/memo/image/IO004.png"></p>

<p>3.<br/>
<img src="/resources/views/memo/image/IO005.png"></p>

輸出其實不一定要是一個檔案，<br/>
也可以直接輸出到，螢幕緩衝區：
<div class="engineer">
import java.io.*;<br/><br/>

public class EX03{<br/>
　　public static void main(String[] args) throws Exception{<br/>
　　　　BufferedWriter output =<br/>
　　　　　new BufferedWriter(<br/>
　　　　　　　new OutputStreamWriter(System.out));<br/><br/>

　　　　String str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";<br/>
　　　　output.write(str);　　<span>//輸出字串</span><br/>
　　　　output.newLine();　　<span>//換列</span><br/>
　　　　output.write(str,3,10);<br/><br/>

　　　　output.close();　　<span>//關閉串流</span><br/>
　　}<br/>
}
</div>

輸出：
<div class="engineer">
ABCDEFGHIJKLMNOPQRSTUVWXYZ<br/>
DEFGHIJKLMPress any key to continue...
</div>

<p>4.<br/>
<img src="/resources/views/memo/image/IO006.png"></p>

不習慣 write(), read() 的人可以用這個方法寫入。<br/>
ex.
<div class="engineer">
import java.io.*;<br/><br/>

public class EX04{<br/>
　　public static void main(String[] args) throws Exception{<br/>
　　　　PrintWriter output =<br/>
　　　　　　new PrintWriter(new FileWriter("test04.txt"));<br/><br/>

　　　　int i,j,k;<br/>
　　　　for (i=1;i<=5;i++){<br/><br/>

　　　　　　for (j=0;j<5-i;j++){<br/>
　　　　　　　　output.print(" ");<br/>
　　　　　　}<br/><br/>

　　　　　　for (k=1;k<=i*2-1;k++){<br/>
　　　　　　　　output.print("*"); <br/>
　　　　　　}<br/><br/>

　　　　　　output.println();<br/>
　　　　}<br/><br/>

　　　　System.out.println("成功寫入EX06.txt");<br/>
　　　　output.close();<br/>
　　}<br/>
} 
</div>





</div>

<h3>四、Byte Stream</h3>
<div class="content">

<p>1.<br/>
<img src="/resources/views/memo/image/IO007.png"></p>
ex.
<div class="engineer">
import java.io.*;<br/><br/>

public class EX07_FileOutputStream{<br/><br/>

　　static void print(String s){	<br/>
　　　　System.out.print(s);<br/>
　　}<br/><br/>

　　public static void main(String[] args) throws IOException{<br/><br/>

　　　　String fileName = "test01.txt";<br/>
　　　　<span>//字串轉Byte</span><br/>
　　　　byte[] data =<br/>
　　　　　　"You will never win, if you never begin.".getBytes();<br/><br/>

　　　　System.out.println("正在寫入檔案...EX07.txt");<br/><br/>

　　　　FileOutputStream file1 = new FileOutputStream(fileName);<br/>
　　　　for(int i=0; i<data.length; i++){<br/>
　　　　　　file1.write(data[i]);<br/>
　　　　}<br/><br/>

　　　　FileOutputStream file2 = new FileOutputStream(fileName,true);<br/>
　　　　file2.write(data);<br/><br/>

　　　　FileOutputStream file3 = new FileOutputStream(fileName,true);<br/>
　　　　file3.write(data, 0, 18);<br/><br/>

　　　　file1.close();<br/>
　　　　file2.close();<br/>
　　　　file3.close();<br/>
　　}<br/>
}
</div>
　註：如果你想要在原有的檔案後面加入新的文字的話，<br/>
　　　不訪在建立 FileOutputStream 物件的時候，加上第2個參數"true"。<br/><br/>
   
輸出如下：<br/>
<img src="/resources/views/memo/image/IO011.png"><br/>
這串文字是沒有換行的，但是我的記事本有設定自動換行，<br/>
所以超過視窗範圍的部分會自動換行。

<p>2.<br/>
<img src="/resources/views/memo/image/IO008.png"></p>

讀寫字串的方法分2種：<br/>
(a) 寫入<br/>
　(i) writeChars() → 寫入 String 型態的資料<br/>
　(ii) writeUTF() → 寫入 String 型態的資料<br/>
(b) 讀取<br/>
　(i) readChar() → 讀取「字元」型態的資料<br/>
　　註：為什麼沒有 readChar<font color="red">s</font>() 的方法呢？<br/>
　　　　因為，在 compiler 眼中的字串，就是由一堆 char 所組成，<br/>
　　　　那麼 compiler 又要怎麼知道，<br/>
　　　　這一堆 char 要取多長，才會是你要的字串呢，<br/>
　　　　所以你要自己去判斷長度，或是設計一個結尾標記做判斷。<br/>
　(ii) writeUTF() → 寫入 String 型態的資料<br/>
　　註：這個方法，非常的方便，你用 writeUTF() 寫入，<br/>
　　　　就用 writeUTF() 讀取，沒有長度的問題。<br/><br/>
    
<div class="tagB">
<b>知識點：</b><br/>
　你一定會想說，writeUTF() 這麼好用，誰想用 writeChars() 啊？<br/>
　你說的對，但是方便歸方便，一定程度上，對程式的安全性還是有些不妥。

<p>　怎麼說呢？ 你試著想想看，你如果是駭客，不小心取得了一個資料，<br/>
　你直接用 readUTF() 解碼，就得到資料了，不費吹灰之力。</p>

　但如果 readUTF() 沒用，那你就要用 readChar() 解碼了，<br/>
　你要開始猜第一筆資料的字串多長？第二筆 ... 以此類推，<br/>
　甚至，一定程度上，我們會在資料中夾雜著沒用的資料做混淆。
</div>


<p>3.<br/>
<img src="/resources/views/memo/image/IO009.png"></p>

<p>4.<br/>
<img src="/resources/views/memo/image/IO010.png"></p>

</div>



<h3>附錄、File class</h3>
<div class="content">

<div style="background-color: black; width: 600px; height: 100px;"></div>

</div>





</div>













<script>
$(document).ready(function(){
    var engi = document.getElementsByClassName("engineer");
    Array.prototype.forEach.call(engi, function(val){
        newVal = val.innerHTML.replace(/\　/g, '&nbsp;&nbsp;');
        val.innerHTML = newVal;
    });
});
</script>
@endsection