<?php

namespace App\Mail;

use App\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Письмо, которое отправляется всем юзерам при создании новой статьи. Запускается слушателем
 * из соответствующего события. Принимает эту новую статью для передачи в шаблон этого письма.
 * Class NewArticleMail
 * @package App\Mail
 */
class NewArticleMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Имя поль-ля для шаблона письма.
     * @var
     */
    public $userName;

    /**
     * Новая статья с данными для шаблона.
     * @var Article
     */
    public $article;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('superblog@tresh.com')
            ->view('emails.new_article_email');
    }
}
