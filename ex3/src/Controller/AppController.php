<?php

// src/Controller/AppController.php
namespace App\Controller;

use App\Entity\Ingredient;
use App\Http\ApiRequest;
use App\Http\ApiResponse;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends Controller
{
    /**
     * @Route("/search", name="ingredients_search")
     */
    public function ingredientsSearch(Request $request)
    {
        $request = new ApiRequest($request);
        $search  = $request->getDataParam('search');
        if (empty($search)) {
            $response = new ApiResponse(400);

            return $response->getResponse();
        } 

        $ingredients = $this->getDoctrine()
            ->getRepository(Ingredient::class)
            ->findAllNameOfGroupNameMatch($search);

        $response = new ApiResponse(200, array('ingredients' => $ingredients));

        return $response->getResponse();
    }

    /**
     * @Route("/ingredient/{id}", name="ingredient_get")
     */
    public function ingredientGet($id)
    {
        $ingredient = $this->getDoctrine()
            ->getRepository(Ingredient::class)
            ->findOneBy(array('code' => $id));
        if (!$ingredient) {
            $response = new ApiResponse(404);

            return $response->getResponse();
        }

        $response = new ApiResponse(
            200, 
            array(
                'code'              => $ingredient->getCode(),
                'name'              => $ingredient->getName(),
                'grpCode'           => $ingredient->getGrpCode(),
                'subGrpCode'        => $ingredient->getSubGrpCode(),
                'subSubGrpCode'     => $ingredient->getSubSubGrpCode(),
                'grpNameFr'         => $ingredient->getGrpNameFr(),
                'subGrpNameFr'      => $ingredient->getSubGrpNameFr(),
                'subSubGrpNameFr'   => $ingredient->getSubSubGrpNameFr(),
                'energy_ue'         => $ingredient->getEnergyUe(),
                'energy_jones_kj'   => $ingredient->getEnergyJonesKj(),
                'energy_jones_kcal' => $ingredient->getEnergyJonesKcal(),
                'water'             => $ingredient->getWater(),
                'proteins'          => $ingredient->getProteins()
            )
        );

        return $response->getResponse();
    }
}
