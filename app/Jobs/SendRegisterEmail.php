<?php

namespace App\Jobs;

use App\Mail\RegistrationSuccessMail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

/**
 * Класс задачи, которая отвечает за отправку письма при успешной регистрации. Метод handle(), который отправляет это
 * письмо, сработает при обработке в очереди. Реализация интерфейса ShouldQueue отвечает за помещение задачи в очередь,
 * вместо немедленного выполнения.
 * Class SendRegisterEmail
 * @package App\Jobs
 */
class SendRegisterEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Создаёт и отправляет письмо об успешной регистрации.
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->send(new RegistrationSuccessMail($this->user));
    }
}
