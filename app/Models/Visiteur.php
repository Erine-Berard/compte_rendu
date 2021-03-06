<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Visiteur extends Model implements Authenticatable
{
    use BasicAuthenticatable;

    protected $fillable = ['id', 'login', 'nom', 'prenom','adresse','cp','ville','dateEmbauche','statut', 'IDsecteur', 'IDlabo'];

    /**
     * Get the password for the user
     * 
     * @return string
     */
    public function getAuthPassword(){
        $date = $this->dateEmbauche;
        $jour= "";
        $mois= "";
        $annee= "";
        for($i = 0; $i < strlen($date); $i++){ // Parcourent tous les caractères un par un de la date 
            if ($i < 4){ // Récupère l'année 
                $annee= $annee.$date[$i];
            }
            else if ($i > 4 && $i < 7){ // Récupère le mois
                $mois = $mois.$date[$i];
            }
            else if ($i > 7){ // Récupère le jour
                $jour = $jour.$date[$i];
            }
        }
        switch ($mois) { // Change le numéro du mois en acronyme  
            case 01 : 
                $mois = 'jan'; break;
            case 02 : 
                $mois = 'feb'; break;
            case 03 : 
                $mois = 'mar'; break;
            case 04 : 
                $mois = 'apr'; break;
            case 05 : 
                $mois = 'may'; break;
            case 06 : 
                $mois = 'jun'; break;
            case 07 : 
                $mois = 'jul'; break;
            case 8 : 
                $mois = 'jul'; break;
            case 9 : 
                $mois = 'sep'; break;
            case 10 : 
                $mois = 'oct'; break;
            case 11 : 
                $mois = 'nov'; break;
            case 12 : 
                $mois = 'dec'; break;
        }
        $mp = $jour."-".$mois."-".$annee; // Concatène le mot de passe 
        return bcrypt($mp);
    }


}
