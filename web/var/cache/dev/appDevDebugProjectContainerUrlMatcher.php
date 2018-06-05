<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not__profiler_home;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', '_profiler_home'));
                    }

                    return $ret;
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler_open_file
                if ('/_profiler/open' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        elseif (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/artikel')) {
                // artikeltoevoegen
                if ('/artikel/nieuw' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\ArtikelController::nieuwArtikel',  '_route' => 'artikeltoevoegen',);
                }

                // artikelwijzigen
                if (0 === strpos($pathinfo, '/artikel/wijzig') && preg_match('#^/artikel/wijzig/(?P<artikelnummer>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'artikelwijzigen')), array (  '_controller' => 'AppBundle\\Controller\\ArtikelController::wijzigArtikel',));
                }

                // artikelverwijderen
                if (0 === strpos($pathinfo, '/artikel/verwijder') && preg_match('#^/artikel/verwijder/(?P<artikelnummer>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'artikelverwijderen')), array (  '_controller' => 'AppBundle\\Controller\\ArtikelController::verwijderArtikel',));
                }

                // artikelbestand
                if ('/artikelbestand' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\ArtikelController::alleArtikelen',  '_route' => 'artikelbestand',);
                }

                // artikelzoeken
                if ('/artikelzoeken' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\ArtikelController::artikelzoeken',  '_route' => 'artikelzoeken',);
                }

            }

            // allebestellingen
            if ('/allebestellingen' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\BestelController::alleBestellingen',  '_route' => 'allebestellingen',);
            }

            // app_default_admin
            if ('/admin' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::adminAction',  '_route' => 'app_default_admin',);
            }

        }

        elseif (0 === strpos($pathinfo, '/bestelling')) {
            // nieuwebestelling
            if ('/bestelling/nieuw' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\BestelController::nieuweBestelling',  '_route' => 'nieuwebestelling',);
            }

            // bestellingwijzigen
            if (0 === strpos($pathinfo, '/bestelling/wijzig') && preg_match('#^/bestelling/wijzig/(?P<bestelnummer>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'bestellingwijzigen')), array (  '_controller' => 'AppBundle\\Controller\\BestelController::wijzigBestelling',));
            }

            // bestellingverwijderen
            if (0 === strpos($pathinfo, '/bestelling/verwijder') && preg_match('#^/bestelling/verwijder/(?P<bestelnummer>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'bestellingverwijderen')), array (  '_controller' => 'AppBundle\\Controller\\BestelController::verwijderBestelling',));
            }

            // bestellingbekijken
            if (0 === strpos($pathinfo, '/bestelling/bekijk') && preg_match('#^/bestelling/bekijk/(?P<bestelnummer>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'bestellingbekijken')), array (  '_controller' => 'AppBundle\\Controller\\BestelController::bekijkBestelregels',));
            }

        }

        // nieuwebestelregel
        if ('/bestelregel/nieuw' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\BestelController::nieuweBestelregel',  '_route' => 'nieuwebestelregel',);
        }

        // homepage
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'homepage'));
            }

            return $ret;
        }
        not_homepage:

        if (0 === strpos($pathinfo, '/ontvangengoederen')) {
            // ontvangengoederennieuw
            if ('/ontvangengoederen/nieuw' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\GoederenController::nieuweOntvangenGoederen',  '_route' => 'ontvangengoederennieuw',);
            }

            // goederenwijzigen
            if (0 === strpos($pathinfo, '/ontvangengoederen/wijzig') && preg_match('#^/ontvangengoederen/wijzig/(?P<ontvangstnummer>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'goederenwijzigen')), array (  '_controller' => 'AppBundle\\Controller\\GoederenController::wijzigOntvangenGoederen',));
            }

            // goederenverwijdering
            if (0 === strpos($pathinfo, '/ontvangengoederen/verwijder') && preg_match('#^/ontvangengoederen/verwijder/(?P<ontvangstnummer>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'goederenverwijdering')), array (  '_controller' => 'AppBundle\\Controller\\GoederenController::verwijderOntvangenGoederen',));
            }

            // alleGoederen
            if ('/ontvangengoederen/alle' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\GoederenController::alleGoederen',  '_route' => 'alleGoederen',);
            }

        }

        // nietOntvangenGoederen
        if ('/nietontvangengoederen/alle' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\GoederenController::nietOntvangenGoederen',  '_route' => 'nietOntvangenGoederen',);
        }

        // user_registration
        if ('/register' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'user_registration',);
        }

        if (0 === strpos($pathinfo, '/login')) {
            // login
            if ('/login' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
            }

            // loginpaginaa
            if ('/loginn' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\loginController::loginAction',  '_route' => 'loginpaginaa',);
            }

        }

        // logout
        if ('/logout' === $pathinfo) {
            return array('_route' => 'logout');
        }

        // homepagina
        if ('/home' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\homeController::indexAction',  '_route' => 'homepagina',);
        }

        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
