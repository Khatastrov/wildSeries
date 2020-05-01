<?php
// src/Controller/WildController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class WildController
 * @package App\Controller
 *
 * @Route ("/wild", name="wild_")
 */
class WildController extends AbstractController
{
    /**
     * @Route ("/", name="index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('wild/index.html.twig', [
            'website' => 'Wild Séries',
        ]);
    }

    /**
     * @Route ("/show/{slug<([a-z0-9\-]*)>}", name="show")
     * @param $slug
     * @return Response
     */
    public function show($slug): Response
    {
        if (!$slug) {
            return $this->render('wild/show.html.twig', [
                'slug' => "Aucune série sélectionnée, veuillez choisir une série."
            ]);
        }

        $slug = ucwords(str_replace("-", " ", $slug));

        return $this->render('wild/show.html.twig', [
           'slug' => $slug
        ]);
    }
}