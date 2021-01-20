<?php

// Manager, s'occupe de gérer les instances de la classe Article
class ArticleManager
{
    // Attribut
    private MyPDO $db;

    // Method
    public function __construct(MyPDO $connect){
        $this->db = $connect;
    }

    // Read all from Article
    public function readAllArticle(): Array {
        $sql = "SELECT * FROM article ORDER BY articleDateTime DESC";
        $recupAll = $this->db->query($sql);
        if($recupAll->rowCount()) {
            return $recupAll->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return [];
        }
    }

    // function qui va permettre de couper les x premiers caractères sans couper de mots, le mot clef static va permettre d'utiliser cette méthode sans devoir instancier le classe ArticleManager
    public static function cutTheText(string $text, int $nbChars): string{
        $cutText = substr($text,0,$nbChars);
        return $cutText = substr($cutText,0,strrpos($cutText," "));
    }
}