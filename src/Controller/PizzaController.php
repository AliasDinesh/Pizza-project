<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(): Response {
        $categories = [
            'Vlees',
            'Vegetarisch',
            'Vis'
        ];
        return $this->render('Pizza/categories.html.twig', [
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/categories/{cat}")
     */

    public function category($cat): Response {
        $pizza = [
            'Vlees' => ['pizza pepperoni'],
            'Vegetarisch' => ['pizza mozzarella'],
            'Vis' => ['pizza tonno']
        ];
        return $this->render('Pizza/category.html.twig', [
            'cat' => $cat,
            'pizza' => $pizza[$cat]
        ]);
    }
}
