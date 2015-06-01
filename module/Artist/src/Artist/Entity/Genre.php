<?php
namespace Artist\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Genre
 * @package Artist\Entity
 * @ORM\Entity
 * @ORM\Table(name="genres")
 */
class Genre {

    /**
     * @ORM\OneToMany(targetEntity="Artist", mappedBy="genre")
     */
    private $artists;

    /**
     * @ORM\OneToMany(targetEntity="Genre", mappedBy="parentGenre")
     */
    private $childrenGenres;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", length=5, name="genre_id")
     */
    private $genreId;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Genre", inversedBy="childrenGenres")
     * @ORM\JoinColumn(name="parent_genre_id", referencedColumnName="genre_id")
     */
    private $parentGenre;

    public function __construct(){
        $this->artists = new ArrayCollection();
        $this->childrenGenres = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getChildrenGenres()
    {
        return $this->childrenGenres;
    }

    /**
     * @param mixed $childrenGenres
     */
    public function setChildrenGenres($childrenGenres)
    {
        $this->childrenGenres = $childrenGenres;
    }

    public function addChildrenGenres($childrenGenres){
        foreach($childrenGenres as $genre)
            if(!$this->childrenGenres->contains($genre))
                $this->childrenGenres->add($genre);
    }

    public function removeChildrenGenres($childrenGenres){
        foreach($childrenGenres as $genre)
            if($this->childrenGenres->contains($genre))
                $this->childrenGenres->removeElement($genre);
    }

    /**
     * @return mixed
     */
    public function getGenreId()
    {
        return $this->genreId;
    }

    /**
     * @param mixed $genreId
     */
    public function setGenreId($genreId)
    {
        $this->genreId = $genreId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getParentGenre()
    {
        return $this->parentGenre;
    }

    /**
     * @param mixed $parentGenre
     */
    public function setParentGenre($parentGenre)
    {
        $this->parentGenre = $parentGenre;
    }

}