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
    private $establishedArm;

    /**
     * @ORM\Column(type="text")
     */
    private $establishedEng;

    /**
     * @ORM\Column(type="text")
     */
    private $locationArm;

    /**
     * @ORM\Column(type="text")
     */
    private $locationEng;

    /**
     * @ORM\Column(type="text")
     */
    private $areaArm;

    /**
     * @ORM\Column(type="text")
     */
    private $areaEng;

    /**
     * @ORM\Column(type="text")
     */
    private $employeesArm;

    /**
     * @ORM\Column(type="text")
     */
    private $employeesEng;

    /**
     * @ORM\Column(type="text")
     */
    private $treesArm;

    /**
     * @ORM\Column(type="text")
     */
    private $treesEng;

    /**
     * @ORM\Column(type="text")
     */
    private $seedlingsArm;

    /**
     * @ORM\Column(type="text")
     */
    private $seedlingsEng;

    /**
     * @ORM\Column(type="text")
     */
    private $titleArm;

    /**
     * @ORM\Column(type="text")
     */
    private $titleEng;

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

    public function getEstablishedArm(): ?string
    {
        return $this->establishedArm;
    }

    public function setEstablishedArm(string $established): self
    {
        $this->establishedArm = $established;

        return $this;
    }

    public function getLocationArm(): ?string
    {
        return $this->locationArm;
    }

    public function setLocationArm(string $location): self
    {
        $this->locationArm = $location;

        return $this;
    }

    public function getAreaArm(): ?string
    {
        return $this->areaArm;
    }

    public function setAreaArm(string $area): self
    {
        $this->areaArm = $area;

        return $this;
    }

    public function getEmployeesArm(): ?string
    {
        return $this->employeesArm;
    }

    public function setEmployeesArm(string $employees): self
    {
        $this->employeesArm = $employees;

        return $this;
    }

    public function getTreesArm (): ?string
    {
        return $this->treesArm ;
    }

    public function setTreesArm (string $trees): self
    {
        $this->treesArm = $trees;

        return $this;
    }

    public function getSeedlingsArm(): ?string
    {
        return $this->seedlingsArm;
    }

    public function setSeedlingsArm(string $seedlings): self
    {
        $this->seedlingsArm = $seedlings;

        return $this;
    }

    public function getTitleArm(): ?string
    {
        return $this->titleArm;
    }

    public function setTitleArm(string $title): self
    {
        $this->titleArm = $title;

        return $this;
    }

    public function getEstablishedEng(): ?string
    {
        return $this->establishedEng;
    }

    public function setEstablishedEng(string $established): self
    {
        $this->establishedEng = $established;

        return $this;
    }

    public function getLocationEng(): ?string
    {
        return $this->locationEng;
    }

    public function setLocationEng(string $location): self
    {
        $this->locationEng = $location;

        return $this;
    }

    public function getAreaEng(): ?string
    {
        return $this->areaEng;
    }

    public function setAreaEng(string $area): self
    {
        $this->areaEng = $area;

        return $this;
    }

    public function getEmployeesEng(): ?string
    {
        return $this->employeesEng;
    }

    public function setEmployeesEng(string $employees): self
    {
        $this->employeesEng = $employees;

        return $this;
    }

    public function getTreesEng (): ?string
    {
        return $this->treesEng ;
    }

    public function setTreesEng (string $trees): self
    {
        $this->treesEng = $trees;

        return $this;
    }

    public function getSeedlingsEng(): ?string
    {
        return $this->seedlingsEng;
    }

    public function setSeedlingsEng(string $seedlings): self
    {
        $this->seedlingsEng = $seedlings;

        return $this;
    }

    public function getTitleEng(): ?string
    {
        return $this->titleEng;
    }

    public function setTitleEng(string $title): self
    {
        $this->titleEng = $title;

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
