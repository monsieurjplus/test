<?php

// src/Entity/Ingredient.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="ingredients")
 * @ORM\Entity(repositoryClass="App\Repository\IngredientRepository")
 */
class Ingredient
{
    /**
     * @ORM\Column(name="code", type="integer")
     * @ORM\Id
     */
    private $code;

    /**
     * @ORM\Column(name="name", type="string", length=150)
     */
    private $name;

    /**
     * @ORM\Column(name="grp_code", type="string", length=2)
     */
    private $grpCode;

    /**
     * @ORM\Column(name="ssgrp_code", type="string", length=4)
     */
    private $subGrpCode;

    /**
     * @ORM\Column(name="ssssgrp_code", type="string", length=6)
     */
    private $subSubGrpCode = '000000';

    /**
     * @ORM\Column(name="grp_name_fr", type="string", length=255)
     */
    private $grpNameFr;

    /**
     * @ORM\Column(name="ssgrp_name_fr", type="string", length=255)
     */
    private $subGrpNameFr;

    /**
     * @ORM\Column(name="ssssgrp_name_fr", type="string", length=255, nullable=true)
     */
    private $subSubGrpNameFr = null;

    /**
     * @ORM\Column(name="energy_ue_1169_2011", type="float", nullable=true)
     */
    private $energyUe = null;

    /**
     * @ORM\Column(name="energy_jones_kj", type="float", nullable=true)
     */
    private $energyJonesKj = null;

    /**
     * @ORM\Column(name="energy_jones_kcal", type="float", nullable=true)
     */
    private $energyJonesKcal = null;

    /**
     * @ORM\Column(name="water", type="float", nullable=true)
     */
    private $water = null;

    /**
     * @ORM\Column(name="proteins", type="float", nullable=true)
     */
    private $proteins = null;


    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setGrpCode($grpCode)
    {
        $this->grpCode = $grpCode;
    }

    public function getGrpCode()
    {
        return $this->grpCode;
    }

    public function setSubGrpCode($subGrpCode)
    {
        $this->subGrpCode = $subGrpCode;
    }

    public function getSubGrpCode()
    {
        return $this->subGrpCode;
    }
    
    public function setSubSubGrpCode($subSubGrpCode)
    {
        $this->subSubGrpCode = $subSubGrpCode;
    }

    public function getSubSubGrpCode()
    {
        return $this->subSubGrpCode;
    }

    public function setGrpNameFr($grpNameFr)
    {
        $this->grpNameFr = $grpNameFr;
    }

    public function getGrpNameFr()
    {
        return $this->grpNameFr;
    }

    public function setSubGrpNameFr($subGrpNameFr)
    {
        $this->subGrpNameFr = $subGrpNameFr;
    }

    public function getSubGrpNameFr()
    {
        return $this->subGrpNameFr;
    }

    public function setSubSubGrpNameFr($subSubGrpNameFr)
    {
        $this->subSubGrpNameFr = $subSubGrpNameFr;
    }

    public function getSubSubGrpNameFr()
    {
        return $this->subSubGrpNameFr;
    }

    public function setEnergyUe($energyUe)
    {
        $this->energyUe = $energyUe;
    }

    public function getEnergyUe()
    {
        return $this->energyUe;
    }

    public function setEnergyJonesKj($energyJonesKj)
    {
        $this->energyJonesKj = $energyJonesKj;
    }

    public function getEnergyJonesKj()
    {
        return $this->energyJonesKj;
    }

    public function setEnergyJonesKcal($energyJonesKcal)
    {
        $this->energyJonesKcal = $energyJonesKcal;
    }

    public function getEnergyJonesKcal()
    {
        return $this->energyJonesKcal;
    }

    public function setWater($water)
    {
        $this->water = $water;
    }

    public function getWater()
    {
        return $this->water;
    }

    public function setProteins($proteins)
    {
        $this->proteins = $proteins;
    }

    public function getProteins()
    {
        return $this->proteins;
    }
}
