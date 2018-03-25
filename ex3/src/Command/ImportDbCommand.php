<?php

// src/Command/ImportDbCommand.php
namespace App\Command;

use App\Entity\Ingredient;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportDbCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:import-db')
            ->setDescription('Import DB from web DB');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        // prefer to set link in parameters.yml
        //$csv   = file_get_contents('http://37.59.49.225/db.csv');
        $csv   = file_get_contents('install/ingredients.csv');
        $lines = explode(PHP_EOL, $csv);
        $count = 0;
        foreach ($lines as $line) {
            if ($count++ === 0) {
                continue;
            }
            if (empty($line)) {
                continue;
            }

            $ingredientData = str_getcsv($line);

            // best practice would be to use a service to do this part of job
            $ingredient = new Ingredient();
            $ingredient->setCode($ingredientData[6]);
            $ingredient->setName($ingredientData[7]);
            $ingredient->setGrpCode($ingredientData[0]);
            $ingredient->setSubGrpCode($ingredientData[1]);
            $ingredient->setSubSubGrpCode($ingredientData[2]);
            $ingredient->setGrpNameFr($ingredientData[3]);
            $ingredient->setSubGrpNameFr($ingredientData[4]);

            if ($ingredientData[5] === '-') {
                $ingredient->setSubSubGrpNameFr(null);
            } else {
                $ingredient->setSubSubGrpNameFr($ingredientData[5]);
            }
            
            if ($ingredientData[9] === '-') {
                $ingredient->setEnergyUe(null);
            } else {
                $ingredient->setEnergyUe($ingredientData[9]);
            }

            if ($ingredientData[10] === '-') {
                $ingredient->setEnergyJonesKj(null);
            } else {
                $ingredient->setEnergyJonesKj($ingredientData[10]);
            }

            if ($ingredientData[11] === '-') {
                $ingredient->setEnergyJonesKcal(null);
            } else {
                $ingredient->setEnergyJonesKcal($ingredientData[11]);
            }

            if ($ingredientData[12] === '-') {
                $ingredient->setWater(null);
            } else {
                $ingredient->setWater($ingredientData[12]);
            }

            if ($ingredientData[13] === '-') {
                $ingredient->setProteins(null);
            } else {
                $ingredient->setProteins($ingredientData[13]);
            }

            // let's assume we just insert data once. To handle updates, we should check diff to delete old entries and update existing entries
            $em->persist($ingredient);
        }

        $em->flush();
    }
}
