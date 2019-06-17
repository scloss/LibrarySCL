<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use DateTime;
use \Input as Input;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use File;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use ZipArchive;
use Zipper;
use Storage;
use Illuminate\Support\Facades\Redirect;


class LibraryController extends Controller {

	public function upload_book(){
		
		$title = Request::get('title');
		$category = Request::get('category');
		$author = Request::get('author');
		
		$bookTableQuery = "INSERT INTO book_table (title,category,author,book_link) values ('".$title."','".$category."','".$author."','');";
		\DB::insert(\DB::raw($bookTableQuery));

		$maxBookIdQuery = "SELECT book_id FROM book_table ORDER BY book_id DESC LIMIT 1";
		$maxBookIdList= \DB::select(\DB::raw($maxBookIdQuery));
		foreach($maxBookIdList as $maxBookIdValue)
		{
			$maxBookId = $maxBookIdValue->book_id;
		}

		if(Input::hasFile('bookPath')){  

        	$path = '../uploaded_books/'.$maxBookId;
			if(!File::exists($path)) {

				$dirPath = '../uploaded_books/'.$maxBookId.'/';
	    		$result = File::makeDirectory($dirPath);
		 		$fileList = Input::file('bookPath');

		 		foreach($fileList as $file){
		 			$filename = $file->getClientOriginalName();
		 			$file->move($dirPath,$filename);
		 		}
	 		}
	 		else{

	 			$dirPath = '../uploaded_books/'.$maxBookId.'/';
	 			$fileList = Input::file('bookPath');

		 		foreach($fileList as $file){
		 			$filename = $file->getClientOriginalName();
		 			$file->move($dirPath,$filename);
		 		}
	 		}	     
            
        }
        else{

        	$path = '../uploaded_books/'.$maxBookId;

			if(!File::exists($path)) {
				$dirPath = '../uploaded_books/'.$maxBookId.'/';
	    		$result = File::makeDirectory($dirPath);	 		
	 		}
	 		
        }
        $bookPathUpdateQuery = "UPDATE book_table SET book_link='".$path."' WHERE book_id='".$maxBookId."'";
		\DB::update(\DB::raw($bookPathUpdateQuery));
        return 'file upload complete';
	}

	public function book_upload_view(){
		return view('upload_view_page');	
	}

	public function zip_download(){
		$bookId = Request::get('bookId');
		$path = '../uploaded_books/'.$bookId.'/';
		$isFile = false;
		$fileList = File::allFiles($path);
		foreach ($fileList as $files)
		{
		    $isFile = true;
		}
		if($isFile == true )
		{
			$pathCheck = '../uploaded_books/'.$bookId.'/'.$bookId.'.zip';
			File::delete($pathCheck);
			$pathCheck = '../uploaded_books/'.$bookId.'/'.$bookId.'.zip';
			//$books = $pathCheck."/";
			if(!File::exists($pathCheck)) 
			{
				$path = '../uploaded_books/'.$bookId.'/*';
				$files = glob($path);
				$makepath = '../uploaded_books/'.$bookId.'/'.$bookId.'.zip';
				Zipper::make($makepath)->add($files);
		    }
		    $url_path = 'fileDownload?bookId='.$bookId;
		    return redirect('fileDownload?bookId='.$bookId);
		}
		else
		{
			return 'no book found';

		}
	} 
	public function downloadFile()
	{
		$bookId = Request::get('bookId');
		$path = '../uploaded_books/'.$bookId.'/'.$bookId.'.zip';
		ob_end_clean();
		return response()->download($path);
	}

	public function view_library(){

		$book_arr = array();
		$page = Request::get('page');
		// $sql_query = "SELECT * FROM book_table";
		// $book_lists = \DB::select(\DB::raw($sql_query));

		// array_push($book_arr, $book_lists);
		$book_table='book_table';
		$book_arr=$this->custom_pagination($page,$book_table);
		$book_lists=$book_arr[2];
		$startNumber=$book_arr[0];
		$limitNumber=$book_arr[1];
		$flag = 0;

 		return view('library_view_page',compact('limitNumber','startNumber','result','book_lists','flag'));
	}

	public function search_book(){

		$searchValue = Request::get('search');
		$book_arr = array();
		$page = Request::get('page');
		// $sql_query = "SELECT * FROM book_table";
		// $book_lists = \DB::select(\DB::raw($sql_query));

		// array_push($book_arr, $book_lists);
		$book_table='book_table';
		$book_arr=$this->custom_custom_pagination($page,$book_table,$searchValue);
		$book_lists=$book_arr[2];
		$startNumber=$book_arr[0];
		$limitNumber=$book_arr[1];
		$flag = 1;

 		return view('library_view_page',compact('book_lists','limitNumber','startNumber','result','flag','searchValue'));

		
	}

	public function custom_pagination($page,$tableName){

		$page = Request::get('page');
        $pageNumInt =  (int)$page;
        $pageUpperLimit = ((int)$page-1)*10;
        //return 'start from'.$pageUpperLimit;

        $getAllRowsQuery = "SELECT * FROM ".$tableName;
        $allRowsOfBookTable= \DB::select(\DB::raw($getAllRowsQuery));

        if($pageUpperLimit == 0){
            $get10RowsQuery = "SELECT * FROM ".$tableName." LIMIT 10";
        }
        else{
            $get10RowsQuery = "SELECT * FROM ".$tableName." LIMIT 10 OFFSET ".(int)$pageUpperLimit;
        }
        $tenRowsOfBookTable= \DB::select(\DB::raw($get10RowsQuery));
        $rowsPerPage = 10;
        $floorNumOfPage = $pageNumInt/$rowsPerPage; 
        $startNumber = floor($floorNumOfPage)*10 +1;
        $limitNumber = ceil(count($allRowsOfBookTable)/10);
        if($startNumber>=$limitNumber){
            $startNumber = (floor(($limitNumber)/10))*10 +1;
        }
        if($limitNumber >10){
            $limitNumber = 10;
        }
        //return view('test_pagination_view',compact('tenRowsOfBookTable','startNumber','limitNumber'));
        $paginationArr[0] = $startNumber;
        $paginationArr[1] = $limitNumber;
        $paginationArr[2] = $tenRowsOfBookTable;
        return $paginationArr;
		//return view('test_pagination_view',compact('tenRowsOfBookTable','startNumber','limitNumber'));

	}

	public function custom_custom_pagination($page,$tableName,$search){

		$page = Request::get('page');
        $pageNumInt =  (int)$page;
        $pageUpperLimit = ((int)$page-1)*10;
        //return 'start from'.$pageUpperLimit;

        $getAllRowsQuery = "SELECT * FROM $tableName where title like '%$search%' OR author like '%$search%' OR category like '%$search%'";
        $allRowsOfBookTable= \DB::select(\DB::raw($getAllRowsQuery));

        if($pageUpperLimit == 0){
            $get10RowsQuery = "SELECT * FROM $tableName where title like '%$search%' OR author like '%$search%' OR category like '%$search%' LIMIT 10";
        }
        else{
            $get10RowsQuery = "SELECT * FROM $tableName where title like '%$search%' OR author like '%$search%' OR category like '%$search%' LIMIT 10 OFFSET ".(int)$pageUpperLimit;
        }
        $tenRowsOfBookTable= \DB::select(\DB::raw($get10RowsQuery));
        $rowsPerPage = 10;
        $floorNumOfPage = $pageNumInt/$rowsPerPage; 
        $startNumber = floor($floorNumOfPage)*10 +1;
        $limitNumber = ceil(count($allRowsOfBookTable)/10);
        if($startNumber>=$limitNumber){
            $startNumber = (floor(($limitNumber)/10))*10 +1;
        }
        if($limitNumber >10){
            $limitNumber = 10;
        }
        //return view('test_pagination_view',compact('tenRowsOfBookTable','startNumber','limitNumber'));
        $paginationArr[0] = $startNumber;
        $paginationArr[1] = $limitNumber;
        $paginationArr[2] = $tenRowsOfBookTable;
        return $paginationArr;
		//return view('test_pagination_view',compact('tenRowsOfBookTable','startNumber','limitNumber'));

	}

}
