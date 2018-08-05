<?php



Route::get('/', 'NotebooksController@index');

Route::get('/search', 'LiveSearchController@index');

Route::get('/search/action', 'LiveSearchController@action')->name('LiveSearch.action');

Route::resource('LiveSearch','LiveSearchController');

Route::resource('notebooks','NotebooksController');

Route::resource('notes','NotesController');

//Route::resource('live_search','LiveSearchController');

Route::get('/{notebookId}/createNote','NotesController@createNote')->name('notes.createNote');
