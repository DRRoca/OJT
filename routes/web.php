<?php



Route::get('/', 'NotebooksController@index');


Route::resource('notebooks','NotebooksController');

Route::resource('notes','NotesController');

Route::get('/{notebookId}/createNote','NotesController@createNote')->name('notes.createNote');