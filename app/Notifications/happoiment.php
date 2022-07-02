<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\model\hosbital\hdoctor;
use App\model\hosbital\hcuontry;
use App\model\hosbital\happoemint;
use App\User;
use App\model\hosbital\hdepartment;
use App\model\hosbital\hspecialty;
use App\model\hosbital\hdoctor_serve;
use App\model\hosbital;
use App\model\hosbital\hserve;;
use Auth;
class happoiment extends Notification implements ShouldQueue, ShouldBroadcast
{
    use Queueable;
    protected $happoemint;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(happoemint $happoemint)
    {
        $this -> happoemint = $happoemint;
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
            'id' =>$this->happoemint->id,
            'titel'=>'لديك حجز بواسطة',
             'user'=> auth::user() -> name,
             
             'hdoctor_id'=>$this->happoemint->hdoctor->doc_name,
             'created_at'=>$this->happoemint->created_at->format('d M, Y h:i a'),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage ([
            'data' =>[
            'id' =>$this->happoemint->id,
            'titel'=>'لديك حجز بواسطة',
             'user'=> auth('hosbitall')->user()->where('id',$this->happoemint->hosbital_id),
             'user_id'=>auth()->user()->name,
             'hdoctor_id'=>$this->happoemint->hdoctor->doc_name,
             'created_at'=>$this->happoemint->created_at->format('d M, Y h:i a'),
            ]
        ]);
    }
}
