<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LandingContentRepository")
 */
class LandingContent
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $titleArm;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $titleEng;

    /**
     * @ORM\Column(type="text")
     */
    private $textTopArm;

    /**
     * @ORM\Column(type="text")
     */
    private $textTopEng;

    /**
     * @ORM\Column(type="text")
     */
    private $textBottomArm;

    /**
     * @ORM\Column(type="text")
     */
    private $textBottomEng;

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

    public function getTextTopEng(): ?string
    {
        return $this->textTopEng;
    }

    public function setTextTopEng(string $text): self
    {
        $this->textTopEng = $text;

        return $this;
    }

    public function getTextTopArm(): ?string
    {
        return $this->textTopArm;
    }

    public function setTextTopArm(string $text): self
    {
        $this->textTopArm = $text;

        return $this;
    }

    public function getTextBottomEng(): ?string
    {
        return $this->textBottomEng;
    }

    public function setTextBottomEng(string $text): self
    {
        $this->textBottomEng = $text;

        return $this;
    }

    public function getTextBottomArm(): ?string
    {
        return $this->textBottomArm;
    }

    public function setTextBottomArm(string $text): self
    {
        $this->textBottomArm = $text;

        return $this;
    }
}
