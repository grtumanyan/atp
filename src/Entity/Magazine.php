<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MagazineRepository")
 * @Vich\Uploadable
 */
class Magazine
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
    private $titleArm;

    /**
     * @ORM\Column(type="text")
     */
    private $titleEng;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $pathArm;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $pathEng;

    /**
     * @ORM\Column(type="text")
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleArm(): ?string
    {
        return $this->titleArm;
    }

    public function setTitleArm(string $Title): self
    {
        $this->titleArm = $Title;

        return $this;
    }

    public function getTitleEng(): ?string
    {
        return $this->titleEng;
    }

    public function setTitleEng(string $Title): self
    {
        $this->titleEng = $Title;

        return $this;
    }

    public function getPathArm()
    {
        return $this->pathArm;
    }

    public function setPathArm($path)
    {
        $this->pathArm = $path;

        return $this;
    }

    public function getPathEng()
    {
        return $this->pathEng;
    }

    public function setPathEng($path)
    {
        $this->pathEng = $path;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

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
