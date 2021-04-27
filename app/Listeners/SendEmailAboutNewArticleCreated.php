<?php

namespace App\Listeners;

use App\Events\NewArticleCreated;
use App\Mail\NewArticleMail;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

/**
 * Слушатель события NewArticleCreated. Он создаёт письмо с уведомлением об этом событии и рассылает его всем
 * пользователям.
 * Class SendEmailAboutNewArticleCreated
 * @package App\Listeners
 */
class SendEmailAboutNewArticleCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewArticleCreated  $event
     * @return void
     */
    public function handle(NewArticleCreated $event)
    {
        $users = User::all(); //todo замутить ленивую загрузку или что там, чтоб не все сразу грузились

        // создание письма
        $newArticleMail = new NewArticleMail($event->article);

        // и его рассылка
        foreach ($users as $user) {
            $newArticleMail->userName = $user->name;
            Mail::to($user)->send($newArticleMail);
        }
    }
}
