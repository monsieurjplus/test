<?php

// src/Controller/AppController.php
namespace App\Controller;

use App\Http\ApiRequest;
use App\Http\ApiResponse;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends Controller
{
    /**
     * @Route("/search", name="ingredients")
     */
    public function ingredientsSearch(Request $request)
    {
        $request = new ApiRequest($request);
        $search  = $request->getDataParam('search');
        if (empty($search)) {
            $response = new ApiResponse(400);

            return $response->getResponse();
        } 


/*
        $em           = $this->getDoctrine()->getManager();
        $categoryRepo = $this->getDoctrine()->getRepository(Category::class);

        $response = new ApiResponse();

*/
    }
}
