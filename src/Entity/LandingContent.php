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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $textTop;

    /**
     * @ORM\Column(type="text")
     */
    private $textBottom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTextTop()
    {
        return $this->textTop;
    }

    public function setTextTop(string $text): self
    {
        $this->textTop = $text;

        return $this;
    }

    public function getTextBottom(): ?string
    {
        return $this->textBottom;
    }

    public function setTextBottom(string $text): self
    {
        $this->textBottom = $text;

        return $this;
    }
}
