# CLAUDE.md — FairIT Solutions

Project-specific context for Claude Code sessions. Read this before editing.

---

## Brand vs. legal entity

This is the most important thing to get right when editing copy, legal pages, or schema.

- **FairIT Solutions** is a **brand name only**.
- **TRNM Digital Consulting LLP** is the underlying legal entity — an Indian Limited Liability Partnership. It is the contracting party, the data controller (GDPR / Swiss FADP / India DPDP), and the copyright holder.
- All client contracts, privacy/data-controller statements, and footer copyright reference TRNM Digital Consulting LLP.
- Marketing-facing copy, the wordmark, social handles, and the .ch domain continue to use "FairIT Solutions."

### Offices & HQ

| Office | Role | Address |
|---|---|---|
| **Pune** | **Headquarters** | B 706, Teerth Technospace, Mumbai Bangalore Highway, Baner, Pune 411045 |
| Switzerland | Office | Glärnischstrasse 7, 9524 Zuzwil |
| Germany | Office | Steinstrasse 25, 20095 Hamburg |
| Alibag | Registered Office | House No. 518, At Post Dhokawade (Bhag), Taluka Alibag, District Raigad, Maharashtra 402201 |

All four addresses are visibly listed on `/contact`, with the first line being "FairIT Solutions" for consistency. The `.ch` domain is intentionally preserved despite the Indian HQ — it's a brand positioning choice, not a legal claim. Don't "fix" it.

### Domains in production

- **Live production site**: `https://fairitsolutions.in` (Indian TLD, served by the same Laravel app)
- **Brand canonical domain**: `https://fairitsolutions.ch` (used in JSON-LD `@id` URIs, social handles, email signatures)
- Both resolve to the same content. Schema.org `@id` URIs use `.ch` deliberately as opaque identifiers — they are not fetch URLs and don't need to match the live host. Don't sweep-replace `.ch` → `.in`.

### Founders (in display order)

| Founder | Role | Email | LinkedIn |
|---|---|---|---|
| Nishant Mhatre | Co-Founder & CEO | `Nishant@fairitsolutions.in` | `linkedin.com/in/nishantmhatre/` |
| Annemarie M. Sickeler | Co-Founder | `Annemarie@fairitsolutions.ch` | `linkedin.com/in/annemariesickeler/` |
| Sanjay Joshi | Co-Founder & CTO | `Sanjay@fairitsolutions.in` | `linkedin.com/in/joshisanjay/` |

**Email casing convention is capitalised first letter** (Nishant@…, Annemarie@…, Sanjay@…). Email routing is case-insensitive per RFC 5321; the capitalisation is a branding/display choice. Preserve it on both `mailto:` href and visible text.

---

## Positioning & copy rules

### Headline positioning (set deliberately)

- Hero headline: **"AI Consulting & Custom AI Operating Systems"**
- Lives in `lang/en/home.php` under `hero.headline_1/2/3` — three stacked lines where line 2 gets the brand-gradient accent.
- Site description / meta everywhere should lead with these two offerings.

### Don't make claims you can't back

The user explicitly asked to "tone down anything tough to implement." Apply these constraints when writing new copy:

- **No "follow-the-sun" claims.** Two offices in CET + one in IST = "overlapping IST + CET coverage". Not 24-hour rotation.
- **No EST / GMT delivery claims.** No US, no UK office presence.
- **Workshop languages: EN by default, DE on request only.** Annemarie speaks German (HSG-educated). Don't claim French.
- **Integration list: Salesforce, HubSpot, Slack, Teams, Google Workspace.** Don't add SAP unless verified.
- **Multi-region data residency: Switzerland, EU, UK, India, US.** Don't add APAC/Singapore.
- **Fundraising help is "investor-readiness perspective (India & Europe focus)."** Don't imply US/UK fundraising introductions or jurisdictional expertise.
- **AI flavour for older case studies must be era-honest.** These were pre-LLM projects — write "the structured X data layer is the substrate today's AI-driven Y systems extend" rather than retroactively claiming GenAI/copilot/voice-AI tech.

### Legal jurisdiction

- **Governing law**: India. **Jurisdiction**: courts of Pune, Maharashtra. (Set in `legal/terms.blade.php`. Was Switzerland — changed when entity structure was clarified.)
- Data controller for GDPR / Swiss FADP / India DPDP: **TRNM Digital Consulting LLP**.

### Locale state

- **English (`lang/en/`)** is the source of truth and reflects all recent positioning.
- **de / fr / es / ar** have been partially machine-translated (Case Studies, Insights, and SEO metadata have been translated to these languages via Google Translate). However, some older static marketing copy may still carry **stale Swiss-centric copy from before the HQ/legal restructure**. Treat any further updates as a deliberate translation pass.

---

## Stack & conventions

- **Laravel + Blade**, PHP 8.5 (expect `PDO::MYSQL_ATTR_SSL_CA` deprecation noise — ignore).
- **Tailwind via Vite** (`npm run dev` on `:5173` for HMR). Production: `php artisan serve` on `:8000`.
- **Alpine.js** is already loaded for interactivity (mega-menus, language switcher).
- **SQLite** at `database/database.sqlite`. Migrations live in `database/migrations/`.
- **Inter** font via Google Fonts (weights 400/500/600/700/900).

### Routes worth knowing

| Path | What |
|---|---|
| `/` | Home (charcoal-950 hero) |
| `/services` + 5 detail pages | All sourced from `lang/en/services.php` via `ServicesController` |
| `/case-studies` + `/case-studies/{slug}` | DB-backed, see "Case studies" below |
| `/insights` + `/insights/{slug}` | Blog posts (DB-backed) |
| `/x-admin-secure-2024/login` | **Admin panel — see Admin section** |
| `/feed.xml`, `/sitemap.xml`, `/sitemap-news.xml` | SEO discovery |

### Admin

- Hidden prefix `/x-admin-secure-2024/` — the obfuscation is **defence in depth, not the primary control**. The actual gate is auth middleware.
- **The admin prefix is intentionally NOT in `robots.txt`.** Disallowing it would advertise the path to scanners. The admin layout + login page both ship `<meta name="robots" content="noindex, nofollow, noarchive, nosnippet">` instead.
- `resources/views/admin/login.blade.php` is a **standalone HTML page**, not extending `layouts/admin.blade.php`. It needs its own `<head>` directives (noindex meta is already in place).

---

## Production deployment

**Read this before pushing any change to CSS/JS, DB schema, or seeded data.** The deploy pattern is unusual.

### Vite build artifacts are committed to git

`public/build/` is **NOT** in `.gitignore`. Prod doesn't run `npm run build` — it just `git pull`s the pre-built bundle. This means:

- Every time you touch `resources/css/*` or `resources/js/*`, you **must** run `npm run build` locally before commit. Otherwise the source CSS/JS change reaches prod but the compiled bundle doesn't, and the change silently never takes effect.
- The bundle filename is hashed (e.g. `app-CFcNnJcQ.css`). Blade's `@vite(...)` directive reads `public/build/manifest.json` to resolve the current hash. New build → new hash → new filename → cache busts automatically. But you have to actually rebuild.
- **Symptom of forgetting**: a CSS change works locally (`npm run dev` HMR) but is invisible on prod. The browser is fetching the old hashed bundle from the last commit's `public/build/`.
- **Quick check**: `curl -s https://fairitsolutions.in/about | grep -oE 'app-[A-Za-z0-9]+\.css'` should match the filename in your local `public/build/assets/`.

### Prod runbook after `git pull origin main`

```bash
# Only if composer.lock / package.json changed:
composer install --no-dev --optimize-autoloader

# Only if there are new migrations:
php artisan migrate --force

# Only if there's new seed data (e.g. CaseStudySeeder additions):
php artisan db:seed --class=CaseStudySeeder --force

# Always — clears compiled Blade templates so markup changes take effect:
php artisan view:clear

# Optional perf rebuild:
php artisan config:cache && php artisan route:cache
```

The `--force` flags are required because Laravel refuses `migrate`/`db:seed` in `APP_ENV=production` without explicit confirmation.

### Things that almost-always trip people up

- **Tailwind class purging.** If you use a class string that doesn't already appear anywhere in source (e.g. `text-charcoal-750`), Tailwind won't include it in the bundle. After adding a brand-new class, always check the rebuild output — if the file size didn't change at all, it's likely your class wasn't picked up. Run `npm run build` again with the class string actually in a source file.
- **DB is not in git.** `database/database.sqlite` is gitignored. New rows added by you locally don't reach prod — only the seeder code does. To get new seed data live, run the seeder on prod after pulling.
- **CDN / browser cache.** If you use Cloudflare or similar, purge the cache for `/build/assets/*` after a CSS/JS deploy. Browsers cache hashed bundles forever, but the hash changes on rebuild, so end users get the new file as soon as the HTML changes — unless an aggressive CDN is in front. Hard refresh (⌘⇧R) on your own browser is the quickest sanity check.

---

## Design system (durable bits)

### Tailwind `charcoal-*` palette is custom, NOT standard Tailwind

This is the easiest gotcha to fall into and the hardest to spot until your text is invisible. `tailwind.config.js` defines a **Bootstrap-style gray scale** under the `charcoal-*` namespace, not the standard Tailwind slate values. The shades are much lighter than the same numbers in stock Tailwind.

| Class | This project | Stock Tailwind | Practical use |
|---|---|---|---|
| charcoal-400 | `#ced4da` | `#94a3b8` | **Disappears on white.** Only use against dark backgrounds. |
| charcoal-500 | `#adb5bd` | `#64748b` | Still light. Borderline on white. |
| charcoal-600 | `#6c757d` | `#475569` | **Lowest readable gray on white.** Matches `.nav-link`. Use for body text on light. |
| charcoal-700 | `#495057` | `#334155` | Use for emphasised text on light. |
| charcoal-950 | `#0d0f12` | `#020617` | Dark surfaces, hero backgrounds. |

**Rule of thumb when adding text on white**: start at `text-charcoal-600`. If you write `text-charcoal-400` or `text-charcoal-500` against a white-ish background, expect a "text is invisible" bug report. Same goes for SVG `fill` values in lockup files — `#475569` (charcoal-700 stock) and below for light backgrounds.

### Brand identity

- **Primary colour**: `#2563eb` (Tailwind `brand-600`).
- **Dark surface**: `charcoal-950` (`#0f172a`). Hero gradients, footer, OG image background.
- **Logo mark**: stylised **"F"** in a rounded brand-blue square with a **chamfered top-right corner** on the top arm — subtle window/interface nod to "Operating Systems," not literal.
- Asset files in `public/images/`: `favicon.svg`, `logo-mark.svg`, `logo-mark-mono.svg`, `logo-horizontal.svg`, `logo-horizontal-dark.svg`, `og-image.png`, `apple-touch-icon.png`. Old lightbulb favicon preserved at `storage/originals/favicon-old-lightbulb.svg`.
- When inlining the mark in markup, use this exact SVG:
  ```html
  <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <rect width="32" height="32" rx="8" fill="#2563eb"/>
    <path d="M9 7H21L23 9V10H12V14H19V17H12V25H9Z" fill="#FFFFFF"/>
  </svg>
  ```

### Navbar

- **Always-solid** (`bg-white/95 backdrop-blur-xl border-b`). Not transparent-over-hero. Brand visibility takes priority over immersive scroll effects. Pattern matches Stripe, Notion, Anthropic, Linear.
- `.navbar.scrolled` (toggled in `resources/js/app.js` past 20px) adds a soft drop-shadow only.

### Icon system

- Inline Heroicons stroke style, `viewBox="0 0 24 24"` for outline (114 instances), `viewBox="0 0 20 20"` for solid (12 instances).
- Three intentional stroke weights:
  - `stroke-width="2.5"` — CTAs, arrows, primary actions
  - `stroke-width="2"` — body / card / form icons
  - `stroke-width="1.8"` — navigation mega-menu icons
- Outliers (1, 1.5, 1.6, 3) are accidental drift — normalise to the closest standard if you touch them.
- All icons use `stroke-linecap="round"`.

### Background graphics

- `.hero-grid` and `.hero-gradient` defined in `resources/css/app.css`. Subtle, on-brand, used across multiple page heroes. Don't replace with raster textures.

### Trust badges on forms

Both `/contact` and `/book-consultation` submit-button areas render `partials/trust-badges.blade.php`:

1. GDPR · DPDP · FADP Compliant (shield)
2. TLS-encrypted submission (lock)
3. Never used to train AI models (eye-off)
4. Reply within 24 hours (clock)

Every claim ties to a real statement in the privacy policy or service FAQs. Translation strings live under `ui.trust.*` in `lang/en/ui.php`.

---

## Case studies

- **61 case studies** seeded from `database/seeders/CaseStudySeeder.php`. The source was `Boston Byte Project Details.xlsx` (gitignored — see "Sensitive files" below). Idempotent via `updateOrCreate(['slug' => ...])`.
- **Revenue (`revenue_usd`) is stored internally but never displayed publicly** — decision was deliberate. Admin form shows it, public pages do not. Don't add it to the public Blade.
- Schema: `client_name`, `project_name`, `slug`, `domain`, `summary`, `challenge`, `approach`, `outcome`, `tech_keywords`, `revenue_usd`, `is_ongoing`, `is_featured`, `is_published`, `order`, `seo_title`, `seo_desc`. **Note:** `CaseStudy` and `Post` models use `Spatie\Translatable\HasTranslations`. Most user-facing string/text columns (like title, summary, challenge, content, etc.) are now stored as JSON blobs containing translations for en, de, fr, es, ar.
- Anonymous-client rows render as **"Confidential Client"** via `CaseStudy::getDisplayClientNameAttribute()`. Two original rows (ePoll, Velir) have `client_name = null` on purpose.
- Index card thumbnails use a `$study->thumbnail_svg` accessor on the model — an inline SVG generated per-study (rendered raw via `{!! !!}`). If you add a new card layout, this accessor is the visual element.
- Detail-page Blade renders four H2 sections: **Project Overview**, **The Challenge**, **Our Approach**, **The Outcome**. Plus a sticky-right sidebar with industry / client / status / tech chips.

### Per-slug custom view override

`CaseStudiesController::show` has a fallback pattern for case studies that need bespoke layouts:

```php
if ($slug === 'production-erp-film-content') {
    return view('case-studies.the-lift', compact('study', 'related'));
}
return view('case-studies.show', compact('study', 'related'));
```

If a particular case study needs a richer treatment than the standard four-section template, create a dedicated Blade at `resources/views/case-studies/{custom-name}.blade.php` and add the slug check before the default `return view(...)`. Don't generalise the pattern (e.g. don't make it data-driven via a `custom_view` column) until there are several — for now, hardcoded slug branches are the cleaner choice.

### Enterprise SEO Architecture

- **Structured Data (JSON-LD)**: NEVER hardcode `<script type="application/ld+json">` in Blade templates (except for the global `SiteNavigationElement` in `app.blade.php`). Always use `App\Services\SchemaBuilder`. This ensures correct escaping (`JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES`) and enforces strict EEAT structures (like automatic `Organization` injection on contact pages).
- **Meta Tags & Hreflang**: Managed by `App\Services\SeoManager` which is instantiated in `app.blade.php`. It automatically generates symmetric `hreflang` cross-links (en, de, fr, es, ar) and the `x-default` tag based on Laravel's current locale.
- **Internal Linking**: `App\Services\LinkBuilder` can be used to inject highly contextual anchor links into unstructured translated text.
- **Accessibility**: When adding buttons, always ensure they have `focus-visible:ring-2 focus-visible:ring-brand-500` applied in `app.css` to maintain WCAG 2.1 AA keyboard compliance.
- **Images**: Ensure all below-the-fold images have `loading="lazy"`.

---

## Known pending items (judgement calls)

These were flagged during the visual audit and intentionally not actioned automatically — they need user input.

- **Nishant's headshot** (`public/images/founders/nishant.jpg`) is **AI-generated**. The other two co-founders use real photos. Replace with a real photograph when available.
- **8 orphaned AI-generated blog images** in `public/images/blog/` — not referenced from any view, but landmines if anyone picks them in the admin file picker. Awaiting decision: delete vs. replace.
- **Future blog featured-image strategy**: three options on the table (commissioned illustration system, real editorial photography, or skip featured images entirely à la Stripe blog / Linear changelog). No commitment yet.

---

## Backup files (don't accidentally delete)

- `storage/originals/annemarie-original-408.jpg` — original low-res LinkedIn photo before enhancement
- `storage/originals/favicon-old-lightbulb.svg` — pre-rebrand favicon (kept in case revert is needed)

---

## Sensitive files (gitignored — never commit)

These are explicitly excluded in `.gitignore`. The exclusion is intentional and load-bearing.

- `Boston Byte Project Details.xlsx` — source spreadsheet for the case studies. Contains **client revenue figures** which we deliberately do NOT display publicly (see Case studies section). Putting this in git history would expose those numbers permanently, even if the file were later deleted. The seeder is the canonical source. If you need to regenerate the seeder from a fresh xlsx, ask the user for the file out-of-band — don't add it back.
- `FairITSolutions Website.zip` — historical website archive. Same exclusion rationale.
- `database/database.sqlite` — already gitignored by the Laravel default. Stays out so prod/local DBs don't trample each other.
- `.env`, `.env.backup` — credentials. Already gitignored.

---

## What NOT to do

- **Don't blindly machine-translate old `de/fr/es/ar` lang files** without checking for stale Swiss-centric copy first. While we recently translated dynamic content and SEO tags, some static marketing strings need a manual review pass.
- **Don't add the admin path to `robots.txt`** — see Admin section.
- **Don't claim 24/7 follow-the-sun delivery, US fundraising help, SAP integration, French workshops, or APAC offices.** These are the exact toned-down claims worth preserving as guardrails.
- **Don't change the `.ch` domain** to `.in` or similar to "fix" the entity/domain mismatch. The brand uses `.ch` deliberately.
- **Don't run interactive git commands** (`-i` flag) — the shell tool can't drive them.
- **Don't bypass auth or `--no-verify` hooks** unless explicitly asked.
- **Don't push CSS/JS source changes without `npm run build`.** See "Production deployment" — the compiled bundle is committed to git, the source alone doesn't reach prod.
- **Don't reach for `text-charcoal-400` or `text-charcoal-500` for body text on white surfaces.** See "Tailwind charcoal palette" — these are nearly invisible in this project's custom scale. Start at `text-charcoal-600`.
- **Don't commit `Boston Byte Project Details.xlsx`** even if it shows up untracked in `git status`. It has client revenue we don't display publicly. See "Sensitive files".
