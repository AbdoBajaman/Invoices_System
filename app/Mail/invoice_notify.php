<?php

namespace App\Mail;

// use Faker\Provider\ar_EG\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
class invoice_notify extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    /**
     * Create a new message instance.
     */
    public function __construct($name)
    {
        //
        $this->name = $name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {

        return new Envelope(
            from: new Address('bajamanabdo@gmail.com','باجعمان'),
            // replyTo: [
            //     new Address('bajamanabdo@gmail.com', 'Taylor Otwell'),
            // ],
            subject: 'فاتورتك',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $url='http://127.0.0.1:8000/invoice_details/'.$this->name->id;
        return new Content(
            view: 'emails.invoice_email',
            with:['name'=>$this->name,'url'=>$url],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
