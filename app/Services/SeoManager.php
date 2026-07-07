<?php

namespace App\Services;

class SeoManager
{
    protected string $title = '';
    protected string $description = '';
    protected string $keywords = '';
    protected string $robots = 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1';
    protected string $canonical = '';
    protected string $ogType = 'website';
    protected string $ogUrl = '';
    protected string $ogTitle = '';
    protected string $ogDescription = '';
    protected string $ogImage = '';
    protected string $ogImageAlt = 'FairIT Solutions — AI Operating Systems';

    public function __construct()
    {
        // Default values
        $this->title = __('seo.home.title');
        $this->description = __('seo.home.description');
        $this->keywords = 'AI consulting, AI transformation, custom AI operating systems, AI copilots, voice AI, enterprise AI, AI consulting India, AI consulting Europe';
        $this->canonical = $this->buildCanonical();
        $this->ogUrl = url()->current();
        $this->ogTitle = $this->title;
        $this->ogDescription = $this->description;
        $this->ogImage = asset('images/og-image.png');
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        $this->ogTitle = $title;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        $this->ogDescription = $description;
        return $this;
    }

    public function setOgTitle(string $title): self
    {
        $this->ogTitle = $title;
        return $this;
    }

    public function setOgDescription(string $description): self
    {
        $this->ogDescription = $description;
        return $this;
    }

    public function setKeywords(string $keywords): self
    {
        $this->keywords = $keywords;
        return $this;
    }

    public function setRobots(string $robots): self
    {
        $this->robots = $robots;
        return $this;
    }

    public function setOgType(string $type): self
    {
        $this->ogType = $type;
        return $this;
    }

    public function setOgImage(string $url, string $alt = ''): self
    {
        $this->ogImage = $url;
        if ($alt) {
            $this->ogImageAlt = $alt;
        }
        return $this;
    }

    protected function buildCanonical(): string
    {
        $params = [];
        if (request()->has('page')) {
            $params['page'] = request()->query('page');
        }
        if (app()->getLocale() !== 'en') {
            $params['lang'] = app()->getLocale();
        }
        return count($params) > 0
            ? url()->current() . '?' . http_build_query($params)
            : url()->current();
    }

    public function getHreflangs(): array
    {
        $locales = ['en', 'de', 'fr', 'es', 'ar'];
        $links = [];
        foreach ($locales as $locale) {
            $query = $locale === 'en' ? ['lang' => null] : ['lang' => $locale];
            $links[$locale] = request()->fullUrlWithQuery($query);
        }
        $links['x-default'] = request()->fullUrlWithQuery(['lang' => null]);
        return $links;
    }

    public function getOgLocales(): array
    {
        $map = ['en' => 'en_GB', 'de' => 'de_DE', 'fr' => 'fr_FR', 'es' => 'es_ES', 'ar' => 'ar_AR'];
        $current = app()->getLocale();
        $primary = $map[$current] ?? 'en_GB';
        
        $alternates = [];
        foreach ($map as $code => $ogLocale) {
            if ($code !== $current) {
                $alternates[] = $ogLocale;
            }
        }
        
        return [
            'primary' => $primary,
            'alternates' => $alternates,
        ];
    }

    public function render(): string
    {
        return view('partials.seo', [
            'title' => $this->title,
            'description' => $this->description,
            'keywords' => $this->keywords,
            'robots' => $this->robots,
            'canonical' => $this->canonical,
            'ogType' => $this->ogType,
            'ogUrl' => $this->ogUrl,
            'ogTitle' => $this->ogTitle,
            'ogDescription' => $this->ogDescription,
            'ogImage' => $this->ogImage,
            'ogImageAlt' => $this->ogImageAlt,
            'hreflangs' => $this->getHreflangs(),
            'ogLocales' => $this->getOgLocales(),
        ])->render();
    }
}
