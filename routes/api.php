<?php

use Illuminate\Http\Request;

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
Route::post('/create-message','MessagesController@createMessage');
Route::patch('/edit-message/{id}','MessagesController@editMessage');
Route::patch('/delete-message/{id}','MessagesController@temporaryDeleteMessage');
Route::delete('/parmanently-delete-message/{id}','MessagesController@parmanetlyDeleteMessage');
Route::patch('/mark-read-message/{id}','MessagesController@markAsRead');
Route::get('/get-messages','MessagesController@getAllMessages');
Route::get('/get-my-sent-messages/{id}','MessagesController@getMySentMessages');
Route::get('/get-my-recieved-messages/{id}','MessagesController@getMyRecievedMessages');
Route::post('/create-chat-group','ChatGroupsController@createChatGroup');
Route::patch('/edit-chat-group/{id}','ChatGroupsController@editChatGroup');
Route::get('/get-all-my-groups','ChatGroupsController@getAllMyGroups');
Route::get('/get-all-groups-i-belong-to','ChatGroupsController@getAllGroupsIBelongTo');
Route::patch('/assign-new-role/{id}','ChatGroupsController@assignNewRole');

Route::post('/create-chat-status','ChatStatusController@createStatus');
Route::delete('/delete-my-status/{id}','ChatStatusController@deleteMyStatus');
Route::patch('/mark-status-as-seen/{id}','ChatStatusController@markStatusAsSeen');
Route::patch('/mark-status-as-muted/{id}','ChatStatusController@muteStatus');

Route::post('/create-message-category','MessageCategoriesController@createMessageCategory');
Route::patch('/edit-category-name/{id}','MessageCategoriesController@editCategoryName');
Route::get('/get-message-categories','MessageCategoriesController@getAllCategories');
Route::patch('/delete-cateory/{id}','MessageCategoriesController@deleteCategoryTemporarily');
Route::delete('/delete-cateory-parmanetly/{id}','MessageCategoriesController@deleteCategoryParmanetly');
Route::get('/get-my-message-categories','MessageCategoriesController@getMyMessageCategories');

Route::post('/create-search-team','SearchTermsController@createSearchTerms');
Route::get('/get-all-search-terms','SearchTermsController@getAllSearchTerms');
Route::patch('/edit-search-term/{id}','SearchTermsController@editSearchTerm');
Route::patch('/temporariy-delete-search-term/{id}','SearchTermsController@temporarilyDeleteSearchTerm');
Route::delete('/parmanetly-delete-search-term/{id}','SearchTermsController@parmanetlyDeleteSearchTerm');

Route::post('/create-package','PackagesController@createPackage');
Route::patch('/edit-package/{id}','PackagesController@editPackage');
Route::patch('/attach-bill-package/{id}','PackagesController@attachBill');
Route::get('/get-all-packages','PackagesController@getAllPackages');
Route::patch('/delete-package-temporarily/{id}','PackagesController@deletePackageTemporarily');
Route::delete('/delete-package-parmanetly/{id}','PackagesController@deletePackageParmanetly');

Route::post('/add-contact-to-group','ChatGroupsContactController@addContactToGroup');
Route::patch('/delete-group-contact/{id}','ChatGroupsContactController@deletegroupContact');
Route::get('/get-group-contacts','ChatGroupsContactController@getGroupContacts');
Route::patch('/exit-group/{id}','ChatGroupsContactController@exitGroup');

Route::post('/make-a-call','Calls@makeACall');
Route::patch('/reject-call/{id}','Calls@rejectCall');
Route::get('/get-all-call-history','Calls@getAllHistory');
Route::patch('/clear-call-history/{id}','Calls@clearAllHistory');