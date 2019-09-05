<?php
class RepositoryChapter
{
    private $_bdd;
    
    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }

    // Récupération de tous les chapitres (Pour page Accueil) + nombre de caractères limités
    public function selectChapters1()
    {  
        $chapters1 = array();
        
        $req = $this->_bdd->query('SELECT id, title, SUBSTRING(content, 1, 380) AS content, chapi, alarm, zerolink, DATE_FORMAT(date, \'%d/%m/%Y à %Hh %imin %ss\') AS chapterDate FROM chapters ORDER BY id DESC LIMIT 0,3');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $chapters1[] = new Chapter($data);
        }

        return $chapters1;
        $req->closeCursor();
    }
    
    // Récupération d'un chapitre spécifique (pour affichage en Back Office avec date de mise à jour)
    public function selectChapter($id)
    {
        $req = $this->_bdd->prepare('SELECT id, title, content, chapi, zerolink, alarm, DATE_FORMAT(date, \'%d/%m/%Y à %Hh %imin %ss\') AS chapterDate, DATE_FORMAT(refreshdate, \'%d/%m/%Y à %Hh %imin %ss\') AS refreshDate FROM chapters WHERE id = ?');
        $req->execute(array($id));
        //https://www.php.net/manual/fr/pdostatement.rowcount.php
        if($req->rowCount() == 1)
        {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Chapter($data);   
        }
        else
            throw new Exception('');

        $req->closeCursor();
    }
    
    // Récupération d'un chapitre spécifique avec format de date modifié (pour affichage page spécifique d'un chapitre)
    public function selectChapter1($id)
    {
        $req = $this->_bdd->prepare('SELECT id, title, content, chapi, alarm, DATE_FORMAT(date, \'%d/%m/%Y\') AS chapterDate FROM chapters WHERE id = ?');
        $req->execute(array($id));
        //https://www.php.net/manual/fr/pdostatement.rowcount.php
        if($req->rowCount() == 1)
        {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Chapter($data);   
        }
        else
            throw new Exception('');

        $req->closeCursor();
    }
    
    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}