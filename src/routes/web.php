<?php

/**
 * Laravel Coming Soon
 */
Route::group([
  'middleware' => [
    'web'
  ],
  'as' => 'LaravelBlogs::',
  'namespace' => 'Stephane888\LaravelBlogs\App\Http\Controllers'
], function () {
  /**
   * Page d'accueil d'administration
   */
  Route::get('/admin', 'AdminController@index');
  /**
   */
  Route::get('/super-admin', 'AdminController@superAdmin');
  /**
   */
  Route::get('/admin-blog', 'AdminController@blogAdmin');
  /**
   * gestion des types d'articles
   */
  Route::get('/admin/content-type', 'AdminController@ContentType')->name('ListContentType');
  Route::get('/admin/content-type/add', 'AdminController@ContentTypeAdd')->name('ListContentTypeAdd');
  Route::post('/admin/content-type/add', 'AdminController@ContentTypeStore')->name('ListContentTypeStore');
  Route::get('/admin/content-type/edit/{n}', 'AdminController@ContentTypeEdit')->name('ListContentTypeEdit')->where('n', '[0-9]+');
  Route::put('/admin/content-type/edit/{n}', 'AdminController@ContentTypeUpdate')->name('ListContentTypeUpdate')->where('n', '[0-9]+');
  /**
   * gestion des d'articles
   */
  Route::get('/admin/contents', 'AdminController@Contents')->name('Content');
  Route::get('/admin/contents/add', 'AdminController@ContentTypeList')->name('ContentTypeList');
  Route::get('/admin/contents/add/{content_type_id}', 'AdminController@ContentsAdd')->name('ContentAdd')->where('content_type_id', '[0-9]+');
  Route::post('/admin/contents/add/{content_type_id}', 'AdminController@ContentStore')->name('ContentStore')->where('content_type_id', '[0-9]+');
});

