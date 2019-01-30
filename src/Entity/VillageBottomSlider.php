<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VillageBottomSliderRepository")
 */
class VillageBottomSlider
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
     * @ORM\Column(type="text")
     */
    private $position;

    public function __toString() {
        return $this->titleEng;
    }

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

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }
}
