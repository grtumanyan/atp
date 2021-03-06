<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AmbassadorContentRepository")
 * @Vich\Uploadable
 */
class AmbassadorContent
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
    private $TextTopArm;

    /**
     * @ORM\Column(type="text")
     */
    private $TextTopEng;

    /**
     * @ORM\Column(type="text")
     */
    private $titleArm;

    /**
     * @ORM\Column(type="text")
     */
    private $titleEng;

    /**
     * @ORM\Column(type="text")
     */
    private $TextBottomArm;

    /**
     * @ORM\Column(type="text")
     */
    private $TextBottomEng;

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

    public function getTextTopEng(): ?string
    {
        return $this->TextTopEng;
    }

    public function setTextTopEng(string $TextTop): self
    {
        $this->TextTopEng = $TextTop;

        return $this;
    }

    public function getTextTopArm(): ?string
    {
        return $this->TextTopArm;
    }

    public function setTextTopArm(string $TextTop): self
    {
        $this->TextTopArm = $TextTop;

        return $this;
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

    public function getTextBottomArm(): ?string
    {
        return $this->TextBottomArm;
    }

    public function setTextBottomArm(string $TextBottom): self
    {
        $this->TextBottomArm = $TextBottom;

        return $this;
    }

    public function getTextBottomEng(): ?string
    {
        return $this->TextBottomEng;
    }

    public function setTextBottomEng(string $TextBottom): self
    {
        $this->TextBottomEng = $TextBottom;

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
