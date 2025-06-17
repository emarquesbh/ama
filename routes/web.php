// Área administrativa
Route::prefix('admin')
  ->middleware('auth')
  ->name('admin.')
  ->group(function(){
      Route::resource('courses','Admin\CourseController');
      Route::resource('turmas','Admin\TurmaController');
      Route::resource('events','Admin\EventController');
      Route::resource('notices','Admin\NoticeController');
      Route::resource('travels','Admin\TravelController');
      Route::resource('reflections','Admin\ReflectionController');
  });

// Área pública
Route::get('/', 'Public\HomeController@index')->name('home');
Route::resource('courses','Public\CourseController')->only(['index','show']);
Route::resource('events','Public\EventController')->only(['index','show']);
Route::resource('courses', Admin\CourseController::class);
// ... e assim por diante
