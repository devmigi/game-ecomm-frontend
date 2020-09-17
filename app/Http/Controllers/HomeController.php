<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\PageRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $categoryRepository;
    private $pageRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository, PageRepositoryInterface $pageRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->pageRepository = $pageRepository;
    }


    public function show() {
        $categories = $this->categoryRepository->all();

        $pageName = "website_home";
        $page = $this->pageRepository->getSectionWithItems($pageName);

        return view('pages.home', ['categories' => $categories, 'sections' => $page->sections]);
    }


}
