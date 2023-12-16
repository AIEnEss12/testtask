<?php
// src/Service/OrderService.php

namespace App\Service;

use App\Repository\OrderRepository;
use Knp\Component\Pager\PaginatorInterface;

class OrderService
{
    private OrderRepository $orderRepository;

    private PaginatorInterface $paginator;

    public function __construct(OrderRepository $orderRepository, PaginatorInterface $paginator)
    {
        $this->orderRepository = $orderRepository;
        $this->paginator = $paginator;
    }

    public function getOrdersPaginated(int $page = 1, int $limit = 10): \Knp\Component\Pager\Pagination\PaginationInterface
    {
        $queryBuilder = $this->orderRepository->getAllOrdersWithManagerNameQuery();

        return $this->paginator->paginate($queryBuilder, $page, $limit);
    }
}
