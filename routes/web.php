<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','AboutUsController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pages/history_mission_vission','AboutUsController@history_mission_vission')->name('pages.history_mission_vission');
Route::get('/pages/staffs','AboutUsController@staffs')->name('pages.staffs');
Route::get('/pages/accomplishment','AboutUsController@accomplishment')->name('pages.accomplishment');
Route::get('/pages/department/ict','DepartmentController@ict')->name('pages.ict');
Route::get('/pages/department/bigdata','DepartmentController@bigdata')->name('pages.bigdata');
Route::get('/pages/department/finance','DepartmentController@finance')->name('pages.finance');
Route::get('/pages/news_and_events','NewsAndEventsController@news_and_events')->name('pages.news_and_events');
Route::get('/pages/contact_us','ContactUsController@contact_us')->name('pages.contact_us');


//routes for admin homepage
Route::get('/pages/admin/homepage','HomeController@homepage')->name('admin.homepage');
Route::post('/pages/admin/addCarausel','HomeController@addCarausel')->name('admin.addCarausel');
Route::post('/pages/admin/editCarausel','HomeController@editCarausel')->name('admin.editCarausel');
Route::post('/pages/admin/deleteCarausel','HomeController@deleteCarausel')->name('admin.deleteCarausel');
Route::get('/pages/admin/search','AboutUsController@search')->name('admin.search');
Route::post('/pages/admin/addMarketingMain','HomeController@addMarketingMain')->name('admin.addMarketingMain');
Route::post('/pages/admin/updateMarketingMain','HomeController@updateMarketingMain')->name('admin.updateMarketingMain');
Route::post('/pages/admin/deleteMarketingMain','HomeController@deleteMarketingMain')->name('admin.deleteMarketingMain');
Route::get('/images','HomeController@download')->name('admin.download');

//routes for department section admin
Route::get('/pages/admin/ictdepartment','DepartmentController@ictdepartment')->name('admin.ictdepartment');
Route::get('/pages/admin/BigDataDepartment','DepartmentController@BigDataDepartment')->name('admin.bigDataDepartment');
Route::get('/pages/admin/financeDepartment','DepartmentController@financeDepartment')->name('admin.financeDepartment');






Route::get('pages/admin/download-pdf','HomeController@downloadPdfFile')->name('admin.download-pdf');


//marketing row section
Route::post('/pages/admin/addMarketingRowData','HomeController@addMarketingRowData')->name('admin.addMarketingRowData');
Route::post('/pages/admin/updateMarketingRowData','HomeController@updateMarketingRowData')->name('admin.updateMarketingRow');
Route::post('/pages/admin/deleteMarketingRowData','HomeController@deleteMarketingRowData')->name('admin.deleteMarketingRow');

Route::get('/pages/admin/downloadCSV','HomeController@downloadCSV')->name('admin.downloadCSV');
Route::get('/pages/admin/downloadExcel','HomeController@downloadExcel')->name('admin.downloadExcel');


//route for ictDepartment
Route::post('pages/admin/ictDepartment','DepartmentController@addIctDepartmentData')->name('admin.addIctDepartmentData');
Route::post('pages/admin/editIctDepartment','DepartmentController@editIctDepartmentData')->name('admin.editIctDepartmentData');
Route::post('pages/admin/deleteIctDepartment','DepartmentController@deleteIctDepartmentData')->name('admin.deleteIctDepartmentData');


//route for bigdataDepartment
Route::post('pages/admin/bigdataDepartment','DepartmentController@addBigdataDepartmentData')->name('admin.addBigdataDepartmentData');
Route::post('pages/admin/editBigdataDepartment','DepartmentController@editBigdataDepartmentData')->name('admin.editBigdataDepartmentData');
Route::post('pages/admin/deleteBigdataDepartment','DepartmentController@deleteBigdataDepartmentData')->name('admin.deleteBigdataDepartmentData');


//route for financeDepartment
Route::post('pages/admin/addFinanceDepartment','DepartmentController@addFinanceDepartmentData')->name('admin.addFinanceDepartmentData');
Route::post('pages/admin/editFinanceDepartment','DepartmentController@editFinanceDepartmentData')->name('admin.editFinanceDepartmentData');
Route::post('pages/admin/deleteFinanceDepartment','DepartmentController@deleteFinanceDepartmentData')->name('admin.deleteFinanceDepartmentData');

//news and events routes
Route::get('pages/admin/NewsandEvents','NewsAndEventsController@newsAndEventsSection')->name('admin.newsAndEventsSection');
Route::post('pages/admin/addNewsandEvents','NewsAndEventsController@addNewsandEventsData')->name('admin.addNewsandEventsData');
Route::post('pages/admin/editNewsandEvents','NewsAndEventsController@editNewsandEventsData')->name('admin.editNewsandEventsData');
Route::post('pages/admin/deleteNewsandEvents','NewsAndEventsController@deleteNewsandEventsData')->name('admin.deleteNewsandEventsData');

Route::post('/pages/addContact_Us','ContactUsController@addContact_Us')->name('pages.addContact_Us');
Route::get('/pages/admin/viewContact_Us','ContactUsController@viewContact_Us')->name('admin.viewContact_Us');
Route::post('/pages/admin/deleteContact_Us','ContactUsController@deleteContact_Us')->name('admin.deleteContact_Us');

Route::post('/pages/admin/addContact_UsDetails','ContactUsController@addContact_UsDetails')->name('admin.addContact_UsDetails');
Route::post('/pages/admin/updateContact_UsDetails','ContactUsController@updateContact_UsDetails')->name('admin.updateContact_UsDetails');
Route::post('/pages/admin/deleteContact_UsDetails','ContactUsController@deleteContact_UsDetails')->name('admin.deleteContact_UsDetails');

Route::get('/pages/admin/HistoryMissionVission','AboutUsController@HostoryMissionVission')->name('admin.HistoryMissionVission');


Route::post('/pages/admin/addHistoryMissionVission','AboutUsController@addHistoryMissionVission')->name('admin.addHistoryMissionVission');
Route::post('/pages/admin/updateHistoryMissionVission','AboutUsController@updateHistoryMissionVission')->name('admin.updateHistoryMissionVission');
Route::post('/pages/admin/deleteHistoryMissionVission','AboutUsController@deleteHistoryMissionVission')->name('admin.deleteHistoryMissionVission');

Route::get('/pages/admin/StaffsMainSection','AboutUsController@StaffsMainSection')->name('admin.StaffsMainSection');

Route::post('/pages/admin/addStaffsMainSection','AboutUsController@addStaffsMainSection')->name('admin.addStaffsMainSection');
Route::post('/pages/admin/updateStaffsMainSection','AboutUsController@updateStaffsMainSection')->name('admin.updateStaffsMainSection');
Route::post('/pages/admin/deleteStaffsMainSection','AboutUsController@deleteStaffsMainSection')->name('admin.deleteStaffsMainSection');

Route::post('/pages/admin/addStaffsRowSection','AboutUsController@addStaffsRowSection')->name('admin.addStaffsRowSection');
Route::post('/pages/admin/updateStaffsRowSection','AboutUsController@updateStaffsRowSection')->name('admin.updateStaffsRowSection');
Route::post('/pages/admin/deleteStaffsRowSection','AboutUsController@deleteStaffsRowSection')->name('admin.deleteStaffsRowSection');

Route::get('/pages/admin/AccomplishmentSection','AboutUsController@viewAccomplishmentSection')->name('admin.viewAccomplishmentSection');

Route::post('/pages/admin/addAccomplishmentFirstSection','AboutUsController@addAccomplishmentFirstSection')->name('admin.addAccomplishmentFirstSection');
Route::post('/pages/admin/updateAccomplishmentFirstSection','AboutUsController@updateAccomplishmentFirstSection')->name('admin.updateAccomplishmentFirstSection');
Route::post('/pages/admin/deleteAccomplishmentFirstSection','AboutUsController@deleteAccomplishmentFirstSection')->name('admin.deleteAccomplishmentFirstSection');


Route::post('/pages/admin/addAccomplishmentSecondSection','AboutUsController@addAccomplishmentSecondSection')->name('admin.addAccomplishmentSecondSection');
Route::post('/pages/admin/updateAccomplishmentSecondSection','AboutUsController@updateAccomplishmentSecondSection')->name('admin.updateAccomplishmentSecondSection');
Route::post('/pages/admin/deleteAccomplishmentSecongSection','AboutUsController@deleteAccomplishmentSecondSection')->name('admin.deleteAccomplishmentSecondSection');