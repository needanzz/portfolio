# IS-Portfolio: Information System Architect Portfolio

**IS-Portfolio** is a premium, modern, and high-performance personal portfolio website built for **Muhammad Danil Aminuddin**, structured in a beautiful **Neo-Brutalist Windows-95/Cyberpunk HUD style**. 

The application is engineered using **Laravel 13**, **Bootstrap 5**, and lightweight **Vanilla JS** to present a fast, responsive, and secure experience for recruiters, potential clients, and professional peers.

---

## 🚀 Key Features

*   **Premium Neo-Brutalist Interface**: Custom-crafted interface utilizing harmonized CSS custom variables, tactile flat drop shadows (`box-shadow: var(--neo-shadow)`), clean responsive transitions, and double-line brutalist window panels.
*   **Bilingual Translation Support (ID/EN)**: Full localization engine running on custom `SetLocale` session middleware, ensuring that the selected translation locale persists smoothly across pages and dynamic AJAX endpoints.
*   **Tactile Freelance Price Catalog**: Elegant pricing package matrices with direct, package-specific **WhatsApp click-to-chat** call-to-actions, eliminating internal form redundancies.
*   **Dynamic Debounced Projects Filter**: Live category filtering pills and real-time search inputs that query the backend project API dynamically. Staggered fade-in card entries and beautiful skeleton shimmers enhance visual feedback.
*   **Security Built-in**: Full protection against DOM-based Cross-Site Scripting (XSS) via proactive client-side dynamic content escaping, request rate-limiting (throttling), and SQL injection prevention.
*   **Highly Scalable Queries**: Fully optimized database queries, utilizing composite database indexes and pluck collections to mitigate N+1 query patterns.

---

## 🛠️ Technology Stack

| Layer | Technology |
| --- | --- |
| **Backend Framework** | Laravel 13.x |
| **Programming Language** | PHP 8.3+ |
| **Frontend Templates** | Laravel Blade |
| **Styling Framework** | Bootstrap 5 + Bootstrap Icons |
| **Database Engine** | MySQL / MariaDB |
| **JavaScript & Dynamic Logic** | Vanilla JS / Alpine.js |
| **Asset Compiler & Build Tool** | Vite |
| **Runtime Environment** | Laragon / Local Development Server |

---

## 📁 Directory Structure Overview

```bash
IS-Portfolio/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/
│   │   │   │   └── ProjectApiController.php  # Capped dynamic projects JSON endpoints
│   │   │   ├── ExperienceController.php
│   │   │   ├── FreelancePriceController.php
│   │   │   └── ProfileController.php         # Single bulk pluck setting queries
│   │   └── Middleware/
│   │       └── SetLocale.php                 # Persists selected language session
│   └── Models/
│       ├── Experience.php
│       ├── FreelancePrice.php
│       ├── Project.php                       # Bilingual title/description casts
│       └── SiteSetting.php
├── database/
│   ├── migrations/                           # Category, order, and featured indexes
│   └── seeders/                              # Compiles profile, project, and package seeds
├── resources/
│   ├── css/
│   │   └── app.css                           # Unified Neo-Brutalist variables & tokens
│   ├── js/
│   │   └── app.js                            # Sidebar controls & Dark Mode re-bindings
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php                 # Main responsive wrapper
│       ├── components/
│       │   ├── navbar.blade.php              # Dynamic title, ID/EN toggle, theme switcher
│       │   ├── sidebar.blade.php             # Spec-compliant active routes navigation
│       │   └── project-card.blade.php
│       └── pages/
│           ├── dashboard.blade.php
│           ├── profile.blade.php
│           ├── freelance-price.blade.php     # Independent pricing packages
│           └── projects/
│               └── index.blade.php           # Secure, debounced dynamics cards renderer
```

---

## 💻 Installation & Setup

Follow these steps to run the project locally on your machine:

### 1. Prerequisite Checklist
*   PHP 8.3 or higher installed.
*   Composer package manager.
*   Node.js & NPM package manager.
*   MySQL/MariaDB database server active.

### 2. Clone and Setup Dependencies
Clone the repository, enter the workspace directory, and install backend and frontend dependencies:
```bash
git clone https://github.com/needanzz/portfolio.git
cd portfolio
composer install
npm install
```

### 3. Environment Settings
Duplicate `.env.example` to establish your active env configuration:
```bash
cp .env.example .env
```
Open `.env` and set up your local database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 4. Database Setup & Seed
Rebuild the database schema, run the optimized performance migrations, and populate mock records:
```bash
php artisan migrate:fresh --seed
```

### 5. Launch Application
Compile frontend assets and start your local server:
```bash
# Compile and hot-reload CSS/JS assets
npm run dev

# Start Laravel local development server (runs at http://127.0.0.1:8000)
php artisan serve
```

---

## 🛡️ Code Quality & Verification Actions

We maintain a strict quality assurance standard. Every structural change is logged under our `.code-reviews/` folder. Performance benchmarks, queries profiles, and visual guidelines are validated continuously.

*   To run the complete test suite:
    ```bash
    php artisan test
    ```
*   To clean and rebuild Laravel configuration:
    ```bash
    php artisan config:clear && php artisan route:clear && php artisan view:clear
    ```

---

*Owner: Muhammad Danil Aminuddin © 2026. All rights reserved.*
