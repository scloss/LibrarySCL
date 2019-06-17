<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Library NOC</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{ asset('/form_assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('/form_assets/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('/form_assets/css/form-elements.css')}}">
        <link rel="stylesheet" href="{{ asset('/form_assets/css/style.css')}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{ asset('/form_assets/ico/favicon.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('/form_assets/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('/form_assets/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('/form_assets/ico/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('/form_assets/ico/apple-touch-icon-57-precomposed.png')}}">

    </head>

    <body>

      

        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-sm-3 book">
                        </div>
                        <div class="col-sm-6 form-box">
                            <div class="form-top" style="color:#fff;">
                                <div class="form-top-left" style="color:#fff;">
                                    <h3>Upload Book</h3>
                                </div>
                                <div class="form-top-right" style="color:#fff;">
                                    <i class="fa fa-pencil"></i>
                                </div>
                            </div>
                            <div class="form-bottom" style="color:#fff;">
                                <form role="form" action="{{ url('book_upload_process') }}" id="book_text_Form" method="post" enctype="multipart/form-data">
                                    <div class="form-group" >
                                        Upload Books<input type="file" name="bookPath[]" id="liraryBooks" multiple="multiple" >
                                        <input type="hidden" value="{{csrf_token()}}" name="_token">
                                    </div>
                                    <div class="form-group" >
                                        <div>Title</div><input type="text" name="title" id="title">            
                                    </div>
                                    <div class="form-group" >
                                        <div>Category</div> <input type="text" name="category" id="category">                                       
                                    </div>
                                    <div class="form-group" >
                                        <div>Author</div> <input type="text" name="author" id="author"  >                                       
                                    </div>
                                    {!! Form::token() !!}
                                    <button type="submit" class="btn">Upload</button>
                                </form>
                            </div>
                           <!--  <input type="button" onclick="location.href='{{URL('downloadZip?bookId=15')}}';" class="btn" value="Download Book Files" />  -->
                             <center> <input type="button" onclick="location.href='{{URL('view_library?page=1')}}';" class="btn" value="View Library" /></center>
                        </div>
                      
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="{{ asset('/form_assets/js/jquery-1.11.1.min.js')}}"></script>
        <script src="{{ asset('/form_assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('/form_assets/js/jquery.backstretch.min.js')}}"></script>
        <script src="{{ asset('/form_assets/js/retina-1.1.0.min.js')}}"></script>
        <script src="{{ asset('/form_assets/js/scripts.js')}}"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
