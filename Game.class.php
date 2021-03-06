<?php

require_once './Developer.class.php';
require_once './Platform.class.php';


class Game {
    private $id;
    private $title;
    private $release_date;
    private $link;
    private $developer_id;
    private $platform_id;


public function __construct(    
    int $id, 
    string $title,
    string $release_date,
    string $link,
    int $developer_id, 
    int $platform_id
)

{
    $this->id = $id;
    $this->title = $title;
    $this->release_date = $release_date;
    $this->link = $link;
    $this->developer_id= $developer_id;
    $this->platform_id= $platform_id;
}



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }


    /**
     * Get the value of release_date
     */ 
    public function getRelease_date()
    {
        return $this->release_date;
    }

    /**
     * Set the value of release_date
     *
     * @return  self
     */ 
    public function setRelease_date($release_date)
    {
        $this->release_date = $release_date;

        return $this;
    }

    /**
     * Get the value of link
     */ 
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of link
     *
     * @return  self
     */ 
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

 /**
     * Get the value of developer_id
     */ 
    public function getDeveloper_id()
    {
        return $this->developer_id;
    }

    /**
     * Set the value of developer_id
     *
     * @return  self
     */ 
    public function setDeveloper_id($developer_id)
    {
        $this->developer_id = $developer_id;

        return $this;
    }

   /**
     * Get the value of platform_id
     */ 
    public function getPlatform_id()
    {
        return $this->platform_id;
    }

    /**
     * Set the value of platform_id
     *
     * @return  self
     */ 
    public function setPlatform_id($platform_id)
    {
        $this->platform_id = $platform_id;

        return $this;
    }

    public function getDeveloper(): ?Developer
    {
        return fetchDeveloperById($this->developer_id);
    }

    public function setDeveloper(?Developer $developer): self
    {
        $this->developer = $developer->getId();

        return $this;

    }

    public function getPlatform(): ?Platform
    {
        return fetchPlatformById($this->platform_id);
    }

    public function setPlatform(?RamComponent $platform): self
    {
        $this->platform = $platform->getId();

        return $this;
    }



}





function createGame($id,$title,$release_date,$link,$developer_id,$platform_id)
{
    return new Game($id,$title,$release_date,$link,$developer_id,$platform_id);

 
}


function fetchAllGames(){
global $dbh;

$stmt=$dbh->query('SELECT * FROM `game`');
return $stmt->fetchAll(PDO::FETCH_FUNC,'createGame');

}