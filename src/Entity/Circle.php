<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 22.03.19.
 * Time: 14:57
 */

namespace App\Entity;

class Circle extends Shape
{
    private $radius;

    /**
     * Circle constructor.
     *
     * @param $radius
     */
    public function __construct($radius)
    {
        $this->type = 'circle';
        $this->radius = $radius;
    }

    //Getters and setters

    /**
     * @return mixed
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * @param mixed $radius
     *
     * @return Circle
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;

        return $this;
    }

    public function calculateCircumference(): void
    {
        $this->circumference = round(2 * $this->radius * pi(), 2);
    }

    public function calculateArea(): void
    {
        $this->area = round(pow($this->radius, 2) * pi(), 2);
    }

    public function validateShape()
    {
        return $this->radius > 0;
    }
}
