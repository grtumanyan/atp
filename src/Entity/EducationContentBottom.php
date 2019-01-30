<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EducationContentBottomRepository")
 * @Vich\Uploadable
 */
class EducationContentBottom
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
     * @ORM\Column(type="text")
     */
    private $textArm;

    /**
     * @ORM\Column(type="text")
     */
    private $textEng;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="text")
     */
    private $linkTextArm;

    /**
     * @ORM\Column(type="text")
     */
    private $linkTextEng;

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

    public function getTextEng(): ?string
    {
        return $this->textEng;
    }

    public function setTextEng(string $text): self
    {
        $this->textEng = $text;

        return $this;
    }

    public function getTextArm(): ?string
    {
        return $this->textArm;
    }

    public function setTextArm(string $text): self
    {
        $this->textArm = $text;

        return $this;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    public function getLinkTextArm(): ?string
    {
        return $this->linkTextArm;
    }

    public function setLinkTextArm(string $linkText): self
    {
        $this->linkTextArm = $linkText;

        return $this;
    }

    public function getLinkTextEng(): ?string
    {
        return $this->linkTextEng;
    }

    public function setLinkTextEng(string $linkText): self
    {
        $this->linkTextEng = $linkText;

        return $this;
    }
}
