<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportClient;
use App\Http\Controllers\Controller;

class SupportClientController extends Controller
{
    //logique support client

    public function index()
   {
       // Récupérer toutes les demandes de support client
       
   }

   public function create()
   {
       // Afficher le formulaire pour créer une nouvelle demande de support client
       
   }

   public function store(Request $request)
   {
       // Validation et stockage d'une nouvelle demande de support client
    
   }

   public function show(SupportClient $supportClient)
   {
       // Afficher une demande de support client spécifique
       
   }

   public function edit(SupportClient $supportClient)
   {
       // Afficher le formulaire pour modifier une demande de support client
       
   }

   public function update(Request $request, SupportClient $supportClient)
   {
       // Validation et mise à jour d'une demande de support client
       
   }

   public function destroy(SupportClient $supportClient)
   {
       // Supprimer une demande de support client
       
   }
}
