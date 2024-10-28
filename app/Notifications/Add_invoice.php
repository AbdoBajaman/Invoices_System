<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Add_invoice extends Notification
{
    use Queueable;


    protected $invoice;
    protected $user_creator;
    /**
     * Create a new notification instance.
     */
    public function __construct($invoice,$user)
    {
        $this->invoice = $invoice;
        $this->user_creator = $user;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable) : array
    {
        // dd($this->user_creator);
        return [
            'invoice_id'=>$this->invoice->id,
            'user'=>$this->user_creator ,
            'title' => 'تمت اضافة فاتوره جديده بواسطه',
            'invoice_number'=>$this->invoice->invoice_number,
            'section'=>$this->invoice->section,

        ];
    }
}
