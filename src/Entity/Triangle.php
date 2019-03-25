<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 22.03.19.
 * Time: 14:57
 */

namespace App\Entity;

class Triangle extends Shape
{
    private $a;
    private $b;
    private $c;

    /**
     * Triangle constructor.
     *
     * @param $a
     * @param $b
     * @param $c
     */
    public function __construct($a, $b, $c)
    {
        $this->type = 'triangle';
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    //Getters and setters

    /**
     * @return mixed
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * @param mixed $a
     *
     * @return Triangle
     */
    public function setA($a)
    {
        $this->a = $a;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * @param mixed $b
     *
     * @return Triangle
     */
    public function setB($b)
    {
        $this->b = $b;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getC()
    {
        return $this->c;
    }

    /**
     * @param mixed $c
     *
     * @return Triangle
     */
    public function setC($c)
    {
        $this->c = $c;

        return $this;
    }

    public function validateShape()
    {
        $a = $this->a;
        $b = $this->b;
        $c = $this->c;

        return $a + $b > $c && $a + $c > $b && $b + $c > $a;
    }

    public function calculateCircumference(): void
    {
        $this->circumference = round($this->a + $this->b + $this->c, 2);
    }

    public function calculateArea(): void
    {
        $s = ($this->a + $this->b + $this->c) / 2;
        $this->area = round(sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c)), 2);
    }
}
