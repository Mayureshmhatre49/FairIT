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
- **de / fr / es / ar** carry **stale Swiss-centric copy from before the HQ/legal restructure**. Do not edit them without an explicit ask — and when asked, treat it as a deliberate translation pass, not casual machine translation. Hero, services, contact, and privacy/terms strings all need re-translating.

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

## Design system (durable bits)

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

- **61 case studies** seeded from `database/seeders/CaseStudySeeder.php`. The source was `Boston Byte Project Details.xlsx`. Idempotent via `updateOrCreate(['slug' => ...])`.
- **Revenue (`revenue_usd`) is stored internally but never displayed publicly** — decision was deliberate. Admin form shows it, public pages do not. Don't add it to the public Blade.
- Schema: `client_name`, `project_name`, `slug`, `domain`, `summary`, `challenge`, `approach`, `outcome`, `tech_keywords`, `revenue_usd`, `is_ongoing`, `is_featured`, `is_published`, `order`, `seo_title`, `seo_desc`.
- Anonymous-client rows render as **"Confidential Client"** via `CaseStudy::getDisplayClientNameAttribute()`. Two original rows (ePoll, Velir) have `client_name = null` on purpose.
- Detail-page Blade renders four H2 sections: **Project Overview**, **The Challenge**, **Our Approach**, **The Outcome**. Plus a sticky-right sidebar with industry / client / status / tech chips.

### JSON-LD escaping in service detail pages

`resources/views/services/_detail.blade.php` uses a `$jsonStr` helper (defined in the file) that calls `json_encode(..., JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)` and outputs via raw Blade `{!! !!}`. **Do not revert to `{{ addslashes(...) }}`** — that pattern double-encodes apostrophes (`\&#039;`) and produces invalid JSON-LD inside `<script>` blocks. The Retainers page silently shipped invalid schema for weeks before this was fixed.

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

## What NOT to do

- **Don't edit `de/fr/es/ar` lang files** without explicit instruction — they're stale and a careless update would worsen the inconsistency rather than fix it.
- **Don't add the admin path to `robots.txt`** — see Admin section.
- **Don't claim 24/7 follow-the-sun delivery, US fundraising help, SAP integration, French workshops, or APAC offices.** These are the exact toned-down claims worth preserving as guardrails.
- **Don't change the `.ch` domain** to `.in` or similar to "fix" the entity/domain mismatch. The brand uses `.ch` deliberately.
- **Don't run interactive git commands** (`-i` flag) — the shell tool can't drive them.
- **Don't bypass auth or `--no-verify` hooks** unless explicitly asked.
