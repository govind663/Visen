<?php

namespace App\View\Components\Frontend;

use App\Models\Industry;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // ==== Fetch Industry
        $industry = Industry::orderBy("id","asc")->whereNull('deleted_at')->where('status', 1)->get([
            'industries_name',
            'industry_category',
            'id'
        ]);

        // === Convert industry_category to array decode
        $industry = $industry->map(function ($item) {
            $item->industry_category = json_decode($item->industry_category);
            return $item;
        });

        return view('components.frontend.footer', [
            'industry' => $industry
        ]);
    }
}
