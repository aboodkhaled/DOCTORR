<?php

namespace App\Http\Controllers\hadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hadmin;
class NotificationController extends Controller
{
    public function getNotification(){

       return [
           'read' => auth('hadmin')->user()->readNotifications,
           'unread' => auth('hadmin')->user()->unreadNotifications
           

       ];
    }
    public function markAsRead(Request $request){
        return auth('hadmin')->user()->notifications->where('id',$request->id)->markAsRead();
    }
    public function markAsReadRedirect($id){
        $notification = auth('hadmin')->user()->notifications->where('id',$id)->first();
        $notification->markAsRead();
    }
}
