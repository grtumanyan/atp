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
     * @ORM\Column(type="text", nullable=true)
     */
    private $title;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

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
