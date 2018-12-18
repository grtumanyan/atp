<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TreeSectionsRepository")
 * @Vich\Uploadable
 */
class TreeSections
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $Image;

    /**
     * @ORM\Column(type="text")
     */
    private $established;

    /**
     * @ORM\Column(type="text")
     */
    private $location;

    /**
     * @ORM\Column(type="text")
     */
    private $area;

    /**
     * @ORM\Column(type="text")
     */
    private $employees;

    /**
     * @ORM\Column(type="text")
     */
    private $trees;

    /**
     * @ORM\Column(type="text")
     */
    private $seedlings;

    /**
     * @ORM\Column(type="text")
     */
    private $title;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage($Image)
    {
        $this->Image = $Image;

        return $this;
    }

    public function getEstablished(): ?string
    {
        return $this->established;
    }

    public function setEstablished(string $established): self
    {
        $this->established = $established;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(string $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getEmployees(): ?string
    {
        return $this->employees;
    }

    public function setEmployees(string $employees): self
    {
        $this->employees = $employees;

        return $this;
    }

    public function getTrees (): ?string
    {
        return $this->trees ;
    }

    public function setTrees (string $trees): self
    {
        $this->trees = $trees;

        return $this;
    }

    public function getSeedlings(): ?string
    {
        return $this->seedlings;
    }

    public function setSeedlings(string $seedlings): self
    {
        $this->seedlings = $seedlings;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

}
