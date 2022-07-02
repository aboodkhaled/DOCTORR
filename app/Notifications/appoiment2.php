<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\model\clinic\serve2;
use App\model\clinic\appoemint2;
use App\model\clinic\serve2_price;
use App\model\clinic\serve2_total;
use App\model\transaction;
use App\User;
use App\model\clinic\serve2_thin;
use App\model\clinic\serve2_tprice;
use App\model\doctor_serve;
use App\model\clinic;

use App\model\hosbital\department1;
use App\model\hosbital\hspecialty;
use App\model\hosbital\hdoctor_serve;
use App\model\hosbital;
use App\model\hosbital\hserve;;
use Auth;
class appoiment2 extends Notification implements ShouldQueue, ShouldBroadcast
{
    use Queueable;
    protected $appoemint2;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(appoemint2 $appoemint2)
    {
        $this -> appoemint2 = $appoemint2;
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
            'id' =>$this->appoemint2->id,
            'titel'=>'لديك حجز من ألدرجة ألثانية بواسطة',
             'user'=> auth::user() -> name,
             
             'clinic_id'=>$this->appoemint2->clinic->name,
             'created_at'=>$this->appoemint2->created_at->format('d M, Y h:i a'),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage ([
            'data' =>[
            'id' =>$this->appoemint2->id,
            'titel'=>'لديك حجز من ألدرجة ألثانية بواسطة',
             'user'=> auth('clinic')->user()->where('id',$this->appoemint2->clinic_id),
             'user_id'=>auth()->user()->name,
             'clinic_id'=>$this->appoemint2->clinic->name,
             'created_at'=>$this->appoemint2->created_at->format('d M, Y h:i a'),
            ]
        ]);
    }
}
