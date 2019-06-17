<html>
<head>
<link rel="stylesheet" type="text/css" href="{{asset('/bookself.css')}}">
<title>NOC LIBRARY</title>
<META NAME="description" CONTENT="Liveurlifehere Education Books sample of Bookself. This is Demo for Publisher">
<META NAME="keywords" CONTENT="Books, education, bookself-demo, books-free, read, publisher, book-publisher, online-books,pdf-books ">
<META NAME="robot" CONTENT="index,follow">
<META NAME="copyright" CONTENT="Copyright © 2014 Liveurlifehere. All Rights Reserved.">
<META NAME="author" CONTENT="Liveurlifehere">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<META NAME="revisit-after" CONTENT="5">
<style>
   

input {
   
    width:180px;
    border:2px solid #dadada;
    border-radius:7px;
    font-size:16px;
    padding:5px;
    margin-top:-10px;
    background-color: #00004C;    
}

button {
   
    width:25px;
    border:2px solid #dadada;
    border-radius:7px;
    font-size:12px;
    padding:5px;
    margin-top:-10px;
    background-color: #00004C;

}

input:focus { 
    outline:none;
    border-color:#9ecaed;
    box-shadow:0 0 10px #9ecaed;
}

::-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color:#81FFFE;
}
/*h2 {

  background-color: black;
  color: white;
}*/

</style>
</head>
<body style="background:url({{asset('/wallpaper.jpg')}});background-repeat:no-repeat;background-attachment:fixed;background-size:cover;">
<center>
<form role="form" method ="POST" action="{{url('search_book?page='.$startNumber)}}">
  <br>

  <input type="text" placeholder="Title,Author or Category" name="search" style="color:#00FFFF;font-style:italic;">
  <input type="submit" value="Search" style="color:white;">
          {!! Form::token() !!}
  <img style="position:fixed; TOP:320px; LEFT:80px;" src="{{asset('/images/logow.png')}}"/>
  <img style="position:fixed; TOP:320px; LEFT:1080px;" src="{{asset('/images/logow.png')}}"/>      
      
 </form>
</center>
 <center>      

    @if($flag==1)
          @for($i=0;$i<$limitNumber;$i++)

              <button><a href="{{URL('/search_book?search='.$searchValue.'&page='.$startNumber)}}" style="color:white;text-decoration:none;">{{$startNumber}}</a></button>
              <?php $startNumber=$startNumber+1; ?>
            @endfor
    @else
            @for($i=0;$i<$limitNumber;$i++)

              <button><a href="{{URL('/view_library?page='.$startNumber)}}" style="color:white; text-decoration:none;">{{$startNumber}}</a></button>
              <?php $startNumber=$startNumber+1; ?>
            @endfor
    @endif
     </center> 

<table width="100%" style="margin-left:-3px;">
  <tbody>
    <tr class="bookshelf">
      <td>
        <span class="bookshelf-title"> 
          <a href="#"class="bookshelf-name-link" style="font-family:calibri"><center>Summit Communications Library</center> </a>
        </span>
        <div class="grid_11 alpha omega bookshelf-body">
          <div class="grid_10 alpha omega" style="padding-left:40px"> 
            @foreach($book_lists as $book_list) 
            <a href="{{URL('downloadZip?bookId='.$book_list->book_id)}}" style="color:white; font-family:calibri">
              <span style="float: left;padding:8px 0px 36px 0px;height:150px;display:block">
                <div style="height:150px;width:96px;margin-top: 20%;margin-left: -2%">
                  <p style="z-index: 100;margin-top: 75%;margin-left: 27%;text-decoration:none;word-wrap:break-word;font-size:13px;"><?php if(strlen($book_list->title)>30){
                  echo substr($book_list->title,0,30)."...";

                }
                else
                echo $book_list->title;
                ?>
                  </p>
                </div>
                <div style="float: left;"> 

                  <div style="overflow: hidden; padding: 0px; font-size: 0.1px; width: 123px; height: 167px; margin: 3px; border: 0px none rgb(0, 147, 204);background:url(images/rack1/w<?php echo rand(1,4); ?>.png);z-index:0;margin-top: -164%;" title="Title : {{$book_list->title}} // Category : {{$book_list->category}} // Author : {{$book_list->author}}">
                  </div> 

                  <!-- <div style="overflow: hidden; padding: 0px; font-size: 0.1px; width: 111px; height: 150px; margin: 3px; border: 0px none rgb(0, 147, 204);background:url(images/rack1/w<?php echo rand(1,4); ?>.png);z-index:1;margin-top: -192%;" title="Title : {{$book_list->title}} // Category : {{$book_list->category}} // Author : {{$book_list->category}}">
                  </div> -->

                </div>

              </span> 
            </a>
            @endforeach


          </div>
        </div>
      </td>

    </tr>
   

    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
        
<div style="float: right"> </div>
</body>
</html>
                            