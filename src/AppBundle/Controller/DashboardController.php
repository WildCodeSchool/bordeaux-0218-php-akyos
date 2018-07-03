<?php
/**
 * Created by PhpStorm.
 * User: Aurélien <aurelien@wildcodeschool.fr>
 * Date: 03/07/18
 * Time: 10:15
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DashboardController extends Controller
{
    /**
     * @Route("/", name="dashboard")
     */
    public function indexAction(Request $request)
    {
    return $this->render('dashboard/index.html.twig');
    }
}