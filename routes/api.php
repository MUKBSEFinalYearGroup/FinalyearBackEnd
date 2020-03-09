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