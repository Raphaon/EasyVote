<?php

/*
|--------------------------------------------------------------------------
| Added Helpers by @nyx
|--------------------------------------------------------------------------
*/

if (! function_exists('is_valider')) {

    /**
     * Check le statut d'un élement de l'inscrit
     * @param [text] $tab : tableau sérialisé contenant toutes les clé&status des éléments du dosssier d'un inscrit
     * @param [string] $el : element dont on veut vérifier le statut
     * @param type|null $v : J'EN SAIS RIEN
     * @return type
     */
    function is_valider($tab,$el,$v=null)
    {
        $tab = unserialize($tab);

        if($v != null){
            if( isset($tab[$el]) && trim($tab[$el])==trim($el.$v)){
                return 'checked';
            }else{
                return '';
            }
        }else{

            if(isset($tab[$el])){
                return 'checked';
            }else{
                return '';
            }
        }
        
        return '';
    }
}