<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\OrderPizza;
use App\Entity\Pizza;
use App\Repository\CategoryRepository;
use App\Repository\OrderPizzaRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render('Pizza/categories.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/category/{id}", name="app_category")
     */
    public function menu(Category $category): Response
    {
        return $this->render('Pizza/category.html.twig', [
            "pizzas" => $category->getPizzas()
        ]);
    }

    /**
     * @Route("/contact", name="app_contact")
     */
    public function contact(): Response
    {
        return $this->render('Pizza/contact.html.twig', [
        ]);

    }

    /**
     * @Route("/order/{id}", name="app_order")
     */
    public function order(Request $request, Pizza $pizza, OrderPizzaRepository $orderPizzaRepository)
    {
        $order = new OrderPizza();
        $order->setPizza($pizza);
        $order->setStatus("ordered");

        $form = $this->createFormBuilder($order)
            ->add('fname')
            ->add('sname')
            ->add('adress')
            ->add('city')
            ->add('zipcode')
            ->add('size')
            ->add('submit', SubmitType::class, ['label' => 'OrderPizza Pizza'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $order = $form->getData();
                $orderPizzaRepository->add($order);

                $this->addFlash("success", "Bestelling is doorgegeven!");
//                return $this->redirectToRoute('task_success');
//                return $this->renderForm('Pizza/task_succes.html.twig');

            }

            return $this->renderForm('Pizza/order.html.twig', [
                'form' => $form,
            ]);

    }

    /**
     * @Route("/order/success", name="task_success")
     */
    public function success()
    {
    }

}

