<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ProductController extends Controller
{
    /**
     * @Route("/createproduct")
     */
    public function createAction(Request $request) {

        $product = new Product();
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $product);

        $form = $this->createFormBuilder($product)
            ->add('name', TextType::class)
            ->add('category_id', TextType::class)
            ->add('description', TextareaType::class)
            ->add('price', TextType::class)
            ->add('save', SubmitType::class)
            ->getForm();



        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $product = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirect('/view-product/' . $product->getId());

        }

        return $this->render(
            'product/edit.html.twig',
            array('form' => $form->createView())
        );

    }

    /**
     * @Route("/view-product/{id}")
     */
    public function viewAction($id) {

        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'Error 404'
            );
        }

        return $this->render(
            'Product/view.html.twig',
            array('product' => $product)
        );

    }



}
