<?php

namespace App\Controller;

use App\Entity\Circle;
use App\Entity\Triangle;
use App\Services\GeoShapeCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 22.03.19.
 * Time: 15:55
 */
class MainController extends AbstractController
{
    private $serializer;

    /**
     * MainController constructor.
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @Route("/triangle/{a}/{b}/{c}", methods={"GET"})
     */
    public function triangleJson(float $a, float $b, float $c): JsonResponse
    {
        $triangle = new Triangle($a, $b, $c);

        if (!$triangle->validateShape()) {
            $errorMsg = $this->serializer->serialize(['error' => 'Given sides don\'t make a valid triangle'], 'json');

            return new JsonResponse($errorMsg, JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $triangle->calculateArea();
        $triangle->calculateCircumference();

        $data = $this->serializer->serialize($triangle, 'json');

        return new JsonResponse($data, JsonResponse::HTTP_OK, [], true);
    }

    /**
     * @Route("/circle/{radius}", methods={"GET"})
     */
    public function circleJson(float $radius): JsonResponse
    {
        $circle = new Circle($radius);

        if (!$circle->validateShape()) {
            $errorMsg = $this->serializer->serialize(['error' => 'Radius has to be greater than 0'], 'json');

            return new JsonResponse($errorMsg, JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $circle->calculateCircumference();
        $circle->calculateArea();
        $data = $this->serializer->serialize($circle, 'json');

        return new JsonResponse($data, JsonResponse::HTTP_OK, [], true);
    }

    /**
     * @Route("/services", methods={"GET"})
     */
    public function services(GeoShapeCalculator $calculator)
    {
        $triangle1 = new Triangle(4, 5, 6);
        $triangle1->calculateArea();
        $triangle1->calculateCircumference();

        $triangle2 = new Triangle(5, 6, 7);
        $triangle2->calculateArea();
        $triangle2->calculateCircumference();

        $circle = new Circle(5);
        $circle->calculateArea();
        $circle->calculateCircumference();

        $shapes = [$triangle1, $triangle2, $circle];

        $area = $calculator->areaSum($shapes);
        $circumference = $calculator->circumferenceSum($shapes);

        $data = $this->serializer->serialize(['area_sum' => $area, 'circumference_sum' => $circumference], 'json');

        return new JsonResponse($data, JsonResponse::HTTP_OK, [], true);
    }
}
