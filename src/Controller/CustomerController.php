<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    /**
     * @Route("/customer", name="customer")
     */
    public function index()
    {
        return $this->render('customer/index.html.twig', [
            'controller_name' => 'CustomerController',
        ]);
    }

    /*
1. Vygenerujte controller `CustomerController`, který bude sloužit pro zobrazení detailu zákazníka
2. Do controlleru přidejte akci `detail`, která bude přejímat parametr `id` z URL (`/customer/detail/id`)
3. Pro akci `detail` vytvořte novou šablonu `detail.html.twig` - jako kopii šablony `templates/customer/index.html.twig`. Zároveň změňte použitou šablonu uvnitř metody `detail`
4. Do šablony `detail.html.twig` předejte proměnnou `id` (ID zákazníka z URL). V šabloně vypište ID v nadpisu - například pro URL `/customer/detail/35` se zobrazí nadpis ID zákazníka: 35
5. V šabloně `customer/index.html.twig` upravte nadpis na Výpis zákazníků
6. Do šablony `detail.html.twig` přidejte pod nadpis odkaz vedoucí na výpis zákazníků (na URL `/customer`)
7. Do metody (akce) `detail` přidejte kontrolu, že je ID celé číslo (můžete využít PHP funkci `ctype_digit()`). Vytvořte novou šablonu (např. `chyba.html.twig`) obsahující nadpis Zadali jste neplatné ID.
    1. Pokud ID není celé číslo, pomocí metoda `render` vykreslí chybovou šablonu
    2. Pokud je ID celé číslo, chvání se nemění - použije se šablona `detail.html.twig`
8. Do šablony `customer/index.html.twig` přidejte dva odkazy:
    1. První na detail zákazníka s ID `35`
    2. Druhý na detail zákazníka s id `xyz`
     */

    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function detail($id)
    {
        if (ctype_digit($id)){
            return $this->render('customer/detail.html.twig', [
                'controller_name' => $id,
            ]);
        }
            return $this->render('customer/chyba.html.twig', [
            'controller_name' => $id,
            ]);
    }

}
