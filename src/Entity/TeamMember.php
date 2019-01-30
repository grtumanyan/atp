<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamMemberRepository")
 * @Vich\Uploadable
 */
class TeamMember
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
    private $branch_id;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     * @var string
     */
    private $image;

    /**
     * @ORM\Column(type="text")
     */
    private $nameArm;

    /**
     * @ORM\Column(type="text")
     */
    private $nameEng;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $positionArm;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $positionEng;

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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TeamBranches")
     * @ORM\JoinColumn(name="branch_id", referencedColumnName="id", onDelete="cascade")
     */
    private $branches;

    public function __construct()
    {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBranchId(): ?int
    {
        return $this->branch_id;
    }

    public function setBranchId(int $branch_id): self
    {
        $this->branch_id = $branch_id;

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

    public function getNameArm()
    {
        return $this->nameArm;
    }

    public function setNameArm($name)
    {
        $this->nameArm = $name;

        return $this;
    }

    public function getNameEng()
    {
        return $this->nameEng;
    }

    public function setNameEng($name)
    {
        $this->nameEng = $name;

        return $this;
    }

    public function getPositionArm()
    {
        return $this->positionArm;
    }

    public function setPositionArm($position)
    {
        $this->positionArm = $position;

        return $this;
    }

    public function getPositionEng()
    {
        return $this->positionEng;
    }

    public function setPositionEng($position)
    {
        $this->positionEng = $position;

        return $this;
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

    public function getBranches()
    {
        return $this->branches;
    }

    public function setBranches($branches)
    {
        $this->branches = $branches;

        return $this;
    }
}
