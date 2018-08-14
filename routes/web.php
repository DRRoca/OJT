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
    // Route::get('/notebooks/create','NotebooksController@create')->name('notebooks.create');;
    Route::get('notebooks','NotebooksController@index');
    
    // Route::group(['middleware'=>'notebook.owner'],function() {
    //     // Route::get('/notebooks/{id}', function() {
            
    //     // });
    //     // Route::resource('notebooks','NotebooksController');
    //     // Route::get('/{notebookId}/createNote','NotesController@createNote')->name('notes.createNote');
    //     // Route::resource('/notebooks/{id}','NotebooksController');
    //     Route::resource('notebooks', 'NotebooksController')->except([
    //         'index'
    //     ]);
    //     // Route::resource('notebooks','NotebooksController');
    // });
    // Route::get('/notebooks/{id}','NotebooksController@show');
   
    Route::resource('notebooks', 'NotebooksController');
    Route::resource('notes','NotesController');
    Route::get('/{notebookId}/createNote','NotesController@createNote')->name('notes.createNote');
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
