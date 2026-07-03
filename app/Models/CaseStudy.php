<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CaseStudy extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'project_name',
        'summary',
        'challenge',
        'approach',
        'outcome',
        'seo_title',
        'seo_desc'
    ];

    protected $fillable = [
        'client_name',
        'project_name',
        'slug',
        'domain',
        'summary',
        'challenge',
        'approach',
        'outcome',
        'tech_keywords',
        'revenue_usd',
        'is_ongoing',
        'is_featured',
        'is_published',
        'order',
        'seo_title',
        'seo_desc',
    ];

    protected $casts = [
        'is_ongoing' => 'boolean',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'revenue_usd' => 'integer',
        'order' => 'integer',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function getDisplayClientNameAttribute(): string
    {
        return trim((string) $this->client_name) !== ''
            ? $this->client_name
            : 'Confidential Client';
    }

    public function getTechKeywordsArrayAttribute(): array
    {
        return $this->tech_keywords
            ? array_values(array_filter(array_map('trim', explode(',', $this->tech_keywords))))
            : [];
    }

    public function getThumbnailSvgAttribute(): string
    {
        $domain = trim($this->domain);
        $tech = strtolower($this->tech_keywords);
        $slugId = str_replace('-', '_', $this->slug);

        // Define color schemes: (from, to, text/accent, glow)
        // matching FairIT Solutions branding (using brand blues, emeralds, purples, cyans, coral)
        $colorScheme = [
            'Healthcare' => [
                'from' => '#0f766e', // deep teal
                'to' => '#1e3a8a',   // deep navy
                'accent' => '#38bdf8', // sky blue
                'glow' => '#0d9488',   // emerald/teal
            ],
            'FinTech' => [
                'from' => '#1e3a8a',
                'to' => '#0f172a',
                'accent' => '#60a5fa',
                'glow' => '#3b82f6',
            ],
            'Finance' => [
                'from' => '#1e3a8a',
                'to' => '#0f172a',
                'accent' => '#60a5fa',
                'glow' => '#3b82f6',
            ],
            'eGovernance' => [
                'from' => '#334155',
                'to' => '#0f172a',
                'accent' => '#cbd5e1',
                'glow' => '#475569',
            ],
            'Education' => [
                'from' => '#581c87',
                'to' => '#1e1b4b',
                'accent' => '#c084fc',
                'glow' => '#7c3aed',
            ],
            'Hospitality' => [
                'from' => '#7c2d12',
                'to' => '#18181b',
                'accent' => '#fdba74',
                'glow' => '#ea580c',
            ],
            'Logistics' => [
                'from' => '#1e293b',
                'to' => '#1e3a8a',
                'accent' => '#93c5fd',
                'glow' => '#2563eb',
            ],
            'Manufacturing' => [
                'from' => '#451a03',
                'to' => '#0f172a',
                'accent' => '#fdba74',
                'glow' => '#78350f',
            ],
            'Oil & Gas' => [
                'from' => '#451a03',
                'to' => '#0f172a',
                'accent' => '#fdba74',
                'glow' => '#78350f',
            ],
            'Media' => [
                'from' => '#701a75',
                'to' => '#1e1b4b',
                'accent' => '#f472b6',
                'glow' => '#d946ef',
            ],
            'Retail' => [
                'from' => '#083344',
                'to' => '#0f172a',
                'accent' => '#22d3ee',
                'glow' => '#06b6d4',
            ],
            'Analytics' => [
                'from' => '#172554',
                'to' => '#064e3b',
                'accent' => '#34d399',
                'glow' => '#10b981',
            ],
            'Human Resources' => [
                'from' => '#064e3b',
                'to' => '#0f172a',
                'accent' => '#a7f3d0',
                'glow' => '#059669',
            ],
            'Productivity' => [
                'from' => '#1e1b4b',
                'to' => '#311042',
                'accent' => '#818cf8',
                'glow' => '#4f46e5',
            ],
            'Sales Enablement' => [
                'from' => '#1e1b4b',
                'to' => '#311042',
                'accent' => '#f59e0b',
                'glow' => '#d97706',
            ],
        ];

        // Match scheme or use default
        $scheme = $colorScheme[$domain] ?? [
            'from' => '#1e3a8a',
            'to' => '#0d0f12',
            'accent' => '#60a5fa',
            'glow' => '#3b82f6',
        ];

        // Central Domain Icon
        $domainIcon = '';
        switch ($domain) {
            case 'Healthcare':
                if (str_contains($tech, 'communication') || str_contains($tech, 'telehealth') || str_contains($tech, 'telemedicine')) {
                    $domainIcon = '<path d="M110 112h35l15-35 15 70 15-55 15 35 15-15 30 0" stroke="'.$scheme['accent'].'" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>';
                } else {
                    $domainIcon = '<rect x="188" y="70" width="24" height="84" rx="4" fill="'.$scheme['accent'].'"/><rect x="158" y="100" width="84" height="24" rx="4" fill="'.$scheme['accent'].'"/>';
                }
                break;
            case 'FinTech':
            case 'Finance':
                if (str_contains($tech, 'p2p') || str_contains($tech, 'exchange') || str_contains($tech, 'transaction')) {
                    $domainIcon = '<path d="M150 100h80l-20-20M250 124h-80l20 20" stroke="'.$scheme['accent'].'" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>'.
                                  '<circle cx="200" cy="112" r="28" stroke="'.$scheme['accent'].'" stroke-width="4" fill="none"/>';
                } else {
                    $domainIcon = '<path d="M200 65c-30 0-45 12-45 12v45c0 30 18 52 45 60 27-8 45-30 45-60v-45s-15-12-45-12z" stroke="'.$scheme['accent'].'" stroke-width="5" fill="none" stroke-linejoin="round"/>'.
                                  '<path d="M200 85v40M194 92c4-4 12-4 13 0s-3 6-7 8-10 4-10 9 9 9 13 6" stroke="'.$scheme['accent'].'" stroke-width="4" stroke-linecap="round" fill="none"/>';
                }
                break;
            case 'eGovernance':
                $domainIcon = '<path d="M150 145v-25c0-25 20-40 50-40s50 15 50 40v25M140 145h120M200 80v-12" stroke="'.$scheme['accent'].'" stroke-width="5" stroke-linecap="round" fill="none"/>'.
                              '<rect x="170" y="115" width="16" height="30" rx="1" stroke="'.$scheme['accent'].'" stroke-width="3" fill="none"/>'.
                              '<rect x="214" y="115" width="16" height="30" rx="1" stroke="'.$scheme['accent'].'" stroke-width="3" fill="none"/>';
                break;
            case 'Education':
                $domainIcon = '<path d="M200 70l65 25-65 25-65-25 65-25z" fill="'.$scheme['accent'].'"/>'.
                              '<path d="M155 108v30c0 15 18 25 45 25s45-10 45-25v-30" stroke="'.$scheme['accent'].'" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="none"/>'.
                              '<path d="M242 98v35c0 4 4 8 4 8" stroke="'.$scheme['accent'].'" stroke-width="3" fill="none"/>';
                break;
            case 'Hospitality':
                $domainIcon = '<path d="M140 135h120M148 135v-30c0-4 4-8 8-8h8c4 0 8 4 8 8v30M160 108h16M238 135v-16c0-8-8-16-16-16h-32v32" stroke="'.$scheme['accent'].'" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="none"/>'.
                              '<circle cx="230" cy="85" r="10" fill="'.$scheme['accent'].'" opacity="0.6"/>';
                break;
            case 'Logistics':
                $domainIcon = '<path d="M200 65l50 25v50l-50 25-50-25v-50z" stroke="'.$scheme['accent'].'" stroke-width="4.5" stroke-linejoin="round" fill="none"/>'.
                              '<path d="M200 65v100M200 115l50-25M200 115l-50-25" stroke="'.$scheme['accent'].'" stroke-width="3.5" fill="none"/>';
                break;
            case 'Manufacturing':
            case 'Oil & Gas':
                $domainIcon = '<circle cx="185" cy="100" r="22" stroke="'.$scheme['accent'].'" stroke-width="4" fill="none"/>'.
                              '<circle cx="222" cy="130" r="16" stroke="'.$scheme['accent'].'" stroke-width="4" fill="none"/>'.
                              '<path d="M185 70v10M185 120v10M155 100h10M205 100h10M222 108v6M222 146v6M206 130h6M232 130h6" stroke="'.$scheme['accent'].'" stroke-width="5" stroke-linecap="round"/>';
                break;
            case 'Media':
                $domainIcon = '<rect x="150" y="80" width="100" height="75" rx="5" stroke="'.$scheme['accent'].'" stroke-width="4.5" fill="none"/>'.
                              '<path d="M150 105h100M150 80l100-15M170 100l8-20M200 96l8-20M230 92l8-20" stroke="'.$scheme['accent'].'" stroke-width="3.5" stroke-linecap="round"/>';
                break;
            case 'Retail':
                $domainIcon = '<path d="M140 80h16l20 52h52l16-40h-88" stroke="'.$scheme['accent'].'" stroke-width="4.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>'.
                              '<circle cx="178" cy="148" r="8" fill="'.$scheme['accent'].'"/>'.
                              '<circle cx="226" cy="148" r="8" fill="'.$scheme['accent'].'"/>';
                break;
            case 'Analytics':
                $domainIcon = '<rect x="150" y="110" width="14" height="30" rx="1.5" fill="'.$scheme['accent'].'"/>'.
                              '<rect x="175" y="85" width="14" height="55" rx="1.5" fill="'.$scheme['accent'].'"/>'.
                              '<rect x="200" y="100" width="14" height="40" rx="1.5" fill="'.$scheme['accent'].'"/>'.
                              '<rect x="225" y="70" width="14" height="70" rx="1.5" fill="'.$scheme['accent'].'"/>'.
                              '<path d="M140 140h110" stroke="'.$scheme['accent'].'" stroke-width="3.5" stroke-linecap="round"/>'.
                              '<path d="M142 85l35 15 30-22 35 30" stroke="'.$scheme['accent'].'" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"/>';
                break;
            case 'Human Resources':
                $domainIcon = '<circle cx="200" cy="92" r="14" stroke="'.$scheme['accent'].'" stroke-width="3.5" fill="none"/>'.
                              '<circle cx="168" cy="132" r="11" stroke="'.$scheme['accent'].'" stroke-width="3.5" fill="none"/>'.
                              '<circle cx="232" cy="132" r="11" stroke="'.$scheme['accent'].'" stroke-width="3.5" fill="none"/>'.
                              '<path d="M178 124l14-16M222 124l-14-16M179 132h42" stroke="'.$scheme['accent'].'" stroke-width="2.5" stroke-linecap="round"/>';
                break;
            case 'Productivity':
            case 'Sales Enablement':
                if (str_contains($tech, 'gamif') || str_contains($tech, 'quiz') || str_contains($tech, 'game')) {
                    $domainIcon = '<path d="M170 70h60v40c0 16-14 30-30 30s-30-14-30-30V70z" stroke="'.$scheme['accent'].'" stroke-width="4.5" fill="none" stroke-linejoin="round"/>'.
                                  '<path d="M200 140v18M180 158h40M170 80h-12c-5 0-8 4-8 8v12c0 5 3 8 8 8h12M230 80h12c5 0 8 4 8 8v12c0 5-3 8-8 8h-12" stroke="'.$scheme['accent'].'" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>';
                } else {
                    $domainIcon = '<rect x="155" y="70" width="90" height="85" rx="6" stroke="'.$scheme['accent'].'" stroke-width="4.5" fill="none"/>'.
                                  '<path d="M170 92l6 6 12-12M170 128l6 6 12-12" stroke="'.$scheme['accent'].'" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>'.
                                  '<line x1="198" y1="92" x2="228" y2="92" stroke="'.$scheme['accent'].'" stroke-width="3.5" stroke-linecap="round"/>'.
                                  '<line x1="198" y1="128" x2="228" y2="128" stroke="'.$scheme['accent'].'" stroke-width="3.5" stroke-linecap="round"/>';
                }
                break;
            default:
                $domainIcon = '<circle cx="200" cy="112" r="10" fill="'.$scheme['accent'].'"/>'.
                              '<circle cx="160" cy="80" r="7" fill="'.$scheme['accent'].'"/>'.
                              '<circle cx="240" cy="80" r="7" fill="'.$scheme['accent'].'"/>'.
                              '<circle cx="160" cy="144" r="7" fill="'.$scheme['accent'].'"/>'.
                              '<circle cx="240" cy="144" r="7" fill="'.$scheme['accent'].'"/>'.
                              '<path d="M200 112l-40-32M200 112l40-32M200 112l-40 32M200 112l40 32M160 80h80M160 144h80" stroke="'.$scheme['accent'].'" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.6"/>';
                break;
        }

        // Service Type Mockups
        $serviceMockup = '';
        if (str_contains($tech, 'mobile') || str_contains($tech, 'android') || str_contains($tech, 'ios') || (str_contains($tech, 'app') && ! str_contains($tech, 'web'))) {
            $serviceMockup = '<g opacity="0.75" class="transition-transform duration-500 group-hover:translate-x-1 group-hover:-translate-y-1">'.
                             '<rect x="295" y="45" width="60" height="135" rx="8" fill="none" stroke="'.$scheme['accent'].'" stroke-width="3"/>'.
                             '<line x1="318" y1="52" x2="332" y2="52" stroke="'.$scheme['accent'].'" stroke-width="2" stroke-linecap="round"/>'.
                             '<circle cx="325" cy="168" r="4" fill="none" stroke="'.$scheme['accent'].'" stroke-width="2"/>'.
                             '<rect x="300" y="60" width="50" height="98" rx="2" fill="none" stroke="'.$scheme['accent'].'" stroke-width="1.5" opacity="0.4"/>'.
                             '</g>';
        } elseif (str_contains($tech, 'portal') || str_contains($tech, 'web') || str_contains($tech, 'cms') || str_contains($tech, 'storefront') || str_contains($tech, 'marketplace')) {
            $serviceMockup = '<g opacity="0.6" class="transition-transform duration-500 group-hover:translate-y-0.5">'.
                             '<rect x="65" y="35" width="270" height="155" rx="8" fill="none" stroke="'.$scheme['accent'].'" stroke-width="3" opacity="0.5"/>'.
                             '<line x1="65" y1="60" x2="335" y2="60" stroke="'.$scheme['accent'].'" stroke-width="2" opacity="0.5"/>'.
                             '<circle cx="77" cy="48" r="2" fill="'.$scheme['accent'].'" opacity="0.6"/>'.
                             '<circle cx="85" cy="48" r="2" fill="'.$scheme['accent'].'" opacity="0.6"/>'.
                             '<circle cx="93" cy="48" r="2" fill="'.$scheme['accent'].'" opacity="0.6"/>'.
                             '</g>';
        } elseif (str_contains($tech, 'iot') || str_contains($tech, 'weighing') || str_contains($tech, 'triangulation') || str_contains($tech, 'ar') || str_contains($tech, 'bluetooth') || str_contains($tech, 'ble')) {
            $serviceMockup = '<g opacity="0.4">'.
                             '<circle cx="200" cy="112" r="58" stroke="'.$scheme['accent'].'" stroke-width="2" stroke-dasharray="4,6" fill="none"/>'.
                             '<circle cx="200" cy="112" r="82" stroke="'.$scheme['accent'].'" stroke-width="1.5" fill="none" opacity="0.6"/>'.
                             '</g>';
        } elseif (str_contains($tech, 'analytics') || str_contains($tech, 'spss') || str_contains($tech, 'ssis') || str_contains($tech, 'etl') || str_contains($tech, 'pipeline')) {
            $serviceMockup = '<g opacity="0.3">'.
                             '<path d="M40 70c40 30 80-30 120 10s80 40 120 0 80-30 120 10" stroke="'.$scheme['accent'].'" stroke-width="2" fill="none"/>'.
                             '<path d="M40 154c40-30 80 30 120-10s80-40 120 0 80 30 120-10" stroke="'.$scheme['accent'].'" stroke-width="2" fill="none"/>'.
                             '<circle cx="160" cy="80" r="3" fill="'.$scheme['accent'].'"/>'.
                             '<circle cx="280" cy="120" r="3" fill="'.$scheme['accent'].'"/>'.
                             '</g>';
        } elseif (str_contains($tech, 'qa') || str_contains($tech, 'testing') || str_contains($tech, 'automation') || str_contains($tech, 'validation')) {
            $serviceMockup = '<g opacity="0.75" class="transition-transform duration-500 group-hover:scale-95">'.
                             '<rect x="300" y="45" width="55" height="135" rx="6" fill="none" stroke="'.$scheme['accent'].'" stroke-width="3"/>'.
                             '<path d="M310 72l3 3 7-7M310 107l3 3 7-7M310 142l3 3 7-7" stroke="'.$scheme['accent'].'" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>'.
                             '<line x1="326" y1="72" x2="346" y2="72" stroke="'.$scheme['accent'].'" stroke-width="2" stroke-linecap="round"/>'.
                             '<line x1="326" y1="107" x2="346" y2="107" stroke="'.$scheme['accent'].'" stroke-width="2" stroke-linecap="round"/>'.
                             '<line x1="326" y1="142" x2="346" y2="142" stroke="'.$scheme['accent'].'" stroke-width="2" stroke-linecap="round"/>'.
                             '</g>';
        } elseif (str_contains($tech, 'erp') || str_contains($tech, 'crm') || str_contains($tech, 'lms') || str_contains($tech, 'billing') || str_contains($tech, 'management system')) {
            $serviceMockup = '<g opacity="0.75" class="transition-transform duration-500 group-hover:translate-x-0.5 group-hover:translate-y-0.5">'.
                             '<path d="M305 70c0-6 20-6 20 0s-20 6-20 0z" fill="none" stroke="'.$scheme['accent'].'" stroke-width="3"/>'.
                             '<path d="M305 70v25c0 6 20 6 20 0V70" fill="none" stroke="'.$scheme['accent'].'" stroke-width="3"/>'.
                             '<path d="M305 95v25c0 6 20 6 20 0V95" fill="none" stroke="'.$scheme['accent'].'" stroke-width="3"/>'.
                             '<path d="M305 120v25c0 6 20 6 20 0v-25" fill="none" stroke="'.$scheme['accent'].'" stroke-width="3"/>'.
                             '</g>';
        }

        return '
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 225" class="w-full h-full select-none" fill="none">
    <defs>
        <linearGradient id="bg-gradient-'.$slugId.'" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="'.$scheme['from'].'"/>
            <stop offset="100%" stop-color="'.$scheme['to'].'"/>
        </linearGradient>
        <radialGradient id="radial-glow-'.$slugId.'" cx="50%" cy="50%" r="50%">
            <stop offset="0%" stop-color="'.$scheme['glow'].'" stop-opacity="0.6"/>
            <stop offset="100%" stop-color="'.$scheme['to'].'" stop-opacity="0"/>
        </radialGradient>
        <pattern id="grid-pattern-'.$slugId.'" width="30" height="30" patternUnits="userSpaceOnUse">
            <path d="M 30 0 L 0 0 0 30" fill="none" stroke="#ffffff" stroke-width="1" stroke-opacity="0.04"/>
        </pattern>
    </defs>
    <rect width="400" height="225" fill="url(#bg-gradient-'.$slugId.')"/>
    <circle cx="200" cy="112" r="130" fill="url(#radial-glow-'.$slugId.')"/>
    <rect width="400" height="225" fill="url(#grid-pattern-'.$slugId.')"/>
    <path d="M-50 170c80 30 150-10 220-40s140-50 210-40 100 20 120 40" stroke="#ffffff" stroke-opacity="0.04" stroke-width="8" fill="none"/>
    <path d="M-50 190c80 30 150-10 220-40s140-50 210-40 100 20 120 40" stroke="#ffffff" stroke-opacity="0.02" stroke-width="4" fill="none"/>
    '.$serviceMockup.'
    <g class="transition-transform duration-500 group-hover:scale-105 origin-center">
        '.$domainIcon.'
    </g>
    <rect x="1" y="1" width="398" height="223" rx="3" stroke="#ffffff" stroke-opacity="0.08" stroke-width="2" fill="none"/>
</svg>';
    }
}
