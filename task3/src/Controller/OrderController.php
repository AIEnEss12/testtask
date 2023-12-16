<?php

namespace App\Controller;

use App\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use App\Entity\Order;

class OrderController extends AbstractController
{
    private OrderService $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    #[Route('/orders', name: 'app_order')]
    public function listOrders(Request $request, PaginatorInterface $paginator): Response
    {
        $page = $request->query->getInt('page', 1);
        $perPage = $request->query->getInt('perPage', 10);

        $listOrders = $this->service->getOrdersPaginated($page, $perPage);
        return $this->render('order/index.html.twig', [
            'orders' => $listOrders,
        ]);
    }
}
