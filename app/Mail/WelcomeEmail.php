<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $user;
    protected $message;
    public function __construct($user, $message)
    {
        //
        $this->user = $user;
        $this->message=$message;
        
    }

    public function build()
    {
        return $this->subject('Bienvenue sur notre plateforme !')
                ->view('emails.welcome') // Vue email
                ->with([
                    'name' => $this->user->name,
                    'siteLink' => url('/'),
                    'affiliateLink' => url('/derivative-account-signup'), // Lien affilié pour le compte dérivé
                    'message' => $this->message, // Corrigé ici
                ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome',
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
