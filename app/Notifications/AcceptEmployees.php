<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcceptEmployees extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($applyer_name)
    {
        $this->name = $applyer_name;
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
                    ->subject('Pemberitahuan Hasil Lamaran Dari '.$this->name)
                    ->greeting('Halo '.$this->name.',')
                    ->line('Terima kasih telah mengirimkan lamaran kepada Kami,')
                    ->line('Namun ada beberapa aspek yang akan menjadi pertimbangan Kami. 
                    Untuk itu kami sudah mendapatkan hasil dari lamaran yang Kamu kirimkan, dari lamaran yang Kamu kirimkan, 
                    sepertinya kamu pantas menempati posisi yang Kamu inginkan di perusahaan Kami')
                    ->line('Silahkan klik link dibawah untuk melanjutkan ke halaman kerja Kamu')
                    ->action('Lihat Workspace', '/url')
                    ->line('Sekian, terima kasih');
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
