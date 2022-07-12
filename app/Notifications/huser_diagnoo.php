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
use App\model\hosbital\huser_axam;
use App\model\hosbital\hserve;;
use App\model\department;
use App\model\labe;
use App\model\doctor_serve;
use App\model\serve;
use App\model\admin;
use App\model\specialty;



use App\model\hosbital\huser_xray;
use App\model\hosbital\hlabe_price;
use App\model\hosbital\hxray;
use App\model\hosbital\hx_price;
use App\model\hosbital\hpharmice;
use App\model\hosbital\huser_medicen;
use App\model\hosbital\hphar_price;
use App\model\hosbital\huser_diagno;
use App\model\hosbital\hmate;
use Auth;
class huser_diagnoo extends Notification implements ShouldQueue, ShouldBroadcast
{
    use Queueable;
    protected $user_diagno;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(huser_diagno $user_diagno)
    {
        $this -> user_diagno = $user_diagno;
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
            'id' =>$this->user_diagno->id,
            'titel'=>' تم اظافة تشخيص بواسطة ألطبيب ',
             'user'=> auth::user('h_doctor') -> doc_name,
             'user_id'=>$this->user_diagno->user->name,
             'created_at'=>$this->user_diagno->created_at->format('d M, Y h:i a'),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage ([
            'data' =>[
            'id' =>$this->user_medicen->id,
            'titel'=>' تم اظافة تشخيص بواسطة ألطبيب ',
             'user'=> auth()->user()->where('id',$this->user_diagno->user_id),
             'hdoctor_id'=>auth('h_doctor')->user()->doc_name,
             
             'created_at'=>$this->user_diagno->created_at->format('d M, Y h:i a'),
            ]
        ]);
    }
}
