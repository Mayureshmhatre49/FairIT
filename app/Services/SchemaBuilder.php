<?php

namespace App\Services;

class SchemaBuilder
{
    protected array $schemas = [];

    public function add(array $schema): self
    {
        $this->schemas[] = $schema;
        return $this;
    }

    public function addOrganization(): self
    {
        return $this->add([
            "@type" => "Organization",
            "@id" => "https://fairitsolutions.ch/#organization",
            "name" => "FairIT Solutions",
            "legalName" => "TRNM Digital Consulting LLP",
            "alternateName" => "FairIT Solutions",
            "url" => "https://fairitsolutions.ch",
            "sameAs" => [
                "https://www.linkedin.com/company/fair-it-solutions/",
                "https://www.facebook.com/FairITSolutions/"
            ],
            "logo" => [
                "@type" => "ImageObject",
                "@id" => "https://fairitsolutions.ch/#logo",
                "url" => asset('images/og-image.png'),
                "width" => 1200,
                "height" => 630,
                "caption" => "FairIT Solutions"
            ],
            "image" => [ "@id" => "https://fairitsolutions.ch/#logo" ],
            "description" => "FairIT Solutions delivers strategic AI consulting and custom AI Operating Systems for founders and growth-focused enterprises.",
            "foundingDate" => "2024",
            "address" => [
                [
                    "@type" => "PostalAddress",
                    "streetAddress" => "B 706, Teerth Technospace, Mumbai Bangalore Highway, Baner",
                    "postalCode" => "411045",
                    "addressLocality" => "Pune",
                    "addressRegion" => "Maharashtra",
                    "addressCountry" => "IN"
                ],
                [
                    "@type" => "PostalAddress",
                    "streetAddress" => "Glärnischstrasse 7",
                    "postalCode" => "9524",
                    "addressLocality" => "Zuzwil",
                    "addressCountry" => "CH"
                ],
                [
                    "@type" => "PostalAddress",
                    "streetAddress" => "Steinstrasse 25",
                    "postalCode" => "20095",
                    "addressLocality" => "Hamburg",
                    "addressCountry" => "DE"
                ]
            ],
            "contactPoint" => [
                "@type" => "ContactPoint",
                "contactType" => "customer support",
                "email" => "Nishant@fairitsolutions.in",
                "availableLanguage" => ["English", "German"]
            ]
        ]);
    }

    public function addWebSite(): self
    {
        return $this->add([
            "@type" => "WebSite",
            "@id" => "https://fairitsolutions.ch/#website",
            "url" => "https://fairitsolutions.ch",
            "name" => "FairIT Solutions",
            "publisher" => [ "@id" => "https://fairitsolutions.ch/#organization" ],
            "inLanguage" => app()->getLocale(),
        ]);
    }

    public function addWebPage(string $type, string $name, string $description, string $url): self
    {
        return $this->add([
            "@type" => $type,
            "@id" => $url . "#webpage",
            "url" => $url,
            "name" => $name,
            "description" => $description,
            "isPartOf" => [ "@id" => "https://fairitsolutions.ch/#website" ],
            "about" => [ "@id" => "https://fairitsolutions.ch/#organization" ]
        ]);
    }

    public function addBreadcrumbs(array $items): self
    {
        $list = [];
        $position = 1;
        foreach ($items as $name => $url) {
            $list[] = [
                "@type" => "ListItem",
                "position" => $position++,
                "name" => $name,
                "item" => $url
            ];
        }

        return $this->add([
            "@type" => "BreadcrumbList",
            "itemListElement" => $list
        ]);
    }

    public function addItemList(string $name, array $items): self
    {
        $list = [];
        $position = 1;
        foreach ($items as $itemName => $url) {
            $list[] = [
                "@type" => "ListItem",
                "position" => $position++,
                "name" => $itemName,
                "url" => $url
            ];
        }

        return $this->add([
            "@type" => "ItemList",
            "name" => $name,
            "itemListElement" => $list
        ]);
    }

    public function addService(string $name, string $description, string $url): self
    {
        return $this->add([
            "@type" => "Service",
            "name" => $name,
            "description" => $description,
            "provider" => [ "@id" => "https://fairitsolutions.ch/#organization" ],
            "url" => $url
        ]);
    }

    public function addFAQ(array $qaPairs): self
    {
        $mainEntity = [];
        foreach ($qaPairs as $q => $a) {
            $mainEntity[] = [
                "@type" => "Question",
                "name" => $q,
                "acceptedAnswer" => [
                    "@type" => "Answer",
                    "text" => $a
                ]
            ];
        }

        return $this->add([
            "@type" => "FAQPage",
            "mainEntity" => $mainEntity
        ]);
    }

    public function addHowTo(string $name, string $description, array $steps): self
    {
        $stepEntities = [];
        $position = 1;
        foreach ($steps as $step) {
            $stepEntities[] = [
                "@type" => "HowToStep",
                "position" => $position++,
                "name" => $step['title'] ?? '',
                "text" => $step['desc'] ?? '',
                "url" => url()->current() . "#step-" . ($position - 1)
            ];
        }

        return $this->add([
            "@type" => "HowTo",
            "name" => $name,
            "description" => $description,
            "totalTime" => "P30D",
            "step" => $stepEntities
        ]);
    }



    public function addPerson(array $data): self
    {
        return $this->add(array_merge([
            "@type" => "Person",
            "worksFor" => [ "@id" => "https://fairitsolutions.ch/#organization" ]
        ], $data));
    }

    public function render(): string
    {
        if (empty($this->schemas)) {
            return '';
        }

        $payload = [
            "@context" => "https://schema.org",
            "@graph" => $this->schemas
        ];

        $json = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $nonce = function_exists('csp_nonce') ? csp_nonce() : '';

        return '<script type="application/ld+json"' . ($nonce ? ' nonce="' . $nonce . '"' : '') . '>' . $json . '</script>';
    }
}
