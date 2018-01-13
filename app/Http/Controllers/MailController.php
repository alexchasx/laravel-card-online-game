<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends BaseController
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
     public function simplePHPEmail(Request $request)
     {
         $email = $request->input('email');
         $message = $request->input('message');
         $text = "Email: $email \r\nMessage: $message";
         $title = config('app.name');
         $receiver = config('app.admin_email');

         mail(
             $receiver,
             $title,
             $text,
             "Content-type: text/plain; charset=\"utf-8\"\r\nFrom: $receiver"
         );

         return view('contact')->with(['success' => 'Сообщение отправлено!']);
     }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function rowEmail(Request $request) //TODO Пример (http://www.tutorialspoint.com/laravel/laravel_sending_email.htm)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'message' => 'required|string|min:10|max:1000',
        ]);

        $text = 'Сообщение из '
            . config('app.name')
            . '. От пользователя: '
            . $request->input('email')
            . ': '
            . $request->input('message');

        Mail::raw($text, function($message) {
            $message->to(config('app.admin_email'));
        });

        return redirect()->back()->with(['success' => 'Сообщение отправлено!']);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function basicEmail(Request $request) //TODO Пример
    {
        $this->validate($request, [
            'email' => 'required|email',
            'message' => 'required|string|min:10|max:1000',
        ]);

        Mail::send(['text' => 'emails.contact'], [
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ],
            function($message) {
                $message->to(config('app.admin_email'), config('app.name'))
                    ->subject('Тест');
                $message->from(config('app.admin_email'));
            });

        return redirect()->back()->with(['success' => 'Сообщение отправлено!']);
    }

    /**
     * @return void
     */
    public function htmlEmail() //TODO Пример
    {
        $data = array('name' => "Virat Gandhi");
        Mail::send('mail', $data, function($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
            $message->from('xyz@gmail.com', 'Virat Gandhi');
        });
        echo "HTML Email Sent. Check your inbox.";
    }

    /**
     * @return void
     */
    public function attachmentEmail() //TODO Пример
    {
        $data = array('name' => "Virat Gandhi");
        Mail::send('mail', $data, function($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
            $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
            $message->from('xyz@gmail.com', 'Virat Gandhi');
        });
        echo "Email Sent with attachment. Check your inbox.";
    }

}
