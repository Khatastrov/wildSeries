<?php
// src/Controller/WildController.php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Program;
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
     * show all rows from program's entity
     *
     * @Route ("/", name="index")
     * @return Response
     */
    public function index(): Response
    {
        $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findAll();

        if (!$programs) {
            throw $this->createNotFoundException(
                "No programs found in program's table."
            );
        }
        return $this->render('wild/index.html.twig', [
            'website' => 'Wild Séries',
            'programs' => $programs,
        ]);
    }

    /**
     * Get a program with its title as formatted slug
     *
     * @Route ("/show/{slug<^[a-z0-9-]*$>}", name="show")
     * @param null|string $slug
     * @return Response
     */
    public function show(?string $slug): Response
    {
        if (!$slug) {
            throw $this->createNotFoundException(
                "No slug has been sent to find a program in program's table."
            );
        }

        $slug = preg_replace(
            '/-/',
            ' ', ucwords(trim(strip_tags($slug)), "-")
        );

        $program = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findOneBy(['title' => mb_strtolower($slug)]);
        if (!$program) {
            throw $this->createNotFoundException(
              "No program with {$slug} title found in program's table."
            );
        }

        return $this->render('wild/show.html.twig', [
           'slug' => $slug,
           'program' => $program,
        ]);
    }

    /**
     * Get last 3 programs for a selected category
     *
     * @Route("/category/{categoryName}", name="show_category")
     * @param string|null  $categoryName
     * @return Response
     */
    public function showByCategory(?string $categoryName): Response
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findOneBy(['name' => $categoryName]);

        if (!$category) {
            throw $this->createNotFoundException(
                "There is no category found for '{$categoryName}' in Categories' table."
            );
        }

        $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findBy(
                ['category' => $category],
                ['id' => 'DESC'],
                3
            );

        if (!$programs) {
            throw $this->createNotFoundException(
                "No programs found for this category : {$category->getName()}."
            );
        }

        return $this->render('wild/category.html.twig', [
            'category' => $category,
            'programs' => $programs,
        ]);

    }
}