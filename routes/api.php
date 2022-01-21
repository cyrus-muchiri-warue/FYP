<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use bsobbe\ithenticate\Ithenticate;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('check',function(){
   


    $content='hdjdjjfjf';
    $ithenticate = new \bsobbe\ithenticate\Ithenticate("cyrus5078@gmail.com", "qwerty12345");
    //The value in result variable is the document_id of the inserted document.
    $result = $ithenticate->submitDocument(
        "Cloud Computing",
        "Sobhan",
        "Bagheri",
        "CloudComputingEssay.pdf", //File name from the object of the uploaded temp file.
        $content, //Document content fetched with php file_get_contents() function from the document file.
        649216 //Folder number to store document (You can get folder number from last part of ithenticate panel URL).
  );
  
              
             
});