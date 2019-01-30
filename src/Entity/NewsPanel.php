<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsPanelRepository")
 */
class NewsPanel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $news_id;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\News")
     * @ORM\JoinColumn(name="news_id", referencedColumnName="id", onDelete="cascade")
     */
    private $news;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNewsId(): ?int
    {
        return $this->news_id;
    }

    public function setNewsId(int $news_id): self
    {
        $this->news_id = $news_id;

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

    public function getNews()
    {
        return $this->news;
    }

    public function setNews($news)
    {
        $this->news = $news;

        return $this;
    }
}
