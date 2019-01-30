<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LessonsContentRepository")
 */
class LessonsContent
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
}
