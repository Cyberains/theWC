<?php
namespace App\Notifications;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
class AdminBookingNotification extends Notification
{

    use Queueable;
    public $message;
   
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
           $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable)
    {
         return [
            'message' => $this->message,
            
        ];
    }

    public function broadcastOn()
    {
        return ["new-cr-from-part"]; 
    }

    public function toBroadcast($notifiable)
    {
         
       $user= User::where('role','admin')->pluck('id');
        return new BroadcastMessage([
            'message'=>$this->message,
            'count'=>DB::table('notifications')->whereIn('notifiable_id',$user)->whereNull('read_at')->count(),
        ]);
    }
}
