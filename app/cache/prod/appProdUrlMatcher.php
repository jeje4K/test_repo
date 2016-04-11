<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // form_homepage
        if ($pathinfo === '/homepage') {
            return array (  '_controller' => 'FormBundle\\Controller\\DefaultController::indexAction',  '_route' => 'form_homepage',);
        }

        // symfony_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'symfony_homepage');
            }

            return array (  '_controller' => 'SymfonyBundle\\Controller\\DefaultController::indexAction',  '_route' => 'symfony_homepage',);
        }

        // all_entite
        if ($pathinfo === '/entiteAll') {
            return array (  '_controller' => 'SymfonyBundle\\Controller\\ArrayController::crrreateAction',  '_route' => 'all_entite',);
        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        if (0 === strpos($pathinfo, '/entite')) {
            // entite
            if ($pathinfo === '/entite') {
                return array (  '_controller' => 'AppBundle\\Controller\\EntiteController::createAction',  '_route' => 'entite',);
            }

            // update_entite
            if (preg_match('#^/entite/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_entite')), array (  '_controller' => 'AppBundle\\Controller\\EntiteController::crreateAction',));
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
