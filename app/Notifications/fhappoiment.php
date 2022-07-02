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
use App\model\fhosbital;
use App\model\fhosbital\fserve;;
use Auth;
class fhappoiment extends Notification implements ShouldQueue, ShouldBroadcast
{
    use Queueable;
    protected $fappoemint;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(fappoemint $fappoemint)
    {
        $this -> fappoemint = $fappoemint;
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
            'id' =>$this->fappoemint->id,
            'titel'=>'لديك حجز بواسطة',
             'user'=> auth::user() -> name,
             
             'fdoctor_id'=>$this->fappoemint->fdoctor->doc_name,
             'created_at'=>$this->fappoemint->created_at->format('d M, Y h:i a'),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage ([
            'data' =>[
            'id' =>$this->fappoemint->id,
            'titel'=>'لديك حجز بواسطة',
             'user'=> auth('h_doctor')->user()->where('id',$this->fappoemint->fdoctor_id),
             'user_id'=>auth()->user()->name,
             'fdoctor_id'=>$this->fappoemint->fdoctor->doc_name,
             'created_at'=>$this->fappoemint->created_at->format('d M, Y h:i a'),
            ]
        ]);
    }
}
