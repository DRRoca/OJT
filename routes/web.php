<?php



Route::get('/home', function () {
    return view('home');
});

Route::group(['middleware'=>'auth'],function() {
    Route::get('/', function () {
        return view('frontpage');
    });
    Route::get('/search', 'LiveSearchController@index');
    Route::get('/search/action', 'LiveSearchController@action')->name('LiveSearch.action');
    Route::resource('LiveSearch','LiveSearchController');
    Route::resource('notebooks','NotebooksController');    
    Route::resource('notes','NotesController');
    Route::get('/{notebookId}/createNote','NotesController@createNote')->name('notes.createNote');
});


Auth::routes();
?>




