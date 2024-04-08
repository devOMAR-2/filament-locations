<?php

namespace TomatoPHP\FilamentLocations;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\View\View;

class FilamentLocationsPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-locations';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([

            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return new static();
    }


    /**
     * Returns a View object that renders the language switcher component.
     *
     * @return \Illuminate\Contracts\View\View The View object that renders the language switcher component.
     */
    private function getLanguageSwitcherView(): View
    {
        $locales = config('filament-translations.locals');
        $currentLocale = app()->getLocale();
        $currentLanguage = collect($locales)->firstWhere('code', $currentLocale);
        $otherLanguages = $locales;
        $showFlags = config('filament-translations.show_flags');

        return view('filament-translations::language-switcher', compact(
            'otherLanguages',
            'currentLanguage',
            'showFlags',
        ));
    }
}
