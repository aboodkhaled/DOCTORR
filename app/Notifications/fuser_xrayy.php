<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\model\fhosbital\fdoctor;
use App\model\fhosbital\fcuontry;
use App\model\fhosbital\fappoemint;
use App\User;
use App\model\fhosbital\fdepartment;
use App\model\fhosbital\fspecialty;
use App\model\fhosbital\fdoctor_serve;
use App\model\fhosbital\fuser_axam;
use App\model\fhosbital\fserve;;
use App\model\department;
use App\model\labe;
use App\model\doctor_serve;
use App\model\serve;
use App\model\admin;
use App\model\specialty;



use App\model\fhosbital\fuser_xray;
use App\model\fhosbital\flabe_price;
use App\model\fhosbital\fxray;
use App\model\fhosbital\fx_price;
use App\model\fhosbital\fpharmice;
use App\model\fhosbital\fuser_medicen;
use App\model\fhosbital\fphar_price;
use App\model\fhosbital\fuser_diagno;
use App\model\fhosbital\fmate;
use Auth;
class fuser_xrayy extends Notification implements ShouldQueue, ShouldBroadcast
{
    use Queueable;
    protected $user_xray;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(fuser_xray $user_xray)
    {
        $this -> user_xray = $user_xray;
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
            'id' =>$this->user_xray->id,
            'titel'=>' تم اظافة أشعة بواسطة ألطبيب ',
             'user'=> auth::user('f_doctor') -> doc_name,
             'user_id'=>$this->user_xray->user->name,
             'created_at'=>$this->user_xray->created_at->format('d M, Y h:i a'),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage ([
            'data' =>[
            'id' =>$this->user_xray->id,
            'titel'=>' تم اظافة أشعة بواسطة ألطبيب ',
             'user'=> auth()->user()->where('id',$this->user_xray->user_id),
             'fdoctor_id'=>auth('f_doctor')->user()->doc_name,
             
             'created_at'=>$this->user_xray->created_at->format('d M, Y h:i a'),
            ]
        ]);
    }
}
