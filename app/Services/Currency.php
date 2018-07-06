<?php

namespace App\Services;

class Currency
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $shortName;

    /**
     * @var float
     */
    private $actualCourse;

    /**
     * @var \DateTime
     */
    private $actualCourseDate;

    /**
     * @var bool
     */
    private $isActive;

    /**
     * Currency constructor.
     * @param int $id
     * @param string $name
     * @param string $shortName
     * @param float $actualCourse
     * @param \DateTime $actualCourseDate
     * @param bool $isActive
     */
    public function __construct(int $id, string $name, string $shortName, float $actualCourse, \DateTime $actualCourseDate, bool $isActive)
    {
        $this->id = $id;
        $this->name = $name;
        $this->shortName = $shortName;
        $this->actualCourse = $actualCourse;
        $this->actualCourseDate = $actualCourseDate;
        $this->isActive = $isActive;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getShortName(): string
    {
        return $this->shortName;
    }

    /**
     * @return float
     */
    public function getActualCourse(): float
    {
        return $this->actualCourse;
    }

    /**
     * @return \DateTime
     */
    public function getActualCourseDate(): \DateTime
    {
        return $this->actualCourseDate;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function setActualCourse(float $course)
    {
        $this->actualCourse = $course;
    }

    public function setActualCourseDate(\DateTime $courseDate)
    {
        $this->actualCourseDate = $courseDate;
    }
}