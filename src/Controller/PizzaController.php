<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(CategoryRepository $categoryRepository): Response {
        $categories = $categoryRepository->findAll();

        return $this->render('Pizza/categories.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/category/{id}")
     */
    public function category(Category $category): Response {
        return $this->render('Pizza/category.html.twig', [
            'pizzas' => $category->getPizzas()
        ]);
    }

}
