<?php

namespace App\Controller;

use App\Repository\ProgrammingLanguageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{

    /**
     * @Route("/test/known", name="known")
     */
    public function known(ProgrammingLanguageRepository $repository)
    {
        return $this->render('test/known.html.twig', [
            "languages" => $repository ->findKnown(),
        ]);
    }

    /**
     * @Route("/test/list", name="list")
     */
    public function list(ProgrammingLanguageRepository $languageRepository)
    {
        return $this->render('test/list.html.twig', [
            "languages" => $languageRepository ->findAll(),
        ]);
    }

    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

/*
1. V controlleru vytvořte další akci "detail".
    1. Akce detail bude dostupná na adrese /test/detail !POZOR NA POŘADÍ AKCÍ!
2. V rámci akce detail vypiště šablonu test/detail.html.twig (šablonu vytvořte kopií šablony test/index.html.twig)
3. Do šablony předejte array, do kterého vložíte následující klíče:
    1. username: andrejmaly
    2. password: velicesložitéheslo
    3. name: Andrej Malý
    4. age: 20
4. V šabloně vypiště všechny údaje uživatele v tabulce
*/

    /**
     * @Route("/test/detail", name="detail_t")
     */
    public function detail()
    {
        return $this->render('test/detail.html.twig', [
            "username" => "andrejmaly",
            "password" => "velicesloziteheslo",
            "name" => "Andrej Malý",
            "age" => 20,
        ]);
    }

    /*
1. V controlleru vytvořte další akci `hello`, která:
    1. bude mít v route parametr `name`
    2. bude dostupná na adrese `/test/<pozdrav>`
    3. zobrazí tutéž stránku jako akce `index`,
       ale do parametru `controller``_``name` vloží pozdrav z url
    */

    /**
     * @Route("/test/{name}", name="hello")
     */
    public function hello($name)
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => $name,
        ]);
    }
}
