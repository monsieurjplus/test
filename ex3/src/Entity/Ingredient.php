<?php

// src/Entity/Ingredient.php

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


    public getCode()
    {
        return $this->code;
    }

    public setName($name)
    {
        $this->name = $name;
    }

    public getName()
    {
        return $this->name;
    }

    public setGrpCode($grpCode)
    {
        $this->grpCode = $grpCode;
    }

    public getGrpCode()
    {
        return $this->grpCode;
    }

    public setSubGrpCode($subGrpCode)
    {
        $this->subGrpCode = $subGrpCode;
    }

    public getSubGrpCode()
    {
        return $this->subGrpCode;
    }
    
    public setSubSubGrpCode($subSubGrpCode)
    {
        $this->subSubGrpCode = $subSubGrpCode;
    }

    public getSubSubGrpCode()
    {
        return $this->subSubGrpCode;
    }

    public setGrpNameFr($grpNameFr)
    {
        $this->grpNameFr = $grpNameFr;
    }

    public getGrpNameFr()
    {
        return $this->grpNameFr;
    }

    public setSubGrpNameFr($subGrpNameFr)
    {
        $this->subGrpNameFr = $subGrpNameFr;
    }

    public getSubGrpNameFr()
    {
        return $this->subGrpNameFr;
    }

    public setSubSubGrpNameFr($subSubGrpNameFr)
    {
        $this->subSubGrpNameFr = $subSubGrpNameFr;
    }

    public getSubSubGrpNameFr()
    {
        return $this->subSubGrpNameFr;
    }

    public setEnergyUe($energyUe)
    {
        $this->energyUe = $energyUe;
    }

    public getEnergyUe()
    {
        return $this->energyUe;
    }

    public setEnergyJonesKj($energyJonesKj)
    {
        $this->energyJonesKj = $energyJonesKj;
    }

    public getEnergyJonesKcal()
    {
        return $this->energyJonesKcal;
    }

    public setWater($water)
    {
        $this->water = $water;
    }

    public getWater()
    {
        return $this->water;
    }

    public setProteins($proteins)
    {
        $this->proteins = $proteins;
    }

    public getProteins()
    {
        return $this->proteins;
    }
}
