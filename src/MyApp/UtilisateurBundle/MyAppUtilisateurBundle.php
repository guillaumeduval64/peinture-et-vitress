<?php

namespace MyApp\UtilisateurBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MyAppUtilisateurBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
