<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\model\doctor;
use App\model\cuontry;
use App\model\appoemint;
use App\User;
use App\model\department;
use App\model\specialty;
use App\model\doctor_serve;
use App\model\admin;
use App\model\serve;;
use Auth;
class appoiment extends Notification implements ShouldQueue, ShouldBroadcast
{
    use Queueable;
    protected $appoemint;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(appoemint $appoemint)
    {
        $this -> appoemint = $appoemint;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'id' =>$this->appoemint->id,
            'titel'=>'لديك حجز بواسطة',
             'user'=> auth::user() -> name,
             
             'doctor_id'=>$this->appoemint->doctor->doc_name,
             'created_at'=>$this->appoemint->created_at->format('d M, Y h:i a'),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage ([
            'data' =>[
            'id' =>$this->appoemint->id,
            'titel'=>'لديك حجز بواسطة',
             'user'=> auth('admin')->user()->where('id',1),
             'user_id'=>auth()->user()->name,
             'doctor_id'=>$this->appoemint->doctor->doc_name,
             'created_at'=>$this->appoemint->created_at->format('d M, Y h:i a'),
            ]
        ]);
    }
}
