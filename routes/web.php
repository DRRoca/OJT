<?php



Route::get('/', function () {
    return view('frontpage');
});


Route::resource('notebooks','NotebooksController');

Route::resource('notes','NotesController');

Route::get('/{notebookId}/createNote','NotesController@createNote')->name('notes.createNote');