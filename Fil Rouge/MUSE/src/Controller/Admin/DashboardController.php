<?php

namespace App\Controller\Admin;

use App\Entity\Cart;
use App\Entity\User;
use App\Entity\Address;
use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Supplier;
use App\Entity\OrderDetails;
use App\Repository\UserRepository;
use Symfony\UX\Chartjs\Model\Chart;
use App\Repository\AddressRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\Component\Security\Core\Security as SecurityCore;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    private UserRepository $userRepository;
    private AddressRepository $addressRepository;
    private ChartBuilderInterface $chartBuilder;

    public function __construct(UserRepository $userRepository, AddressRepository $addressRepository, ChartBuilderInterface $chartBuilder)
    {
        $this->userRepository = $userRepository;
        $this->addressRepository = $addressRepository;
        $this->chartBuilder = $chartBuilder;
    }


    // #[IsGranted('ROLE_SHIP')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
         // return parent::index();

        if (!$this->IsGranted('ROLE_SHIP')) {
            $this->addFlash('error', 'Accès refusé');
            return $this->redirectToRoute('login');  
        }

        $users = $this->userRepository->findAll();

        $addresses = $this->addressRepository->findAll();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('dashboard/dashboard.html.twig', [
            'users' => $users,
            'addresses' => $addresses,
            'chart' => $this->createChart(),
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MUSE');
        
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-dashboard');
        yield MenuItem::linkToCrud('Users', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Addresses', 'fa fa-location-dot', Address::class);
        yield MenuItem::linkToCrud('Suppliers', 'fa fa-warehouse', Supplier::class);
        yield MenuItem::linkToCrud('Categories', 'fa fa-list-ul', Category::class);
        yield MenuItem::linkToCrud('Products', 'fa fa-guitar', Product::class);
        yield MenuItem::linkToCrud('Orders Details', 'fa fa-folder-tree', OrderDetails::class);
        yield MenuItem::linkToCrud('Carts', 'fa fa-cart-shopping', Cart::class);
        yield MenuItem::linkToUrl("Page d'accueil", 'fas fa-home', $this->generateUrl('app_home'));
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }


    public function configureActions(): Actions 
    {
        return parent::configureActions()
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
        
    }

    private function createChart(): Chart
    {
        $chart = $this->chartBuilder->createChart(Chart::TYPE_LINE);
        $chart->setData([
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [0, 10, 5, 2, 20, 30, 45],
                ],
            ],
        ]);
        $chart->setOptions([
            'scales' => [
                'y' => [
                   'suggestedMin' => 0,
                   'suggestedMax' => 100,
                ],
            ],
        ]);
        return $chart;
    }
}
