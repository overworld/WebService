<?php


namespace App\Controller;

use App\Repository\ProductCartRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\ProductCart;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;


class ProductCartController extends AbstractController
{

    /**
     * @var ObjectManager
     */
    private $objectManager;

    public function __construct(ProductCartRepository $repository, ObjectManager $objectManager)
    {
        $this->repository = $repository;
        $this->objectManager = $objectManager;
    }


    /**
     * @ROUTE("/cart/checkout/{id}")
     * @return Response
     */
    public function CartCheckOut(ProductCartRepository $productCartRepository, $id):Response
    {
        $productCart = $productCartRepository->setStatus($id);


        if (!$productCart) {
            throw $this->createNotFoundException(
                'Error 404'
            );
        }

        $productCartRepository->removeProduct($id);

        return $this->render(
            'cart/checkout.html.twig',
            array('productcart' => $productCart)
        );



    }


}