<?php

namespace App\Entity;
use App\Entity\Avis;
 use Cocur\Slugify\Slugify;
 use Webmozart\Assert\Assert;
 use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HotelRepository")
 */
class Hotel
{


     const avis =[
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4'
               ];

               

    /**
     * @ORM\Id() 
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
      */
    private $nomhotel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    
    
  
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $occupation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $service;

    

   
  
    /**
     * @ORM\OneToOne(targetEntity="Pension",cascade={"persist"})  
     * @ORM\JoinColumn(nullable=true)
       */
     private  $pension ;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $hebergement;

    /**
     * @ORM\Column(type="text")
     */
    private $restauration;

     

    /**
     * @ORM\Column(type="text")
     */
    private $diveservice;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $avis;

  
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $destination;

  

    public function getPension(): ?int
    {
        return $this->pension;
    }
 
    

    public function setPension(Pension $pension)
    {
        $this->pension = $pension;

        return $this;
    }


 
    
   /**
     * Permet d'initialiser le slug !
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     * 
     * @return void
     */
     public function initializeSlug() {
        if(empty($this->slug)) {
            $slugify = new Slugify();
            $this->slug = $slugify->slugify($this->nomhotel);
        }
    }
 
 
  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomhotel(): ?string
    {
        return $this->nomhotel;
    }

    public function setNomhotel(string $nomhotel): self
    {
        $this->nomhotel = $nomhotel;

        return $this;
    }
    
    public function getSlug(): string
    {
        return (new slugify())->slugify($this->nomhotel);
        
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

   
 
 
    

 

    public function getOccupation(): ?string
    {
        return $this->occupation;
    }

    public function setOccupation(string $occupation): self
    {
        $this->occupation = $occupation;

        return $this;
    }

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(string $service): self
    {
        $this->service = $service;

        return $this;
    }

   
   

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getHebergement(): ?string
    {
        return $this->hebergement;
    }

    public function setHebergement(string $hebergement): self
    {
        $this->hebergement = $hebergement;

        return $this;
    }

    public function getRestauration(): ?string
    {
        return $this->restauration;
    }

    public function setRestauration(string $restauration): self
    {
        $this->restauration = $restauration;

        return $this;
    }

    public function getDiveService(): ?string
    {
        return $this->diveservice;
    }

    public function setDiveService(string $diveservice): self
    {
        $this->diveservice = $diveservice;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getAvis(): ?int
    {
        return $this->avis;
    }

    public function setAvis(int $avis): self
    {
        $this->avis = $avis;

        return $this;
    }

    

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }
 

      
    
     public function getCreatedAt(): ?\DateTimeInterface
     {
         return $this->createdAt;
     }
 
     public function setCreatedAt(?\DateTimeInterface $createdAt): self
     {
         $this->createdAt = $createdAt;
 
         return $this;
     } 
   
}
