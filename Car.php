<?php


abstract class Car
{
    protected $name;
    protected $color;
    protected $maxSpeed;
    protected $year;

    public function __construct(string $nm, string $cl, int $ms, int $yr)
    {
        $this->name = $nm;
        $this->color = $cl;
        $this->maxSpeed = $ms;
        $this->year = $yr;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getFullName(): string
    {
        return $this->name;
    }

    abstract public function getModel(): string;
}
