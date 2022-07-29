<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\model\clinic\serve3;
use App\model\clinic\appoemint3;
use App\model\clinic\serve3_price;
use App\model\clinic\serve3_total;
use App\model\transaction;
use App\User;
use App\model\clinic\serve3_thin;
use App\model\clinic\serve3_tprice;
use App\model\doctor_serve;
use App\model\clinic;

use App\model\hosbital\department1;
use App\model\hosbital\hspecialty;
use App\model\hosbital\hdoctor_serve;
use App\model\hosbital;
use App\model\hosbital\hserve;;
use Auth;
class appoiment3 extends Notification implements ShouldQueue, ShouldBroadcast
{
    use Queueable;
    protected $appoemint3;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(appoemint3 $appoemint3)
    {
        $this -> appoemint3 = $appoemint3;
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
            'id' =>$this->appoemint3->id,
            'titel'=>'لديك حجز مجارحة بواسطة',
             'user'=> auth::user() -> name,
             
             'clinic_id'=>$this->appoemint3->clinic->name,
             'created_at'=>$this->appoemint3->created_at->format('d M, Y h:i a'),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage ([
            'data' =>[
            'id' =>$this->appoemint3->id,
            'titel'=>'لديك حجز مجارحة بواسطة',
             'user'=> auth('clinic')->user()->where('id',$this->appoemint3->clinic_id),
             'user_id'=>auth()->user()->name,
             'clinic_id'=>$this->appoemint3->clinic->name,
             'created_at'=>$this->appoemint3->created_at->format('d M, Y h:i a'),
            ]
        ]);
    }
}
