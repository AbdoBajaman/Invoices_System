<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class invoice_notification extends Notification
{
    use Queueable;
    private $name;
    /**
     * Create a new notification instance.
     */
    public function __construct($name)
    {
        //
        $this->name = $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via( $notifiable)
    {


        return ['mail'];
        dd('notifiable');
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {

        $url='http://127.0.0.1:8000/invoice_details/'.$this->name->id;
        return (new MailMessage)
        ->greeting('مرحباً')
        ->subject('اضافه فاتوره جديده')
                    ->line('اضافه فاتوره جديده')
                    ->action('عرض الفاتوره', $url)
                    ->line('شكراً لاستخدام نظام فاتورتك')
                    ->salutation('مع تحيات فريق فاتورتك')
                    ->greeting('مرحباً')
                    ->subject('إضافة فاتورة جديدة') // Email subject
                    ->line('تم إضافة فاتورة جديدة.') // Main content line
                    ->action('عرض الفاتورة', $url) // Action button with the link
                    ->line('شكراً لاستخدام نظام فاتورتك.') // Additional line of content
                    ->salutation('مع تحيات فريق فاتورتك') // Custom salutation
                    ->line('إذا كنت تواجه مشكلة في النقر على زر "عرض الفاتورة"، قم بنسخ الرابط أدناه ولصقه في متصفح الويب الخاص بك:')
                    ->line($url)
                    ->lineIf($this->name->value_status == 2, "فاتوره  : {$this->name->status}");

    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
