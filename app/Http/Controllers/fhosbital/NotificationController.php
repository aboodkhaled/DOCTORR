<?php

namespace App\Http\Controllers\hosbital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\admin;
class NotificationController extends Controller
{
    public function getNotification(){

       return [
           'read' => auth('admin')->user()->readNotifications,
           'unread' => auth('admin')->user()->unreadNotifications
           

       ];
    }
    public function markAsRead(Request $request){
        return auth('admin')->user()->notifications->where('id',$request->id)->markAsRead();
    }
    public function markAsReadRedirect($id){
        $notification = auth('admin')->user()->notifications->where('id',$id)->first();
        $notification->markAsRead();
    }
}
