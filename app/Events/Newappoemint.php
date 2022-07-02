<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\model\doctor;
use App\model\doctor_serve;
use App\model\serve;
use App\model\department;
use App\model\specialty;
use App\User;
use App\model\appoemint;
class Newappoemint implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $appoemint;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(appoemint $appoemint)
    {
        $this->appoemint = $appoemint;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('newappoemint');
       
    }

    public function broadcastWith(){
        return [
            'appoemint_id'  => $this->appoemint->id,
            'user_id' => $this->appoemint->user->name,
            'doctor_id' => $this->appoemint->doctor->doc_name,
            'department_id'=> $this->appoemint->department->dept_name,
            'specialty_id' => $this->appoemint->specialty->special_name,
            'doctor_serve_id'=> $this->appoemint->doctor_serve->price,
            'serve_id' => $this->appoemint->serve->serv_name,
            'adate' => $this->appoemint->adate,
            'reson' => $this->appoemint->reson,
            'created_at' => $this->appoemint->created_at

        ];
    }
}
