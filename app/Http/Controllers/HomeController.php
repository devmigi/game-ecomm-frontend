<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function show() {
        $pageName = "website_home";

        $page = Page::where('name', $pageName)->with('sections.items.image')->first();

        $sections = $page->sections;

        $categories = $this->categoryRepository->all();


        return view('pages.home', ['categories' => $categories, 'sections' => $sections]);
    }


}
