<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\model\clinic\serve4;
use App\model\clinic\appoemint4;
use App\model\clinic\serve4_price;
use App\model\clinic\serve4_total;
use App\model\transaction;
use App\User;
use App\model\clinic\serve4_thin;
use App\model\clinic\serve4_tprice;
use App\model\doctor_serve;
use App\model\clinic;

use App\model\hosbital\department1;
use App\model\hosbital\hspecialty;
use App\model\hosbital\hdoctor_serve;
use App\model\hosbital;
use App\model\hosbital\hserve;;
use Auth;
class appoiment4 extends Notification implements ShouldQueue, ShouldBroadcast
{
    use Queueable;
    protected $appoemint4;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(appoemint4 $appoemint4)
    {
        $this -> appoemint4 = $appoemint4;
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
            'id' =>$this->appoemint4->id,
            'titel'=>'لديك حجز معالجة طبيعية و تنفسية بواسطة',
             'user'=> auth::user() -> name,
             
             'clinic_id'=>$this->appoemint4->clinic->name,
             'created_at'=>$this->appoemint4->created_at->format('d M, Y h:i a'),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage ([
            'data' =>[
            'id' =>$this->appoemint4->id,
            'titel'=>'لديك حجز معالجة طبيعية و تنفسية بواسطة',
             'user'=> auth('clinic')->user()->where('id',$this->appoemint4->clinic_id),
             'user_id'=>auth()->user()->name,
             'clinic_id'=>$this->appoemint4->clinic->name,
             'created_at'=>$this->appoemint4->created_at->format('d M, Y h:i a'),
            ]
        ]);
    }
}
