<?php


namespace App\Controller;

use App\Entity\Product;
use Doctrine\Common\Collections\ArrayCollection;
use phpDocumentor\Reflection\Types\Array_;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{

    /**
     * @Route("/productCat")
     */
    public function productByCategorie(\ProductRepository $productRepository, \CategoryRepository $categoryRepository)
    {

        $allProductsBycat = $productRepository->findAll();
        $categories = $categoryRepository->findAll();

        return $this->render("Product/byCategory", [
            'products' => $allProductsBycat,
            'categories' => $categories,
        ]);

    }


}