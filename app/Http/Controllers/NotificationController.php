<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\UserNotification;
use Illuminate\Notifications\Notifiable;


class NotificationController extends Controller
{
    // Afficher toutes les notifications d'un utilisateur
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir vos notifications.');
        }

        // Supprimer les notifications anciennes (plus de 3 mois)
        Notification::where('user_id', $user->id)
            ->where('created_at', '<', now()->subMonths(3))
            ->delete();

        $notifications = Notification::where('user_id', $user->id)->latest()->get();

        return view('pages.back.notifications', compact('notifications'));
    }

    // Marquer une notification comme lue
    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->is_read = true;
        $notification->save();

        return redirect()->route('notifications.index')->with('success', 'Notification marquée comme lue.');
    }

    // Supprimer une notification
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->route('notifications.index')->with('success', 'Notification supprimée.');
    }

    // Lire une notification
    public function lirenotification($id)
    {
        $notification = Notification::findOrFail($id);
        return view('pages.back.lirenotification', compact('notification'));
    }

    // Créer une notification (affichage formulaire)
    public function create()
    {
        // Récupérer tous les utilisateurs pour les options du formulaire (si nécessaire)
        $users = User::all(); 
    
        return view('pages.back.createnotification', compact('users'));
    }

    // Stocker une notification
    public function store(Request $request)
    {
    // Valider les données du formulaire
    $request->validate([
        'user_id' => 'required|integer|exists:users,id',
        'title' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    // Créer une notification en base de données
    $notification = Notification::create([
        'user_id' => $request->user_id,
        'title' => $request->title,
        'message' => $request->message,
        'is_read' => false,
    ]);

//    dd( $notification->message);
    // dd($request->message);
    // Envoyer une notification par e-mail
    $user = User::findOrFail($request->user_id);
    $user->notify(new UserNotification($notification->title, $notification->message));

    // Rediriger avec un message de succès
    return redirect()->route('notifications.index')->with('success', 'Notification créée et envoyée avec succès.');
    }

    // Générer une notification pour une action spécifique
    public function notifyForAction($action, $userId)
{
    $user = User::findOrFail($userId);

    switch ($action) {
        case 'new_subscription':
            $title = "Bienvenue dans l'abonnement !";
            $message = "Merci de vous être abonné. Accédez dès maintenant à vos analyses de trading, ressources et formations.";

            // Envoi de l'email de bienvenue avec un lien d'accès et des instructions supplémentaires
            Mail::to($user->email)->send(new \App\Mail\WelcomeEmail($user,$message));

            break;

        case 'resource_access':
            $title = "Nouvelle ressource disponible !";
            $message = "Une nouvelle ressource (PDF/vidéo) a été ajoutée à votre espace abonné.";
            break;

        case 'live_session':
            $title = "Prochaine session en direct !";
            $message = "Rejoignez notre prochaine session en direct pour des analyses exclusives.";
            break;

        case 'login_from_another_device':
            $title = "Connexion depuis un autre appareil";
            $message = "Votre compte a été connecté depuis un autre appareil. Si ce n'était pas vous, veuillez sécuriser votre compte immédiatement.";

            break;

        case 'contact_support':
            $title = "Demande de support client reçue";
            $message = "Nous avons bien reçu votre demande de support. Notre équipe vous contactera sous peu.";

            break;

        default:
            $title = "Notification";
            $message = "Vous avez une nouvelle notification.";
            break;
    }

    // Créer la notification en base de données
    Notification::create([
        'user_id' => $user->id,
        'title' => $title,
        'message' => $message,
        'is_read' => false,
    ]);

    // Envoyer la notification par email
    $user->notify(new UserNotification($title, $message));
}



}