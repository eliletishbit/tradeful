<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LiveController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyseController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\IdeeBusinessController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SignauxController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SupportClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.front.index');
})->name('accueil');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






//routes auth laravel breeez
require __DIR__.'/auth.php';






// Routes protégées par le middleware admin
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'showDashboardAdmin'])->name('admindashboard');
    // Les admins peuvent gerer toutes les ressources
    Route::resource('/users', UserController::class); // Admin peut gérer tous les utilisateurs

    //interface connexion admin
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'storeAdmin']);
    
});


//Routes authentifiées pour tous les utilisateurs
Route::group(['middleware' => ['auth']],  function () {
    
  
    Route::resource('/signaux', SignauxController::class)->middleware('check.subscription');
    Route::resource('/ressources', RessourceController::class )->middleware('check.subscription'); 
    
    Route::resource('/analyses', AnalyseController::class)->middleware('check.subscription'); // Admin uniquement
    Route::resource('/users', UserController::class)->middleware('check.subscription');
    Route::resource('/subscriptions', SubscriptionController::class)->middleware('check.subscription'); 


   
    Route::resource('/discussions', DiscussionController::class)->middleware('check.subscription'); // Admin uniquement
    Route::resource('/supportclient', SupportClientController::class)->middleware('check.junior'); // Junior et plus 1 3 ou 4
    Route::get('/live', [LiveController::class, 'index'])->middleware('check.senior')->name('live.index'); // 4 ou 1 Senior uniquement
    Route::get('/businessidea', [IdeeBusinessController::class, 'businessidea'])->middleware('check.senior')->name('business.ideas');
    
});



Route::middleware(['auth'])->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    Route::get('/notifications/{id}', [NotificationController::class, 'lirenotification'])->name('notifications.lirenotification');


   
});

Route::middleware(['auth', 'admin'])->group(function () {


    Route::get('/admin/addnotifictaion', [NotificationController::class, 'create'])->name('notifications.create');
    Route::post('/admin/storenotification', [NotificationController::class, 'store'])->name('notifications.store');
    


});


//////////////////////////////////////////// simples routes

Route::get('/apropos', function(){
return view('pages.front.apropos');
});

Route::get('/contact', function(){
    return view('pages.front.contact');
});

Route::get('/faq', function(){
    return view('pages.front.faq');
});

Route::get('/cgu', function(){
return view('pages.front.cgu');
});




///////////////////////////////////////////////

// Route::resource('/analyses', AnalyseController::class)->middleware('check.subscription:1'); // Admin uniquement






/////////////////////////////////////////////////////////////////////
// Route::middleware('auth')->prefix('dashboard')->group(function () {
   
//  // Routes accessibles aux utilisateurs avec un abonnement spécifique

//     // Admin - Accès complet à toutes les ressources
//     Route::resource('/signaux', NotificationController::class)->middleware('check.subscription');

    
//     Route::resource('/ressources', RessourceController::class )->middleware('check.subscription:1'); // Admin uniquement
//     Route::resource('/analyses', AnalyseController::class)->middleware('check.subscription:1'); // Admin uniquement
//     Route::resource('/discussions', DiscussionController::class)->middleware('check.subscription:1'); // Admin uniquement
//     Route::resource('/notifications', NotificationController::class)->middleware('check.subscription:1'); // Standard et plus
//     Route::resource('/subscriptions', SubscriptionController::class)->middleware('check.subscription:1'); // Standard et plus
    
//     Route::resource('/supportclient', SupportClientController::class)->middleware('check.junior'); // Junior et plus 1 3 ou 4
    
//     Route::get('/live', [LiveController::class, 'index'])->middleware('check.senior')->name('live.index'); // 4 ou 1 Senior uniquement
//     Route::get('/businessidea', [IdeeBusinessController::class, 'businessidea'])->middleware('check.senior')->name('business.ideas');


//     ////////////////////////////////////////////////////////////////////
    
//     // Utilisateur Senior (niveau 4) - Accès à tout ce qu'un utilisateur junior a + live
    
//     // Autres routes...
//     Route::get('/lirenotification/{id}', [NotificationController::class, 'lirenotification'] )->name('notifications.read');
//     // Route pour marquer une notification comme lue
//     Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');



// });

