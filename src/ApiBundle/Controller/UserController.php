<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class UserController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/user")
     * @Rest\View(serializerGroups={"mini"})
     */
    public function selfAction()
    {
        return ['user' => $this->getUser()];
    }
}
