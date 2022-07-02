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
use App\model\user_axam;
use App\model\hosbital\hserve;;
use App\model\department;
use App\model\labe;
use App\model\doctor_serve;
use App\model\serve;
use App\model\admin;
use App\model\specialty;

use App\model\user_xray;
use App\model\lab_price;
use App\model\xray;
use App\model\x_price;
use App\model\pharmice;
use App\model\user_medicen;
use App\model\phar_price;
use App\model\user_diagno;
use App\model\mate;
use Auth;
class user_axamm extends Notification implements ShouldQueue, ShouldBroadcast
{
    use Queueable;
    protected $user_axam;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(user_axam $user_axam)
    {
        $this -> user_axam = $user_axam;
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
            'id' =>$this->user_axam->id,
            'titel'=>' تم اظافة فحص بواسطة ألطبيب ',
             'user'=> auth::user('doctorr') -> doc_name,
             'user_id'=>$this->user_axam->user->name,
             'created_at'=>$this->user_axam->created_at->format('d M, Y h:i a'),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage ([
            'data' =>[
            'id' =>$this->user_axam->id,
            'titel'=>' تم اظافة فحص بواسطة ألطبيب ',
             'user'=> auth()->user()->where('id',$this->user_axam->user_id),
             'doctor_id'=>auth('doctorr')->user()->doc_name,
             
             'created_at'=>$this->user_axam->created_at->format('d M, Y h:i a'),
            ]
        ]);
    }
}
