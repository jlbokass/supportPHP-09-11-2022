<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    /**
     * List all the user
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index(): string
    {
        $userManager = new UserManager();
        $users = $userManager->selectAll();
        return $this->twig->render("User/index.html.twig", [
            'users' => $users,
        ]);
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $user = array_map('trim', $_POST);
            $userManager = new UserManager();
            $userManager->insert($user);

            header('Location:/users');
            return null;
        }
       return $this->twig->render("User/add.html.twig");
    }
}
