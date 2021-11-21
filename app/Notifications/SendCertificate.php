<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Storage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendCertificate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
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
        return (new MailMessage)
          ->subject('Sertifikat Keikutsertaan Lomba Fotografi Exova #1')
          ->greeting('Hello ' . $this->data['data_peserta']['name'])
          ->line('Silakan download sertifikat yang telah kami lampirkan di bawah, atau bisa juga di download pada halaman kompetisi di website Exova')
          ->line('Terima kasih telah ikut serta dalam kompetisi kali ini, nantikan kompetisi lainnya dari Exova!')
          ->attach($this->data['certificate'])
          ->line('Semoga kita dalam keadaan sehat, bahagia, dan kaya raya');
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
