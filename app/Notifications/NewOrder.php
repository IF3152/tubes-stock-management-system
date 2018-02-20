<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;
use App\Pemesanan;

class NewOrder extends Notification implements ShouldQueue
{
    use Queueable;
    protected $pemesanan;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Pemesanan $pemesanan)
    {
        $this->pemesanan = $pemesanan;
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
        return (new MailMessage)
                    ->line('Pemesanan Baru dari ')
                    ->line($this->pemesanan->cabangnya->nama)
                    ->action('Lihat', url('/admin/pemesanan',$this->pemesanan->id))
                    ->line('Segera lakukan konfirmasi dan pengiriman barang');
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
            'id' => $this->pemesanan->id,
            'kode_pemesanan' => $this->pemesanan->kode_pemesanan,
            'cabang' => $this->pemesanan->cabangnya->nama,
            'harga' => $this->pemesanan->harga,
        ];
    }

    public function toArray($notifiable)
    {
        return [
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'id' => $this->pemesanan->id,
                'cabang' => $this->pemesanan->cabangnya->nama,
                'kode_pemesanan' => $this->pemesanan->kode_pemesanan,
                'harga' => $this->pemesanan->harga,
            ],
        ];
    }
}
