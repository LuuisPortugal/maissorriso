<?php namespace App\Http\ViewComposers;

use App\MenuLayout;
use function foo\func;
use Illuminate\Contracts\View\View;

class MenuLayoutComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */

    public function compose($view)
    {
        $oMenus = MenuLayout::whereNull('parent_id')
            ->with('children')
            ->get()
            ->each(function ($oMenu)
            {
                $this->mMakeRoute($oMenu);
                $oMenu->children->each(function($oChild) use ($oMenu)
                {
                    $this->mMakeRoute($oChild, $oMenu);
                });
            });

        $view->with('oMenus', $oMenus);
    }

    public function mMakeRoute(&$oMenu, &$oParent = null)
    {
        $oMenu->link = route($oMenu->name);
        $oMenu->active = request()->route()->getName() === $oMenu->name;

        /** Ativo o Pai caso haja e o filho seja ativo  */
        if($oParent !== null) $oParent->active =  $oMenu->active;
    }
}
