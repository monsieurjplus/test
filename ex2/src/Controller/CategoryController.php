<?php

// src/Controller/CategoryController.php
namespace App\Controller;

use App\Entity\Category;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends Controller
{
    /**
     * @Route("/", name="category_list")
     */
    public function categoryList(Request $request)
    {
        $em           = $this->getDoctrine()->getManager();
        $categoryRepo = $this->getDoctrine()->getRepository(Category::class);

        $categories = $categoryRepo->childrenHierarchy(
                null,
                false,
                array(
                    'decorate' => true,
                    'representationField' => 'slug',
                    'html'                => true
                )
            );


        $category = new Category();
        $form     = $this->createFormBuilder($category)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'create new root category'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();

            $em->persist($category);
            $em->flush();
        }

        return $this->render(
            'category/list.html.twig', 
            array(
                'categories' => $categories,
                'form'       => $form->createView()
            )
        );
    }
}
