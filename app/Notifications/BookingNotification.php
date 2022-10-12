<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingNotification extends Notification
{
    use Queueable;
    public $message;
    public $professional;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message,$professional)
    {
        $this->message = $message;
        $this->professional = $professional;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
            'professional_id' => $this->professional,
        ];
    }

    public function broadcastOn()
    {
        return ["new-cr-from-part"];
    }

    public function toBroadcast($notifiable)
    {
        $user= User::where('id',$this->professional)->first();
        return new BroadcastMessage([
            'message'=>$this->message,
            'count'=>DB::table('notifications')->where('notifiable_id',$user->id)->whereNull('read_at')->count(),
        ]);
    }

}
