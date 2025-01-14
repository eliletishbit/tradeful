<?php

namespace App\Console\Commands;

use App\Models\Notification;
use Illuminate\Console\Command;

class DeleteOldNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-old-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commande de suppresion d\'une ancienne notification deja lue ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        // Supprimer les notifications lues depuis plus d'une semaine
        Notification::where('is_read', true)
            ->where('created_at', '<', now()->subWeek())
            ->delete();

        // $this->info('Anciennes notifications supprimées avec succès.');
    }
}
