<?php
class FR extends AbstractLang
{
    private static array $_items = [
        //'page-name_'=>'Value'

        //globals
        'home_page'=>'Accueil',
        'upload_page'=>'Téléverser',
        'settings_page'=>'Paramètre',
        'contact_page'=>'Me contacter',
        'error_page'=>'Erreur',
        'watch_page'=>'Regarde',
        'login_page'=>'Se connecter',
        'signup_page'=>'S\'inscrire',
        'signout_page'=>'Se déconnecter',
        'website_foot'=>'le site de MCBE',
        'lang_fr'=>'FR',
        'lang_en'=>'EN',
        'login_not'=>'Veuillez vous connecter',

        //home page
        'home_title'=>'Bienvenue sur mon site',



        //upload page
        'upload_vido-upload-label'=>'Téléverser votre vidéo',
        'upload_video-title-label'=>'Titre de la vidéo',
        'upload_video-title-placeholder'=>'Ma super Video',
        'upload_video-description-label'=>'Description',
        'upload_video-description-placeholder'=>'Bienvenue sur ma Video',
        'upload_video-upload-button-name'=>'Téléverser',
        'upload_video-upload-error'=>'Erreur de Téléversement',
        'upload_video-missing'=>'Element manquant',
        'upload_video-database-upload'=>'Erreur d\'insertion en base de donnée',
        'upload_video-wrong-format'=>'Mauvais type de fichier, demande type vidéo',



        //settings page
        'settings_language'=>'Langue',
        'settings_themes'=>'Theme',
        'settings_submit'=>'Enregistrer',



        //contact page
        'contact_title'=>'Me Contacter',
        'contact_discord-title'=>'Discord',
        'contact_mail-title'=>'Mail',

        //watch page
        'watch_delete'=>'Supprimer',
        'watch_download'=>'Télécharger',


        //log in page
        'login_username-label'=>'Nom d\'utilisateur',
        'login_username-placeholder'=>'adresse mail/nom de chaine',
        'login_password-label'=>'Mot de passe',
        'login_password-placeholder'=>'Votre mot de passe',
        'login_submit-button'=>'Se connecter',
        'login_missing'=>'nom d\'utilisateur ou mot de passe manquant',
        'login_wrong-credentials'=>'nom d\'utilisateur ou mot de passe erroné',
        'login_error'=>'Erreur de connection',
        'login_no-permission'=>'Vous n\'avez pas la permission',


        //sign up page
        'signup_username-label'=>'Nom d\'utilisateur',
        'signup_username-placeholder'=>'adresse mail/nom de chaine',
        'signup_email-label'=>'Adresse mail',
        'signup_email-placeholder'=>'vous@exemple.com',
        'signup_description-label'=>'Description de la chaine',
        'signup_description-placeholder'=>'A propos de votre chaine',
        'signup_password-label'=>'Mot de passe',
        'signup_password-placeholder'=>'Votre mot de passe',
        'signup_passwordConf-label'=>'Confirmer votre mot de passe',
        'signup_passwordConf-placeholder'=>'Votre mot de passe',
        'signup_submit-button'=>'S\'inscrire',
        'signup_missing'=>'Nom d\'utilisateur, adresse mail, mot de passe ou confirmation de mot de passe manquant',
        'signup_wrong-credentials'=>'Mots de passe non concordants',
        'signup_insert-fail'=>'Erreur de création de la chaine',
        'signup_error'=>'Erreur d\'inscription',




        //error page
        'error_default'=>'Erreur',
        'error_video-not-found'=>'404 vidéo non trouvée',
        'error_video-not-deleted'=>'406 Non Acceptable',
        'error_database-connection'=>'Erreur de connexion a la base de donnée',
        'error_redirecting'=>'Redirection dans 5 secondes',
    ];

    public function __construct()
    {
        static::addTranslation(static::$_items);
    }

    public static function getLang(): string
    {
        return get_class();
    }
}
new FR();