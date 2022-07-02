<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\model\doctor;
class doctorcreate extends Notification
{
    use Queueable;
        public $doctor;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(doctor $doctor)
    {
        $this -> doctor = $doctor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $supject = sprintf('%s:لقد تم انشاء حسابك%s!', config('app.name'), 'abood');
        $greeting = sprintf('!s% مرحبا', $notifiable->name);

        return (new MailMessage)
                    ->subject($supject)
                    ->greeting($greeting)
                    ->salutation('Yours Faithfully')
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
