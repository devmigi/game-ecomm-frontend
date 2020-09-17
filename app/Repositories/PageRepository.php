<?php

namespace App\Repositories;

use App\Models\Page;
use App\Repositories\Interfaces\PageRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class PageRepository implements PageRepositoryInterface
{
    /**
     * Get PageSections with SectionItems
     * @param $id
     * @return mixed
     */
    public function getSectionWithItems($pageName){

        $pageData = Cache::rememberForever("page.{$pageName}.sections", function () use ($pageName) {
            $page = Page::where('name', $pageName)->with('sections.items.image')->first();

            foreach ($page->sections as $section){
                if($section->type == 'product_carousel'){
                    $section->load('items.product.category', 'items.image');
                }
            }

            return $page;
        });

        return $pageData;
    }
}