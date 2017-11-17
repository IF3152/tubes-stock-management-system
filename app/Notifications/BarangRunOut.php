<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Barang;

class BarangRunOut extends Notification
{
    use Queueable;
    protected $barang;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Barang $barang)
    {
        $this->barang = $barang;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $admin = User::where('isAdmin',1)->get();
        return (new MailMessage)
                    ->cc($admin)
                    ->line('Stok barang')
                    ->line($this->barang->nama)
                    ->line('tersisa')
                    ->line($this->barang->stok)
                    ->action('Lihat', url('/barang'))
                    ->line('Terima kasih sudah menggunakan layanan kami');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'id' => $this->barang->id,
            'barang' => $this->barang->nama,
            'stok' => $this->pemesanan->stok,
        ];
    }


    public function toArray($notifiable)
    {
        return [
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'id' => $this->barang->id,
                'barang' => $this->barang->nama,
                'stok' => $this->pemesanan->stok,
            ],
        ];
    }
}
