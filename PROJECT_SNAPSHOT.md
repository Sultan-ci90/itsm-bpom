# PROJECT SNAPSHOT

## Project Information

- Project Type: Laravel Web Application (ITSM BPOM)
- Framework: Laravel 12, Blade, Alpine.js, Tailwind CSS v4, template TailAdmin, ApexCharts
- Snapshot Date: 2026-10-05
- Root Directory: itsm-bpom/
- Purpose: Complete source-code snapshot for AI analysis (PRD/handover acuan)

---

# FILE INDEX

| No | File | Status |
| -: | ---- | ------ |
| 1 | `.env.example` | Included |
| 2 | `PROJECT_DOCUMENTATION.md` | Included |
| 3 | `README.md` | Included |
| 4 | `app/Helpers/MenuHelper.php` | Included |
| 5 | `app/Http/Controllers/Auth/LoginController.php` | Included |
| 6 | `app/Http/Controllers/Controller.php` | Included |
| 7 | `app/Http/Controllers/DashboardController.php` | Included |
| 8 | `app/Http/Controllers/DashboardControllerOLD.php` | Included |
| 9 | `app/Http/Controllers/IncidentController.php` | Included |
| 10 | `app/Http/Controllers/LocaleController.php` | Included |
| 11 | `app/Http/Controllers/ServiceRequestController.php` | Included |
| 12 | `app/Http/Controllers/SidebarController.php` | Included |
| 13 | `app/Http/Middleware/RoleMiddleware.php` | Included |
| 14 | `app/Http/Middleware/SetLocale.php` | Included |
| 15 | `app/Http/Requests/StoreIncidentRequest.php` | Included |
| 16 | `app/Http/Requests/StoreServiceRequestRequest.php` | Included |
| 17 | `app/Http/Requests/UpdateIncident.php` | Included |
| 18 | `app/Models/Asset.php` | Included |
| 19 | `app/Models/BanjarCaptchas.php` | Included |
| 20 | `app/Models/Bidang.php` | Included |
| 21 | `app/Models/Jabatan.php` | Included |
| 22 | `app/Models/ReqDetailAkun.php` | Included |
| 23 | `app/Models/ReqDetailZoom.php` | Included |
| 24 | `app/Models/ReqdetailPeminjaman.php` | Included |
| 25 | `app/Models/ServiceRequest.php` | Included |
| 26 | `app/Models/Ticket.php` | Included |
| 27 | `app/Models/TicketHistory.php` | Included |
| 28 | `app/Models/TicketResolution.php` | Included |
| 29 | `app/Models/TiketResolution.php` | Included |
| 30 | `app/Models/User.php` | Included |
| 31 | `app/Models/panggol.php` | Included |
| 32 | `app/Providers/AppServiceProvider.php` | Included |
| 33 | `app/View/Components/CalenderArea.php` | Included |
| 34 | `app/View/Components/common/CommonGridShape.php` | Included |
| 35 | `app/View/Components/common/ComponentCard.php` | Included |
| 36 | `app/View/Components/common/DropdownMenu.php` | Included |
| 37 | `app/View/Components/common/PageBreadcrumb.php` | Included |
| 38 | `app/View/Components/common/Preloader.php` | Included |
| 39 | `app/View/Components/common/TableDropdown.php` | Included |
| 40 | `app/View/Components/common/ThemeToggle.php` | Included |
| 41 | `app/View/Components/ecommerce/CustomerDemographic.php` | Included |
| 42 | `app/View/Components/ecommerce/EcommerceMetrics.php` | Included |
| 43 | `app/View/Components/ecommerce/MonthlySale.php` | Included |
| 44 | `app/View/Components/ecommerce/MonthlyTarget.php` | Included |
| 45 | `app/View/Components/ecommerce/RecentOrders.php` | Included |
| 46 | `app/View/Components/ecommerce/StatisticsChart.php` | Included |
| 47 | `app/View/Components/form/DatePicker.php` | Included |
| 48 | `app/View/Components/form/FormElements/CheckboxComponent.php` | Included |
| 49 | `app/View/Components/form/FormElements/DefaultInputs.php` | Included |
| 50 | `app/View/Components/form/FormElements/Dropzone.php` | Included |
| 51 | `app/View/Components/form/FormElements/FileInputExample.php` | Included |
| 52 | `app/View/Components/form/FormElements/InputGroup.php` | Included |
| 53 | `app/View/Components/form/FormElements/InputStates.php` | Included |
| 54 | `app/View/Components/form/FormElements/RadioButtons.php` | Included |
| 55 | `app/View/Components/form/FormElements/SelectInputs.php` | Included |
| 56 | `app/View/Components/form/FormElements/TextAreaInputs.php` | Included |
| 57 | `app/View/Components/form/FormElements/ToggleSwitch.php` | Included |
| 58 | `app/View/Components/form/input/Radio.php` | Included |
| 59 | `app/View/Components/form/select/MultipleSelect.php` | Included |
| 60 | `app/View/Components/header/NotificationDropdown.php` | Included |
| 61 | `app/View/Components/header/UserDropdown.php` | Included |
| 62 | `app/View/Components/profile/AddressCard.php` | Included |
| 63 | `app/View/Components/profile/PersonalInfoCard.php` | Included |
| 64 | `app/View/Components/profile/ProfileCard.php` | Included |
| 65 | `app/View/Components/tables/BasicTables/BasicTablesFive.php` | Included |
| 66 | `app/View/Components/tables/BasicTables/BasicTablesFour.php` | Included |
| 67 | `app/View/Components/tables/BasicTables/BasicTablesOne.php` | Included |
| 68 | `app/View/Components/tables/BasicTables/BasicTablesThree.php` | Included |
| 69 | `app/View/Components/tables/BasicTables/BasicTablesTwo.php` | Included |
| 70 | `app/View/Components/ui/Alert.php` | Included |
| 71 | `app/View/Components/ui/Avatar.php` | Included |
| 72 | `app/View/Components/ui/Badge.php` | Included |
| 73 | `app/View/Components/ui/Button.php` | Included |
| 74 | `app/View/Components/ui/Modal.php` | Included |
| 75 | `app/View/Components/ui/YoutubeEmbed.php` | Included |
| 76 | `artisan` | Included |
| 77 | `composer.json` | Included |
| 78 | `config/app.php` | Included |
| 79 | `config/auth.php` | Included |
| 80 | `config/cache.php` | Included |
| 81 | `config/database.php` | Included |
| 82 | `config/filesystems.php` | Included |
| 83 | `config/logging.php` | Included |
| 84 | `config/mail.php` | Included |
| 85 | `config/queue.php` | Included |
| 86 | `config/services.php` | Included |
| 87 | `config/session.php` | Included |
| 88 | `database/factories/AssetFactory.php` | Included |
| 89 | `database/factories/UserFactory.php` | Included |
| 90 | `database/migrations/0001_01_01_000001_create_cache_table.php` | Included |
| 91 | `database/migrations/2026_09_28_021525_create_sessions_table.php` | Included |
| 92 | `database/migrations/2026_09_30_000001_create_itsm_schema_tables.php` | Included |
| 93 | `database/seeders/DatabaseSeeder.php` | Included |
| 94 | `database/seeders/DummyDataSeeder.php` | Included |
| 95 | `database/seeders/ItsmSeeder.php` | Included |
| 96 | `database/seeders/PelaporanSeeder.php` | Included |
| 97 | `package.json` | Included |
| 98 | `phpunit.xml` | Included |
| 99 | `resources/css/app.css` | Included |
| 100 | `resources/js/app.js` | Included |
| 101 | `resources/js/bootstrap.js` | Included |
| 102 | `resources/js/components/calendar-init.js` | Included |
| 103 | `resources/js/components/chart/chart-1.js` | Included |
| 104 | `resources/js/components/chart/chart-13.js` | Included |
| 105 | `resources/js/components/chart/chart-2.js` | Included |
| 106 | `resources/js/components/chart/chart-3.js` | Included |
| 107 | `resources/js/components/chart/chart-6.js` | Included |
| 108 | `resources/js/components/chart/chart-8.js` | Included |
| 109 | `resources/js/components/chart/ticket-charts.js` | Included |
| 110 | `resources/js/components/map.js` | Included |
| 111 | `resources/views/components/calender-area.blade.php` | Included |
| 112 | `resources/views/components/common/common-grid-shape.blade.php` | Included |
| 113 | `resources/views/components/common/component-card.blade.php` | Included |
| 114 | `resources/views/components/common/dropdown-menu.blade.php` | Included |
| 115 | `resources/views/components/common/page-breadcrumb.blade.php` | Included |
| 116 | `resources/views/components/common/preloader.blade.php` | Included |
| 117 | `resources/views/components/common/table-dropdown.blade.php` | Included |
| 118 | `resources/views/components/common/theme-toggle.blade.php` | Included |
| 119 | `resources/views/components/ecommerce/customer-demographic.blade.php` | Included |
| 120 | `resources/views/components/ecommerce/ecommerce-metrics.blade.php` | Included |
| 121 | `resources/views/components/ecommerce/monthly-sale.blade.php` | Included |
| 122 | `resources/views/components/ecommerce/monthly-target.blade.php` | Included |
| 123 | `resources/views/components/ecommerce/recent-orders.blade.php` | Included |
| 124 | `resources/views/components/ecommerce/statistics-chart.blade.php` | Included |
| 125 | `resources/views/components/form/date-picker.blade.php` | Included |
| 126 | `resources/views/components/form/form-elements/checkbox-component.blade.php` | Included |
| 127 | `resources/views/components/form/form-elements/default-inputs.blade.php` | Included |
| 128 | `resources/views/components/form/form-elements/dropzone.blade.php` | Included |
| 129 | `resources/views/components/form/form-elements/file-input-example.blade.php` | Included |
| 130 | `resources/views/components/form/form-elements/input-group.blade.php` | Included |
| 131 | `resources/views/components/form/form-elements/input-states.blade.php` | Included |
| 132 | `resources/views/components/form/form-elements/radio-buttons.blade.php` | Included |
| 133 | `resources/views/components/form/form-elements/select-inputs.blade.php` | Included |
| 134 | `resources/views/components/form/form-elements/text-area-inputs.blade.php` | Included |
| 135 | `resources/views/components/form/form-elements/toggle-switch.blade.php` | Included |
| 136 | `resources/views/components/form/input/radio.blade.php` | Included |
| 137 | `resources/views/components/form/select/multiple-select.blade.php` | Included |
| 138 | `resources/views/components/header/notification-dropdown.blade.php` | Included |
| 139 | `resources/views/components/header/user-dropdown.blade.php` | Included |
| 140 | `resources/views/components/profile/address-card.blade.php` | Included |
| 141 | `resources/views/components/profile/personal-info-card.blade.php` | Included |
| 142 | `resources/views/components/profile/profile-card.blade.php` | Included |
| 143 | `resources/views/components/tables/basic-tables/basic-tables-five.blade.php` | Included |
| 144 | `resources/views/components/tables/basic-tables/basic-tables-four.blade.php` | Included |
| 145 | `resources/views/components/tables/basic-tables/basic-tables-one.blade.php` | Included |
| 146 | `resources/views/components/tables/basic-tables/basic-tables-three.blade.php` | Included |
| 147 | `resources/views/components/tables/basic-tables/basic-tables-two.blade.php` | Included |
| 148 | `resources/views/components/ui/alert.blade.php` | Included |
| 149 | `resources/views/components/ui/avatar.blade.php` | Included |
| 150 | `resources/views/components/ui/badge.blade.php` | Included |
| 151 | `resources/views/components/ui/button.blade.php` | Included |
| 152 | `resources/views/components/ui/modal.blade.php` | Included |
| 153 | `resources/views/components/ui/youtube-embed.blade.php` | Included |
| 154 | `resources/views/incidents/create.blade.php` | Included |
| 155 | `resources/views/incidents/index.blade.php` | Included |
| 156 | `resources/views/incidents/show.blade.php` | Included |
| 157 | `resources/views/layouts/app-header.blade.php` | Included |
| 158 | `resources/views/layouts/app.blade.php` | Included |
| 159 | `resources/views/layouts/backdrop.blade.php` | Included |
| 160 | `resources/views/layouts/fullscreen-layout.blade.php` | Included |
| 161 | `resources/views/layouts/sidebar-widget.blade.php` | Included |
| 162 | `resources/views/layouts/sidebar.blade.php` | Included |
| 163 | `resources/views/pages/auth/signin.blade.php` | Included |
| 164 | `resources/views/pages/auth/signup.blade.php` | Included |
| 165 | `resources/views/pages/blank.blade.php` | Included |
| 166 | `resources/views/pages/calender.blade.php` | Included |
| 167 | `resources/views/pages/chart/bar-chart.blade.php` | Included |
| 168 | `resources/views/pages/chart/line-chart.blade.php` | Included |
| 169 | `resources/views/pages/choice/index.blade.php` | Included |
| 170 | `resources/views/pages/dashboard/ecommerce.blade.php` | Included |
| 171 | `resources/views/pages/dashboard/index.blade.php` | Included |
| 172 | `resources/views/pages/errors/error-404.blade.php` | Included |
| 173 | `resources/views/pages/form/form-elements.blade.php` | Included |
| 174 | `resources/views/pages/profile.blade.php` | Included |
| 175 | `resources/views/pages/tables/basic-tables.blade.php` | Included |
| 176 | `resources/views/pages/ui-elements/alerts.blade.php` | Included |
| 177 | `resources/views/pages/ui-elements/avatars.blade.php` | Included |
| 178 | `resources/views/pages/ui-elements/badges.blade.php` | Included |
| 179 | `resources/views/pages/ui-elements/buttons.blade.php` | Included |
| 180 | `resources/views/pages/ui-elements/images.blade.php` | Included |
| 181 | `resources/views/pages/ui-elements/videos.blade.php` | Included |
| 182 | `resources/views/requests/all.blade.php` | Included |
| 183 | `resources/views/requests/create.blade.php` | Included |
| 184 | `resources/views/requests/index.blade.php` | Included |
| 185 | `resources/views/requests/show.blade.php` | Included |
| 186 | `routes/console.php` | Included |
| 187 | `routes/web.php` | Included |
| 188 | `tests/Feature/ExampleTest.php` | Included |
| 189 | `tests/Pest.php` | Included |
| 190 | `tests/TestCase.php` | Included |
| 191 | `tests/Unit/ExampleTest.php` | Included |
| 192 | `vite.config.js` | Included |
| 193 | `.env` | Excluded - Sensitif (`.env.example` disertakan) |
| 194 | `vendor/` | Excluded - Dependency/Generated |
| 195 | `node_modules/` | Excluded - Dependency/Generated |
| 196 | `.git/` | Excluded - Dependency/Generated |
| 197 | `public/build/` | Excluded - Dependency/Generated |
| 198 | `bootstrap/cache/` | Excluded - Dependency/Generated |
| 199 | `storage/logs/` | Excluded - Dependency/Generated |
| 200 | `storage/framework/*` | Excluded - Dependency/Generated |

---

# 1. PROJECT STRUCTURE

```text
itsm-bpom/
├── app/
│   ├── Helpers/
│   │   ├── MenuHelper.php
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   ├── LoginController.php
│   │   │   ├── Controller.php
│   │   │   ├── DashboardController.php
│   │   │   ├── DashboardControllerOLD.php
│   │   │   ├── IncidentController.php
│   │   │   ├── LocaleController.php
│   │   │   ├── ServiceRequestController.php
│   │   │   ├── SidebarController.php
│   │   ├── Middleware/
│   │   │   ├── RoleMiddleware.php
│   │   │   ├── SetLocale.php
│   │   ├── Requests/
│   │   │   ├── StoreIncidentRequest.php
│   │   │   ├── StoreServiceRequestRequest.php
│   │   │   ├── UpdateIncident.php
│   ├── Models/
│   │   ├── Asset.php
│   │   ├── BanjarCaptchas.php
│   │   ├── Bidang.php
│   │   ├── Jabatan.php
│   │   ├── ReqDetailAkun.php
│   │   ├── ReqDetailZoom.php
│   │   ├── ReqdetailPeminjaman.php
│   │   ├── ServiceRequest.php
│   │   ├── Ticket.php
│   │   ├── TicketHistory.php
│   │   ├── TicketResolution.php
│   │   ├── TiketResolution.php
│   │   ├── User.php
│   │   ├── panggol.php
│   ├── Providers/
│   │   ├── AppServiceProvider.php
│   ├── View/
│   │   ├── Components/
│   │   │   ├── common/
│   │   │   │   ├── CommonGridShape.php
│   │   │   │   ├── ComponentCard.php
│   │   │   │   ├── DropdownMenu.php
│   │   │   │   ├── PageBreadcrumb.php
│   │   │   │   ├── Preloader.php
│   │   │   │   ├── TableDropdown.php
│   │   │   │   ├── ThemeToggle.php
│   │   │   ├── ecommerce/
│   │   │   │   ├── CustomerDemographic.php
│   │   │   │   ├── EcommerceMetrics.php
│   │   │   │   ├── MonthlySale.php
│   │   │   │   ├── MonthlyTarget.php
│   │   │   │   ├── RecentOrders.php
│   │   │   │   ├── StatisticsChart.php
│   │   │   ├── form/
│   │   │   │   ├── FormElements/
│   │   │   │   │   ├── CheckboxComponent.php
│   │   │   │   │   ├── DefaultInputs.php
│   │   │   │   │   ├── Dropzone.php
│   │   │   │   │   ├── FileInputExample.php
│   │   │   │   │   ├── InputGroup.php
│   │   │   │   │   ├── InputStates.php
│   │   │   │   │   ├── RadioButtons.php
│   │   │   │   │   ├── SelectInputs.php
│   │   │   │   │   ├── TextAreaInputs.php
│   │   │   │   │   ├── ToggleSwitch.php
│   │   │   │   ├── input/
│   │   │   │   │   ├── Radio.php
│   │   │   │   ├── select/
│   │   │   │   │   ├── MultipleSelect.php
│   │   │   │   ├── DatePicker.php
│   │   │   ├── header/
│   │   │   │   ├── NotificationDropdown.php
│   │   │   │   ├── UserDropdown.php
│   │   │   ├── profile/
│   │   │   │   ├── AddressCard.php
│   │   │   │   ├── PersonalInfoCard.php
│   │   │   │   ├── ProfileCard.php
│   │   │   ├── tables/
│   │   │   │   ├── BasicTables/
│   │   │   │   │   ├── BasicTablesFive.php
│   │   │   │   │   ├── BasicTablesFour.php
│   │   │   │   │   ├── BasicTablesOne.php
│   │   │   │   │   ├── BasicTablesThree.php
│   │   │   │   │   ├── BasicTablesTwo.php
│   │   │   ├── ui/
│   │   │   │   ├── Alert.php
│   │   │   │   ├── Avatar.php
│   │   │   │   ├── Badge.php
│   │   │   │   ├── Button.php
│   │   │   │   ├── Modal.php
│   │   │   │   ├── YoutubeEmbed.php
│   │   │   ├── CalenderArea.php
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── services.php
│   ├── session.php
├── database/
│   ├── factories/
│   │   ├── AssetFactory.php
│   │   ├── UserFactory.php
│   ├── migrations/
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 2026_09_28_021525_create_sessions_table.php
│   │   ├── 2026_09_30_000001_create_itsm_schema_tables.php
│   ├── seeders/
│   │   ├── DatabaseSeeder.php
│   │   ├── DummyDataSeeder.php
│   │   ├── ItsmSeeder.php
│   │   ├── PelaporanSeeder.php
├── resources/
│   ├── css/
│   │   ├── app.css
│   ├── js/
│   │   ├── components/
│   │   │   ├── chart/
│   │   │   │   ├── chart-1.js
│   │   │   │   ├── chart-13.js
│   │   │   │   ├── chart-2.js
│   │   │   │   ├── chart-3.js
│   │   │   │   ├── chart-6.js
│   │   │   │   ├── chart-8.js
│   │   │   │   ├── ticket-charts.js
│   │   │   ├── calendar-init.js
│   │   │   ├── map.js
│   │   ├── app.js
│   │   ├── bootstrap.js
│   ├── views/
│   │   ├── components/
│   │   │   ├── common/
│   │   │   │   ├── common-grid-shape.blade.php
│   │   │   │   ├── component-card.blade.php
│   │   │   │   ├── dropdown-menu.blade.php
│   │   │   │   ├── page-breadcrumb.blade.php
│   │   │   │   ├── preloader.blade.php
│   │   │   │   ├── table-dropdown.blade.php
│   │   │   │   ├── theme-toggle.blade.php
│   │   │   ├── ecommerce/
│   │   │   │   ├── customer-demographic.blade.php
│   │   │   │   ├── ecommerce-metrics.blade.php
│   │   │   │   ├── monthly-sale.blade.php
│   │   │   │   ├── monthly-target.blade.php
│   │   │   │   ├── recent-orders.blade.php
│   │   │   │   ├── statistics-chart.blade.php
│   │   │   ├── form/
│   │   │   │   ├── form-elements/
│   │   │   │   │   ├── checkbox-component.blade.php
│   │   │   │   │   ├── default-inputs.blade.php
│   │   │   │   │   ├── dropzone.blade.php
│   │   │   │   │   ├── file-input-example.blade.php
│   │   │   │   │   ├── input-group.blade.php
│   │   │   │   │   ├── input-states.blade.php
│   │   │   │   │   ├── radio-buttons.blade.php
│   │   │   │   │   ├── select-inputs.blade.php
│   │   │   │   │   ├── text-area-inputs.blade.php
│   │   │   │   │   ├── toggle-switch.blade.php
│   │   │   │   ├── input/
│   │   │   │   │   ├── radio.blade.php
│   │   │   │   ├── select/
│   │   │   │   │   ├── multiple-select.blade.php
│   │   │   │   ├── date-picker.blade.php
│   │   │   ├── header/
│   │   │   │   ├── notification-dropdown.blade.php
│   │   │   │   ├── user-dropdown.blade.php
│   │   │   ├── profile/
│   │   │   │   ├── address-card.blade.php
│   │   │   │   ├── personal-info-card.blade.php
│   │   │   │   ├── profile-card.blade.php
│   │   │   ├── tables/
│   │   │   │   ├── basic-tables/
│   │   │   │   │   ├── basic-tables-five.blade.php
│   │   │   │   │   ├── basic-tables-four.blade.php
│   │   │   │   │   ├── basic-tables-one.blade.php
│   │   │   │   │   ├── basic-tables-three.blade.php
│   │   │   │   │   ├── basic-tables-two.blade.php
│   │   │   ├── ui/
│   │   │   │   ├── alert.blade.php
│   │   │   │   ├── avatar.blade.php
│   │   │   │   ├── badge.blade.php
│   │   │   │   ├── button.blade.php
│   │   │   │   ├── modal.blade.php
│   │   │   │   ├── youtube-embed.blade.php
│   │   │   ├── calender-area.blade.php
│   │   ├── incidents/
│   │   │   ├── create.blade.php
│   │   │   ├── index.blade.php
│   │   │   ├── show.blade.php
│   │   ├── layouts/
│   │   │   ├── app-header.blade.php
│   │   │   ├── app.blade.php
│   │   │   ├── backdrop.blade.php
│   │   │   ├── fullscreen-layout.blade.php
│   │   │   ├── sidebar-widget.blade.php
│   │   │   ├── sidebar.blade.php
│   │   ├── pages/
│   │   │   ├── auth/
│   │   │   │   ├── signin.blade.php
│   │   │   │   ├── signup.blade.php
│   │   │   ├── chart/
│   │   │   │   ├── bar-chart.blade.php
│   │   │   │   ├── line-chart.blade.php
│   │   │   ├── choice/
│   │   │   │   ├── index.blade.php
│   │   │   ├── dashboard/
│   │   │   │   ├── ecommerce.blade.php
│   │   │   │   ├── index.blade.php
│   │   │   ├── errors/
│   │   │   │   ├── error-404.blade.php
│   │   │   ├── form/
│   │   │   │   ├── form-elements.blade.php
│   │   │   ├── tables/
│   │   │   │   ├── basic-tables.blade.php
│   │   │   ├── ui-elements/
│   │   │   │   ├── alerts.blade.php
│   │   │   │   ├── avatars.blade.php
│   │   │   │   ├── badges.blade.php
│   │   │   │   ├── buttons.blade.php
│   │   │   │   ├── images.blade.php
│   │   │   │   ├── videos.blade.php
│   │   │   ├── blank.blade.php
│   │   │   ├── calender.blade.php
│   │   │   ├── profile.blade.php
│   │   ├── requests/
│   │   │   ├── all.blade.php
│   │   │   ├── create.blade.php
│   │   │   ├── index.blade.php
│   │   │   ├── show.blade.php
├── routes/
│   ├── console.php
│   ├── web.php
├── tests/
│   ├── Feature/
│   │   ├── ExampleTest.php
│   ├── Unit/
│   │   ├── ExampleTest.php
│   ├── Pest.php
│   ├── TestCase.php
├── .env.example
├── PROJECT_DOCUMENTATION.md
├── README.md
├── artisan
├── composer.json
├── package.json
├── phpunit.xml
├── vite.config.js
```

---

# 2. SOURCE CODE

## File: `.env.example`

```text
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
[REDACTED]
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

# Database Settings
# For local development without Docker: DB_HOST=127.0.0.1
# For Docker / Laravel Sail: DB_HOST=mysql
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tailadmin_laravel
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
# CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

# Redis Settings
# For local development without Docker: REDIS_HOST=127.0.0.1
# For Docker / Laravel Sail: REDIS_HOST=redis
REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# Mail Settings (For Docker / Sail: MAIL_MAILER=smtp, MAIL_HOST=mailpit, MAIL_PORT=1025)
MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"

# Docker / Laravel Sail Port Overrides (Optional)
# APP_PORT=80
# FORWARD_DB_PORT=3306
# FORWARD_REDIS_PORT=6379
# FORWARD_MAILPIT_PORT=1025
# FORWARD_MAILPIT_DASHBOARD_PORT=8025
# VITE_PORT=5173
```

## File: `PROJECT_DOCUMENTATION.md`

```markdown
# 📘 Dokumentasi Proyek: ITSM BPOM

**Repository:** https://github.com/Sultan-ci90/itsm-bpom  
**Stack:** Laravel 12 · PHP 8.4 · MySQL · Tailwind (TailAdmin) · Alpine.js · TomSelect  
**Terakhir diperbarui:** 5 Oktober 2026

---

## 1. Ringkasan Proyek

Aplikasi **IT Service Management (ITSM)** untuk BPOM yang mencakup:
- Manajemen aset TI (inventaris komputer/jaringan/telekomunikasi)
- Pelaporan kendala/incident oleh user
- Service Request dengan alur approval multi-level
- Dashboard monitoring tiket & SLA
- Autentikasi berbasis role (Admin, Teknisi, Pelapor/User)

---

## 2. Struktur Branch Git

| Branch | Fungsi | Status |
|--------|--------|--------|
| `main` | Produksi / stabil | ✅ Sinkron dengan GitHub |
| `development` | Pengembangan fitur baru | ✅ Sinkron dengan GitHub |
| `testing` | QA / pengujian | ✅ Sinkron dengan GitHub |

**Alur kerja:** `development` → `testing` → `main`. Ketiga branch saat ini berada pada commit yang sama (`8267895`).

### Fitur Tambahan (push manual dari laptop, commit `1318099`)
- **Halaman Choice per Role:** `resources/views/pages/choice/index.blade.php` — menu pilihan fitur sesuai akun user
- **Detail Incident:** `resources/views/incidents/show.blade.php` + Request `UpdateIncident.php`
- **Model baru:** `app/Models/TicketResolution.php` (resolusi tiket)
- **Seeder baru:** `database/seeders/PelaporanSeeder.php`
- **Favicon ITSM:** `public/images/logo/itsmfavicon.svg`

---

## 3. Modul Utama

### 3.1 Autentikasi & User
- **Controller:** `app/Http/Controllers/Auth/LoginController.php`
- **Login manual** (tanpa Breeze): validasi email + password via `Auth::attempt()`
- ⚠️ Kolom `is_active` sudah dihapus dari tabel `users` — jangan gunakan sebagai filter login lagi (sudah diperbaiki di commit `9ae7991`)
- Register user baru otomatis dapat role default "User"

### 3.2 Aset TI (Assets)
- **Model:** `app/Models/Asset.php` — kolom `nama_barang`, `kode_barang`, `nup`, `lokasi`, `penanggung_jawab_id`
- CRUD aset untuk admin; dropdown searchable via **TomSelect** (CDN v2.2.2 dimuat di `layouts/app.blade.php` & `fullscreen-layout.blade.php`)
- Endpoint AJAX: `GET /api/assets/{id}` → auto-fill lokasi aset

### 3.3 Incident / Lapor Kendala
- **Controller:** `app/Http/Controllers/IncidentController.php`
- **Request:** `app/Http/Requests/StoreIncidentRequest.php`
  - Validasi: `asset_id` (required, exists), `deskripsi_masalah` (min 10 karakter), `foto_kendala` (nullable, image max 2MB)
- **Views:** `resources/views/incidents/create.blade.php`, `index.blade.php`
- Nomor aduan otomatis: format `TIK-YYYYMMDD-XXXX`
- Status awal: `"Belum diperiksa"` + tercatat di `TicketHistory`

### 3.4 Service Request
- **Controller:** `app/Http/Controllers/ServiceRequestController.php`
  - Method: `index()`, `all()`, `show()`, `create()`, `store()`
- **Migrasi:** `req_details`, `req_approvals`, `req_sasarans`, `req_indikator`, `req_justifikasis`
- **Views:** `resources/views/service-requests/*` (list, create, show)
- Menu sidebar: **Request Baru** (`service-requests.create`) & **Request Saya** (`service-requests.index`)

### 3.5 Dashboard
- Statistik tiket per status, grafik, recent tickets
- Sudah disesuaikan dengan skema database hasil perombakan (kolom `name` → `nama`, relasi role/department) — commit `0b4df1c`

---

## 4. Skema Database (Hasil Rombak)

Skema digabung dalam satu migration utama:
```
database/migrations/xxxx_create_itsm_schema_tables.php
```
Seeder data awal:
```
database/seeders/ItsmSeeder.php
```

**Tabel inti:** `users`, `assets`, `tickets`, `ticket_histories`, `req_details`, `req_approvals`, `req_sasarans`, `req_indikator`, `req_justifikasis`, `bidangs`, `jabatans`

⚠️ Catatan penting:
- Migration lama sudah dihapus — **jangan jalankan `migrate:rollback`** untuk migration incident/service-request versi lama
- Foreign key harus pakai nama eksplisit unik (contoh: `fk_tickets_pelapor_id`) agar tidak bentrok di MySQL (`Duplicate foreign key constraint name`)
- File database SQLite lama (`tailadmin_laravel`) sudah dikeluarkan dari Git tracking — jangan dilacak lagi

---

## 5. Akun Default Login

Jalankan seeder terlebih dahulu:
```bash
php artisan migrate:fresh --seed
```

| Role | Email | Password |
|------|-------|----------|
| Admin | `admin@bpom.test` | `password` |
| Teknisi | `teknisi@bpom.test` | `password` |
| Pelapor/User | `pelapor@bpom.test` | `password` |

---

## 6. Setup Lokal (Laragon/XAMPP)

```bash
git clone https://github.com/Sultan-ci90/itsm-bpom.git
cd itsm-bpom
git checkout main

composer install
cp .env.example .env
php artisan key:generate

# Setting database MySQL di .env:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_DATABASE=itsm_bpom
# DB_USERNAME=root
# DB_PASSWORD=(kosongkan jika Laragon default)

npm install && npm run build

php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

Akses: **http://127.0.0.1:8000** → login dengan akun di atas.

---

## 7. Riwayat Error & Solusi (Troubleshooting Log)

| # | Error | Penyebab | Solusi |
|---|-------|----------|--------|
| 1 | `could not find driver (sqlite)` | Session driver sqlite tanpa ekstensi | `SESSION_DRIVER=file` di `.env` atau aktifkan `pdo_sqlite` |
| 2 | `NOT NULL constraint failed: tickets.nomor_aduan` | Seeder lama tidak isi kolom wajib | Seeder diperbarui isi lengkap; kolom `title` dibuat nullable |
| 3 | `Duplicate foreign key constraint 'tickets_user_id_foreign'` | FK nama default bentrok antar migration | FK diberi nama eksplisit unik (`fk_tickets_*`) |
| 4 | `Unknown column 'is_active'` saat login | Filter login masih pakai kolom yang sudah dihapus | Hapus `'is_active' => true` dari `Auth::attempt()` (commit `9ae7991`) |
| 5 | Menu Request Baru/Saya → 404 | Route & controller terhapus saat perombakan | Method `index/all/show` dikembalikan + route diperbarui |
| 6 | Conflict merge `tailadmin_laravel` | File DB ikut di-track Git | `git rm --cached tailadmin_laravel`, masuk `.gitignore` |
| 7 | Error case-sensitive `loginController.php` | Linux bedakan huruf besar/kecil | Rename via `git mv` → `Auth/LoginController.php` |
| 8 | Dashboard error `name` vs `nama` | Skema diubah tapi view/controller belum ikut | Disesuaikan di commit `0b4df1c` |

---

## 8. Konvensi & Catatan Pengembangan

1. **Frontend:** Template TailAdmin + Alpine.js. Komponen `<select>` searchable cukup beri class/attribute yang di-init TomSelect (helper global tersedia di layout).
2. **Upload file:** Foto kendala disimpan ke `storage/app/public/kendala_photos` — wajib `php artisan storage:link`.
3. **Nomor tiket:** Generate berurutan per hari (`TIK-YYYYMMDD-XXXX`), query last record dengan pola tanggal.
4. **History tiket:** Setiap perubahan status dicatat ke `ticket_histories` (`status_label`, `keterangan`).
5. **Commit pesan:** Gunakan prefix jelas (`feat:`, `fix:`, `chore:`).
6. **Sebelum push:** Pastikan `php artisan route:list` jalan tanpa error dan halaman utama merespons.

---

## 9. Keamanan ⚠️

- **Segera revoke PAT GitHub** (`ghp_nwP...`) yang pernah dibagikan di chat, lalu buat token baru.
- Jangan commit `.env`, file database, atau kredensial ke repository.
- Ganti password akun default sebelum deploy ke server produksi.

---

## 10. Perintah Berguna (Cheat Sheet)

```bash
# Sinkron repo lokal dengan remote
git pull origin main

# Reset total database + data contoh
php artisan migrate:fresh --seed

# Bersihkan semua cache
php artisan optimize:clear

# Cek daftar route
php artisan route:list

# Build ulang asset frontend
npm run build

# Jalankan server
php artisan serve
```
```

## File: `README.md`

```markdown
# TailAdmin Laravel - Tailwind CSS Free Laravel Dashboard

**TailAdmin Laravel** is a modern, production-ready admin dashboard template powered by **Laravel 12**, **Tailwind CSS v4**, **Alpine.js**, and a clean, modular architecture. TailAdmin is one of the most popular Tailwind CSS dashboard now also available for Larvael. It’s designed for building fast, scalable admin panels, CRM dashboards, SaaS backends, and any data-driven application where clarity and performance matter.
![TailAdmin - Next.js Dashboard Preview](./tailadmin-laravel.png)


## Quick Links

* [✨ Get TailAdmin Laravel](https://tailadmin.com/laravel)
* [📄 Documentation](https://tailadmin.com/docs)
* [⬇️ Download](https://tailadmin.com/download)
* [🌐 Live Demo](https://laravel-demo.tailadmin.com)

Here’s a tighter, more search-friendly version that highlights value and avoids fluff while keeping your structure intact.

## ✨ Key Features

* 🚀 **Laravel 12 Core** - Built on the latest Laravel release with improved routing, security, and Blade templating
* 🎨 **Tailwind CSS v4** - Utility-first styling for rapid, consistent UI development
* ⚡ **Alpine.js Interactivity** - Lightweight reactivity without a heavy JavaScript framework
* 📦 **Vite Build System** - Fast dev server, instant HMR, and optimized production builds
* 📱 **Fully Responsive Layouts** - Smooth, mobile-first design that adapts across all screen sizes
* 🌙 **Built-in Dark Mode** - Ready-to-use modern dark theme for better usability and aesthetics
* 📊 **Advanced UI Components** - Charts, data tables, forms, calendars, modals, and reusable blocks for complex dashboards
* 🎯 **Production-Ready Dashboard UI** - Clean, modern interface crafted for real apps, not placeholder demos

### Other Versions

- [Next.js Version](https://github.com/TailAdmin/free-nextjs-admin-dashboard)
- [React.js Version](https://github.com/TailAdmin/free-react-tailwind-admin-dashboard)
- [Vue.js Version](https://github.com/TailAdmin/vue-tailwind-admin-dashboard)
- [Angular Version](https://github.com/TailAdmin/free-angular-tailwind-dashboard)
- [Laravel Version](https://github.com/TailAdmin/tailadmin-laravel)

## 📋 Requirements
To set up TailAdmin Laravel, make sure your environment includes:

* **PHP 8.2+**
* **Composer** (PHP dependency manager)
* **Node.js 18+** and **npm** (for compiling frontend assets)
* **Database** - Works with SQLite (default), MySQL, or PostgreSQL

### Tailwind CSS Laravel Dashboard

TailAdmin delivers a refined Tailwind CSS Laravel Dashboard experience, combining Laravel’s robust backend with Tailwind’s flexible utility classes. The result is a clean, fast, and customizable dashboard that helps developers build modern admin interfaces without the usual front-end complexity. It’s ideal for teams looking for a Tailwind-powered Laravel starter that stays lightweight and easy to scale.

### Laravel Admin Dashboard

If you’re searching for a dependable Laravel Admin Dashboard template that’s easy to set up and ready for production, TailAdmin fits the job. It offers a polished UI, reusable components, optimized performance, and all the essentials needed to launch dashboards, CRM systems, and internal tools quickly. It gives developers a solid foundation, so projects move faster with fewer decisions to worry about.

### Check Your Environment

Verify your installations:

```bash
php -v
composer -V
node -v
npm -v
```

## 🐳 Docker & Laravel Sail Setup (Official)

TailAdmin Laravel includes pre-configured, official support for **Docker** powered by **Laravel Sail** (PHP 8.4, MySQL 8.0, Redis, and Mailpit).

### Prerequisites
Make sure [Docker Desktop](https://www.docker.com/products/docker-desktop/) is installed and running on your machine.

### Quick Start with Docker & Sail

1. **Clone the repository:**
   ```bash
   git clone https://github.com/TailAdmin/tailadmin-laravel.git
   cd tailadmin-laravel
   ```

2. **Configure environment:**
   ```bash
   cp .env.example .env
   ```
   In your `.env` file, ensure container networking is set:
   ```env
   DB_HOST=mysql
   DB_USERNAME=sail
   DB_PASSWORD=password
   REDIS_HOST=redis
   ```

3. **Install Composer dependencies (if PHP is not installed locally):**
   ```bash
   docker run --rm \
       -u "$(id -u):$(id -g)" \
       -v "$(pwd):/var/www/html" \
       -w /var/www/html \
       laravelsail/php84-composer:latest \
       composer install --ignore-platform-reqs
   ```
   *(Or simply run `composer install` if you have PHP and Composer locally).*

4. **Start Docker containers:**
   ```bash
   ./vendor/bin/sail up -d
   ```

5. **Generate application key & run migrations:**
   ```bash
   ./vendor/bin/sail artisan key:generate
   ./vendor/bin/sail artisan migrate
   ```

6. **Install frontend dependencies & start Vite dev server:**
   ```bash
   ./vendor/bin/sail npm install
   ./vendor/bin/sail npm run dev
   ```

7. **Access the application:**
   - **TailAdmin Dashboard:** [http://localhost](http://localhost) (or [http://localhost:8000](http://localhost:8000) if `APP_PORT=8000`)
   - **Vite Dev Server:** [http://localhost:5173](http://localhost:5173) (auto-proxied with HMR)
   - **Mailpit Web UI:** [http://localhost:8025](http://localhost:8025)

### Convenient Sail Shell Alias
To avoid typing `./vendor/bin/sail` repeatedly, add an alias to your shell profile (`~/.zshrc` or `~/.bashrc`):
```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```
Now you can run:
```bash
sail up -d
sail artisan migrate
sail npm run dev
sail down
```

### Container Networking & Vite Architecture
- **Vite Dev Server (Port 5173)**: Pre-configured in `vite.config.js` with `server.host: "0.0.0.0"` and `server.hmr.host: "localhost"`. This ensures the host browser can access assets directly without `ERR_EMPTY_RESPONSE` connection errors.
- **Volume File Watcher**: File polling (`usePolling: true`) is enabled in `vite.config.js` to guarantee instant hot reload when editing code on macOS, Windows, or Linux host filesystems.
- **Container Database Host**: Inside the Docker bridge network, services communicate via container names. Set `DB_HOST=mysql` and `REDIS_HOST=redis` inside Docker.
- **Tailwind CSS v4**: Seamlessly compiled inside containers via `@tailwindcss/vite` without legacy v3 config conflicts.

---

## 🚀 Quick Start Installation (Local / Native)

### Step 1: Clone the Repository

```bash
git clone https://github.com/TailAdmin/tailadmin-laravel.git
cd tailadmin-laravel
```

### Step 2: Install PHP Dependencies

```bash
composer install
```

This command will install all Laravel dependencies defined in `composer.json`.

### Step 3: Install Node.js Dependencies

```bash
npm install
```

Or if you prefer yarn or pnpm:

```bash
# Using yarn
yarn install

# Using pnpm
pnpm install
```

### Step 4: Environment Configuration

Copy the example environment file:

```bash
cp .env.example .env
```

**For Windows users:**

```bash
copy .env.example .env
```

**Or create it programmatically:**

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

### Step 5: Generate Application Key

```bash
php artisan key:generate
```

This creates a unique encryption key for your application.

### Step 6: Configure Database

#### Option A: Using MySQL/PostgreSQL

Update your `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tailadmin_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Create the database:

```bash
# MySQL
mysql -u root -p -e "CREATE DATABASE tailadmin_db;"

# PostgreSQL
createdb tailadmin_db
```

Run migrations:

```bash
php artisan migrate
```

### Step 7: (Optional) Seed the Database

If you want sample data:

```bash
php artisan db:seed
```

### Step 8: Storage Link

Create a symbolic link for file storage:

```bash
php artisan storage:link
```

## 🏃 Running the Application

### Development Mode (Recommended)

The easiest way to start development is using the built-in script:

```bash
composer run dev
```

This single command starts:
- ✅ Laravel development server (http://localhost:8000)
- ✅ Vite dev server for hot module reloading
- ✅ Queue worker for background jobs
- ✅ Log monitoring

**Access your application at:** [http://localhost:8000](http://localhost:8000)

### Manual Development Setup

If you prefer to run services individually in separate terminal windows:

**Terminal 1 - Laravel Server:**
```bash
php artisan serve
```

**Terminal 2 - Frontend Assets:**
```bash
npm run dev
```

### Building for Production

#### Build Frontend Assets

```bash
npm run build
```

#### Optimize Laravel

```bash
# Clear and cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Optimize autoloader
composer install --optimize-autoloader --no-dev
```

#### Production Environment

Update your `.env` for production:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```


## 🧪 Testing

Run the test suite using Pest:

```bash
composer run test
```

Or manually:

```bash
php artisan test
```

Run with coverage:

```bash
php artisan test --coverage
```

Run specific tests:

```bash
php artisan test --filter=ExampleTest
```

## 📜 Available Commands

### Composer Scripts

```bash
# Start development environment
composer run dev

# Run tests
composer run test

# Code formatting (if configured)
composer run format

# Static analysis (if configured)
composer run analyze
```

### NPM Scripts

```bash
# Start Vite dev server
npm run dev

# Build for production
npm run build

# Preview production build
npm run preview

# Lint JavaScript/TypeScript
npm run lint

# Format code
npm run format
```

### Artisan Commands

```bash
# Start development server
php artisan serve

# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Fresh migrations with seeding
php artisan migrate:fresh --seed

# Generate application key
php artisan key:generate

# Clear all caches
php artisan optimize:clear

# Cache everything for production
php artisan optimize

# Create symbolic link for storage
php artisan storage:link

# Start queue worker
php artisan queue:work

# List all routes
php artisan route:list

# Create a new controller
php artisan make:controller YourController

# Create a new model
php artisan make:model YourModel -m

# Create a new migration
php artisan make:migration create_your_table
```

## 📁 Project Structure

```
tailadmin-laravel/
├── app/                    # Application logic
│   ├── Http/              # Controllers, Middleware, Requests
│   ├── Models/            # Eloquent models
│   └── Providers/         # Service providers
├── bootstrap/             # Framework bootstrap files
├── config/                # Configuration files
├── database/              # Migrations, seeders, factories
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── public/                # Public assets (entry point)
│   ├── build/            # Compiled assets (generated)
│   └── index.php         # Application entry point
├── resources/             # Views and raw assets
│   ├── css/              # Stylesheets (Tailwind)
│   ├── js/               # JavaScript files (Alpine.js)
│   └── views/            # Blade templates
├── routes/                # Route definitions
│   ├── web.php           # Web routes
│   ├── api.php           # API routes
│   └── console.php       # Console routes
├── storage/               # Logs, cache, uploads
│   ├── app/
│   ├── framework/
│   └── logs/
├── tests/                 # Pest test files
│   ├── Feature/
│   └── Unit/
├── docker-compose.yml     # Docker & Laravel Sail configuration
├── .env.example           # Example environment file
├── artisan                # Artisan CLI
├── composer.json          # PHP dependencies
├── package.json           # Node dependencies
├── vite.config.js         # Vite configuration with container networking
└── resources/css/app.css  # Tailwind CSS v4 configuration (@theme)
```

## 🐛 Troubleshooting

### Common Issues

#### "Class not found" errors
```bash
composer dump-autoload
```

#### Permission errors on storage/bootstrap/cache
```bash
chmod -R 775 storage bootstrap/cache
```

#### NPM build errors
```bash
rm -rf node_modules package-lock.json
npm install
```

#### Clear all caches
```bash
php artisan optimize:clear
```

#### Database connection errors
- Check `.env` database credentials
- Ensure database server is running
- Verify database exists

## 🔄 Update Log

### [1.1.2] - 2026-09-02

- **Dependency updates**: FullCalendar upgraded to v7 and ApexCharts / Swiper bumped to latest versions.
- **RTL layout support**: Added right-to-left (RTL) direction support with automatic layout flipping and toggle.
- **Language / RTL switcher**: Added switcher in user dropdown with persistent direction state in `localStorage`.
- **Keyboard & dropdown improvements**: Enhanced dropdown behavior and click-outside handling.
- **Tailwind CSS v4 optimizations**: Applied CSS logical properties across sidebar, tables, header, and components.


### [2026-05-23]

- Added **AI Settings** page to configure models, keys, and token limits.
- Added **Maps** page with MapLibre GL, Leaflet, and iframe styles.
- Added **Vector Maps** page powered by AmCharts 5 geodata (World & USA).
- Added **Radar Charts** page with 3 unique formats.
- Added **Radial Progress Charts** page featuring 4 custom layout templates.
- Introduced new **Bar Charts Five & Six** and **Pie Charts Four & Five**.

### [April 28, 2026]
- Added **AI Dashboard** with token usage and revenue tracking.
- Added **Sales Dashboard** with retention and multi-channel analytics.
- Added **Finance Dashboard** with cashflow and balance management.
- Introduced **6 New Layout variations** for improved UI flexibility.
- Integrated **Advanced Data Visualization** with 7+ new chart types.

### [2026-03-15]
- Fixed PHP 8.5 deprecation warning

### [2025-12-29]
- Added Date Picker in Statistics Chart

## License

Refer to our [LICENSE](https://tailadmin.com/license) page for more information.
```

## File: `app/Helpers/MenuHelper.php`

```php
<?php

namespace App\Helpers;

class MenuHelper
{
    public static function getMainNavItems()
    {
        return [

        // =========================
        // DASHBOARD
        // =========================
        [
            'icon' => 'dashboard',
            'name' => 'Dashboard',
            'path' => '/',
        ],

        // =========================
        // SERVICE REQUEST (ITSM)
        // =========================
        [
            'icon' => 'forms',
            'name' => 'Service Request',
            'subItems' => [
                [
                    'name' => 'Request Baru',
                    'path' => '/requests/create',
                    'pro' => false,
                ],
                [
                    'name' => 'Request Saya',
                    'path' => '/requests',
                    'pro' => false,
                ],
            ],
        ],

        // =========================
        // INCIDENT (LAPOR KENDALA)
        // =========================
        [
            'icon' => 'support-ticket',
            'name' => 'Insiden',
            'subItems' => [
                [
                    'name' => 'Lapor Kendala',
                    'path' => '/incidents/create',
                    'pro' => false,
                ],
                [
                    'name' => 'Daftar Aduan',
                    'path' => '/incidents',
                    'pro' => false,
                ],
            ],
        ],
    ];
    }

    public static function getOthersItems()
    {
         return [

        // =========================
        // ADMINISTRATION
        // =========================
        [
            'icon' => 'user-profile',
            'name' => 'Administration',
            'subItems' => [
                [
                    'name' => 'Semua Request',
                    'path' => '/requests/all',
                    'pro' => false,
                ],
            ],
        ],
    ];
    }

    public static function getMenuGroups()
    {
        return [
            [
                'title' => 'Menu',
                'items' => self::getMainNavItems()
            ],
            [
                'title' => 'Others',
                'items' => self::getOthersItems()
            ]
        ];
    }

    public static function isActive($path)
    {
        return request()->is(ltrim($path, '/'));
    }

    public static function getIconSvg($iconName)
    {
        $icons = [
            'dashboard' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z" fill="currentColor"></path></svg>',

            'ai-assistant' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.75 2.42969V7.70424M9.42261 13.673C10.0259 14.4307 10.9562 14.9164 12 14.9164C13.0438 14.9164 13.9742 14.4307 14.5775 13.673M20 12V18.5C20 19.3284 19.3284 20 18.5 20H5.5C4.67157 20 4 19.3284 4 18.5V12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18.75 2.42969V2.43969M9.50391 9.875L9.50391 9.885M14.4961 9.875V9.885" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>',

            'ecommerce' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.31641 4H3.49696C4.24468 4 4.87822 4.55068 4.98234 5.29112L5.13429 6.37161M5.13429 6.37161L6.23641 14.2089C6.34053 14.9493 6.97407 15.5 7.72179 15.5L17.0833 15.5C17.6803 15.5 18.2205 15.146 18.4587 14.5986L21.126 8.47023C21.5572 7.4795 20.8312 6.37161 19.7507 6.37161H5.13429Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M7.7832 19.5H7.7932M16.3203 19.5H16.3303" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>',

            'calendar' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C8.41421 2 8.75 2.33579 8.75 2.75V3.75H15.25V2.75C15.25 2.33579 15.5858 2 16 2C16.4142 2 16.75 2.33579 16.75 2.75V3.75H18.5C19.7426 3.75 20.75 4.75736 20.75 6V9V19C20.75 20.2426 19.7426 21.25 18.5 21.25H5.5C4.25736 21.25 3.25 20.2426 3.25 19V9V6C3.25 4.75736 4.25736 3.75 5.5 3.75H7.25V2.75C7.25 2.33579 7.58579 2 8 2ZM8 5.25H5.5C5.08579 5.25 4.75 5.58579 4.75 6V8.25H19.25V6C19.25 5.58579 18.9142 5.25 18.5 5.25H16H8ZM19.25 9.75H4.75V19C4.75 19.4142 5.08579 19.75 5.5 19.75H18.5C18.9142 19.75 19.25 19.4142 19.25 19V9.75Z" fill="currentColor"></path></svg>',

            'user-profile' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z" fill="currentColor"></path></svg>',

            'task' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.75586 5.50098C7.75586 5.08676 8.09165 4.75098 8.50586 4.75098H18.4985C18.9127 4.75098 19.2485 5.08676 19.2485 5.50098L19.2485 15.4956C19.2485 15.9098 18.9127 16.2456 18.4985 16.2456H8.50586C8.09165 16.2456 7.75586 15.9098 7.75586 15.4956V5.50098ZM8.50586 3.25098C7.26322 3.25098 6.25586 4.25834 6.25586 5.50098V6.26318H5.50195C4.25931 6.26318 3.25195 7.27054 3.25195 8.51318V18.4995C3.25195 19.7422 4.25931 20.7495 5.50195 20.7495H15.4883C16.7309 20.7495 17.7383 19.7421 17.7383 18.4995L17.7383 17.7456H18.4985C19.7411 17.7456 20.7485 16.7382 20.7485 15.4956L20.7485 5.50097C20.7485 4.25833 19.7411 3.25098 18.4985 3.25098H8.50586ZM16.2383 17.7456H8.50586C7.26322 17.7456 6.25586 16.7382 6.25586 15.4956V7.76318H5.50195C5.08774 7.76318 4.75195 8.09897 4.75195 8.51318V18.4995C4.75195 18.9137 5.08774 19.2495 5.50195 19.2495H15.4883C15.9025 19.2495 16.2383 18.9137 16.2383 18.4995L16.2383 17.7456Z" fill="currentColor"></path></svg>',

            'forms' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5001C19.7427 20.75 20.7501 19.7426 20.7501 18.5V5.5C20.7501 4.25736 19.7427 3.25 18.5001 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H18.5001C18.9143 4.75 19.2501 5.08579 19.2501 5.5V18.5C19.2501 18.9142 18.9143 19.25 18.5001 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V5.5ZM6.25005 9.7143C6.25005 9.30008 6.58583 8.9643 7.00005 8.9643L17 8.96429C17.4143 8.96429 17.75 9.30008 17.75 9.71429C17.75 10.1285 17.4143 10.4643 17 10.4643L7.00005 10.4643C6.58583 10.4643 6.25005 10.1285 6.25005 9.7143ZM6.25005 14.2857C6.25005 13.8715 6.58583 13.5357 7.00005 13.5357H17C17.4143 13.5357 17.75 13.8715 17.75 14.2857C17.75 14.6999 17.4143 15.0357 17 15.0357H7.00005C6.58583 15.0357 6.25005 14.6999 6.25005 14.2857Z" fill="currentColor"></path></svg>',

            'tables' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.25 5.5C3.25 4.25736 4.25736 3.25 5.5 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V18.5C20.75 19.7426 19.7426 20.75 18.5 20.75H5.5C4.25736 20.75 3.25 19.7426 3.25 18.5V5.5ZM5.5 4.75C5.08579 4.75 4.75 5.08579 4.75 5.5V8.58325L19.25 8.58325V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H5.5ZM19.25 10.0833H15.416V13.9165H19.25V10.0833ZM13.916 10.0833L10.083 10.0833V13.9165L13.916 13.9165V10.0833ZM8.58301 10.0833H4.75V13.9165H8.58301V10.0833ZM4.75 18.5V15.4165H8.58301V19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5ZM10.083 19.25V15.4165L13.916 15.4165V19.25H10.083ZM15.416 19.25V15.4165H19.25V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15.416Z" fill="currentColor"></path></svg>',

            'pages' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.50391 4.25C8.50391 3.83579 8.83969 3.5 9.25391 3.5H15.2777C15.4766 3.5 15.6674 3.57902 15.8081 3.71967L18.2807 6.19234C18.4214 6.333 18.5004 6.52376 18.5004 6.72268V16.75C18.5004 17.1642 18.1646 17.5 17.7504 17.5H16.248V17.4993H14.748V17.5H9.25391C8.83969 17.5 8.50391 17.1642 8.50391 16.75V4.25ZM14.748 19H9.25391C8.01126 19 7.00391 17.9926 7.00391 16.75V6.49854H6.24805C5.83383 6.49854 5.49805 6.83432 5.49805 7.24854V19.75C5.49805 20.1642 5.83383 20.5 6.24805 20.5H13.998C14.4123 20.5 14.748 20.1642 14.748 19.75L14.748 19ZM7.00391 4.99854V4.25C7.00391 3.00736 8.01127 2 9.25391 2H15.2777C15.8745 2 16.4468 2.23705 16.8687 2.659L19.3414 5.13168C19.7634 5.55364 20.0004 6.12594 20.0004 6.72268V16.75C20.0004 17.9926 18.9931 19 17.7504 19H16.248L16.248 19.75C16.248 20.9926 15.2407 22 13.998 22H6.24805C5.00541 22 3.99805 20.9926 3.99805 19.75V7.24854C3.99805 6.00589 5.00541 4.99854 6.24805 4.99854H7.00391Z" fill="currentColor"></path></svg>',

            'charts' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.00002 12.0957C4.00002 7.67742 7.58174 4.0957 12 4.0957C16.4183 4.0957 20 7.67742 20 12.0957C20 16.514 16.4183 20.0957 12 20.0957H5.06068L6.34317 18.8132C6.48382 18.6726 6.56284 18.4818 6.56284 18.2829C6.56284 18.084 6.48382 17.8932 6.34317 17.7526C4.89463 16.304 4.00002 14.305 4.00002 12.0957ZM12 2.5957C6.75332 2.5957 2.50002 6.849 2.50002 12.0957C2.50002 14.4488 3.35633 16.603 4.77303 18.262L2.71969 20.3154C2.50519 20.5299 2.44103 20.8525 2.55711 21.1327C2.6732 21.413 2.94668 21.5957 3.25002 21.5957H12C17.2467 21.5957 21.5 17.3424 21.5 12.0957C21.5 6.849 17.2467 2.5957 12 2.5957ZM7.62502 10.8467C6.93467 10.8467 6.37502 11.4063 6.37502 12.0967C6.37502 12.787 6.93467 13.3467 7.62502 13.3467H7.62512C8.31548 13.3467 8.87512 12.787 8.87512 12.0967C8.87512 11.4063 8.31548 10.8467 7.62512 10.8467H7.62502ZM10.75 12.0967C10.75 11.4063 11.3097 10.8467 12 10.8467H12.0001C12.6905 10.8467 13.2501 11.4063 13.2501 12.0967C13.2501 12.787 12.6905 13.3467 12.0001 13.3467H12C11.3097 13.3467 10.75 12.787 10.75 12.0967ZM16.375 10.8467C15.6847 10.8467 15.125 11.4063 15.125 12.0967C15.125 12.787 15.6847 13.3467 16.375 13.3467H16.3751C17.0655 13.3467 17.6251 12.787 17.6251 12.0967C17.6251 11.4063 17.0655 10.8467 16.3751 10.8467H16.375Z" fill="currentColor"></path></svg>',

            'ui-elements' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.665 3.75618C11.8762 3.65061 12.1247 3.65061 12.3358 3.75618L18.7807 6.97853L12.3358 10.2009C12.1247 10.3064 11.8762 10.3064 11.665 10.2009L5.22014 6.97853L11.665 3.75618ZM4.29297 8.19199V16.0946C4.29297 16.3787 4.45347 16.6384 4.70757 16.7654L11.25 20.0365V11.6512C11.1631 11.6205 11.0777 11.5843 10.9942 11.5425L4.29297 8.19199ZM12.75 20.037L19.2933 16.7654C19.5474 16.6384 19.7079 16.3787 19.7079 16.0946V8.19199L13.0066 11.5425C12.9229 11.5844 12.8372 11.6207 12.75 11.6515V20.037ZM13.0066 2.41453C12.3732 2.09783 11.6277 2.09783 10.9942 2.41453L4.03676 5.89316C3.27449 6.27429 2.79297 7.05339 2.79297 7.90563V16.0946C2.79297 16.9468 3.27448 17.7259 4.03676 18.1071L10.9942 21.5857L11.3296 20.9149L10.9942 21.5857C11.6277 21.9024 12.3732 21.9024 13.0066 21.5857L19.9641 18.1071C20.7264 17.7259 21.2079 16.9468 21.2079 16.0946V7.90563C21.2079 7.05339 20.7264 6.27429 19.9641 5.89316L13.0066 2.41453Z" fill="currentColor"></path></svg>',

            'authentication' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14 2.75C14 2.33579 14.3358 2 14.75 2C15.1642 2 15.5 2.33579 15.5 2.75V5.73291L17.75 5.73291H19C19.4142 5.73291 19.75 6.0687 19.75 6.48291C19.75 6.89712 19.4142 7.23291 19 7.23291H18.5L18.5 12.2329C18.5 15.5691 15.9866 18.3183 12.75 18.6901V21.25C12.75 21.6642 12.4142 22 12 22C11.5858 22 11.25 21.6642 11.25 21.25V18.6901C8.01342 18.3183 5.5 15.5691 5.5 12.2329L5.5 7.23291H5C4.58579 7.23291 4.25 6.89712 4.25 6.48291C4.25 6.0687 4.58579 5.73291 5 5.73291L6.25 5.73291L8.5 5.73291L8.5 2.75C8.5 2.33579 8.83579 2 9.25 2C9.66421 2 10 2.33579 10 2.75L10 5.73291L14 5.73291V2.75ZM7 7.23291L7 12.2329C7 14.9943 9.23858 17.2329 12 17.2329C14.7614 17.2329 17 14.9943 17 12.2329L17 7.23291L7 7.23291Z" fill="currentColor"></path></svg>',

            'chat' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.00002 12.0957C4.00002 7.67742 7.58174 4.0957 12 4.0957C16.4183 4.0957 20 7.67742 20 12.0957C20 16.514 16.4183 20.0957 12 20.0957H5.06068L6.34317 18.8132C6.48382 18.6726 6.56284 18.4818 6.56284 18.2829C6.56284 18.084 6.48382 17.8932 6.34317 17.7526C4.89463 16.304 4.00002 14.305 4.00002 12.0957ZM12 2.5957C6.75332 2.5957 2.50002 6.849 2.50002 12.0957C2.50002 14.4488 3.35633 16.603 4.77303 18.262L2.71969 20.3154C2.50519 20.5299 2.44103 20.8525 2.55711 21.1327C2.6732 21.413 2.94668 21.5957 3.25002 21.5957H12C17.2467 21.5957 21.5 17.3424 21.5 12.0957C21.5 6.849 17.2467 2.5957 12 2.5957ZM7.62502 10.8467C6.93467 10.8467 6.37502 11.4063 6.37502 12.0967C6.37502 12.787 6.93467 13.3467 7.62502 13.3467H7.62512C8.31548 13.3467 8.87512 12.787 8.87512 12.0967C8.87512 11.4063 8.31548 10.8467 7.62512 10.8467H7.62502ZM10.75 12.0967C10.75 11.4063 11.3097 10.8467 12 10.8467H12.0001C12.6905 10.8467 13.2501 11.4063 13.2501 12.0967C13.2501 12.787 12.6905 13.3467 12.0001 13.3467H12C11.3097 13.3467 10.75 12.787 10.75 12.0967ZM16.375 10.8467C15.6847 10.8467 15.125 11.4063 15.125 12.0967C15.125 12.787 15.6847 13.3467 16.375 13.3467H16.3751C17.0655 13.3467 17.6251 12.787 17.6251 12.0967C17.6251 11.4063 17.0655 10.8467 16.3751 10.8467H16.375Z" fill="currentColor"></path></svg>',

            'support-ticket' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 17.0518V12C20 7.58174 16.4183 4 12 4C7.58168 4 3.99994 7.58174 3.99994 12V17.0518M19.9998 14.041V19.75C19.9998 20.5784 19.3282 21.25 18.4998 21.25H13.9998M6.5 18.75H5.5C4.67157 18.75 4 18.0784 4 17.25V13.75C4 12.9216 4.67157 12.25 5.5 12.25H6.5C7.32843 12.25 8 12.9216 8 13.75V17.25C8 18.0784 7.32843 18.75 6.5 18.75ZM17.4999 18.75H18.4999C19.3284 18.75 19.9999 18.0784 19.9999 17.25V13.75C19.9999 12.9216 19.3284 12.25 18.4999 12.25H17.4999C16.6715 12.25 15.9999 12.9216 15.9999 13.75V17.25C15.9999 18.0784 16.6715 18.75 17.4999 18.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>',

            'email' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 8.187V17.25C3.5 17.6642 3.83579 18 4.25 18H19.75C20.1642 18 20.5 17.6642 20.5 17.25V8.18747L13.2873 13.2171C12.5141 13.7563 11.4866 13.7563 10.7134 13.2171L3.5 8.187ZM20.5 6.2286C20.5 6.23039 20.5 6.23218 20.5 6.23398V6.24336C20.4976 6.31753 20.4604 6.38643 20.3992 6.42905L12.4293 11.9867C12.1716 12.1664 11.8291 12.1664 11.5713 11.9867L3.60116 6.42885C3.538 6.38481 3.50035 6.31268 3.50032 6.23568C3.50028 6.10553 3.60577 6 3.73592 6H20.2644C20.3922 6 20.4963 6.10171 20.5 6.2286ZM22 6.25648V17.25C22 18.4926 20.9926 19.5 19.75 19.5H4.25C3.00736 19.5 2 18.4926 2 17.25V6.23398C2 6.22371 2.00021 6.2135 2.00061 6.20333C2.01781 5.25971 2.78812 4.5 3.73592 4.5H20.2644C21.2229 4.5 22 5.27697 22.0001 6.23549C22.0001 6.24249 22.0001 6.24949 22 6.25648Z" fill="currentColor"></path></svg>',
        ];

        return $icons[$iconName] ?? '<svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" fill="currentColor"/></svg>';
    }
}
```

## File: `app/Http/Controllers/Auth/LoginController.php`

```php
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.auth.signin', [
            'title' => 'Sign In',
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
                'string',
            ],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt(
            [
                'email' => $credentials['email'],
                'password' => $credentials['password'],
            ],
            $remember
        )) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
        ->route('signin')
        ->with('success', 'Berhasil logout.');
    }
}
```

## File: `app/Http/Controllers/Controller.php`

```php
<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}
```

## File: `app/Http/Controllers/DashboardController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketResolution;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. STATISTIK KARTU (Cards) — dengan perbandingan bulan ini vs bulan lalu
        $bulanIni  = Carbon::now()->format('Y-m');
        $bulanLalu = Carbon::now()->subMonth()->format('Y-m');

        $hitungPerBulan = function ($query) use ($bulanIni, $bulanLalu) {
            return [
                'ini'  => (clone $query)->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$bulanIni])->count(),
                'lalu' => (clone $query)->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$bulanLalu])->count(),
            ];
        };

        $persen = function ($ini, $lalu) {
            if ($lalu == 0) return $ini > 0 ? 100 : 0;
            return round((($ini - $lalu) / $lalu) * 100);
        };

        $totalIncident = Ticket::count();
        $totalRequest = ServiceRequest::count();

        $incBulanan = $hitungPerBulan(Ticket::query());
        $reqBulanan = $hitungPerBulan(ServiceRequest::query());

        $statsDelta = [
            'incident' => ['value' => $incBulanan['ini'], 'delta' => $persen($incBulanan['ini'], $incBulanan['lalu'])],
            'request'  => ['value' => $reqBulanan['ini'],  'delta' => $persen($reqBulanan['ini'], $reqBulanan['lalu'])],
        ];

        // Hitung status incident, default 0 jika tidak ada
        $incidentStatusCounts = Ticket::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');
            
        $statusIncident = [
            'Belum diperiksa' => $incidentStatusCounts['Belum diperiksa'] ?? 0,
            'Sedang diproses' => $incidentStatusCounts['Sedang diproses'] ?? 0,
            'Selesai'         => $incidentStatusCounts['Selesai'] ?? 0,
            'Ditolak'         => $incidentStatusCounts['Ditolak'] ?? 0,
        ];

        // 2. DATA CHART
        // Chart 1: Tren Incident 6 Bulan Terakhir
        $last6Months = [];
        $incidentTrend = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $last6Months[] = $date->format('M Y');
            $incidentTrend[] = Ticket::whereMonth('created_at', $date->month)
                                     ->whereYear('created_at', $date->year)
                                     ->count();
        }

        // Chart 2: Penyelesaian Incident (Internal vs Pihak ke-3)
        $resolutionStats = TicketResolution::selectRaw('jenis_penyelesaian, COUNT(*) as total')
            ->groupBy('jenis_penyelesaian')
            ->pluck('total', 'jenis_penyelesaian');
        $resolutionData = [
            'labels' => array_keys($resolutionStats->toArray()),
            'data'   => array_values($resolutionStats->toArray()),
        ];

        // Chart 3: Request Berdasarkan Jenis Layanan
        $requestByLayanan = ServiceRequest::selectRaw('layanan, COUNT(*) as total')
            ->groupBy('layanan')
            ->pluck('total', 'layanan');
        $layananData = [
            'labels' => array_keys($requestByLayanan->toArray()),
            'data'   => array_values($requestByLayanan->toArray()),
        ];

        // Chart 4: Request Berdasarkan Status
        $requestByStatus = ServiceRequest::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');
        $requestStatusData = [
            'labels' => array_keys($requestByStatus->toArray()),
            'data'   => array_values($requestByStatus->toArray()),
        ];

        // 3. DATA TABEL (Hanya 5 Terbaru untuk performa)
        $recentIncidents = Ticket::with(['asset', 'pelapor'])
            ->latest('created_at')
            ->take(5)
            ->get();

        $recentRequests = ServiceRequest::with(['user'])
            ->latest('created_at')
            ->take(5)
            ->get();

        return view('pages.dashboard.index', compact(
            'totalIncident', 'totalRequest', 'statusIncident', 'statsDelta',
            'last6Months', 'incidentTrend',
            'resolutionData', 'layananData', 'requestStatusData',
            'recentIncidents', 'recentRequests'
        ));
    }
}
```

## File: `app/Http/Controllers/DashboardControllerOLD.php`

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }
}
```

## File: `app/Http/Controllers/IncidentController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncidentRequest;
use App\Models\Asset;
use App\Models\Ticket;
use App\Models\TicketHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\TicketResolution;

class IncidentController extends Controller
{
    public function index(Request $request)
    {
        $query = Ticket::with(['asset', 'pelapor.bidang']);

        if (auth()->user()->isPelapor()) {
            $query->where('pelapor_id', auth()->id());
        }

        if ($request->filled('q')) {
            $term = $request->string('q')->toString();
            $query->where(function ($q) use ($term) {
                $q->where('nomor_aduan', 'like', "%{$term}%")
                  ->orWhere('deskripsi_masalah', 'like', "%{$term}%");
            });
        }

        if ($request->filled('status')) {
            $validStatuses = ['Belum diperiksa', 'Sedang diproses', 'Selesai', 'Ditolak'];
            $status = $request->string('status')->toString();
            if (in_array($status, $validStatuses, true)) {
                $query->where('status', $status);
            }
        }

        $tickets = $query->latest('created_at')->paginate(15)->withQueryString();

        return view('incidents.index', compact('tickets'));
    }

    public function create()
    {
        $assets = Asset::select('id', 'kode_barang', 'nama_barang', 'nup', 'lokasi')
                       ->orderBy('nama_barang')
                       ->get();

        return view('incidents.create', compact('assets'));
    }

    public function store(StoreIncidentRequest $request)
    {
        DB::beginTransaction();
        try {
            $date = Carbon::now()->format('Ymd');
            $lastTicket = Ticket::where('nomor_aduan', 'like', "TIK-{$date}-%")
                                ->lockForUpdate()
                                ->latest('id')
                                ->first();
            $sequence = $lastTicket ? (int) Str::afterLast($lastTicket->nomor_aduan, '-') + 1 : 1;
            $nomorAduan = 'TIK-' . $date . '-' . str_pad($sequence, 4, '0', STR_PAD_LEFT);

            $fotoPath = null;
            if ($request->hasFile('foto_kendala')) {
                $fotoPath = $request->file('foto_kendala')->store('kendala_photos', 'public');
            }

            $ticket = Ticket::create([
                'nomor_aduan' => $nomorAduan,
                'asset_id' => $request->asset_id,
                'pelapor_id' => auth()->id(),
                'tgl_pelaporan' => Carbon::now(),
                'deskripsi_masalah' => $request->deskripsi_masalah,
                'foto_kendala' => $fotoPath,
                'status' => 'Belum diperiksa',
            ]);

            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status_label' => 'aduan dibuat',
                'keterangan' => 'Tiket dibuat oleh ' . auth()->user()->nama . '.',
            ]);

            DB::commit();
            return redirect()
                ->route('incidents.index')
                ->with('success', 'Laporan kendala berhasil dibuat dengan Nomor Aduan: ' . $nomorAduan);

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            if ($e->getCode() === '23000') {
                return back()->withInput()->with('error', 'Terjadi konflik nomor aduan. Silakan coba submit ulang.');
            }
            return back()->withInput()->with('error', 'Gagal membuat laporan: ' . $e->getMessage());
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal membuat laporan: ' . $e->getMessage());
        }
    }



// ... di dalam class IncidentController

public function show(Ticket $ticket)
{
    // KRITIS: Pelapor hanya boleh melihat tiket miliknya sendiri
    if (auth()->user()->isPelapor() && $ticket->pelapor_id !== auth()->id()) {
        abort(403, 'Anda tidak memiliki akses ke tiket ini.');
    }

    // Eager loading untuk mencegah N+1 query
    $ticket->load([
        'asset', 
        'pelapor.bidang', 
        'resolution', 
        'histories' => fn($q) => $q->latest('created_at')
    ]);

    return view('incidents.show', compact('ticket'));
}

public function update(UpdateTicketRequest $request, Ticket $ticket)
{
    // Authorization sudah ditangani di UpdateTicketRequest, tapi kita double check
    if (!auth()->user()->isTeknisi() && !auth()->user()->isAdmin()) {
        abort(403);
    }

    DB::beginTransaction();
    try {
        // 1. Handle Upload Surat Justifikasi (Jika ada)
        $filePath = $ticket->resolution?->file_surat_justifikasi;
        if ($request->hasFile('file_surat_justifikasi')) {
            // Hapus file lama jika ada
            if ($filePath && \Storage::disk('public')->exists($filePath)) {
                \Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file_surat_justifikasi')->store('justifikasi', 'public');
        }

        // 2. Update / Insert ke tabel ticket_resolutions (One-to-One)
        $ticket->resolution()->updateOrCreate(
            ['ticket_id' => $ticket->id],
            [
                'pemeriksa_id' => auth()->id(),
                'jenis_penyelesaian' => $request->jenis_penyelesaian,
                'vendor' => $request->vendor,
                'estimasi_biaya' => $request->estimasi_biaya,
                'tgl_analisa' => $request->tgl_analisa,
                'analisa_teknis' => $request->analisa_teknis,
                'tgl_tindak_lanjut' => $request->tgl_tindak_lanjut,
                'tindak_lanjut_teknis' => $request->tindak_lanjut_teknis,
                'tgl_hasil' => $request->tgl_hasil,
                'hasil' => $request->hasil,
                'file_surat_justifikasi' => $filePath,
            ]
        );

        // 3. Update Status di tabel utama tickets
        $oldStatus = $ticket->status;
        $ticket->update(['status' => $request->status]);

        // 4. Catat History Perubahan
        if ($oldStatus !== $request->status) {
            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status_label' => 'status diubah',
                'keterangan' => 'Status diubah dari "' . $oldStatus . '" menjadi "' . $request->status . '" oleh ' . auth()->user()->nama . '.',
            ]);
        } else {
            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status_label' => 'tindak lanjut diperbarui',
                'keterangan' => 'Data analisa dan tindak lanjut diperbarui oleh ' . auth()->user()->nama . '.',
            ]);
        }

        DB::commit();
        return redirect()->route('incidents.show', $ticket)
                         ->with('success', 'Tiket berhasil diproses dan diperbarui.');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Gagal memproses tiket: ' . $e->getMessage());
    }
}
}
```

## File: `app/Http/Controllers/LocaleController.php`

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    /**
     * Supported locales with their metadata.
     */
    public const SUPPORTED_LOCALES = [
        "en" => [
            "name" => "English",
            "native" => "English (US)",
            "flag" => "us",
            "dir" => "ltr",
        ],
        "ar" => [
            "name" => "Arabic",
            "native" => "العربية",
            "flag" => "sa",
            "dir" => "rtl",
        ],
        "es" => [
            "name" => "Spanish",
            "native" => "Español",
            "flag" => "es",
            "dir" => "ltr",
        ],
        "de" => [
            "name" => "German",
            "native" => "Deutsch",
            "flag" => "de",
            "dir" => "ltr",
        ],
    ];

    /**
     * Switch application locale.
     */
    public function switch(string $locale, Request $request): RedirectResponse
    {
        if (array_key_exists($locale, self::SUPPORTED_LOCALES)) {
            session(["locale" => $locale]);
            cookie()->queue("locale", $locale, 60 * 24 * 365); // 1 year
            $dir = self::SUPPORTED_LOCALES[$locale]["dir"] ?? "ltr";
            session(["dir" => $dir]);
            cookie()->queue("dir", $dir, 60 * 24 * 365);
        }

        return redirect()->back();
    }
}
```

## File: `app/Http/Controllers/ServiceRequestController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use App\Models\ReqDetailZoom;
use App\Models\ReqDetailAkun;
use App\Models\ReqDetailPeminjaman;
use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ServiceRequestController extends Controller
{
    /**
     * Menampilkan daftar request (index)
     */
    public function index(Request $request)
    {
        $query = ServiceRequest::with(['user']);

        // Jika user adalah pelapor, hanya tampilkan request miliknya sendiri
        if (auth()->user()->isPelapor()) {
            $query->where('user_id', auth()->id());
        }

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $validStatuses = ['Diajukan', 'Diproses', 'Selesai', 'Ditolak'];
            $status = $request->string('status')->toString();
            if (in_array($status, $validStatuses, true)) {
                $query->where('status', $status);
            }
        }

        // Pencarian berdasarkan nomor request atau layanan
        if ($request->filled('q')) {
            $term = $request->string('q')->toString();
            $query->where(function ($q) use ($term) {
                $q->where('nomor_request', 'like', "%{$term}%")
                  ->orWhere('layanan', 'like', "%{$term}%");
            });
        }

        $requests = $query->latest('created_at')->paginate(10)->withQueryString();

        return view('requests.index', compact('requests'));
    }

    /**
     * Menampilkan form create request
     */
    public function create()
    {
        $bidangs = Bidang::all();
        $lokasis = [
            'Ruang Rapat Utama',
            'Ruang Rapat Bidang Pengawasan',
            'Ruang Rapat Bidang Regulasi',
            'Aula BPOM',
            'Ruang Tata Usaha',
            'Luar Kantor'
        ];

        return view('requests.create', compact('bidangs', 'lokasis'));
    }

    /**
     * Menyimpan data request baru ke database
     */
    public function store(Request $request)
    {
        // Nama tabel diambil dari model supaya aturan exists selalu cocok
        // (kalau hardcode 'bidang' padahal tabelnya 'bidangs', validasi akan error).
        $bidangTable = (new Bidang)->getTable();

        // 1. Validasi Bersyarat
        $validated = $request->validate([
            'layanan' => 'required|in:zoom,akun,peminjaman,konsultasi,operator',
            'lokasi' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',

            // Validasi khusus Zoom
            'bidang_id' => "required_if:layanan,zoom|nullable|exists:{$bidangTable},id",
            'nama_acara' => 'required_if:layanan,zoom|nullable|string|max:255',
            'jam_mulai' => 'required_if:layanan,zoom|nullable|date_format:H:i',
            'jam_selesai' => 'required_if:layanan,zoom|nullable|date_format:H:i|after:jam_mulai',
            'jenis_acara' => 'required_if:layanan,zoom|nullable|in:Rapat,Webinar,Hybrid',
            'butuh_operator' => 'required_if:layanan,zoom|nullable|in:Ya,Tidak',
            'bentuk_ruangan' => 'required_if:layanan,zoom|nullable|in:Classroom,Shape U,Theater',
            'jumlah_kursi' => 'required_if:layanan,zoom|nullable|integer|min:1',

            // Validasi khusus Akun
            'jenis_pengajuan' => 'required_if:layanan,akun|nullable|in:Reset Password,Buat Akun Baru',
            'sistem_tujuan' => 'required_if:layanan,akun|nullable|in:Srikandi,SIPT',
            'nip_terkait' => 'required_if:layanan,akun|nullable|string|max:50',

            // Validasi khusus Peminjaman
            'jenis_perangkat' => 'required_if:layanan,peminjaman|nullable|string|max:255',
            'tgl_mulai' => 'required_if:layanan,peminjaman|nullable|date',
            'tgl_kembali' => 'required_if:layanan,peminjaman|nullable|date|after_or_equal:tgl_mulai',
            'keperluan' => 'required_if:layanan,peminjaman|nullable|string',
            'lokasi_penggunaan' => 'required_if:layanan,peminjaman|nullable|string|max:100',
        ]);

        // 2. Database Transaction
        DB::beginTransaction();
        try {
            // Generate Nomor Request Otomatis (dikunci agar tidak bentrok saat submit bersamaan)
            $date = Carbon::now()->format('Ymd');
            $lastReq = ServiceRequest::where('nomor_request', 'like', "REQ-{$date}-%")
                ->orderBy('nomor_request', 'desc')
                ->lockForUpdate()
                ->first();
            $sequence = $lastReq ? ((int) substr($lastReq->nomor_request, -4)) + 1 : 1;
            $nomorRequest = 'REQ-' . $date . '-' . str_pad($sequence, 4, '0', STR_PAD_LEFT);

            // Insert ke tabel utama
            $serviceRequest = ServiceRequest::create([
                'nomor_request' => $nomorRequest,
                'user_id' => auth()->id(),
                'layanan' => $validated['layanan'],
                'tgl_request' => Carbon::now(),
                'lokasi' => $validated['lokasi'],
                'deskripsi' => $validated['deskripsi'] ?? null,
                'status' => 'Diajukan',
            ]);

            // 3. Insert ke tabel detail berdasarkan jenis layanan
            if ($validated['layanan'] === 'zoom') {
                ReqDetailZoom::create([
                    'request_id' => $serviceRequest->id,
                    'bidang_id' => $validated['bidang_id'],
                    'nama_acara' => $validated['nama_acara'],
                    'jam_mulai' => $validated['jam_mulai'],
                    'jam_selesai' => $validated['jam_selesai'],
                    'jenis_acara' => $validated['jenis_acara'],
                    'butuh_operator' => $validated['butuh_operator'],
                    'bentuk_ruangan' => $validated['bentuk_ruangan'],
                    'jumlah_kursi' => $validated['jumlah_kursi'],
                ]);
            } elseif ($validated['layanan'] === 'akun') {
                ReqDetailAkun::create([
                    'request_id' => $serviceRequest->id,
                    'jenis_pengajuan' => $validated['jenis_pengajuan'],
                    'sistem_tujuan' => $validated['sistem_tujuan'],
                    'nip_terkait' => $validated['nip_terkait'],
                ]);
            } elseif ($validated['layanan'] === 'peminjaman') {
                ReqDetailPeminjaman::create([
                    'request_id' => $serviceRequest->id,
                    'jenis_perangkat' => $validated['jenis_perangkat'],
                    'tgl_mulai' => $validated['tgl_mulai'],
                    'tgl_kembali' => $validated['tgl_kembali'],
                    'keperluan' => $validated['keperluan'],
                    'lokasi_penggunaan' => $validated['lokasi_penggunaan'],
                ]);
            }

            DB::commit();
            return redirect()->route('requests.index')
                ->with('success', 'Permintaan layanan berhasil diajukan dengan Nomor: ' . $nomorRequest);

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal membuat request layanan', [
                'user_id' => auth()->id(),
                'message' => $e->getMessage(),
                'file' => $e->getFile() . ':' . $e->getLine(),
            ]);

            // Pesan teknis tetap ditampilkan selama tahap debugging;
            // ganti ke pesan umum kalau sudah production.
            return back()->withInput()->with('error', 'Gagal membuat request: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail satu request
     */
    public function show($id)
    {
        $req = ServiceRequest::with('user')->findOrFail($id);

        // Pelapor hanya boleh melihat request miliknya sendiri
        if (auth()->user()->isPelapor() && $req->user_id !== auth()->id()) {
            abort(403);
        }

        return view('requests.show', compact('req'));
    }
}
```

## File: `app/Http/Controllers/SidebarController.php`

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function getMenuData()
    {
        $menuGroups = [
            [
                'title' => 'Menu',
                'items' => [
                    [
                        'icon' => 'grid-icon',
                        'name' => 'Dashboard',
                        'subItems' => [
                            ['name' => 'Ecommerce', 'path' => '/'],
                            ['name' => 'Analytics', 'path' => '/analytics'],
                            ['name' => 'Marketing', 'path' => '/marketing'],
                            ['name' => 'CRM', 'path' => '/crm'],
                            ['name' => 'Stocks', 'path' => '/stocks'],
                            ['name' => 'SaaS', 'path' => '/saas', 'new' => true],
                            ['name' => 'Logistics', 'path' => '/logistics', 'new' => true],
                        ],
                    ],
                    [
                        'icon' => 'bot-icon',
                        'name' => 'AI Assistant',
                        'new' => true,
                        'subItems' => [
                            ['name' => 'Text Generator', 'path' => '/text-generator'],
                            ['name' => 'Image Generator', 'path' => '/image-generator'],
                            ['name' => 'Code Generator', 'path' => '/code-generator'],
                            ['name' => 'Video Generator', 'path' => '/video-generator'],
                        ],
                    ],
                    [
                        'icon' => 'cart-icon',
                        'name' => 'E-commerce',
                        'new' => true,
                        'subItems' => [
                            ['name' => 'Products', 'path' => '/products-list'],
                            ['name' => 'Add Product', 'path' => '/add-product'],
                            ['name' => 'Billing', 'path' => '/billing'],
                            ['name' => 'Invoices', 'path' => '/invoices'],
                            ['name' => 'Single Invoice', 'path' => '/single-invoice'],
                            ['name' => 'Create Invoice', 'path' => '/create-invoice'],
                            ['name' => 'Transactions', 'path' => '/transactions'],
                            ['name' => 'Single Transaction', 'path' => '/single-transaction'],
                        ],
                    ],
                    [
                        'icon' => 'calendar-icon',
                        'name' => 'Calendar',
                        'path' => '/calendar',
                    ],
                    [
                        'icon' => 'user-circle-icon',
                        'name' => 'User Profile',
                        'path' => '/profile',
                    ],
                    [
                        'icon' => 'task-icon',
                        'name' => 'Task',
                        'subItems' => [
                            ['name' => 'List', 'path' => '/task-list', 'pro' => false],
                            ['name' => 'Kanban', 'path' => '/task-kanban', 'pro' => false],
                        ],
                    ],
                    [
                        'icon' => 'list-icon',
                        'name' => 'Forms',
                        'subItems' => [
                            ['name' => 'Form Elements', 'path' => '/form-elements', 'pro' => false],
                            ['name' => 'Form Layout', 'path' => '/form-layout', 'pro' => false],
                        ],
                    ],
                    [
                        'icon' => 'table-icon',
                        'name' => 'Tables',
                        'subItems' => [
                            ['name' => 'Basic Tables', 'path' => '/basic-tables', 'pro' => false],
                            ['name' => 'Data Tables', 'path' => '/data-tables', 'pro' => false],
                        ],
                    ],
                    [
                        'icon' => 'page-icon',
                        'name' => 'Pages',
                        'subItems' => [
                            ['name' => 'File Manager', 'path' => '/file-manager', 'pro' => false],
                            ['name' => 'Pricing Tables', 'path' => '/pricing-tables', 'pro' => false],
                            ['name' => 'Faqs', 'path' => '/faq', 'pro' => false],
                            ['name' => 'API Keys', 'path' => '/api-keys', 'new' => true],
                            ['name' => 'Integrations', 'path' => '/integrations', 'new' => true],
                            ['name' => 'Blank Page', 'path' => '/blank', 'pro' => false],
                            ['name' => '404 Error', 'path' => '/error-404', 'pro' => false],
                            ['name' => '500 Error', 'path' => '/error-500', 'pro' => false],
                            ['name' => '503 Error', 'path' => '/error-503', 'pro' => false],
                            ['name' => 'Coming Soon', 'path' => '/coming-soon', 'pro' => false],
                            ['name' => 'Maintenance', 'path' => '/maintenance', 'pro' => false],
                            ['name' => 'Success', 'path' => '/success', 'pro' => false],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Support',
                'items' => [
                    [
                        'icon' => 'chat-icon',
                        'name' => 'Chat',
                        'path' => '/chat',
                    ],
                    [
                        'icon' => 'call-icon',
                        'name' => 'IT Support',
                        'new' => true,
                        'subItems' => [
                            ['name' => 'Daftar Aduan', 'path' => '/incidents'],
                            ['name' => 'Lapor Kendala', 'path' => '/incidents/create'],
                        ],
                    ],
                    [
                        'icon' => 'mail-icon',
                        'name' => 'Email',
                        'subItems' => [
                            ['name' => 'Inbox', 'path' => '/inbox', 'pro' => false],
                            ['name' => 'Details', 'path' => '/inbox-details', 'pro' => false],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Others',
                'items' => [
                    [
                        'icon' => 'pie-chart-icon',
                        'name' => 'Charts',
                        'subItems' => [
                            ['name' => 'Line Chart', 'path' => '/line-chart', 'pro' => false],
                            ['name' => 'Bar Chart', 'path' => '/bar-chart', 'pro' => false],
                            ['name' => 'Pie Chart', 'path' => '/pie-chart', 'pro' => false],
                        ],
                    ],
                    [
                        'icon' => 'box-cube-icon',
                        'name' => 'UI Elements',
                        'subItems' => [
                            ['name' => 'Alerts', 'path' => '/alerts', 'pro' => false],
                            ['name' => 'Avatar', 'path' => '/avatars', 'pro' => false],
                            ['name' => 'Badge', 'path' => '/badge', 'pro' => false],
                            ['name' => 'Breadcrumb', 'path' => '/breadcrumb', 'pro' => false],
                            ['name' => 'Buttons', 'path' => '/buttons', 'pro' => false],
                            ['name' => 'Buttons Group', 'path' => '/buttons-group', 'pro' => false],
                            ['name' => 'Cards', 'path' => '/cards', 'pro' => false],
                            ['name' => 'Carousel', 'path' => '/carousel', 'pro' => false],
                            ['name' => 'Dropdowns', 'path' => '/dropdowns', 'pro' => false],
                            ['name' => 'Images', 'path' => '/image', 'pro' => false],
                            ['name' => 'Links', 'path' => '/links', 'pro' => false],
                            ['name' => 'List', 'path' => '/list', 'pro' => false],
                            ['name' => 'Modals', 'path' => '/modals', 'pro' => false],
                            ['name' => 'Notification', 'path' => '/notifications', 'pro' => false],
                            ['name' => 'Pagination', 'path' => '/pagination', 'pro' => false],
                            ['name' => 'Popovers', 'path' => '/popovers', 'pro' => false],
                            ['name' => 'Progressbar', 'path' => '/progress-bar', 'pro' => false],
                            ['name' => 'Ribbons', 'path' => '/ribbons', 'pro' => false],
                            ['name' => 'Spinners', 'path' => '/spinners', 'pro' => false],
                            ['name' => 'Tabs', 'path' => '/tabs', 'pro' => false],
                            ['name' => 'Tooltips', 'path' => '/tooltips', 'pro' => false],
                            ['name' => 'Videos', 'path' => '/videos', 'pro' => false],
                        ],
                    ],
                    [
                        'icon' => 'plug-in-icon',
                        'name' => 'Authentication',
                        'subItems' => [
                            ['name' => 'Sign In', 'path' => '/signin', 'pro' => false],
                            ['name' => 'Sign Up', 'path' => '/signup', 'pro' => false],
                            ['name' => 'Reset Password', 'path' => '/reset-password', 'pro' => false],
                            ['name' => 'Two Step Verification', 'path' => '/two-step-verification', 'pro' => false],
                        ],
                    ],
                ],
            ],
        ];

        return view('components.sidebar', compact('menuGroups'));
    }
}
```

## File: `app/Http/Middleware/RoleMiddleware.php`

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        ...$roles
    ): Response {
        $user = $request->user();

        if (!$user || !$user->role) {
            abort(403);
        }

        if (!in_array($user->role->name, $roles)) {
            abort(403);
        }

        return $next($request);
    }
}
```

## File: `app/Http/Middleware/SetLocale.php`

```php
<?php

namespace App\Http\Middleware;

use App\Http\Controllers\LocaleController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = session("locale", $request->cookie("locale", config("app.locale", "en")));

        if (!array_key_exists($locale, LocaleController::SUPPORTED_LOCALES)) {
            $locale = config("app.locale", "en");
        }

        App::setLocale($locale);

        return $next($request);
    }
}
```

## File: `app/Http/Requests/StoreIncidentRequest.php`

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncidentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Sesuaikan dengan policy jika ada
    }

    public function rules(): array
    {
        return [
            'asset_id' => 'required|exists:assets,id',
            'deskripsi_masalah' => 'required|string|min:10',
            'foto_kendala' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ];
    }

    public function messages(): array
    {
        return [
            'asset_id.required' => 'Silakan pilih aset/kendala terlebih dahulu.',
            'asset_id.exists' => 'Aset tidak ditemukan.',
            'deskripsi_masalah.required' => 'Deskripsi masalah wajib diisi.',
            'deskripsi_masalah.min' => 'Deskripsi masalah minimal 10 karakter.',
            'foto_kendala.image' => 'File harus berupa gambar.',
            'foto_kendala.mimes' => 'Format gambar harus jpeg/png/jpg.',
            'foto_kendala.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}
```

## File: `app/Http/Requests/StoreServiceRequestRequest.php`

```php
<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'layanan' => 'required|in:zoom,akun,peminjaman,konsultasi,operator',
            'lokasi' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',

            // --- Validasi Bersyarat untuk ZOOM ---
            'bidang_id' => 'required_if:layanan,zoom|exists:bidang,id',
            'nama_acara' => 'required_if:layanan,zoom|string|max:255',
            'jam_mulai' => 'required_if:layanan,zoom|date_format:H:i',
            'jam_selesai' => 'required_if:layanan,zoom|date_format:H:i|after:jam_mulai',
            'jenis_acara' => 'required_if:layanan,zoom|string|max:50',
            'butuh_operator' => 'required_if:layanan,zoom|in:Ya,Tidak',
            'bentuk_ruangan' => 'required_if:layanan,zoom|string|max:100',
            'jumlah_kursi' => 'required_if:layanan,zoom|integer|min:1',

            // --- Validasi Bersyarat untuk AKUN ---
            'jenis_pengajuan' => 'required_if:layanan,akun|string|max:100',
            'sistem_tujuan' => 'required_if:layanan,akun|string|max:100',
            'nip_terkait' => 'required_if:layanan,akun|string|max:50',

            // --- Validasi Bersyarat untuk PEMINJAMAN ---
            'jenis_perangkat' => 'required_if:layanan,peminjaman|string|max:255',
            'tgl_mulai' => 'required_if:layanan,peminjaman|date|after_or_equal:today',
            'tgl_kembali' => 'required_if:layanan,peminjaman|date|after:tgl_mulai',
            'keperluan' => 'required_if:layanan,peminjaman|string',
            'lokasi_penggunaan' => 'required_if:layanan,peminjaman|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'jam_selesai.after' => 'Jam selesai harus lebih besar dari jam mulai.',
            'tgl_kembali.after' => 'Tanggal kembali harus lebih besar dari tanggal mulai.',
            // Tambahkan custom message lain jika perlu
        ];
    }
}
```

## File: `app/Http/Requests/UpdateIncident.php`

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Hanya teknisi dan admin yang boleh memproses tiket
        return auth()->user()->isTeknisi() || auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'status' => 'required|in:Sedang diproses,Selesai,Ditolak',
            'jenis_penyelesaian' => 'required|in:Internal,Pihak ke-3',
            
            // Validasi Bersyarat: Wajib jika Pihak ke-3
            'vendor' => 'required_if:jenis_penyelesaian,Pihak ke-3|nullable|string|max:150',
            'estimasi_biaya' => 'required_if:jenis_penyelesaian,Pihak ke-3|nullable|numeric|min:0',
            'file_surat_justifikasi' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // Max 5MB

            // Analisa & Tindak Lanjut
            'tgl_analisa' => 'required|date',
            'analisa_teknis' => 'required|string|min:10',
            'tgl_tindak_lanjut' => 'required|date',
            'tindak_lanjut_teknis' => 'required|string|min:10',
            
            // Hasil (Wajib jika status Selesai)
            'tgl_hasil' => 'required_if:status,Selesai|nullable|date',
            'hasil' => 'required_if:status,Selesai|nullable|string|min:10',
        ];
    }

    public function messages(): array
    {
        return [
            'vendor.required_if' => 'Nama vendor wajib diisi jika menggunakan Pihak ke-3.',
            'estimasi_biaya.required_if' => 'Estimasi biaya wajib diisi jika menggunakan Pihak ke-3.',
            'hasil.required_if' => 'Kolom hasil wajib diisi jika status diubah menjadi Selesai.',
        ];
    }
}
```

## File: `app/Models/Asset.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asset extends Model
{
    // KRITIK: Tabel assets tidak punya timestamps sama sekali
    public $timestamps = false;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'merk_type',
        'nup',
        'tgl_terima',
        'jenis_barang',
        'satuan',
        'lokasi',
        'penanggung_jawab_id',
        'status_kondisi',
        'spesifikasi',
        'foto_barang',
    ];

    protected $casts = [
        'tgl_terima' => 'date',
    ];

    public function penanggungJawab(): BelongsTo
    {
        return $this->belongsTo(User::class, 'penanggung_jawab_id');
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'asset_id');
    }
}
```

## File: `app/Models/BanjarCaptchas.php`

```php
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BanjarCaptcha extends Model
{
    protected $table = 'banjar_captchas';
    protected $fillable = ['kata_banjar', 'arti_indonesia'];
}
```

## File: `app/Models/Bidang.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bidang extends Model
{
    /**
     * Nama tabel yang terhubung dengan model ini.
     * KRITIK: Tabel di database Anda bernama 'bidang' (singular), 
     * padahal konvensi Laravel mengharapkan nama tabel plural ('bidangs').
     * Oleh karena itu, kita wajib mendefinisikan properti $table secara eksplisit.
     */
    protected $table = 'bidang';

    /**
     * Primary key tabel.
     */
    protected $primaryKey = 'id';

    /**
     * Tipe data primary key.
     */
    protected $keyType = 'int';

    /**
     * KRITIK: Tabel 'bidang' di skema SQL Anda tidak memiliki kolom 
     * 'created_at' dan 'updated_at'. Jika ini tidak diset false, 
     * Laravel akan melempar error SQL saat melakukan insert/update.
     */
    public $timestamps = false;

    /**
     * Kolom yang boleh diisi secara massal (Mass Assignment).
     * Ini penting untuk keamanan agar tidak ada kolom lain yang bisa disusupi.
     */
    protected $fillable = [
        'nama_bidang',
    ];

    /**
     * Casting tipe data.
     */
    protected $casts = [
        'id' => 'integer',
    ];

    // ==========================================
    // DEFINISI RELASI (RELATIONSHIPS)
    // ==========================================

    /**
     * Relasi One-to-Many: Satu Bidang memiliki banyak User (Pegawai).
     * Mengacu pada foreign key 'bidang_id' di tabel 'users'.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'bidang_id', 'id');
    }

    /**
     * Relasi One-to-Many: Satu Bidang memiliki banyak Request Detail Zoom.
     * Mengacu pada foreign key 'bidang_id' di tabel 'req_detail_zoom'.
     */
    public function reqDetailZooms(): HasMany
    {
        return $this->hasMany(ReqDetailZoom::class, 'bidang_id', 'id');
    }
}
```

## File: `app/Models/Jabatan.php`

```php
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Jabatan extends Model
{
    protected $table = 'jabatan';
    public $timestamps = false;
    protected $fillable = ['nama_jabatan'];
}
```

## File: `app/Models/ReqDetailAkun.php`

```php
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReqDetailAkun extends Model
{
    protected $table = 'req_detail_akun';
    public $timestamps = false;

    protected $fillable = [
        'request_id', 'jenis_pengajuan', 'sistem_tujuan', 'nip_terkait',
    ];

    public function serviceRequest(): BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class, 'request_id');
    }
}
```

## File: `app/Models/ReqDetailZoom.php`

```php
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReqDetailZoom extends Model
{
    protected $table = 'req_detail_zoom';
    public $timestamps = false;

    protected $fillable = [
        'request_id', 'bidang_id', 'nama_acara', 'jam_mulai',
        'jam_selesai', 'jenis_acara', 'butuh_operator',
        'bentuk_ruangan', 'jumlah_kursi',
    ];

    public function serviceRequest(): BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class, 'request_id');
    }

    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
}
```

## File: `app/Models/ReqdetailPeminjaman.php`

```php
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReqDetailPeminjaman extends Model
{
    protected $table = 'req_detail_peminjaman';
    public $timestamps = false;

    protected $fillable = [
        'request_id', 'jenis_perangkat', 'tgl_mulai',
        'tgl_kembali', 'keperluan', 'lokasi_penggunaan',
    ];

    protected $casts = [
        'tgl_mulai' => 'date',
        'tgl_kembali' => 'date',
    ];

    public function serviceRequest(): BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class, 'request_id');
    }
}
```

## File: `app/Models/ServiceRequest.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceRequest extends Model
{
    // KRITIK: Tabel service_requests hanya punya created_at
    const UPDATED_AT = null;

    protected $fillable = [
        'nomor_request',
        'user_id',
        'layanan',
        'tgl_request',
        'lokasi',
        'deskripsi',
        'status',
    ];

    protected $casts = [
        'tgl_request' => 'date',
        'created_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detailZoom(): HasOne
    {
        return $this->hasOne(ReqDetailZoom::class, 'request_id');
    }

    public function detailAkun(): HasOne
    {
        return $this->hasOne(ReqDetailAkun::class, 'request_id');
    }

    public function detailPeminjaman(): HasOne
    {
        return $this->hasOne(ReqDetailPeminjaman::class, 'request_id');
    }
}
```

## File: `app/Models/Ticket.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ticket extends Model
{
    // KRITIK: Tabel tickets hanya punya created_at
    const UPDATED_AT = null;

    protected $fillable = [
        'nomor_aduan',
        'asset_id',
        'pelapor_id',
        'tgl_pelaporan',
        'deskripsi_masalah',
        'foto_kendala',
        'status',
    ];

    protected $casts = [
        'tgl_pelaporan' => 'date',
        'created_at' => 'datetime',
    ];

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function pelapor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pelapor_id');
    }

    public function histories(): HasMany
    {
        return $this->hasMany(TicketHistory::class, 'ticket_id');
    }

    public function resolution(): HasOne
    {
        return $this->hasOne(TicketResolution::class, 'ticket_id');
    }
}
```

## File: `app/Models/TicketHistory.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketHistory extends Model
{
    // KRITIK: Tabel ticket_histories hanya punya created_at
    const UPDATED_AT = null;

    protected $fillable = [
        'ticket_id',
        'status_label',
        'keterangan',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
```

## File: `app/Models/TicketResolution.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketResolution extends Model
{
    // Nama tabel sesuai itsm.sql
    protected $table = 'ticket_resolutions';

    // KRITIK: Tabel ticket_resolutions di itsm.sql TIDAK memiliki kolom created_at/updated_at
    public $timestamps = false;

    protected $fillable = [
        'ticket_id',
        'pemeriksa_id',
        'jenis_penyelesaian',
        'vendor',
        'estimasi_biaya',
        'tgl_analisa',
        'analisa_teknis',
        'tgl_tindak_lanjut',
        'tindak_lanjut_teknis',
        'tgl_hasil',
        'hasil',
        'file_surat_justifikasi',
    ];

    protected $casts = [
        'estimasi_biaya' => 'decimal:2',
        'tgl_analisa' => 'date',
        'tgl_tindak_lanjut' => 'date',
        'tgl_hasil' => 'date',
    ];

    // Relasi ke tabel tickets
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    // Relasi ke tabel users (teknisi yang memeriksa)
    public function pemeriksa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pemeriksa_id');
    }
}
```

## File: `app/Models/TiketResolution.php`

```php
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TicketResolution extends Model
{
    protected $table = 'ticket_resolutions';
    public $timestamps = false; // Tabel ini tidak punya created_at/updated_at di itsm.sql

    protected $fillable = [
        'ticket_id', 'pemeriksa_id', 'jenis_penyelesaian', 'vendor',
        'estimasi_biaya', 'tgl_analisa', 'analisa_teknis',
        'tgl_tindak_lanjut', 'tindak_lanjut_teknis', 'tgl_hasil',
        'hasil', 'file_surat_justifikasi',
    ];

    protected $casts = [
        'estimasi_biaya' => 'decimal:2',
        'tgl_analisa' => 'date',
        'tgl_tindak_lanjut' => 'date',
        'tgl_hasil' => 'date',
    ];

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function pemeriksa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pemeriksa_id');
    }
}
```

## File: `app/Models/User.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nip',
        'nama',
        'email',
        'password',
        'bidang_id',
        'jabatan_id',
        'panggol_id',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => '[REDACTED]',
        ];
    }

    // Relasi
    public function bidang(): BelongsTo { return $this->belongsTo(Bidang::class, 'bidang_id'); }
    public function jabatan(): BelongsTo { return $this->belongsTo(Jabatan::class, 'jabatan_id'); }
    public function panggol(): BelongsTo { return $this->belongsTo(Panggol::class, 'panggol_id'); }

    // Helper Role
    public function isPelapor(): bool { return $this->role === 'pelapor'; }
    public function isTeknisi(): bool { return $this->role === 'teknisi'; }
    public function isAdmin(): bool { return $this->role === 'admin'; }
}
```

## File: `app/Models/panggol.php`

```php
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Panggol extends Model
{
    protected $table = 'panggol';
    public $timestamps = false;
    protected $fillable = ['pangkat', 'golongan'];
}
```

## File: `app/Providers/AppServiceProvider.php`

```php
<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS in production
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
```

## File: `app/View/Components/CalenderArea.php`

```php
<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CalenderArea extends Component
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
        return view('components.calender-area');
    }
}
```

## File: `app/View/Components/common/CommonGridShape.php`

```php
<?php

namespace App\View\Components\common;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommonGridShape extends Component
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
        return view('components.common.common-grid-shape');
    }
}
```

## File: `app/View/Components/common/ComponentCard.php`

```php
<?php

namespace App\View\Components\common;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ComponentCard extends Component
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
        return view('components.common.component-card');
    }
}
```

## File: `app/View/Components/common/DropdownMenu.php`

```php
<?php

namespace App\View\Components\common;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownMenu extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.common.dropdown-menu');
    }
}
```

## File: `app/View/Components/common/PageBreadcrumb.php`

```php
<?php

namespace App\View\Components\common;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageBreadcrumb extends Component
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
        return view('components.common.page-breadcrumb');
    }
}
```

## File: `app/View/Components/common/Preloader.php`

```php
<?php

namespace App\View\Components\common;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Preloader extends Component
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
        return view('components.common.preloader');
    }
}
```

## File: `app/View/Components/common/TableDropdown.php`

```php
<?php

namespace App\View\Components\common;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableDropdown extends Component
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
        return view('components.common.table-dropdown');
    }
}
```

## File: `app/View/Components/common/ThemeToggle.php`

```php
<?php

namespace App\View\Components\common;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ThemeToggle extends Component
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
        return view('components.common.theme-toggle');
    }
}
```

## File: `app/View/Components/ecommerce/CustomerDemographic.php`

```php
<?php

namespace App\View\Components\ecommerce;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomerDemographic extends Component
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
        return view('components.ecommerce.customer-demographic');
    }
}
```

## File: `app/View/Components/ecommerce/EcommerceMetrics.php`

```php
<?php

namespace App\View\Components\ecommerce;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EcommerceMetrics extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.ecommerce.ecommerce-metrics');
    }
}
```

## File: `app/View/Components/ecommerce/MonthlySale.php`

```php
<?php

namespace App\View\Components\ecommerce;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MonthlySale extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.ecommerce.monthly-sale');
    }
}
```

## File: `app/View/Components/ecommerce/MonthlyTarget.php`

```php
<?php

namespace App\View\Components\ecommerce;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MonthlyTarget extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.ecommerce.monthly-target');
    }
}
```

## File: `app/View/Components/ecommerce/RecentOrders.php`

```php
<?php

namespace App\View\Components\ecommerce;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RecentOrders extends Component
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
        return view('components.ecommerce.recent-orders');
    }
}
```

## File: `app/View/Components/ecommerce/StatisticsChart.php`

```php
<?php

namespace App\View\Components\ecommerce;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatisticsChart extends Component
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
        return view('components.ecommerce.statistics-chart');
    }
}
```

## File: `app/View/Components/form/DatePicker.php`

```php
<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DatePicker extends Component
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
        return view('components.form.date-picker');
    }
}
```

## File: `app/View/Components/form/FormElements/CheckboxComponent.php`

```php
<?php

namespace App\View\Components\form\FormElements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CheckboxComponent extends Component
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
        return view('components.form.form-elements.checkbox-component');
    }
}
```

## File: `app/View/Components/form/FormElements/DefaultInputs.php`

```php
<?php

namespace App\View\Components\form\FormElements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DefaultInputs extends Component
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
        return view('components.form.form-elements.default-inputs');
    }
}
```

## File: `app/View/Components/form/FormElements/Dropzone.php`

```php
<?php

namespace App\View\Components\form\FormElements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropzone extends Component
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
        return view('components.form.form-elements.dropzone');
    }
}
```

## File: `app/View/Components/form/FormElements/FileInputExample.php`

```php
<?php

namespace App\View\Components\form\FormElements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FileInputExample extends Component
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
        return view('components.form.form-elements.file-input-example');
    }
}
```

## File: `app/View/Components/form/FormElements/InputGroup.php`

```php
<?php

namespace App\View\Components\form\FormElements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputGroup extends Component
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
        return view('components.form.form-elements.input-group');
    }
}
```

## File: `app/View/Components/form/FormElements/InputStates.php`

```php
<?php

namespace App\View\Components\form\FormElements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputStates extends Component
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
        return view('components.form.form-elements.input-states');
    }
}
```

## File: `app/View/Components/form/FormElements/RadioButtons.php`

```php
<?php

namespace App\View\Components\form\FormElements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioButtons extends Component
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
        return view('components.form.form-elements.radio-buttons');
    }
}
```

## File: `app/View/Components/form/FormElements/SelectInputs.php`

```php
<?php

namespace App\View\Components\form\FormElements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectInputs extends Component
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
        return view('components.form.form-elements.select-inputs');
    }
}
```

## File: `app/View/Components/form/FormElements/TextAreaInputs.php`

```php
<?php

namespace App\View\Components\form\FormElements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextAreaInputs extends Component
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
        return view('components.form.form-elements.text-area-inputs');
    }
}
```

## File: `app/View/Components/form/FormElements/ToggleSwitch.php`

```php
<?php

namespace App\View\Components\form\FormElements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ToggleSwitch extends Component
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
        return view('components.form.form-elements.toggle-switch');
    }
}
```

## File: `app/View/Components/form/input/Radio.php`

```php
<?php

namespace App\View\Components\form\input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Radio extends Component
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
        return view('components.form.input.radio');
    }
}
```

## File: `app/View/Components/form/select/MultipleSelect.php`

```php
<?php

namespace App\View\Components\form\select;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MultipleSelect extends Component
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
        return view('components.form.select.multiple-select');
    }
}
```

## File: `app/View/Components/header/NotificationDropdown.php`

```php
<?php

namespace App\View\Components\header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NotificationDropdown extends Component
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
        return view('components.header.notification-dropdown');
    }
}
```

## File: `app/View/Components/header/UserDropdown.php`

```php
<?php

namespace App\View\Components\header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserDropdown extends Component
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
        return view('components.header.user-dropdown');
    }
}
```

## File: `app/View/Components/profile/AddressCard.php`

```php
<?php

namespace App\View\Components\profile;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddressCard extends Component
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
        return view('components.profile.address-card');
    }
}
```

## File: `app/View/Components/profile/PersonalInfoCard.php`

```php
<?php

namespace App\View\Components\profile;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PersonalInfoCard extends Component
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
        return view('components.profile.personal-info-card');
    }
}
```

## File: `app/View/Components/profile/ProfileCard.php`

```php
<?php

namespace App\View\Components\profile;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileCard extends Component
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
        return view('components.profile.profile-card');
    }
}
```

## File: `app/View/Components/tables/BasicTables/BasicTablesFive.php`

```php
<?php

namespace App\View\Components\tables\BasicTables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BasicTablesFive extends Component
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
        return view('components.tables.basic-tables.basic-tables-five');
    }
}
```

## File: `app/View/Components/tables/BasicTables/BasicTablesFour.php`

```php
<?php

namespace App\View\Components\tables\BasicTables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BasicTablesFour extends Component
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
        return view('components.tables.basic-tables.basic-tables-four');
    }
}
```

## File: `app/View/Components/tables/BasicTables/BasicTablesOne.php`

```php
<?php

namespace App\View\Components\tables\BasicTables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BasicTablesOne extends Component
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
        return view('components.tables.basic-tables.basic-tables-one');
    }
}
```

## File: `app/View/Components/tables/BasicTables/BasicTablesThree.php`

```php
<?php

namespace App\View\Components\tables\BasicTables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BasicTablesThree extends Component
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
        return view('components.tables.basic-tables.basic-tables-three');
    }
}
```

## File: `app/View/Components/tables/BasicTables/BasicTablesTwo.php`

```php
<?php

namespace App\View\Components\tables\BasicTables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BasicTablesTwo extends Component
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
        return view('components.tables.basic-tables.basic-tables-two');
    }
}
```

## File: `app/View/Components/ui/Alert.php`

```php
<?php

namespace App\View\Components\ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
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
        return view('components.ui.alert');
    }
}
```

## File: `app/View/Components/ui/Avatar.php`

```php
<?php

namespace App\View\Components\ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Avatar extends Component
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
        return view('components.ui.avatar');
    }
}
```

## File: `app/View/Components/ui/Badge.php`

```php
<?php

namespace App\View\Components\ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Badge extends Component
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
        return view('components.ui.badge');
    }
}
```

## File: `app/View/Components/ui/Button.php`

```php
<?php

namespace App\View\Components\ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
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
        return view('components.ui.button');
    }
}
```

## File: `app/View/Components/ui/Modal.php`

```php
<?php

namespace App\View\Components\ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    // /**
    //  * Create a new component instance.
    //  */
    // public function __construct()
    // {
    //     //
    // }

    // /**
    //  * Get the view / contents that represent the component.
    //  */
    // public function render(): View|Closure|string
    // {
    //     return view('components.ui.modal');
    // }



        public $isOpen;
        public $showCloseButton;
        public $isFullscreen;
        public $modalId;
    
        /**
         * Create a new component instance.
         */
        public function __construct(
            $isOpen = false,
            $showCloseButton = true,
            $isFullscreen = false,
            $modalId = null
        ) {
            $this->isOpen = $isOpen;
            $this->showCloseButton = $showCloseButton;
            $this->isFullscreen = $isFullscreen;
            $this->modalId = $modalId ?? 'modal-' . uniqid();
        }
    
        /**
         * Get the view / contents that represent the component.
         */
        public function render(): View|Closure|string
        {
            return view('components.ui.modal');
        }
}
```

## File: `app/View/Components/ui/YoutubeEmbed.php`

```php
<?php

namespace App\View\Components\ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class YoutubeEmbed extends Component
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
        return view('components.ui.youtube-embed');
    }
}
```

## File: `artisan`

```text
#!/usr/bin/env php
<?php

use Illuminate\Foundation\Application;
use Symfony\Component\Console\Input\ArgvInput;

define('LARAVEL_START', microtime(true));

// Register the Composer autoloader...
require __DIR__.'/vendor/autoload.php';

// Bootstrap Laravel and handle the command...
/** @var Application $app */
$app = require_once __DIR__.'/bootstrap/app.php';

$status = $app->handleCommand(new ArgvInput);

exit($status);
```

## File: `composer.json`

```json
{
    "$schema": "https://getcomposer.org/schema.json",
    "name": "laravel/laravel",
    "type": "project",
    "description": "The skeleton application for the Laravel framework.",
    "keywords": [
        "laravel",
        "framework"
    ],
    "license": "MIT",
    "require": {
        "php": "^8.3",
        "laravel/framework": "^12.0",
        "laravel/tinker": "^2.10.1"
    },
    "require-dev": {
        "fakerphp/faker": "^1.23",
        "laravel/pail": "^1.2.2",
        "laravel/pint": "^1.24",
        "laravel/sail": "^1.41",
        "mockery/mockery": "^1.6",
        "nunomaduro/collision": "^8.6",
        "pestphp/pest": "^4.0",
        "pestphp/pest-plugin-laravel": "^4.0"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Tests\\": "tests/"
        }
    },
    "scripts": {
        "post-autoload-dump": [
            "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
            "@php artisan package:discover --ansi"
        ],
        "post-update-cmd": [
            "@php artisan vendor:publish --tag=laravel-assets --ansi --force"
        ],
        "post-root-package-install": [
            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
        ],
        "post-create-project-cmd": [
            "@php artisan key:generate --ansi",
            "@php -r \"file_exists('database/database.sqlite') || touch('database/database.sqlite');\"",
            "@php artisan migrate --graceful --ansi"
        ],
        "dev": [
            "Composer\\Config::disableProcessTimeout",
            "npx concurrently -c \"#93c5fd,#c4b5fd,#fb7185,#fdba74\" \"php artisan serve\" \"php artisan queue:listen --tries=1\" \"php artisan pail --timeout=0\" \"npm run dev\" --names=server,queue,logs,vite --kill-others"
        ],
        "test": [
            "@php artisan config:clear --ansi",
            "@php artisan test"
        ]
    },
    "extra": {
        "laravel": {
            "dont-discover": []
        }
    },
    "config": {
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true,
        "allow-plugins": {
            "pestphp/pest-plugin": true,
            "php-http/discovery": true
        }
    },
    "minimum-stability": "stable",
    "prefer-stable": true
}
```

## File: `config/app.php`

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', (string) env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
```

## File: `config/auth.php`

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option defines the default authentication "guard" and password
    | reset "broker" for your application. You may change these values
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | which utilizes session storage plus the Eloquent user provider.
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
    |
    | If you have multiple user tables or models you may configure multiple
    | providers to represent the model / table. These providers may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | These configuration options specify the behavior of Laravel's password
    | reset functionality, including the table utilized for token storage
    | and the user provider that is invoked to actually retrieve users.
    |
    | The expiry time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    | The throttle setting is the number of seconds a user must wait before
    | generating more password reset tokens. This prevents the user from
    | quickly generating a very large amount of password reset tokens.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the number of seconds before a password confirmation
    | window expires and users are asked to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
```

## File: `config/cache.php`

```php
<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache store that will be used by the
    | framework. This connection is utilized if another isn't explicitly
    | specified when running a cache operation inside the application.
    |
    */

    'default' => env('CACHE_STORE', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
    | Supported drivers: "array", "database", "file", "memcached",
    |                    "redis", "dynamodb", "octane", "null"
    |
    */

    'stores' => [

        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_CACHE_CONNECTION'),
            'table' => env('DB_CACHE_TABLE', 'cache'),
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION'),
            'lock_table' => env('DB_CACHE_LOCK_TABLE'),
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lock_path' => storage_path('framework/cache/data'),
        ],

        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_CACHE_CONNECTION', 'cache'),
            'lock_connection' => env('REDIS_CACHE_LOCK_CONNECTION', 'default'),
        ],

        'dynamodb' => [
            'driver' => 'dynamodb',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        ],

        'octane' => [
            'driver' => 'octane',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    | When utilizing the APC, database, memcached, Redis, and DynamoDB cache
    | stores, there might be other applications using the same cache. For
    | that reason, you may prefix every cache key to avoid collisions.
    |
    */

    'prefix' => env('CACHE_PREFIX', Str::slug((string) env('APP_NAME', 'laravel')).'-cache-'),

];
```

## File: `config/database.php`

```php
<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlite'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Laravel. You're free to add / remove connections.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DB_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
            'busy_timeout' => null,
            'journal_mode' => null,
            'synchronous' => null,
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                (PHP_VERSION_ID >= 80500 ? Pdo\Mysql::ATTR_SSL_CA : PDO::MYSQL_ATTR_SSL_CA) => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mariadb' => [
            'driver' => 'mariadb',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                (PHP_VERSION_ID >= 80500 ? Pdo\Mysql::ATTR_SSL_CA : PDO::MYSQL_ATTR_SSL_CA) => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run on the database.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as Memcached. You may define your connection settings here.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug((string) env('APP_NAME', 'laravel')).'-database-'),
            'persistent' => env('REDIS_PERSISTENT', false),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
```

## File: `config/filesystems.php`

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
```

## File: `config/logging.php`

```php
<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that is utilized to write
    | messages to your logs. The value provided here should match one of
    | the channels present in the list of "channels" configured below.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        'trace' => env('LOG_DEPRECATIONS_TRACE', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Laravel
    | utilizes the Monolog PHP logging library, which includes a variety
    | of powerful log handlers and formatters that you're free to use.
    |
    | Available drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog", "custom", "stack"
    |
    */

    'channels' => [

        'stack' => [
            'driver' => 'stack',
            'channels' => explode(',', (string) env('LOG_STACK', 'single')),
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => env('LOG_DAILY_DAYS', 14),
            'replace_placeholders' => true,
        ],

        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => env('LOG_SLACK_USERNAME', 'Laravel Log'),
            'emoji' => env('LOG_SLACK_EMOJI', ':boom:'),
            'level' => env('LOG_LEVEL', 'critical'),
            'replace_placeholders' => true,
        ],

        'papertrail' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
                'connectionString' => 'tls://'.env('PAPERTRAIL_URL').':'.env('PAPERTRAIL_PORT'),
            ],
            'processors' => [PsrLogMessageProcessor::class],
        ],

        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => StreamHandler::class,
            'handler_with' => [
                'stream' => 'php://stderr',
            ],
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'processors' => [PsrLogMessageProcessor::class],
        ],

        'syslog' => [
            'driver' => 'syslog',
            'level' => env('LOG_LEVEL', 'debug'),
            'facility' => env('LOG_SYSLOG_FACILITY', LOG_USER),
            'replace_placeholders' => true,
        ],

        'errorlog' => [
            'driver' => 'errorlog',
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,
        ],

        'emergency' => [
            'path' => storage_path('logs/laravel.log'),
        ],

    ],

];
```

## File: `config/mail.php`

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send all email
    | messages unless another mailer is explicitly specified when sending
    | the message. All additional mailers can be configured within the
    | "mailers" array. Examples of each type of mailer are provided.
    |
    */

    'default' => env('MAIL_MAILER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of mail "transport" drivers that can be used
    | when delivering an email. You may specify which one you're using for
    | your mailers below. You may also add additional mailers if needed.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "resend", "log", "array",
    |            "failover", "roundrobin"
    |
    */

    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'scheme' => env('MAIL_SCHEME'),
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url((string) env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
            'retry_after' => 60,
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
            'retry_after' => 60,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all emails sent by your application to be sent from
    | the same address. Here you may specify a name and address that is
    | used globally for all emails that are sent by your application.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

];
```

## File: `config/queue.php`

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Laravel's queue supports a variety of backends via a single, unified
    | API, giving you convenient access to each backend using identical
    | syntax for each. The default queue connection is defined below.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection options for every queue backend
    | used by your application. An example configuration is provided for
    | each backend supported by Laravel. You're also free to add more.
    |
    | Drivers: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_QUEUE_CONNECTION'),
            'table' => env('DB_QUEUE_TABLE', 'jobs'),
            'queue' => env('DB_QUEUE', 'default'),
            'retry_after' => (int) env('DB_QUEUE_RETRY_AFTER', 90),
            'after_commit' => false,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => env('BEANSTALKD_QUEUE_HOST', 'localhost'),
            'queue' => env('BEANSTALKD_QUEUE', 'default'),
            'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
            'block_for' => 0,
            'after_commit' => false,
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'default'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'after_commit' => false,
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_QUEUE_CONNECTION', 'default'),
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => (int) env('REDIS_QUEUE_RETRY_AFTER', 90),
            'block_for' => null,
            'after_commit' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Job Batching
    |--------------------------------------------------------------------------
    |
    | The following options configure the database and table that store job
    | batching information. These options can be updated to any database
    | connection and table which has been defined by your application.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'job_batches',
    ],

    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of failed queue job logging so you
    | can control how and where failed jobs are stored. Laravel ships with
    | support for storing failed jobs in a simple file or in a database.
    |
    | Supported drivers: "database-uuids", "dynamodb", "file", "null"
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'failed_jobs',
    ],

];
```

## File: `config/services.php`

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
```

## File: `config/session.php`

```php
<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Session Driver
    |--------------------------------------------------------------------------
    |
    | This option determines the default session driver that is utilized for
    | incoming requests. Laravel supports a variety of storage options to
    | persist session data. Database storage is a great default choice.
    |
    | Supported: "file", "cookie", "database", "memcached",
    |            "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | Here you may specify the number of minutes that you wish the session
    | to be allowed to remain idle before it expires. If you want them
    | to expire immediately when the browser is closed then you may
    | indicate that via the expire_on_close configuration option.
    |
    */

    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Session Encryption
    |--------------------------------------------------------------------------
    |
    | This option allows you to easily specify that all of your session data
    | should be encrypted before it's stored. All encryption is performed
    | automatically by Laravel and you may use the session like normal.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |--------------------------------------------------------------------------
    | Session File Location
    |--------------------------------------------------------------------------
    |
    | When utilizing the "file" session driver, the session files are placed
    | on disk. The default storage location is defined here; however, you
    | are free to provide another location where they should be stored.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Connection
    |--------------------------------------------------------------------------
    |
    | When using the "database" or "redis" session drivers, you may specify a
    | connection that should be used to manage these sessions. This should
    | correspond to a connection in your database configuration options.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Table
    |--------------------------------------------------------------------------
    |
    | When using the "database" session driver, you may specify the table to
    | be used to store sessions. Of course, a sensible default is defined
    | for you; however, you're welcome to change this to another table.
    |
    */

    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Cache Store
    |--------------------------------------------------------------------------
    |
    | When using one of the framework's cache driven session backends, you may
    | define the cache store which should be used to store the session data
    | between requests. This must match one of your defined cache stores.
    |
    | Affects: "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Session Sweeping Lottery
    |--------------------------------------------------------------------------
    |
    | Some session drivers must manually sweep their storage location to get
    | rid of old sessions from storage. Here are the chances that it will
    | happen on a given request. By default, the odds are 2 out of 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Name
    |--------------------------------------------------------------------------
    |
    | Here you may change the name of the session cookie that is created by
    | the framework. Typically, you should not need to change this value
    | since doing so does not grant a meaningful security improvement.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel')).'-session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Path
    |--------------------------------------------------------------------------
    |
    | The session cookie path determines the path for which the cookie will
    | be regarded as available. Typically, this will be the root path of
    | your application, but you're free to change this when necessary.
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Domain
    |--------------------------------------------------------------------------
    |
    | This value determines the domain and subdomains the session cookie is
    | available to. By default, the cookie will be available to the root
    | domain and all subdomains. Typically, this shouldn't be changed.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | HTTPS Only Cookies
    |--------------------------------------------------------------------------
    |
    | By setting this option to true, session cookies will only be sent back
    | to the server if the browser has a HTTPS connection. This will keep
    | the cookie from being sent to you when it can't be done securely.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | HTTP Access Only
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will prevent JavaScript from accessing the
    | value of the cookie and the cookie will only be accessible through
    | the HTTP protocol. It's unlikely you should disable this option.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Same-Site Cookies
    |--------------------------------------------------------------------------
    |
    | This option determines how your cookies behave when cross-site requests
    | take place, and can be used to mitigate CSRF attacks. By default, we
    | will set this value to "lax" to permit secure cross-site requests.
    |
    | See: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value
    |
    | Supported: "lax", "strict", "none", null
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Partitioned Cookies
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will tie the cookie to the top-level site for
    | a cross-site context. Partitioned cookies are accepted by the browser
    | when flagged "secure" and the Same-Site attribute is set to "none".
    |
    */

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];
```

## File: `database/factories/AssetFactory.php`

```php
<?php

namespace Database\Factories;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    protected $model = Asset::class;

    public function definition(): array
    {
        return [
            'kode_barang' => strtoupper($this->faker->unique()->bothify('KB-####??')),
            'nama_barang' => $this->faker->randomElement([
                'Laptop Lenovo ThinkPad', 'Printer Epson L3210', 'Proyektor Epson EB-X51',
                'Monitor LG 24 Inch', 'PC Desktop Rakitan', 'Scanner Epson DS-670',
                'AC Split Panasonic', 'Televisi Samsung 43"', 'Router Mikrotik',
                'UPS APC 650VA', 'Keyboard & Mouse Wireless', 'Weblog Logitech C270',
            ]) . ' ' . $this->faker->numberBetween(1, 99),
            'nup' => $this->faker->unique()->numerify('##############'),
            'lokasi' => $this->faker->randomElement([
                'Lantai 1 - Ruang Pelayanan', 'Lantai 2 - Ruang IT', 'Lantai 3 - Ruang Kepala',
                'Gudang', 'Ruang Rapat Utama', 'Lobby',
            ]),
        ];
    }
}
```

## File: `database/factories/UserFactory.php`

```php
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
```

## File: `database/migrations/0001_01_01_000001_create_cache_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
```

## File: `database/migrations/2026_09_28_021525_create_sessions_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
```

## File: `database/migrations/2026_09_30_000001_create_itsm_schema_tables.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ---------- 1. TABEL REFERENSI (tanpa FK) ----------
        Schema::create('bidang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bidang', 100);
        });

        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jabatan', 150);
        });

        Schema::create('panggol', function (Blueprint $table) {
            $table->id();
            $table->string('pangkat', 100);
            $table->string('golongan', 20);
        });

        Schema::create('banjar_captchas', function (Blueprint $table) {
            $table->id();
            $table->string('kata_banjar', 255);
            $table->string('arti_indonesia', 255);
            $table->timestamps();
        });

        // ---------- 2. USERS (termasuk field profil baru) ----------
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 30)->unique();
            $table->string('nama', 150);
            $table->string('email', 150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            // Field profil wajib
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->enum('jenkel', ['L', 'P']);
            $table->enum('status_kepegawaian', ['PNS', 'PPPK', 'Honorer', 'Lainnya']);
            $table->enum('status_pernikahan', ['Belum Menikah', 'Menikah', 'Janda', 'Duda']);
            $table->string('no_telp', 20);
            $table->text('alamat');
            $table->string('jabatan_fungsional', 150)->nullable();

            // Relasi referensi
            $table->foreignId('bidang_id')->nullable()->constrained('bidang')->nullOnDelete();
            $table->foreignId('jabatan_id')->nullable()->constrained('jabatan')->nullOnDelete();
            $table->foreignId('panggol_id')->nullable()->constrained('panggol')->nullOnDelete();

            $table->enum('role', ['pelapor', 'teknisi', 'admin'])->default('pelapor');
            $table->timestamps();
        });

        // ---------- 3. ASSETS (tanpa timestamps, sesuai itsm.sql) ----------
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 50);
            $table->string('nama_barang', 150);
            $table->string('merk_type', 100)->nullable();
            $table->string('nup', 50);
            $table->date('tgl_terima')->nullable();
            $table->string('jenis_barang', 100)->nullable();
            $table->string('satuan', 30)->default('buah');
            $table->string('lokasi', 150)->nullable();
            $table->foreignId('penanggung_jawab_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('status_kondisi', ['Baik', 'Rusak'])->default('Baik');
            $table->text('spesifikasi')->nullable();
            $table->string('foto_barang', 255)->nullable();
        });

        // ---------- 4. TICKETS (hanya created_at) ----------
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_aduan', 50)->unique();
            $table->foreignId('asset_id')->constrained('assets')->cascadeOnDelete();
            $table->foreignId('pelapor_id')->constrained('users')->cascadeOnDelete();
            $table->date('tgl_pelaporan');
            $table->text('deskripsi_masalah');
            $table->string('foto_kendala', 255)->nullable();
            $table->enum('status', ['Belum diperiksa', 'Sedang diproses', 'Selesai', 'Ditolak'])->default('Belum diperiksa');
            $table->timestamp('created_at')->useCurrent();
        });

        // ---------- 5. TICKET RESOLUTIONS (tanpa timestamps) ----------
        Schema::create('ticket_resolutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->unique()->constrained('tickets')->cascadeOnDelete();
            $table->foreignId('pemeriksa_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('jenis_penyelesaian', ['Internal', 'Pihak ke-3'])->default('Internal');
            $table->string('vendor', 150)->nullable();
            $table->decimal('estimasi_biaya', 12, 2)->nullable();
            $table->date('tgl_analisa')->nullable();
            $table->text('analisa_teknis')->nullable();
            $table->date('tgl_tindak_lanjut')->nullable();
            $table->text('tindak_lanjut_teknis')->nullable();
            $table->date('tgl_hasil')->nullable();
            $table->text('hasil')->nullable();
            $table->string('file_surat_justifikasi', 255)->nullable();
        });

        // ---------- 6. TICKET HISTORIES (hanya created_at) ----------
        Schema::create('ticket_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained('tickets')->cascadeOnDelete();
            $table->string('status_label', 100);
            $table->text('keterangan')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        // ---------- 7. SERVICE REQUESTS (hanya created_at) ----------
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_request', 50)->unique();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('layanan', 100);
            $table->date('tgl_request');
            $table->string('lokasi', 100);
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['Diajukan', 'Diproses', 'Selesai', 'Ditolak'])->default('Diajukan');
            $table->timestamp('created_at')->useCurrent();
        });

        // ---------- 8. DETAIL REQUEST (tanpa timestamps) ----------
        Schema::create('req_detail_zoom', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->unique()->constrained('service_requests')->cascadeOnDelete();
            $table->foreignId('bidang_id')->nullable()->constrained('bidang')->nullOnDelete();
            $table->string('nama_acara', 255);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('jenis_acara', 50)->nullable();
            $table->enum('butuh_operator', ['Ya', 'Tidak'])->default('Tidak');
            $table->string('bentuk_ruangan', 100)->nullable();
            $table->integer('jumlah_kursi')->nullable();
        });

        Schema::create('req_detail_akun', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->unique()->constrained('service_requests')->cascadeOnDelete();
            $table->string('jenis_pengajuan', 100)->nullable();
            $table->string('sistem_tujuan', 100)->nullable();
            $table->string('nip_terkait', 50)->nullable();
        });

        Schema::create('req_detail_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->unique()->constrained('service_requests')->cascadeOnDelete();
            $table->string('jenis_perangkat', 255);
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->text('keperluan')->nullable();
            $table->string('lokasi_penggunaan', 100)->nullable();
        });
    }

    public function down(): void
    {
        // Urutan drop wajib kebalikan dari pembuatan
        Schema::dropIfExists('req_detail_peminjaman');
        Schema::dropIfExists('req_detail_akun');
        Schema::dropIfExists('req_detail_zoom');
        Schema::dropIfExists('service_requests');
        Schema::dropIfExists('ticket_histories');
        Schema::dropIfExists('ticket_resolutions');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('assets');
        Schema::dropIfExists('users');
        Schema::dropIfExists('banjar_captchas');
        Schema::dropIfExists('panggol');
        Schema::dropIfExists('jabatan');
        Schema::dropIfExists('bidang');
    }
};
```

## File: `database/seeders/DatabaseSeeder.php`

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ItsmSeeder::class);
    }
}
```

## File: `database/seeders/DummyDataSeeder.php`

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Ambil ID yang valid dari database
        $assetIds = DB::table('assets')->pluck('id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();
        $bidangIds = DB::table('bidang')->pluck('id')->toArray();
        $teknisiIds = DB::table('users')->whereIn('role', ['admin', 'teknisi'])->pluck('id')->toArray();

        // Distribusi status yang realistis
        $ticketStatuses = ['Belum diperiksa', 'Sedang diproses', 'Selesai', 'Ditolak'];
        $ticketWeights = [20, 30, 40, 10]; 
        
        $requestStatuses = ['Diajukan', 'Diproses', 'Selesai', 'Ditolak'];
        $requestWeights = [15, 25, 50, 10];

        $layanans = ['zoom', 'akun', 'peminjaman'];

        DB::beginTransaction();
        try {
            // =========================================================
            // 1. GENERATE 100 INCIDENT (TICKETS)
            // =========================================================
            for ($i = 1; $i <= 100; $i++) {
                $status = $faker->randomElement($ticketStatuses, $ticketWeights);
                $tglPelaporan = $faker->dateTimeBetween('-6 months', 'now');
                $nomorAduan = 'TIK-' . $tglPelaporan->format('Ymd') . '-' . str_pad($i, 4, '0', STR_PAD_LEFT);
                $pelaporId = $faker->randomElement($userIds);
                $assetId = $faker->randomElement($assetIds);

                // Insert Ticket (TANPA updated_at)
                $ticketId = DB::table('tickets')->insertGetId([
                    'nomor_aduan' => $nomorAduan,
                    'asset_id' => $assetId,
                    'pelapor_id' => $pelaporId,
                    'tgl_pelaporan' => $tglPelaporan->format('Y-m-d'),
                    'deskripsi_masalah' => $faker->paragraph(3),
                    'foto_kendala' => $faker->boolean(20) ? 'dummy_' . $faker->uuid . '.jpg' : null,
                    'status' => $status,
                    'created_at' => $tglPelaporan,
                ]);

                // Insert History Awal
                DB::table('ticket_histories')->insert([
                    'ticket_id' => $ticketId,
                    'status_label' => 'aduan dibuat',
                    'keterangan' => 'Tiket dibuat oleh sistem (dummy data).',
                    'created_at' => $tglPelaporan,
                ]);

                // Jika status bukan 'Belum diperiksa' dan bukan 'Ditolak', buat Resolution
                if (in_array($status, ['Sedang diproses', 'Selesai'])) {
                    $jenisPenyelesaian = $faker->randomElement(['Internal', 'Pihak ke-3']);
                    $tglAnalisa = $faker->dateTimeBetween($tglPelaporan, now());
                    
                    DB::table('ticket_resolutions')->insert([
                        'ticket_id' => $ticketId,
                        'pemeriksa_id' => $faker->randomElement($teknisiIds),
                        'jenis_penyelesaian' => $jenisPenyelesaian,
                        'vendor' => $jenisPenyelesaian === 'Pihak ke-3' ? $faker->company() : null,
                        'estimasi_biaya' => $jenisPenyelesaian === 'Pihak ke-3' ? $faker->numberBetween(500000, 15000000) : null,
                        'tgl_analisa' => $tglAnalisa->format('Y-m-d'),
                        'analisa_teknis' => $faker->paragraph(2),
                        'tgl_tindak_lanjut' => $tglAnalisa->modify('+2 days')->format('Y-m-d'),
                        'tindak_lanjut_teknis' => $faker->paragraph(2),
                        'tgl_hasil' => $status === 'Selesai' ? $tglAnalisa->modify('+5 days')->format('Y-m-d') : null,
                        'hasil' => $status === 'Selesai' ? $faker->paragraph(2) : null,
                        'file_surat_justifikasi' => $jenisPenyelesaian === 'Pihak ke-3' ? 'justifikasi_' . $faker->uuid . '.pdf' : null,
                    ]);

                    DB::table('ticket_histories')->insert([
                        'ticket_id' => $ticketId,
                        'status_label' => 'status diubah',
                        'keterangan' => "Status diubah menjadi '{$status}' oleh teknisi.",
                        'created_at' => now(),
                    ]);
                }
            }

            // =========================================================
            // 2. GENERATE 100 SERVICE REQUESTS
            // =========================================================
            for ($i = 1; $i <= 100; $i++) {
                $status = $faker->randomElement($requestStatuses, $requestWeights);
                $layanan = $faker->randomElement($layanans);
                $tglRequest = $faker->dateTimeBetween('-6 months', 'now');
                $nomorRequest = 'REQ-' . $tglRequest->format('Ymd') . '-' . str_pad($i, 4, '0', STR_PAD_LEFT);
                $userId = $faker->randomElement($userIds);

                // Insert Service Request (TANPA updated_at)
                $requestId = DB::table('service_requests')->insertGetId([
                    'nomor_request' => $nomorRequest,
                    'user_id' => $userId,
                    'layanan' => $layanan,
                    'tgl_request' => $tglRequest->format('Y-m-d'),
                    'lokasi' => $faker->randomElement(['Ruang Rapat Utama', 'Ruang Tata Usaha', 'Ruang IT', 'Aula BPOM']),
                    'deskripsi' => $faker->sentence(5),
                    'status' => $status,
                    'created_at' => $tglRequest,
                ]);

                // Insert Detail berdasarkan jenis layanan
                if ($layanan === 'zoom') {
                    DB::table('req_detail_zoom')->insert([
                        'request_id' => $requestId,
                        'bidang_id' => $faker->randomElement($bidangIds),
                        'nama_acara' => $faker->sentence(3),
                        'jam_mulai' => '09:00:00',
                        'jam_selesai' => '11:00:00',
                        'jenis_acara' => $faker->randomElement(['Rapat', 'Webinar', 'Training']),
                        'butuh_operator' => $faker->randomElement(['Ya', 'Tidak']),
                        'bentuk_ruangan' => $faker->randomElement(['Shape U', 'Classroom', 'Theater']),
                        'jumlah_kursi' => $faker->numberBetween(5, 50),
                    ]);
                } elseif ($layanan === 'akun') {
                    DB::table('req_detail_akun')->insert([
                        'request_id' => $requestId,
                        'jenis_pengajuan' => $faker->randomElement(['Buat Akun Baru', 'Reset Password', 'Hapus Akses']),
                        'sistem_tujuan' => $faker->randomElement(['Srikandi', 'SIMPEG', 'E-Office', 'SIPT']),
                        'nip_terkait' => $faker->numerify('##################'),
                    ]);
                } elseif ($layanan === 'peminjaman') {
                    DB::table('req_detail_peminjaman')->insert([
                        'request_id' => $requestId,
                        'jenis_perangkat' => $faker->randomElement(['Laptop', 'Proyektor', 'Kamera', 'Sound System']),
                        'tgl_mulai' => $tglRequest->format('Y-m-d'),
                        'tgl_kembali' => $tglRequest->modify('+3 days')->format('Y-m-d'),
                        'keperluan' => $faker->sentence(3),
                        'lokasi_penggunaan' => $faker->randomElement(['Luar Kantor', 'Ruang Rapat', 'Aula']),
                    ]);
                }
            }

            DB::commit();
            $this->command->info('Berhasil membuat 100 Incident dan 100 Request beserta relasinya!');

        } catch (\Exception $e) {
            DB::rollBack();
            $this->command->error('Gagal membuat data dummy: ' . $e->getMessage());
        }
    }
}
```

## File: `database/seeders/ItsmSeeder.php`

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ItsmSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Referensi Bidang
        DB::table('bidang')->insert([
            ['nama_bidang' => 'Umum (Tata Usaha)'],
            ['nama_bidang' => 'Pengawasan'],
            ['nama_bidang' => 'Regulasi'],
            ['nama_bidang' => 'Sumber Daya Manusia'],
        ]);

        // 2. Referensi Jabatan
        DB::table('jabatan')->insert([
            ['nama_jabatan' => 'Kepala Bidang'],
            ['nama_jabatan' => 'Kasubag'],
            ['nama_jabatan' => 'Staff'],
        ]);

        // 3. Referensi Pangkat & Golongan
        DB::table('panggol')->insert([
            ['pangkat' => 'Pembina Utama Muda', 'golongan' => 'IV/c'],
            ['pangkat' => 'Pembina', 'golongan' => 'IV/a'],
            ['pangkat' => 'Penata', 'golongan' => 'III/c'],
        ]);

        // 4. Data Captcha Banjar (sesuai itsm.sql)
        DB::table('banjar_captchas')->insert([
            ['kata_banjar' => 'Guring', 'arti_indonesia' => 'Tidur'],
            ['kata_banjar' => 'Bungas', 'arti_indonesia' => 'Cantik'],
            ['kata_banjar' => 'Kada', 'arti_indonesia' => 'Tidak'],
            ['kata_banjar' => 'Banyu', 'arti_indonesia' => 'Air'],
            ['kata_banjar' => 'Ganal', 'arti_indonesia' => 'Besar'],
            ['kata_banjar' => 'Halus', 'arti_indonesia' => 'Kecil'],
            ['kata_banjar' => 'Rancak', 'arti_indonesia' => 'Sering'],
            ['kata_banjar' => 'Haur', 'arti_indonesia' => 'Sibuk'],
            ['kata_banjar' => 'Bepander', 'arti_indonesia' => 'Bicara'],
            ['kata_banjar' => 'Supan', 'arti_indonesia' => 'Malu'],
            ['kata_banjar' => 'Bujur', 'arti_indonesia' => 'Benar'],
            ['kata_banjar' => 'Wadai', 'arti_indonesia' => 'Kue'],
            ['kata_banjar' => 'Iwak', 'arti_indonesia' => 'Ikan'],
            ['kata_banjar' => 'Hanyar', 'arti_indonesia' => 'Baru'],
            ['kata_banjar' => 'Lawas', 'arti_indonesia' => 'Lama'],
            ['kata_banjar' => 'Kuitan', 'arti_indonesia' => 'Orang tua'],
            ['kata_banjar' => 'Dangsanak', 'arti_indonesia' => 'Saudara'],
            ['kata_banjar' => 'Tapas', 'arti_indonesia' => 'Cuci'],
            ['kata_banjar' => 'Ulun', 'arti_indonesia' => 'Saya'],
            ['kata_banjar' => 'Pian', 'arti_indonesia' => 'Kamu'],
        ]);

        // 5. User awal untuk testing ketiga role
        $profilDefault = [
            'tempat_lahir' => 'Banjarmasin',
            'tanggal_lahir' => '1990-01-01',
            'jenkel' => 'L',
            'status_kepegawaian' => 'PNS',
            'status_pernikahan' => 'Menikah',
            'no_telp' => '081234567890',
            'alamat' => 'Jl. A. Yani No. 1, Banjarmasin',
            'jabatan_fungsional' => null,
            'bidang_id' => 1,
            'jabatan_id' => 3,
            'panggol_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('users')->insert([
            array_merge($profilDefault, [
                'nip' => '001', 'nama' => 'Admin ITSM',
                'email' => 'admin@bpom.test', 'password' => Hash::make('password'),
                'role' => 'admin', 'jabatan_fungsional' => 'Pranata Komputer',
            ]),
            array_merge($profilDefault, [
                'nip' => '002', 'nama' => 'Teknisi IT',
                'email' => 'teknisi@bpom.test', 'password' => Hash::make('password'),
                'role' => 'teknisi',
            ]),
            array_merge($profilDefault, [
                'nip' => '003', 'nama' => 'Pegawai Pelapor',
                'email' => 'pelapor@bpom.test', 'password' => Hash::make('password'),
                'role' => 'pelapor',
            ]),
        ]);
    }
}
```

## File: `database/seeders/PelaporanSeeder.php`

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelaporSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama jika ada (untuk mencegah duplikat saat di-seed berulang)
        DB::table('users')->where('email', 'pelapor@bpom.test')->delete();

        // Insert akun pelapor baru
        DB::table('users')->insert([
            'nip' => '199001012023011001',
            'nama' => 'Budi Santoso',
            'email' => 'pelapor@bpom.test',
            'password' => Hash::make('password'), // Password: password
            'bidang_id' => null, // Bisa diisi ID bidang jika tabel bidang sudah ada
            'jabatan_id' => null,
            'panggol_id' => null,
            'role' => 'pelapor', // <-- INI KUNCINYA, HANYA STRING/ENUM
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
```

## File: `package.json`

```json
{
    "$schema": "https://json.schemastore.org/package.json",
    "private": true,
    "type": "module",
    "engines": {
        "node": "22.x"
    },
    "scripts": {
        "build": "vite build",
        "dev": "vite",
        "build:watch": "vite build --watch"
    },
    "devDependencies": {
        "@tailwindcss/vite": "^4.1.12",
        "axios": "^1.11.0",
        "concurrently": "^9.0.1",
        "laravel-vite-plugin": "^2.0.0",
        "tailwindcss": "^4.1.12",
        "vite": "^7.0.4"
    },
    "dependencies": {
        "@floating-ui/dom": "^1.7.4",
        "@popperjs/core": "^2.11.8",
        "alpinejs": "^3.14.9",
        "apexcharts": "^7.0.0",
        "flatpickr": "^4.6.13",
        "fullcalendar": "^7.0.2",
        "jsvectormap": "^1.7.0",
        "prismjs": "^1.30.0",
        "swiper": "^14.2.0",
        "temporal-polyfill": "^1.0.4"
    },
    "version": "1.1.2"
}
```

## File: `phpunit.xml`

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="vendor/phpunit/phpunit/phpunit.xsd"
         bootstrap="vendor/autoload.php"
         colors="true"
>
    <testsuites>
        <testsuite name="Unit">
            <directory>tests/Unit</directory>
        </testsuite>
        <testsuite name="Feature">
            <directory>tests/Feature</directory>
        </testsuite>
    </testsuites>
    <source>
        <include>
            <directory>app</directory>
        </include>
    </source>
    <php>
        <env name="APP_ENV" value="testing"/>
        <env name="APP_MAINTENANCE_DRIVER" value="file"/>
        <env name="BCRYPT_ROUNDS" value="4"/>
        <env name="CACHE_STORE" value="array"/>
        <env name="DB_CONNECTION" value="sqlite"/>
        <env name="DB_DATABASE" value=":memory:"/>
        <env name="MAIL_MAILER" value="array"/>
        <env name="QUEUE_CONNECTION" value="sync"/>
        <env name="SESSION_DRIVER" value="array"/>
        <env name="PULSE_ENABLED" value="false"/>
        <env name="TELESCOPE_ENABLED" value="false"/>
        <env name="NIGHTWATCH_ENABLED" value="false"/>
    </php>
</phpunit>
```

## File: `resources/css/app.css`

```css
@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap') layer(base);
@import 'prismjs/themes/prism.min.css';
@import 'tailwindcss';


@source '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php';
@source '../../storage/framework/views/*.php';
@source '../**/*.blade.php';
@source '../**/*.js';


@custom-variant dark (&:is(.dark *));

@theme {
  --font-*: initial;
  --font-outfit: Outfit, sans-serif;

  --breakpoint-*: initial;
  --breakpoint-2xsm: 375px;
  --breakpoint-xsm: 425px;
  --breakpoint-3xl: 2000px;
  --breakpoint-sm: 640px;
  --breakpoint-md: 768px;
  --breakpoint-lg: 1024px;
  --breakpoint-xl: 1280px;
  --breakpoint-2xl: 1536px;

  --text-title-2xl: 72px;
  --text-title-2xl--line-height: 90px;
  --text-title-xl: 60px;
  --text-title-xl--line-height: 72px;
  --text-title-lg: 48px;
  --text-title-lg--line-height: 60px;
  --text-title-md: 36px;
  --text-title-md--line-height: 44px;
  --text-title-sm: 30px;
  --text-title-sm--line-height: 38px;
  --text-theme-xl: 20px;
  --text-theme-xl--line-height: 30px;
  --text-theme-sm: 14px;
  --text-theme-sm--line-height: 20px;
  --text-theme-xs: 12px;
  --text-theme-xs--line-height: 18px;

  --color-current: currentColor;
  --color-transparent: transparent;
  --color-white: #ffffff;
  --color-black: #101828;

  --color-brand-25: #f2f7ff;
  --color-brand-50: #ecf3ff;
  --color-brand-100: #dde9ff;
  --color-brand-200: #c2d6ff;
  --color-brand-300: #9cb9ff;
  --color-brand-400: #7592ff;
  --color-brand-500: #465fff;
  --color-brand-600: #3641f5;
  --color-brand-700: #2a31d8;
  --color-brand-800: #252dae;
  --color-brand-900: #262e89;
  --color-brand-950: #161950;

  --color-blue-light-25: #f5fbff;
  --color-blue-light-50: #f0f9ff;
  --color-blue-light-100: #e0f2fe;
  --color-blue-light-200: #b9e6fe;
  --color-blue-light-300: #7cd4fd;
  --color-blue-light-400: #36bffa;
  --color-blue-light-500: #0ba5ec;
  --color-blue-light-600: #0086c9;
  --color-blue-light-700: #026aa2;
  --color-blue-light-800: #065986;
  --color-blue-light-900: #0b4a6f;
  --color-blue-light-950: #062c41;

  --color-gray-25: #fcfcfd;
  --color-gray-50: #f9fafb;
  --color-gray-100: #f2f4f7;
  --color-gray-200: #e4e7ec;
  --color-gray-300: #d0d5dd;
  --color-gray-400: #98a2b3;
  --color-gray-500: #667085;
  --color-gray-600: #475467;
  --color-gray-700: #344054;
  --color-gray-800: #1d2939;
  --color-gray-900: #101828;
  --color-gray-950: #0c111d;
  --color-gray-dark: #1a2231;

  --color-orange-25: #fffaf5;
  --color-orange-50: #fff6ed;
  --color-orange-100: #ffead5;
  --color-orange-200: #fddcab;
  --color-orange-300: #feb273;
  --color-orange-400: #fd853a;
  --color-orange-500: #fb6514;
  --color-orange-600: #ec4a0a;
  --color-orange-700: #c4320a;
  --color-orange-800: #9c2a10;
  --color-orange-900: #7e2410;
  --color-orange-950: #511c10;

  --color-success-25: #f6fef9;
  --color-success-50: #ecfdf3;
  --color-success-100: #d1fadf;
  --color-success-200: #a6f4c5;
  --color-success-300: #6ce9a6;
  --color-success-400: #32d583;
  --color-success-500: #12b76a;
  --color-success-600: #039855;
  --color-success-700: #027a48;
  --color-success-800: #05603a;
  --color-success-900: #054f31;
  --color-success-950: #053321;

  --color-error-25: #fffbfa;
  --color-error-50: #fef3f2;
  --color-error-100: #fee4e2;
  --color-error-200: #fecdca;
  --color-error-300: #fda29b;
  --color-error-400: #f97066;
  --color-error-500: #f04438;
  --color-error-600: #d92d20;
  --color-error-700: #b42318;
  --color-error-800: #912018;
  --color-error-900: #7a271a;
  --color-error-950: #55160c;

  --color-warning-25: #fffcf5;
  --color-warning-50: #fffaeb;
  --color-warning-100: #fef0c7;
  --color-warning-200: #fedf89;
  --color-warning-300: #fec84b;
  --color-warning-400: #fdb022;
  --color-warning-500: #f79009;
  --color-warning-600: #dc6803;
  --color-warning-700: #b54708;
  --color-warning-800: #93370d;
  --color-warning-900: #7a2e0e;
  --color-warning-950: #4e1d09;

  --color-theme-pink-500: #ee46bc;

  --color-theme-purple-500: #7a5af8;

  /* ---- TailAdmin legacy palette (compat) ---- */
  --color-boxdark: #1d2939;        /* gray-800: card/box background in dark mode */
  --color-boxdark-2: #101828;      /* gray-900: deeper surface */
  --color-strokedark: #344054;     /* gray-700: border color in dark mode */
  --color-form-strokedark: #344054;
  --color-form-input: #101828;     /* input background in dark mode */
  --color-dark: #1a2231;

  --shadow-theme-md: 0px 4px 8px -2px rgba(16, 24, 40, 0.1), 0px 2px 4px -2px rgba(16, 24, 40, 0.06);
  --shadow-theme-lg: 0px 12px 16px -4px rgba(16, 24, 40, 0.08),
    0px 4px 6px -2px rgba(16, 24, 40, 0.03);
  --shadow-theme-sm: 0px 1px 3px 0px rgba(16, 24, 40, 0.1), 0px 1px 2px 0px rgba(16, 24, 40, 0.06);
  --shadow-theme-xs: 0px 1px 2px 0px rgba(16, 24, 40, 0.05);
  --shadow-theme-xl: 0px 20px 24px -4px rgba(16, 24, 40, 0.08),
    0px 8px 8px -4px rgba(16, 24, 40, 0.03);
  --shadow-datepicker: -5px 0 0 #262d3c, 5px 0 0 #262d3c;
  --shadow-focus-ring: 0px 0px 0px 4px rgba(70, 95, 255, 0.12);
  --shadow-slider-navigation: 0px 1px 2px 0px rgba(16, 24, 40, 0.1),
    0px 1px 3px 0px rgba(16, 24, 40, 0.1);
  --shadow-tooltip: 0px 4px 6px -2px rgba(16, 24, 40, 0.05),
    -8px 0px 20px 8px rgba(16, 24, 40, 0.05);

  --drop-shadow-4xl: 0 35px 35px rgba(0, 0, 0, 0.25), 0 45px 65px rgba(0, 0, 0, 0.15);

  --z-index-1: 1;
  --z-index-9: 9;
  --z-index-99: 99;
  --z-index-999: 999;
  --z-index-9999: 9999;
  --z-index-99999: 99999;
  --z-index-999999: 999999;
}

/*
  The default border color has changed to `currentColor` in Tailwind CSS v4,
  so we've added these compatibility styles to make sure everything still
  looks the same as it did with Tailwind CSS v3.

  If we ever want to remove these styles, we need to add an explicit border
  color utility to any element that depends on these defaults.
*/
@layer base {
  *,
  ::after,
  ::before,
  ::backdrop,
  ::file-selector-button {
    border-color: var(--color-gray-200, currentColor);
  }
  button:not(:disabled),
  [role='button']:not(:disabled) {
    cursor: pointer;
  }
  body {
    @apply relative font-normal font-outfit z-1 bg-gray-50 dark:bg-gray-900;
  }
}

@utility menu-item {
  @apply relative flex items-center w-full gap-3 px-3 py-2 font-medium rounded-lg text-theme-sm;
}

@utility menu-item-active {
  @apply bg-brand-50 text-brand-500 dark:bg-brand-500/[0.12] dark:text-brand-400;
}

@utility menu-item-inactive {
  @apply text-gray-700 hover:bg-gray-100 group-hover:text-gray-700 dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-gray-300;
}

@utility menu-item-icon {
  @apply text-gray-500 group-hover:text-gray-700 dark:text-gray-400;
}

@utility menu-item-icon-active {
  @apply text-brand-500 dark:text-brand-400;
}

@utility menu-item-icon-inactive {
  @apply text-gray-500 group-hover:text-gray-700 dark:text-gray-400 dark:group-hover:text-gray-300;
}

/* @utility menu-item-arrow {
  @apply relative;
} */

@utility menu-item-arrow-active {
  @apply rotate-180 text-brand-500 dark:text-brand-400;
}

@utility menu-item-arrow-inactive {
  @apply text-gray-500 group-hover:text-gray-700 dark:text-gray-400 dark:group-hover:text-gray-300;
}

@utility menu-dropdown-item {
  @apply relative flex items-center gap-3 rounded-lg px-3 py-2.5 text-theme-sm font-medium;
}

@utility menu-dropdown-item-active {
  @apply bg-brand-50 text-brand-500 dark:bg-brand-500/[0.12] dark:text-brand-400;
}

@utility menu-dropdown-item-inactive {
  @apply text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-white/5;
}

@utility menu-dropdown-item {
  @apply text-theme-sm relative flex items-center gap-3 rounded-lg px-3 py-2.5 font-medium;
}

@utility menu-dropdown-item-active {
  @apply bg-brand-50 text-brand-500 dark:bg-brand-500/[0.12] dark:text-brand-400;
}

@utility menu-dropdown-item-inactive {
  @apply text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-white/5;
}

@utility menu-dropdown-badge {
  @apply text-success-600 dark:text-success-500 block rounded-full px-2.5 py-0.5 text-xs font-medium uppercase;
}

@utility menu-dropdown-badge-active {
  @apply bg-success-100 dark:bg-success-500/20;
}

@utility menu-dropdown-badge-inactive {
  @apply bg-success-50 group-hover:bg-success-100 dark:bg-success-500/15 dark:group-hover:bg-success-500/20;
}

@utility menu-dropdown-badge-pro {
  @apply text-brand-600 dark:text-brand-500 block rounded-full px-2.5 py-0.5 text-xs font-medium uppercase;
}

@utility menu-dropdown-badge-pro-active {
  @apply bg-brand-100 dark:bg-brand-500/20;
}

@utility menu-dropdown-badge-pro-inactive {
  @apply bg-brand-50 group-hover:bg-brand-100 dark:bg-brand-500/15 dark:group-hover:bg-brand-500/20;
}

@utility no-scrollbar {
  /* Chrome, Safari and Opera */
  &::-webkit-scrollbar {
    display: none;
  }
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: none; /* Firefox */
}

@utility custom-scrollbar {
  &::-webkit-scrollbar {
    @apply size-1.5;
  }

  &::-webkit-scrollbar-track {
    @apply rounded-full;
  }

  &::-webkit-scrollbar-thumb {
    @apply bg-gray-200 rounded-full dark:bg-gray-700;
  }
}
.dark .custom-scrollbar::-webkit-scrollbar-thumb {
  background-color: #344054;
}
@layer utilities {
  /* For Remove Date Icon */
  input[type='date']::-webkit-inner-spin-button,
  input[type='time']::-webkit-inner-spin-button,
  input[type='date']::-webkit-calendar-picker-indicator,
  input[type='time']::-webkit-calendar-picker-indicator {
    display: none;
    -webkit-appearance: none;
  }
}

.sidebar:hover {
  width: 290px;
}
.sidebar:hover .logo {
  display: block;
}
.sidebar:hover .logo-icon {
  display: none;
}
.sidebar:hover .sidebar-header {
  justify-content: space-between;
}
.sidebar:hover .menu-group-title {
  display: block;
}
.sidebar:hover .menu-group-icon {
  display: none;
}

.sidebar:hover .menu-item-text {
  display: inline;
}

.sidebar:hover .menu-item-arrow {
  display: block;
}

.sidebar:hover .menu-dropdown {
  display: flex;
}

.tableCheckbox:checked ~ span span {
  @apply opacity-100;
}
.tableCheckbox:checked ~ span {
  @apply border-brand-500 bg-brand-500;
}

/* third-party libraries CSS */
.apexcharts-legend-text {
  @apply !text-gray-700 dark:!text-gray-400;
}

.apexcharts-text {
  @apply !fill-gray-700 dark:!fill-gray-400;
}

.apexcharts-tooltip.apexcharts-theme-light {
  @apply gap-1 !rounded-lg !border-gray-200 p-3 !shadow-theme-sm dark:!border-gray-800 dark:!bg-gray-900;
}

/* .apexcharts-tooltip-marker {
  @apply !mr-1.5 !h-1.5 !w-1.5;
} */
.apexcharts-legend-text {
  @apply !pl-5 !text-gray-700 dark:!text-gray-400;
}
.apexcharts-tooltip-series-group {
  @apply !p-0;
}
.apexcharts-tooltip-y-group {
  @apply !p-0;
}
.apexcharts-tooltip-title {
  @apply !mb-0 !border-b-0 !bg-transparent !p-0 !text-[10px] !leading-4 !text-gray-800 dark:!text-white/90;
}
.apexcharts-tooltip-text {
  @apply !text-theme-xs !text-gray-700 dark:!text-white/90;
}
.apexcharts-tooltip-text-y-value {
  @apply !font-medium;
}

.apexcharts-gridline {
  @apply !stroke-gray-100 dark:!stroke-gray-800;
}
#chartTwo .apexcharts-datalabels-group {
  @apply !-translate-y-24;
}

#chartSeven .apexcharts-datalabels-group .apexcharts-text,
#chartTwo .apexcharts-datalabels-group .apexcharts-text,
#chartThirteen .apexcharts-datalabels-group .apexcharts-text,
#chartTwelve .apexcharts-datalabels-group .apexcharts-text {
  @apply !fill-gray-800 !font-semibold dark:!fill-white/90;
}

#chartSixteen .apexcharts-legend {
  @apply !p-0 !pl-6;
}

.jvm-container {
  @apply !bg-gray-50 dark:!bg-gray-900;
}
.jvm-region.jvm-element {
  @apply !fill-gray-300 hover:!fill-brand-500 dark:!fill-gray-700 dark:hover:!fill-brand-500;
}
.jvm-marker.jvm-element {
  @apply !stroke-gray-200 dark:!stroke-gray-800;
}

.stocks-slider-outer .swiper-button-next:after,
.stocks-slider-outer .swiper-button-prev:after {
  @apply hidden;
}

.stocks-slider-outer .swiper-button-next,
.stocks-slider-outer .swiper-button-prev {
  @apply static! mt-0 h-8 w-9 rounded-full border border-gray-200 !text-gray-700 transition hover:bg-gray-100 dark:border-gray-800 dark:bg-gray-800 dark:text-gray-400!;
}

.stocks-slider-outer .swiper-button-next.swiper-button-disabled,
.stocks-slider-outer .swiper-button-prev.swiper-button-disabled {
  @apply bg-white opacity-50 dark:bg-gray-900;
}

.stocks-slider-outer .swiper-button-next svg,
.stocks-slider-outer .swiper-button-prev svg {
  @apply !h-auto !w-auto;
  fill: none;
}

.flatpickr-wrapper {
  @apply w-full;
}
.flatpickr-calendar {
  @apply mt-2 !rounded-xl bg-black !p-5 !border !border-transparent dark:!border-white/5 !text-gray-500 dark:!bg-gray-dark dark:!text-gray-400 dark:!shadow-theme-xl 2xsm:!w-auto;
}
.flatpickr-time input {
  background-color: #f9fafb !important;
}
.flatpickr-months .flatpickr-prev-month:hover svg,
.flatpickr-months .flatpickr-next-month:hover svg {
  @apply stroke-brand-500;
}
.flatpickr-calendar.arrowTop:before,
.flatpickr-calendar.arrowTop:after {
  @apply hidden;
}
.flatpickr-current-month .cur-month,
.flatpickr-current-month input.cur-year {
  @apply !h-auto !pt-0 !text-lg !font-medium !text-gray-800 dark:!text-white/90;
}

.flatpickr-prev-month,
.flatpickr-next-month {
  @apply !p-0;
}

.flatpickr-weekdays {
  @apply h-auto mt-6 mb-4;
}

.flatpickr-weekday {
  @apply !text-theme-sm !font-medium !text-gray-500 dark:!text-gray-400;
}

.flatpickr-day {
  @apply !flex !items-center !text-theme-sm !font-medium !text-gray-800 dark:!text-white/90 dark:hover:!border-gray-300 dark:hover:!bg-gray-900;
}
.flatpickr-day.nextMonthDay,
.flatpickr-day.prevMonthDay {
  @apply !text-gray-400;
}
.flatpickr-months .flatpickr-prev-month,
.flatpickr-months .flatpickr-next-month {
  @apply !top-7 dark:!fill-white dark:!text-white;
}
.flatpickr-months .flatpickr-prev-month.flatpickr-prev-month,
.flatpickr-months .flatpickr-next-month.flatpickr-prev-month {
  @apply !left-7 rtl:!left-auto rtl:!right-7;
}
.flatpickr-months .flatpickr-prev-month.flatpickr-next-month,
.flatpickr-months .flatpickr-next-month.flatpickr-next-month {
  @apply !right-7 rtl:!right-auto rtl:!left-7;
}
span.flatpickr-weekday,
.flatpickr-months .flatpickr-month {
  @apply dark:!fill-white dark:!text-white;
}
.flatpickr-day.inRange {
  box-shadow:
    -5px 0 0 #f9fafb,
    5px 0 0 #f9fafb !important;
  @apply dark:!shadow-datepicker;
}
.flatpickr-day.inRange,
.flatpickr-day.prevMonthDay.inRange,
.flatpickr-day.nextMonthDay.inRange,
.flatpickr-day.today.inRange,
.flatpickr-day.prevMonthDay.today.inRange,
.flatpickr-day.nextMonthDay.today.inRange,
.flatpickr-day:hover,
.flatpickr-day.prevMonthDay:hover,
.flatpickr-day.nextMonthDay:hover,
.flatpickr-day:focus,
.flatpickr-day.prevMonthDay:focus,
.flatpickr-day.nextMonthDay:focus {
  @apply !border-gray-50 !bg-gray-50 dark:!border-0 dark:!border-white/5 dark:!bg-white/5;
}
.flatpickr-day.selected,
.flatpickr-day.startRange,
.flatpickr-day.selected,
.flatpickr-day.endRange {
  @apply !text-white dark:!text-white;
}
.flatpickr-day.selected,
.flatpickr-day.startRange,
.flatpickr-day.endRange,
.flatpickr-day.selected.inRange,
.flatpickr-day.startRange.inRange,
.flatpickr-day.endRange.inRange,
.flatpickr-day.selected:focus,
.flatpickr-day.startRange:focus,
.flatpickr-day.endRange:focus,
.flatpickr-day.selected:hover,
.flatpickr-day.startRange:hover,
.flatpickr-day.endRange:hover,
.flatpickr-day.selected.prevMonthDay,
.flatpickr-day.startRange.prevMonthDay,
.flatpickr-day.endRange.prevMonthDay,
.flatpickr-day.selected.nextMonthDay,
.flatpickr-day.startRange.nextMonthDay,
.flatpickr-day.endRange.nextMonthDay {
  background: #465fff;
  @apply !border-brand-500 !bg-brand-500 hover:!border-brand-500 hover:!bg-brand-500;
}
.flatpickr-day.selected.startRange + .endRange:not(:nth-child(7n + 1)),
.flatpickr-day.startRange.startRange + .endRange:not(:nth-child(7n + 1)),
.flatpickr-day.endRange.startRange + .endRange:not(:nth-child(7n + 1)) {
  box-shadow: -10px 0 0 #465fff;
}

.flatpickr-months .flatpickr-prev-month svg,
.flatpickr-months .flatpickr-next-month svg,
.flatpickr-months .flatpickr-prev-month,
.flatpickr-months .flatpickr-next-month {
  @apply hover:!fill-none;
}
.flatpickr-months .flatpickr-prev-month:hover svg,
.flatpickr-months .flatpickr-next-month:hover svg {
  fill: none !important;
}

.flatpickr-prev-month svg,
.flatpickr-next-month svg {
  @apply rtl:rotate-180;
}

.flatpickr-calendar.static {
  @apply left-0 right-auto rtl:left-auto rtl:right-0;
}
.flatpickr-calendar.static.flatpickr-right {
  @apply right-0 left-auto rtl:right-auto rtl:left-0;
}
.flatpickr-calendar.static.flatpickr-left {
  @apply left-0 right-auto rtl:left-auto rtl:right-0;
}
.flatpickr-calendar.hasTime {
  width: 300px !important;
}
.flatpickr-calendar.hasTime .flatpickr-time {
  border: transparent !important;
}
.fc .fc-view-harness {
  @apply max-w-full overflow-x-auto custom-scrollbar;
}
.fc-dayGridMonth-view.fc-view.fc-daygrid {
  @apply min-w-[718px];
}
.fc .fc-scrollgrid-section > * {
  border-right-width: 0;
  border-bottom-width: 0;
}
.fc .fc-scrollgrid {
  border-left-width: 0;
}
.fc .fc-toolbar.fc-header-toolbar {
  @apply flex-col gap-4 px-6 pt-6 sm:flex-row;
}
.fc-button-group {
  @apply gap-2;
}
.fc-button-group .fc-button {
  @apply flex h-10 w-10 items-center justify-center !rounded-lg border border-gray-200 bg-transparent hover:border-gray-200 hover:bg-gray-50 focus:shadow-none active:!border-gray-200 active:!bg-transparent active:!shadow-none dark:border-gray-800 dark:hover:border-gray-800 dark:hover:bg-gray-900 dark:active:!border-gray-800;
}

.fc-button-group .fc-button.fc-prev-button:before {
  @apply inline-block mt-1;
  content: url("data:image/svg+xml,%3Csvg width='25' height='24' viewBox='0 0 25 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16.0068 6L9.75684 12.25L16.0068 18.5' stroke='%23344054' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E%0A");
}
.fc-button-group .fc-button.fc-next-button:before {
  @apply inline-block mt-1;
  content: url("data:image/svg+xml,%3Csvg width='25' height='24' viewBox='0 0 25 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9.50684 19L15.7568 12.75L9.50684 6.5' stroke='%23344054' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E%0A");
}
.dark .fc-button-group .fc-button.fc-prev-button:before {
  content: url("data:image/svg+xml,%3Csvg width='25' height='24' viewBox='0 0 25 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16.0068 6L9.75684 12.25L16.0068 18.5' stroke='%2398A2B3' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E%0A");
}
.dark .fc-button-group .fc-button.fc-next-button:before {
  content: url("data:image/svg+xml,%3Csvg width='25' height='24' viewBox='0 0 25 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9.50684 19L15.7568 12.75L9.50684 6.5' stroke='%2398A2B3' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E%0A");
}
.fc-button-group .fc-button .fc-icon {
  @apply hidden;
}
.fc-addEventButton-button {
  @apply !rounded-lg !border-0 !bg-brand-500 !px-4 !py-2.5 !text-sm !font-medium hover:!bg-brand-600 focus:!shadow-none;
}
.fc-toolbar-title {
  @apply !text-lg !font-medium text-gray-800 dark:text-white/90;
}
/* FullCalendar Dark Mode & Theming */
html.dark .fc .fc-daygrid-day,
html.dark .fc .fc-daygrid-day-frame,
html.dark .fc td,
html.dark td.fc-classic-Jk3,
html.dark .fc-daygrid-day.fc-classic-Jk3 {
  background-color: transparent !important;
}

html.dark [role="dialog"],
html.dark [role="dialog"].fc-classic-Jk3,
html.dark .fc-popover,
html.dark .fc-popover.fc-classic-Jk3,
html.dark .fc-more-popover {
  background-color: var(--color-gray-900, #111827) !important;
}

html.dark .fc table,
html.dark .fc td,
html.dark .fc th,
html.dark .fc .fc-scrollgrid,
html.dark .fc-classic-C1x {
  border-color: var(--color-gray-800, #1f2937) !important;
}

.dark .event-fc-color .fc-event-title,
.dark .event-fc-color .fc-event-time,
.dark .fc-event-title {
  color: #ffffff !important;
}

:root[data-color-scheme="dark"],
:root.dark,
html.dark,
html.dark body,
html.dark #calendar,
.dark {
  --fc-classic-background: transparent !important;
  --fc-classic-border: var(--color-gray-800, #1f2937) !important;
  --fc-classic-strong-border: var(--color-gray-700, #374151) !important;
  --fc-classic-foreground: #ffffff !important;
  --fc-classic-faint: rgba(255, 255, 255, 0.04) !important;
  --fc-classic-muted: rgba(255, 255, 255, 0.08) !important;
  --fc-classic-strong: rgba(255, 255, 255, 0.14) !important;
  --fc-classic-faint-foreground: #9ca3af !important;
  --fc-classic-muted-foreground: #9ca3af !important;
  --fc-classic-today: rgba(255, 255, 255, 0.05) !important;
}

.dark .fc,
.dark .fc-theme-classic,
.dark .fc-theme-standard {
  --fc-classic-background: transparent !important;
  --fc-classic-border: var(--color-gray-800, #1f2937) !important;
}

.dark .fc table,
.dark .fc td,
.dark .fc th,
.dark .fc .fc-scrollgrid,
.dark .fc .fc-theme-classic td,
.dark .fc .fc-theme-classic th,
.dark .fc .fc-theme-standard td,
.dark .fc .fc-theme-standard th {
  border-color: var(--color-gray-800, #1f2937) !important;
}

.dark .fc .fc-daygrid-day,
.dark .fc .fc-daygrid-day-frame,
.dark .fc .fc-timegrid-slot,
.dark .fc .fc-timegrid-col {
  background-color: transparent !important;
}

.dark .fc .fc-daygrid-day.fc-day-today {
  background-color: transparent !important;
}

.dark .fc .fc-daygrid-day.fc-day-today .fc-scrollgrid-sync-inner,
.dark .fc .fc-daygrid-day.fc-day-today .fc-daygrid-day-frame {
  background-color: rgba(255, 255, 255, 0.03) !important;
}

.dark .fc .fc-col-header-cell,
.dark .fc th {
  background-color: var(--color-gray-900, #111827) !important;
  border-color: var(--color-gray-800, #1f2937) !important;
}

.dark .fc .fc-daygrid-day-number {
  color: var(--color-gray-400, #9ca3af) !important;
}

.dark .fc .fc-col-header-cell-cushion {
  color: var(--color-gray-400, #9ca3af) !important;
}

.dark .fc-timegrid-slot-label-frame,
.dark .fc .fc-timegrid-axis-cushion {
  color: var(--color-gray-400, #9ca3af) !important;
}

.dark .fc .fc-timegrid-slot-minor {
  border-top-style: dashed !important;
  border-top-color: var(--color-gray-800, #1f2937) !important;
}

.fc-theme-standard th {
  @apply !border-x-0 border-t !border-gray-200 bg-gray-50 !text-left dark:!border-gray-800 dark:bg-gray-900;
}
.fc-theme-standard td,
.fc-theme-standard .fc-scrollgrid {
  @apply !border-gray-200 dark:!border-gray-800;
}
.fc .fc-col-header-cell-cushion {
  @apply !px-5 !py-4 text-sm font-medium uppercase text-gray-400;
}
.fc .fc-daygrid-day.fc-day-today {
  @apply bg-transparent;
}
.fc .fc-daygrid-day {
  @apply p-2;
}
.fc .fc-daygrid-day.fc-day-today .fc-scrollgrid-sync-inner {
  @apply rounded-sm bg-gray-100 dark:bg-white/[0.03];
}
.fc .fc-daygrid-day-number {
  @apply !p-3 text-sm font-medium text-gray-700 dark:text-gray-400;
}
.fc .fc-daygrid-day-top {
  @apply flex-row-reverse;
}
[dir="rtl"] .fc .fc-daygrid-day-top {
  @apply flex-row;
}
.fc .fc-day-other .fc-daygrid-day-top {
  opacity: 1;
}
.fc .fc-day-other .fc-daygrid-day-top .fc-daygrid-day-number {
  @apply text-gray-400 dark:text-white/30;
}
.event-fc-color {
  @apply rounded-lg py-2.5 pl-4 pr-3;
  direction: ltr !important;
}
.event-fc-color .fc-event-title {
  @apply p-0 text-sm font-normal text-gray-700 dark:text-white!;
}
.fc-daygrid-event-dot {
  @apply w-1 h-5 ml-0 mr-3 border-none rounded-sm;
}
.fc-event {
  @apply focus:shadow-none;
}
.fc-daygrid-event.fc-event-start {
  @apply !ml-3;
}
.event-fc-color.fc-bg-success {
  @apply border-success-50 bg-success-50;
}
.event-fc-color.fc-bg-danger {
  @apply border-error-50 bg-error-50;
}
.event-fc-color.fc-bg-primary {
  @apply border-brand-50 bg-brand-50;
}
.event-fc-color.fc-bg-warning {
  @apply border-orange-50 bg-orange-50;
}
.event-fc-color.fc-bg-success .fc-daygrid-event-dot {
  @apply bg-success-500;
}
.event-fc-color.fc-bg-danger .fc-daygrid-event-dot {
  @apply bg-error-500;
}
.event-fc-color.fc-bg-primary .fc-daygrid-event-dot {
  @apply bg-brand-500;
}
.event-fc-color.fc-bg-warning .fc-daygrid-event-dot {
  @apply bg-orange-500;
}
.fc-direction-ltr .fc-timegrid-slot-label-frame {
  @apply px-3 py-1.5 text-left text-sm font-medium text-gray-500 dark:text-gray-400;
}
.fc .fc-timegrid-axis-cushion {
  @apply text-sm font-medium text-gray-500 dark:text-gray-400;
}
/* FullCalendar Style Overrides */
.custom-calendar .fc-scroller {
  -webkit-overflow-scrolling: touch;
  scrollbar-width: thin;
}

.custom-calendar .fc-classic-yth {
  @apply gap-0!;
}

.dark .event-fc-color .fc-event-title,
.dark .fc-event-title {
  @apply text-white!;
}

/* Update year view to show bookmark trigger */
.custom-calendar.fc-multimonth [role="gridcell"] > .fc-g2,
.custom-calendar .fc-multimonth [role="gridcell"] > .fc-g2,
.custom-calendar.fc-multimonth [role="gridcell"] > .fc-GV,
.custom-calendar .fc-multimonth [role="gridcell"] > .fc-GV,
.custom-calendar.fc-multimonth [role="gridcell"] > div:nth-child(2),
.custom-calendar .fc-multimonth [role="gridcell"] > div:nth-child(2) {
  max-height: 0 !important;
  min-height: 0 !important;
  flex-grow: 0 !important;
  flex-basis: 0 !important;
}

@media (max-width: 639px) {
  .custom-calendar:has(.fc-multimonth) .fc-toolbar,
  .custom-calendar.fc-multimonth .fc-toolbar {
    position: relative !important;
    top: auto !important;
  }

  /* Month Title sticks below the dashboard AppHeader (56px) */
  .custom-calendar:has(.fc-multimonth) [role="grid"] [id*="month-"],
  .custom-calendar .fc-multimonth [role="grid"] [id*="month-"],
  .custom-calendar.fc-multimonth [role="grid"] [id*="month-"],
  .custom-calendar [role="grid"].fc-multimonth [id*="month-"] {
    position: sticky !important;
    top: 56px !important;
    z-index: 10 !important;
    background-color: #ffffff !important;
    margin-bottom: 0 !important;
    padding-top: 8px !important;
    padding-bottom: 8px !important;
  }
  .dark .custom-calendar:has(.fc-multimonth) [role="grid"] [id*="month-"],
  .dark .custom-calendar .fc-multimonth [role="grid"] [id*="month-"],
  .dark .custom-calendar.fc-multimonth [role="grid"] [id*="month-"],
  .dark .custom-calendar [role="grid"].fc-multimonth [id*="month-"] {
    background-color: #111827 !important;
  }

  /* Day Header (SUN MON TUE...) sticks directly below the Month Title */
  .custom-calendar:has(.fc-multimonth)
    [role="grid"]
    [role="row"]:has([role="columnheader"]),
  .custom-calendar:has(.fc-multimonth)
    [role="grid"]
    .fc-multimonth-day-header-row,
  .custom-calendar:has(.fc-multimonth) [role="grid"] .fc-daygrid-header,
  .custom-calendar
    .fc-multimonth
    [role="grid"]
    [role="row"]:has([role="columnheader"]),
  .custom-calendar .fc-multimonth [role="grid"] .fc-multimonth-day-header-row,
  .custom-calendar .fc-multimonth [role="grid"] .fc-daygrid-header,
  .custom-calendar.fc-multimonth
    [role="grid"]
    [role="row"]:has([role="columnheader"]),
  .custom-calendar.fc-multimonth [role="grid"] .fc-multimonth-day-header-row,
  .custom-calendar.fc-multimonth [role="grid"] .fc-daygrid-header,
  .custom-calendar
    [role="grid"].fc-multimonth
    [role="row"]:has([role="columnheader"]),
  .custom-calendar [role="grid"].fc-multimonth .fc-multimonth-day-header-row,
  .custom-calendar [role="grid"].fc-multimonth .fc-daygrid-header {
    position: sticky !important;
    top: 92px !important;
    z-index: 9 !important;
    background-color: #f9fafb !important;
  }
  .dark
    .custom-calendar:has(.fc-multimonth)
    [role="grid"]
    [role="row"]:has([role="columnheader"]),
  .dark
    .custom-calendar:has(.fc-multimonth)
    [role="grid"]
    .fc-multimonth-day-header-row,
  .dark .custom-calendar:has(.fc-multimonth) [role="grid"] .fc-daygrid-header,
  .dark
    .custom-calendar
    .fc-multimonth
    [role="grid"]
    [role="row"]:has([role="columnheader"]),
  .dark
    .custom-calendar
    .fc-multimonth
    [role="grid"]
    .fc-multimonth-day-header-row,
  .dark .custom-calendar .fc-multimonth [role="grid"] .fc-daygrid-header,
  .dark
    .custom-calendar.fc-multimonth
    [role="grid"]
    [role="row"]:has([role="columnheader"]),
  .dark
    .custom-calendar.fc-multimonth
    [role="grid"]
    .fc-multimonth-day-header-row,
  .dark .custom-calendar.fc-multimonth [role="grid"] .fc-daygrid-header,
  .dark
    .custom-calendar
    [role="grid"].fc-multimonth
    [role="row"]:has([role="columnheader"]),
  .dark
    .custom-calendar
    [role="grid"].fc-multimonth
    .fc-multimonth-day-header-row,
  .dark .custom-calendar [role="grid"].fc-multimonth .fc-daygrid-header {
    background-color: #111827 !important;
  }

  /* Reset FullCalendar margin math to avoid whitespace gaps */
  .custom-calendar:has(.fc-multimonth) [role="grid"] > div,
  .custom-calendar .fc-multimonth [role="grid"] > div,
  .custom-calendar.fc-multimonth [role="grid"] > div,
  .custom-calendar [role="grid"].fc-multimonth > div {
    margin-top: 0 !important;
    margin-bottom: 0 !important;
  }
  .custom-calendar:has(.fc-multimonth) [role="grid"] > div > div,
  .custom-calendar .fc-multimonth [role="grid"] > div > div,
  .custom-calendar.fc-multimonth [role="grid"] > div > div,
  .custom-calendar [role="grid"].fc-multimonth > div > div {
    margin-top: 0 !important;
    margin-bottom: 0 !important;
  }

  /* Remove inner month border and border radius on small devices */
  .custom-calendar:has(.fc-multimonth) [role="grid"] > div:last-child,
  .custom-calendar .fc-multimonth [role="grid"] > div:last-child,
  .custom-calendar.fc-multimonth [role="grid"] > div:last-child,
  .custom-calendar [role="grid"].fc-multimonth > div:last-child {
    border: 0 !important;
    border-radius: 0 !important;
  }
  .custom-calendar:has(.fc-multimonth) [role="grid"] [role="columnheader"],
  .custom-calendar .fc-multimonth [role="grid"] [role="columnheader"],
  .custom-calendar.fc-multimonth [role="grid"] [role="columnheader"],
  .custom-calendar [role="grid"].fc-multimonth [role="columnheader"] {
    border-radius: 0 !important;
  }
}

@media (max-width: 640px) {
  .custom-calendar .fc-timegrid {
    min-width: 580px;
  }
}
.input-date-icon::-webkit-inner-spin-button,
.input-date-icon::-webkit-calendar-picker-indicator {
  opacity: 0;
  -webkit-appearance: none;
}

.swiper-button-prev svg,
.swiper-button-next svg {
  @apply !h-auto w-auto!;
}

.carouselTwo .swiper-button-next:after,
.carouselTwo .swiper-button-prev:after,
.carouselFour .swiper-button-next:after,
.carouselFour .swiper-button-prev:after {
  @apply hidden;
}
.carouselTwo .swiper-button-next.swiper-button-disabled,
.carouselTwo .swiper-button-prev.swiper-button-disabled,
.carouselFour .swiper-button-next.swiper-button-disabled,
.carouselFour .swiper-button-prev.swiper-button-disabled {
  @apply bg-white/60 opacity-100!;
}
.carouselTwo .swiper-button-next,
.carouselTwo .swiper-button-prev,
.carouselFour .swiper-button-next,
.carouselFour .swiper-button-prev {
  @apply h-10 w-10 rounded-full border-[0.5px] border-white/10 bg-white/90 !text-gray-700 shadow-slider-navigation backdrop-blur-[10px];
}

.carouselTwo .swiper-button-prev,
.carouselFour .swiper-button-prev {
  @apply !left-3 sm:!left-4 rtl:!left-auto rtl:!right-3 rtl:sm:!right-4;
}

.carouselTwo .swiper-button-next,
.carouselFour .swiper-button-next {
  @apply !right-3 sm:!right-4 rtl:!right-auto rtl:!left-3 rtl:sm:!left-4;
}

.carouselThree .swiper-pagination,
.carouselFour .swiper-pagination {
  @apply !bottom-3 !left-1/2 inline-flex !w-auto -translate-x-1/2 items-center gap-1.5 rounded-[40px] border-[0.5px] border-white/10 bg-white/60 px-2 py-1.5 shadow-slider-navigation backdrop-blur-[10px] sm:!bottom-5;
}

.carouselThree .swiper-pagination-bullet,
.carouselFour .swiper-pagination-bullet {
  @apply !m-0 h-2.5 w-2.5 bg-white opacity-100 shadow-theme-xs duration-200 ease-in-out;
}

.carouselThree .swiper-pagination-bullet-active,
.carouselFour .swiper-pagination-bullet-active {
  @apply w-6.5 rounded-xl;
}

.form-check-input:checked ~ span {
  @apply border-[6px] border-brand-500 dark:border-brand-500;
}

.taskCheckbox:checked ~ .box span {
  @apply opacity-100;
}
.taskCheckbox:checked ~ p {
  @apply text-gray-400 line-through;
}
.taskCheckbox:checked ~ .box {
  @apply border-brand-500 bg-brand-500 dark:border-brand-500;
}

.task {
  transition: all 0.2s ease; /* Smooth transition for visual effects */
}

.task.is-dragging {
  border-radius: 0.75rem;
  box-shadow:
    0px 1px 3px 0px rgba(16, 24, 40, 0.1),
    0px 1px 2px 0px rgba(16, 24, 40, 0.06);
  opacity: 0.8;
  cursor: grabbing; /* Changes the cursor to indicate dragging */
}


.custom-calendar .fc-h-event {
  background-color: #0000;
  border: none;
  color: black;
}

.simplebar-scrollbar:before {
  @apply !bg-gray-200 !rounded-full dark:!bg-gray-700 !opacity-100;
}

.dark .simplebar-scrollbar::before {
  @apply !bg-gray-700;
}

.simplebar-scrollbar.simplebar-visible:before {
  @apply opacity-100;
}

.social-button {
  @apply flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200;
}

.edit-button {
  @apply flex w-full items-center justify-center gap-2 rounded-full border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 lg:inline-flex lg:w-auto;
}

/* Code Editor */
code[class*='language-'],
pre[class*='language-'] {
  text-shadow: none;
  color: #344054;
  overflow: hidden !important;
  font-size: 14px;
  margin: 0;
  padding: 0;
  white-space: pre-wrap;
  word-wrap: break-word;
  text-align: justify;
}

.dark code[class*='language-'],
.dark pre[class*='language-'] {
  text-shadow: none;
  color: #98a2b3;
}
.language-html {
  background-color: #ffffff !important;
}
.dark .language-html {
  background-color: #ffffff00 !important;
}
.token {
  text-shadow: none;
  font-size: 14px;
}
.token.doctype-tag,
.token.name {
  color: #018001;
}
.token.tag {
  color: #267f99;
}
.token.selector {
  color: #267f99;
}
.token.property {
  color: #0070c1;
}
.token.language-css {
  color: #1b00ff;
}
.token.attr-name {
  color: #98a2b3;
}
.token.attr-value {
  color: #a31615;
}
.token.punctuation {
  color: #344054;
}
.dark .token.punctuation {
  color: #98a2b3;
}
.custom-datepicker .flatpickr-calendar.static.open {
  left: 0;
  right: auto;
}
[dir="rtl"] .custom-datepicker .flatpickr-calendar.static.open {
  right: 0;
  left: auto;
}

.swiper-button-prev, .swiper-button-next {
    svg {
        fill: none !important;
    }
}

@media screen and (max-width: 525px) {
  .flatpickr-calendar.static {
    margin-right: -60px !important;
  }
}

@utility menu-item {
  @apply relative flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium;
}

@utility menu-item-active {
  @apply bg-brand-50 text-brand-500 dark:bg-brand-500/[0.12] dark:text-brand-400;
}

@utility menu-item-inactive {
  @apply text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-gray-300;
}

@utility menu-item-icon-active {
  @apply text-brand-500 dark:text-brand-400;
}

@utility menu-item-icon-inactive {
  @apply text-gray-500 group-hover:text-gray-700 dark:text-gray-400 dark:group-hover:text-gray-300;
}

@utility menu-item-arrow {
  @apply absolute top-1/2 right-2.5 -translate-y-1/2;
}

@utility menu-item-arrow-active {
  @apply stroke-brand-500 dark:stroke-brand-400 rotate-180;
}

@utility menu-item-arrow-inactive {
  @apply stroke-gray-500 group-hover:stroke-gray-700 dark:stroke-gray-400 dark:group-hover:stroke-gray-300;
}

@utility menu-dropdown-item {
  @apply text-theme-sm relative flex items-center gap-3 rounded-lg px-3 py-2.5 font-medium;
}

@utility menu-dropdown-item-active {
  @apply bg-brand-50 text-brand-500 dark:bg-brand-500/[0.12] dark:text-brand-400;
}

@utility menu-dropdown-item-inactive {
  @apply text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-white/5;
}

@utility menu-dropdown-badge {
  @apply text-success-600 dark:text-success-500 block rounded-full px-2.5 py-0.5 text-xs font-medium uppercase;
}

@utility menu-dropdown-badge-active {
  @apply bg-success-100 dark:bg-success-500/20;
}

@utility menu-dropdown-badge-inactive {
  @apply bg-success-50 group-hover:bg-success-100 dark:bg-success-500/15 dark:group-hover:bg-success-500/20;
}

@utility menu-dropdown-badge-pro {
  @apply text-brand-600 dark:text-brand-500 block rounded-full px-2.5 py-0.5 text-xs font-medium uppercase;
}

@utility menu-dropdown-badge-pro-active {
  @apply bg-brand-100 dark:bg-brand-500/20;
}

@utility menu-dropdown-badge-pro-inactive {
  @apply bg-brand-50 group-hover:bg-brand-100 dark:bg-brand-500/15 dark:group-hover:bg-brand-500/20;
}

@utility docs-menu-item {
  @apply block rounded-lg px-3 py-1.5 text-sm transition-colors duration-150;
}

@utility docs-menu-item-active {
  @apply bg-brand-50 text-brand-500 dark:bg-brand-500/[0.12] dark:text-brand-400;
}

@utility docs-menu-item-inactive {
  @apply text-gray-500 hover:bg-gray-100 hover:text-gray-800 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white;
}

@utility docs-border-item {
  @apply -ml-[1.5px] block border-l pl-4 text-sm font-normal transition-colors duration-200;
}

@utility docs-border-item-active {
  @apply border-brand-500 text-brand-500;
}

@utility docs-border-item-inactive {
  @apply border-transparent text-gray-500 hover:border-gray-800 hover:text-gray-800 dark:text-gray-400 dark:hover:border-gray-400 dark:hover:text-gray-200;
}

@utility nav-icon-item {
  @apply flex size-10 items-center justify-center rounded-full;
}

@utility nav-icon-item-active {
  @apply text-brand-500 border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900;
}

@utility nav-icon-item-inactive {
  @apply hover:text-brand-500 dark:hover:text-brand-500 border border-transparent text-gray-500 hover:border-gray-200 hover:bg-white dark:text-gray-400 dark:hover:border-gray-800 dark:hover:bg-gray-900;
}

@utility no-scrollbar {
  /* Chrome, Safari and Opera */
  &::-webkit-scrollbar {
    display: none;
  }
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: none; /* Firefox */
}

@utility custom-scrollbar {
  &::-webkit-scrollbar {
    @apply size-1.5;
  }

  &::-webkit-scrollbar-track {
    @apply rounded-full;
  }

  &::-webkit-scrollbar-thumb {
    @apply rounded-full bg-gray-200;
  }
}

.dark .custom-scrollbar::-webkit-scrollbar-thumb {
  background-color: #344054;
}

.api-token-chart .apexcharts-tooltip {
    border: 0 !important;
    background: transparent !important;
    box-shadow: none !important;
}

#card-slider-prev.swiper-button-disabled,
#card-slider-next.swiper-button-disabled {
  @apply pointer-events-none opacity-50;
}

/* ---- TailAdmin legacy utility compat (v3 class names used in views) ---- */
@utility shadow-default {
  box-shadow: 0px 1px 3px rgba(16, 24, 40, 0.1), 0px 1px 2px rgba(16, 24, 40, 0.06);
}

.dark .ts-control,
.dark .ts-dropdown {
  background-color: var(--color-form-input);
  border-color: var(--color-strokedark);
  color: rgb(255 255 255 / 0.9);
}
.dark .ts-control > input {
  color: #fff;
}
.dark .ts-dropdown .active,
.dark .ts-dropdown .highlighted {
  background-color: rgb(255 255 255 / 0.06);
  color: #fff;
}
.dark .ts-wrapper.single .ts-control .ts-dropdown,
.dark .ts-wrapper.multi .ts-control div {
  background-color: var(--color-boxdark);
  color: #fff;
}

/* Force code blocks and syntax highlighting to always remain LTR */
pre,
code,
pre code,
.line-numbers,
[class*="language-"],
.prism-code {
  direction: ltr !important;
  text-align: left !important;
  unicode-bidi: isolate;
}
```

## File: `resources/js/app.js`

```javascript
import { createPopper } from '@popperjs/core';
import './bootstrap';
import Alpine from 'alpinejs';
import ApexCharts from 'apexcharts';

// flatpickr
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';
// FullCalendar
import { Calendar } from 'fullcalendar';
//chartticket
import initTicketStatusChart from "./components/chart/ticket-charts";

document.addEventListener("DOMContentLoaded", () => {
    initTicketStatusChart();
});



window.Alpine = Alpine;
window.createPopper = createPopper;
window.ApexCharts = ApexCharts;
window.flatpickr = flatpickr;
window.FullCalendar = Calendar;

Alpine.start();

// Initialize components on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    // Map imports
    if (document.querySelector('#mapOne')) {
        import('./components/map').then(module => module.initMap());
    }

    // Chart imports
    if (document.querySelector('#chartOne')) {
        import('./components/chart/chart-1').then(module => module.initChartOne());
    }
    if (document.querySelector('#chartTwo')) {
        import('./components/chart/chart-2').then(module => module.initChartTwo());
    }
    if (document.querySelector('#chartThree')) {
        import('./components/chart/chart-3').then(module => module.initChartThree());
    }
    if (document.querySelector('#chartSix')) {
        import('./components/chart/chart-6').then(module => module.initChartSix());
    }
    if (document.querySelector('#chartEight')) {
        import('./components/chart/chart-8').then(module => module.initChartEight());
    }
    if (document.querySelector('#chartThirteen')) {
        import('./components/chart/chart-13').then(module => module.initChartThirteen());
    }

    // Calendar init
    if (document.querySelector('#calendar')) {
        import('./components/calendar-init').then(module => module.calendarInit());
    }
});
```

## File: `resources/js/bootstrap.js`

```javascript
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
```

## File: `resources/js/components/calendar-init.js`

```javascript
import { Calendar } from "fullcalendar";
import dayGridPlugin from "fullcalendar/daygrid";
import interactionPlugin from "fullcalendar/interaction";
import multiMonthPlugin from "fullcalendar/multimonth";
import themePlugin from "fullcalendar/themes/classic";
import timeGridPlugin from "fullcalendar/timegrid";

import "fullcalendar/skeleton.css";
import "fullcalendar/themes/classic/palette.css";
import "fullcalendar/themes/classic/theme.css";

export function calendarInit() {
  const calendarEl = document.querySelector("#calendar");

  if (!calendarEl) return;

  const isRtl = document.documentElement.dir === "rtl";
  const locale = document.documentElement.lang || "en";
  let isMobile = window.innerWidth < 640;

  // Initial Events matching Next.js
  const INITIAL_EVENTS = [
    {
      id: "1",
      title: "Event Conf.",
      start: new Date().toISOString().split("T")[0],
      extendedProps: { calendar: "Danger" },
    },
    {
      id: "2",
      title: "Meeting",
      start: new Date(Date.now() + 86400000).toISOString().split("T")[0],
      extendedProps: { calendar: "Success" },
    },
    {
      id: "3",
      title: "Workshop",
      start: new Date(Date.now() + 172800000).toISOString().split("T")[0],
      end: new Date(Date.now() + 259200000).toISOString().split("T")[0],
      extendedProps: { calendar: "Primary" },
    },
  ];

  // Calendar Modal Elements
  const modalEl = document.getElementById("eventModal");
  const modalTitleInput = document.querySelector("#event-title");
  const modalStartDateInput = document.querySelector("#event-start-date");
  const modalEndDateInput = document.querySelector("#event-end-date");
  const modalAddBtn = document.querySelector(".btn-add-event");
  const modalUpdateBtn = document.querySelector(".btn-update-event");
  const modalHeaderTitle = document.querySelector("#eventModalLabel");

  const CALENDAR_VIEW_OPTIONS = [
    { key: "dayGridMonth", label: "Month" },
    { key: "multiMonthYear", label: "Year" },
    { key: "timeGridWeek", label: "Week" },
    { key: "timeGridDay", label: "Day" },
  ];

  let calendarInstance = null;
  let currentView = "dayGridMonth";
  let selectedEvent = null;

  // View Select Dropdown matching CalendarViewSelect.tsx
  function renderViewSelect(containerEl, activeViewKey, calendarRef) {
    if (!containerEl) return;
    const targetCalendar = calendarRef || calendarInstance;
    const activeOption =
      CALENDAR_VIEW_OPTIONS.find((v) => v.key === activeViewKey) ||
      CALENDAR_VIEW_OPTIONS.find((v) => v.key === "dayGridMonth") ||
      CALENDAR_VIEW_OPTIONS[0];

    containerEl.innerHTML = `
      <div class="calendar-view-dropdown relative">
        <button
          type="button"
          class="calendar-view-btn flex h-9 w-full min-w-18 items-center justify-center gap-1 rounded-lg border border-gray-300 ps-2.5 pe-1.5 text-xs font-medium text-gray-700 shadow-xs sm:min-w-20 sm:gap-1.5 sm:ps-3 sm:pe-2 sm:text-sm dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400"
          aria-expanded="false"
          aria-haspopup="listbox"
        >
          <span class="calendar-view-label">${activeOption.label}</span>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="calendar-view-chevron h-4 w-4 transition-transform duration-200 sm:h-4.5 sm:w-4.5">
            <path d="m6 9 6 6 6-6"/>
          </svg>
        </button>
        <div class="calendar-view-menu absolute end-0 z-50 mt-1.5 hidden w-36 max-w-[calc(100vw-32px)] space-y-0.5 rounded-xl border border-gray-200 bg-white p-1.5 shadow-lg sm:w-38 dark:border-gray-700 dark:bg-gray-900">
          ${CALENDAR_VIEW_OPTIONS.map(
            (view) => `
            <button
              type="button"
              data-view-key="${view.key}"
              class="calendar-view-option w-full rounded-lg px-2.5 py-1.5 text-start text-xs text-gray-700 hover:bg-gray-100 sm:text-sm dark:text-gray-300 dark:hover:bg-white/5 ${
                activeViewKey === view.key
                  ? "bg-gray-100 font-medium dark:bg-white/5"
                  : "font-normal"
              }"
            >
              ${view.label}
            </button>
          `
          ).join("")}
        </div>
      </div>
    `;

    const dropdownContainer = containerEl.querySelector(".calendar-view-dropdown");
    if (!dropdownContainer) return;
    const btn = dropdownContainer.querySelector(".calendar-view-btn");
    const menu = dropdownContainer.querySelector(".calendar-view-menu");
    const chevron = dropdownContainer.querySelector(".calendar-view-chevron");

    btn.addEventListener("click", (e) => {
      e.stopPropagation();
      const isHidden = menu.classList.contains("hidden");
      document
        .querySelectorAll(".calendar-view-menu")
        .forEach((m) => m.classList.add("hidden"));
      document
        .querySelectorAll(".calendar-view-chevron")
        .forEach((c) => c.classList.remove("rotate-180"));

      if (isHidden) {
        menu.classList.remove("hidden");
        chevron.classList.add("rotate-180");
        btn.setAttribute("aria-expanded", "true");
      } else {
        menu.classList.add("hidden");
        chevron.classList.remove("rotate-180");
        btn.setAttribute("aria-expanded", "false");
      }
    });

    dropdownContainer
      .querySelectorAll(".calendar-view-option")
      .forEach((optionBtn) => {
        optionBtn.addEventListener("click", (e) => {
          e.stopPropagation();
          const viewKey = optionBtn.dataset.viewKey;
          currentView = viewKey;
          const cal = targetCalendar || calendarInstance;
          if (cal && typeof cal.changeView === "function") {
            cal.changeView(viewKey);
          }
          menu.classList.add("hidden");
          chevron.classList.remove("rotate-180");
          btn.setAttribute("aria-expanded", "false");
        });
      });
  }

  // Modal helpers
  const openModal = () => {
    if (modalEl) {
      modalEl.style.display = "flex";
      document.body.style.overflow = "hidden";
    }
  };

  const closeModal = () => {
    if (modalEl) {
      modalEl.style.display = "none";
      document.body.style.overflow = "";
    }
    selectedEvent = null;
    resetModalFields();
  };

  function resetModalFields() {
    if (modalTitleInput) modalTitleInput.value = "";
    if (modalStartDateInput) modalStartDateInput.value = "";
    if (modalEndDateInput) modalEndDateInput.value = "";
    const primaryRadio = document.querySelector(
      'input[name="event-level"][value="Primary"]'
    );
    if (primaryRadio) {
      primaryRadio.checked = true;
    }
  }

  // Add Event Handler
  const handleOpenAddModal = () => {
    selectedEvent = null;
    resetModalFields();

    if (modalHeaderTitle) modalHeaderTitle.textContent = "Add Event";
    if (modalAddBtn) modalAddBtn.style.display = "flex";
    if (modalUpdateBtn) modalUpdateBtn.style.display = "none";

    const currentDate = new Date();
    const yyyy = currentDate.getFullYear();
    const mm = String(currentDate.getMonth() + 1).padStart(2, "0");
    const dd = String(currentDate.getDate()).padStart(2, "0");
    const combineDate = `${yyyy}-${mm}-${dd}`;

    if (modalStartDateInput) modalStartDateInput.value = combineDate;
    if (modalEndDateInput) modalEndDateInput.value = combineDate;

    openModal();
  };

  // Date select handler
  const handleDateSelect = (info) => {
    selectedEvent = null;
    resetModalFields();

    if (modalHeaderTitle) modalHeaderTitle.textContent = "Add Event";
    if (modalAddBtn) modalAddBtn.style.display = "flex";
    if (modalUpdateBtn) modalUpdateBtn.style.display = "none";

    if (modalStartDateInput)
      modalStartDateInput.value = info.startStr ? info.startStr.split("T")[0] : "";
    if (modalEndDateInput) {
      modalEndDateInput.value = info.endStr
        ? info.endStr.split("T")[0]
        : info.startStr
        ? info.startStr.split("T")[0]
        : "";
    }

    openModal();
  };

  // Event click handler
  const handleEventClick = (info) => {
    const eventObj = info.event;
    if (eventObj.url) {
      window.open(eventObj.url);
      info.jsEvent.preventDefault();
      return;
    }

    selectedEvent = eventObj;
    const eventLevel = eventObj.extendedProps?.calendar || "Primary";
    const checkedRadio = document.querySelector(
      `input[name="event-level"][value="${eventLevel}"]`
    );

    if (modalHeaderTitle) modalHeaderTitle.textContent = "Edit Event";
    if (modalAddBtn) modalAddBtn.style.display = "none";
    if (modalUpdateBtn) {
      modalUpdateBtn.style.display = "flex";
      modalUpdateBtn.dataset.fcEventPublicId = eventObj.id;
    }

    if (modalTitleInput) modalTitleInput.value = eventObj.title;
    if (modalStartDateInput)
      modalStartDateInput.value = eventObj.startStr
        ? eventObj.startStr.split("T")[0]
        : "";
    if (modalEndDateInput)
      modalEndDateInput.value = eventObj.endStr
        ? eventObj.endStr.split("T")[0]
        : eventObj.startStr
        ? eventObj.startStr.split("T")[0]
        : "";

    if (checkedRadio) checkedRadio.checked = true;

    openModal();
  };

  // Initialize FullCalendar v7 matching Calendar.tsx
  const calendar = new Calendar(calendarEl, {
    plugins: [
      themePlugin,
      dayGridPlugin,
      timeGridPlugin,
      interactionPlugin,
      multiMonthPlugin,
    ],
    initialView: "dayGridMonth",
    direction: isRtl ? "rtl" : "ltr",
    height: "auto",

    // Toolbar / Header configuration
    headerToolbar: {
      start: "prev,next addEventButton",
      center: "title",
      end: "",
    },
    headerToolbarClass:
      "sticky top-0! z-20! bg-white dark:bg-gray-900 flex-wrap! flex-row! items-center justify-between gap-3 sm:gap-4 [padding-inline:16px]! sm:[padding-inline:24px]! pt-4 sm:pt-6 pb-3 sm:pb-4",
    toolbarTitleClass:
      "text-base! sm:text-lg! font-semibold! text-gray-800 dark:text-white/90",
    toolbarSectionClass: (info) => {
      if (info.name === "start") {
        return "ta-toolbar-section ta-toolbar-start order-2 flex w-full items-center justify-between sm:order-1 sm:w-auto sm:justify-start gap-2";
      }
      if (info.name === "center") {
        return "ta-toolbar-section ta-toolbar-center order-1 flex items-center justify-start sm:order-2 sm:justify-center";
      }
      if (info.name === "end") {
        return "ta-toolbar-section ta-toolbar-end order-1 flex items-center justify-end sm:order-3 sm:justify-end";
      }
      return "ta-toolbar-section";
    },
    buttonGroupClass: "gap-2",
    buttons: {
      prev: {
        iconContent: {
          html: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="size-5 sm:size-6 bg-transparent text-gray-700 rtl:rotate-180 dark:text-gray-400"><path d="M15 18l-6-6 6-6" /></svg>`,
        },
        className:
          "flex size-9! sm:size-10! p-0! items-center justify-center! rounded-lg! border! bg-transparent! border-gray-200! text-gray-700 hover:border-gray-200 hover:bg-gray-50! focus:shadow-none active:border-gray-200! active:bg-transparent! active:shadow-none! dark:border-gray-800! dark:text-gray-400 dark:hover:border-gray-800 dark:hover:bg-gray-900! dark:active:border-gray-800!",
      },
      next: {
        iconContent: {
          html: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="size-5 sm:size-6 bg-transparent text-gray-700 rtl:rotate-180 dark:text-gray-400"><path d="M9 18l6-6-6-6" /></svg>`,
        },
        className:
          "flex size-9! sm:size-10! p-0! items-center justify-center! rounded-lg! border! bg-transparent! border-gray-200! text-gray-700 hover:border-gray-200 hover:bg-gray-50! focus:shadow-none active:border-gray-200! active:bg-transparent! active:shadow-none! dark:border-gray-800! dark:text-gray-400 dark:hover:border-gray-800 dark:hover:bg-gray-900! dark:active:border-gray-800!",
      },
      addEventButton: {
        text: "Add Event +",
        click: handleOpenAddModal,
        className:
          "rounded-lg! border-0! bg-brand-500! px-3! sm:px-4! py-2! sm:py-2.5! text-xs! sm:text-sm! font-medium! text-white hover:bg-brand-600! focus:shadow-none! w-auto!",
      },
    },

    // View specific styles
    views: {
      multiMonthYear: {
        multiMonthMaxColumns: 3,
        singleMonthClass: "fc-multimonth",
        tableClass:
          "overflow-visible! border-0! sm:border! sm:border-gray-200! dark:sm:border-gray-800! rounded-none! sm:rounded-lg! mt-0!",
        singleMonthHeaderClass:
          "mb-0! bg-white dark:bg-gray-900 sm:bg-transparent! dark:sm:bg-transparent!",
        tableHeaderClass:
          "mb-0! rounded-none! sm:rounded-t-lg! bg-gray-50 dark:bg-gray-900 dark:sm:bg-transparent!",
        tableBodyClass: "mt-0!",
        singleMonthMinWidth: 280,
        showNonCurrentDates: true,
        singleMonthHeaderInnerClass:
          "text-sm font-medium! text-gray-800 dark:text-white/90",
        dayHeaderRowClass: "fc-multimonth-day-header-row",
        dayHeaderClass: (data) =>
          data.inPopover
            ? "relative! border-b! border-gray-200! bg-gray-50/70! px-4! py-3! text-start! dark:border-gray-800! dark:bg-gray-800/50!"
            : "border-0! bg-gray-50 py-2! dark:bg-gray-900 dark:sm:bg-transparent! first:rounded-none! first:sm:rounded-ss-lg! last:rounded-none! last:sm:rounded-se-lg!",
        dayHeaderInnerClass: (data) =>
          data.inPopover
            ? "text-sm! font-semibold! text-gray-800! dark:text-white/90!"
            : "py-1 text-[11px] sm:text-xs font-medium text-gray-400 uppercase",
        dayCellClass: (data) => {
          if (data.inPopover) return "bg-transparent! p-3!";
          let cls = "relative! p-0.5 sm:p-1!";
          if (data.isToday)
            cls +=
              " isolate rounded-sm! bg-gray-100! dark:bg-gray-800/40! font-semibold text-brand-500 dark:text-brand-400";
          if (data.isOther) cls += " bg-transparent!";
          return cls;
        },
        dayCellInnerClass: (data) =>
          data.inPopover
            ? "flex custom-scrollbar max-h-60 flex-col gap-1.5 overflow-y-auto"
            : "h-0 max-h-0 overflow-hidden invisible",
        dayCellTopInnerClass: "text-xs! sm:text-sm!",
        dayMaxEvents: 0,
        moreLinkClass:
          "border-0! bg-transparent! p-0! hover:bg-transparent! focus:outline-none",
        rowMoreLinkClass:
          "absolute! -top-0.5! sm:-top-1! start-0.5! z-10! border-0! bg-transparent! p-0!",
        rowMoreLinkInnerClass: "overflow-visible!",
        moreLinkContent() {
          return {
            html: `<span><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4.5 sm:size-5.5 text-brand-500"><path d="M19 3v17a1 1 0 01-1.496.868l-4.512-2.578a2 2 0 00-1.984 0l-4.512 2.578A1 1 0 015 20V3z" /></svg></span>`,
          };
        },
      },
      dayGridMonth: {
        dayMaxEvents: isMobile ? 0 : 2,
        dayHeaderAlign: (data) => (data.inPopover ? "start" : "center"),
        dayHeaderClass: (data) =>
          data.inPopover
            ? "relative! border-b! border-gray-200! bg-gray-50/70! px-4! py-3! text-start! dark:border-gray-800! dark:bg-gray-800/50!"
            : "border-x-0! border-t border-gray-200! bg-gray-50 dark:border-gray-800! dark:bg-gray-900",
        dayHeaderInnerClass: (data) =>
          data.inPopover
            ? "text-sm! font-semibold! text-gray-800! dark:text-white/90!"
            : "px-1! py-2! sm:px-3! sm:py-3! md:px-5! md:py-4! text-xs! sm:text-sm! font-medium! text-gray-400 uppercase",
        dayCellClass: (data) => {
          if (data.inPopover) return "bg-transparent! p-3!";
          return `bg-transparent! p-1! sm:p-2! ${
            data.isToday ? "bg-gray-100! dark:bg-gray-800/40!" : ""
          }`;
        },
        dayCellInnerClass: (data) => {
          if (data.inPopover)
            return "flex custom-scrollbar max-h-60 flex-col gap-1.5 overflow-y-auto";
          if (isMobile)
            return "h-0 max-h-0 overflow-hidden invisible";
          return data.isToday ? "rounded-sm!" : "";
        },
        rowMoreLinkClass: isMobile
          ? "absolute! -top-1! -start-0.5! z-10! border-0! bg-transparent! p-0!"
          : "",
        rowMoreLinkInnerClass: isMobile ? "overflow-visible!" : "",
        moreLinkClass:
          "border-0! bg-transparent! p-0! hover:bg-transparent! focus:outline-none",
        moreLinkContent: (args) => {
          if (isMobile) {
            return {
              html: `<span><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4.5 sm:size-5.5 text-brand-500"><path d="M19 3v17a1 1 0 01-1.496.868l-4.512-2.578a2 2 0 00-1.984 0l-4.512 2.578A1 1 0 015 20V3z" /></svg></span>`,
            };
          }
          return {
            html: `<span class="fc-more-link-badge inline-flex items-center rounded-sm bg-brand-50 px-1 py-0.5 sm:px-1.5 text-[10px] sm:text-xs font-medium text-brand-600 transition-colors hover:bg-brand-100 dark:bg-brand-500/15 dark:text-brand-400 dark:hover:bg-brand-500/25">+${args.num} more</span>`,
          };
        },
      },
      timeGridWeek: {
        slotDuration: "01:00:00",
        slotMinHeight: 56,
        allDaySlot: true,
        dayMaxEvents: isMobile ? 0 : undefined,
        moreLinkClass:
          "border-0! bg-transparent! p-0! hover:bg-transparent! focus:outline-none",
        rowMoreLinkClass: isMobile
          ? "absolute! -top-1! -start-0.5! z-10! border-0! bg-transparent! p-0!"
          : "",
        rowMoreLinkInnerClass: isMobile ? "overflow-visible!" : "",
        moreLinkContent: isMobile
          ? () => ({
              html: `<span><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4.5 sm:size-5.5 text-brand-500"><path d="M19 3v17a1 1 0 01-1.496.868l-4.512-2.578a2 2 0 00-1.984 0l-4.512 2.578A1 1 0 015 20V3z" /></svg></span>`,
            })
          : undefined,
        dayHeaderContent: (arg) => {
          const weekday = new Intl.DateTimeFormat(locale, {
            weekday: "short",
          })
            .format(arg.date)
            .toUpperCase();
          const day = new Intl.DateTimeFormat(locale, {
            day: "numeric",
          }).format(arg.date);
          return `${weekday} - ${day}`;
        },
        dayHeaderClass: (data) =>
          `border-0! bg-gray-50! dark:bg-gray-900! ${
            data.isToday ? "bg-gray-100/70! dark:bg-gray-800/60!" : ""
          }`,
        dayHeaderInnerClass: (data) =>
          `px-1.5! sm:px-3! py-2.5! sm:py-3.5! text-center! text-[11px]! sm:text-xs! font-medium! text-gray-500! uppercase! dark:text-gray-400! ${
            data.isToday
              ? "font-semibold! text-brand-500! dark:text-brand-400!"
              : ""
          }`,
        slotHeaderDividerClass:
          "border-e! border-s-0! border-y-0! border-gray-200! dark:border-gray-800!",
        slotHeaderClass:
          "px-1.5! sm:px-3! py-1.5! sm:py-2! text-start! text-[11px]! sm:text-xs! font-medium! text-gray-400! dark:text-gray-500!",
        slotLaneClass: "border-gray-100! dark:border-gray-800/60!",
        dayLaneClass: (data) =>
          `border-gray-200! dark:border-gray-800! ${
            data.isToday
              ? "bg-brand-50/15! dark:bg-brand-500/[0.03]!"
              : ""
          }`,
        allDayDividerClass:
          "border-b! border-t-0! border-x-0! border-gray-200! p-0! bg-transparent! dark:border-gray-800!",
        allDayHeaderClass:
          "border-0! bg-gray-50! text-[11px]! sm:text-xs! font-medium! text-gray-500! dark:border-0! dark:bg-gray-900! dark:text-gray-400!",
      },
      timeGridDay: {
        slotDuration: "00:30:00",
        slotMinHeight: 48,
        allDaySlot: true,
        dayMaxEvents: isMobile ? 0 : undefined,
        moreLinkClass:
          "border-0! bg-transparent! p-0! hover:bg-transparent! focus:outline-none",
        rowMoreLinkClass: isMobile
          ? "absolute! -top-1! -start-0.5! z-10! border-0! bg-transparent! p-0!"
          : "",
        rowMoreLinkInnerClass: isMobile ? "overflow-visible!" : "",
        moreLinkContent: isMobile
          ? () => ({
              html: `<span><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4.5 sm:size-5.5 text-brand-500"><path d="M19 3v17a1 1 0 01-1.496.868l-4.512-2.578a2 2 0 00-1.984 0l-4.512 2.578A1 1 0 015 20V3z" /></svg></span>`,
            })
          : undefined,
        dayHeaderContent: (arg) => {
          const weekday = new Intl.DateTimeFormat(locale, {
            weekday: "short",
          })
            .format(arg.date)
            .toUpperCase();
          const day = new Intl.DateTimeFormat(locale, {
            day: "numeric",
          }).format(arg.date);
          return `${weekday} - ${day}`;
        },
        dayHeaderClass: (data) =>
          `border-0! bg-gray-50! dark:bg-gray-900! ${
            data.isToday ? "bg-gray-100/70! dark:bg-gray-800/60!" : ""
          }`,
        dayHeaderInnerClass: (data) =>
          `px-2! sm:px-4! py-2.5! sm:py-3.5! text-center! text-xs! font-medium! text-gray-500! uppercase! dark:text-gray-400! ${
            data.isToday
              ? "font-semibold! text-brand-500! dark:text-brand-400!"
              : ""
          }`,
        slotHeaderDividerClass:
          "border-e! border-s-0! border-y-0! border-gray-200! dark:border-gray-800!",
        slotHeaderClass:
          "px-2! sm:px-3! py-1.5! sm:py-2! text-start! text-[11px]! sm:text-xs! font-medium! text-gray-400! dark:text-gray-500!",
        slotLaneClass: "border-gray-100! dark:border-gray-800/60!",
        dayLaneClass: (data) =>
          `border-gray-200! dark:border-gray-800! ${
            data.isToday
              ? "bg-brand-50/15! dark:bg-brand-500/[0.03]!"
              : ""
          }`,
        allDayDividerClass:
          "border-b! border-t-0! border-x-0! border-gray-200! p-0! bg-transparent! dark:border-gray-800!",
        allDayHeaderClass:
          "border-0! bg-gray-50! text-xs! font-medium! text-gray-500! dark:border-0! dark:bg-gray-900! dark:text-gray-400!",
      },
    },

    // Body configuration
    borderless: true,
    viewClass:
      "border-t! border-b-0! border-x-0! border-gray-200! dark:border-gray-800!",
    dayHeaderDividerClass:
      "border-b! border-t-0! border-x-0! border-gray-200! p-0! bg-transparent! dark:border-gray-800!",
    slotMinHeight: 56,
    slotHeaderDividerClass:
      "border-e! border-s-0! border-y-0! border-gray-200! dark:border-gray-800!",
    allDayDividerClass:
      "border-b! border-t-0! border-x-0! border-gray-200! p-0! bg-transparent! dark:border-gray-800!",
    eventClass: "focus:shadow-none",
    nowIndicator: false,
    columnEventClass:
      "bg-transparent! border-0! p-1! shadow-none! hover:shadow-none! focus:outline-none",
    columnEventInnerClass: "p-0! border-0! bg-transparent! h-full",
    tableHeaderSticky: true,
    tableClass: "overflow-hidden",
    rowEventClass:
      "bg-transparent! border-0! px-1! py-0.5! shadow-none! hover:shadow-none! focus:outline-none",
    rowEventInnerClass: "p-0! border-0! bg-transparent!",
    popoverFormat: { month: "short", day: "numeric", year: "numeric" },
    popoverClass:
      "z-99999! w-72 max-w-[calc(100vw-32px)] overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-theme-lg dark:border-gray-800 dark:bg-gray-900",
    popoverCloseClass:
      "absolute end-3 top-2.5 flex size-7 cursor-pointer items-center justify-center rounded-lg text-gray-400 transition-colors hover:bg-gray-100 hover:text-gray-600 focus:outline-none dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white",
    popoverCloseContent: {
      html: `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4"><path d="M18 6L6 18M6 6l12 12" /></svg>`,
    },

    selectable: true,
    events: INITIAL_EVENTS,
    select: handleDateSelect,
    eventClick: handleEventClick,
    eventContent(eventInfo) {
      const calendarLevel = (
        eventInfo.event.extendedProps?.calendar || "primary"
      ).toLowerCase();

      const colorMap = {
        success: {
          bg: "border border-success-100 bg-success-50 dark:border-success-500/20 dark:bg-success-500/15",
          dot: "bg-success-500",
          title: "text-success-700 dark:text-success-400",
          time: "text-success-600/80 dark:text-success-400/80",
        },
        danger: {
          bg: "border border-error-100 bg-error-50 dark:border-error-500/20 dark:bg-error-500/15",
          dot: "bg-error-500",
          title: "text-error-700 dark:text-error-400",
          time: "text-error-600/80 dark:text-error-400/80",
        },
        primary: {
          bg: "border border-brand-100 bg-brand-50 dark:border-brand-500/20 dark:bg-brand-500/15",
          dot: "bg-brand-500",
          title: "text-brand-700 dark:text-brand-400",
          time: "text-brand-600/80 dark:text-brand-400/80",
        },
        warning: {
          bg: "border border-orange-100 bg-orange-50 dark:border-orange-500/20 dark:bg-orange-500/15",
          dot: "bg-orange-500",
          title: "text-orange-700 dark:text-orange-400",
          time: "text-orange-600/80 dark:text-orange-400/80",
        },
      };

      const colors = colorMap[calendarLevel] || colorMap.primary;
      const isTimeGridView =
        !eventInfo.event?.allDay &&
        eventInfo.view?.type &&
        eventInfo.view.type.startsWith("timeGrid");

      if (isTimeGridView) {
        return {
          html: `
            <div dir="ltr" class="event-fc-color flex h-full w-full flex-col justify-start overflow-hidden rounded-md p-1 transition-colors sm:rounded-lg sm:p-1.5 ${colors.bg}">
              <div class="flex items-center gap-1 sm:gap-1.5">
                <div class="size-1.5 shrink-0 rounded-full sm:size-2 ${colors.dot}"></div>
                <div class="truncate text-[11px] font-semibold leading-tight sm:text-xs ${colors.title}">${eventInfo.event.title || ""}</div>
              </div>
              ${
                eventInfo.timeText
                  ? `<div class="mt-0.5 truncate ps-2.5 text-[10px] font-medium leading-tight sm:ps-3.5 sm:text-[11px] ${colors.time}">${eventInfo.timeText}</div>`
                  : ""
              }
            </div>
          `,
        };
      }

      return {
        html: `
          <div dir="ltr" class="event-fc-color flex items-center rounded-md py-1 ps-1.5 pe-2 transition-colors sm:rounded-lg sm:py-1.5 sm:ps-2.5 sm:pe-3 ${colors.bg}">
            <div class="fc-daygrid-event-dot ms-0 me-1 h-2.5 w-1 shrink-0 rounded-full border-none sm:me-2 sm:h-3.5 ${colors.dot}"></div>
            ${
              eventInfo.timeText
                ? `<div class="fc-event-time me-1 p-0 text-[10px] font-normal text-gray-500 sm:me-1.5 sm:text-xs dark:text-gray-400">${eventInfo.timeText}</div>`
                : ""
            }
            <div class="fc-event-title truncate p-0 text-[11px] font-medium text-gray-700 sm:text-xs dark:text-white">${eventInfo.event.title || ""}</div>
          </div>
        `,
      };
    },
    datesSet(arg) {
      currentView = arg.view.type;
      const calContainer = calendarEl.closest(".custom-calendar");
      if (calContainer) {
        if (currentView === "multiMonthYear") {
          calContainer.classList.add("fc-multimonth");
        } else {
          calContainer.classList.remove("fc-multimonth");
        }
      }
      requestAnimationFrame(() => {
        const chunk = calendarEl.querySelector(
          ".ta-toolbar-section:last-child"
        );
        if (chunk) {
          renderViewSelect(chunk, currentView, calendar);
        }
      });
    },
  });

  calendarInstance = calendar;
  calendar.render();

  window.addEventListener("resize", () => {
    const mobile = window.innerWidth < 640;
    if (isMobile !== mobile) {
      isMobile = mobile;
      calendar.setOption("views", {
        dayGridMonth: {
          dayMaxEvents: isMobile ? 0 : 2,
        },
        timeGridWeek: {
          dayMaxEvents: isMobile ? 0 : undefined,
        },
        timeGridDay: {
          dayMaxEvents: isMobile ? 0 : undefined,
        },
      });
    }
  });

  // Modal event listeners
  const modalCloseBtns = document.querySelectorAll(
    "#eventModal .modal-close-btn, #eventModal [data-close-modal]"
  );
  modalCloseBtns.forEach((btn) => {
    btn.addEventListener("click", closeModal);
  });

  // Add Event Form Submit
  if (modalAddBtn) {
    modalAddBtn.addEventListener("click", (e) => {
      e.preventDefault();
      const title = modalTitleInput ? modalTitleInput.value.trim() : "";
      const start = modalStartDateInput ? modalStartDateInput.value : "";
      const end = modalEndDateInput
        ? modalEndDateInput.value
        : modalStartDateInput
        ? modalStartDateInput.value
        : "";
      const checkedRadio = document.querySelector(
        'input[name="event-level"]:checked'
      );
      const level = checkedRadio ? checkedRadio.value : "Primary";

      if (title) {
        calendar.addEvent({
          id: Date.now().toString(),
          title: title,
          start: start,
          end: end || start,
          allDay: true,
          extendedProps: { calendar: level },
        });
        closeModal();
      }
    });
  }

  // Update Event
  if (modalUpdateBtn) {
    modalUpdateBtn.addEventListener("click", (e) => {
      e.preventDefault();
      if (!selectedEvent) return;

      const title = modalTitleInput ? modalTitleInput.value.trim() : "";
      const start = modalStartDateInput ? modalStartDateInput.value : "";
      const end = modalEndDateInput
        ? modalEndDateInput.value
        : modalStartDateInput
        ? modalStartDateInput.value
        : "";
      const checkedRadio = document.querySelector(
        'input[name="event-level"]:checked'
      );
      const level = checkedRadio ? checkedRadio.value : "Primary";

      selectedEvent.setProp("title", title || "Event");
      selectedEvent.setStart(start);
      selectedEvent.setEnd(end || start);
      selectedEvent.setExtendedProp("calendar", level);

      closeModal();
    });
  }

  // Close dropdown on outside click
  document.addEventListener("click", (e) => {
    if (!e.target.closest(".calendar-view-dropdown")) {
      document
        .querySelectorAll(".calendar-view-menu")
        .forEach((m) => m.classList.add("hidden"));
      document
        .querySelectorAll(".calendar-view-chevron")
        .forEach((c) => c.classList.remove("rotate-180"));
    }
  });
}
```

## File: `resources/js/components/chart/chart-1.js`

```javascript


export const initChartOne = () => {
    const chartElement = document.querySelector('#chartOne');
    if (!chartElement) return;

    const chartOneOptions = {
        series: [{
            name: "Sales",
            data: [168, 385, 201, 298, 187, 195, 291, 110, 215, 390, 280, 112],
        },],
        colors: ["#465fff"],
        chart: {
            fontFamily: "Outfit, sans-serif",
            type: "bar",
            height: 180,
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "39%",
                borderRadius: 5,
                borderRadiusApplication: "end",
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 4,
            colors: ["transparent"],
        },
        xaxis: {
            categories: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        legend: {
            show: true,
            position: "top",
            horizontalAlign: "left",
            fontFamily: "Outfit",
            markers: {
                radius: 99,
            },
        },
        yaxis: {
            title: false,
        },
        grid: {
            yaxis: {
                lines: {
                    show: true,
                },
            },
        },
        fill: {
            opacity: 1,
        },

        tooltip: {
            x: {
                show: false,
            },
            y: {
                formatter: function (val) {
                    return val;
                },
            },
        },
    };

    const chart = new ApexCharts(chartElement, chartOneOptions);
    chart.render();

    return chart;
};

export default initChartOne;
```

## File: `resources/js/components/chart/chart-13.js`

```javascript

export function initChartThirteen() {
    const chartThirteenEl = document.querySelector("#chartThirteen");
    if (chartThirteenEl) {
        const data = [
            [1746153600000, 30.95],
            [1746240000000, 31.34],
            [1746326400000, 31.18],
            [1746412800000, 31.05],
            [1746672000000, 31.0],
            [1746758400000, 30.95],
            [1746844800000, 31.24],
            [1746931200000, 31.29],
            [1747017600000, 31.85],
            [1747276800000, 31.86],
            [1747363200000, 32.28],
            [1747449600000, 32.1],
            [1747536000000, 32.65],
            [1747622400000, 32.21],
            [1747881600000, 32.35],
            [1747968000000, 32.44],
            [1748054400000, 32.46],
            [1748140800000, 32.86],
            [1748227200000, 32.75],
            [1748572800000, 32.54],
            [1748659200000, 32.33],
            [1748745600000, 32.97],
            [1748832000000, 33.41],
            [1749091200000, 33.27],
            [1749177600000, 33.27],
            [1749264000000, 32.89],
            [1749350400000, 33.1],
            [1749436800000, 33.73],
            [1749696000000, 33.22],
            [1749782400000, 31.99],
            [1749868800000, 32.41],
            [1749955200000, 33.05],
            [1750041600000, 33.64],
            [1750300800000, 33.56],
            [1750387200000, 34.22],
            [1750473600000, 33.77],
            [1750560000000, 34.17],
            [1750646400000, 33.82],
            [1750905600000, 34.51],
            [1750992000000, 33.16],
            [1751078400000, 33.56],
            [1751164800000, 33.71],
            [1751251200000, 33.81],
            [1751506800000, 34.4],
            [1751593200000, 34.63],
            [1751679600000, 34.46],
            [1751766000000, 34.48],
            [1751852400000, 34.31],
            [1752111600000, 34.7],
            [1752198000000, 34.31],
            [1752284400000, 33.46],
            [1752370800000, 33.59],
            [1752716400000, 33.22],
            [1752802800000, 32.61],
            [1752889200000, 33.01],
            [1752975600000, 33.55],
            [1753062000000, 33.18],
            [1753321200000, 32.84],
            [1753407600000, 33.84],
            [1753494000000, 33.39],
            [1753580400000, 32.91],
            [1753666800000, 33.06],
            [1753926000000, 32.62],
            [1754012400000, 32.4],
            [1754098800000, 33.13],
            [1754185200000, 33.26],
            [1754271600000, 33.58],
            [1754530800000, 33.55],
            [1754617200000, 33.77],
            [1754703600000, 33.76],
            [1754790000000, 33.32],
            [1754876400000, 32.61],
            [1755135600000, 32.52],
            [1755222000000, 32.67],
            [1755308400000, 32.52],
            [1755394800000, 31.92],
            [1755481200000, 32.2],
            [1755740400000, 32.23],
            [1755826800000, 32.33],
            [1755913200000, 32.36],
            [1755999600000, 32.01],
            [1756086000000, 31.31],
            [1756345200000, 32.01],
            [1756431600000, 32.01],
            [1756518000000, 32.18],
            [1756604400000, 31.54],
            [1756690800000, 31.6],
            [1757036400000, 32.05],
            [1757122800000, 31.29],
            [1757209200000, 31.05],
            [1757295600000, 29.82],
            [1757554800000, 30.31],
            [1757641200000, 30.7],
            [1757727600000, 31.69],
            [1757814000000, 31.32],
            [1757900400000, 31.65],
            [1758159600000, 31.13],
            [1758246000000, 31.77],
            [1758332400000, 31.79],
            [1758418800000, 31.67],
            [1758505200000, 32.39],
            [1758764400000, 32.63],
            [1758850800000, 32.89],
            [1758937200000, 31.99],
            [1759023600000, 31.23],
            [1759110000000, 31.57],
            [1759369200000, 30.84],
            [1759455600000, 31.07],
            [1759542000000, 31.41],
            [1759628400000, 31.17],
            [1759714800000, 32.37],
            [1759974000000, 32.19],
            [1760060400000, 32.51],
            [1760233200000, 32.53],
            [1760319600000, 31.37],
            [1760578800000, 30.43],
            [1760665200000, 30.44],
            [1760751600000, 30.2],
            [1760838000000, 30.14],
            [1760924400000, 30.65],
            [1761183600000, 30.4],
            [1761270000000, 30.65],
            [1761356400000, 31.43],
            [1761442800000, 31.89],
            [1761529200000, 31.38],
            [1761788400000, 30.64],
            [1761874800000, 30.02],
            [1761961200000, 30.33],
            [1762047600000, 30.95],
            [1762134000000, 31.89],
            [1762393200000, 31.01],
            [1762479600000, 30.88],
            [1762566000000, 30.69],
            [1762652400000, 30.58],
            [1762738800000, 32.02],
            [1762998000000, 32.14],
            [1763084400000, 32.37],
            [1763170800000, 32.51],
            [1763257200000, 32.65],
            [1763343600000, 32.64],
            [1763602800000, 32.27],
            [1763689200000, 32.1],
            [1763775600000, 32.91],
            [1763862000000, 33.65],
            [1763948400000, 33.8],
            [1764207600000, 33.92],
            [1764294000000, 33.75],
            [1764380400000, 33.84],
            [1764466800000, 33.5],
            [1764553200000, 32.26],
            [1764812400000, 32.32],
            [1764898800000, 32.06],
            [1764985200000, 31.96],
            [1765071600000, 31.46],
            [1765158000000, 31.27],
            [1765503600000, 31.43],
            [1765590000000, 32.26],
            [1765676400000, 32.79],
            [1765762800000, 32.46],
            [1766022000000, 32.13],
            [1766108400000, 32.43],
            [1766194800000, 32.42],
            [1766281200000, 32.81],
            [1766367600000, 33.34],
            [1766626800000, 33.41],
            [1766713200000, 32.57],
            [1766799600000, 33.12],
            [1766886000000, 34.53],
            [1766972400000, 33.83],
            [1767231600000, 33.41],
            [1767318000000, 32.9],
            [1767404400000, 32.53],
            [1767490800000, 32.8],
            [1767577200000, 32.44],
            [1767836400000, 32.62],
            [1767922800000, 32.57],
            [1768009200000, 32.6],
            [1768095600000, 32.68],
            [1768182000000, 32.47],
            [1768441200000, 32.23],
            [1768527600000, 31.68],
            [1768614000000, 31.51],
            [1768700400000, 31.78],
            [1768786800000, 31.94],
            [1769046000000, 32.33],
            [1769132400000, 33.24],
            [1769218800000, 33.44],
            [1769305200000, 33.48],
            [1769391600000, 33.24],
            [1769650800000, 33.49],
            [1769737200000, 33.31],
            [1769823600000, 33.36],
            [1769910000000, 33.4],
            [1769996400000, 34.01],
            [1770432000000, 34.02],
            [1770518400000, 34.36],
            [1770604800000, 34.39],
            [1770864000000, 34.24],
            [1770950400000, 34.39],
            [1771036800000, 33.47],
            [1771123200000, 32.98],
            [1771209600000, 32.9],
            [1771468800000, 32.7],
            [1771555200000, 32.54],
            [1771641600000, 32.23],
            [1771728000000, 32.64],
            [1771814400000, 32.65],
            [1772073600000, 32.92],
            [1772160000000, 32.64],
            [1772246400000, 32.84],
            [1772419200000, 33.4],
            [1772678400000, 33.3],
            [1772764800000, 33.18],
            [1772851200000, 33.88],
            [1772937600000, 34.09],
            [1773024000000, 34.61],
            [1773283200000, 34.7],
            [1773369600000, 35.3],
            [1773456000000, 35.4],
            [1773542400000, 35.14],
            [1773628800000, 35.48],
            [1773888000000, 35.75],
            [1773974400000, 35.54],
            [1774060800000, 35.96],
            [1774147200000, 35.53],
            [1774233600000, 37.56],
            [1774492800000, 37.42],
            [1774579200000, 37.49],
            [1774665600000, 38.09],
            [1774752000000, 37.87],
        ];

        const chartOptions = {
            series: [
                {
                    name: "Portfolio Performance",
                    data: data,
                },
            ],
            legend: {
                show: false,
                position: "top",
                horizontalAlign: "left",
            },
            colors: ["#465FFF"],
            chart: {
                fontFamily: "Outfit, sans-serif",
                height: 335,
                id: "area-datetime",
                type: "area",
                toolbar: {
                    show: false,
                },
            },

            stroke: {
                curve: "straight",
                width: ["1", "1"],
            },

            dataLabels: {
                enabled: false,
            },

            markers: {
                size: 0,
            },

            labels: {
                show: false,
                position: "top",
            },

            xaxis: {
                type: "datetime",
                tickAmount: 10,
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                tooltip: false,
            },

            tooltip: {
                x: {
                    format: "dd MMM yyyy",
                },
            },

            fill: {
                gradient: {
                    enabled: true,
                    opacityFrom: 0.55,
                    opacityTo: 0,
                },
            },

            grid: {
                xaxis: {
                    lines: {
                        show: false,
                    },
                },
                yaxis: {
                    lines: {
                        show: true,
                    },
                },
            },

            yaxis: {
                title: {
                    style: {
                        fontSize: "0px",
                    },
                },
            },
        };
        const chartThirteen = new ApexCharts(chartThirteenEl, chartOptions);
        chartThirteen.render();
        return chartThirteen;
    }
}

export default initChartThirteen;
```

## File: `resources/js/components/chart/chart-2.js`

```javascript

export const initChartTwo = () => {
    const chartElement = document.querySelector('#chartTwo');

    if (chartElement) {
        const chartTwoOptions = {
            series: [75.55],
            colors: ["#465FFF"],
            chart: {
                fontFamily: "Outfit, sans-serif",
                type: "radialBar",
                height: 330,
                sparkline: {
                    enabled: true,
                },
            },
            plotOptions: {
                radialBar: {
                    startAngle: -90,
                    endAngle: 90,
                    hollow: {
                        size: "80%",
                    },
                    track: {
                        background: "#E4E7EC",
                        strokeWidth: "100%",
                        margin: 5, // margin is in pixels
                    },
                    dataLabels: {
                        name: {
                            show: false,
                        },
                        value: {
                            fontSize: "36px",
                            fontWeight: "600",
                            offsetY: 60,
                            color: "#1D2939",
                            formatter: function (val) {
                                return val + "%";
                            },
                        },
                    },
                },
            },
            fill: {
                type: "solid",
                colors: ["#465FFF"],
            },
            stroke: {
                lineCap: "round",
            },
            labels: ["Progress"],
        };

        const chart = new ApexCharts(chartElement, chartTwoOptions);
        chart.render();
        return chart;
    }
}

export default initChartTwo;
```

## File: `resources/js/components/chart/chart-3.js`

```javascript

export const initChartThree = () => {
    const chartElement = document.querySelector('#chartThree');

    if (chartElement) {
        const chartThreeOptions = {
            series: [{
                name: "Sales",
                data: [180, 190, 170, 160, 175, 165, 170, 205, 230, 210, 240, 235],
            },
            {
                name: "Revenue",
                data: [40, 30, 50, 40, 55, 40, 70, 100, 110, 120, 150, 140],
            },
            ],
            legend: {
                show: false,
                position: "top",
                horizontalAlign: "left",
            },
            colors: ["#465FFF", "#9CB9FF"],
            chart: {
                fontFamily: "Outfit, sans-serif",
                height: 310,
                type: "area",
                toolbar: {
                    show: false,
                },
            },
            fill: {
                gradient: {
                    enabled: true,
                    opacityFrom: 0.55,
                    opacityTo: 0,
                },
            },
            stroke: {
                curve: "straight",
                width: ["2", "2"],
            },
            markers: {
                size: 0,
            },
            labels: {
                show: false,
                position: "top",
            },
            grid: {
                xaxis: {
                    lines: {
                        show: false,
                    },
                },
                yaxis: {
                    lines: {
                        show: true,
                    },
                },
            },
            dataLabels: {
                enabled: false,
            },
            tooltip: {
                x: {
                    format: "dd MMM yyyy",
                },
            },
            xaxis: {
                type: "category",
                categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                tooltip: false,
            },
            yaxis: {
                title: {
                    style: {
                        fontSize: "0px",
                    },
                },
            },
        };

        const chart = new ApexCharts(chartElement, chartThreeOptions);
        chart.render();
        return chart;
    }
}

export default initChartThree;
```

## File: `resources/js/components/chart/chart-6.js`

```javascript


export function initChartSix() {
    const chartSixEl = document.querySelector('#chartSix');
    if (chartSixEl) {
        const chartSixOptions = {
            series: [
                {
                    name: "Direct",
                    data: [44, 55, 41, 67, 22, 43, 55, 41],
                },
                {
                    name: "Referral",
                    data: [13, 23, 20, 8, 13, 27, 13, 23],
                },
                {
                    name: "Organic Search",
                    data: [11, 17, 15, 15, 21, 14, 18, 20],
                },
                {
                    name: "Social",
                    data: [21, 7, 25, 13, 22, 8, 18, 20],
                },
            ],
            colors: ["#2a31d8", "#465fff", "#7592ff", "#c2d6ff"],
            chart: {
                fontFamily: "Outfit, sans-serif",
                type: "bar",
                stacked: true,
                height: 315,
                toolbar: {
                    show: false,
                },
                zoom: {
                    enabled: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "39%",
                    borderRadius: 10,
                    borderRadiusApplication: "end",
                    borderRadiusWhenStacked: "last",
                },
            },
            dataLabels: {
                enabled: false,
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            legend: {
                show: true,
                position: "top",
                horizontalAlign: "left",
                fontFamily: "Outfit",
                fontSize: "14px",
                fontWeight: 400,
                markers: {
                    size: 5,
                    shape: "circle",
                    radius: 999,
                    strokeWidth: 0,
                },
                itemMargin: {
                    horizontal: 10,
                    vertical: 0,
                },
            },
            yaxis: {
                title: false,
            },
            grid: {
                yaxis: {
                    lines: {
                        show: true,
                    },
                },
            },
            fill: {
                opacity: 1,
            },

            tooltip: {
                x: {
                    show: false,
                },
                y: {
                    formatter: function (val) {
                        return val;
                    },
                },
            },
        };

        const chartSix = new ApexCharts(chartSixEl, chartSixOptions);
        chartSix.render();
        return chartSix;
    }
}
```

## File: `resources/js/components/chart/chart-8.js`

```javascript

export function initChartEight() {
    const chartEightEl = document.querySelector('#chartEight');
    if (chartEightEl) {
        const chartEightOptions = {
            series: [
                {
                    name: "Sales",
                    data: [180, 190, 170, 160, 175, 165, 170, 205, 230, 210, 240, 235],
                },
                {
                    name: "Revenue",
                    data: [40, 30, 50, 40, 55, 40, 70, 100, 110, 120, 150, 140],
                },
            ],
            legend: {
                show: false,
                position: "top",
                horizontalAlign: "left",
            },
            colors: ["#465FFF", "#9CB9FF"],
            chart: {
                fontFamily: "Outfit, sans-serif",
                height: 310,
                type: "area",
                toolbar: {
                    show: false,
                },
            },
            fill: {
                gradient: {
                    enabled: true,
                    opacityFrom: 0.55,
                    opacityTo: 0,
                },
            },
            stroke: {
                curve: "smooth",
                width: ["2", "2"],
            },

            markers: {
                size: 0,
            },
            labels: {
                show: false,
                position: "top",
            },
            grid: {
                xaxis: {
                    lines: {
                        show: false,
                    },
                },
                yaxis: {
                    lines: {
                        show: true,
                    },
                },
            },
            dataLabels: {
                enabled: false,
            },
            tooltip: {
                x: {
                    format: "dd MMM yyyy",
                },
            },
            xaxis: {
                type: "category",
                categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                tooltip: false,
            },
            yaxis: {
                title: {
                    style: {
                        fontSize: "0px",
                    },
                },
            },
        };

        const chartEight = new ApexCharts(chartEightEl, chartEightOptions);
        chartEight.render();

        return chartEight;
    }
}
export default initChartEight;
```

## File: `resources/js/components/chart/ticket-charts.js`

```javascript
export default function initTicketStatusChart() {
    const chartElement = document.querySelector('#ticket-status-chart');

    if (!chartElement) {
        return;
    }

    const rawStats = chartElement.dataset.ticketStats;

    if (!rawStats) {
        console.warn('Data ticket stats tidak ditemukan.');
        return;
    }

    let ticketStats;

    try {
        ticketStats = JSON.parse(rawStats);
    } catch (error) {
        console.error('Gagal membaca data ticket stats:', error);
        return;
    }

    console.log('Ticket stats dari database:', ticketStats);

    const labels = ticketStats.map(item => item.status);
    const series = ticketStats.map(item => Number(item.total));

    const options = {
        series: series,

        chart: {
            type: 'donut',
            height: 350,
            fontFamily: 'Outfit, sans-serif',
        },

        labels: labels,

        legend: {
            position: 'bottom',
        },

        dataLabels: {
            enabled: true,
        },

        responsive: [
            {
                breakpoint: 480,
                options: {
                    chart: {
                        width: 300,
                    },

                    legend: {
                        position: 'bottom',
                    },
                },
            },
        ],
    };

    const chart = new ApexCharts(chartElement, options);

    chart.render();
}
```

## File: `resources/js/components/map.js`

```javascript
import jsVectorMap from 'jsvectormap';
import 'jsvectormap/dist/maps/world';
import 'jsvectormap/dist/jsvectormap.min.css';

export const initMap = () => {
    const mapSelectorOne = document.querySelectorAll('#mapOne');

    if (mapSelectorOne.length) {
        const mapOne = new jsVectorMap({
            selector: "#mapOne",
            map: "world",
            zoomButtons: false,
            regionStyle: {
                initial: {
                    fontFamily: "Outfit",
                    fill: "#D9D9D9",
                },
                hover: {
                    fillOpacity: 1,
                    fill: "#465fff",
                },
            },
            markers: [
                {
                    name: "Egypt",
                    coords: [26.8206, 30.8025],
                },
                {
                    name: "United Kingdom",
                    coords: [55.3781, 3.436],
                },
                {
                    name: "United States",
                    coords: [37.0902, -95.7129],
                },
            ],

            markerStyle: {
                initial: {
                    strokeWidth: 1,
                    fill: "#465fff",
                    fillOpacity: 1,
                    r: 4,
                },
                hover: {
                    fill: "#465fff",
                    fillOpacity: 1,
                },
                selected: {},
                selectedHover: {},
            },

            onRegionTooltipShow: function (event, tooltip, code) {
                tooltip.text(
                    tooltip.text() + (code === "EG" ? " <b>(Hello Russia)</b>" : ""),
                    true // This second parameter enables HTML
                );
            },
        });
    }
};

export default initMap;
```

## File: `resources/views/components/calender-area.blade.php`

```blade
<div>
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/3">
        <div class="custom-calendar relative">
            <div id="calendar"></div>
        </div>
    </div>

    <!-- Modal -->
    <div class="fixed inset-0 items-center justify-center hidden p-4 sm:p-5 overflow-y-auto modal z-99999" id="eventModal">
        <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
        <div class="modal-dialog relative flex w-full max-w-175 flex-col overflow-y-auto rounded-3xl bg-white p-4 sm:p-6 lg:p-10 dark:bg-gray-900">

            <!-- Close Button -->
            <button class="modal-close-btn transition-colors absolute top-4 end-4 sm:top-5 sm:end-5 z-999 flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-600 sm:h-10 sm:w-10 dark:bg-white/5 dark:text-gray-400 dark:hover:bg-white/10 dark:hover:text-gray-300">
                <svg class="fill-current" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z" fill="" />
                </svg>
            </button>

            <div class="flex flex-col px-1 sm:px-2 overflow-y-auto modal-content custom-scrollbar">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="mb-2 font-semibold text-gray-800 modal-title text-theme-xl lg:text-2xl dark:text-white/90" id="eventModalLabel">
                        Add Event
                    </h5>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Plan your next big moment: schedule or edit an event to stay on track
                    </p>
                </div>

                <!-- Modal Body -->
                <div class="mt-8 space-y-6 modal-body">

                    <!-- Event Title -->
                    <div>
                        <label for="event-title" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Event Title
                        </label>
                        <input id="event-title" type="text" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" placeholder="Enter event title" />
                    </div>

                    <!-- Event Color -->
                    <div>
                        <label class="mb-4 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Event Color
                        </label>
                        <div class="flex flex-wrap items-center gap-3 sm:gap-4">

                            <!-- Danger -->
                            <div class="n-chk">
                                <div class="form-check form-check-danger form-check-inline">
                                    <label class="flex items-center text-sm text-gray-700 form-check-label dark:text-gray-400 cursor-pointer" for="modalDanger">
                                        <span class="relative">
                                            <input class="sr-only form-check-input" type="radio" name="event-level" value="Danger" id="modalDanger" />
                                            <span class="box me-2 flex h-5 w-5 items-center justify-center rounded-full border border-gray-300 dark:border-gray-700">
                                            </span>
                                        </span>
                                        Danger
                                    </label>
                                </div>
                            </div>

                            <!-- Success -->
                            <div class="n-chk">
                                <div class="form-check form-check-success form-check-inline">
                                    <label class="flex items-center text-sm text-gray-700 form-check-label dark:text-gray-400 cursor-pointer" for="modalSuccess">
                                        <span class="relative">
                                            <input class="sr-only form-check-input" type="radio" name="event-level" value="Success" id="modalSuccess" />
                                            <span class="box me-2 flex h-5 w-5 items-center justify-center rounded-full border border-gray-300 dark:border-gray-700">
                                            </span>
                                        </span>
                                        Success
                                    </label>
                                </div>
                            </div>

                            <!-- Primary -->
                            <div class="n-chk">
                                <div class="form-check form-check-primary form-check-inline">
                                    <label class="flex items-center text-sm text-gray-700 form-check-label dark:text-gray-400 cursor-pointer" for="modalPrimary">
                                        <span class="relative">
                                            <input class="sr-only form-check-input" type="radio" name="event-level" value="Primary" id="modalPrimary" checked />
                                            <span class="box me-2 flex h-5 w-5 items-center justify-center rounded-full border border-gray-300 dark:border-gray-700">
                                            </span>
                                        </span>
                                        Primary
                                    </label>
                                </div>
                            </div>

                            <!-- Warning -->
                            <div class="n-chk">
                                <div class="form-check form-check-warning form-check-inline">
                                    <label class="flex items-center text-sm text-gray-700 form-check-label dark:text-gray-400 cursor-pointer" for="modalWarning">
                                        <span class="relative">
                                            <input class="sr-only form-check-input" type="radio" name="event-level" value="Warning" id="modalWarning" />
                                            <span class="box me-2 flex h-5 w-5 items-center justify-center rounded-full border border-gray-300 dark:border-gray-700">
                                            </span>
                                        </span>
                                        Warning
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Start Date -->
                    <div>
                        <label for="event-start-date" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Enter Start Date
                        </label>
                        <div class="relative">
                            <input id="event-start-date" type="date" class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none py-2.5 ps-4 pe-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800 cursor-pointer" onclick="this.showPicker?.()" />
                            <span class="absolute top-1/2 end-3.5 -translate-y-1/2 pointer-events-none text-gray-700 dark:text-gray-400">
                                <svg class="fill-current" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.33317 0.0830078C4.74738 0.0830078 5.08317 0.418794 5.08317 0.833008V1.24967H8.9165V0.833008C8.9165 0.418794 9.25229 0.0830078 9.6665 0.0830078C10.0807 0.0830078 10.4165 0.418794 10.4165 0.833008V1.24967L11.3332 1.24967C12.2997 1.24967 13.0832 2.03318 13.0832 2.99967V4.99967V11.6663C13.0832 12.6328 12.2997 13.4163 11.3332 13.4163H2.6665C1.70001 13.4163 0.916504 12.6328 0.916504 11.6663V4.99967V2.99967C0.916504 2.03318 1.70001 1.24967 2.6665 1.24967L3.58317 1.24967V0.833008C3.58317 0.418794 3.91896 0.0830078 4.33317 0.0830078ZM4.33317 2.74967H2.6665C2.52843 2.74967 2.4165 2.8616 2.4165 2.99967V4.24967H11.5832V2.99967C11.5832 2.8616 11.4712 2.74967 11.3332 2.74967H9.6665H4.33317ZM11.5832 5.74967H2.4165V11.6663C2.4165 11.8044 2.52843 11.9163 2.6665 11.9163H11.3332C11.4712 11.9163 11.5832 11.8044 11.5832 11.6663V5.74967Z" fill="" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <!-- End Date -->
                    <div>
                        <label for="event-end-date" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Enter End Date
                        </label>
                        <div class="relative">
                            <input id="event-end-date" type="date" class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none py-2.5 ps-4 pe-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800 cursor-pointer" onclick="this.showPicker?.()" />
                            <span class="absolute top-1/2 end-3.5 -translate-y-1/2 pointer-events-none text-gray-700 dark:text-gray-400">
                                <svg class="fill-current" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.33317 0.0830078C4.74738 0.0830078 5.08317 0.418794 5.08317 0.833008V1.24967H8.9165V0.833008C8.9165 0.418794 9.25229 0.0830078 9.6665 0.0830078C10.0807 0.0830078 10.4165 0.418794 10.4165 0.833008V1.24967L11.3332 1.24967C12.2997 1.24967 13.0832 2.03318 13.0832 2.99967V4.99967V11.6663C13.0832 12.6328 12.2997 13.4163 11.3332 13.4163H2.6665C1.70001 13.4163 0.916504 12.6328 0.916504 11.6663V4.99967V2.99967C0.916504 2.03318 1.70001 1.24967 2.6665 1.24967L3.58317 1.24967V0.833008C3.58317 0.418794 3.91896 0.0830078 4.33317 0.0830078ZM4.33317 2.74967H2.6665C2.52843 2.74967 2.4165 2.8616 2.4165 2.99967V4.24967H11.5832V2.99967C11.5832 2.8616 11.4712 2.74967 11.3332 2.74967H9.6665H4.33317ZM11.5832 5.74967H2.4165V11.6663C2.4165 11.8044 2.52843 11.9163 2.6665 11.9163H11.3332C11.4712 11.9163 11.5832 11.8044 11.5832 11.6663V5.74967Z" fill="" />
                                </svg>
                            </span>
                        </div>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="modal-footer mt-6 flex items-center gap-3 sm:justify-end">
                    <button type="button" class="modal-close-btn flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 sm:w-auto dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/3">
                        Close
                    </button>
                    <button type="button" class="btn btn-update-event bg-brand-500 hover:bg-brand-600 flex w-full justify-center rounded-lg px-4 py-2.5 text-sm font-medium text-white sm:w-auto" style="display: none;" data-fc-event-public-id="">
                        Update Changes
                    </button>
                    <button type="button" class="btn btn-add-event bg-brand-500 hover:bg-brand-600 flex w-full justify-center rounded-lg px-4 py-2.5 text-sm font-medium text-white sm:w-auto">
                        Add Event
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
```

## File: `resources/views/components/common/common-grid-shape.blade.php`

```blade
<div>
    <div class="absolute right-0 top-0 -z-1 w-full max-w-[250px] xl:max-w-[450px]">
        <img src="/images/shape/grid-01.svg" alt="grid" />
    </div>
    <div class="absolute bottom-0 left-0 -z-1 w-full max-w-[250px] rotate-180 xl:max-w-[450px]">
        <img src="/images/shape/grid-01.svg" alt="grid" />
    </div>
</div>
```

## File: `resources/views/components/common/component-card.blade.php`

```blade
@props([
    'title',
    'desc' => '',
])

<div {{ $attributes->merge(['class' => 'rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]']) }}>
    <!-- Card Header -->
    <div class="px-6 py-5">
        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
            {{ $title }}
        </h3>
        @if($desc)
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                {{ $desc }}
            </p>
        @endif
    </div>

    <!-- Card Body -->
    <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
        <div class="space-y-6">
            {{ $slot }}
        </div>
    </div>
</div>
```

## File: `resources/views/components/common/dropdown-menu.blade.php`

```blade
@props(['items' => ['View More','Delete']])
<div x-data="{openDropDown: false}" class="relative h-fit">
    <button
        @click="openDropDown = !openDropDown"
        :class="openDropDown ? 'text-gray-700 dark:text-white' : 'text-gray-400 hover:text-gray-700 dark:hover:text-white'"
    >
        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z" fill=""/>
        </svg>
    </button>
    
    <div x-show="openDropDown" @click.outside="openDropDown = false" 
         class="absolute ltr:right-0 rtl:left-0 ltr:left-auto rtl:right-auto z-40 w-40 p-2 space-y-1 bg-white border border-gray-200 shadow-theme-lg dark:bg-gray-dark top-full rounded-2xl dark:border-gray-800"
         x-cloak>
        @forelse($items as $item)
            <button class="flex w-full px-3 py-2 font-medium ltr:text-left rtl:text-right text-gray-500 rounded-lg text-theme-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                {{ __($item) }}
            </button>
        @empty
            {{ $slot }}
        @endforelse
    </div>
</div>
```

## File: `resources/views/components/common/page-breadcrumb.blade.php`

```blade
@props(['pageTitle' => 'Page'])

<div class="flex flex-wrap items-center justify-between gap-3 mb-6">
    <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">
        {{ $pageTitle }}
    </h2>
    <nav>
        <ol class="flex items-center gap-1.5">
            <li>
                <a
                    class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                    href="{{ url('/') }}"
                >
                    Home
                    <svg
                        class="stroke-current rtl:rotate-180"
                        width="17"
                        height="16"
                        viewBox="0 0 17 16"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366"
                            stroke=""
                            stroke-width="1.2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </a>
            </li>
            <li class="text-sm text-gray-800 dark:text-white/90">
                {{ $pageTitle }}
            </li>
        </ol>
    </nav>
</div>
```

## File: `resources/views/components/common/preloader.blade.php`

```blade
<div
  x-show="loaded"
  x-init="window.addEventListener('DOMContentLoaded', () => {setTimeout(() => loaded = false, 350)})"
  class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black"
>
  <div
    class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-brand-500 border-t-transparent"
  ></div>
</div>
```

## File: `resources/views/components/common/table-dropdown.blade.php`

```blade



<div x-data="{
    isOpen: false,
    popperInstance: null,
    init() {
        this.$nextTick(() => {
            const isRtl = document.documentElement.dir === 'rtl' || document.documentElement.getAttribute('dir') === 'rtl';
            this.popperInstance = createPopper(this.$refs.button, this.$refs.content, {
                placement: isRtl ? 'bottom-start' : 'bottom-end',
                strategy: 'fixed',
                modifiers: [
                    {
                        name: 'offset',
                        options: {
                            offset: [0, 4],
                        },
                    },
                    {
                        name: 'preventOverflow',
                        options: {
                            padding: 8,
                        },
                    },
                ],
            });
        });
    },
    toggle() {
        this.isOpen = !this.isOpen;
        if (this.popperInstance) {
            const isRtl = document.documentElement.dir === 'rtl' || document.documentElement.getAttribute('dir') === 'rtl';
            this.popperInstance.setOptions((options) => ({
                ...options,
                placement: isRtl ? 'bottom-start' : 'bottom-end',
            }));
            this.popperInstance.update();
        }
    }
}"
@click.away="isOpen = false">
    <div @click="toggle()" x-ref="button" class="cursor-pointer">
        {{ $button }}
    </div>

    <div class="z-50 fixed" x-ref="content">
        <div x-show="isOpen" x-cloak class="p-2 bg-white border border-gray-200 rounded-2xl shadow-lg dark:border-gray-800 dark:bg-gray-dark w-40">
            <div class="space-y-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                {{ $content }}
            </div>
        </div>
    </div>
</div>
```

## File: `resources/views/components/common/theme-toggle.blade.php`

```blade
<button
    x-data="{ theme: localStorage.getItem('theme') === 'dark' ? 'dark' : 'light' }"
    x-init="
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        }
    "
    @click="
        theme = theme === 'light' ? 'dark' : 'light';
        localStorage.setItem('theme', theme);
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    "
    class="relative flex items-center justify-center text-gray-500 transition-colors bg-white border border-gray-200 rounded-full hover:text-dark-900 h-11 w-11 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white"
>
    <!-- Dark Icon -->
    <svg x-show="theme === 'dark'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="20" height="20">
        <path fill="currentColor" d="M9.99998 1.5415C10.4142 1.5415 10.75 1.87729 10.75 2.2915V3.5415C10.75 3.95572 10.4142 4.2915 9.99998 4.2915C9.58577 4.2915 9.24998 3.95572 9.24998 3.5415V2.2915C9.24998 1.87729 9.58577 1.5415 9.99998 1.5415Z" />
        <!-- (rest of moon icon path here) -->
    </svg>

    <!-- Light Icon -->
    <svg x-show="theme === 'light'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="20" height="20">
        <path fill="currentColor" d="M17.4547 11.97L18.1799 12.1611C18.265 11.8383 18.1265 11.4982 17.8401 11.3266C17.5538 11.1551 17.1885 11.1934 16.944 11.4207L17.4547 11.97Z" />
        <!-- (rest of sun icon path here) -->
    </svg>
</button>
```

## File: `resources/views/components/ecommerce/customer-demographic.blade.php`

```blade
@props(['countries' => []])

@php
    $defaultCountries = [
        [
            'name' => 'USA',
            'flag' => './images/country/country-01.svg',
            'customers' => '2,379',
            'percentage' => 79
        ],
        [
            'name' => 'France',
            'flag' => './images/country/country-02.svg',
            'customers' => '589',
            'percentage' => 23
        ],
    ];
    
    $countriesList = !empty($countries) ? $countries : $defaultCountries;
@endphp

<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] sm:p-6">
    <div class="flex justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                Customers Demographic
            </h3>
            <p class="mt-1 text-theme-sm text-gray-500 dark:text-gray-400">
                Number of customer based on country
            </p>
        </div>

         <!-- Dropdown Menu -->
         <x-common.dropdown-menu />
         <!-- End Dropdown Menu -->
    </div>

    <div class="border-gary-200 my-6 overflow-hidden rounded-2xl border bg-gray-50 px-4 py-6 dark:border-gray-800 dark:bg-gray-900 sm:px-6">
        <div id="mapOne" class="mapOne map-btn -mx-4 -my-6 h-[212px] w-[252px] 2xsm:w-[307px] xsm:w-[358px] sm:-mx-6 md:w-[668px] lg:w-[634px] xl:w-[393px] 2xl:w-[554px]"></div>
    </div>

    <div class="space-y-5">
        @foreach($countriesList as $country)
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-full max-w-8 items-center rounded-full">
                        <img src="{{ $country['flag'] }}" alt="{{ strtolower($country['name']) }}" />
                    </div>
                    <div>
                        <p class="text-theme-sm font-semibold text-gray-800 dark:text-white/90">
                            {{ $country['name'] }}
                        </p>
                        <span class="block text-theme-xs text-gray-500 dark:text-gray-400">
                            {{ $country['customers'] }} Customers
                        </span>
                    </div>
                </div>

                <div class="flex w-full max-w-[140px] items-center gap-3">
                    <div class="relative block h-2 w-full max-w-[100px] rounded-sm bg-gray-200 dark:bg-gray-800">
                        <div 
                            class="absolute left-0 top-0 flex h-full items-center justify-center rounded-sm bg-brand-500 text-xs font-medium text-white"
                            style="width: {{ $country['percentage'] }}%"
                        ></div>
                    </div>
                    <p class="text-theme-sm font-medium text-gray-800 dark:text-white/90">
                        {{ $country['percentage'] }}%
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
```

## File: `resources/views/components/ecommerce/ecommerce-metrics.blade.php`

```blade
<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6">
    <div
      class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6"
    >
      <div
        class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-xl dark:bg-gray-800"
      >
        <svg
          class="fill-gray-800 dark:fill-white/90"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M8.80443 5.60156C7.59109 5.60156 6.60749 6.58517 6.60749 7.79851C6.60749 9.01185 7.59109 9.99545 8.80443 9.99545C10.0178 9.99545 11.0014 9.01185 11.0014 7.79851C11.0014 6.58517 10.0178 5.60156 8.80443 5.60156ZM5.10749 7.79851C5.10749 5.75674 6.76267 4.10156 8.80443 4.10156C10.8462 4.10156 12.5014 5.75674 12.5014 7.79851C12.5014 9.84027 10.8462 11.4955 8.80443 11.4955C6.76267 11.4955 5.10749 9.84027 5.10749 7.79851ZM4.86252 15.3208C4.08769 16.0881 3.70377 17.0608 3.51705 17.8611C3.48384 18.0034 3.5211 18.1175 3.60712 18.2112C3.70161 18.3141 3.86659 18.3987 4.07591 18.3987H13.4249C13.6343 18.3987 13.7992 18.3141 13.8937 18.2112C13.9797 18.1175 14.017 18.0034 13.9838 17.8611C13.7971 17.0608 13.4132 16.0881 12.6383 15.3208C11.8821 14.572 10.6899 13.955 8.75042 13.955C6.81096 13.955 5.61877 14.572 4.86252 15.3208ZM3.8071 14.2549C4.87163 13.2009 6.45602 12.455 8.75042 12.455C11.0448 12.455 12.6292 13.2009 13.6937 14.2549C14.7397 15.2906 15.2207 16.5607 15.4446 17.5202C15.7658 18.8971 14.6071 19.8987 13.4249 19.8987H4.07591C2.89369 19.8987 1.73504 18.8971 2.05628 17.5202C2.28015 16.5607 2.76117 15.2906 3.8071 14.2549ZM15.3042 11.4955C14.4702 11.4955 13.7006 11.2193 13.0821 10.7533C13.3742 10.3314 13.6054 9.86419 13.7632 9.36432C14.1597 9.75463 14.7039 9.99545 15.3042 9.99545C16.5176 9.99545 17.5012 9.01185 17.5012 7.79851C17.5012 6.58517 16.5176 5.60156 15.3042 5.60156C14.7039 5.60156 14.1597 5.84239 13.7632 6.23271C13.6054 5.73284 13.3741 5.26561 13.082 4.84371C13.7006 4.37777 14.4702 4.10156 15.3042 4.10156C17.346 4.10156 19.0012 5.75674 19.0012 7.79851C19.0012 9.84027 17.346 11.4955 15.3042 11.4955ZM19.9248 19.8987H16.3901C16.7014 19.4736 16.9159 18.969 16.9827 18.3987H19.9248C20.1341 18.3987 20.2991 18.3141 20.3936 18.2112C20.4796 18.1175 20.5169 18.0034 20.4837 17.861C20.2969 17.0607 19.913 16.088 19.1382 15.3208C18.4047 14.5945 17.261 13.9921 15.4231 13.9566C15.2232 13.6945 14.9995 13.437 14.7491 13.1891C14.5144 12.9566 14.262 12.7384 13.9916 12.5362C14.3853 12.4831 14.8044 12.4549 15.2503 12.4549C17.5447 12.4549 19.1291 13.2008 20.1936 14.2549C21.2395 15.2906 21.7206 16.5607 21.9444 17.5202C22.2657 18.8971 21.107 19.8987 19.9248 19.8987Z"
            fill=""
          />
        </svg>
      </div>

      <div class="flex items-end justify-between mt-5">
        <div>
          <span class="text-sm text-gray-500 dark:text-gray-400">Customers</span>
          <h4 class="mt-2 font-bold text-gray-800 text-title-sm dark:text-white/90">3,782</h4>
        </div>

        <span
          class="flex items-center gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500"
        >
          <svg
            class="fill-current"
            width="12"
            height="12"
            viewBox="0 0 12 12"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M5.56462 1.62393C5.70193 1.47072 5.90135 1.37432 6.12329 1.37432C6.1236 1.37432 6.12391 1.37432 6.12422 1.37432C6.31631 1.37415 6.50845 1.44731 6.65505 1.59381L9.65514 4.5918C9.94814 4.88459 9.94831 5.35947 9.65552 5.65246C9.36273 5.94546 8.88785 5.94562 8.59486 5.65283L6.87329 3.93247L6.87329 10.125C6.87329 10.5392 6.53751 10.875 6.12329 10.875C5.70908 10.875 5.37329 10.5392 5.37329 10.125L5.37329 3.93578L3.65516 5.65282C3.36218 5.94562 2.8873 5.94547 2.5945 5.65248C2.3017 5.35949 2.30185 4.88462 2.59484 4.59182L5.56462 1.62393Z"
              fill=""
            />
          </svg>

          11.01%
        </span>
      </div>
    </div>

    <div
      class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6"
    >
      <div
        class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-xl dark:bg-gray-800"
      >
        <svg
          class="fill-gray-800 dark:fill-white/90"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M11.665 3.75621C11.8762 3.65064 12.1247 3.65064 12.3358 3.75621L18.7807 6.97856L12.3358 10.2009C12.1247 10.3065 11.8762 10.3065 11.665 10.2009L5.22014 6.97856L11.665 3.75621ZM4.29297 8.19203V16.0946C4.29297 16.3787 4.45347 16.6384 4.70757 16.7654L11.25 20.0366V11.6513C11.1631 11.6205 11.0777 11.5843 10.9942 11.5426L4.29297 8.19203ZM12.75 20.037L19.2933 16.7654C19.5474 16.6384 19.7079 16.3787 19.7079 16.0946V8.19202L13.0066 11.5426C12.9229 11.5844 12.8372 11.6208 12.75 11.6516V20.037ZM13.0066 2.41456C12.3732 2.09786 11.6277 2.09786 10.9942 2.41456L4.03676 5.89319C3.27449 6.27432 2.79297 7.05342 2.79297 7.90566V16.0946C2.79297 16.9469 3.27448 17.726 4.03676 18.1071L10.9942 21.5857L11.3296 20.9149L10.9942 21.5857C11.6277 21.9024 12.3732 21.9024 13.0066 21.5857L19.9641 18.1071C20.7264 17.726 21.2079 16.9469 21.2079 16.0946V7.90566C21.2079 7.05342 20.7264 6.27432 19.9641 5.89319L13.0066 2.41456Z"
            fill=""
          />
        </svg>
      </div>

      <div class="flex items-end justify-between mt-5">
        <div>
          <span class="text-sm text-gray-500 dark:text-gray-400">Orders</span>
          <h4 class="mt-2 font-bold text-gray-800 text-title-sm dark:text-white/90">5,359</h4>
        </div>

        <span
          class="flex items-center gap-1 rounded-full bg-error-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-error-600 dark:bg-error-500/15 dark:text-error-500"
        >
          <svg
            class="fill-current"
            width="12"
            height="12"
            viewBox="0 0 12 12"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M5.31462 10.3761C5.45194 10.5293 5.65136 10.6257 5.87329 10.6257C5.8736 10.6257 5.8739 10.6257 5.87421 10.6257C6.0663 10.6259 6.25845 10.5527 6.40505 10.4062L9.40514 7.4082C9.69814 7.11541 9.69831 6.64054 9.40552 6.34754C9.11273 6.05454 8.63785 6.05438 8.34486 6.34717L6.62329 8.06753L6.62329 1.875C6.62329 1.46079 6.28751 1.125 5.87329 1.125C5.45908 1.125 5.12329 1.46079 5.12329 1.875L5.12329 8.06422L3.40516 6.34719C3.11218 6.05439 2.6373 6.05454 2.3445 6.34752C2.0517 6.64051 2.05185 7.11538 2.34484 7.40818L5.31462 10.3761Z"
              fill=""
            />
          </svg>

          9.05%
        </span>
      </div>
    </div>
  </div>
```

## File: `resources/views/components/ecommerce/monthly-sale.blade.php`

```blade
<div
    class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 sm:px-6 sm:pt-6 dark:border-gray-800 dark:bg-white/[0.03]">
    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
            Monthly Sales
        </h3>

        <!-- Dropdown Menu -->
        <x-common.dropdown-menu />
        <!-- End Dropdown Menu -->
    </div>

    <div class="max-w-full overflow-x-auto custom-scrollbar">
        <div id="chartOne" class="-ml-5 h-full min-w-[690px] pl-2 xl:min-w-full"></div>
    </div>
</div>
```

## File: `resources/views/components/ecommerce/monthly-target.blade.php`

```blade
<div class="rounded-2xl border border-gray-200 bg-gray-100 dark:border-gray-800 dark:bg-white/[0.03]">
    <div class="shadow-default rounded-2xl bg-white px-5 pb-11 pt-5 dark:bg-gray-900 sm:px-6 sm:pt-6">
        <div class="flex justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                    Monthly Target
                </h3>
                <p class="mt-1 text-theme-sm text-gray-500 dark:text-gray-400">
                    Target you’ve set for each month
                </p>
            </div>
            <!-- Dropdown Menu -->
            <x-common.dropdown-menu />
            <!-- End Dropdown Menu -->

        </div>
        <div class="relative max-h-[195px]">
            {{-- Chart --}}
            <div id="chartTwo" class="h-full"></div>
            <span class="absolute left-1/2 top-[85%] -translate-x-1/2 -translate-y-[85%] rounded-full bg-success-50 px-3 py-1 text-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">+10%</span>
        </div>
        <p class="mx-auto mt-1.5 w-full max-w-[380px] text-center text-sm text-gray-500 sm:text-base">
            You earn $3287 today, it's higher than last month. Keep up your good work!
        </p>
    </div>

    <div class="flex items-center justify-center gap-5 px-6 py-3.5 sm:gap-8 sm:py-5">
        <div>
            <p class="mb-1 text-center text-theme-xs text-gray-500 dark:text-gray-400 sm:text-sm">
                Target
            </p>
            <p
                class="flex items-center justify-center gap-1 text-base font-semibold text-gray-800 dark:text-white/90 sm:text-lg">
                $20K
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.26816 13.6632C7.4056 13.8192 7.60686 13.9176 7.8311 13.9176C7.83148 13.9176 7.83187 13.9176 7.83226 13.9176C8.02445 13.9178 8.21671 13.8447 8.36339 13.6981L12.3635 9.70076C12.6565 9.40797 12.6567 8.9331 12.3639 8.6401C12.0711 8.34711 11.5962 8.34694 11.3032 8.63973L8.5811 11.36L8.5811 2.5C8.5811 2.08579 8.24531 1.75 7.8311 1.75C7.41688 1.75 7.0811 2.08579 7.0811 2.5L7.0811 11.3556L4.36354 8.63975C4.07055 8.34695 3.59568 8.3471 3.30288 8.64009C3.01008 8.93307 3.01023 9.40794 3.30321 9.70075L7.26816 13.6632Z"
                        fill="#D92D20" />
                </svg>
            </p>
        </div>

        <div class="h-7 w-px bg-gray-200 dark:bg-gray-800"></div>

        <div>
            <p class="mb-1 text-center text-theme-xs text-gray-500 dark:text-gray-400 sm:text-sm">
                Revenue
            </p>
            <p
                class="flex items-center justify-center gap-1 text-base font-semibold text-gray-800 dark:text-white/90 sm:text-lg">
                $20K
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.60141 2.33683C7.73885 2.18084 7.9401 2.08243 8.16435 2.08243C8.16475 2.08243 8.16516 2.08243 8.16556 2.08243C8.35773 2.08219 8.54998 2.15535 8.69664 2.30191L12.6968 6.29924C12.9898 6.59203 12.9899 7.0669 12.6971 7.3599C12.4044 7.6529 11.9295 7.65306 11.6365 7.36027L8.91435 4.64004L8.91435 13.5C8.91435 13.9142 8.57856 14.25 8.16435 14.25C7.75013 14.25 7.41435 13.9142 7.41435 13.5L7.41435 4.64442L4.69679 7.36025C4.4038 7.65305 3.92893 7.6529 3.63613 7.35992C3.34333 7.06693 3.34348 6.59206 3.63646 6.29926L7.60141 2.33683Z"
                        fill="#039855" />
                </svg>
            </p>
        </div>

        <div class="h-7 w-px bg-gray-200 dark:bg-gray-800"></div>

        <div>
            <p class="mb-1 text-center text-theme-xs text-gray-500 dark:text-gray-400 sm:text-sm">
                Today
            </p>
            <p
                class="flex items-center justify-center gap-1 text-base font-semibold text-gray-800 dark:text-white/90 sm:text-lg">
                $20K
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.60141 2.33683C7.73885 2.18084 7.9401 2.08243 8.16435 2.08243C8.16475 2.08243 8.16516 2.08243 8.16556 2.08243C8.35773 2.08219 8.54998 2.15535 8.69664 2.30191L12.6968 6.29924C12.9898 6.59203 12.9899 7.0669 12.6971 7.3599C12.4044 7.6529 11.9295 7.65306 11.6365 7.36027L8.91435 4.64004L8.91435 13.5C8.91435 13.9142 8.57856 14.25 8.16435 14.25C7.75013 14.25 7.41435 13.9142 7.41435 13.5L7.41435 4.64442L4.69679 7.36025C4.4038 7.65305 3.92893 7.6529 3.63613 7.35992C3.34333 7.06693 3.34348 6.59206 3.63646 6.29926L7.60141 2.33683Z"
                        fill="#039855" />
                </svg>
            </p>
        </div>
    </div>
</div>
```

## File: `resources/views/components/ecommerce/recent-orders.blade.php`

```blade
@props(['products' => []])

@php
    $defaultProducts = [
        [
            'name' => 'Macbook pro 13"',
            'variants' => 2,
            'image' => '/images/product/product-01.jpg',
            'category' => 'Laptop',
            'price' => '$2399.00',
            'status' => 'Delivered',
        ],
        [
            'name' => 'Apple Watch Ultra',
            'variants' => 1,
            'image' => '/images/product/product-02.jpg',
            'category' => 'Watch',
            'price' => '$879.00',
            'status' => 'Pending',
        ],
        [
            'name' => 'iPhone 15 Pro Max',
            'variants' => 2,
            'image' => '/images/product/product-03.jpg',
            'category' => 'SmartPhone',
            'price' => '$1869.00',
            'status' => 'Delivered',
        ],
        [
            'name' => 'iPad Pro 3rd Gen',
            'variants' => 2,
            'image' => '/images/product/product-04.jpg',
            'category' => 'Electronics',
            'price' => '$1699.00',
            'status' => 'Canceled',
        ],
        [
            'name' => 'Airpods Pro 2nd Gen',
            'variants' => 1,
            'image' => '/images/product/product-05.jpg',
            'category' => 'Accessories',
            'price' => '$240.00',
            'status' => 'Delivered',
        ],
    ];
    
    $productsList = !empty($products) ? $products : $defaultProducts;
    
    // Helper function for status classes
    $getStatusClasses = function($status) {
        $baseClasses = 'rounded-full px-2 py-0.5 text-theme-xs font-medium';
        
        return match($status) {
            'Delivered' => $baseClasses . ' bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500',
            'Pending' => $baseClasses . ' bg-warning-50 text-warning-600 dark:bg-warning-500/15 dark:text-orange-400',
            'Canceled' => $baseClasses . ' bg-error-50 text-error-600 dark:bg-error-500/15 dark:text-error-500',
            default => $baseClasses . ' bg-gray-50 text-gray-600 dark:bg-gray-500/15 dark:text-gray-400',
        };
    };
@endphp

<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
    <div class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Recent Orders</h3>
        </div>

        <div class="flex items-center gap-3">
            <button class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                <svg class="stroke-current fill-white dark:fill-gray-800" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.29004 5.90393H17.7067" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M17.7075 14.0961H2.29085" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12.0826 3.33331C13.5024 3.33331 14.6534 4.48431 14.6534 5.90414C14.6534 7.32398 13.5024 8.47498 12.0826 8.47498C10.6627 8.47498 9.51172 7.32398 9.51172 5.90415C9.51172 4.48432 10.6627 3.33331 12.0826 3.33331Z" fill="" stroke="" stroke-width="1.5" />
                    <path d="M7.91745 11.525C6.49762 11.525 5.34662 12.676 5.34662 14.0959C5.34661 15.5157 6.49762 16.6667 7.91745 16.6667C9.33728 16.6667 10.4883 15.5157 10.4883 14.0959C10.4883 12.676 9.33728 11.525 7.91745 11.525Z" fill="" stroke="" stroke-width="1.5" />
                </svg>
                Filter
            </button>

            <button class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                See all
            </button>
        </div>
    </div>

    <div class="max-w-full overflow-x-auto custom-scrollbar">
        <table class="min-w-full">
            <thead>
                <tr class="border-t border-gray-100 dark:border-gray-800">
                    <th class="py-3 text-start">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Products</p>
                    </th>
                    <th class="py-3 text-start">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Category</p>
                    </th>
                    <th class="py-3 text-start">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Price</p>
                    </th>
                    <th class="py-3 text-start">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Status</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($productsList as $product)
                    <tr class="border-t border-gray-100 dark:border-gray-800">
                        <td class="py-3 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div class="h-[50px] w-[50px] overflow-hidden rounded-md">
                                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" />
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                        {{ $product['name'] }}
                                    </p>
                                    <span class="text-gray-500 text-theme-xs dark:text-gray-400">
                                        {{ $product['variants'] }} Variants
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 whitespace-nowrap">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ $product['category'] }}</p>
                        </td>
                        <td class="py-3 whitespace-nowrap">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ $product['price'] }}</p>
                        </td>
                        <td class="py-3 whitespace-nowrap">
                            <span class="{{ $getStatusClasses($product['status']) }}">
                                {{ $product['status'] }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
```

## File: `resources/views/components/ecommerce/statistics-chart.blade.php`

```blade
<div
    class="rounded-2xl border border-gray-200 bg-white px-5 pb-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <div class="flex flex-col gap-5 mb-6 sm:flex-row sm:justify-between">
        <div class="w-full">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                Statistics
            </h3>
            <p class="mt-1 text-gray-500 text-theme-sm dark:text-gray-400">
                Target you’ve set for each month
            </p>
        </div>

        <div class="flex items-start w-full gap-3 sm:justify-end">
            <div x-data="{ selected: 'overview' }"
                class="inline-flex w-fit items-center gap-0.5 rounded-lg bg-gray-100 p-0.5 dark:bg-gray-900">

                @php
                    $options = [
                        ['value' => 'overview', 'label' => 'Overview'],
                        ['value' => 'sales', 'label' => 'Sales'],
                        ['value' => 'revenue', 'label' => 'Revenue'],
                    ];
                @endphp

                @foreach ($options as $option)
                    <button @click="selected = '{{ $option['value'] }}'"
                        :class="selected === '{{ $option['value'] }}' ?
                            'shadow-theme-xs text-gray-900 dark:text-white bg-white dark:bg-gray-800' :
                            'text-gray-500 dark:text-gray-400'"
                        class="px-3 py-2 font-medium rounded-md text-theme-sm hover:text-gray-900 dark:hover:text-white">
                        {{ $option['label'] }}
                    </button>
                @endforeach
            </div>

            <div x-data="{
                init() {
                    flatpickr(this.$refs.datepicker, {
                        mode: 'range',
                        static: true,
                        monthSelectorType: 'static',
                        dateFormat: 'M j',
                        defaultDate: [new Date(Date.now() - 6 * 24 * 60 * 60 * 1000), new Date()],
                        prevArrow: '<svg class=\'stroke-current\' width=\'24\' height=\'24\' viewBox=\'0 0 24 24\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M15.25 6L9 12.25L15.25 18.5\' stroke=\'\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'/></svg>',
                        nextArrow: '<svg class=\'stroke-current\' width=\'24\' height=\'24\' viewBox=\'0 0 24 24\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M8.75 19L15 12.75L8.75 6.5\' stroke=\'\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'/></svg>',
                        onReady: (selectedDates, dateStr, instance) => {
                            instance.element.value = dateStr.replace('to', '-');
                            const customClass = instance.element.getAttribute('data-class');
                            if (instance.calendarContainer) {
                                instance.calendarContainer.classList.add(customClass);
                            }
                        },
                        onChange: (selectedDates, dateStr, instance) => {
                            instance.element.value = dateStr.replace('to', '-');
                        },
                    })
                }
            }" class="relative max-w-40">
                <input x-ref="datepicker" class="h-10 w-full max-w-11 rounded-lg border border-gray-200 bg-white py-2.5 pl-[34px] pr-4 text-theme-sm font-medium text-gray-700 shadow-theme-xs focus:outline-hidden focus:ring-0 focus-visible:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 xl:max-w-fit xl:pl-11" placeholder="Select dates" data-class="flatpickr-right" readonly="readonly" />
                <div class="absolute inset-0 right-auto flex items-center pointer-events-none left-4">
                    <svg class="fill-gray-700 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.66683 1.54199C7.08104 1.54199 7.41683 1.87778 7.41683 2.29199V3.00033H12.5835V2.29199C12.5835 1.87778 12.9193 1.54199 13.3335 1.54199C13.7477 1.54199 14.0835 1.87778 14.0835 2.29199V3.00033L15.4168 3.00033C16.5214 3.00033 17.4168 3.89576 17.4168 5.00033V7.50033V15.8337C17.4168 16.9382 16.5214 17.8337 15.4168 17.8337H4.5835C3.47893 17.8337 2.5835 16.9382 2.5835 15.8337V7.50033V5.00033C2.5835 3.89576 3.47893 3.00033 4.5835 3.00033L5.91683 3.00033V2.29199C5.91683 1.87778 6.25262 1.54199 6.66683 1.54199ZM6.66683 4.50033H4.5835C4.30735 4.50033 4.0835 4.72418 4.0835 5.00033V6.75033H15.9168V5.00033C15.9168 4.72418 15.693 4.50033 15.4168 4.50033H13.3335H6.66683ZM15.9168 8.25033H4.0835V15.8337C4.0835 16.1098 4.30735 16.3337 4.5835 16.3337H15.4168C15.693 16.3337 15.9168 16.1098 15.9168 15.8337V8.25033Z" fill="" />
                    </svg>
                </div>
            </div>

        </div>
    </div>
    <div class="max-w-full overflow-x-auto custom-scrollbar">
        <div id="chartThree" class="-ml-4 min-w-[700px] pl-2 xl:min-w-full"></div>
    </div>
</div>
```

## File: `resources/views/components/form/date-picker.blade.php`

```blade
@props([
    'id' => 'datepicker-' . uniqid(),
    'mode' => 'single', // 'single', 'multiple', 'range', 'time'
    'defaultDate' => null,
    'label' => null,
    'placeholder' => 'Select date',
    'name' => null,
    'dateFormat' => 'Y-m-d',
])

<div x-data="{
    flatpickrInstance: null,
    init() {
        this.$nextTick(() => {
            this.flatpickrInstance = flatpickr(this.$refs.dateInput, {
                mode: '{{ $mode }}',
                static: true,
                monthSelectorType: 'static',
                dateFormat: '{{ $dateFormat }}',
                defaultDate: {{ $defaultDate ? (is_array($defaultDate) ? json_encode($defaultDate) : "'" . $defaultDate . "'") : 'null' }},
                onChange: (selectedDates, dateStr, instance) => {
                    this.$dispatch('date-change', {
                        selectedDates,
                        dateStr,
                        instance
                    });
                }
            });
        });
    },
    destroy() {
        if (this.flatpickrInstance) {
            this.flatpickrInstance.destroy();
            this.flatpickrInstance = null;
        }
    }
}" x-init="init()" x-destroy="destroy()">
    @if($label)
        <label for="{{ $id }}" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            {{ $label }}
        </label>
    @endif

    <div class="relative custom-datepicker">
        <input
            x-ref="dateInput"
            type="text"
            id="{{ $id }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            class="h-11 w-full rounded-lg border appearance-none ltr:pl-4 ltr:pr-11 rtl:pr-4 rtl:pl-11 py-2.5 text-sm shadow-theme-xs placeholder:text-gray-400 focus:outline-hidden focus:ring-3 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 bg-transparent text-gray-800 border-gray-300 focus:border-brand-300 focus:ring-brand-500/20 dark:border-gray-700 dark:focus:border-brand-800"
            autocomplete="off"
        />
        <span class="absolute text-gray-500 -translate-y-1/2 pointer-events-none ltr:right-3.5 rtl:left-3.5 top-1/2 dark:text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" class="size-6">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C8.41421 2 8.75 2.33579 8.75 2.75V3.75H15.25V2.75C15.25 2.33579 15.5858 2 16 2C16.4142 2 16.75 2.33579 16.75 2.75V3.75H18.5C19.7426 3.75 20.75 4.75736 20.75 6V9V19C20.75 20.2426 19.7426 21.25 18.5 21.25H5.5C4.25736 21.25 3.25 20.2426 3.25 19V9V6C3.25 4.75736 4.25736 3.75 5.5 3.75H7.25V2.75C7.25 2.33579 7.58579 2 8 2ZM8 5.25H5.5C5.08579 5.25 4.75 5.58579 4.75 6V8.25H19.25V6C19.25 5.58579 18.9142 5.25 18.5 5.25H16H8ZM19.25 9.75H4.75V19C4.75 19.4142 5.08579 19.75 5.5 19.75H18.5C18.9142 19.75 19.25 19.4142 19.25 19V9.75Z" fill="currentColor"></path>
            </svg>
        </span>
    </div>
</div>
```

## File: `resources/views/components/form/form-elements/checkbox-component.blade.php`

```blade
<x-common.component-card title="Checkboxes">
    <div class="flex flex-wrap items-center gap-8">
        <div x-data="{ checkboxToggle: false }">
            <label for="checkboxLabelOne"
                class="flex cursor-pointer items-center text-sm font-medium text-gray-700 select-none dark:text-gray-400">
                <div class="relative">
                    <input type="checkbox" id="checkboxLabelOne" class="sr-only"
                        @change="checkboxToggle = !checkboxToggle" />
                    <div :class="checkboxToggle ? 'border-brand-500 bg-brand-500' :
                        'bg-transparent border-gray-300 dark:border-gray-700'"
                        class="hover:border-brand-500 dark:hover:border-brand-500 ltr:mr-3 rtl:ml-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px]">
                        <span :class="checkboxToggle ? '' : 'opacity-0'">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="white" stroke-width="1.94437"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                </div>
                Default
            </label>
        </div>

        <div x-data="{ checkboxToggle: true }">
            <label for="checkboxLabelTwo"
                class="flex cursor-pointer items-center text-sm font-medium text-gray-700 select-none dark:text-gray-400">
                <div class="relative">
                    <input type="checkbox" id="checkboxLabelTwo" class="sr-only"
                        @change="checkboxToggle = !checkboxToggle" />
                    <div :class="checkboxToggle ? 'border-brand-500 bg-brand-500' :
                        'bg-transparent border-gray-300 dark:border-gray-700'"
                        class="hover:border-brand-500 dark:hover:border-brand-500 ltr:mr-3 rtl:ml-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px]">
                        <span :class="checkboxToggle ? '' : 'opacity-0'">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="white" stroke-width="1.94437"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                </div>
                Checked
            </label>
        </div>

        <div x-data="{ checkboxToggle: true }">
            <label for="checkboxLabelThree"
                class="flex cursor-pointer items-center text-sm font-medium text-gray-300 select-none dark:text-gray-700">
                <div class="relative">
                    <input type="checkbox" id="checkboxLabelThree" class="peer sr-only"
                        @change="checkboxToggle = !checkboxToggle" disabled />
                    <div :class="checkboxToggle ? 'bg-transparent border-gray-200 dark:border-gray-800' :
                        'border-brand-500 bg-brand-500'"
                        class="ltr:mr-3 rtl:ml-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px]">
                        <span :class="checkboxToggle ? '' : 'opacity-0'">
                            <svg class="stroke-gray-200 dark:stroke-gray-800" width="14" height="14"
                                viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="" stroke-width="2.33333"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                </div>
                Disabled
            </label>
        </div>
    </div>
</x-common.component-card>
```

## File: `resources/views/components/form/form-elements/default-inputs.blade.php`

```blade
<x-common.component-card title="Default Inputs">
    <!-- Elements -->
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Input
        </label>
        <input type="text"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
    </div>

    <!-- Elements -->
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Input with Placeholder
        </label>
        <input type="text" placeholder="info@gmail.com"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
    </div>

    <!-- Elements -->
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Select Input
        </label>
        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
            <select
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none ltr:pl-4 ltr:pr-11 rtl:pr-4 rtl:pl-11 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                :class="isOptionSelected && 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    Select Option
                </option>
                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    Marketing
                </option>
                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    Template
                </option>
                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    Development
                </option>
            </select>
            <span
                class="pointer-events-none absolute top-1/2 ltr:right-4 rtl:left-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
        </div>
    </div>

    <!-- Elements -->
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Password Input
        </label>
        <div x-data="{ showPassword: false }" class="relative">
            <input :type="showPassword ? 'text' : 'password'" placeholder="Enter your password"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 ltr:pr-11 ltr:pl-4 rtl:pl-11 rtl:pr-4 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
            <span @click="showPassword = !showPassword"
                class="absolute top-1/2 ltr:right-4 rtl:left-4 z-30 -translate-y-1/2 cursor-pointer">
                <svg x-show="!showPassword" class="fill-gray-500 dark:fill-gray-400" width="20" height="20"
                    viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M10.0002 13.8619C7.23361 13.8619 4.86803 12.1372 3.92328 9.70241C4.86804 7.26761 7.23361 5.54297 10.0002 5.54297C12.7667 5.54297 15.1323 7.26762 16.0771 9.70243C15.1323 12.1372 12.7667 13.8619 10.0002 13.8619ZM10.0002 4.04297C6.48191 4.04297 3.49489 6.30917 2.4155 9.4593C2.3615 9.61687 2.3615 9.78794 2.41549 9.94552C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C13.5184 15.3619 16.5055 13.0957 17.5849 9.94555C17.6389 9.78797 17.6389 9.6169 17.5849 9.45932C16.5055 6.30919 13.5184 4.04297 10.0002 4.04297ZM9.99151 7.84413C8.96527 7.84413 8.13333 8.67606 8.13333 9.70231C8.13333 10.7286 8.96527 11.5605 9.99151 11.5605H10.0064C11.0326 11.5605 11.8646 10.7286 11.8646 9.70231C11.8646 8.67606 11.0326 7.84413 10.0064 7.84413H9.99151Z" />
                </svg>

                <svg x-show="showPassword" class="fill-gray-500 dark:fill-gray-400" width="20" height="20"
                    viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M4.63803 3.57709C4.34513 3.2842 3.87026 3.2842 3.57737 3.57709C3.28447 3.86999 3.28447 4.34486 3.57737 4.63775L4.85323 5.91362C3.74609 6.84199 2.89363 8.06395 2.4155 9.45936C2.3615 9.61694 2.3615 9.78801 2.41549 9.94558C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C11.255 15.3619 12.4422 15.0737 13.4994 14.5598L15.3625 16.4229C15.6554 16.7158 16.1302 16.7158 16.4231 16.4229C16.716 16.13 16.716 15.6551 16.4231 15.3622L4.63803 3.57709ZM12.3608 13.4212L10.4475 11.5079C10.3061 11.5423 10.1584 11.5606 10.0064 11.5606H9.99151C8.96527 11.5606 8.13333 10.7286 8.13333 9.70237C8.13333 9.5461 8.15262 9.39434 8.18895 9.24933L5.91885 6.97923C5.03505 7.69015 4.34057 8.62704 3.92328 9.70247C4.86803 12.1373 7.23361 13.8619 10.0002 13.8619C10.8326 13.8619 11.6287 13.7058 12.3608 13.4212ZM16.0771 9.70249C15.7843 10.4569 15.3552 11.1432 14.8199 11.7311L15.8813 12.7925C16.6329 11.9813 17.2187 11.0143 17.5849 9.94561C17.6389 9.78803 17.6389 9.61696 17.5849 9.45938C16.5055 6.30925 13.5184 4.04303 10.0002 4.04303C9.13525 4.04303 8.30244 4.17999 7.52218 4.43338L8.75139 5.66259C9.1556 5.58413 9.57311 5.54303 10.0002 5.54303C12.7667 5.54303 15.1323 7.26768 16.0771 9.70249Z" />
                </svg>
            </span>
        </div>
    </div>

    <!-- Elements -->
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Date Picker Input
        </label>

        <x-form.date-picker 
            id="date_pick" 
            name="date_pick"
            placeholder="Date Picker" 
            defaultDate="{{ now()->format('Y-m-d') }}" 
        />
    </div>

    <!-- Elements -->
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Time Select Input
        </label>
        <div class="relative">
            <input type="time" placeholder="12:00 AM" onclick="this.showPicker()"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 ltr:pr-11 ltr:pl-4 rtl:pl-11 rtl:pr-4 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
            <span class="absolute top-1/2 ltr:right-3 rtl:left-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3.04175 9.99984C3.04175 6.15686 6.1571 3.0415 10.0001 3.0415C13.8431 3.0415 16.9584 6.15686 16.9584 9.99984C16.9584 13.8428 13.8431 16.9582 10.0001 16.9582C6.1571 16.9582 3.04175 13.8428 3.04175 9.99984ZM10.0001 1.5415C5.32867 1.5415 1.54175 5.32843 1.54175 9.99984C1.54175 14.6712 5.32867 18.4582 10.0001 18.4582C14.6715 18.4582 18.4584 14.6712 18.4584 9.99984C18.4584 5.32843 14.6715 1.5415 10.0001 1.5415ZM9.99998 10.7498C9.58577 10.7498 9.24998 10.4141 9.24998 9.99984V5.4165C9.24998 5.00229 9.58577 4.6665 9.99998 4.6665C10.4142 4.6665 10.75 5.00229 10.75 5.4165V9.24984H13.3334C13.7476 9.24984 14.0834 9.58562 14.0834 9.99984C14.0834 10.4141 13.7476 10.7498 13.3334 10.7498H10.0001H9.99998Z"
                        fill="" />
                </svg>
            </span>
        </div>
    </div>

    <!-- Elements -->
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Input with Payment
        </label>

        <div class="relative">
            <input type="text" placeholder="Card number"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 ltr:pl-[62px] rtl:pr-[62px] text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
            <span
                class="absolute top-1/2 ltr:left-0 rtl:right-0 flex h-11 w-[46px] -translate-y-1/2 items-center justify-center ltr:border-r rtl:border-l border-gray-200 dark:border-gray-800">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="6.25" cy="10" r="5.625" fill="#E80B26" />
                    <circle cx="13.75" cy="10" r="5.625" fill="#F59D31" />
                    <path
                        d="M10 14.1924C11.1508 13.1625 11.875 11.6657 11.875 9.99979C11.875 8.33383 11.1508 6.8371 10 5.80713C8.84918 6.8371 8.125 8.33383 8.125 9.99979C8.125 11.6657 8.84918 13.1625 10 14.1924Z"
                        fill="#FC6020" />
                </svg>
            </span>
        </div>
    </div>
</x-common.component-card>
```

## File: `resources/views/components/form/form-elements/dropzone.blade.php`

```blade
<x-common.component-card title="Dropzone">
    <!-- Dropzone -->
    <div 
        x-data="{
            isDragging: false,
            files: [],
            handleDrop(e) {
                this.isDragging = false;
                const droppedFiles = Array.from(e.dataTransfer.files);
                this.handleFiles(droppedFiles);
            },
            handleFiles(selectedFiles) {
                const validTypes = ['image/png', 'image/jpeg', 'image/webp', 'image/svg+xml'];
                const validFiles = selectedFiles.filter(file => validTypes.includes(file.type));
                
                if (validFiles.length > 0) {
                    this.files = [...this.files, ...validFiles];
                    console.log('Files uploaded:', validFiles);
                    
                    // Here you can add logic to upload files to server
                    this.uploadFiles(validFiles);
                }
            },
            uploadFiles(files) {
                // Implement your file upload logic here
                // Example: Use FormData and fetch/axios to upload
                console.log('Uploading files:', files);
            },
            removeFile(index) {
                this.files.splice(index, 1);
            }
        }"
        class="transition border border-gray-300 border-dashed cursor-pointer dark:hover:border-brand-500 dark:border-gray-700 rounded-xl hover:border-brand-500"
    >
        <div 
            @drop.prevent="handleDrop($event)"
            @dragover.prevent="isDragging = true"
            @dragleave.prevent="isDragging = false"
            @click="$refs.fileInput.click()"
            :class="isDragging 
                ? 'border-brand-500 bg-gray-100 dark:bg-gray-800' 
                : 'border-gray-300 bg-gray-50 dark:border-gray-700 dark:bg-gray-900'"
            class="dropzone rounded-xl border-dashed border-gray-300 p-7 lg:p-10 transition-colors cursor-pointer"
            id="demo-upload"
        >
            <!-- Hidden File Input -->
            <input 
                x-ref="fileInput"
                type="file" 
                @change="handleFiles(Array.from($event.target.files)); $event.target.value = ''"
                accept="image/png,image/jpeg,image/webp,image/svg+xml"
                multiple
                class="hidden"
                @click.stop
            />

            <div class="flex flex-col items-center m-0">
                <!-- Icon Container -->
                <div class="mb-[22px] flex justify-center">
                    <div class="flex h-[68px] w-[68px] items-center justify-center rounded-full bg-gray-200 text-gray-700 dark:bg-gray-800 dark:text-gray-400">
                        <svg
                            class="fill-current"
                            width="29"
                            height="28"
                            viewBox="0 0 29 28"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M14.5019 3.91699C14.2852 3.91699 14.0899 4.00891 13.953 4.15589L8.57363 9.53186C8.28065 9.82466 8.2805 10.2995 8.5733 10.5925C8.8661 10.8855 9.34097 10.8857 9.63396 10.5929L13.7519 6.47752V18.667C13.7519 19.0812 14.0877 19.417 14.5019 19.417C14.9161 19.417 15.2519 19.0812 15.2519 18.667V6.48234L19.3653 10.5929C19.6583 10.8857 20.1332 10.8855 20.426 10.5925C20.7188 10.2995 20.7186 9.82463 20.4256 9.53184L15.0838 4.19378C14.9463 4.02488 14.7367 3.91699 14.5019 3.91699ZM5.91626 18.667C5.91626 18.2528 5.58047 17.917 5.16626 17.917C4.75205 17.917 4.41626 18.2528 4.41626 18.667V21.8337C4.41626 23.0763 5.42362 24.0837 6.66626 24.0837H22.3339C23.5766 24.0837 24.5839 23.0763 24.5839 21.8337V18.667C24.5839 18.2528 24.2482 17.917 23.8339 17.917C23.4197 17.917 23.0839 18.2528 23.0839 18.667V21.8337C23.0839 22.2479 22.7482 22.5837 22.3339 22.5837H6.66626C6.25205 22.5837 5.91626 22.2479 5.91626 21.8337V18.667Z"
                            />
                        </svg>
                    </div>
                </div>

                <!-- Text Content -->
                <h4 class="mb-3 font-semibold text-gray-800 text-theme-xl dark:text-white/90">
                    <span x-show="!isDragging">Drag & Drop Files Here</span>
                    <span x-show="isDragging" x-cloak>Drop Files Here</span>
                </h4>

                <span class="text-center mb-5 block w-full max-w-[290px] text-sm text-gray-700 dark:text-gray-400">
                    Drag and drop your PNG, JPG, WebP, SVG images here or browse
                </span>

                <span class="font-medium underline text-theme-sm text-brand-500">
                    Browse File
                </span>
            </div>
        </div>

        <!-- File Preview List (Optional) -->
        <div x-show="files.length > 0" class="mt-4 p-4 border-t border-gray-200 dark:border-gray-700" x-cloak>
            <h5 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Uploaded Files:</h5>
            <ul class="space-y-2">
                <template x-for="(file, index) in files" :key="index">
                    <li class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span class="text-sm text-gray-700 dark:text-gray-300" x-text="file.name"></span>
                        </div>
                        <button 
                            @click.stop="removeFile(index)"
                            type="button"
                            class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </li>
                </template>
            </ul>
        </div>
    </div>
</x-common.component-card>
```

## File: `resources/views/components/form/form-elements/file-input-example.blade.php`

```blade
<x-common.component-card title="File Input">
    <!-- Elements -->
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Upload file
        </label>
        <input type="file"
            class="focus:border-ring-brand-300 shadow-theme-xs focus:file:ring-brand-300 h-11 w-full overflow-hidden rounded-lg border border-gray-300 bg-transparent text-sm text-gray-500 transition-colors ltr:file:mr-5 rtl:file:ml-5 rtl:file:mr-0 file:border-collapse file:cursor-pointer ltr:file:rounded-l-lg rtl:file:rounded-r-lg rtl:file:rounded-l-none file:border-0 ltr:file:border-r rtl:file:border-l rtl:file:border-r-0 file:border-solid file:border-gray-200 file:bg-gray-50 file:py-3 ltr:file:pr-3 ltr:file:pl-3.5 rtl:file:pl-3 rtl:file:pr-3.5 file:text-sm file:text-gray-700 placeholder:text-gray-400 hover:file:bg-gray-100 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400 dark:text-white/90 dark:file:border-gray-800 dark:file:bg-white/[0.03] dark:file:text-gray-400 dark:placeholder:text-gray-400" />
    </div>
</x-common.component-card>
```

## File: `resources/views/components/form/form-elements/input-group.blade.php`

```blade
<x-common.component-card title="Input Group">
    <!-- Elements -->
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Email
        </label>
        <div class="relative">
            <span class="absolute top-1/2 ltr:left-0 rtl:right-0 -translate-y-1/2 ltr:border-r rtl:border-l border-gray-200 px-3.5 py-3 text-gray-500 dark:border-gray-800 dark:text-gray-400">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3.04175 7.06206V14.375C3.04175 14.6511 3.26561 14.875 3.54175 14.875H16.4584C16.7346 14.875 16.9584 14.6511 16.9584 14.375V7.06245L11.1443 11.1168C10.457 11.5961 9.54373 11.5961 8.85638 11.1168L3.04175 7.06206ZM16.9584 5.19262C16.9584 5.19341 16.9584 5.1942 16.9584 5.19498V5.20026C16.9572 5.22216 16.946 5.24239 16.9279 5.25501L10.2864 9.88638C10.1145 10.0062 9.8862 10.0062 9.71437 9.88638L3.07255 5.25485C3.05342 5.24151 3.04202 5.21967 3.04202 5.19636C3.042 5.15695 3.07394 5.125 3.11335 5.125H16.8871C16.9253 5.125 16.9564 5.15494 16.9584 5.19262ZM18.4584 5.21428V14.375C18.4584 15.4796 17.563 16.375 16.4584 16.375H3.54175C2.43718 16.375 1.54175 15.4796 1.54175 14.375V5.19498C1.54175 5.1852 1.54194 5.17546 1.54231 5.16577C1.55858 4.31209 2.25571 3.625 3.11335 3.625H16.8871C17.7549 3.625 18.4584 4.32843 18.4585 5.19622C18.4585 5.20225 18.4585 5.20826 18.4584 5.21428Z"
                        fill="#667085" />
                </svg>
            </span>
            <input type="text" placeholder="info@gmail.com" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 ltr:pl-[62px] rtl:pr-[62px] text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
        </div>
    </div>

    <!-- Elements -->
    <div x-data="{
        selectedCountry: 'US',
        countryCodes: {
            'US': '+1',
            'GB': '+44',
            'CA': '+1',
            'AU': '+61'
        },
        phoneNumber: ''
    }">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Phone
        </label>
        <div class="relative">
            <div class="absolute ltr:left-0 rtl:right-0">
                <select x-model="selectedCountry" @change="phoneNumber = countryCodes[selectedCountry]"
                    class="focus:border-brand-300 focus:ring-brand-500/10 appearance-none ltr:rounded-l-lg rtl:rounded-r-lg rtl:rounded-l-none border-0 ltr:border-r rtl:border-l border-gray-200 bg-transparent bg-none py-3 ltr:pr-8 ltr:pl-3.5 rtl:pl-8 rtl:pr-3.5 leading-tight text-gray-700 focus:ring-3 focus:outline-hidden dark:border-gray-800 dark:text-gray-400">
                    <option value="US" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        US
                    </option>
                    <option value="GB" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        GB
                    </option>
                    <option value="CA" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        CA
                    </option>
                    <option value="AU" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        AU
                    </option>
                    <!-- Add more country codes as needed -->
                </select>
                <div
                    class="pointer-events-none absolute inset-y-0 ltr:right-3 rtl:left-3 flex items-center text-gray-700 dark:text-gray-400">
                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
            <input placeholder="+1 (555) 000-0000" x-model="phoneNumber" type="tel"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-3 ltr:pr-4 ltr:pl-[84px] rtl:pl-4 rtl:pr-[84px] text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
        </div>
    </div>

    <!-- Elements -->
    <div x-data="{
        selectedCountry: 'US',
        countryCodes: {
            'US': '+1',
            'GB': '+44',
            'CA': '+1',
            'AU': '+61'
        },
        phoneNumber: ''
    }">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Phone
        </label>
        <div class="relative">
            <div class="absolute ltr:right-0 rtl:left-0">
                <select x-model="selectedCountry" @change="phoneNumber = countryCodes[selectedCountry]"
                    class="focus:border-brand-300 focus:ring-brand-500/10 appearance-none ltr:rounded-r-lg rtl:rounded-l-lg rtl:rounded-r-none border-0 ltr:border-l rtl:border-r border-gray-200 bg-transparent bg-none py-3 ltr:pr-8 ltr:pl-3.5 rtl:pl-8 rtl:pr-3.5 leading-tight text-gray-700 focus:ring-3 focus:outline-hidden dark:border-gray-800 dark:text-gray-400">
                    <option value="US" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        US
                    </option>
                    <option value="GB" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        GB
                    </option>
                    <option value="CA" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        CA
                    </option>
                    <option value="AU" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        AU
                    </option>
                    <!-- Add more country codes as needed -->
                </select>
                <div
                    class="pointer-events-none absolute inset-y-0 ltr:right-3 rtl:left-3 flex items-center text-gray-700 dark:text-gray-400">
                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
            <input placeholder="+1 (555) 000-0000" x-model="phoneNumber" type="tel"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-3 ltr:pl-4 ltr:pr-[84px] rtl:pr-4 rtl:pl-[84px] text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
        </div>
    </div>

    <!-- Elements -->
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            URL
        </label>
        <div class="relative">
            <span
                class="absolute top-1/2 ltr:left-0 rtl:right-0 inline-flex h-11 -translate-y-1/2 items-center justify-center ltr:border-r rtl:border-l border-gray-200 py-3 ltr:pr-3 ltr:pl-3.5 rtl:pl-3 rtl:pr-3.5 text-gray-500 dark:border-gray-800 dark:text-gray-400">
                http://
            </span>
            <input type="url" placeholder="www.tailadmin.com"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 ltr:pl-[90px] rtl:pr-[90px] text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
        </div>
    </div>

    <!-- Elements -->
    <div id="copy-input">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Website
        </label>
        <div class="relative">
            <button id="copy-button"
                class="absolute top-1/2 ltr:right-0 rtl:left-0 inline-flex -translate-y-1/2 cursor-pointer items-center gap-1 ltr:border-l rtl:border-r border-gray-200 py-3 ltr:pr-3 ltr:pl-3.5 rtl:pl-3 rtl:pr-3.5 text-sm font-medium text-gray-700 dark:border-gray-800 dark:text-gray-400">
                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.58822 4.58398C6.58822 4.30784 6.81207 4.08398 7.08822 4.08398H15.4154C15.6915 4.08398 15.9154 4.30784 15.9154 4.58398L15.9154 12.9128C15.9154 13.189 15.6916 13.4128 15.4154 13.4128H7.08821C6.81207 13.4128 6.58822 13.189 6.58822 12.9128V4.58398ZM7.08822 2.58398C5.98365 2.58398 5.08822 3.47942 5.08822 4.58398V5.09416H4.58496C3.48039 5.09416 2.58496 5.98959 2.58496 7.09416V15.4161C2.58496 16.5207 3.48039 17.4161 4.58496 17.4161H12.9069C14.0115 17.4161 14.9069 16.5207 14.9069 15.4161L14.9069 14.9128H15.4154C16.52 14.9128 17.4154 14.0174 17.4154 12.9128L17.4154 4.58398C17.4154 3.47941 16.52 2.58398 15.4154 2.58398H7.08822ZM13.4069 14.9128H7.08821C5.98364 14.9128 5.08822 14.0174 5.08822 12.9128V6.59416H4.58496C4.30882 6.59416 4.08496 6.81801 4.08496 7.09416V15.4161C4.08496 15.6922 4.30882 15.9161 4.58496 15.9161H12.9069C13.183 15.9161 13.4069 15.6922 13.4069 15.4161L13.4069 14.9128Z"
                        fill="" />
                </svg>
                <div id="copy-text">Copy</div>
            </button>
            <input value="www.tailadmin.com" type="url" id="website-input"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-3 ltr:pr-[90px] ltr:pl-4 rtl:pl-[90px] rtl:pr-4 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
        </div>
    </div>
</x-common.component-card>
```

## File: `resources/views/components/form/form-elements/input-states.blade.php`

```blade
<x-common.component-card 
  title="Input States"
  desc="Validation styles for error, success and disabled states on form controls."
>
    <div class="space-y-5 sm:space-y-6">
        <!-- Elements -->
        <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Email
            </label>
            <div class="relative">
                <input type="text" value="demoemail"
                    class="dark:bg-dark-900 border-error-300 shadow-theme-xs focus:border-error-300 focus:ring-error-500/10 dark:border-error-700 dark:focus:border-error-800 w-full rounded-lg border bg-transparent px-4 py-2.5 pr-10 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                <span class="absolute top-1/2 right-3.5 -translate-y-1/2">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2.58325 7.99967C2.58325 5.00813 5.00838 2.58301 7.99992 2.58301C10.9915 2.58301 13.4166 5.00813 13.4166 7.99967C13.4166 10.9912 10.9915 13.4163 7.99992 13.4163C5.00838 13.4163 2.58325 10.9912 2.58325 7.99967ZM7.99992 1.08301C4.17995 1.08301 1.08325 4.17971 1.08325 7.99967C1.08325 11.8196 4.17995 14.9163 7.99992 14.9163C11.8199 14.9163 14.9166 11.8196 14.9166 7.99967C14.9166 4.17971 11.8199 1.08301 7.99992 1.08301ZM7.09932 5.01639C7.09932 5.51345 7.50227 5.91639 7.99932 5.91639H7.99999C8.49705 5.91639 8.89999 5.51345 8.89999 5.01639C8.89999 4.51933 8.49705 4.11639 7.99999 4.11639H7.99932C7.50227 4.11639 7.09932 4.51933 7.09932 5.01639ZM7.99998 11.8306C7.58576 11.8306 7.24998 11.4948 7.24998 11.0806V7.29627C7.24998 6.88206 7.58576 6.54627 7.99998 6.54627C8.41419 6.54627 8.74998 6.88206 8.74998 7.29627V11.0806C8.74998 11.4948 8.41419 11.8306 7.99998 11.8306Z"
                            fill="#F04438" />
                    </svg>
                </span>
            </div>

            <p class="text-theme-xs text-error-500 mt-1.5">
                This is an error message.
            </p>
        </div>

        <!-- Elements -->
        <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Email
            </label>
            <div class="relative">
                <input type="text" value="demoemail@gmail.com"
                    class="dark:bg-dark-900 border-success-300 shadow-theme-xs focus:border-success-300 focus:ring-success-500/10 dark:border-success-700 dark:focus:border-success-800 w-full rounded-lg border bg-transparent px-4 py-2.5 pr-10 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                <span class="absolute top-1/2 right-3.5 -translate-y-1/2">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2.61792 8.00034C2.61792 5.02784 5.0276 2.61816 8.00009 2.61816C10.9726 2.61816 13.3823 5.02784 13.3823 8.00034C13.3823 10.9728 10.9726 13.3825 8.00009 13.3825C5.0276 13.3825 2.61792 10.9728 2.61792 8.00034ZM8.00009 1.11816C4.19917 1.11816 1.11792 4.19942 1.11792 8.00034C1.11792 11.8013 4.19917 14.8825 8.00009 14.8825C11.801 14.8825 14.8823 11.8013 14.8823 8.00034C14.8823 4.19942 11.801 1.11816 8.00009 1.11816ZM10.5192 7.266C10.8121 6.97311 10.8121 6.49823 10.5192 6.20534C10.2264 5.91245 9.75148 5.91245 9.45858 6.20534L7.45958 8.20434L6.54162 7.28638C6.24873 6.99349 5.77385 6.99349 5.48096 7.28638C5.18807 7.57927 5.18807 8.05415 5.48096 8.34704L6.92925 9.79533C7.0699 9.93599 7.26067 10.015 7.45958 10.015C7.6585 10.015 7.84926 9.93599 7.98991 9.79533L10.5192 7.266Z"
                            fill="#12B76A" />
                    </svg>
                </span>
            </div>

            <p class="text-theme-xs text-success-500 mt-1.5">
                This is an success message.
            </p>
        </div>

        <!-- Elements -->
        <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-300 dark:text-white/15">
                Email
            </label>
            <input type="text" placeholder="info@gmail.com" disabled
                class="shadow-theme-xs focus:border-brand-300 focus:shadow-focus-ring dark:focus:border-brand-300 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:outline-hidden disabled:border-gray-100 disabled:placeholder:text-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-gray-400 dark:disabled:border-gray-800 dark:disabled:placeholder:text-white/15" />
        </div>
    </div>
</x-common.component-card>
```

## File: `resources/views/components/form/form-elements/radio-buttons.blade.php`

```blade
<x-common.component-card title="Radio Buttons">
    <div class="flex flex-wrap items-center gap-8">
        <div x-data="{ checkboxToggle: false }">
            <label for="radioLabelOne"
                class="flex cursor-pointer items-center text-sm font-medium text-gray-700 select-none dark:text-gray-400">
                <div class="relative">
                    <input type="checkbox" id="radioLabelOne" class="sr-only" @change="checkboxToggle = !checkboxToggle" />
                    <div :class="checkboxToggle ? 'border-brand-500 bg-brand-500' :
                        'bg-transparent border-gray-300 dark:border-gray-700'"
                        class="hover:border-brand-500 dark:hover:border-brand-500 ltr:mr-3 rtl:ml-3 flex h-5 w-5 items-center justify-center rounded-full border-[1.25px]">
                        <span class="h-2 w-2 rounded-full"
                            :class="checkboxToggle ? 'bg-white' : 'bg-white dark:bg-[#171f2e]'"></span>
                    </div>
                </div>
                Default
            </label>
        </div>

        <div x-data="{ checkboxToggle: true }">
            <label for="radioLabelTwo"
                class="flex cursor-pointer items-center text-sm font-medium text-gray-700 select-none dark:text-gray-400">
                <div class="relative">
                    <input type="checkbox" id="radioLabelTwo" class="sr-only"
                        @change="checkboxToggle = !checkboxToggle" />
                    <div :class="checkboxToggle ? 'border-brand-500 bg-brand-500' :
                        'bg-transparent border-gray-300 dark:border-gray-700'"
                        class="hover:border-brand-500 dark:hover:border-brand-500 ltr:mr-3 rtl:ml-3 flex h-5 w-5 items-center justify-center rounded-full border-[1.25px]">
                        <span class="h-2 w-2 rounded-full"
                            :class="checkboxToggle ? 'bg-white' : 'bg-white dark:bg-[#171f2e]'"></span>
                    </div>
                </div>
                Secondary
            </label>
        </div>

        <div x-data="{ checkboxToggle: false }">
            <label for="radioLabelThree"
                class="flex cursor-pointer items-center text-sm font-medium text-gray-300 select-none dark:text-gray-700">
                <div class="relative">
                    <input type="checkbox" id="radioLabelThree" class="peer sr-only"
                        @change="checkboxToggle = !checkboxToggle" disabled />
                    <div :class="checkboxToggle ? 'bg-transparent border-gray-300 dark:border-gray-700' :
                        'border-brand-500 bg-brand-500'"
                        class="ltr:mr-3 rtl:ml-3 flex h-5 w-5 items-center justify-center rounded-full border-[1.25px]">
                        <span class="h-2 w-2 rounded-full"
                            :class="checkboxToggle ? 'bg-white' : 'bg-white dark:bg-[#171f2e]'"></span>
                    </div>
                </div>
                Disabled Secondary
            </label>
        </div>
    </div>
</x-common.component-card>
```

## File: `resources/views/components/form/form-elements/select-inputs.blade.php`

```blade
<x-common.component-card title="Select Inputs">
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Select Input
        </label>
        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
            <select
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none ltr:pl-4 ltr:pr-11 rtl:pr-4 rtl:pl-11 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                :class="isOptionSelected && 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    Select Option
                </option>
                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    Marketing
                </option>
                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    Template
                </option>
                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    Development
                </option>
            </select>
            <span
                class="pointer-events-none absolute top-1/2 ltr:right-4 rtl:left-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
        </div>
    </div>

    {{-- multiple select --}}
    <x-form.select.multiple-select/>
</x-common.component-card>
```

## File: `resources/views/components/form/form-elements/text-area-inputs.blade.php`

```blade
<x-common.component-card title="Textarea input fields">
    <!-- Elements -->
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Description
        </label>
        <textarea placeholder="Enter a description..." type="text" rows="6"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"></textarea>
    </div>

    <!-- Elements -->
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-300 dark:text-white/15">
            Description
        </label>
        <textarea placeholder="Enter a description..." type="text" rows="6" disabled
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:shadow-focus-ring dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-0 focus:outline-hidden disabled:border-gray-100 disabled:bg-gray-50 disabled:placeholder:text-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:disabled:border-gray-800 dark:disabled:bg-white/[0.03] dark:disabled:placeholder:text-white/15"></textarea>
    </div>

    <!-- Elements -->
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Description
        </label>
        <textarea placeholder="Enter a description..." type="text" rows="6"
            class="dark:bg-dark-900 border-error-300 shadow-theme-xs focus:border-error-300 focus:ring-error-500/10 dark:border-error-700 dark:focus:border-error-800 w-full rounded-lg border bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"></textarea>
        <p class="text-theme-xs text-error-500">
            Please enter a message in the textarea.
        </p>
    </div>
</x-common.component-card>
```

## File: `resources/views/components/form/form-elements/toggle-switch.blade.php`

```blade
<x-common.component-card title="Toggle switch input">
    <!-- Elements -->
    <div class="mb-6 flex flex-wrap items-center gap-6 sm:gap-8">
        <div x-data="{ switcherToggle: false }">
            <label for="toggle1"
                class="flex cursor-pointer items-center gap-3 text-sm font-medium text-gray-700 select-none dark:text-gray-400">
                <div class="relative">
                    <input type="checkbox" id="toggle1" class="sr-only" @change="switcherToggle = !switcherToggle" />
                    <div class="block h-6 w-11 rounded-full"
                        :class="switcherToggle ? 'bg-brand-500 dark:bg-brand-500' : 'bg-gray-200 dark:bg-white/10'">
                    </div>
                    <div :class="switcherToggle ? 'ltr:translate-x-full rtl:-translate-x-full' : 'translate-x-0'"
                        class="shadow-theme-sm absolute top-0.5 ltr:left-0.5 rtl:right-0.5 h-5 w-5 rounded-full bg-white duration-300 ease-linear">
                    </div>
                </div>

                Default
            </label>
        </div>

        <div x-data="{ switcherToggle: true }">
            <label for="toggle2"
                class="flex cursor-pointer items-center gap-3 text-sm font-medium text-gray-700 select-none dark:text-gray-400">
                <div class="relative">
                    <input type="checkbox" id="toggle2" class="sr-only" @change="switcherToggle = !switcherToggle" />
                    <div class="block h-6 w-11 rounded-full"
                        :class="switcherToggle ? 'bg-brand-500 dark:bg-brand-500' : 'bg-gray-200 dark:bg-white/10'">
                    </div>
                    <div :class="switcherToggle ? 'ltr:translate-x-full rtl:-translate-x-full' : 'translate-x-0'"
                        class="shadow-theme-sm absolute top-0.5 ltr:left-0.5 rtl:right-0.5 h-5 w-5 rounded-full bg-white duration-300 ease-linear">
                    </div>
                </div>

                Checked
            </label>
        </div>

        <div x-data="{ switcherToggle: false }">
            <label for="toggle3"
                class="flex cursor-pointer items-center gap-3 text-sm font-medium text-gray-400 select-none">
                <div class="relative">
                    <input type="checkbox" id="toggle3" class="sr-only" @change="switcherToggle = !switcherToggle"
                        disabled />
                    <div class="block h-6 w-11 rounded-full"
                        :class="switcherToggle ? 'bg-brand-500 dark:bg-brand-500' : 'bg-gray-100 dark:bg-gray-800'">
                    </div>
                    <div :class="switcherToggle ? 'ltr:translate-x-full rtl:-translate-x-full' : 'translate-x-0'"
                        class="shadow-theme-sm absolute top-0.5 ltr:left-0.5 rtl:right-0.5 h-5 w-5 rounded-full bg-gray-50 duration-300 ease-linear">
                    </div>
                </div>

                Disabled
            </label>
        </div>
    </div>

    <!-- Elements -->
    <div class="flex flex-wrap items-center gap-6 sm:gap-8">
        <div x-data="{ switcherToggle: false }">
            <label for="toggle11"
                class="flex cursor-pointer items-center gap-3 text-sm font-medium text-gray-700 select-none dark:text-gray-400">
                <div class="relative">
                    <input type="checkbox" id="toggle11" class="sr-only" @change="switcherToggle = !switcherToggle" />
                    <div class="block h-6 w-11 rounded-full"
                        :class="switcherToggle ? 'bg-gray-700 dark:bg-white/10' : 'bg-gray-200 dark:bg-gray-800'"></div>
                    <div :class="switcherToggle ? 'ltr:translate-x-full rtl:-translate-x-full' : 'translate-x-0'"
                        class="shadow-theme-sm absolute top-0.5 ltr:left-0.5 rtl:right-0.5 h-5 w-5 rounded-full bg-white duration-300 ease-linear">
                    </div>
                </div>

                Default
            </label>
        </div>

        <div x-data="{ switcherToggle: true }">
            <label for="toggle22"
                class="flex cursor-pointer items-center gap-3 text-sm font-medium text-gray-700 select-none dark:text-gray-400">
                <div class="relative">
                    <input type="checkbox" id="toggle22" class="sr-only" @change="switcherToggle = !switcherToggle" />

                    <div class="block h-6 w-11 rounded-full"
                        :class="switcherToggle ? 'bg-gray-700 dark:bg-white/10' : 'bg-gray-200 dark:bg-gray-800'"></div>
                    <div :class="switcherToggle ? 'ltr:translate-x-full rtl:-translate-x-full' : 'translate-x-0'"
                        class="shadow-theme-sm absolute top-0.5 ltr:left-0.5 rtl:right-0.5 h-5 w-5 rounded-full bg-white duration-300 ease-linear">
                    </div>
                </div>

                Checked
            </label>
        </div>

        <div x-data="{ switcherToggle: false }">
            <label for="toggle33"
                class="flex cursor-pointer items-center gap-3 text-sm font-medium text-gray-400 select-none">
                <div class="relative">
                    <input type="checkbox" id="toggle33" class="sr-only" @change="switcherToggle = !switcherToggle"
                        disabled />
                    <div class="block h-6 w-11 rounded-full"
                        :class="switcherToggle ? 'bg-gray-700 dark:bg-white/10' : 'bg-gray-100 dark:bg-gray-800'">
                    </div>
                    <div :class="switcherToggle ? 'ltr:translate-x-full rtl:-translate-x-full' : 'translate-x-0'"
                        class="shadow-theme-sm absolute top-0.5 ltr:left-0.5 rtl:right-0.5 h-5 w-5 rounded-full bg-gray-50 duration-300 ease-linear">
                    </div>
                </div>

                Disabled
            </label>
        </div>
    </div>
</x-common.component-card>
```

## File: `resources/views/components/form/input/radio.blade.php`

```blade
@props([
    'id',
    'name',
    'value',
    'checked' => false,
    'label',
    'disabled' => false,
])

<label for="{{ $id }}"
    @class([
        'relative flex cursor-pointer select-none items-center gap-3 text-sm font-medium',
        'text-gray-300 dark:text-gray-600 cursor-not-allowed' => $disabled,
        'text-gray-700 dark:text-gray-400' => !$disabled,
        $attributes->get('class'),
    ])>
    
    <input 
        id="{{ $id }}"
        name="{{ $name }}"
        type="radio"
        value="{{ $value }}"
        {{ $checked ? 'checked' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        class="sr-only"
        {{ $attributes->except(['class', 'label']) }}
    />
    
    <span @class([
        'flex h-5 w-5 items-center justify-center rounded-full border-[1.25px]',
        'border-brand-500 bg-brand-500' => $checked && !$disabled,
        'bg-transparent border-gray-300 dark:border-gray-700' => !$checked && !$disabled,
        'bg-gray-100 dark:bg-gray-700 border-gray-200 dark:border-gray-700' => $disabled,
    ])>
        <span @class([
            'h-2 w-2 rounded-full bg-white',
            'block' => $checked,
            'hidden' => !$checked,
        ])></span>
    </span>
    
    {{ $label }}
</label>
```

## File: `resources/views/components/form/select/multiple-select.blade.php`

```blade
<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
        Multiple Select Options
    </label>

    <div x-data="{
        open: false,
        selected: [1, 3],
        options: [
            { id: 1, name: 'Option 1' },
            { id: 2, name: 'Option 2' },
            { id: 3, name: 'Option 3' },
            { id: 4, name: 'Option 4' },
            { id: 5, name: 'Option 5' }
        ],
        toggleOption(id) {
            if (this.selected.includes(id)) {
                this.selected = this.selected.filter(i => i !== id);
            } else {
                this.selected.push(id);
            }
        },
        isSelected(id) {
            return this.selected.includes(id);
        }
    }" class="relative" @click.away="open = false">
        <!-- Hidden input for form submission -->
        <input type="hidden" name="selected_options" :value="selected.join(',')" />

        <!-- Select Input with Selected Tags -->
        <div @click="open = !open"
            class="shadow-theme-xs flex min-h-11 cursor-pointer gap-2 rounded-lg border border-gray-300 bg-white px-3 py-2 transition dark:border-gray-700 dark:bg-gray-900">
            <!-- Selected Items as Tags -->
            <div class="flex flex-1 flex-wrap items-center gap-2">
                <template x-for="id in selected" :key="id">
                    <div
                        class="group flex items-center justify-center rounded-full border-[0.7px] border-transparent bg-gray-100 py-1 pr-2 pl-2.5 text-sm text-gray-800 hover:border-gray-200 dark:bg-gray-800 dark:text-white/90 dark:hover:border-gray-800">
                        <span x-text="options.find(o => o.id === id).name"></span>
                        <button type="button" @click.stop="toggleOption(id)"
                            class="ml-1 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                            <svg class="fill-current" role="button" width="14" height="14" viewBox="0 0 14 14"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.40717 4.46881C3.11428 4.17591 3.11428 3.70104 3.40717 3.40815C3.70006 3.11525 4.17494 3.11525 4.46783 3.40815L6.99943 5.93975L9.53095 3.40822C9.82385 3.11533 10.2987 3.11533 10.5916 3.40822C10.8845 3.70112 10.8845 4.17599 10.5916 4.46888L8.06009 7.00041L10.5916 9.53193C10.8845 9.82482 10.8845 10.2997 10.5916 10.5926C10.2987 10.8855 9.82385 10.8855 9.53095 10.5926L6.99943 8.06107L4.46783 10.5927C4.17494 10.8856 3.70006 10.8856 3.40717 10.5927C3.11428 10.2998 3.11428 9.8249 3.40717 9.53201L5.93877 7.00041L3.40717 4.46881Z"
                                    fill="" />
                            </svg>
                        </button>
                    </div>
                </template>

                <!-- Show placeholder when nothing is selected -->
                <span x-show="selected.length === 0" class="text-sm text-gray-500 dark:text-gray-400">
                    Select options...
                </span>
            </div>

            <!-- Dropdown Arrow -->
            <div class="flex items-start pt-1.5">
                <svg class="h-5 w-5 shrink-0 text-gray-500 transition-transform dark:text-gray-400"
                    :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>

        <!-- Dropdown Options List -->
        <div x-show="open"
            class="absolute z-50 mt-1 w-full overflow-hidden rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900"
            style="max-height: 16rem">
            <div class="overflow-y-auto" style="max-height: 16rem">
                <template x-for="option in options" :key="option.id">
                    <div @click="toggleOption(option.id)"
                        class="cursor-pointer border-b border-gray-200 px-4 py-3 text-sm transition last:border-b-0 dark:border-gray-800">
                        <span class="text-gray-800 dark:text-white/90" x-text="option.name"></span>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>
```

## File: `resources/views/components/header/notification-dropdown.blade.php`

```blade
{{-- Notification Dropdown Component --}}
<div class="relative" x-data="{
    dropdownOpen: false,
    notifying: true,
    toggleDropdown() {
        this.dropdownOpen = !this.dropdownOpen;
        this.notifying = false;
    },
    closeDropdown() {
        this.dropdownOpen = false;
    },
    handleItemClick() {
        console.log('Notification item clicked');
        this.closeDropdown();
    },
    handleViewAllClick() {
        console.log('View All Notifications clicked');
        this.closeDropdown();
    }
}" @click.away="closeDropdown()">
    <!-- Notification Button -->
    <button
        class="relative flex items-center justify-center text-gray-500 transition-colors bg-white border border-gray-200 rounded-full hover:text-dark-900 h-11 w-11 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white"
        @click="toggleDropdown()"
        type="button"
    >
        <!-- Notification Badge -->
        <span
            x-show="notifying"
            class="absolute right-0 top-0.5 z-1 h-2 w-2 rounded-full bg-orange-400"
        >
            <span
                class="absolute inline-flex w-full h-full bg-orange-400 rounded-full opacity-75 -z-1 animate-ping"
            ></span>
        </span>

        <!-- Bell Icon -->
        <svg
            class="fill-current"
            width="20"
            height="20"
            viewBox="0 0 20 20"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M10.75 2.29248C10.75 1.87827 10.4143 1.54248 10 1.54248C9.58583 1.54248 9.25004 1.87827 9.25004 2.29248V2.83613C6.08266 3.20733 3.62504 5.9004 3.62504 9.16748V14.4591H3.33337C2.91916 14.4591 2.58337 14.7949 2.58337 15.2091C2.58337 15.6234 2.91916 15.9591 3.33337 15.9591H4.37504H15.625H16.6667C17.0809 15.9591 17.4167 15.6234 17.4167 15.2091C17.4167 14.7949 17.0809 14.4591 16.6667 14.4591H16.375V9.16748C16.375 5.9004 13.9174 3.20733 10.75 2.83613V2.29248ZM14.875 14.4591V9.16748C14.875 6.47509 12.6924 4.29248 10 4.29248C7.30765 4.29248 5.12504 6.47509 5.12504 9.16748V14.4591H14.875ZM8.00004 17.7085C8.00004 18.1228 8.33583 18.4585 8.75004 18.4585H11.25C11.6643 18.4585 12 18.1228 12 17.7085C12 17.2943 11.6643 16.9585 11.25 16.9585H8.75004C8.33583 16.9585 8.00004 17.2943 8.00004 17.7085Z"
                fill=""
            />
        </svg>
    </button>

    <!-- Dropdown Start -->
    <div
        x-show="dropdownOpen"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute -right-[240px] mt-[17px] flex h-[480px] w-[350px] flex-col rounded-2xl border border-gray-200 bg-white p-3 shadow-theme-lg dark:border-gray-800 dark:bg-gray-dark sm:w-[361px] lg:right-0"
        style="display: none;"
    >
        <!-- Dropdown Header -->
        <div class="flex items-center justify-between pb-3 mb-3 border-b border-gray-100 dark:border-gray-800">
            <h5 class="text-lg font-semibold text-gray-800 dark:text-white/90">Notification</h5>

            <button @click="closeDropdown()" class="text-gray-500 dark:text-gray-400" type="button">
                <svg
                    class="fill-current"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M6.21967 7.28131C5.92678 6.98841 5.92678 6.51354 6.21967 6.22065C6.51256 5.92775 6.98744 5.92775 7.28033 6.22065L11.999 10.9393L16.7176 6.22078C17.0105 5.92789 17.4854 5.92788 17.7782 6.22078C18.0711 6.51367 18.0711 6.98855 17.7782 7.28144L13.0597 12L17.7782 16.7186C18.0711 17.0115 18.0711 17.4863 17.7782 17.7792C17.4854 18.0721 17.0105 18.0721 16.7176 17.7792L11.999 13.0607L7.28033 17.7794C6.98744 18.0722 6.51256 18.0722 6.21967 17.7794C5.92678 17.4865 5.92678 17.0116 6.21967 16.7187L10.9384 12L6.21967 7.28131Z"
                        fill=""
                    />
                </svg>
            </button>
        </div>

        <!-- Notification List -->
        <ul class="flex flex-col h-auto overflow-y-auto custom-scrollbar">
            @php
                $notifications = [
                    [
                        'id' => 1,
                        'userName' => 'Terry Franci',
                        'userImage' => '/images/user/user-02.jpg',
                        'action' => 'requests permission to change',
                        'project' => 'Project - Nganter App',
                        'type' => 'Project',
                        'time' => '5 min ago',
                        'status' => 'online',
                    ],
                    [
                        'id' => 2,
                        'userName' => 'Alex Johnson',
                        'userImage' => '/images/user/user-03.jpg',
                        'action' => 'requests permission to change',
                        'project' => 'Project - Nganter App',
                        'type' => 'Project',
                        'time' => '10 min ago',
                        'status' => 'offline',
                    ],
                    [
                        'id' => 3,
                        'userName' => 'Sarah Williams',
                        'userImage' => '/images/user/user-04.jpg',
                        'action' => 'requests permission to change',
                        'project' => 'Project - Dashboard UI',
                        'type' => 'Project',
                        'time' => '15 min ago',
                        'status' => 'online',
                    ],
                    [
                        'id' => 4,
                        'userName' => 'Mike Brown',
                        'userImage' => '/images/user/user-05.jpg',
                        'action' => 'requests permission to change',
                        'project' => 'Project - E-commerce',
                        'type' => 'Project',
                        'time' => '20 min ago',
                        'status' => 'online',
                    ],
                    [
                        'id' => 5,
                        'userName' => 'Emma Davis',
                        'userImage' => '/images/user/user-06.jpg',
                        'action' => 'requests permission to change',
                        'project' => 'Project - Mobile App',
                        'type' => 'Project',
                        'time' => '25 min ago',
                        'status' => 'offline',
                    ],
                    [
                        'id' => 6,
                        'userName' => 'John Smith',
                        'userImage' => '/images/user/user-07.jpg',
                        'action' => 'requests permission to change',
                        'project' => 'Project - Landing Page',
                        'type' => 'Project',
                        'time' => '30 min ago',
                        'status' => 'online',
                    ],
                    [
                        'id' => 7,
                        'userName' => 'Lisa Anderson',
                        'userImage' => '/images/user/user-08.jpg',
                        'action' => 'requests permission to change',
                        'project' => 'Project - Blog System',
                        'type' => 'Project',
                        'time' => '35 min ago',
                        'status' => 'online',
                    ],
                    [
                        'id' => 8,
                        'userName' => 'David Wilson',
                        'userImage' => '/images/user/user-09.jpg',
                        'action' => 'requests permission to change',
                        'project' => 'Project - CRM Dashboard',
                        'type' => 'Project',
                        'time' => '40 min ago',
                        'status' => 'online',
                    ],
                ];
            @endphp

            @foreach ($notifications as $notification)
                <li @click="handleItemClick()">
                    <a
                        class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5"
                        href="#"
                    >
                        <span class="relative block w-full h-10 rounded-full z-1 max-w-10">
                            <img src="{{ $notification['userImage'] }}" alt="User" class="overflow-hidden rounded-full" />
                            <span
                                class="absolute bottom-0 right-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white dark:border-gray-900 {{ $notification['status'] === 'online' ? 'bg-success-500' : 'bg-error-500' }}"
                            ></span>
                        </span>

                        <span class="block">
                            <span class="mb-1.5 block text-theme-sm text-gray-500 dark:text-gray-400">
                                <span class="font-medium text-gray-800 dark:text-white/90">
                                    {{ $notification['userName'] }}
                                </span>
                                {{ $notification['action'] }}
                                <span class="font-medium text-gray-800 dark:text-white/90">
                                    {{ $notification['project'] }}
                                </span>
                            </span>

                            <span class="flex items-center gap-2 text-gray-500 text-theme-xs dark:text-gray-400">
                                <span>{{ $notification['type'] }}</span>
                                <span class="w-1 h-1 bg-gray-400 rounded-full"></span>
                                <span>{{ $notification['time'] }}</span>
                            </span>
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- View All Button -->
        <a
            href="#"
            class="mt-3 flex justify-center rounded-lg border border-gray-300 bg-white p-3 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200"
            @click.prevent="handleViewAllClick()"
        >
            View All Notification
        </a>
    </div>
    <!-- Dropdown End -->
</div>
```

## File: `resources/views/components/header/user-dropdown.blade.php`

```blade

   @props(['user' => auth()->user()])
    <div class="relative" x-data="{
        isOpen: false,
        subDropdownOpen: false,
        currentLocale: '{{ app()->getLocale() }}' || localStorage.getItem('locale') || (localStorage.getItem('dir') === 'rtl' ? 'ar' : 'en'),
        languages: [
            {
                id: 'en',
                name: 'English',
                shortName: 'English',
                flag: 'flag-us.svg',
                dir: 'ltr'
            },
            {
                id: 'ar',
                name: 'Arabic (Saudi)',
                shortName: 'Arabic',
                flag: 'flag-sa.svg',
                badge: 'RTL',
                dir: 'rtl'
            },
            {
                id: 'es',
                name: 'Español',
                shortName: 'Español',
                flag: 'flag-es.svg',
                dir: 'ltr'
            },
            {
                id: 'de',
                name: 'Deutsch',
                shortName: 'Deutsch',
                flag: 'flag-de.svg',
                dir: 'ltr'
            }
        ],
        get currentLang() {
            return this.languages.find(l => l.id === this.currentLocale) || this.languages[0];
        },
        toggleDropdown() {
            this.isOpen = !this.isOpen;
            if (!this.isOpen) {
                this.subDropdownOpen = false;
            }
        },
        closeDropdown() {
            this.isOpen = false;
            this.subDropdownOpen = false;
        },
        selectLanguage(lang) {
            this.currentLocale = lang.id;
            const dir = lang.dir || (lang.id === 'ar' ? 'rtl' : 'ltr');
            localStorage.setItem('locale', lang.id);
            localStorage.setItem('dir', dir);
            document.documentElement.setAttribute('dir', dir);
            document.documentElement.setAttribute('lang', lang.id);
            window.location.href = '/locale/' + lang.id;
        }
    }" @click.outside="closeDropdown()">
        <!-- User Trigger -->
        <button
            class="flex items-center text-gray-700 dark:text-gray-400"
            type="button"
            @click="toggleDropdown()"
        >
            <span class="mr-3 overflow-hidden rounded-full h-11 w-11 rtl:mr-0 rtl:ml-3">
                <img src="/images/user/owner.png" alt="User" />
            </span>

            <span class="block mr-1 font-medium text-theme-sm rtl:mr-0 rtl:ml-1">{{ $user->nama }}</span>

            <!-- Chevron Down Icon -->
            <svg
                :class="isOpen ? 'rotate-180' : ''"
                class="transition-transform duration-200 stroke-gray-500 group-hover:stroke-gray-700 dark:stroke-gray-400 dark:group-hover:stroke-gray-200"
                width="18"
                height="18"
                viewBox="0 0 18 18"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M4.5 6.75L9 11.25L13.5 6.75"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div
            x-show="isOpen"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute ltr:right-0 rtl:left-0 mt-[17px] flex w-[260px] flex-col rounded-2xl border border-gray-200 bg-white p-3 shadow-theme-lg dark:border-gray-800 dark:bg-gray-dark z-50"
            style="display: none;"
        >
            <!-- User Info -->
            <div>
                <span class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">Musharof Chowdhury</span>
                <span class="mt-0.5 block text-theme-xs text-gray-500 dark:text-gray-400">randomuser@pimjo.com</span>
            </div>

            <!-- Menu Items -->
            <ul class="flex flex-col gap-1 pt-4 pb-3 border-b border-gray-200 dark:border-gray-800">
                <li>
                    <a
                        href="/profile"
                        class="flex items-center gap-3 px-3 py-2 font-medium text-gray-700 rounded-lg group text-theme-sm hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300"
                    >
                        <span class="text-gray-500 group-hover:text-gray-700 dark:group-hover:text-gray-300">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z" fill="currentColor" />
                            </svg>
                        </span>
                        Edit profile
                    </a>
                </li>
                <li>
                    <a
                        href="/profile"
                        class="flex items-center gap-3 px-3 py-2 font-medium text-gray-700 rounded-lg group text-theme-sm hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300"
                    >
                        <span class="text-gray-500 group-hover:text-gray-700 dark:group-hover:text-gray-300">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4858 3.5L13.5182 3.5C13.9233 3.5 14.2518 3.82851 14.2518 4.23377C14.2518 5.9529 16.1129 7.02795 17.602 6.1682C17.9528 5.96567 18.4014 6.08586 18.6039 6.43667L20.1203 9.0631C20.3229 9.41407 20.2027 9.86286 19.8517 10.0655C18.3625 10.9253 18.3625 13.0747 19.8517 13.9345C20.2026 14.1372 20.3229 14.5859 20.1203 14.9369L18.6039 17.5634C18.4013 17.9142 17.9528 18.0344 17.602 17.8318C16.1129 16.9721 14.2518 18.0471 14.2518 19.7663C14.2518 20.1715 13.9233 20.5 13.5182 20.5H10.4858C10.0804 20.5 9.75182 20.1714 9.75182 19.766C9.75182 18.0461 7.88983 16.9717 6.40067 17.8314C6.04945 18.0342 5.60037 17.9139 5.39767 17.5628L3.88167 14.937C3.67903 14.586 3.79928 14.1372 4.15026 13.9346C5.63949 13.0748 5.63946 10.9253 4.15025 10.0655C3.79926 9.86282 3.67901 9.41401 3.88165 9.06303L5.39764 6.43725C5.60034 6.08617 6.04943 5.96581 6.40065 6.16858C7.88982 7.02836 9.75182 5.9539 9.75182 4.23399C9.75182 3.82862 10.0804 3.5 10.4858 3.5ZM13.5182 2L10.4858 2C9.25201 2 8.25182 3.00019 8.25182 4.23399C8.25182 4.79884 7.64013 5.15215 7.15065 4.86955C6.08213 4.25263 4.71559 4.61859 4.0986 5.68725L2.58261 8.31303C1.96575 9.38146 2.33183 10.7477 3.40025 11.3645C3.88948 11.647 3.88947 12.3531 3.40026 12.6355C2.33184 13.2524 1.96578 14.6186 2.58263 15.687L4.09863 18.3128C4.71562 19.3814 6.08215 19.7474 7.15067 19.1305C7.64015 18.8479 8.25182 19.2012 8.25182 19.766C8.25182 20.9998 9.25201 22 10.4858 22H13.5182C14.7519 22 15.7518 20.9998 15.7518 19.7663C15.7518 19.2015 16.3632 18.8487 16.852 19.1309C17.9202 19.7476 19.2862 19.3816 19.9029 18.3134L21.4193 15.6869C22.0361 14.6185 21.6701 13.2523 20.6017 12.6355C20.1125 12.3531 20.1125 11.647 20.6017 11.3645C21.6701 10.7477 22.0362 9.38152 21.4193 8.3131L19.903 5.68667C19.2862 4.61842 17.9202 4.25241 16.852 4.86917C16.3632 5.15138 15.7518 4.79856 15.7518 4.23377C15.7518 3.00024 14.7519 2 13.5182 2ZM9.6659 11.9999C9.6659 10.7103 10.7113 9.66493 12.0009 9.66493C13.2905 9.66493 14.3359 10.7103 14.3359 11.9999C14.3359 13.2895 13.2905 14.3349 12.0009 14.3349C10.7113 14.3349 9.6659 13.2895 9.6659 11.9999ZM12.0009 8.16493C9.88289 8.16493 8.1659 9.88191 8.1659 11.9999C8.1659 14.1179 9.88289 15.8349 12.0009 15.8349C14.1189 15.8349 15.8359 14.1179 15.8359 11.9999C15.8359 9.88191 14.1189 8.16493 12.0009 8.16493Z" fill="currentColor" />
                            </svg>
                        </span>
                        Account settings
                    </a>
                </li>
                <li>
                    <a
                        href="/profile"
                        class="flex items-center gap-3 px-3 py-2 font-medium text-gray-700 rounded-lg group text-theme-sm hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300"
                    >
                        <span class="text-gray-500 group-hover:text-gray-700 dark:group-hover:text-gray-300">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 12C3.5 7.30558 7.30558 3.5 12 3.5C16.6944 3.5 20.5 7.30558 20.5 12C20.5 16.6944 16.6944 20.5 12 20.5C7.30558 20.5 3.5 16.6944 3.5 12ZM12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM11.0991 7.52507C11.0991 8.02213 11.5021 8.42507 11.9991 8.42507H12.0001C12.4972 8.42507 12.9001 8.02213 12.9001 7.52507C12.9001 7.02802 12.4972 6.62507 12.0001 6.62507H11.9991C11.5021 6.62507 11.0991 7.02802 11.0991 7.52507ZM12.0001 17.3714C11.5859 17.3714 11.2501 17.0356 11.2501 16.6214V10.9449C11.2501 10.5307 11.5859 10.1949 12.0001 10.1949C12.4143 10.1949 12.7501 10.5307 12.7501 10.9449V16.6214C12.7501 17.0356 12.4143 17.3714 12.0001 17.3714Z" fill="currentColor" />
                            </svg>
                        </span>
                        Support
                    </a>
                </li>

                <!-- Language / RTL Submenu Item -->
                <li class="relative" @click.outside="subDropdownOpen = false">
                    <button
                        type="button"
                        @click.stop="subDropdownOpen = !subDropdownOpen"
                        class="group flex max-h-10 w-full items-center justify-between gap-2 rounded-lg px-3 py-2 text-theme-sm font-medium transition-colors"
                        :class="subDropdownOpen
                            ? 'bg-gray-100 text-gray-900 dark:bg-white/5 dark:text-white'
                            : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300'"
                    >
                        <span class="flex items-center gap-3 text-theme-sm">
                            <svg class="stroke-gray-500 group-hover:stroke-gray-700 dark:stroke-gray-400 dark:group-hover:stroke-gray-300"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.001 2.75C17.1091 2.75 21.2501 6.89178 21.2501 11.9999C21.2501 17.108 17.1091 21.2498 12.001 21.2498M12.001 2.75C6.89289 2.75 2.75195 6.89178 2.75195 11.9999C2.75195 17.108 6.8929 21.2498 12.001 21.2498M12.001 2.75C14.2097 2.75 16.0005 6.8914 16.0005 11.9993C16.0005 17.1073 14.2098 21.2498 12.001 21.2498M12.001 2.75C9.79226 2.75 8.00195 6.89141 8.00195 11.9994C8.00195 17.1073 9.79226 21.2498 12.001 21.2498M3.24561 8.99976H20.7544M3.24561 14.9998H20.7544"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <span>Language</span>
                        </span>

                        <span
                            class="flex items-center gap-1.5 rounded-lg border border-gray-200 bg-gray-50 px-2 py-1 text-theme-xs font-medium text-gray-700 dark:border-gray-800 dark:bg-white/[0.03] dark:text-gray-300"
                        >
                            <span x-text="currentLang.shortName"></span>
                            <img :src="'/images/icons/' + currentLang.flag" :alt="currentLang.shortName" class="size-3.5 shrink-0 overflow-hidden rounded-full object-cover" />
                        </span>
                    </button>

                    <!-- Submenu Flyout -->
                    <div x-show="subDropdownOpen"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute top-11 ltr:-left-2 rtl:-right-2 w-[250px] rounded-2xl border border-gray-200 bg-white p-2 shadow-theme-lg md:top-0 ltr:md:right-[calc(100%+14px)] ltr:md:left-auto rtl:md:left-[calc(100%+14px)] rtl:md:right-auto dark:border-gray-800 dark:bg-gray-dark z-50"
                        style="display: none;"
                    >
                        <ul class="flex flex-col gap-1">
                            <template x-for="lang in languages" :key="lang.id">
                                <li>
                                    <button
                                        type="button"
                                        @click="selectLanguage(lang)"
                                        class="flex w-full items-center justify-between gap-2 rounded-lg px-2.5 py-2 ltr:text-left rtl:text-right text-theme-sm font-medium transition-colors"
                                        :class="currentLocale === lang.id
                                            ? 'bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-400'
                                            : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-white'"
                                    >
                                        <span class="flex items-center gap-2">
                                            <span
                                                class="size-1.5 shrink-0 rounded-full transition-opacity"
                                                :class="currentLocale === lang.id ? 'bg-brand-500 opacity-100 dark:bg-brand-400' : 'opacity-0'"></span>
                                            <img :src="'/images/icons/' + lang.flag" :alt="lang.name" class="size-5 shrink-0 overflow-hidden rounded-full object-cover" />
                                            <span class="truncate" x-text="lang.name"></span>
                                        </span>

                                        <template x-if="lang.badge">
                                            <span
                                                class="rounded bg-warning-50 px-1.5 py-0.5 text-theme-xs font-semibold text-warning-600 dark:bg-warning-500/15 dark:text-warning-400"
                                                x-text="lang.badge">
                                            </span>
                                        </template>
                                    </button>
                                </li>
                            </template>
                        </ul>
                    </div>
                </li>
            </ul>

            <!-- Sign Out -->
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item"          
            
                    class="flex items-center w-full gap-3 px-3 py-2 mt-3 font-medium text-gray-700 rounded-lg group text-theme-sm hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300"
                    @click="closeDropdown()"
                >
                    <span class="text-gray-500 group-hover:text-gray-700 dark:group-hover:text-gray-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </span>
                    Sign out
                
                </button>
            </form>
            </div>
    </div>
```

## File: `resources/views/components/profile/address-card.blade.php`

```blade
<div x-data="{
    saveProfile() {
        console.log('Saving profile...');
    }
}">
    <div class="rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
            <div>
                <h4 class="text-lg font-semibold text-gray-800 lg:mb-6 dark:text-white/90">
                    Address
                </h4>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
                    <div>
                        <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                            Country
                        </p>
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                            United States
                        </p>
                    </div>

                    <div>
                        <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                            City/State
                        </p>
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                            Arizona, United States.
                        </p>
                    </div>

                    <div>
                        <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                            Postal Code
                        </p>
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                            ERT 2489
                        </p>
                    </div>

                    <div>
                        <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                            TAX ID
                        </p>
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                            AS4568384
                        </p>
                    </div>
                </div>
            </div>

            <button @click="$dispatch('open-profile-address-modal')" class="flex w-full items-center justify-center gap-2 rounded-full border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 lg:inline-flex lg:w-auto">
                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z" fill="" />
                </svg>
                Edit
            </button>
        </div>
    </div>

    <x-ui.modal @open-profile-address-modal.window="open = true" :isOpen="false" class="max-w-[700px] p-4 lg:p-11">
        <div class="no-scrollbar">
            <div class="px-2 pe-14">
                <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90">
                    Edit Address
                </h4>
                <p class="mb-6 text-sm text-gray-500 dark:text-gray-400 lg:mb-7">
                    Update your details to keep your profile up-to-date.
                </p>
            </div>
            <form class="flex flex-col">
                <div class="px-2 overflow-y-auto custom-scrollbar">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Country
                            </label>
                            <input type="text" value="United States"
                                class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                City/State
                            </label>
                            <input type="text" value="Poenix, Arizona, United States"
                                class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Postal Code
                            </label>
                            <input type="text" value="ERT 2489"
                                class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                TAX ID
                            </label>
                            <input type="text" value="AS4568384"
                                class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3 mt-6 lg:justify-end">
                    <button @click="open = false" type="button"
                        class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto">
                        Close
                    </button>
                    <button @click="saveProfile" type="button"
                        class="flex w-full justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 sm:w-auto">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </x-ui.modal>
</div>
```

## File: `resources/views/components/profile/personal-info-card.blade.php`

```blade
<div class="max-w-xl">
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
        <div>
            <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                First Name
            </p>
            <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                Chowdury
            </p>
        </div>

        <div>
            <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                Last Name
            </p>
            <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                Musharof
            </p>
        </div>

        <div>
            <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                Email address
            </p>
            <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                randomuser@pimjo.com
            </p>
        </div>

        <div>
            <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                Phone
            </p>
            <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                +09 363 398 46
            </p>
        </div>

        <div>
            <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                Bio
            </p>
            <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                Team Manager
            </p>
        </div>
    </div>
</div>
```

## File: `resources/views/components/profile/profile-card.blade.php`

```blade
<div x-data="{
    saveProfile() {
        console.log('Saving profile...');
    }
}">
    {{-- lts --}}
    <div class="mb-6 flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between">
        <div class="flex w-full flex-col items-center gap-6 xl:flex-row">
            <div class="overflow-hidden rounded-full border border-gray-200 dark:border-gray-800">
                <img src="/images/user/owner.png" class="size-20" alt="user" />
            </div>
            <div class="order-3 xl:order-2">
                <h4 class="mb-2 text-center text-lg font-semibold text-gray-800 xl:text-start dark:text-white/90">
                    Musharof Chowdhury
                </h4>
                <div class="flex flex-col items-center gap-1 text-center xl:flex-row xl:gap-3 xl:text-start">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Team Manager
                    </p>
                    <div class="hidden h-3.5 w-px bg-gray-300 xl:block dark:bg-gray-700"></div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Arizona, United States.
                    </p>
                </div>
            </div>
            <div class="order-2 flex grow items-center gap-2 xl:order-3 xl:justify-end">
                <button
                    class="shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                    <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.6666 11.2503H13.7499L14.5833 7.91699H11.6666V6.25033C11.6666 5.39251 11.6666 4.58366 13.3333 4.58366H14.5833V1.78374C14.3118 1.7477 13.2858 1.66699 12.2023 1.66699C9.94025 1.66699 8.33325 3.04771 8.33325 5.58342V7.91699H5.83325V11.2503H8.33325V18.3337H11.6666V11.2503Z"
                            fill="" />
                    </svg>
                </button>

                <button
                    class="shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                    <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.1708 1.875H17.9274L11.9049 8.75833L18.9899 18.125H13.4424L9.09742 12.4442L4.12578 18.125H1.36745L7.80912 10.7625L1.01245 1.875H6.70078L10.6283 7.0675L15.1708 1.875ZM14.2033 16.475H15.7308L5.87078 3.43833H4.23162L14.2033 16.475Z"
                            fill="" />
                    </svg>
                </button>

                <button
                    class="shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                    <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.78381 4.16645C5.78351 4.84504 5.37181 5.45569 4.74286 5.71045C4.11391 5.96521 3.39331 5.81321 2.92083 5.32613C2.44836 4.83904 2.31837 4.11413 2.59216 3.49323C2.86596 2.87233 3.48886 2.47942 4.16715 2.49978C5.06804 2.52682 5.78422 3.26515 5.78381 4.16645ZM5.83381 7.06645H2.50048V17.4998H5.83381V7.06645ZM11.1005 7.06645H7.78381V17.4998H11.0672V12.0248C11.0672 8.97475 15.0422 8.69142 15.0422 12.0248V17.4998H18.3338V10.8914C18.3338 5.74978 12.4505 5.94145 11.0672 8.46642L11.1005 7.06645Z"
                            fill="" />
                    </svg>
                </button>

                <button
                    class="shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                    <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.8567 1.66699C11.7946 1.66854 12.2698 1.67351 12.6805 1.68573L12.8422 1.69102C13.0291 1.69766 13.2134 1.70599 13.4357 1.71641C14.3224 1.75738 14.9273 1.89766 15.4586 2.10391C16.0078 2.31572 16.4717 2.60183 16.9349 3.06503C17.3974 3.52822 17.6836 3.99349 17.8961 4.54141C18.1016 5.07197 18.2419 5.67753 18.2836 6.56433C18.2935 6.78655 18.3015 6.97088 18.3081 7.15775L18.3133 7.31949C18.3255 7.73011 18.3311 8.20543 18.3328 9.1433L18.3335 9.76463C18.3336 9.84055 18.3336 9.91888 18.3336 9.99972L18.3335 10.2348L18.333 10.8562C18.3314 11.794 18.3265 12.2694 18.3142 12.68L18.3089 12.8417C18.3023 13.0286 18.294 13.213 18.2836 13.4351C18.2426 14.322 18.1016 14.9268 17.8961 15.458C17.6842 16.0074 17.3974 16.4713 16.9349 16.9345C16.4717 17.397 16.0057 17.6831 15.4586 17.8955C14.9273 18.1011 14.3224 18.2414 13.4357 18.2831C13.2134 18.293 13.0291 18.3011 12.8422 18.3076L12.6805 18.3128C12.2698 18.3251 11.7946 18.3306 10.8567 18.3324L10.2353 18.333C10.1594 18.333 10.0811 18.333 10.0002 18.333H9.76516L9.14375 18.3325C8.20591 18.331 7.7306 18.326 7.31997 18.3137L7.15824 18.3085C6.97136 18.3018 6.78703 18.2935 6.56481 18.2831C5.67801 18.2421 5.07384 18.1011 4.5419 17.8955C3.99328 17.6838 3.5287 17.397 3.06551 16.9345C2.60231 16.4713 2.3169 16.0053 2.1044 15.458C1.89815 14.9268 1.75856 14.322 1.7169 13.4351C1.707 13.213 1.69892 13.0286 1.69238 12.8417L1.68714 12.68C1.67495 12.2694 1.66939 11.794 1.66759 10.8562L1.66748 9.1433C1.66903 8.20543 1.67399 7.73011 1.68621 7.31949L1.69151 7.15775C1.69815 6.97088 1.70648 6.78655 1.7169 6.56433C1.75786 5.67683 1.89815 5.07266 2.1044 4.54141C2.3162 3.9928 2.60231 3.52822 3.06551 3.06503C3.5287 2.60183 3.99398 2.31641 4.5419 2.10391C5.07315 1.89766 5.67731 1.75808 6.56481 1.71641C6.78703 1.70652 6.97136 1.69844 7.15824 1.6919L7.31997 1.68666C7.7306 1.67446 8.20591 1.6689 9.14375 1.6671L10.8567 1.66699ZM10.0002 5.83308C7.69781 5.83308 5.83356 7.69935 5.83356 9.99972C5.83356 12.3021 7.69984 14.1664 10.0002 14.1664C12.3027 14.1664 14.1669 12.3001 14.1669 9.99972C14.1669 7.69732 12.3006 5.83308 10.0002 5.83308ZM10.0002 7.49974C11.381 7.49974 12.5002 8.61863 12.5002 9.99972C12.5002 11.3805 11.3813 12.4997 10.0002 12.4997C8.6195 12.4997 7.50023 11.3809 7.50023 9.99972C7.50023 8.61897 8.61908 7.49974 10.0002 7.49974ZM14.3752 4.58308C13.8008 4.58308 13.3336 5.04967 13.3336 5.62403C13.3336 6.19841 13.8002 6.66572 14.3752 6.66572C14.9496 6.66572 15.4169 6.19913 15.4169 5.62403C15.4169 5.04967 14.9488 4.58236 14.3752 4.58308Z"
                            fill="" />
                    </svg>
                </button>
            </div>
        </div>

        <button @click="$dispatch('open-profile-info-modal')"
            class="shadow-theme-xs flex w-full items-center justify-center gap-2 rounded-full border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 lg:inline-flex lg:w-auto dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z"
                    fill="" />
            </svg>
            Edit
        </button>
    </div>

    <!-- Profile Info Modal -->
    <x-ui.modal @open-profile-info-modal.window="open = true" :isOpen="false" class="max-w-[700px] p-4 lg:p-11">
        <div class="no-scrollbar">
            <div class="px-2 pr-14">
                <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90">
                    Edit Personal Information
                </h4>
                <p class="mb-6 text-sm text-gray-500 lg:mb-7 dark:text-gray-400">
                    Update your details to keep your profile up-to-date.
                </p>
            </div>
            <form class="flex flex-col">
                <div class="custom-scrollbar h-[450px] overflow-y-auto px-2">
                    <div>
                        <h4 class="mb-6 text-lg font-medium text-gray-800 dark:text-white/90">
                            Change Profile Picture
                        </h4>
                        <div class="mb-6 flex max-w-sm items-center gap-6 lg:pr-5">
                            <div class="relative size-20 shrink-0 rounded-full sm:size-25">
                                <img src="/images/user/owner.png" alt="Profile Picture"
                                    class="size-20 rounded-full object-cover sm:size-25" />
                                <label for="file-upload"
                                    class="absolute right-0 bottom-0 flex size-8 cursor-pointer items-center justify-center rounded-full border border-gray-200 bg-white text-gray-500 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400">
                                    <input type="file" name="file-upload" id="file-upload" class="hidden" />
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.6731 3.41904C12.4371 3.10308 12.0659 2.91699 11.6715 2.91699H8.32809C7.93374 2.91699 7.56252 3.10308 7.32656 3.41904L6.83173 4.08164C6.59576 4.3976 6.22454 4.58369 5.83019 4.58369H3.5415C2.85115 4.58369 2.2915 5.14333 2.2915 5.83369V14.3754C2.2915 15.0657 2.85115 15.6254 3.5415 15.6254H16.4582C17.1485 15.6254 17.7082 15.0657 17.7082 14.3754V5.83369C17.7082 5.14333 17.1485 4.58369 16.4582 4.58369H14.1694C13.7751 4.58369 13.4039 4.3976 13.1679 4.08164L12.6731 3.41904Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M13.3332 9.79362C13.3332 11.6346 11.8408 13.127 9.99984 13.127C8.15889 13.127 6.6665 11.6346 6.6665 9.79362C6.6665 7.95267 8.15889 6.46029 9.99984 6.46029C11.8408 6.46029 13.3332 7.95267 13.3332 9.79362Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </label>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Upload a square image (200×200 px) in JPEG or PNG format.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <h4 class="mb-5 text-lg font-medium text-gray-800 lg:mb-6 dark:text-white/90">
                            Personal Information
                        </h4>
                        <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
                            <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    First Name
                                </label>
                                <input type="text" value="Musharof"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>

                            <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Last Name
                                </label>
                                <input type="text" value="Chowdhury"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>

                            <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Email Address
                                </label>
                                <input type="text" value="randomuser@pimjo.com"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>

                            <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Phone
                                </label>
                                <input type="text" value="+09 363 398 46"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>

                            <div class="col-span-2">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Bio
                                </label>
                                <input type="text" value="Team Manager"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <h5 class="mb-5 text-lg font-medium text-gray-800 lg:mb-6 dark:text-white/90">
                            Social Links
                        </h5>

                        <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Facebook
                                </label>
                                <input type="text" value="https://www.facebook.com/PimjoHQ"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>

                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    X.com
                                </label>
                                <input type="text" value="https://x.com/PimjoHQ"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>

                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Linkedin
                                </label>
                                <input type="text" value="https://linkedin.com/PimjoHQ"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>

                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Instagram
                                </label>
                                <input type="text" value="https://instagram.com/PimjoHQ"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center gap-3 px-2 lg:justify-end">
                     <button @click="open = false" type="button"
                        class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto">
                        Close
                    </button>
                    <button @click="saveProfile" type="button"
                        class="flex w-full justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 sm:w-auto">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </x-ui.modal>
</div>
```

## File: `resources/views/components/tables/basic-tables/basic-tables-five.blade.php`

```blade

@php
    $orders = [
        [
            'product' => 'TailGrids',
            'category' => 'UI Kit',
            'countryFlag' => '/images/country/country-01.svg',
            'country' => 'USA',
            'cr' => 'Dashboard',
            'value' => '$12,499',
        ],
        [
            'product' => 'GrayGrids',
            'category' => 'Templates',
            'countryFlag' => '/images/country/country-03.svg',
            'country' => 'UK',
            'cr' => 'Dashboard',
            'value' => '$5,498',
        ],
        [
            'product' => 'Uideck',
            'category' => 'Templates',
            'countryFlag' => '/images/country/country-04.svg',
            'country' => 'Canada',
            'cr' => 'Dashboard',
            'value' => '$4,521',
        ],
        [
            'product' => 'FormBold',
            'category' => 'SaaS',
            'countryFlag' => '/images/country/country-05.svg',
            'country' => 'Australia',
            'cr' => 'Dashboard',
            'value' => '$13,843',
        ],
        [
            'product' => 'NextAdmin',
            'category' => 'Dashboard',
            'countryFlag' => '/images/country/country-06.svg',
            'country' => 'Germany',
            'cr' => 'Dashboard',
            'value' => '$7,523',
        ],
        [
            'product' => 'Form Builder',
            'category' => 'SaaS',
            'countryFlag' => '/images/country/country-07.svg',
            'country' => 'France',
            'cr' => 'Dashboard',
            'value' => '$1,377',
        ],
        [
            'product' => 'AyroUI',
            'category' => 'UI Kit',
            'countryFlag' => '/images/country/country-08.svg',
            'country' => 'Japan',
            'cr' => 'Dashboard',
            'value' => '$599,00',
        ],
    ];
@endphp

<div
    class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]"
>
    <div class="flex flex-col gap-4 px-6 mb-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Recent Orders</h3>
        </div>

        <div class="flex items-center gap-3">
            <button
                class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200"
            >
                <svg
                    class="stroke-current fill-white dark:fill-gray-800"
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M2.29004 5.90393H17.7067"
                        stroke=""
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M17.7075 14.0961H2.29085"
                        stroke=""
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M12.0826 3.33331C13.5024 3.33331 14.6534 4.48431 14.6534 5.90414C14.6534 7.32398 13.5024 8.47498 12.0826 8.47498C10.6627 8.47498 9.51172 7.32398 9.51172 5.90415C9.51172 4.48432 10.6627 3.33331 12.0826 3.33331Z"
                        fill=""
                        stroke=""
                        stroke-width="1.5"
                    />
                    <path
                        d="M7.91745 11.525C6.49762 11.525 5.34662 12.676 5.34662 14.0959C5.34661 15.5157 6.49762 16.6667 7.91745 16.6667C9.33728 16.6667 10.4883 15.5157 10.4883 14.0959C10.4883 12.676 9.33728 11.525 7.91745 11.525Z"
                        fill=""
                        stroke=""
                        stroke-width="1.5"
                    />
                </svg>

                Filter
            </button>

            <button
                class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200"
            >
                See all
            </button>
        </div>
    </div>

    <div class="max-w-full overflow-x-auto custom-scrollbar">
        <table class="min-w-full">
            <!-- table header start -->
            <thead>
                <tr class="border-gray-100 border-y dark:border-white/[0.05]">
                    <th class="px-6 py-3">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Products</p>
                        </div>
                    </th>
                    <th class="px-6 py-3">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Category</p>
                        </div>
                    </th>
                    <th class="px-6 py-3">
                        <div class="flex items-center col-span-2">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Country</p>
                        </div>
                    </th>
                    <th class="px-6 py-3">
                        <div class="flex items-center col-span-2">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">CR</p>
                        </div>
                    </th>
                    <th class="px-6 py-3">
                        <div class="flex items-center col-span-2">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Value</p>
                        </div>
                    </th>
                </tr>
            </thead>
            <!-- table header end -->

            <!-- table body start -->
            <tbody class="divide-y divide-gray-100 dark:divide-white/[0.05]">
                @foreach ($orders as $order)
                    <tr>
                        <td class="px-6 py-3.5">
                            <div class="flex items-center">
                                <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                    {{ $order['product'] }}
                                </p>
                            </div>
                        </td>
                        <td class="px-6 py-3.5">
                            <div class="flex items-center">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ $order['category'] }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-3.5">
                            <div class="flex items-center">
                                <div class="w-5 h-5 overflow-hidden rounded-full">
                                    <img src="{{ $order['countryFlag'] }}" alt="{{ $order['country'] }}" />
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-3.5">
                            <div class="flex items-center">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                    {{ $order['cr'] }}
                                </p>
                            </div>
                        </td>
                        <td class="px-6 py-3.5">
                            <div class="flex items-center">
                                <p class="text-theme-sm text-success-600">{{ $order['value'] }}</p>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <!-- table body end -->
        </table>
    </div>
</div>
```

## File: `resources/views/components/tables/basic-tables/basic-tables-four.blade.php`

```blade
@php
    $campaigns = [
        [
            'creator' => ['name' => 'Wilson Gouse', 'imageUrl' => '/images/user/user-01.jpg'],
            'brand' => ['name' => 'Brand 1', 'logo' => '/images/brand/brand-01.svg'],
            'title' => 'Grow your brand by...',
            'type' => 'Ads campaign',
            'status' => 'Success',
        ],
        [
            'creator' => ['name' => 'Terry Franci', 'imageUrl' => '/images/user/user-02.jpg'],
            'brand' => ['name' => 'Brand 2', 'logo' => '/images/brand/brand-02.svg'],
            'title' => 'Make Better Ideas...',
            'type' => 'Ads campaign',
            'status' => 'Pending',
        ],
        [
            'creator' => ['name' => 'Alena Franci', 'imageUrl' => '/images/user/user-03.jpg'],
            'brand' => ['name' => 'Brand 3', 'logo' => '/images/brand/brand-03.svg'],
            'title' => 'Increase your website tra...',
            'type' => 'Ads campaign',
            'status' => 'Success',
        ],
        [
            'creator' => ['name' => 'Jocelyn Kenter', 'imageUrl' => '/images/user/user-04.jpg'],
            'brand' => ['name' => 'Brand 4', 'logo' => '/images/brand/brand-04.svg'],
            'title' => 'Digital Marketing that...',
            'type' => 'Ads campaign',
            'status' => 'Failed',
        ],
        [
            'creator' => ['name' => 'Brandon Philips', 'imageUrl' => '/images/user/user-05.jpg'],
            'brand' => ['name' => 'Brand 2', 'logo' => '/images/brand/brand-02.svg'],
            'title' => 'Self branding',
            'type' => 'Ads campaign',
            'status' => 'Success',
        ],
        [
            'creator' => ['name' => 'James Lipshutz', 'imageUrl' => '/images/user/user-06.jpg'],
            'brand' => ['name' => 'Brand 3', 'logo' => '/images/brand/brand-03.svg'],
            'title' => 'Increase your website tra...',
            'type' => 'Ads campaign',
            'status' => 'Success',
        ],
    ];

    function getStatusClass($status) {
        $baseClasses = 'rounded-full px-2 text-theme-xs font-medium';
        switch ($status) {
            case 'Success':
                return "$baseClasses bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500";
            case 'Pending':
                return "$baseClasses bg-warning-50 text-warning-600 dark:bg-warning-500/15 dark:text-orange-400";
            case 'Failed':
                return "$baseClasses bg-error-50 text-error-600 dark:bg-error-500/15 dark:text-error-500";
            default:
                return $baseClasses;
        }
    }
@endphp

<div
    class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6"
>
    <div class="flex justify-between gap-2 mb-4 sm:items-center">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Featured Campaigns</h3>
        </div>

        <div class="relative"></div>
    </div>

    <div class="max-w-full overflow-x-auto custom-scrollbar">
        <table class="min-w-full">
            <!-- table header start -->
            <thead>
                <tr class="border-gray-100 border-y dark:border-gray-800">
                    <th class="py-3 font-normal">
                        <div class="flex items-center">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">Creator</p>
                        </div>
                    </th>
                    <th class="py-3 font-normal">
                        <div class="flex items-center">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">Campaign</p>
                        </div>
                    </th>
                    <th class="py-3 font-normal">
                        <div class="flex items-center">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">Status</p>
                        </div>
                    </th>
                </tr>
            </thead>
            <!-- table header end -->

            <!-- table body start -->
            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                @foreach ($campaigns as $campaign)
                    <tr>
                        <td class="py-3">
                            <div class="flex items-center gap-[18px]">
                                <div class="w-10 h-10 overflow-hidden rounded-full">
                                    <img src="{{ $campaign['creator']['imageUrl'] }}" alt="{{ $campaign['creator']['name'] }}" />
                                </div>
                                <div>
                                    <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                                        {{ $campaign['creator']['name'] }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="py-3">
                            <div class="flex items-center">
                                <div class="flex items-center w-full gap-5">
                                    <div class="w-full max-w-8">
                                        <img src="{{ $campaign['brand']['logo'] }}" class="size-8" alt="{{ $campaign['brand']['name'] }}" />
                                    </div>
                                    <div class="truncate">
                                        <p class="mb-0.5 truncate text-theme-sm font-medium text-gray-700 dark:text-gray-400">
                                            {{ $campaign['title'] }}
                                        </p>
                                        <span class="text-gray-500 text-theme-xs dark:text-gray-400">
                                            {{ $campaign['type'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="py-3">
                            <div class="flex items-center">
                                <span class="{{ getStatusClass($campaign['status']) }}">
                                    {{ $campaign['status'] }}
                                </span>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <!-- table body end -->
        </table>
    </div>
</div>
```

## File: `resources/views/components/tables/basic-tables/basic-tables-one.blade.php`

```blade
<div x-data="{
    orders: [
        {
            id: 1,
            user: {
                image: './images/user/user-17.jpg',
                name: 'Lindsey Curtis',
                role: 'Web Designer',
            },
            projectName: 'Agency Website',
            team: {
                images: [
                    './images/user/user-22.jpg',
                    './images/user/user-23.jpg',
                    './images/user/user-24.jpg',
                ],
            },
            budget: '3.9K',
            status: 'Active',
        },
        {
            id: 2,
            user: {
                image: './images/user/user-18.jpg',
                name: 'Kaiya George',
                role: 'Project Manager',
            },
            projectName: 'Technology',
            team: {
                images: [
                    './images/user/user-25.jpg',
                    './images/user/user-26.jpg',
                ],
            },
            budget: '24.9K',
            status: 'Pending',
        },
        {
            id: 3,
            user: {
                image: './images/user/user-19.jpg',
                name: 'Zain Geidt',
                role: 'Content Writer',
            },
            projectName: 'Blog Writing',
            team: {
                images: [
                    './images/user/user-27.jpg',
                ],
            },
            budget: '12.7K',
            status: 'Active',
        },
        {
            id: 4,
            user: {
                image: './images/user/user-20.jpg',
                name: 'Abram Schleifer',
                role: 'Digital Marketer',
            },
            projectName: 'Social Media',
            team: {
                images: [
                    './images/user/user-28.jpg',
                    './images/user/user-29.jpg',
                    './images/user/user-30.jpg',
                ],
            },
            budget: '2.8K',
            status: 'Cancel',
        },
        {
            id: 5,
            user: {
                image: './images/user/user-21.jpg',
                name: 'Carla George',
                role: 'Front-end Developer',
            },
            projectName: 'Website',
            team: {
                images: [
                    './images/user/user-31.jpg',
                    './images/user/user-32.jpg',
                    './images/user/user-33.jpg',
                ],
            },
            budget: '4.5K',
            status: 'Active',
        },
    ],
    getStatusClass(status) {
        const classes = {
            'Active': 'bg-green-50 text-green-700 dark:bg-green-500/15 dark:text-green-500',
            'Pending': 'bg-yellow-50 text-yellow-700 dark:bg-yellow-500/15 dark:text-yellow-400',
            'Cancel': 'bg-red-50 text-red-700 dark:bg-red-500/15 dark:text-red-500',
        };
        return classes[status] || '';
    }
}">
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="max-w-full overflow-x-auto custom-scrollbar">
            <table class="w-full min-w-[1102px]">
                <thead>
                    <tr class="border-b border-gray-100 dark:border-gray-800">
                        <th class="px-5 py-3 text-start sm:px-6">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                User
                            </p>
                        </th>
                        <th class="px-5 py-3 text-start sm:px-6">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Project Name
                            </p>
                        </th>
                        <th class="px-5 py-3 text-start sm:px-6">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Team
                            </p>
                        </th>
                        <th class="px-5 py-3 text-start sm:px-6">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Status
                            </p>
                        </th>
                        <th class="px-5 py-3 text-start sm:px-6">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Budget
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="order in orders" :key="order.id">
                        <tr class="border-b border-gray-100 dark:border-gray-800">
                            <td class="px-5 py-4 sm:px-6" colspan="1">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 overflow-hidden rounded-full">
                                        <img :src="order.user.image" :alt="order.user.name">
                                    </div>
                                    <div>
                                        <span class="block font-medium text-gray-800 text-theme-sm dark:text-white/90" x-text="order.user.name"></span>
                                        <span class="block text-gray-500 text-theme-xs dark:text-gray-400" x-text="order.user.role"></span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 sm:px-6">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400" x-text="order.projectName"></p>
                            </td>
                            <td class="px-5 py-4 sm:px-6">
                                <div class="flex -space-x-2">
                                    <template x-for="(teamImage, index) in order.team.images" :key="index">
                                        <div class="w-6 h-6 overflow-hidden border-2 border-white rounded-full dark:border-gray-900">
                                            <img :src="teamImage" alt="team member">
                                        </div>
                                    </template>
                                </div>
                            </td>
                            <td class="px-5 py-4 sm:px-6">
                                <p class="text-theme-xs inline-block rounded-full px-2 py-0.5 font-medium" :class="getStatusClass(order.status)" x-text="order.status"></p>
                            </td>
                            <td class="px-5 py-4 sm:px-6">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400" x-text="order.budget"></p>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</div>
```

## File: `resources/views/components/tables/basic-tables/basic-tables-three.blade.php`

```blade
<div x-data="{
    transactions: [
        {
            id: 1,
            name: 'Bought PYPL',
            image: '/images/brand/brand-08.svg',
            date: 'Nov 23, 01:00 PM',
            price: '$2,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 2,
            name: 'Bought AAPL',
            image: '/images/brand/brand-07.svg',
            date: 'Nov 23, 01:00 PM',
            price: '$2,567.88',
            category: 'Finance',
            status: 'Pending',
        },
        {
            id: 3,
            name: 'Sell KKST',
            image: '/images/brand/brand-15.svg',
            date: 'Nov 23, 01:00 PM',
            price: '$2,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 4,
            name: 'Bought FB',
            image: '/images/brand/brand-02.svg',
            date: 'Nov 23, 01:00 PM',
            price: '$2,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 5,
            name: 'Sell AMZN',
            image: '/images/brand/brand-10.svg',
            date: 'Nov 23, 01:00 PM',
            price: '$2,567.88',
            category: 'Finance',
            status: 'Failed',
        },
        {
            id: 6,
            name: 'Bought MSFT',
            image: '/images/brand/brand-09.svg',
            date: 'Nov 22, 01:00 PM',
            price: '$1,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 7,
            name: 'Bought GOOG',
            image: '/images/brand/brand-01.svg',
            date: 'Nov 22, 01:00 PM',
            price: '$3,567.88',
            category: 'Finance',
            status: 'Pending',
        },
        {
            id: 8,
            name: 'Sell TSLA',
            image: '/images/brand/brand-12.svg',
            date: 'Nov 22, 01:00 PM',
            price: '$4,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 9,
            name: 'Bought NVDA',
            image: '/images/brand/brand-11.svg',
            date: 'Nov 22, 01:00 PM',
            price: '$5,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 10,
            name: 'Sell META',
            image: '/images/brand/brand-03.svg',
            date: 'Nov 22, 01:00 PM',
            price: '$6,567.88',
            category: 'Finance',
            status: 'Failed',
        },
        {
            id: 11,
            name: 'Bought DIS',
            image: '/images/brand/brand-04.svg',
            date: 'Nov 21, 01:00 PM',
            price: '$7,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 12,
            name: 'Bought NFLX',
            image: '/images/brand/brand-05.svg',
            date: 'Nov 21, 01:00 PM',
            price: '$8,567.88',
            category: 'Finance',
            status: 'Pending',
        },
        {
            id: 13,
            name: 'Sell CRM',
            image: '/images/brand/brand-06.svg',
            date: 'Nov 21, 01:00 PM',
            price: '$9,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 14,
            name: 'Bought TSLA',
            image: '/images/brand/brand-13.svg',
            date: 'Nov 21, 01:00 PM',
            price: '$10,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 15,
            name: 'Sell AAPL',
            image: '/images/brand/brand-14.svg',
            date: 'Nov 21, 01:00 PM',
            price: '$11,567.88',
            category: 'Finance',
            status: 'Failed',
        },
    ],
    itemsPerPage: 5,
    currentPage: 1,
    dropdownOpen: null,
    get totalPages() {
        return Math.ceil(this.transactions.length / this.itemsPerPage);
    },
    get paginatedTransactions() {
        const start = (this.currentPage - 1) * this.itemsPerPage;
        const end = start + this.itemsPerPage;
        return this.transactions.slice(start, end);
    },
    get displayedPages() {
        const range = [];
        for (let i = 1; i <= this.totalPages; i++) {
            if (
                i === 1 ||
                i === this.totalPages ||
                (i >= this.currentPage - 1 && i <= this.currentPage + 1)
            ) {
                range.push(i);
            } else if (range[range.length - 1] !== '...') {
                range.push('...');
            }
        }
        return range;
    },
    prevPage() {
        if (this.currentPage > 1) {
            this.currentPage--;
        }
    },
    nextPage() {
        if (this.currentPage < this.totalPages) {
            this.currentPage++;
        }
    },
    goToPage(page) {
        if (typeof page === 'number' && page >= 1 && page <= this.totalPages) {
            this.currentPage = page;
        }
    },
    getStatusClass(status) {
        const classes = {
            'Success': 'bg-green-50 text-green-600 dark:bg-green-500/15 dark:text-green-500',
            'Pending': 'bg-yellow-50 text-yellow-600 dark:bg-yellow-500/15 dark:text-orange-400',
            'Failed': 'bg-red-50 text-red-600 dark:bg-red-500/15 dark:text-red-500',
        };
        return classes[status] || '';
    },
    toggleDropdown(id) {
        this.dropdownOpen = this.dropdownOpen === id ? null : id;
    }
}">
    <div class="rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
        <!-- Header -->
        <div class="flex flex-col gap-2 px-5 mb-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Latest Transactions</h3>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                <form>
                    <div class="relative">
                        <button type="button" class="absolute -translate-y-1/2 ltr:left-4 rtl:right-4 top-1/2">
                            <svg class="fill-gray-500 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04199 9.37381C3.04199 5.87712 5.87735 3.04218 9.37533 3.04218C12.8733 3.04218 15.7087 5.87712 15.7087 9.37381C15.7087 12.8705 12.8733 15.7055 9.37533 15.7055C5.87735 15.7055 3.04199 12.8705 3.04199 9.37381ZM9.37533 1.54218C5.04926 1.54218 1.54199 5.04835 1.54199 9.37381C1.54199 13.6993 5.04926 17.2055 9.37533 17.2055C11.2676 17.2055 13.0032 16.5346 14.3572 15.4178L17.1773 18.2381C17.4702 18.531 17.945 18.5311 18.2379 18.2382C18.5308 17.9453 18.5309 17.4704 18.238 17.1775L15.4182 14.3575C16.5367 13.0035 17.2087 11.2671 17.2087 9.37381C17.2087 5.04835 13.7014 1.54218 9.37533 1.54218Z" fill=""/>
                            </svg>
                        </button>
                        <input type="text" placeholder="Search..." class="h-[42px] w-full rounded-lg border border-gray-300 bg-transparent py-2.5 ltr:pl-[42px] ltr:pr-4 rtl:pr-[42px] rtl:pl-4 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-blue-800 xl:w-[300px]"/>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-hidden">
            <div class="max-w-full px-5 overflow-x-auto">
                <table class="w-full min-w-full">
                    <thead>
                        <tr class="border-gray-200 border-y dark:border-gray-700">
                            <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Name</th>
                            <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Date</th>
                            <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Price</th>
                            <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-start text-gray-500 capitalize">Category</th>
                            <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Status</th>
                            <th scope="col" class="relative px-4 py-3 capitalize">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <template x-for="transaction in paginatedTransactions" :key="transaction.id">
                            <tr>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="shrink-0 w-8 h-8">
                                            <img class="w-8 h-8 rounded-full" :src="transaction.image" alt="">
                                        </div>
                                        <div class="ltr:ml-4 rtl:mr-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white" x-text="transaction.name"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500 dark:text-gray-400" x-text="transaction.date"></div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500 dark:text-gray-400" x-text="transaction.price"></div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500 dark:text-gray-400" x-text="transaction.category"></div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" :class="getStatusClass(transaction.status)" x-text="transaction.status"></span>
                                </td>
                                <td class="px-4 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <div class="flex justify-center relative">
                                        <x-common.table-dropdown>
                                            <x-slot name="button">
                                                <button type="button" id="options-menu" aria-haspopup="true" aria-expanded="true" class="text-gray-500 dark:text-gray-400'">
                                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.99902 10.245C6.96552 10.245 7.74902 11.0285 7.74902 11.995V12.005C7.74902 12.9715 6.96552 13.755 5.99902 13.755C5.03253 13.755 4.24902 12.9715 4.24902 12.005V11.995C4.24902 11.0285 5.03253 10.245 5.99902 10.245ZM17.999 10.245C18.9655 10.245 19.749 11.0285 19.749 11.995V12.005C19.749 12.9715 18.9655 13.755 17.999 13.755C17.0325 13.755 16.249 12.9715 16.249 12.005V11.995C16.249 11.0285 17.0325 10.245 17.999 10.245ZM13.749 11.995C13.749 11.0285 12.9655 10.245 11.999 10.245C11.0325 10.245 10.249 11.0285 10.249 11.995V12.005C10.249 12.9715 11.0325 13.755 11.999 13.755C12.9655 13.755 13.749 12.9715 13.749 12.005V11.995Z" fill="currentColor" />
                                                    </svg>
                                                </button>
                                            </x-slot>
        
                                            <x-slot name="content">
                                                <a href="#" class="flex w-full px-3 py-2 font-medium text-start text-gray-500 rounded-lg text-theme-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300" role="menuitem">
                                                    View More
                                                </a>
                                                <a href="#" class="flex w-full px-3 py-2 font-medium text-start text-gray-500 rounded-lg text-theme-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300" role="menuitem">
                                                    Delete
                                                </a>
                                            </x-slot>
                                        </x-common.table-dropdown>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 dark:border-white/[0.05]">
            <div class="flex items-center justify-between">
                <button @click="prevPage" :disabled="currentPage === 1" :class="currentPage === 1 ? 'opacity-50 cursor-not-allowed' : ''" class="flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-3 py-3 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:px-3.5">
                    <svg class="rtl:rotate-180" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.58301 9.99868C2.58272 10.1909 2.65588 10.3833 2.80249 10.53L7.79915 15.5301C8.09194 15.8231 8.56682 15.8233 8.85981 15.5305C9.15281 15.2377 9.15297 14.7629 8.86018 14.4699L5.14009 10.7472L16.6675 10.7472C17.0817 10.7472 17.4175 10.4114 17.4175 9.99715C17.4175 9.58294 17.0817 9.24715 16.6675 9.24715L5.14554 9.24715L8.86017 5.53016C9.15297 5.23717 9.15282 4.7623 8.85983 4.4695C8.56684 4.1767 8.09197 4.17685 7.79917 4.46984L2.84167 9.43049C2.68321 9.568 2.58301 9.77087 2.58301 9.99715C2.58301 9.99766 2.58301 9.99817 2.58301 9.99868Z" fill="currentColor"/>
                    </svg>
                    <span class="hidden sm:inline">Previous</span>
                </button>

                <span class="block text-sm font-medium text-gray-700 dark:text-gray-400 sm:hidden">
                    Page <span x-text="currentPage"></span> of <span x-text="totalPages"></span>
                </span>

                <ul class="hidden items-center gap-0.5 sm:flex">
                    <template x-for="page in displayedPages" :key="page">
                        <li>
                            <button x-show="page !== '...'" @click="goToPage(page)" :class="currentPage === page ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-blue-500/[0.08] hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-500'" class="flex h-10 w-10 items-center justify-center rounded-lg text-theme-sm font-medium" x-text="page"></button>
                            <span x-show="page === '...'" class="flex h-10 w-10 items-center justify-center text-gray-500">...</span>
                        </li>
                    </template>
                </ul>

                <button @click="nextPage" :disabled="currentPage === totalPages" :class="currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : ''" class="flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-3 py-3 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:px-3.5">
                    <span class="hidden sm:inline">Next</span>
                    <svg class="rtl:rotate-180" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.4175 9.9986C17.4178 10.1909 17.3446 10.3832 17.198 10.53L12.2013 15.5301C11.9085 15.8231 11.4337 15.8233 11.1407 15.5305C10.8477 15.2377 10.8475 14.7629 11.1403 14.4699L14.8604 10.7472L3.33301 10.7472C2.91879 10.7472 2.58301 10.4114 2.58301 9.99715C2.58301 9.58294 2.91879 9.24715 3.33301 9.24715L14.8549 9.24715L11.1403 5.53016C10.8475 5.23717 10.8477 4.7623 11.1407 4.4695C11.4336 4.1767 11.9085 4.17685 12.2013 4.46984L17.1588 9.43049C17.3173 9.568 17.4175 9.77087 17.4175 9.99715C17.4175 9.99763 17.4175 9.99812 17.4175 9.9986Z" fill="currentColor"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
```

## File: `resources/views/components/tables/basic-tables/basic-tables-two.blade.php`

```blade
<div x-data="{
    tableRowData: [
        {
            id: 'DE124321',
            checked: false,
            customerName: 'John Doe',
            customerEmail: 'johndoe@gmail.com',
            initials: 'JD',
            avatarBg: 'bg-blue-100',
            avatarColor: 'text-blue-500',
            product: 'Software License',
            value: '$18,50.34',
            closeDate: '2024-06-15',
            status: 'Complete',
        },
        {
            id: 'DE124322',
            checked: false,
            customerName: 'Kierra Franci',
            customerEmail: 'kierra@gmail.com',
            initials: 'KF',
            avatarBg: 'bg-[#fdf2fa]',
            avatarColor: 'text-[#dd2590]',
            product: 'Software License',
            value: '$18,50.34',
            closeDate: '2024-06-15',
            status: 'Complete',
        },
        {
            id: 'DE124323',
            checked: false,
            customerName: 'Emerson Workman',
            customerEmail: 'emerson@gmail.com',
            initials: 'EW',
            avatarBg: 'bg-[#f0f9ff]',
            avatarColor: 'text-[#0086c9]',
            product: 'Software License',
            value: '$18,50.34',
            closeDate: '2024-06-15',
            status: 'Pending',
        },
        {
            id: 'DE124324',
            checked: false,
            customerName: 'Chance Philips',
            customerEmail: 'chance@gmail.com',
            initials: 'CP',
            avatarBg: 'bg-[#fff6ed]',
            avatarColor: 'text-[#ec4a0a]',
            product: 'Software License',
            value: '$18,50.34',
            closeDate: '2024-06-15',
            status: 'Complete',
        },
        {
            id: 'DE124325',
            checked: false,
            customerName: 'Terry Geidt',
            customerEmail: 'terry@gmail.com',
            initials: 'TG',
            avatarBg: 'bg-green-50',
            avatarColor: 'text-green-600',
            product: 'Software License',
            value: '$18,50.34',
            closeDate: '2024-06-15',
            status: 'Complete',
        },
    ],
    selectedRows: [],
    selectAll: false,
    handleSelectAll() {
        this.selectAll = !this.selectAll;
        if (this.selectAll) {
            this.selectedRows = this.tableRowData.map(row => row.id);
        } else {
            this.selectedRows = [];
        }
    },
    handleRowSelect(id) {
        if (this.selectedRows.includes(id)) {
            this.selectedRows = this.selectedRows.filter(rowId => rowId !== id);
        } else {
            this.selectedRows.push(id);
        }
    },
    getStatusClass(status) {
        const classes = {
            'Complete': 'bg-green-50 text-green-700 dark:bg-green-500/15 dark:text-green-500',
            'Pending': 'bg-yellow-50 text-yellow-700 dark:bg-yellow-500/15 dark:text-yellow-400',
            'Cancel': 'bg-red-50 text-red-700 dark:bg-red-500/15 dark:text-red-500',
        };
        return classes[status] || '';
    },
    deleteRow(id) {
        if (confirm('Are you sure you want to delete this order?')) {
            this.tableRowData = this.tableRowData.filter(row => row.id !== id);
            this.selectedRows = this.selectedRows.filter(rowId => rowId !== id);
        }
    }
}">
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-white/[0.05] dark:bg-white/[0.03]">
        <!-- Header -->
        <div class="flex flex-col gap-4 px-6 mb-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                    Recent Orders
                </h3>
            </div>
            <div class="flex items-center gap-3">
                <button class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                    <svg class="stroke-current fill-white dark:fill-gray-800" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.29004 5.90393H17.7067" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.7075 14.0961H2.29085" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.0826 3.33331C13.5024 3.33331 14.6534 4.48431 14.6534 5.90414C14.6534 7.32398 13.5024 8.47498 12.0826 8.47498C10.6627 8.47498 9.51172 7.32398 9.51172 5.90415C9.51172 4.48432 10.6627 3.33331 12.0826 3.33331Z" fill="" stroke="" stroke-width="1.5"/>
                        <path d="M7.91745 11.525C6.49762 11.525 5.34662 12.676 5.34662 14.0959C5.34661 15.5157 6.49762 16.6667 7.91745 16.6667C9.33728 16.6667 10.4883 15.5157 10.4883 14.0959C10.4883 12.676 9.33728 11.525 7.91745 11.525Z" fill="" stroke="" stroke-width="1.5"/>
                    </svg>
                    Filter
                </button>
                <button class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                    See all
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="max-w-full overflow-x-auto">
            <table class="w-full">
                <thead class="px-6 py-3.5 border-t border-gray-100 border-y bg-gray-50 dark:border-white/[0.05] dark:bg-gray-900">
                    <tr>
                        <th class="px-6 py-3 font-medium text-gray-500 sm:px-6 text-theme-xs dark:text-gray-400 text-start">
                            <div class="flex items-center gap-3">
                                <div @click="handleSelectAll()"
                                    class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px]"
                                    :class="selectAll ? 'border-blue-500 dark:border-blue-500 bg-blue-500' : 'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700'">
                                    <svg :class="selectAll ? 'block' : 'hidden'" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Deal ID</span>
                            </div>
                        </th>
                        <th class="px-6 py-3 font-medium text-gray-500 sm:px-6 text-theme-xs dark:text-gray-400 text-start">Customer</th>
                        <th class="px-6 py-3 font-medium text-gray-500 sm:px-6 text-theme-xs dark:text-gray-400 text-start">Product/Service</th>
                        <th class="px-6 py-3 font-medium text-gray-500 sm:px-6 text-theme-xs dark:text-gray-400 text-start">Deal Value</th>
                        <th class="px-6 py-3 font-medium text-gray-500 sm:px-6 text-theme-xs dark:text-gray-400 text-start">Close Date</th>
                        <th class="px-6 py-3 font-medium text-gray-500 sm:px-6 text-theme-xs dark:text-gray-400 text-start">Status</th>
                        <th class="px-6 py-3 font-medium text-gray-500 sm:px-6 text-theme-xs dark:text-gray-400 text-start">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="row in tableRowData" :key="row.id">
                        <tr class="border-b border-gray-100 dark:border-white/[0.05]">
                            <td class="px-4 sm:px-6 py-3.5">
                                <div class="flex items-center gap-3">
                                    <div @click="handleRowSelect(row.id)"
                                        class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px]"
                                        :class="selectedRows.includes(row.id) ? 'border-blue-500 dark:border-blue-500 bg-blue-500' : 'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700'">
                                        <svg :class="selectedRows.includes(row.id) ? 'block' : 'hidden'" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400" x-text="row.id"></span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 sm:px-6 py-3.5">
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center justify-center w-10 h-10 rounded-full font-medium text-sm"
                                        :class="[row.avatarBg, row.avatarColor]">
                                        <span x-text="row.initials"></span>
                                    </div>
                                    <div>
                                        <span class="mb-0.5 block text-theme-sm font-medium text-gray-700 dark:text-gray-400" x-text="row.customerName"></span>
                                        <span class="text-gray-500 text-theme-sm dark:text-gray-400" x-text="row.customerEmail"></span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 sm:px-6 py-3.5">
                                <p class="text-gray-700 text-theme-sm dark:text-gray-400" x-text="row.product"></p>
                            </td>
                            <td class="px-4 sm:px-6 py-3.5">
                                <p class="text-gray-700 text-theme-sm dark:text-gray-400" x-text="row.value"></p>
                            </td>
                            <td class="px-4 sm:px-6 py-3.5">
                                <p class="text-gray-700 text-theme-sm dark:text-gray-400" x-text="row.closeDate"></p>
                            </td>
                            <td class="px-4 sm:px-6 py-3.5">
                                <span class="text-theme-xs inline-block rounded-full px-2 py-0.5 font-medium" 
                                    :class="getStatusClass(row.status)" 
                                    x-text="row.status"></span>
                            </td>
                            <td class="px-4 sm:px-6 py-3.5">
                                <button @click="deleteRow(row.id)">
                                    <svg class="text-gray-700 cursor-pointer size-5 hover:text-red-500 dark:text-gray-400 dark:hover:text-red-500" 
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</div>
```

## File: `resources/views/components/ui/alert.blade.php`

```blade
{{-- resources/views/components/alert.blade.php --}}

@props([
    'variant' => 'info',
    'title' => '',
    'message' => '',
    'showLink' => false,
    'linkHref' => '#',
    'linkText' => 'Learn more'
])

@php
    $variantClasses = [
        'success' => [
            'container' => 'border-green-500 bg-green-50 dark:border-green-500/30 dark:bg-green-500/15',
            'icon' => 'text-green-500',
        ],
        'error' => [
            'container' => 'border-red-500 bg-red-50 dark:border-red-500/30 dark:bg-red-500/15',
            'icon' => 'text-red-500',
        ],
        'warning' => [
            'container' => 'border-yellow-500 bg-yellow-50 dark:border-yellow-500/30 dark:bg-yellow-500/15',
            'icon' => 'text-yellow-500',
        ],
        'info' => [
            'container' => 'border-blue-500 bg-blue-50 dark:border-blue-500/30 dark:bg-blue-500/15',
            'icon' => 'text-blue-500',
        ],
    ];

    $icons = [
        'success' => '<svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.70186 12.0001C3.70186 7.41711 7.41711 3.70186 12.0001 3.70186C16.5831 3.70186 20.2984 7.41711 20.2984 12.0001C20.2984 16.5831 16.5831 20.2984 12.0001 20.2984C7.41711 20.2984 3.70186 16.5831 3.70186 12.0001ZM12.0001 1.90186C6.423 1.90186 1.90186 6.423 1.90186 12.0001C1.90186 17.5772 6.423 22.0984 12.0001 22.0984C17.5772 22.0984 22.0984 17.5772 22.0984 12.0001C22.0984 6.423 17.5772 1.90186 12.0001 1.90186ZM15.6197 10.7395C15.9712 10.388 15.9712 9.81819 15.6197 9.46672C15.2683 9.11525 14.6984 9.11525 14.347 9.46672L11.1894 12.6243L9.6533 11.0883C9.30183 10.7368 8.73198 10.7368 8.38051 11.0883C8.02904 11.4397 8.02904 12.0096 8.38051 12.3611L10.553 14.5335C10.7217 14.7023 10.9507 14.7971 11.1894 14.7971C11.428 14.7971 11.657 14.7023 11.8257 14.5335L15.6197 10.7395Z" fill=""></path>
      </svg>',
        'error' => '<svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.6501 12.0001C3.6501 7.38852 7.38852 3.6501 12.0001 3.6501C16.6117 3.6501 20.3501 7.38852 20.3501 12.0001C20.3501 16.6117 16.6117 20.3501 12.0001 20.3501C7.38852 20.3501 3.6501 16.6117 3.6501 12.0001ZM12.0001 1.8501C6.39441 1.8501 1.8501 6.39441 1.8501 12.0001C1.8501 17.6058 6.39441 22.1501 12.0001 22.1501C17.6058 22.1501 22.1501 17.6058 22.1501 12.0001C22.1501 6.39441 17.6058 1.8501 12.0001 1.8501ZM10.9992 7.52517C10.9992 8.07746 11.4469 8.52517 11.9992 8.52517H12.0002C12.5525 8.52517 13.0002 8.07746 13.0002 7.52517C13.0002 6.97289 12.5525 6.52517 12.0002 6.52517H11.9992C11.4469 6.52517 10.9992 6.97289 10.9992 7.52517ZM12.0002 17.3715C11.586 17.3715 11.2502 17.0357 11.2502 16.6215V10.945C11.2502 10.5308 11.586 10.195 12.0002 10.195C12.4144 10.195 12.7502 10.5308 12.7502 10.945V16.6215C12.7502 17.0357 12.4144 17.3715 12.0002 17.3715Z" fill=""></path>
      </svg>',
        'warning' => '<svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.3499 12.0004C20.3499 16.612 16.6115 20.3504 11.9999 20.3504C7.38832 20.3504 3.6499 16.612 3.6499 12.0004C3.6499 7.38881 7.38833 3.65039 11.9999 3.65039C16.6115 3.65039 20.3499 7.38881 20.3499 12.0004ZM11.9999 22.1504C17.6056 22.1504 22.1499 17.6061 22.1499 12.0004C22.1499 6.3947 17.6056 1.85039 11.9999 1.85039C6.39421 1.85039 1.8499 6.3947 1.8499 12.0004C1.8499 17.6061 6.39421 22.1504 11.9999 22.1504ZM13.0008 16.4753C13.0008 15.923 12.5531 15.4753 12.0008 15.4753L11.9998 15.4753C11.4475 15.4753 10.9998 15.923 10.9998 16.4753C10.9998 17.0276 11.4475 17.4753 11.9998 17.4753L12.0008 17.4753C12.5531 17.4753 13.0008 17.0276 13.0008 16.4753ZM11.9998 6.62898C12.414 6.62898 12.7498 6.96476 12.7498 7.37898L12.7498 13.0555C12.7498 13.4697 12.414 13.8055 11.9998 13.8055C11.5856 13.8055 11.2498 13.4697 11.2498 13.0555L11.2498 7.37898C11.2498 6.96476 11.5856 6.62898 11.9998 6.62898Z" fill="#F04438"></path>
      </svg>',
        'info' => '<svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.6501 11.9996C3.6501 7.38803 7.38852 3.64961 12.0001 3.64961C16.6117 3.64961 20.3501 7.38803 20.3501 11.9996C20.3501 16.6112 16.6117 20.3496 12.0001 20.3496C7.38852 20.3496 3.6501 16.6112 3.6501 11.9996ZM12.0001 1.84961C6.39441 1.84961 1.8501 6.39392 1.8501 11.9996C1.8501 17.6053 6.39441 22.1496 12.0001 22.1496C17.6058 22.1496 22.1501 17.6053 22.1501 11.9996C22.1501 6.39392 17.6058 1.84961 12.0001 1.84961ZM10.9992 7.52468C10.9992 8.07697 11.4469 8.52468 11.9992 8.52468H12.0002C12.5525 8.52468 13.0002 8.07697 13.0002 7.52468C13.0002 6.9724 12.5525 6.52468 12.0002 6.52468H11.9992C11.4469 6.52468 10.9992 6.9724 10.9992 7.52468ZM12.0002 17.371C11.586 17.371 11.2502 17.0352 11.2502 16.621V10.9445C11.2502 10.5303 11.586 10.1945 12.0002 10.1945C12.4144 10.1945 12.7502 10.5303 12.7502 10.9445V16.621C12.7502 17.0352 12.4144 17.371 12.0002 17.371Z" fill=""></path>
      </svg>',
    ];

    $containerClass = $variantClasses[$variant]['container'] ?? $variantClasses['info']['container'];
    $iconClass = $variantClasses[$variant]['icon'] ?? $variantClasses['info']['icon'];
    $icon = $icons[$variant] ?? $icons['info'];
@endphp

<div class="rounded-xl border p-4 {{ $containerClass }}">
    <div class="flex items-start gap-3">
        <div class="-mt-0.5 {{ $iconClass }}">
            {!! $icon !!}
        </div>

        <div class="flex-1">
            @if($title)
                <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                    {{ $title }}
                </h4>
            @endif

            @if($message)
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $message }}</p>
            @endif

            @if($showLink)
                <a 
                    href="{{ $linkHref }}" 
                    class="inline-block mt-3 text-sm font-medium text-gray-500 underline dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300"
                >
                    {{ $linkText }}
                </a>
            @endif

            {{-- Slot for custom content --}}
            {{ $slot }}
        </div>
    </div>
</div>
```

## File: `resources/views/components/ui/avatar.blade.php`

```blade

@props([
    'src' => '',
    'alt' => 'User Avatar',
    'size' => 'medium',
    'status' => 'none',
])

@php
    $sizeClasses = [
        'xsmall' => 'h-6 w-6 max-w-6',
        'small' => 'h-8 w-8 max-w-8',
        'medium' => 'h-10 w-10 max-w-10',
        'large' => 'h-12 w-12 max-w-12',
        'xlarge' => 'h-14 w-14 max-w-14',
        'xxlarge' => 'h-16 w-16 max-w-16',
    ];

    $statusSizeClasses = [
        'xsmall' => 'h-1.5 w-1.5 max-w-1.5',
        'small' => 'h-2 w-2 max-w-2',
        'medium' => 'h-2.5 w-2.5 max-w-2.5',
        'large' => 'h-3 w-3 max-w-3',
        'xlarge' => 'h-3.5 w-3.5 max-w-3.5',
        'xxlarge' => 'h-4 w-4 max-w-4',
    ];

    $statusColorClasses = [
        'online' => 'bg-green-500',
        'offline' => 'bg-red-400',
        'busy' => 'bg-yellow-500',
    ];

    $sizeClass = $sizeClasses[$size] ?? $sizeClasses['medium'];
    $statusSizeClass = $statusSizeClasses[$size] ?? $statusSizeClasses['medium'];
    $statusColorClass = $statusColorClasses[$status] ?? '';
@endphp

<div class="relative rounded-full {{ $sizeClass }}">
    <img 
        src="{{ $src }}" 
        alt="{{ $alt }}" 
        class="h-full w-full object-cover rounded-full"
    />
    
    @if($status !== 'none')
        <span class="absolute bottom-0 right-0 rounded-full border-[1.5px] border-white dark:border-gray-900 {{ $statusSizeClass }} {{ $statusColorClass }}"></span>
    @endif
</div>
```

## File: `resources/views/components/ui/badge.blade.php`

```blade

@props([
    'variant' => 'light',
    'size' => 'md',
    'color' => 'primary',
    'startIcon' => null,
    'endIcon' => null,
])

@php
    $baseStyles = 'inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium capitalize';

    $sizeStyles = [
        'sm' => 'text-xs',
        'md' => 'text-sm',
    ];

    $variants = [
        'light' => [
            'primary' => 'bg-blue-50 text-blue-500 dark:bg-blue-500/15 dark:text-blue-400',
            'success' => 'bg-green-50 text-green-600 dark:bg-green-500/15 dark:text-green-500',
            'error' => 'bg-red-50 text-red-600 dark:bg-red-500/15 dark:text-red-500',
            'warning' => 'bg-yellow-50 text-yellow-600 dark:bg-yellow-500/15 dark:text-orange-400',
            'info' => 'bg-sky-50 text-sky-500 dark:bg-sky-500/15 dark:text-sky-500',
            'light' => 'bg-gray-100 text-gray-700 dark:bg-white/5 dark:text-white/80',
            'dark' => 'bg-gray-500 text-white dark:bg-white/5 dark:text-white',
        ],
        'solid' => [
            'primary' => 'bg-blue-500 text-white dark:text-white',
            'success' => 'bg-green-500 text-white dark:text-white',
            'error' => 'bg-red-500 text-white dark:text-white',
            'warning' => 'bg-yellow-500 text-white dark:text-white',
            'info' => 'bg-sky-500 text-white dark:text-white',
            'light' => 'bg-gray-400 dark:bg-white/5 text-white dark:text-white/80',
            'dark' => 'bg-gray-700 text-white dark:text-white',
        ],
    ];

    $sizeClass = $sizeStyles[$size] ?? $sizeStyles['md'];
    $colorStyles = $variants[$variant][$color] ?? $variants['light']['primary'];
@endphp

<span class="{{ $baseStyles }} {{ $sizeClass }} {{ $colorStyles }}" {{ $attributes }}>
    @if($startIcon)
        {!! $startIcon !!}
    @endif

    {{ $slot }}

    @if($endIcon)
        {!! $endIcon !!}
    @endif
</span>
```

## File: `resources/views/components/ui/button.blade.php`

```blade
@props([
    'size' => 'md',          
    'variant' => 'primary',
    'startIcon' => null,
    'endIcon' => null,
    'className' => '',
    'disabled' => false,
])

@php
    // Base classes
    $base = 'inline-flex items-center justify-center font-medium gap-2 rounded-lg transition';

    // Size map
    $sizeMap = [
        'sm' => 'px-4 py-3 text-sm',
        'md' => 'px-5 py-3.5 text-sm',
    ];
    $sizeClass = $sizeMap[$size] ?? $sizeMap['md'];

    // Variant map
    $variantMap = [
        'primary' => 'bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300',
        'outline' => 'bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03] dark:hover:text-gray-300',
    ];
    $variantClass = $variantMap[$variant] ?? $variantMap['primary'];

    // disabled classes
    $disabledClass = $disabled ? 'cursor-not-allowed opacity-50' : '';

    // final classes (merge user className too)
    $classes = trim("{$base} {$sizeClass} {$variantClass} {$className} {$disabledClass}");
@endphp

<button
    {{ $attributes->merge(['class' => $classes, 'type' => $attributes->get('type', 'button')]) }}
    @if($disabled) disabled @endif
>
    {{-- start icon: priority — named slot 'startIcon' first, then startIcon prop if it's a HtmlString --}}
    @if (isset($__env) && $slot->isEmpty() === false) @endif

    @hasSection('startIcon')
        <span class="flex items-center">
            @yield('startIcon')
        </span>
    @elseif($startIcon)
        <span class="flex items-center">{!! $startIcon !!}</span>
    @endif

    {{-- main slot --}}
    {{ $slot }}

    {{-- end icon: named slot 'endIcon' first, then endIcon prop --}}
    @hasSection('endIcon')
        <span class="flex items-center">
            @yield('endIcon')
        </span>
    @elseif($endIcon)
        <span class="flex items-center">{!! $endIcon !!}</span>
    @endif
</button>
```

## File: `resources/views/components/ui/modal.blade.php`

```blade
@props([
    'isOpen' => false,
    'showCloseButton' => true,
])

<div x-data="{
    open: @js($isOpen),
    init() {
        this.$watch('open', value => {
            if (value) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'unset';
            }
        });
    }
}" x-show="open" x-cloak @keydown.escape.window="open = false"
    class="modal fixed inset-0 z-99999 flex items-center justify-center overflow-y-auto p-5"
    {{ $attributes->except('class') }}>

    <!-- Backdrop -->
    <div @click="open = false" class="fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    </div>

    <!-- Modal Content -->
    <div @click.stop class="relative w-full rounded-3xl bg-white dark:bg-gray-900 {{ $attributes->get('class') }}"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95">

        <!-- Close Button -->
        @if ($showCloseButton)
            <button @click="open = false"
                class="absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:right-6 sm:top-6 sm:h-11 sm:w-11">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fillRule="evenodd" clipRule="evenodd"
                        d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z"
                        fill="currentColor" />
                </svg>
            </button>
        @endif

        <!-- Modal Body -->
        <div>
            {{ $slot }}
        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none;
    }
</style>
```

## File: `resources/views/components/ui/youtube-embed.blade.php`

```blade

@props([
    'videoId' => '',
    'aspectRatio' => '16:9',
    'title' => 'YouTube video',
    'className' => ''
])

@php
    $aspectRatioClasses = [
        '16:9' => 'aspect-video',
        '4:3' => 'aspect-4/3',
        '21:9' => 'aspect-21/9',
        '1:1' => 'aspect-square',
    ];
    
    $aspectRatioClass = $aspectRatioClasses[$aspectRatio] ?? $aspectRatioClasses['16:9'];
@endphp

<div class="overflow-hidden rounded-lg {{ $aspectRatioClass }} {{ $className }}">
    <iframe
        src="https://www.youtube.com/embed/{{ $videoId }}"
        title="{{ $title }}"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
        class="w-full h-full"
    ></iframe>
</div>
```

## File: `resources/views/incidents/create.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Lapor Kendala (Incident)"/>

    {{-- Preload peta lokasi aset sekali saja; hindari fetch API setiap ganti pilihan --}}
    <script>
        const ASSET_LOKASI = @json($assets->pluck('lokasi', 'id'));
    </script>

    <div class="mx-auto w-full max-w-3xl">
        <div class="rounded-2xl border border-gray-200 bg-white px-5 py-7 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12">

            @if ($errors->any())
                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
                    <p class="mb-1 font-medium">Perbaiki kesalahan berikut:</p>
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('incidents.store') }}" method="POST" enctype="multipart/form-data"
                  x-data="incidentForm()" @submit="submitting = true">
                @csrf

                <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">Nama Pelapor</label>
                        <input type="text" value="{{ auth()->user()->nama }} ({{ auth()->user()->nip }})" readonly
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none transition disabled:cursor-default dark:border-gray-800 dark:bg-gray-900 dark:text-white dark:disabled:bg-black">
                    </div>
                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">Tanggal Pelaporan</label>
                        <input type="text" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" readonly
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none transition disabled:cursor-default dark:border-gray-800 dark:bg-gray-900 dark:text-white dark:disabled:bg-black">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Pilih Aset / Barang <span class="text-red-500">*</span>
                    </label>
                    <select id="asset_select" name="asset_id" x-ref="assetSelect" required
                            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary active:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        <option value="">-- Cari Kode Barang, NUP, atau Nama --</option>
                        @foreach ($assets as $asset)
                            <option value="{{ $asset->id }}" @selected(old('asset_id') == $asset->id)>
                                {{ $asset->kode_barang }} - {{ $asset->nama_barang }} (NUP: {{ $asset->nup }})
                            </option>
                        @endforeach
                    </select>
                    @error('asset_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">Lokasi Aset</label>
                    <input type="text" x-model="lokasi" readonly placeholder="Terisi otomatis saat aset dipilih"
                           class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black outline-none transition disabled:cursor-default dark:border-gray-800 dark:bg-gray-900 dark:text-white dark:disabled:bg-black">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Lokasi diambil dari data aset; tidak perlu diisi manual.</p>
                </div>

                <div class="mt-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Deskripsi Masalah <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi_masalah" rows="4" required
                              class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary active:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white"
                              placeholder="Jelaskan kendala yang dialami...">{{ old('deskripsi_masalah') }}</textarea>
                    @error('deskripsi_masalah')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Foto Kendala <span class="text-xs text-gray-500">(Opsional, Max 2MB)</span>
                    </label>
                    <input type="file" name="foto_kendala" accept="image/jpeg,image/png,image/jpg"
                           class="w-full rounded-lg border border-stroke bg-transparent py-3 px-4 text-black outline-none transition file:mr-4 file:rounded file:border-0 file:bg-[#E2E8F0] file:px-4 file:py-2 file:text-sm file:font-medium file:text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white dark:file:bg-gray-700 dark:file:text-white">
                    @error('foto_kendala')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-8 flex justify-end gap-3">
                    <a href="{{ route('incidents.index') }}"
                       class="inline-flex items-center rounded-md border border-gray-300 px-6 py-3 text-xs font-semibold uppercase tracking-widest text-gray-700 transition hover:bg-gray-100 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                        Batal
                    </a>
                    <button type="submit" :disabled="submitting"
                            class="inline-flex items-center px-5 py-2.5 bg-[#10B981] rounded-lg font-medium text-white text-sm hover:bg-green-700 transition focus:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-60">
                        <span x-show="!submitting">Tambah Laporan</span>
                        <span x-cloak x-show="submitting">Menyimpan...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function incidentForm() {
            return {
                lokasi: '',
                submitting: false,
                init() {
                    const select = this.$refs.assetSelect;
                    if (typeof TomSelect === 'undefined' || !select) return;

                    // Retensi lokasi jika form gagal validasi dan asset_id lama terpilih kembali
                    if (select.value) {
                        this.lokasi = ASSET_LOKASI[select.value] ?? '';
                    }

                    new TomSelect(select, {
                        create: false,
                        sortField: { field: 'text', direction: 'asc' },
                        placeholder: 'Ketik untuk mencari aset...',
                        maxOptions: 200,
                        onChange: (value) => {
                            this.lokasi = value ? (ASSET_LOKASI[value] ?? 'Lokasi tidak diketahui') : '';
                        },
                    });
                },
            };
        }
    </script>
@endsection
@push('scripts')
<script>
    // Safety net non-Alpine: jika JS Alpine error, submit tetap diberi feedback & cegah klik ganda.
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form[action*="incidents"]');
        if (!form) return;
        form.addEventListener('submit', function () {
            setTimeout(() => {
                const btn = form.querySelector('button[type="submit"]');
                if (btn) { btn.disabled = true; btn.classList.add('opacity-60', 'cursor-not-allowed'); }
            }, 50);
        });
    });
</script>
@endpush
```

## File: `resources/views/incidents/index.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Daftar Aduan Saya" />

    <div class="mb-6 flex justify-end">
        <a href="{{ route('incidents.create') }}"
            class="inline-flex items-center px-5 py-2.5 bg-[#10B981] rounded-lg font-medium text-white text-sm hover:bg-green-700 transition">
            + Lapor Kendala Baru
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700 dark:border-green-800/40 dark:bg-green-800/15 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
            {{ session('error') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-gray-200 dark:border-gray-800 text-sm text-gray-500 dark:text-gray-400">
                    <th class="px-5 py-4 font-medium">Nomor Aduan</th>
                    <th class="px-5 py-4 font-medium">Aset</th>
                    <th class="px-5 py-4 font-medium">Tanggal</th>
                    <th class="px-5 py-4 font-medium">Deskripsi</th>
                    <th class="px-5 py-4 font-medium">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tickets as $ticket)
                    <tr class="border-b border-gray-100 last:border-0 dark:border-gray-800 text-sm">
                        <td class="px-5 py-4 font-medium text-gray-800 dark:text-white/90">{{ $ticket->nomor_aduan ?? $ticket->ticket_number }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $ticket->asset?->nama_barang ?? '-' }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $ticket->tgl_pelaporan?->format('d/m/Y') ?? '-' }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400 max-w-xs truncate">{{ $ticket->deskripsi_masalah ?? $ticket->description }}</td>
                        <td class="px-5 py-4">
                            <span class="inline-block rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700 dark:bg-gray-800 dark:text-gray-400">
                                {{ $ticket->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-5 py-10 text-center text-sm text-gray-500 dark:text-gray-400">
                            Belum ada aduan. Klik "Lapor Kendala Baru" untuk membuat laporan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
```

## File: `resources/views/incidents/show.blade.php`

```blade
@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-5xl">
    {{-- Header & Breadcrumb --}}
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-semibold text-black dark:text-white">
            Detail Aduan: {{ $ticket->nomor_aduan }}
        </h2>
        <a href="{{ route('incidents.index') }}" class="text-primary hover:underline text-sm">&larr; Kembali ke Daftar</a>
    </div>

    @if (session('success'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700 dark:border-green-800/40 dark:bg-green-800/15 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        {{-- KOLOM KIRI: Info Tiket & Aset --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="rounded-2xl border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03] p-6">
                <h3 class="mb-4 text-lg font-medium text-black dark:text-white">Informasi Kendala</h3>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div><span class="font-medium text-gray-500">Pelapor:</span> <br> {{ $ticket->pelapor->nama }} ({{ $ticket->pelapor->bidang->nama_bidang ?? '-' }})</div>
                    <div><span class="font-medium text-gray-500">Tanggal Lapor:</span> <br> {{ $ticket->tgl_pelaporan->format('d M Y') }}</div>
                    <div class="col-span-2">
                        <span class="font-medium text-gray-500">Aset Bermasalah:</span> <br> 
                        {{ $ticket->asset->nama_barang }} <span class="text-xs text-gray-400">({{ $ticket->asset->kode_barang }} / NUP: {{ $ticket->asset->nup }})</span>
                        <br> <span class="text-xs">Lokasi: {{ $ticket->asset->lokasi }}</span>
                    </div>
                    <div class="col-span-2">
                        <span class="font-medium text-gray-500">Deskripsi Masalah:</span> <br> 
                        <p class="text-gray-800 dark:text-gray-200 whitespace-pre-line">{{ $ticket->deskripsi_masalah }}</p>
                    </div>
                    @if($ticket->foto_kendala)
                    <div class="col-span-2">
                        <span class="font-medium text-gray-500">Foto Kendala:</span> <br>
                        <img src="{{ asset('storage/' . $ticket->foto_kendala) }}" alt="Foto Kendala" class="mt-2 max-h-64 rounded border border-stroke">
                    </div>
                    @endif
                </div>
            </div>

            {{-- FORM PROSES TEKNISI (Hanya muncul untuk Teknisi/Admin dan tiket belum selesai) --}}
            @if((auth()->user()->isTeknisi() || auth()->user()->isAdmin()) && !in_array($ticket->status, ['Selesai', 'Ditolak']))
            <div class="rounded-2xl border border-primary bg-white shadow-default dark:border-primary dark:bg-white/[0.03] p-6">
                <h3 class="mb-4 text-lg font-medium text-primary">Form Proses & Tindak Lanjut</h3>
                
                <form action="{{ route('incidents.update', $ticket) }}" method="POST" enctype="multipart/form-data" 
                      x-data="{ jenis: '{{ old('jenis_penyelesaian', $ticket->resolution?->jenis_penyelesaian ?? 'Internal') }}', status: '{{ old('status', $ticket->status) }}' }">
                    @csrf
                    @method('PUT')

                    <div class="mb-4 grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-black dark:text-white">Update Status</label>
                            <select name="status" x-model="status" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:bg-gray-900 dark:text-white">
                                <option value="Sedang diproses">Sedang diproses</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-black dark:text-white">Jenis Penyelesaian</label>
                            <select name="jenis_penyelesaian" x-model="jenis" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:bg-gray-900 dark:text-white">
                                <option value="Internal">Internal IT</option>
                                <option value="Pihak ke-3">Pihak ke-3 (Vendor)</option>
                            </select>
                        </div>
                    </div>

                    {{-- Conditional Fields: Pihak ke-3 --}}
                    <div x-show="jenis === 'Pihak ke-3'" x-transition class="mb-4 grid grid-cols-1 gap-4 md:grid-cols-2 p-4 bg-gray-50 dark:bg-black/20 rounded-lg border border-stroke">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-black dark:text-white">Nama Vendor</label>
                            <input type="text" name="vendor" value="{{ old('vendor', $ticket->resolution?->vendor) }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 dark:bg-gray-900">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-black dark:text-white">Estimasi Biaya (Rp)</label>
                            <input type="number" name="estimasi_biaya" value="{{ old('estimasi_biaya', $ticket->resolution?->estimasi_biaya) }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 dark:bg-gray-900">
                        </div>
                        <div class="md:col-span-2">
                            <label class="mb-2 block text-sm font-medium text-black dark:text-white">Surat Justifikasi (PDF/Doc)</label>
                            <input type="file" name="file_surat_justifikasi" class="w-full rounded-lg border-[1.5px] border-stroke py-2 px-4 dark:bg-gray-900">
                            @if($ticket->resolution?->file_surat_justifikasi)
                                <p class="text-xs text-green-600 mt-1">File saat ini: <a href="{{ asset('storage/'.$ticket->resolution->file_surat_justifikasi) }}" target="_blank" class="underline">Lihat File</a></p>
                            @endif
                        </div>
                    </div>

                    <div class="mb-4 grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium">Tgl Analisa</label>
                            <input type="date" name="tgl_analisa" value="{{ old('tgl_analisa', $ticket->resolution?->tgl_analisa?->format('Y-m-d') ?? date('Y-m-d')) }}" class="w-full rounded-lg border-[1.5px] border-stroke py-3 px-5 dark:bg-gray-900" required>
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium">Tgl Tindak Lanjut</label>
                            <input type="date" name="tgl_tindak_lanjut" value="{{ old('tgl_tindak_lanjut', $ticket->resolution?->tgl_tindak_lanjut?->format('Y-m-d') ?? date('Y-m-d')) }}" class="w-full rounded-lg border-[1.5px] border-stroke py-3 px-5 dark:bg-gray-900" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="mb-2 block text-sm font-medium">Analisa Teknis</label>
                        <textarea name="analisa_teknis" rows="3" class="w-full rounded-lg border-[1.5px] border-stroke py-3 px-5 dark:bg-gray-900" required>{{ old('analisa_teknis', $ticket->resolution?->analisa_teknis) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="mb-2 block text-sm font-medium">Tindak Lanjut Teknis</label>
                        <textarea name="tindak_lanjut_teknis" rows="3" class="w-full rounded-lg border-[1.5px] border-stroke py-3 px-5 dark:bg-gray-900" required>{{ old('tindak_lanjut_teknis', $ticket->resolution?->tindak_lanjut_teknis) }}</textarea>
                    </div>

                    {{-- Conditional Fields: Hasil (Muncul jika status = Selesai) --}}
                    <div x-show="status === 'Selesai'" x-transition class="mb-4 p-4 bg-green-50 dark:bg-green-900/10 rounded-lg border border-green-200 dark:border-green-800">
                        <div class="mb-4">
                            <label class="mb-2 block text-sm font-medium text-green-800 dark:text-green-300">Tanggal Selesai</label>
                            <input type="date" name="tgl_hasil" value="{{ old('tgl_hasil', $ticket->resolution?->tgl_hasil?->format('Y-m-d') ?? date('Y-m-d')) }}" class="w-full rounded-lg border-[1.5px] border-stroke py-3 px-5 dark:bg-gray-900">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-green-800 dark:text-green-300">Hasil Akhir / Kesimpulan</label>
                            <textarea name="hasil" rows="3" class="w-full rounded-lg border-[1.5px] border-stroke py-3 px-5 dark:bg-gray-900">{{ old('hasil', $ticket->resolution?->hasil) }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-primary py-3 px-8 text-center font-medium text-white hover:bg-opacity-90">
                            Simpan Tindak Lanjut
                        </button>
                    </div>
                </form>
            </div>
            @elseif($ticket->resolution && in_array($ticket->status, ['Selesai', 'Ditolak']))
            {{-- Tampilkan Resume Hasil jika tiket sudah selesai --}}
            <div class="rounded-2xl border border-green-500 bg-green-50 dark:bg-green-900/10 p-6">
                <h3 class="mb-4 text-lg font-medium text-green-800 dark:text-green-300">Resume Penyelesaian</h3>
                <p class="text-sm mb-2"><strong>Jenis:</strong> {{ $ticket->resolution->jenis_penyelesaian }} {{ $ticket->resolution->vendor ? '('.$ticket->resolution->vendor.')' : '' }}</p>
                <p class="text-sm mb-2"><strong>Hasil:</strong> {{ $ticket->resolution->hasil ?? '-' }}</p>
            </div>
            @endif
        </div>

        {{-- KOLOM KANAN: Timeline History --}}
        <div class="lg:col-span-1">
            <div class="rounded-2xl border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03] p-6 sticky top-4">
                <h3 class="mb-4 text-lg font-medium text-black dark:text-white">Riwayat Tiket</h3>
                <div class="relative border-l-2 border-gray-200 dark:border-gray-700 ml-3 space-y-6">
                    @foreach($ticket->histories as $history)
                    <div class="relative pl-6">
                        <span class="absolute -left-[9px] top-1 flex h-4 w-4 items-center justify-center rounded-full bg-primary ring-4 ring-white dark:ring-boxdark"></span>
                        <p class="text-sm font-semibold text-black dark:text-white">{{ ucfirst($history->status_label) }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">{{ $history->created_at->format('d M Y, H:i') }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $history->keterangan }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

## File: `resources/views/layouts/app-header.blade.php`

```blade
<header
    class="sticky top-0 flex w-full bg-white border-gray-200 z-99999 dark:border-gray-800 dark:bg-gray-900 xl:border-b"
    x-data="{
        isApplicationMenuOpen: false,
        toggleApplicationMenu() {
            this.isApplicationMenuOpen = !this.isApplicationMenuOpen;
        }
    }">
    <div class="flex flex-col items-center justify-between grow xl:flex-row xl:px-6">
        <div
            class="flex items-center justify-between w-full gap-2 px-3 py-3 border-b border-gray-200 dark:border-gray-800 sm:gap-4 xl:justify-normal xl:border-b-0 xl:px-0 lg:py-4">

            <!-- Desktop Sidebar Toggle Button (visible on xl and up) -->
            <button
                class="hidden xl:flex items-center justify-center w-10 h-10 text-gray-500 border border-gray-200 rounded-lg dark:border-gray-800 dark:text-gray-400 lg:h-11 lg:w-11"
                :class="{ 'bg-gray-100 dark:bg-white/[0.03]': !$store.sidebar.isExpanded }"
                @click="$store.sidebar.toggleExpanded()" aria-label="Toggle Sidebar">
                <svg x-show="!$store.sidebar.isMobileOpen" width="16" height="12" viewBox="0 0 16 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.583252 1C0.583252 0.585788 0.919038 0.25 1.33325 0.25H14.6666C15.0808 0.25 15.4166 0.585786 15.4166 1C15.4166 1.41421 15.0808 1.75 14.6666 1.75L1.33325 1.75C0.919038 1.75 0.583252 1.41422 0.583252 1ZM0.583252 11C0.583252 10.5858 0.919038 10.25 1.33325 10.25L14.6666 10.25C15.0808 10.25 15.4166 10.5858 15.4166 11C15.4166 11.4142 15.0808 11.75 14.6666 11.75L1.33325 11.75C0.919038 11.75 0.583252 11.4142 0.583252 11ZM1.33325 5.25C0.919038 5.25 0.583252 5.58579 0.583252 6C0.583252 6.41421 0.919038 6.75 1.33325 6.75L7.99992 6.75C8.41413 6.75 8.74992 6.41421 8.74992 6C8.74992 5.58579 8.41413 5.25 7.99992 5.25L1.33325 5.25Z"
                        fill="currentColor"></path>
                </svg>
                <svg x-show="$store.sidebar.isMobileOpen" class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.21967 7.28131C5.92678 6.98841 5.92678 6.51354 6.21967 6.22065C6.51256 5.92775 6.98744 5.92775 7.28033 6.22065L11.999 10.9393L16.7176 6.22078C17.0105 5.92789 17.4854 5.92788 17.7782 6.22078C18.0711 6.51367 18.0711 6.98855 17.7782 7.28144L13.0597 12L17.7782 16.7186C18.0711 17.0115 18.0711 17.4863 17.7782 17.7792C17.4854 18.0721 17.0105 18.0721 16.7176 17.7792L11.999 13.0607L7.28033 17.7794C6.98744 18.0722 6.51256 18.0722 6.21967 17.7794C5.92678 17.4865 5.92678 17.0116 6.21967 16.7187L10.9384 12L6.21967 7.28131Z"
                        fill="" />
                </svg>
            </button>

            <!-- Mobile Menu Toggle Button (visible below xl) -->
            <button
                class="flex xl:hidden items-center justify-center w-10 h-10 text-gray-500 rounded-lg dark:text-gray-400 lg:h-11 lg:w-11"
                :class="{ 'bg-gray-100 dark:bg-white/[0.03]': $store.sidebar.isMobileOpen }"
                @click="$store.sidebar.toggleMobileOpen()" aria-label="Toggle Mobile Menu">
                <svg x-show="!$store.sidebar.isMobileOpen" width="16" height="12" viewBox="0 0 16 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.583252 1C0.583252 0.585788 0.919038 0.25 1.33325 0.25H14.6666C15.0808 0.25 15.4166 0.585786 15.4166 1C15.4166 1.41421 15.0808 1.75 14.6666 1.75L1.33325 1.75C0.919038 1.75 0.583252 1.41422 0.583252 1ZM0.583252 11C0.583252 10.5858 0.919038 10.25 1.33325 10.25L14.6666 10.25C15.0808 10.25 15.4166 10.5858 15.4166 11C15.4166 11.4142 15.0808 11.75 14.6666 11.75L1.33325 11.75C0.919038 11.75 0.583252 11.4142 0.583252 11ZM1.33325 5.25C0.919038 5.25 0.583252 5.58579 0.583252 6C0.583252 6.41421 0.919038 6.75 1.33325 6.75L7.99992 6.75C8.41413 6.75 8.74992 6.41421 8.74992 6C8.74992 5.58579 8.41413 5.25 7.99992 5.25L1.33325 5.25Z"
                        fill="currentColor"></path>
                </svg>
                <svg x-show="$store.sidebar.isMobileOpen" class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.21967 7.28131C5.92678 6.98841 5.92678 6.51354 6.21967 6.22065C6.51256 5.92775 6.98744 5.92775 7.28033 6.22065L11.999 10.9393L16.7176 6.22078C17.0105 5.92789 17.4854 5.92788 17.7782 6.22078C18.0711 6.51367 18.0711 6.98855 17.7782 7.28144L13.0597 12L17.7782 16.7186C18.0711 17.0115 18.0711 17.4863 17.7782 17.7792C17.4854 18.0721 17.0105 18.0721 16.7176 17.7792L11.999 13.0607L7.28033 17.7794C6.98744 18.0722 6.51256 18.0722 6.21967 17.7794C5.92678 17.4865 5.92678 17.0116 6.21967 16.7187L10.9384 12L6.21967 7.28131Z"
                        fill="" />
                </svg>
            </button>

            <!-- Logo (mobile only) -->
            <a href="/" class="xl:hidden">
                <img class="dark:hidden" src="/images/logo/logo.svg" alt="Logo" />
                <img class="hidden dark:block" src="/images/logo/logo-dark.svg" alt="Logo" />
            </a>

            <!-- Application Menu Toggle (mobile only) -->
            <button @click="toggleApplicationMenu()"
                class="flex items-center justify-center w-10 h-10 text-gray-700 rounded-lg z-99999 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800 xl:hidden">
                <!-- Dots Icon -->
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M5.99902 10.4951C6.82745 10.4951 7.49902 11.1667 7.49902 11.9951V12.0051C7.49902 12.8335 6.82745 13.5051 5.99902 13.5051C5.1706 13.5051 4.49902 12.8335 4.49902 12.0051V11.9951C4.49902 11.1667 5.1706 10.4951 5.99902 10.4951ZM17.999 10.4951C18.8275 10.4951 19.499 11.1667 19.499 11.9951V12.0051C19.499 12.8335 18.8275 13.5051 17.999 13.5051C17.1706 13.5051 16.499 12.8335 16.499 12.0051V11.9951C16.499 11.1667 17.1706 10.4951 17.999 10.4951ZM13.499 11.9951C13.499 11.1667 12.8275 10.4951 11.999 10.4951C11.1706 10.4951 10.499 11.1667 10.499 11.9951V12.0051C10.499 12.8335 11.1706 13.5051 11.999 13.5051C12.8275 13.5051 13.499 12.8335 13.499 12.0051V11.9951Z"
                        fill="currentColor" />
                </svg>
            </button>

            <!-- Search Bar (desktop only) -->
            <div class="hidden xl:block">
                <form>
                    <div class="relative">
                        <span class="absolute -translate-y-1/2 pointer-events-none ltr:left-4 rtl:right-4 top-1/2">
                            <!-- Search Icon -->
                            <svg class="fill-gray-500 dark:fill-gray-400" width="20" height="20"
                                viewBox="0 0 20 20" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.04175 9.37363C3.04175 5.87693 5.87711 3.04199 9.37508 3.04199C12.8731 3.04199 15.7084 5.87693 15.7084 9.37363C15.7084 12.8703 12.8731 15.7053 9.37508 15.7053C5.87711 15.7053 3.04175 12.8703 3.04175 9.37363ZM9.37508 1.54199C5.04902 1.54199 1.54175 5.04817 1.54175 9.37363C1.54175 13.6991 5.04902 17.2053 9.37508 17.2053C11.2674 17.2053 13.003 16.5344 14.357 15.4176L17.177 18.238C17.4699 18.5309 17.9448 18.5309 18.2377 18.238C18.5306 17.9451 18.5306 17.4703 18.2377 17.1774L15.418 14.3573C16.5365 13.0033 17.2084 11.2669 17.2084 9.37363C17.2084 5.04817 13.7011 1.54199 9.37508 1.54199Z"
                                    fill="" />
                            </svg>
                        </span>
                        <input type="text"
                            x-ref="searchInput"
                            placeholder="Search or type command..."
                            class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-200 bg-transparent py-2.5 ltr:pl-12 ltr:pr-14 rtl:pr-12 rtl:pl-14 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-800 dark:bg-white/3 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800 xl:w-[430px]" />
                        <button
                            type="button"
                            tabindex="-1"
                            @click="$refs.searchInput?.focus()"
                            class="absolute ltr:right-2.5 rtl:left-2.5 top-1/2 inline-flex -translate-y-1/2 items-center gap-0.5 rounded-lg border border-gray-200 bg-gray-50 px-[7px] py-[4.5px] text-xs -tracking-[0.2px] text-gray-500 dark:border-gray-800 dark:bg-white/[0.03] dark:text-gray-400">
                            <span> ⌘ </span>
                            <span> K </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Application Menu (mobile) and Right Side Actions (desktop) -->
        <div :class="isApplicationMenuOpen ? 'flex' : 'hidden'"
            class="items-center justify-between w-full gap-4 px-5 py-4 xl:flex shadow-theme-md xl:justify-end xl:px-0 xl:shadow-none">
            <div class="flex items-center gap-2 2xsm:gap-3">
                <!-- Theme Toggle Button -->
                <button
                    class="relative flex items-center justify-center text-gray-500 transition-colors bg-white border border-gray-200 rounded-full hover:text-dark-900 h-11 w-11 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white"
                    @click="$store.theme.toggle()">
                    <svg class="hidden dark:block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M9.99998 1.5415C10.4142 1.5415 10.75 1.87729 10.75 2.2915V3.5415C10.75 3.95572 10.4142 4.2915 9.99998 4.2915C9.58577 4.2915 9.24998 3.95572 9.24998 3.5415V2.2915C9.24998 1.87729 9.58577 1.5415 9.99998 1.5415ZM10.0009 6.79327C8.22978 6.79327 6.79402 8.22904 6.79402 10.0001C6.79402 11.7712 8.22978 13.207 10.0009 13.207C11.772 13.207 13.2078 11.7712 13.2078 10.0001C13.2078 8.22904 11.772 6.79327 10.0009 6.79327ZM5.29402 10.0001C5.29402 7.40061 7.40135 5.29327 10.0009 5.29327C12.6004 5.29327 14.7078 7.40061 14.7078 10.0001C14.7078 12.5997 12.6004 14.707 10.0009 14.707C7.40135 14.707 5.29402 12.5997 5.29402 10.0001ZM15.9813 5.08035C16.2742 4.78746 16.2742 4.31258 15.9813 4.01969C15.6884 3.7268 15.2135 3.7268 14.9207 4.01969L14.0368 4.90357C13.7439 5.19647 13.7439 5.67134 14.0368 5.96423C14.3297 6.25713 14.8045 6.25713 15.0974 5.96423L15.9813 5.08035ZM18.4577 10.0001C18.4577 10.4143 18.1219 10.7501 17.7077 10.7501H16.4577C16.0435 10.7501 15.7077 10.4143 15.7077 10.0001C15.7077 9.58592 16.0435 9.25013 16.4577 9.25013H17.7077C18.1219 9.25013 18.4577 9.58592 18.4577 10.0001ZM14.9207 15.9806C15.2135 16.2735 15.6884 16.2735 15.9813 15.9806C16.2742 15.6877 16.2742 15.2128 15.9813 14.9199L15.0974 14.036C14.8045 13.7431 14.3297 13.7431 14.0368 14.036C13.7439 14.3289 13.7439 14.8038 14.0368 15.0967L14.9207 15.9806ZM9.99998 15.7088C10.4142 15.7088 10.75 16.0445 10.75 16.4588V17.7088C10.75 18.123 10.4142 18.4588 9.99998 18.4588C9.58577 18.4588 9.24998 18.123 9.24998 17.7088V16.4588C9.24998 16.0445 9.58577 15.7088 9.99998 15.7088ZM5.96356 15.0972C6.25646 14.8043 6.25646 14.3295 5.96356 14.0366C5.67067 13.7437 5.1958 13.7437 4.9029 14.0366L4.01902 14.9204C3.72613 15.2133 3.72613 15.6882 4.01902 15.9811C4.31191 16.274 4.78679 16.274 5.07968 15.9811L5.96356 15.0972ZM4.29224 10.0001C4.29224 10.4143 3.95645 10.7501 3.54224 10.7501H2.29224C1.87802 10.7501 1.54224 10.4143 1.54224 10.0001C1.54224 9.58592 1.87802 9.25013 2.29224 9.25013H3.54224C3.95645 9.25013 4.29224 9.58592 4.29224 10.0001ZM4.9029 5.9637C5.1958 6.25659 5.67067 6.25659 5.96356 5.9637C6.25646 5.6708 6.25646 5.19593 5.96356 4.90303L5.07968 4.01915C4.78679 3.72626 4.31191 3.72626 4.01902 4.01915C3.72613 4.31204 3.72613 4.78692 4.01902 5.07981L4.9029 5.9637Z"
                            fill="currentColor" />
                    </svg>
                    <svg class="dark:hidden" width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.4547 11.97L18.1799 12.1611C18.265 11.8383 18.1265 11.4982 17.8401 11.3266C17.5538 11.1551 17.1885 11.1934 16.944 11.4207L17.4547 11.97ZM8.0306 2.5459L8.57989 3.05657C8.80718 2.81209 8.84554 2.44682 8.67398 2.16046C8.50243 1.8741 8.16227 1.73559 7.83948 1.82066L8.0306 2.5459ZM12.9154 13.0035C9.64678 13.0035 6.99707 10.3538 6.99707 7.08524H5.49707C5.49707 11.1823 8.81835 14.5035 12.9154 14.5035V13.0035ZM16.944 11.4207C15.8869 12.4035 14.4721 13.0035 12.9154 13.0035V14.5035C14.8657 14.5035 16.6418 13.7499 17.9654 12.5193L16.944 11.4207ZM16.7295 11.7789C15.9437 14.7607 13.2277 16.9586 10.0003 16.9586V18.4586C13.9257 18.4586 17.2249 15.7853 18.1799 12.1611L16.7295 11.7789ZM10.0003 16.9586C6.15734 16.9586 3.04199 13.8433 3.04199 10.0003H1.54199C1.54199 14.6717 5.32892 18.4586 10.0003 18.4586V16.9586ZM3.04199 10.0003C3.04199 6.77289 5.23988 4.05695 8.22173 3.27114L7.83948 1.82066C4.21532 2.77574 1.54199 6.07486 1.54199 10.0003H3.04199ZM6.99707 7.08524C6.99707 5.52854 7.5971 4.11366 8.57989 3.05657L7.48132 2.03522C6.25073 3.35885 5.49707 5.13487 5.49707 7.08524H6.99707Z"
                            fill="currentColor" />
                    </svg>
                </button>

                <!-- Notification Dropdown -->
                <x-header.notification-dropdown />
            </div>

            <!-- User Dropdown -->
            <x-header.user-dropdown />
        </div>
    </div>
</header>
```

## File: `resources/views/layouts/app.blade.php`

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="h-full bg-gray-50 dark:bg-gray-900">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Dashboard' }} | ITSM - BPOM</title>

    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- TomSelect -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">

    <!-- Theme Store -->
    <style>
        /* x-cloak WAJIB di head: mencegah elemen Alpine (form dinamis request, dsb.)
           terlihat/flicker sebelum Alpine.start(). Tanpa ini, Alpine gagal init secara
           senyap dan submit form tampak "tidak terjadi apa-apa". */
        [x-cloak] {
            display: none !important;
        }
    </style>
    <!-- Theme Store -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('theme', {
                init() {
                    const savedTheme = localStorage.getItem('theme');
                    this.theme = savedTheme === 'dark' ? 'dark' : 'light';
                    this.updateTheme();
                },
                theme: 'light',
                resolvedTheme: 'light',
                set(value) {
                    value = value === 'dark' ? 'dark' : 'light';
                    this.theme = value;
                    localStorage.setItem('theme', value);
                    this.updateTheme();
                    window.dispatchEvent(new CustomEvent('theme-changed', { detail: value }));
                },
                toggle() {
                    this.set(this.resolvedTheme === 'dark' ? 'light' : 'dark');
                },
                updateTheme() {
                    const html = document.documentElement;
                    const isDark = this.theme === 'dark';
                    if (isDark) {
                        html.classList.add('dark');
                    } else {
                        html.classList.remove('dark');
                    }

                    this.resolvedTheme = isDark ? 'dark' : 'light';
                    html.setAttribute('data-color-scheme', this.resolvedTheme);
                    html.dataset['theme'] = this.resolvedTheme;
                    html.style.colorScheme = this.resolvedTheme;
                    if (document.body) {
                        document.body.dataset['theme'] = this.resolvedTheme;
                        document.body.style.colorScheme = this.resolvedTheme;
                    }
                }
            });

            Alpine.store('sidebar', {
                isExpanded: false,
                isMobileOpen: false,
                isHovered: false,

                init() {
                    const savedState = localStorage.getItem('sidebarExpanded');
                    if (window.innerWidth >= 1280) {
                        this.isExpanded = savedState === null ? true : savedState === 'true';
                    } else {
                        this.isExpanded = false;
                    }
                    this.isMobileOpen = false;

                    window.addEventListener('resize', () => {
                        this.handleResize();
                    });
                },

                handleResize() {
                    if (window.innerWidth < 1280) {
                        if (this.isMobileOpen) {
                             this.isMobileOpen = false;
                        }
                    } else {
                        this.isMobileOpen = false;
                        const savedState = localStorage.getItem('sidebarExpanded');
                        this.isExpanded = savedState === null ? true : savedState === 'true';
                    }
                },

                toggleExpanded() {
                    this.isExpanded = !this.isExpanded;
                    this.isMobileOpen = false;
                    
                    if (window.innerWidth >= 1280) {
                        localStorage.setItem('sidebarExpanded', this.isExpanded);
                    }
                },

                toggleMobileOpen() {
                    this.isMobileOpen = !this.isMobileOpen;
                },

                setMobileOpen(val) {
                    this.isMobileOpen = val;
                },

                setHovered(val) {
                    if (window.innerWidth >= 1280 && !this.isExpanded) {
                        this.isHovered = val;
                    }
                }
            });
        });
    </script>

    <!-- Apply RTL and dark mode immediately to prevent flash -->
    <script>
        (function() {
            const savedDir = localStorage.getItem('dir');
            const savedLocale = localStorage.getItem('locale');
            if (savedDir) {
                document.documentElement.setAttribute('dir', savedDir);
            } else if (savedLocale === 'ar') {
                document.documentElement.setAttribute('dir', 'rtl');
            }
            if (savedLocale) {
                document.documentElement.setAttribute('lang', savedLocale);
            }

            const savedTheme = localStorage.getItem('theme');
            const isDark = savedTheme === 'dark';
            if (isDark) {
                document.documentElement.classList.add('dark');
                document.documentElement.setAttribute('data-color-scheme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                document.documentElement.setAttribute('data-color-scheme', 'light');
            }
        })();
    </script>
    

</head>

<body>

    <div class="min-h-screen xl:flex sidebar-expanded" x-data :class="{ 'sidebar-expanded': $store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen }">
        @include('layouts.backdrop')
        @include('layouts.sidebar')

        {{-- transition-all duration-300 ease-in-out --}}
        <div class="flex-1 ml-0 ltr:xl:ml-[90px] rtl:xl:ml-0 rtl:xl:mr-[90px] [.sidebar-expanded_&]:ltr:xl:ml-[290px] [.sidebar-expanded_&]:rtl:xl:ml-0 [.sidebar-expanded_&]:rtl:xl:mr-[290px] transition-all duration-300 ease-in-out">
            <!-- app header start -->
            @include('layouts.app-header')
            <!-- app header end -->
            <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
                @yield('content')
            </div>
        </div>

    </div>

    <!-- TomSelect -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script>
        // Inisialisasi TomSelect dipanggil ulang setiap DOMContentLoaded & turboload.
        function initTomSelect() {
            if (typeof TomSelect === 'undefined') return;
            document.querySelectorAll('select.tom-select').forEach((el) => {
                if (!el.tomselect) new TomSelect(el, { create: false });
            });
        }
        document.addEventListener('DOMContentLoaded', initTomSelect);
    </script>

    {{-- Fallback: jika Vite build belum dijalankan (`npm run build`) ATAU CDN Alpine mati,
         load Alpine dari CDN agar x-data/x-show/submit handler tetap berfungsi.
         window.Alpine sudah diset oleh bundle Vite bila tersedia. --}}
    <script>
        window.addEventListener('load', function () {
            if (typeof window.Alpine === 'undefined' || typeof window.Alpine.start !== 'function') {
                var s = document.createElement('script');
                s.src = 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js';
                s.defer = true;
                document.head.appendChild(s);
                console.warn('[ITSM] Bundle Alpine tidak ditemukan — fallback ke CDN. Jalankan `npm run build` di folder proyek.');
            }
        });
    </script>

</body>

@stack('scripts')

</html>
```

## File: `resources/views/layouts/backdrop.blade.php`

```blade
<div
    x-cloak
    x-show="$store.sidebar.isMobileOpen"
    @click="$store.sidebar.setMobileOpen(false)"
    class="fixed inset-0 z-50 bg-gray-900/50 xl:hidden"
></div>
```

## File: `resources/views/layouts/fullscreen-layout.blade.php`

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Dashboard' }} | TailAdmin - Laravel Tailwind CSS Admin Dashboard Template</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- TomSelect -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">

    <!-- Alpine.js -->
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

    <!-- Theme Store -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('theme', {
                init() {
                    const savedTheme = localStorage.getItem('theme');
                    this.theme = savedTheme === 'dark' ? 'dark' : 'light';
                    this.updateTheme();
                },
                theme: 'light',
                toggle() {
                    this.theme = this.theme === 'light' ? 'dark' : 'light';
                    localStorage.setItem('theme', this.theme);
                    this.updateTheme();
                },
                updateTheme() {
                    const html = document.documentElement;
                    const body = document.body;
                    if (this.theme === 'dark') {
                        html.classList.add('dark');
                        body.classList.add('dark', 'bg-gray-900');
                    } else {
                        html.classList.remove('dark');
                        body.classList.remove('dark', 'bg-gray-900');
                    }
                }
            });

            Alpine.store('sidebar', {
                // Initialize based on screen size
                isExpanded: window.innerWidth >= 1280, // true for desktop, false for mobile
                isMobileOpen: false,
                isHovered: false,

                toggleExpanded() {
                    this.isExpanded = !this.isExpanded;
                    // When toggling desktop sidebar, ensure mobile menu is closed
                    this.isMobileOpen = false;
                },

                toggleMobileOpen() {
                    this.isMobileOpen = !this.isMobileOpen;
                    // Don't modify isExpanded when toggling mobile menu
                },

                setMobileOpen(val) {
                    this.isMobileOpen = val;
                },

                setHovered(val) {
                    // Only allow hover effects on desktop when sidebar is collapsed
                    if (window.innerWidth >= 1280 && !this.isExpanded) {
                        this.isHovered = val;
                    }
                }
            });
        });
    </script>

    <!-- Apply dark mode immediately to prevent flash -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const theme = savedTheme === 'dark' ? 'dark' : 'light';
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
                if (document.body) document.body.classList.add('dark', 'bg-gray-900');
            } else {
                document.documentElement.classList.remove('dark');
                if (document.body) document.body.classList.remove('dark', 'bg-gray-900');
            }
        })();
    </script>
    <!-- Apply RTL mode immediately to prevent flash -->
    <script>
        (function() {
            const savedDir = localStorage.getItem("dir");
            if (savedDir === "rtl") {
                document.documentElement.setAttribute("dir", "rtl");
            } else {
                document.documentElement.setAttribute("dir", "ltr");
            }
        })();
    </script>
</head>

<body x-init="$store.sidebar.isExpanded = window.innerWidth >= 1280;
const checkMobile = () => {
    if (window.innerWidth < 1280) {
        $store.sidebar.setMobileOpen(false);
        $store.sidebar.isExpanded = false;
    } else {
        $store.sidebar.isMobileOpen = false;
        $store.sidebar.isExpanded = true;
    }
};
window.addEventListener('resize', checkMobile);">

    @yield('content')

    <!-- TomSelect -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

</body>

@stack('scripts')

</html>
```

## File: `resources/views/layouts/sidebar-widget.blade.php`

```blade

```

## File: `resources/views/layouts/sidebar.blade.php`

```blade
@php
    use App\Helpers\MenuHelper;
    $menuGroups = MenuHelper::getMenuGroups();

    // Get current path
    $currentPath = request()->path();
@endphp

<aside id="sidebar"
    class="fixed flex flex-col mt-0 top-0 px-5 start-0 bg-white dark:bg-gray-900 dark:border-gray-800 text-gray-900 h-screen transition-all duration-300 ease-in-out z-99999 ltr:border-r rtl:border-l border-gray-200 w-[90px] [.sidebar-expanded_&]:min-w-[290px]"
    x-data="{
        openSubmenus: {},
        init() {
            // Auto-open Dashboard menu on page load
            this.initializeActiveMenus();
        },
        initializeActiveMenus() {
            const currentPath = '{{ $currentPath }}';

            @foreach ($menuGroups as $groupIndex => $menuGroup)
                @foreach ($menuGroup['items'] as $itemIndex => $item)
                    @if (isset($item['subItems']))
                        // Check if any submenu item matches current path
                        @foreach ($item['subItems'] as $subItem)
                            if (currentPath === '{{ ltrim($subItem['path'], '/') }}' ||
                                window.location.pathname === '{{ $subItem['path'] }}') {
                                this.openSubmenus['{{ $groupIndex }}-{{ $itemIndex }}'] = true;
                            } @endforeach
            @endif
            @endforeach
            @endforeach
        },
        toggleSubmenu(groupIndex, itemIndex) {
            const key = groupIndex + '-' + itemIndex;
            const newState = !this.openSubmenus[key];

            // Close all other submenus when opening a new one
            if (newState) {
                this.openSubmenus = {};
            }

            this.openSubmenus[key] = newState;
        },
        isSubmenuOpen(groupIndex, itemIndex) {
            const key = groupIndex + '-' + itemIndex;
            return this.openSubmenus[key] || false;
        },
        isActive(path) {
            return window.location.pathname === path || '{{ $currentPath }}' === path.replace(/^\//, '');
        }
    }"
    :class="{
        'translate-x-0': $store.sidebar.isMobileOpen,
        'max-xl:-translate-x-full max-xl:rtl:translate-x-full': !$store.sidebar.isMobileOpen
    }"
    @mouseenter="if (!$store.sidebar.isExpanded) $store.sidebar.setHovered(true)"
    @mouseleave="$store.sidebar.setHovered(false)">
    <!-- Logo Section -->
    <div class="pt-8 pb-7 flex items-center gap-2" :class="(!$store.sidebar.isExpanded && !$store.sidebar.isHovered && !$store.sidebar.isMobileOpen) ? 'justify-center' : 'justify-evenly'">
        <a href="/">
            <div class="hidden [.sidebar-expanded_&]:block">
                <img class="dark:hidden" src="/images/logo/itsmfaviconlight.svg" alt="Logo" width="90" height="40" />
                <img class="hidden dark:block" src="/images/logo/itsmfavicon.svg" alt="Logo" width="90" height="40" />
            </div>
            <img class="block [.sidebar-expanded_&]:hidden" src="/images/logo/itsmfaviconlight.svg" alt="Logo" width="32" height="32" />
        </a>
    </div>

    <!-- Navigation Menu -->
    <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
        <nav class="mb-6">
            <div class="flex flex-col gap-4">
                @foreach ($menuGroups as $groupIndex => $menuGroup)
                    <div>
                        <!-- Menu Group Title -->
                        <h2 class="mb-4 text-xs uppercase flex leading-[20px] text-gray-400"
                            :class="(!$store.sidebar.isExpanded && !$store.sidebar.isHovered && !$store.sidebar.isMobileOpen) ?
                            'lg:justify-center' : 'justify-start'">
                            <template
                                x-if="$store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen">
                                <span>{{ __($menuGroup['title']) }}</span>
                            </template>
                            <template x-if="!$store.sidebar.isExpanded && !$store.sidebar.isHovered && !$store.sidebar.isMobileOpen">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 12C4.25 11.5858 4.58579 11.25 5 11.25H19C19.4142 11.25 19.75 11.5858 19.75 12C19.75 12.4142 19.4142 12.75 19 12.75H5C4.58579 12.75 4.25 12.4142 4.25 12Z" fill="currentColor"/>
                                </svg>
                            </template>
                        </h2>

                        <!-- Menu Items -->
                        <ul class="flex flex-col gap-1">
                            @foreach ($menuGroup['items'] as $itemIndex => $item)
                                <li>
                                    @if (isset($item['subItems']))
                                        <!-- Dropdown Menu Item -->
                                        <button @click="toggleSubmenu({{ $groupIndex }}, {{ $itemIndex }})"
                                            class="menu-item group w-full"
                                            :class="[
                                                isSubmenuOpen({{ $groupIndex }}, {{ $itemIndex }}) ?
                                                'menu-item-active' :
                                                'menu-item-inactive',
                                                (!$store.sidebar.isExpanded && !$store.sidebar.isHovered && !$store.sidebar.isMobileOpen) ?
                                                'xl:justify-center' :
                                                'xl:justify-start'
                                            ]">
                                            <!-- Left Icon -->
                                            <span :class="isSubmenuOpen({{ $groupIndex }}, {{ $itemIndex }}) ?
                                                'menu-item-icon-active' :
                                                'menu-item-icon-inactive'">
                                                {!! MenuHelper::getIconSvg($item['icon']) !!}
                                            </span>

                                            <!-- Item Text -->
                                            <span
                                                x-show="$store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen"
                                                class="menu-item-text flex items-center gap-2">
                                                {{ __($item['name']) }}
                                                @if (!empty($item['new']))
                                                    <span class="absolute ltr:right-10 rtl:left-10"
                                                        :class="isActive('{{ $item['path'] ?? '' }}') ?
                                                            'menu-dropdown-badge menu-dropdown-badge-active' :
                                                            'menu-dropdown-badge menu-dropdown-badge-inactive'">
                                                        {{ __('new') }}
                                                    </span>
                                                @endif
                                            </span>

                                            <!-- Dropdown Chevron -->
                                            <svg x-show="$store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen"
                                                class="ltr:ml-auto rtl:mr-auto w-5 h-5 transition-transform duration-200"
                                                :class="{
                                                    'rotate-180 text-brand-500': isSubmenuOpen({{ $groupIndex }},
                                                        {{ $itemIndex }}),
                                                    'text-gray-500 dark:text-gray-400': !isSubmenuOpen(
                                                        {{ $groupIndex }}, {{ $itemIndex }})
                                                }"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>

                                        <!-- Submenu -->
                                        <div x-show="isSubmenuOpen({{ $groupIndex }}, {{ $itemIndex }}) && ($store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen)"
                                            x-collapse>
                                            <ul class="mt-2 space-y-1 ltr:ml-9 rtl:mr-9">
                                                @foreach ($item['subItems'] as $subItem)
                                                    <li>
                                                        <a href="{{ $subItem['path'] }}" class="menu-dropdown-item"
                                                            :class="isActive('{{ $subItem['path'] }}') ?
                                                                'menu-dropdown-item-active' :
                                                                'menu-dropdown-item-inactive'">
                                                            {{ __($subItem['name']) }}
                                                            <span class="flex items-center gap-1 ltr:ml-auto rtl:mr-auto">
                                                                @if (!empty($subItem['new']))
                                                                    <span
                                                                        :class="isActive('{{ $subItem['path'] }}') ?
                                                                            'menu-dropdown-badge menu-dropdown-badge-active' :
                                                                            'menu-dropdown-badge menu-dropdown-badge-inactive'">
                                                                        {{ __('new') }}
                                                                    </span>
                                                                @endif
                                                                @if (!empty($subItem['pro']))
                                                                    <span
                                                                        :class="isActive('{{ $subItem['path'] }}') ?
                                                                            'menu-dropdown-badge-pro menu-dropdown-badge-pro-active' :
                                                                            'menu-dropdown-badge-pro menu-dropdown-badge-pro-inactive'">
                                                                        {{ __('pro') }}
                                                                    </span>
                                                                @endif
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <!-- Simple Menu Item -->
                                        <a href="{{ $item['path'] }}" class="menu-item group"
                                            :class="[
                                                isActive('{{ $item['path'] }}') ? 'menu-item-active' :
                                                'menu-item-inactive',
                                                (!$store.sidebar.isExpanded && !$store.sidebar.isHovered && !$store.sidebar.isMobileOpen) ?
                                                'xl:justify-center' :
                                                'xl:justify-start'
                                            ]">
                                            <!-- Left Icon -->
                                            <span :class="isActive('{{ $item['path'] }}') ?
                                                'menu-item-icon-active' :
                                                'menu-item-icon-inactive'">
                                                {!! MenuHelper::getIconSvg($item['icon']) !!}
                                            </span>

                                            <!-- Item Text -->
                                            <span
                                                x-show="$store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen"
                                                class="menu-item-text flex items-center gap-2">
                                                {{ __($item['name']) }}
                                                @if (!empty($item['new']))
                                                    <span
                                                        class="ltr:ml-2 rtl:mr-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-brand-500 text-white">
                                                        {{ __('new') }}
                                                    </span>
                                                @endif
                                            </span>
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </nav>

        <!-- Sidebar Widget -->
        <!-- <div class="hidden [.sidebar-expanded_&]:block mt-auto">
            @include('layouts.sidebar-widget')
        </div> -->
    </div>
</aside>
```

## File: `resources/views/pages/auth/signin.blade.php`

```blade
@extends('layouts.fullscreen-layout')

@section('content')
    <div class="relative z-1 bg-white p-6 sm:p-0 dark:bg-gray-900">
        <div class="relative flex h-screen w-full flex-col justify-center sm:p-0 lg:flex-row dark:bg-gray-900">
            <!-- Form -->
            <div class="flex w-full flex-1 flex-col lg:w-1/2">
                <div class="mx-auto w-full max-w-md pt-10">
                    <a href="/"
                        class="inline-flex items-center gap-2 text-sm text-gray-500 transition-colors hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        <svg class="stroke-current rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M12.7083 5L7.5 10.2083L12.7083 15.4167" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Back to dashboard
                    </a>
                </div>
                <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center">
                    <div>
                        <div class="mb-5 sm:mb-8">
                            <h1 class="text-title-sm sm:text-title-md mb-2 font-semibold text-gray-800 dark:text-white/90">
                                Sign In
                            </h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Enter your email and password to sign in!
                            </p>
                        </div>
                        <div>
                            
                            <div class="relative py-3 sm:py-5">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-200 dark:border-gray-800"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="bg-white p-2 text-gray-400 sm:px-5 sm:py-2 dark:bg-gray-900">Or</span>
                                </div>
                            </div>
                            <form action="{{ route('login') }}" method="POST" >
                                @csrf
                                <div class="space-y-5">
                                    <!-- Email -->
                                    <div>
                                        <label for="email" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                            Email<span class="text-error-500">*</span>
                                        </label>
                                        <input type="email" id="email" name="email" placeholder="info@gmail.com" value="{{ old('email') }}" required autofocus
                                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                    </div>
                                    <!-- Password -->
                                    <div>
                                        <label for="password" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                            Password<span class="text-error-500">*</span>
                                        </label>
                                        <div x-data="{ showPassword: false }" class="relative">
                                            <input :type="showPassword ? 'text' : 'password'" type="password" name="password"
                                                placeholder="Enter your password"
                                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-11 pl-4 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                            <span @click="showPassword = !showPassword"
                                                class="absolute top-1/2 right-4 z-30 -translate-y-1/2 cursor-pointer text-gray-500 dark:text-gray-400">
                                                <svg x-show="!showPassword" class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0002 13.8619C7.23361 13.8619 4.86803 12.1372 3.92328 9.70241C4.86804 7.26761 7.23361 5.54297 10.0002 5.54297C12.7667 5.54297 15.1323 7.26762 16.0771 9.70243C15.1323 12.1372 12.7667 13.8619 10.0002 13.8619ZM10.0002 4.04297C6.48191 4.04297 3.49489 6.30917 2.4155 9.4593C2.3615 9.61687 2.3615 9.78794 2.41549 9.94552C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C13.5184 15.3619 16.5055 13.0957 17.5849 9.94555C17.6389 9.78797 17.6389 9.6169 17.5849 9.45932C16.5055 6.30919 13.5184 4.04297 10.0002 4.04297ZM9.99151 7.84413C8.96527 7.84413 8.13333 8.67606 8.13333 9.70231C8.13333 10.7286 8.96527 11.5605 9.99151 11.5605H10.0064C11.0326 11.5605 11.8646 10.7286 11.8646 9.70231C11.8646 8.67606 11.0326 7.84413 10.0064 7.84413H9.99151Z" fill="#98A2B3" />
                                                </svg>
                                                <svg x-show="showPassword" class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M4.63803 3.57709C4.34513 3.2842 3.87026 3.2842 3.57737 3.57709C3.28447 3.86999 3.28447 4.34486 3.57737 4.63775L4.85323 5.91362C3.74609 6.84199 2.89363 8.06395 2.4155 9.45936C2.3615 9.61694 2.3615 9.78801 2.41549 9.94558C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C11.255 15.3619 12.4422 15.0737 13.4994 14.5598L15.3625 16.4229C15.6554 16.7158 16.1302 16.7158 16.4231 16.4229C16.716 16.13 16.716 15.6551 16.4231 15.3622L4.63803 3.57709ZM12.3608 13.4212L10.4475 11.5079C10.3061 11.5423 10.1584 11.5606 10.0064 11.5606H9.99151C8.96527 11.5606 8.13333 10.7286 8.13333 9.70237C8.13333 9.5461 8.15262 9.39434 8.18895 9.24933L5.91885 6.97923C5.03505 7.69015 4.34057 8.62704 3.92328 9.70247C4.86803 12.1373 7.23361 13.8619 10.0002 13.8619C10.8326 13.8619 11.6287 13.7058 12.3608 13.4212ZM16.0771 9.70249C15.7843 10.4569 15.3552 11.1432 14.8199 11.7311L15.8813 12.7925C16.6329 11.9813 17.2187 11.0143 17.5849 9.94561C17.6389 9.78803 17.6389 9.61696 17.5849 9.45938C16.5055 6.30925 13.5184 4.04303 10.0002 4.04303C9.13525 4.04303 8.30244 4.17999 7.52218 4.43338L8.75139 5.66259C9.1556 5.58413 9.57311 5.54303 10.0002 5.54303C12.7667 5.54303 15.1323 7.26768 16.0771 9.70249Z"
                                                        fill="#98A2B3" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Checkbox -->
                                    <div class="flex items-center justify-between">
                                        <div x-data="{ checkboxToggle: false }">
                                            <label for="checkboxLabelOne"
                                                class="flex cursor-pointer items-center text-sm font-normal text-gray-700 select-none dark:text-gray-400">
                                                <div class="relative">
                                                    <input type="checkbox" id="checkboxLabelOne" class="sr-only" @change="checkboxToggle = !checkboxToggle" />
                                                    <div :class="checkboxToggle ? 'border-brand-500 bg-brand-500' :
                                                        'bg-transparent border-gray-300 dark:border-gray-700'"
                                                        class="mr-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px]">
                                                        <span :class="checkboxToggle ? '' : 'opacity-0'">
                                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                Keep me logged in
                                            </label>
                                        </div>
                                        <a href="/reset-password" class="text-brand-500 hover:text-brand-600 dark:text-brand-400 text-sm">
                                            Forgot password?
                                        </a>
                                    </div>

                                        @error('email')
                                            <div class="text-red-500">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <!-- Button -->
                                    <div>
                                        <button type = "submit"
                                            class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 flex w-full items-center justify-center rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                                            Sign In
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="mt-5">
                                <p class="text-center text-sm font-normal text-gray-700 sm:text-start dark:text-gray-400">
                                    Don't have an account?
                                    <a href="/signup" class="text-brand-500 hover:text-brand-600 dark:text-brand-400">Sign Up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-brand-950 relative hidden h-full w-full items-center lg:grid lg:w-1/2 dark:bg-white/5">
                <div class="z-1 flex items-center justify-center">
                    <!-- ===== Common Grid Shape Start ===== -->
                    <x-common.common-grid-shape/>
                    <div class="flex max-w-xs flex-col items-center">
                        <a href="/" class="mb-4 block">
                            <img src="./images/logo/auth-logo.svg" alt="Logo" />
                        </a>
                        <p class="text-center text-gray-400 dark:text-white/60">
                            Free and Open-Source Tailwind CSS Admin Dashboard Template
                        </p>
                    </div>
                </div>
            </div>
            <!-- Toggler -->
            <div class="fixed right-6 bottom-6 z-50">
                <button
                    class="bg-brand-500 hover:bg-brand-600 inline-flex size-14 items-center justify-center rounded-full text-white transition-colors"
                    @click.prevent="$store.theme.toggle()">
                    <svg class="hidden fill-current dark:block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99998 1.5415C10.4142 1.5415 10.75 1.87729 10.75 2.2915V3.5415C10.75 3.95572 10.4142 4.2915 9.99998 4.2915C9.58577 4.2915 9.24998 3.95572 9.24998 3.5415V2.2915C9.24998 1.87729 9.58577 1.5415 9.99998 1.5415ZM10.0009 6.79327C8.22978 6.79327 6.79402 8.22904 6.79402 10.0001C6.79402 11.7712 8.22978 13.207 10.0009 13.207C11.772 13.207 13.2078 11.7712 13.2078 10.0001C13.2078 8.22904 11.772 6.79327 10.0009 6.79327ZM5.29402 10.0001C5.29402 7.40061 7.40135 5.29327 10.0009 5.29327C12.6004 5.29327 14.7078 7.40061 14.7078 10.0001C14.7078 12.5997 12.6004 14.707 10.0009 14.707C7.40135 14.707 5.29402 12.5997 5.29402 10.0001ZM15.9813 5.08035C16.2742 4.78746 16.2742 4.31258 15.9813 4.01969C15.6884 3.7268 15.2135 3.7268 14.9207 4.01969L14.0368 4.90357C13.7439 5.19647 13.7439 5.67134 14.0368 5.96423C14.3297 6.25713 14.8045 6.25713 15.0974 5.96423L15.9813 5.08035ZM18.4577 10.0001C18.4577 10.4143 18.1219 10.7501 17.7077 10.7501H16.4577C16.0435 10.7501 15.7077 10.4143 15.7077 10.0001C15.7077 9.58592 16.0435 9.25013 16.4577 9.25013H17.7077C18.1219 9.25013 18.4577 9.58592 18.4577 10.0001ZM14.9207 15.9806C15.2135 16.2735 15.6884 16.2735 15.9813 15.9806C16.2742 15.6877 16.2742 15.2128 15.9813 14.9199L15.0974 14.036C14.8045 13.7431 14.3297 13.7431 14.0368 14.036C13.7439 14.3289 13.7439 14.8038 14.0368 15.0967L14.9207 15.9806ZM9.99998 15.7088C10.4142 15.7088 10.75 16.0445 10.75 16.4588V17.7088C10.75 18.123 10.4142 18.4588 9.99998 18.4588C9.58577 18.4588 9.24998 18.123 9.24998 17.7088V16.4588C9.24998 16.0445 9.58577 15.7088 9.99998 15.7088ZM5.96356 15.0972C6.25646 14.8043 6.25646 14.3295 5.96356 14.0366C5.67067 13.7437 5.1958 13.7437 4.9029 14.0366L4.01902 14.9204C3.72613 15.2133 3.72613 15.6882 4.01902 15.9811C4.31191 16.274 4.78679 16.274 5.07968 15.9811L5.96356 15.0972ZM4.29224 10.0001C4.29224 10.4143 3.95645 10.7501 3.54224 10.7501H2.29224C1.87802 10.7501 1.54224 10.4143 1.54224 10.0001C1.54224 9.58592 1.87802 9.25013 2.29224 9.25013H3.54224C3.95645 9.25013 4.29224 9.58592 4.29224 10.0001ZM4.9029 5.9637C5.1958 6.25659 5.67067 6.25659 5.96356 5.9637C6.25646 5.6708 6.25646 5.19593 5.96356 4.90303L5.07968 4.01915C4.78679 3.72626 4.31191 3.72626 4.01902 4.01915C3.72613 4.31204 3.72613 4.78692 4.01902 5.07981L4.9029 5.9637Z" fill="" />
                    </svg>
                    <svg class="fill-current dark:hidden" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.4547 11.97L18.1799 12.1611C18.265 11.8383 18.1265 11.4982 17.8401 11.3266C17.5538 11.1551 17.1885 11.1934 16.944 11.4207L17.4547 11.97ZM8.0306 2.5459L8.57989 3.05657C8.80718 2.81209 8.84554 2.44682 8.67398 2.16046C8.50243 1.8741 8.16227 1.73559 7.83948 1.82066L8.0306 2.5459ZM12.9154 13.0035C9.64678 13.0035 6.99707 10.3538 6.99707 7.08524H5.49707C5.49707 11.1823 8.81835 14.5035 12.9154 14.5035V13.0035ZM16.944 11.4207C15.8869 12.4035 14.4721 13.0035 12.9154 13.0035V14.5035C14.8657 14.5035 16.6418 13.7499 17.9654 12.5193L16.944 11.4207ZM16.7295 11.7789C15.9437 14.7607 13.2277 16.9586 10.0003 16.9586V18.4586C13.9257 18.4586 17.2249 15.7853 18.1799 12.1611L16.7295 11.7789ZM10.0003 16.9586C6.15734 16.9586 3.04199 13.8433 3.04199 10.0003H1.54199C1.54199 14.6717 5.32892 18.4586 10.0003 18.4586V16.9586ZM3.04199 10.0003C3.04199 6.77289 5.23988 4.05695 8.22173 3.27114L7.83948 1.82066C4.21532 2.77574 1.54199 6.07486 1.54199 10.0003H3.04199ZM6.99707 7.08524C6.99707 5.52854 7.5971 4.11366 8.57989 3.05657L7.48132 2.03522C6.25073 3.35885 5.49707 5.13487 5.49707 7.08524H6.99707Z" fill="" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endsection
```

## File: `resources/views/pages/auth/signup.blade.php`

```blade
@extends('layouts.fullscreen-layout')

@section('content')
    <div class="relative z-1 bg-white p-6 sm:p-0 dark:bg-gray-900">
        <div class="flex h-screen w-full flex-col justify-center sm:p-0 lg:flex-row dark:bg-gray-900">
            <!-- Form -->
            <div class="flex w-full flex-1 flex-col lg:w-1/2">
                <div class="mx-auto w-full max-w-md pt-5 sm:py-10">
                    <a href="/"
                        class="inline-flex items-center gap-2 text-sm text-gray-500 transition-colors hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        <svg class="stroke-current rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M12.7083 5L7.5 10.2083L12.7083 15.4167" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Back to dashboard
                    </a>
                </div>
                <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center">
                    <div class="mb-5 sm:mb-8">
                        <h1 class="text-title-sm sm:text-title-md mb-2 font-semibold text-gray-800 dark:text-white/90">
                            Sign Up
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Enter your email and password to sign up!
                        </p>
                    </div>
                    <div>
                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 sm:gap-5">
                            <button
                                class="inline-flex items-center justify-center gap-3 rounded-lg bg-gray-100 px-7 py-3 text-sm font-normal text-gray-700 transition-colors hover:bg-gray-200 hover:text-gray-800 dark:bg-white/5 dark:text-white/90 dark:hover:bg-white/10">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.7511 10.1944C18.7511 9.47495 18.6915 8.94995 18.5626 8.40552H10.1797V11.6527H15.1003C15.0011 12.4597 14.4654 13.675 13.2749 14.4916L13.2582 14.6003L15.9087 16.6126L16.0924 16.6305C17.7788 15.1041 18.7511 12.8583 18.7511 10.1944Z" fill="#4285F4" />
                                    <path d="M10.1788 18.75C12.5895 18.75 14.6133 17.9722 16.0915 16.6305L13.274 14.4916C12.5201 15.0068 11.5081 15.3666 10.1788 15.3666C7.81773 15.3666 5.81379 13.8402 5.09944 11.7305L4.99473 11.7392L2.23868 13.8295L2.20264 13.9277C3.67087 16.786 6.68674 18.75 10.1788 18.75Z" fill="#34A853" />
                                    <path d="M5.10014 11.7305C4.91165 11.186 4.80257 10.6027 4.80257 9.99992C4.80257 9.3971 4.91165 8.81379 5.09022 8.26935L5.08523 8.1534L2.29464 6.02954L2.20333 6.0721C1.5982 7.25823 1.25098 8.5902 1.25098 9.99992C1.25098 11.4096 1.5982 12.7415 2.20333 13.9277L5.10014 11.7305Z" fill="#FBBC05" />
                                    <path d="M10.1789 4.63331C11.8554 4.63331 12.9864 5.34303 13.6312 5.93612L16.1511 3.525C14.6035 2.11528 12.5895 1.25 10.1789 1.25C6.68676 1.25 3.67088 3.21387 2.20264 6.07218L5.08953 8.26943C5.81381 6.15972 7.81776 4.63331 10.1789 4.63331Z" fill="#EB4335" />
                                </svg>
                                Sign up with Google
                            </button>
                            <button
                                class="inline-flex items-center justify-center gap-3 rounded-lg bg-gray-100 px-7 py-3 text-sm font-normal text-gray-700 transition-colors hover:bg-gray-200 hover:text-gray-800 dark:bg-white/5 dark:text-white/90 dark:hover:bg-white/10">
                                <svg width="21" class="fill-current" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.6705 1.875H18.4272L12.4047 8.75833L19.4897 18.125H13.9422L9.59717 12.4442L4.62554 18.125H1.86721L8.30887 10.7625L1.51221 1.875H7.20054L11.128 7.0675L15.6705 1.875ZM14.703 16.475H16.2305L6.37054 3.43833H4.73137L14.703 16.475Z" />
                                </svg>

                                Sign up with X
                            </button>
                        </div>
                        <div class="relative py-3 sm:py-5">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200 dark:border-gray-800"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="bg-white p-2 text-gray-400 sm:px-5 sm:py-2 dark:bg-gray-900">Or</span>
                            </div>
                        </div>
                        <form>
                            <div class="space-y-5">
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                    <!-- First Name -->
                                    <div class="sm:col-span-1">
                                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                            First Name<span class="text-error-500">*</span>
                                        </label>
                                        <input type="text" id="fname" name="fname"
                                            placeholder="Enter your first name"
                                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                    </div>
                                    <!-- Last Name -->
                                    <div class="sm:col-span-1">
                                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                            Last Name<span class="text-error-500">*</span>
                                        </label>
                                        <input type="text" id="lname" name="lname"
                                            placeholder="Enter your last name"
                                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                    </div>
                                </div>
                                <!-- Email -->
                                <div>
                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Email<span class="text-error-500">*</span>
                                    </label>
                                    <input type="email" id="email" name="email" placeholder="Enter your email"
                                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                </div>
                                <!-- Password -->
                                <div>
                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Password<span class="text-error-500">*</span>
                                    </label>
                                    <div x-data="{ showPassword: false }" class="relative">
                                        <input :type="showPassword ? 'text' : 'password'" placeholder="Enter your password"
                                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-11 pl-4 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                        <span @click="showPassword = !showPassword"
                                            class="absolute top-1/2 right-4 z-30 -translate-y-1/2 cursor-pointer text-gray-500 dark:text-gray-400">
                                            <svg x-show="!showPassword" class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0002 13.8619C7.23361 13.8619 4.86803 12.1372 3.92328 9.70241C4.86804 7.26761 7.23361 5.54297 10.0002 5.54297C12.7667 5.54297 15.1323 7.26762 16.0771 9.70243C15.1323 12.1372 12.7667 13.8619 10.0002 13.8619ZM10.0002 4.04297C6.48191 4.04297 3.49489 6.30917 2.4155 9.4593C2.3615 9.61687 2.3615 9.78794 2.41549 9.94552C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C13.5184 15.3619 16.5055 13.0957 17.5849 9.94555C17.6389 9.78797 17.6389 9.6169 17.5849 9.45932C16.5055 6.30919 13.5184 4.04297 10.0002 4.04297ZM9.99151 7.84413C8.96527 7.84413 8.13333 8.67606 8.13333 9.70231C8.13333 10.7286 8.96527 11.5605 9.99151 11.5605H10.0064C11.0326 11.5605 11.8646 10.7286 11.8646 9.70231C11.8646 8.67606 11.0326 7.84413 10.0064 7.84413H9.99151Z" fill="#98A2B3" />
                                            </svg>
                                            <svg x-show="showPassword" class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.63803 3.57709C4.34513 3.2842 3.87026 3.2842 3.57737 3.57709C3.28447 3.86999 3.28447 4.34486 3.57737 4.63775L4.85323 5.91362C3.74609 6.84199 2.89363 8.06395 2.4155 9.45936C2.3615 9.61694 2.3615 9.78801 2.41549 9.94558C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C11.255 15.3619 12.4422 15.0737 13.4994 14.5598L15.3625 16.4229C15.6554 16.7158 16.1302 16.7158 16.4231 16.4229C16.716 16.13 16.716 15.6551 16.4231 15.3622L4.63803 3.57709ZM12.3608 13.4212L10.4475 11.5079C10.3061 11.5423 10.1584 11.5606 10.0064 11.5606H9.99151C8.96527 11.5606 8.13333 10.7286 8.13333 9.70237C8.13333 9.5461 8.15262 9.39434 8.18895 9.24933L5.91885 6.97923C5.03505 7.69015 4.34057 8.62704 3.92328 9.70247C4.86803 12.1373 7.23361 13.8619 10.0002 13.8619C10.8326 13.8619 11.6287 13.7058 12.3608 13.4212ZM16.0771 9.70249C15.7843 10.4569 15.3552 11.1432 14.8199 11.7311L15.8813 12.7925C16.6329 11.9813 17.2187 11.0143 17.5849 9.94561C17.6389 9.78803 17.6389 9.61696 17.5849 9.45938C16.5055 6.30925 13.5184 4.04303 10.0002 4.04303C9.13525 4.04303 8.30244 4.17999 7.52218 4.43338L8.75139 5.66259C9.1556 5.58413 9.57311 5.54303 10.0002 5.54303C12.7667 5.54303 15.1323 7.26768 16.0771 9.70249Z" fill="#98A2B3" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <!-- Checkbox -->
                                <div>
                                    <div x-data="{ checkboxToggle: false }">
                                        <label for="checkboxLabelOne"
                                            class="flex cursor-pointer items-start text-sm font-normal text-gray-700 select-none dark:text-gray-400">
                                            <div class="relative">
                                                <input type="checkbox" id="checkboxLabelOne" class="sr-only" @change="checkboxToggle = !checkboxToggle" />
                                                <div :class="checkboxToggle ? 'border-brand-500 bg-brand-500' :
                                                    'bg-transparent border-gray-300 dark:border-gray-700'"
                                                    class="mr-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px]">
                                                    <span :class="checkboxToggle ? '' : 'opacity-0'">
                                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                            <p class="inline-block font-normal text-gray-500 dark:text-gray-400">
                                                By creating an account means you agree to the
                                                <span class="text-gray-800 dark:text-white/90">
                                                    Terms and Conditions,
                                                </span>
                                                and our
                                                <span class="text-gray-800 dark:text-white">
                                                    Privacy Policy
                                                </span>
                                            </p>
                                        </label>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div>
                                    <button
                                        class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 flex w-full items-center justify-center rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                                        Sign Up
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="mt-5">
                            <p class="text-center text-sm font-normal text-gray-700 sm:text-start dark:text-gray-400">
                                Already have an account?
                                <a href="/signin" class="text-brand-500 hover:text-brand-600 dark:text-brand-400">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-brand-950 relative hidden h-full w-full items-center lg:grid lg:w-1/2 dark:bg-white/5">
                <div class="z-1 flex items-center justify-center">
                    <!-- ===== Common Grid Shape Start ===== -->
                    <x-common.common-grid-shape />
                    <div class="flex max-w-xs flex-col items-center">
                        <a href="/" class="mb-4 block">
                            <img src="./images/logo/auth-logo.svg" alt="Logo" />
                        </a>
                        <p class="text-center text-gray-400 dark:text-white/60">
                            Free and Open-Source Tailwind CSS Admin Dashboard Template
                        </p>
                    </div>
                </div>
            </div>
            <!-- Toggler -->
            <div class="fixed right-6 bottom-6 z-50">
                <button
                    class="bg-brand-500 hover:bg-brand-600 inline-flex size-14 items-center justify-center rounded-full text-white transition-colors"
                    @click.prevent="$store.theme.toggle()">
                    <svg class="hidden fill-current dark:block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99998 1.5415C10.4142 1.5415 10.75 1.87729 10.75 2.2915V3.5415C10.75 3.95572 10.4142 4.2915 9.99998 4.2915C9.58577 4.2915 9.24998 3.95572 9.24998 3.5415V2.2915C9.24998 1.87729 9.58577 1.5415 9.99998 1.5415ZM10.0009 6.79327C8.22978 6.79327 6.79402 8.22904 6.79402 10.0001C6.79402 11.7712 8.22978 13.207 10.0009 13.207C11.772 13.207 13.2078 11.7712 13.2078 10.0001C13.2078 8.22904 11.772 6.79327 10.0009 6.79327ZM5.29402 10.0001C5.29402 7.40061 7.40135 5.29327 10.0009 5.29327C12.6004 5.29327 14.7078 7.40061 14.7078 10.0001C14.7078 12.5997 12.6004 14.707 10.0009 14.707C7.40135 14.707 5.29402 12.5997 5.29402 10.0001ZM15.9813 5.08035C16.2742 4.78746 16.2742 4.31258 15.9813 4.01969C15.6884 3.7268 15.2135 3.7268 14.9207 4.01969L14.0368 4.90357C13.7439 5.19647 13.7439 5.67134 14.0368 5.96423C14.3297 6.25713 14.8045 6.25713 15.0974 5.96423L15.9813 5.08035ZM18.4577 10.0001C18.4577 10.4143 18.1219 10.7501 17.7077 10.7501H16.4577C16.0435 10.7501 15.7077 10.4143 15.7077 10.0001C15.7077 9.58592 16.0435 9.25013 16.4577 9.25013H17.7077C18.1219 9.25013 18.4577 9.58592 18.4577 10.0001ZM14.9207 15.9806C15.2135 16.2735 15.6884 16.2735 15.9813 15.9806C16.2742 15.6877 16.2742 15.2128 15.9813 14.9199L15.0974 14.036C14.8045 13.7431 14.3297 13.7431 14.0368 14.036C13.7439 14.3289 13.7439 14.8038 14.0368 15.0967L14.9207 15.9806ZM9.99998 15.7088C10.4142 15.7088 10.75 16.0445 10.75 16.4588V17.7088C10.75 18.123 10.4142 18.4588 9.99998 18.4588C9.58577 18.4588 9.24998 18.123 9.24998 17.7088V16.4588C9.24998 16.0445 9.58577 15.7088 9.99998 15.7088ZM5.96356 15.0972C6.25646 14.8043 6.25646 14.3295 5.96356 14.0366C5.67067 13.7437 5.1958 13.7437 4.9029 14.0366L4.01902 14.9204C3.72613 15.2133 3.72613 15.6882 4.01902 15.9811C4.31191 16.274 4.78679 16.274 5.07968 15.9811L5.96356 15.0972ZM4.29224 10.0001C4.29224 10.4143 3.95645 10.7501 3.54224 10.7501H2.29224C1.87802 10.7501 1.54224 10.4143 1.54224 10.0001C1.54224 9.58592 1.87802 9.25013 2.29224 9.25013H3.54224C3.95645 9.25013 4.29224 9.58592 4.29224 10.0001ZM4.9029 5.9637C5.1958 6.25659 5.67067 6.25659 5.96356 5.9637C6.25646 5.6708 6.25646 5.19593 5.96356 4.90303L5.07968 4.01915C4.78679 3.72626 4.31191 3.72626 4.01902 4.01915C3.72613 4.31204 3.72613 4.78692 4.01902 5.07981L4.9029 5.9637Z" fill="" />
                    </svg>
                    <svg class="fill-current dark:hidden" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.4547 11.97L18.1799 12.1611C18.265 11.8383 18.1265 11.4982 17.8401 11.3266C17.5538 11.1551 17.1885 11.1934 16.944 11.4207L17.4547 11.97ZM8.0306 2.5459L8.57989 3.05657C8.80718 2.81209 8.84554 2.44682 8.67398 2.16046C8.50243 1.8741 8.16227 1.73559 7.83948 1.82066L8.0306 2.5459ZM12.9154 13.0035C9.64678 13.0035 6.99707 10.3538 6.99707 7.08524H5.49707C5.49707 11.1823 8.81835 14.5035 12.9154 14.5035V13.0035ZM16.944 11.4207C15.8869 12.4035 14.4721 13.0035 12.9154 13.0035V14.5035C14.8657 14.5035 16.6418 13.7499 17.9654 12.5193L16.944 11.4207ZM16.7295 11.7789C15.9437 14.7607 13.2277 16.9586 10.0003 16.9586V18.4586C13.9257 18.4586 17.2249 15.7853 18.1799 12.1611L16.7295 11.7789ZM10.0003 16.9586C6.15734 16.9586 3.04199 13.8433 3.04199 10.0003H1.54199C1.54199 14.6717 5.32892 18.4586 10.0003 18.4586V16.9586ZM3.04199 10.0003C3.04199 6.77289 5.23988 4.05695 8.22173 3.27114L7.83948 1.82066C4.21532 2.77574 1.54199 6.07486 1.54199 10.0003H3.04199ZM6.99707 7.08524C6.99707 5.52854 7.5971 4.11366 8.57989 3.05657L7.48132 2.03522C6.25073 3.35885 5.49707 5.13487 5.49707 7.08524H6.99707Z" fill="" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endsection
```

## File: `resources/views/pages/blank.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Blank Page" />
    <div class="min-h-screen rounded-2xl border border-gray-200 bg-white px-5 py-7 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12">
        <div class="mx-auto w-full max-w-[630px] text-center">
            <h3 class="mb-4 font-semibold text-gray-800 text-theme-xl dark:text-white/90 sm:text-2xl">
                Card Title Here
            </h3>

            <p class="text-sm text-gray-500 dark:text-gray-400 sm:text-base">
                Start putting content on grids or panels, you can also use different combinations of
                grids.Please check out the dashboard and other pages
            </p>
        </div>
    </div>
@endsection
```

## File: `resources/views/pages/calender.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Calender" />
    <x-calender-area />
@endsection
```

## File: `resources/views/pages/chart/bar-chart.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Bar chart" />
    <div class="space-y-6">
        <x-common.component-card title="Bar chart 1">
            <!-- ====== Bar Chart One Start -->
            <div class="custom-scrollbar max-w-full overflow-x-auto">
                <div id="chartOne" class="min-w-[1000px]"></div>
            </div>
            <!-- ====== Bar Chart One End -->
        </x-common.component-card>

        <x-common.component-card title="Bar chart 2">
            <!-- ====== Bar Chart Two Start -->
            <div class="custom-scrollbar max-w-full overflow-x-auto">
                <div id="chartSix" class="min-w-[1000px]"></div>
            </div>
            <!-- ====== Bar Chart Two End -->
        </x-common.component-card>
    </div>
@endsection
```

## File: `resources/views/pages/chart/line-chart.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Line chart" />
    <div class="space-y-6">
        <x-common.component-card title="Line chart 1">
            <!-- ====== Line Chart One Start -->
            <div class="custom-scrollbar max-w-full overflow-x-auto">
                <div id="chartThree" class="min-w-[1000px]"></div>
            </div>
            <!-- ====== Line Chart One End -->
        </x-common.component-card>

        <x-common.component-card title="Line chart 2">
            <!-- ====== Line Chart Two Start -->
            <div class="custom-scrollbar max-w-full overflow-x-auto">
                <div id="chartEight" class="min-w-[1000px]"></div>
            </div>
            <!-- ====== Line Chart Two End -->
        </x-common.component-card>

        <x-common.component-card title="Line chart 3">
            <!-- ====== Line Chart Three Start -->
            <div class="custom-scrollbar max-w-full overflow-x-auto">
                <div id="chartThirteen" class="min-w-[1000px]"></div>
            </div>
            <!-- ====== Line Chart Three End -->
        </x-common.component-card>
    </div>
@endsection
```

## File: `resources/views/pages/choice/index.blade.php`

```blade
@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-4xl py-10">
    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-black dark:text-white">Selamat Datang, {{ auth()->user()->nama }}</h1>
        <p class="mt-2 text-gray-500 dark:text-gray-400">Silakan pilih jenis layanan IT yang Anda butuhkan:</p>
    </div>

    <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
        {{-- TOMBOL 1: INCIDENT --}}
        <a href="{{ route('incidents.create') }}" class="group relative flex flex-col items-center justify-center rounded-2xl border border-stroke bg-white p-10 shadow-default transition-all hover:-translate-y-1 hover:border-primary hover:shadow-lg dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-red-100 text-red-600 transition-colors group-hover:bg-red-600 group-hover:text-white dark:bg-red-900/30 dark:text-red-400 dark:group-hover:bg-red-600 dark:group-hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
            </div>
            <h3 class="mb-3 text-xl font-bold text-black dark:text-white">Lapor Kendala (Incident)</h3>
            <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                Gunakan ini jika ada kerusakan hardware, software, atau jaringan yang bersifat <span class="font-semibold text-red-500">mendesak</span> dan butuh perbaikan.
            </p>
        </a>

        {{-- TOMBOL 2: REQUEST --}}
        <a href="{{ route('requests.create') }}" class="group relative flex flex-col items-center justify-center rounded-2xl border border-stroke bg-white p-10 shadow-default transition-all hover:-translate-y-1 hover:border-primary hover:shadow-lg dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-blue-100 text-blue-600 transition-colors group-hover:bg-blue-600 group-hover:text-white dark:bg-blue-900/30 dark:text-blue-400 dark:group-hover:bg-blue-600 dark:group-hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z" />
                </svg>
            </div>
            <h3 class="mb-3 text-xl font-bold text-black dark:text-white">Permintaan Layanan (Request)</h3>
            <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                Gunakan ini untuk kebutuhan non-kendala seperti: Link Zoom, Reset Password, atau Peminjaman Perangkat.
            </p>
        </a>
    </div>

    {{-- Link cepat ke riwayat untuk pelapor --}}
    <div class="mt-10 text-center">
        <a href="{{ route('incidents.index') }}" class="text-sm font-medium text-primary hover:underline">Lihat Riwayat Laporan Saya &rarr;</a>
    </div>
</div>
@endsection
```

## File: `resources/views/pages/dashboard/ecommerce.blade.php`

```blade
@extends('layouts.app')

@section('content')
  <div class="grid grid-cols-12 gap-4 md:gap-6">
    <div class="col-span-12 space-y-6 xl:col-span-7">
      <x-ecommerce.ecommerce-metrics />
      <x-ecommerce.monthly-sale />
    </div>
    <div class="col-span-12 xl:col-span-5">
        <x-ecommerce.monthly-target />
    </div>

    <div class="col-span-12">
      <x-ecommerce.statistics-chart />
    </div>

    <div class="col-span-12 xl:col-span-5">
      <x-ecommerce.customer-demographic />
    </div>

    <div class="col-span-12 xl:col-span-7">
      <x-ecommerce.recent-orders />
    </div>
  </div>
@endsection
```

## File: `resources/views/pages/dashboard/index.blade.php`

```blade
@extends('layouts.app')

@section('content')
@php
    $cards = [
        [
            'title' => 'Total Incident', 'value' => $totalIncident,
            'bg' => 'rgba(60, 80, 224, 0.08)', 'icon' => '#3C50E0',
            'svg' => '<path d="M21.3 6.7c-.3-1.4-1.5-2.4-2.9-2.4H16c-.3-2.3-2.2-4-4.5-4S7.3 2 7 4.3H5.6c-1.4 0-2.6 1-2.9 2.4l-.7 4.1V20c0 1.7 1.3 3 3 3h14c1.7 0 3-1.3 3-3v-9.2l-.7-4.1zM11.5 1.9c1.4 0 2.6 1.1 2.7 2.5H8.8c.1-1.4 1.3-2.5 2.7-2.5zm7.9 18.6c0 .8-.7 1.5-1.5 1.5h-14c-.8 0-1.5-.7-1.5-1.5v-9.1l.7-4.1c.2-.7.8-1.1 1.5-1.1h1.3v1.4c0 .4.3.8.8.8s.8-.3.8-.8V6.3h5.4v1.4c0 .4.3.8.8.8s.8-.3.8-.8V6.3h1.3c.7 0 1.3.5 1.5 1.1l.7 4.1v9.1z"/>',
            'delta' => $statsDelta['incident']['delta'], 'period' => 'Bulan ini: ' . $statsDelta['incident']['value'],
        ],
        [
            'title' => 'Total Request', 'value' => $totalRequest,
            'bg' => 'rgba(65, 177, 251, 0.1)', 'icon' => '#41B1FB',
            'svg' => '<path d="M14.5 15.2c-.6 0-1.2.5-1.2 1.2s.5 1.2 1.2 1.2 1.2-.5 1.2-1.2-.6-1.2-1.2-1.2zM9.5 15.2c-.6 0-1.2.5-1.2 1.2s.5 1.2 1.2 1.2 1.2-.5 1.2-1.2-.6-1.2-1.2-1.2zM21.6 5.8c-.2-.3-.5-.5-.9-.5H5c-.7 0-1.2.6-1.1 1.3.1.6.7 1.1 1.4 1h14.5l1.9 8.2c.2.9-.4 1.7-1.3 1.7H6.6c-.9 0-1.5-.8-1.3-1.7L6.6 8.4H4.8L3.3 9.9c-.4.4-.6 1-.5 1.5l1.4 7.1c.1.6.7 1.1 1.4 1.1h.4c-.1.4-.2.8-.2 1.2 0 1.5 1.2 2.7 2.7 2.7s2.7-1.2 2.7-2.7c0-.4-.1-.8-.3-1.2h3.5c-.1.4-.3.8-.3 1.2 0 1.5 1.2 2.7 2.7 2.7s2.7-1.2 2.7-2.7c0-.4-.1-.8-.3-1.2h1.6c1.9 0 3.4-1.8 3-3.7l-2.2-9.1c-.1-.6-.4-1-.7-1zM7.7 21.7c-.7 0-1.3-.6-1.3-1.3s.6-1.3 1.3-1.3 1.3.6 1.3 1.3-.6 1.3-1.3 1.3zm8.6 0c-.7 0-1.3-.6-1.3-1.3s.6-1.3 1.3-1.3 1.3.6 1.3 1.3-.6 1.3-1.3 1.3z"/>',
            'delta' => $statsDelta['request']['delta'], 'period' => 'Bulan ini: ' . $statsDelta['request']['value'],
        ],
        [
            'title' => 'Belum / Sedang Diproses', 'value' => $statusIncident['Belum diperiksa'] + $statusIncident['Sedang diproses'],
            'bg' => 'rgba(251, 191, 36, 0.1)', 'icon' => '#FBBF24',
            'svg' => '<path d="M12 1a11 11 0 1 0 11 11A11 11 0 0 0 12 1zm0 20a9 9 0 1 1 9-9 9 9 0 0 1-9 9zm.9-9.4V5.8a.9.9 0 0 0-1.8 0v6.2a1 1 0 0 0 .5.8l4.1 2.4a.9.9 0 1 0 .9-1.6z"/>',
            'delta' => null, 'period' => 'Menunggu penanganan tim IT',
        ],
        [
            'title' => 'Incident Selesai', 'value' => $statusIncident['Selesai'],
            'bg' => 'rgba(77, 168, 99, 0.1)', 'icon' => '#4DA863',
            'svg' => '<path d="M12 1a11 11 0 1 0 11 11A11 11 0 0 0 12 1zm5.4 8.2-6 6a1 1 0 0 1-1.4 0l-3-3a1 1 0 1 1 1.4-1.4l2.3 2.3 5.3-5.3a1 1 0 0 1 1.4 1.4z"/>',
            'delta' => null, 'period' => 'Ditolak: ' . $statusIncident['Ditolak'],
        ],
    ];

    $charts = [
        ['id' => 'incidentTrendChart',  'title' => 'Tren Incident',               'sub' => '6 bulan terakhir',            'span' => 'xl:col-span-7'],
        ['id' => 'resolutionChart',     'title' => 'Metode Penyelesaian',         'sub' => 'Cara incident diselesaikan',  'span' => 'xl:col-span-5'],
        ['id' => 'requestLayananChart', 'title' => 'Request per Jenis Layanan',   'sub' => 'Jumlah request tiap layanan', 'span' => 'xl:col-span-7'],
        ['id' => 'requestStatusChart',  'title' => 'Distribusi Status Request',   'sub' => 'Proporsi status saat ini',    'span' => 'xl:col-span-5'],
    ];

    $badge = [
        'Belum diperiksa' => 'bg-danger/10 text-danger',
        'Sedang diproses' => 'bg-warning/10 text-warning',
        'Selesai'         => 'bg-success/10 text-success',
        'Ditolak'         => 'bg-gray-200 text-gray-600 dark:bg-meta-4 dark:text-gray-300',
    ];
@endphp

<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">

    {{-- HEADER --}}
    <div class="mb-6">
        <h2 class="text-title-md2 font-semibold text-black dark:text-white">Dashboard Tim IT</h2>
        <p class="mt-1 text-sm font-medium text-gray-500 dark:text-gray-400">Ringkasan operasional dan pemantauan layanan IT.</p>
    </div>

    {{-- 1. STAT CARDS (gaya CRM TailAdmin) --}}
    <div class="mb-6 grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
        @foreach($cards as $card)
        <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full"
                 style="background-color: {{ $card['bg'] }}; color: {{ $card['icon'] }}">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    {!! $card['svg'] !!}
                </svg>
            </div>

            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white">{{ number_format($card['value']) }}</h4>
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $card['title'] }}</span>
                </div>

                @if(!is_null($card['delta']))
                <span class="flex items-center gap-1 text-sm font-medium {{ $card['delta'] >= 0 ? 'text-success' : 'text-danger' }}">
                    {{ abs($card['delta']) }}%
                    <svg width="10" height="11" viewBox="0 0 10 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        @if($card['delta'] >= 0)
                            <path d="M5 0L10 6H0L5 0Z"/>
                        @else
                            <path d="M5 11L0 5H10L5 11Z"/>
                        @endif
                    </svg>
                </span>
                @endif
            </div>

            <p class="mt-3 border-t border-stroke pt-3 text-xs font-medium text-gray-400 dark:border-strokedark dark:text-gray-500">{{ $card['period'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- 2. CHARTS --}}
    <div class="mb-6 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">
        @foreach($charts as $c)
        <div class="col-span-12 {{ $c['span'] }} rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5">
            <div class="mb-4">
                <h4 class="text-xl font-semibold text-black dark:text-white">{{ $c['title'] }}</h4>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $c['sub'] }}</p>
            </div>
            <div id="{{ $c['id'] }}" class="min-h-[320px] w-full"></div>
        </div>
        @endforeach
    </div>

    {{-- 3. TABEL TERBARU --}}
    <div class="grid grid-cols-1 gap-4 md:gap-6 xl:grid-cols-2 2xl:gap-7.5">

        {{-- Incident --}}
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex items-center justify-between px-6 py-5 sm:px-7.5">
                <h4 class="text-xl font-semibold text-black dark:text-white">Incident Terbaru</h4>
                <a href="{{ route('incidents.index') }}" class="text-sm font-medium text-primary hover:underline">Lihat Semua</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full table-auto text-left">
                    <thead>
                        <tr class="bg-gray-2 text-sm dark:bg-meta-4">
                            <th class="px-6 py-3 font-medium text-black dark:text-white sm:px-7.5">Nomor</th>
                            <th class="px-4 py-3 font-medium text-black dark:text-white">Pelapor</th>
                            <th class="px-4 py-3 font-medium text-black dark:text-white">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentIncidents as $ticket)
                        <tr class="border-t border-stroke text-sm dark:border-strokedark">
                            <td class="px-6 py-4 font-medium text-black dark:text-white sm:px-7.5">{{ $ticket->nomor_aduan }}</td>
                            <td class="px-4 py-4 text-gray-600 dark:text-gray-400">{{ $ticket->pelapor->nama ?? '-' }}</td>
                            <td class="px-4 py-4">
                                <span class="inline-flex rounded-full px-3 py-1 text-xs font-medium {{ $badge[$ticket->status] ?? $badge['Ditolak'] }}">
                                    {{ $ticket->status }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="px-6 py-6 text-center text-sm text-gray-500 dark:text-gray-400">Belum ada data.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Request --}}
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex items-center justify-between px-6 py-5 sm:px-7.5">
                <h4 class="text-xl font-semibold text-black dark:text-white">Request Terbaru</h4>
                <a href="{{ route('requests.index') }}" class="text-sm font-medium text-primary hover:underline">Lihat Semua</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full table-auto text-left">
                    <thead>
                        <tr class="bg-gray-2 text-sm dark:bg-meta-4">
                            <th class="px-6 py-3 font-medium text-black dark:text-white sm:px-7.5">Nomor</th>
                            <th class="px-4 py-3 font-medium text-black dark:text-white">Pemohon</th>
                            <th class="px-4 py-3 font-medium text-black dark:text-white">Layanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentRequests as $request)
                        <tr class="border-t border-stroke text-sm dark:border-strokedark">
                            <td class="px-6 py-4 font-medium text-black dark:text-white sm:px-7.5">{{ $request->nomor_request }}</td>
                            <td class="px-4 py-4 text-gray-600 dark:text-gray-400">{{ $request->user->nama ?? '-' }}</td>
                            <td class="px-4 py-4 text-gray-600 dark:text-gray-400">{{ ucfirst($request->layanan) }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="px-6 py-6 text-center text-sm text-gray-500 dark:text-gray-400">Belum ada data.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const apexInstances = {};

    function getApexTheme() {
        const isDark = document.documentElement.classList.contains('dark');
        return {
            isDark,
            text: isDark ? '#AEB7C0' : '#64748B',
            grid: isDark ? '#2E3A47' : '#E2E8F0',
            primary: '#3C50E0', secondary: '#41B1FB', success: '#4DA863',
            warning: '#FBBF24', danger: '#FA5656', sky: '#0EA5E9',
        };
    }

    function baseOptions(c) {
        return {
            chart: {
                fontFamily: 'Satoshi, inherit', foreColor: c.text, background: 'transparent',
                toolbar: { show: false }, animations: { enabled: true, speed: 500 },
            },
            theme: { mode: c.isDark ? 'dark' : 'light' },
            grid: { borderColor: c.grid, strokeDashArray: 4 },
            dataLabels: { enabled: false },
            tooltip: { theme: c.isDark ? 'dark' : 'light', y: { formatter: v => v } },
            legend: {
                position: 'bottom', fontSize: '13px', labels: { colors: c.text },
                markers: { width: 10, height: 10, radius: 12 },
                itemMargin: { horizontal: 8, vertical: 4 },
            },
            noData: { style: { color: c.text, fontSize: '14px' } },
        };
    }

    function renderCharts() {
        Object.values(apexInstances).forEach(ch => ch.destroy());
        const c = getApexTheme();
        const base = baseOptions(c);
        const axisLabels = { style: { colors: c.text, fontSize: '12px' } };

        apexInstances.trend = new ApexCharts(document.querySelector('#incidentTrendChart'), {
            ...base,
            chart: { ...base.chart, type: 'bar', height: 320 },
            series: [{ name: 'Jumlah Incident', data: @json($incidentTrend) }],
            colors: [c.primary],
            xaxis: { categories: @json($last6Months), labels: axisLabels, axisBorder: { show: false }, axisTicks: { show: false } },
            yaxis: { forceNiceScale: true, labels: { ...axisLabels, formatter: v => Math.round(v) } },
            plotOptions: { bar: { columnWidth: '40%', borderRadius: 4, borderRadiusApplication: 'end' } },
            grid: { ...base.grid, xaxis: { lines: { show: false } } },
        });

        apexInstances.resolution = new ApexCharts(document.querySelector('#resolutionChart'), {
            ...base,
            chart: { ...base.chart, type: 'donut', height: 320 },
            series: @json($resolutionData['data']),
            labels: @json($resolutionData['labels']),
            colors: [c.success, c.warning],
            stroke: { show: false },
            dataLabels: { enabled: false },
            plotOptions: { pie: { donut: { size: '72%', labels: { show: true, total: { show: true, label: 'Total', fontSize: '14px', color: c.text } } } } },
        });

        apexInstances.layanan = new ApexCharts(document.querySelector('#requestLayananChart'), {
            ...base,
            chart: { ...base.chart, type: 'bar', height: 320 },
            series: [{ name: 'Jumlah Request', data: @json($layananData['data']) }],
            colors: [c.secondary],
            plotOptions: { bar: { horizontal: true, barHeight: '50%', borderRadius: 4, borderRadiusApplication: 'end' } },
            xaxis: { categories: @json($layananData['labels']), labels: axisLabels },
            yaxis: { labels: axisLabels },
            grid: { ...base.grid, yaxis: { lines: { show: false } } },
        });

        apexInstances.status = new ApexCharts(document.querySelector('#requestStatusChart'), {
            ...base,
            chart: { ...base.chart, type: 'donut', height: 320 },
            series: @json($requestStatusData['data']),
            labels: @json($requestStatusData['labels']),
            colors: [c.warning, c.sky, c.success, c.danger],
            stroke: { show: false },
            plotOptions: { pie: { donut: { size: '72%', labels: { show: true, total: { show: true, label: 'Total', fontSize: '14px', color: c.text } } } } },
        });

        Object.values(apexInstances).forEach(ch => ch.render());
    }

    document.addEventListener('DOMContentLoaded', renderCharts);

    // Render ulang chart saat dark mode di-toggle (class 'dark' pada <html>)
    new MutationObserver(() => renderCharts())
        .observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
</script>
@endpush
@endsection
```

## File: `resources/views/pages/errors/error-404.blade.php`

```blade
@extends('layouts.fullscreen-layout')

@section('content')
@php
    $currentYear = date('Y');
@endphp
  <div class="relative flex flex-col items-center justify-center min-h-screen p-6 overflow-hidden z-1">
      {{-- common grid shape --}}
      <x-common.common-grid-shape />
      <!-- Centered Content -->
      <div class="mx-auto w-full max-w-[242px] text-center sm:max-w-[472px]">
          <h1 class="mb-8 font-bold text-gray-800 text-title-md dark:text-white/90 xl:text-title-2xl">
              ERROR
          </h1>

          <img src="/images/error/404.svg" alt="404" class="dark:hidden" />
          <img src="/images/error/404-dark.svg" alt="404" class="hidden dark:block" />

          <p class="mt-10 mb-6 text-base text-gray-700 dark:text-gray-400 sm:text-lg">
              We can't seem to find the page you are looking for!
          </p>

          <a href="/"
              class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3.5 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
              Back to Home Page
          </a>
      </div>
      <!-- Footer -->
      <p class="absolute text-sm text-center text-gray-500 -translate-x-1/2 bottom-6 left-1/2 dark:text-gray-400">
          &copy; {{ $currentYear }} - TailAdmin
      </p>
  </div>
@endsection
```

## File: `resources/views/pages/form/form-elements.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="From Elements" />
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
        <div class="space-y-6">
            <x-form.form-elements.default-inputs />
            <x-form.form-elements.select-inputs />
            <x-form.form-elements.text-area-inputs />
            <x-form.form-elements.input-states />
        </div>
        <div class="space-y-6">
            <x-form.form-elements.input-group />
            <x-form.form-elements.file-input-example />
            <x-form.form-elements.checkbox-component />
            <x-form.form-elements.radio-buttons />
            <x-form.form-elements.toggle-switch />
            <x-form.form-elements.dropzone />
        </div>
    </div>
@endsection
```

## File: `resources/views/pages/profile.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <div x-data="{ isProfileInfoModal: false, isProfileAddressModal: false }">
        <x-common.page-breadcrumb pageTitle="User Profile" />

        <div class="rounded-2xl border border-gray-200 bg-white p-5 lg:p-6 dark:border-gray-800 dark:bg-white/[0.03]">
            <h3 class="mb-5 text-lg font-semibold text-gray-800 lg:mb-7 dark:text-white/90">
                My Profile
            </h3>

            <!-- Info -->
            <div class="mb-6 rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800">
                <div class="flex flex-col gap-5 sm:flex-row xl:gap-10">
                    <div class="flex-1">
                        <div class="mb-6 flex flex-col gap-5 sm:flex-row xl:items-center xl:justify-between">
                            <div class="flex w-full flex-col items-start gap-6 sm:flex-row sm:items-center">
                                <div class="border-gray-20 overflow-hidden rounded-full border dark:border-gray-800">
                                    <img src="{{ asset('images/user/owner.png') }}" class="size-20" alt="user" />
                                </div>
                                <div class="text-start">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 dark:text-white/90">
                                        Musharof Chowdhury
                                    </h4>
                                    <div class="flex items-center gap-1 sm:gap-3">
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Team Manager
                                        </p>
                                        <div class="hidden h-3.5 w-px bg-gray-300 sm:block dark:bg-gray-700"></div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Arizona, United States.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative grid max-w-4xl grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4 xl:gap-x-11 xl:gap-y-7">
                            <div class="w-full">
                                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                                    First Name
                                </p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    Chowdury
                                </p>
                            </div>
                            <div class="w-full">
                                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                                    Last Name
                                </p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    Musharof
                                </p>
                            </div>
                            <div class="hidden xl:block"></div>
                            <div class="hidden xl:block"></div>
                            <div>
                                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                                    Email address
                                </p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    randomuser@pimjo.com
                                </p>
                            </div>
                            <div>
                                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                                    Phone
                                </p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    +09 363 398 46
                                </p>
                            </div>
                            <div>
                                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                                    Bio
                                </p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    Team Manager
                                </p>
                            </div>
                            <div>
                                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                                    Social Links
                                </p>
                                <div class="flex grow items-center gap-4">
                                    <a href="#"
                                        class="shadow-theme-xs size-5 text-sm font-medium text-gray-700 hover:text-gray-500 dark:text-gray-400 dark:hover:text-gray-200">
                                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20"
                                            height="20" viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M11.6666 11.2503H13.7499L14.5833 7.91699H11.6666V6.25033C11.6666 5.39251 11.6666 4.58366 13.3333 4.58366H14.5833V1.78374C14.3118 1.7477 13.2858 1.66699 12.2023 1.66699C9.94025 1.66699 8.33325 3.04771 8.33325 5.58342V7.91699H5.83325V11.2503H8.33325V18.3337H11.6666V11.2503Z"
                                                fill="currentColor" />
                                        </svg>
                                    </a>
                                    <a href="#"
                                        class="shadow-theme-xs size-5 text-sm font-medium text-gray-700 hover:text-gray-500 dark:text-gray-400 dark:hover:text-gray-200">
                                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20"
                                            height="20" viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M14.7066 2.60449H17.2158L11.734 8.8699L18.1829 17.3957H13.1334L9.1785 12.2248L4.65318 17.3957H2.14247L8.00586 10.6941L1.81934 2.60449H6.99702L10.5719 7.33085L14.7066 2.60449ZM13.826 15.8938H15.2164L6.24153 4.02748H4.74951L13.826 15.8938Z"
                                                fill="currentColor" />
                                        </svg>
                                    </a>
                                    <a href="#"
                                        class="shadow-theme-xs size-5 text-sm font-medium text-gray-700 hover:text-gray-500 dark:text-gray-400 dark:hover:text-gray-200">
                                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20"
                                            height="20" viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M5.78381 4.16645C5.78351 4.84504 5.37181 5.45569 4.74286 5.71045C4.11391 5.96521 3.39331 5.81321 2.92083 5.32613C2.44836 4.83904 2.31837 4.11413 2.59216 3.49323C2.86596 2.87233 3.48886 2.47942 4.16715 2.49978C5.06804 2.52682 5.78422 3.26515 5.78381 4.16645ZM5.83381 7.06645H2.50048V17.4998H5.83381V7.06645ZM11.1005 7.06645H7.78381V17.4998H11.0672V12.0248C11.0672 8.97475 15.0422 8.69142 15.0422 12.0248V17.4998H18.3338V10.8914C18.3338 5.74978 12.4505 5.94145 11.0672 8.46642L11.1005 7.06645Z"
                                                fill="currentColor" />
                                        </svg>
                                    </a>
                                    <a href="#"
                                        class="shadow-theme-xs size-5 text-sm font-medium text-gray-700 hover:text-gray-500 dark:text-gray-400 dark:hover:text-gray-200">
                                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20"
                                            height="20" viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M10.8567 1.66699C11.7946 1.66854 12.2698 1.67351 12.6805 1.68573L12.8422 1.69102C13.0291 1.69766 13.2134 1.70599 13.4357 1.71641C14.3224 1.75738 14.9273 1.89766 15.4586 2.10391C16.0078 2.31572 16.4717 2.60183 16.9349 3.06503C17.3974 3.52822 17.6836 3.99349 17.8961 4.54141C18.1016 5.07197 18.2419 5.67753 18.2836 6.56433C18.2935 6.78655 18.3015 6.97088 18.3081 7.15775L18.3133 7.31949C18.3255 7.73011 18.3311 8.20543 18.3328 9.1433L18.3335 9.76463C18.3336 9.84055 18.3336 9.91888 18.3336 9.99972L18.3335 10.2348L18.333 10.8562C18.3314 11.794 18.3265 12.2694 18.3142 12.68L18.3089 12.8417C18.3023 13.0286 18.294 13.213 18.2836 13.4351C18.2426 14.322 18.1016 14.9268 17.8961 15.458C17.6842 16.0074 17.3974 16.4713 16.9349 16.9345C16.4717 17.397 16.0057 17.6831 15.4586 17.8955C14.9273 18.1011 14.3224 18.2414 13.4357 18.2831C13.2134 18.293 13.0291 18.3011 12.8422 18.3076L12.6805 18.3128C12.2698 18.3251 11.7946 18.3306 10.8567 18.3324L10.2353 18.333C10.1594 18.333 10.0811 18.333 10.0002 18.333H9.76516L9.14375 18.3325C8.20591 18.331 7.7306 18.326 7.31997 18.3137L7.15824 18.3085C6.97136 18.3018 6.78703 18.2935 6.56481 18.2831C5.67801 18.2421 5.07384 18.1011 4.5419 17.8955C3.99328 17.6838 3.5287 17.397 3.06551 16.9345C2.60231 16.4713 2.3169 16.0053 2.1044 15.458C1.89815 14.9268 1.75856 14.322 1.7169 13.4351C1.707 13.213 1.69892 13.0286 1.69238 12.8417L1.68714 12.68C1.67495 12.2694 1.66939 11.794 1.66759 10.8562L1.66748 9.1433C1.66903 8.20543 1.67399 7.73011 1.68621 7.31949L1.69151 7.15775C1.69815 6.97088 1.70648 6.78655 1.7169 6.56433C1.75786 5.67683 1.89815 5.07266 2.1044 4.54141C2.3162 3.9928 2.60231 3.52822 3.06551 3.06503C3.5287 2.60183 3.99398 2.31641 4.5419 2.10391C5.07315 1.89766 5.67731 1.75808 6.56481 1.71641C6.78703 1.70652 6.97136 1.69844 7.15824 1.6919L7.31997 1.68666C7.7306 1.67446 8.20591 1.6689 9.14375 1.6671L10.8567 1.66699ZM10.0002 5.83308C7.69781 5.83308 5.83356 7.69935 5.83356 9.99972C5.83356 12.3021 7.69984 14.1664 10.0002 14.1664C12.3027 14.1664 14.1669 12.3001 14.1669 9.99972C14.1669 7.69732 12.3006 5.83308 10.0002 5.83308ZM10.0002 7.49974C11.381 7.49974 12.5002 8.61863 12.5002 9.99972C12.5002 11.3805 11.3813 12.4997 10.0002 12.4997C8.6195 12.4997 7.50023 11.3809 7.50023 9.99972C7.50023 8.61897 8.61908 7.49974 10.0002 7.49974ZM14.3752 4.58308C13.8008 4.58308 13.3336 5.04967 13.3336 5.62403C13.3336 6.19841 13.8002 6.66572 14.3752 6.66572C14.9496 6.66572 15.4169 6.19913 15.4169 5.62403C15.4169 5.04967 14.9488 4.58236 14.3752 4.58308Z"
                                                fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button @click="isProfileInfoModal = true"
                            class="shadow-theme-xs flex h-10 w-full items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 lg:inline-flex lg:w-auto dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z"
                                    fill="" />
                            </svg>
                            Edit
                        </button>
                    </div>
                </div>
            </div>

            <!-- Address -->
            <div class="mb-6 rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800">
                <div class="flex flex-col gap-6 sm:flex-row lg:items-start lg:justify-between">
                    <div class="flex-1">
                        <h4 class="text-lg font-semibold text-gray-800 lg:mb-6 dark:text-white/90">
                            Address
                        </h4>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:gap-7 2xl:gap-x-32">
                            <div>
                                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                                    Country
                                </p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    United States
                                </p>
                            </div>

                            <div>
                                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                                    City/State
                                </p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    Arizona, United States.
                                </p>
                            </div>

                            <div>
                                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                                    Postal Code
                                </p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    ERT 2489
                                </p>
                            </div>

                            <div>
                                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                                    TAX ID
                                </p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    AS4568384
                                </p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button @click="isProfileAddressModal = true"
                            class="shadow-theme-xs flex h-10 w-full items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 lg:inline-flex lg:w-auto dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z"
                                    fill="" />
                            </svg>
                            Edit
                        </button>
                    </div>
                </div>
            </div>

            <!-- Security -->
            <div class="mb-6 rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800">
                <h4 class="text-lg font-semibold text-gray-800 lg:mb-6 dark:text-white/90">
                    Security
                </h4>
                <div>
                    <div
                        class="flex flex-col justify-between gap-4 border-b border-gray-200 py-4 first:pt-0 last:border-b-0 last:pb-0 sm:flex-row sm:items-end dark:border-gray-800">
                        <div>
                            <span class="mb-1 block text-base font-medium text-gray-800 dark:text-white/90">Change Password</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Receive real-time notifications and team alerts.
                            </p>
                        </div>
                        <div>
                            <button
                                class="shadow-theme-xs flex h-10 items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white py-2.5 pr-4 pl-3.5 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/3 dark:hover:text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path
                                        d="M12.3861 5.08087L14.9182 7.61296M15.6437 3.5917L16.408 4.35603C16.8962 4.84419 16.8962 5.63564 16.408 6.1238L7.83547 14.6963C7.69039 14.8414 7.51182 14.9486 7.31554 15.0083L3.97461 16.0251L4.99141 12.6842C5.05115 12.4879 5.15829 12.3093 5.30337 12.1642L13.8759 3.5917C14.3641 3.10355 15.1555 3.10355 15.6437 3.5917Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                Change Password
                            </button>
                        </div>
                    </div>
                    <div
                        class="flex flex-col justify-between gap-4 border-b border-gray-200 py-4 first:pt-0 last:border-b-0 last:pb-0 sm:flex-row sm:items-end dark:border-gray-800">
                        <div>
                            <span class="mb-1 block text-base font-medium text-gray-800 dark:text-white/90">Two-factor authentication (2FA)</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Keep your account secure by enabling 2FA
                            </p>
                        </div>
                        <div x-data="{ switcherToggle: false }">
                            <label for="toggle1"
                                class="flex cursor-pointer items-center gap-3 text-sm font-medium text-gray-700 select-none dark:text-gray-400">
                                <div class="relative">
                                    <input type="checkbox" id="toggle1" class="sr-only"
                                        @change="switcherToggle = !switcherToggle" />
                                    <div class="block h-5 w-9 rounded-full"
                                        :class="switcherToggle ? 'bg-brand-500 dark:bg-brand-500' :
                                            'bg-gray-200 dark:bg-white/10'"></div>
                                    <div :class="switcherToggle ? 'ltr:translate-x-full rtl:-translate-x-full' : 'translate-x-0'"
                                        class="shadow-theme-sm absolute top-0.5 ltr:left-0.5 rtl:right-0.5 h-4 w-4 rounded-full bg-white duration-200 ease-linear">
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="mb-6 rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800">
                <h4 class="text-lg font-semibold text-gray-800 lg:mb-6 dark:text-white/90">
                    Danger Zone
                </h4>
                <div>
                    <div
                        class="flex flex-col justify-between gap-4 border-b border-gray-200 py-4 first:pt-0 last:border-b-0 last:pb-0 sm:flex-row sm:items-end dark:border-gray-800">
                        <div>
                            <span class="mb-1 block text-base font-medium text-gray-800 dark:text-white/90">Logout all devices</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Sign out from every active session.
                            </p>
                        </div>
                        <div>
                            <button
                                class="shadow-theme-xs flex h-10 items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white py-2.5 pr-4 pl-3.5 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/3 dark:hover:text-gray-200">
                                <svg class="rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path
                                        d="M3.33325 10.0003L9.79159 10.0003M6.66599 6.66699L3.33488 10.0002L6.66599 13.3337M8.12492 4.16374V3.54199C8.12492 2.85164 8.68456 2.29199 9.37492 2.29199H14.3749C15.0653 2.29199 15.6249 2.85164 15.6249 3.54199V16.4587C15.6249 17.149 15.0653 17.7087 14.3749 17.7087H9.37492C8.68456 17.7087 8.12492 17.149 8.12492 16.4587V15.8337"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                Logout
                            </button>
                        </div>
                    </div>
                    <div
                        class="flex flex-col justify-between gap-4 border-b border-gray-200 py-4 first:pt-0 last:border-b-0 last:pb-0 sm:flex-row sm:items-end dark:border-gray-800">
                        <div>
                            <span class="mb-1 block text-base font-medium text-gray-800 dark:text-white/90">Delete account</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Once you delete your account, there is no going back. Please be certain.
                            </p>
                        </div>
                        <div>
                            <button
                                class="border-error-500 text-error-500 hover:bg-error-100 dark:border-error-500/15 inline-flex h-10 cursor-pointer items-center justify-center gap-2 rounded-lg border px-3.5 py-2.5 pr-4 pl-3.5 text-sm font-medium transition-all dark:hover:bg-red-500/15">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path
                                        d="M4.37492 4.79199V16.4587C4.37492 17.149 4.93456 17.7087 5.62492 17.7087H14.3749C15.0653 17.7087 15.6249 17.149 15.6249 16.4587V4.79199M3.33325 4.79199H16.6658M4.37492 13.2466V8.24658M15.6249 13.2466V8.24658M8.33325 13.7503V8.75033M11.6666 13.7503V8.75033M12.7078 4.79199V3.54199C12.7078 2.85164 12.1482 2.29199 11.4578 2.29199H8.54118C7.85082 2.29199 7.29118 2.85164 7.29118 3.54199V4.79199H12.7078Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                Delete account
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- BEGIN MODAL: Profile Info -->
    <div x-show="isProfileInfoModal" x-cloak
        class="fixed inset-0 z-99999 flex items-center justify-center overflow-y-auto p-5">
        <div class="fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
        <div @click.outside="isProfileInfoModal = false"
            class="no-scrollbar relative w-full max-w-[700px] overflow-y-auto rounded-3xl bg-white p-4 lg:p-11 dark:bg-gray-900">
            <!-- close btn -->
            <button @click="isProfileInfoModal = false"
                class="transition-color absolute top-5 ltr:right-5 rtl:left-5 z-999 flex h-11 w-11 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-600 dark:bg-gray-700 dark:bg-white/[0.05] dark:text-gray-400 dark:hover:bg-white/[0.07] dark:hover:text-gray-300">
                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z"
                        fill="" />
                </svg>
            </button>
            <div class="px-2 ltr:pr-14 rtl:pl-14">
                <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90">
                    Edit Personal Information
                </h4>
                <p class="mb-6 text-sm text-gray-500 lg:mb-7 dark:text-gray-400">
                    Update your details to keep your profile up-to-date.
                </p>
            </div>
            <form class="flex flex-col">
                <div class="custom-scrollbar h-[450px] overflow-y-auto px-2">
                    <div>
                        <h4 class="mb-6 text-lg font-medium text-gray-800 dark:text-white/90">
                            Change Profile Picture
                        </h4>
                        <div class="mb-6 flex max-w-sm items-center gap-6 lg:pr-5">
                            <div class="relative size-20 shrink-0 rounded-full sm:size-25">
                                <img src="{{ asset('images/user/owner.png') }}" alt="Profile Picture"
                                    class="size-20 rounded-full object-cover sm:size-25" />
                                <label for="file-upload"
                                    class="absolute right-0 bottom-0 flex size-8 cursor-pointer items-center justify-center rounded-full border border-gray-200 bg-white text-gray-500 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400">
                                    <input type="file" name="file-upload" id="file-upload" class="hidden" />
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.6731 3.41904C12.4371 3.10308 12.0659 2.91699 11.6715 2.91699H8.32809C7.93374 2.91699 7.56252 3.10308 7.32656 3.41904L6.83173 4.08164C6.59576 4.3976 6.22454 4.58369 5.83019 4.58369H3.5415C2.85115 4.58369 2.2915 5.14333 2.2915 5.83369V14.3754C2.2915 15.0657 2.85115 15.6254 3.5415 15.6254H16.4582C17.1485 15.6254 17.7082 15.0657 17.7082 14.3754V5.83369C17.7082 5.14333 17.1485 4.58369 16.4582 4.58369H14.1694C13.7751 4.58369 13.4039 4.3976 13.1679 4.08164L12.6731 3.41904Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M13.3332 9.79362C13.3332 11.6346 11.8408 13.127 9.99984 13.127C8.15889 13.127 6.6665 11.6346 6.6665 9.79362C6.6665 7.95267 8.15889 6.46029 9.99984 6.46029C11.8408 6.46029 13.3332 7.95267 13.3332 9.79362Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </label>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Upload a square image (200×200 px) in JPEG or PNG format.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <h4 class="mb-5 text-lg font-medium text-gray-800 lg:mb-6 dark:text-white/90">
                            Personal Information
                        </h4>
                        <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
                            <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    First Name
                                </label>
                                <input type="text" value="Musharof"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>

                            <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Last Name
                                </label>
                                <input type="text" value="Chowdhury"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>

                            <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Email address
                                </label>
                                <input type="text" value="randomuser@pimjo.com"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>

                            <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Phone
                                </label>
                                <input type="text" value="+09 363 398 46"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>

                            <div class="col-span-2">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Bio
                                </label>
                                <input type="text" value="Team Manager"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <h5 class="mb-5 text-lg font-medium text-gray-800 lg:mb-6 dark:text-white/90">
                            Social Links
                        </h5>

                        <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Facebook
                                </label>
                                <input type="text" value="https://www.facebook.com/PimjoHQ"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>

                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    X.com
                                </label>
                                <input type="text" value="https://x.com/PimjoHQ"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>

                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Linkedin
                                </label>
                                <input type="text" value="https://linkedin.com/PimjoHQ"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>

                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Instagram
                                </label>
                                <input type="text" value="https://instagram.com/PimjoHQ"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center gap-3 px-2 lg:justify-end">
                    <button @click="isProfileInfoModal = false" type="button"
                        class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 sm:w-auto dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]">
                        Close
                    </button>
                    <button type="button"
                        class="bg-brand-500 hover:bg-brand-600 flex w-full justify-center rounded-lg px-4 py-2.5 text-sm font-medium text-white sm:w-auto">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- END MODAL: Profile Info -->

    <!-- BEGIN MODAL: Profile Address -->
    <div x-show="isProfileAddressModal" x-cloak
        class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto z-99999">
        <div class="fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
        <div @click.outside="isProfileAddressModal = false"
            class="no-scrollbar relative flex w-full max-w-[700px] flex-col overflow-y-auto rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-11">
            <!-- close btn -->
            <button @click="isProfileAddressModal = false"
                class="transition-color absolute ltr:right-5 rtl:left-5 top-5 z-999 flex h-11 w-11 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-600 dark:bg-gray-700 dark:bg-white/[0.05] dark:text-gray-400 dark:hover:bg-white/[0.07] dark:hover:text-gray-300">
                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z"
                        fill="" />
                </svg>
            </button>

            <div class="px-2 ltr:pr-14 rtl:pl-14">
                <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90">
                    Edit Address
                </h4>
                <p class="mb-6 text-sm text-gray-500 dark:text-gray-400 lg:mb-7">
                    Update your details to keep your profile up-to-date.
                </p>
            </div>
            <form class="flex flex-col">
                <div class="px-2 overflow-y-auto custom-scrollbar">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Country
                            </label>
                            <input type="text" value="United States"
                                class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                City/State
                            </label>
                            <input type="text" value="Arizona, United States."
                                class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Postal Code
                            </label>
                            <input type="text" value="ERT 2489"
                                class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                TAX ID
                            </label>
                            <input type="text" value="AS4568384"
                                class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3 mt-6 lg:justify-end">
                    <button @click="isProfileAddressModal = false" type="button"
                        class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto">
                        Close
                    </button>
                    <button type="button"
                        class="flex w-full justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 sm:w-auto">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- END MODAL: Profile Address -->
    </div>
@endsection
```

## File: `resources/views/pages/tables/basic-tables.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="From Elements" />
    <div class="space-y-6">
        <x-common.component-card title="Basic Table 1">
            <x-tables.basic-tables.basic-tables-one />
        </x-common.component-card>
        <x-common.component-card title="Basic Table 2">
            <x-tables.basic-tables.basic-tables-two />
        </x-common.component-card>
        <x-common.component-card title="Basic Table 3">
            <x-tables.basic-tables.basic-tables-three />
        </x-common.component-card>
        <x-common.component-card title="Basic Table 4">
            <x-tables.basic-tables.basic-tables-four />
        </x-common.component-card>
        <x-common.component-card title="Basic Table 5">
            <x-tables.basic-tables.basic-tables-five />
        </x-common.component-card>
    </div>
@endsection
```

## File: `resources/views/pages/ui-elements/alerts.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Alerts" />

    <div class="space-y-5 sm:space-y-6">
        {{-- Success Alert --}}
        <x-common.component-card title="Success Alert">
            <div class="space-y-4">
                <x-ui.alert
                    variant="success"
                    title="Success Message"
                    message="Be cautious when performing this action."
                    :showLink="true"
                    linkHref="/"
                    linkText="Learn more"
                />

                <x-ui.alert
                    variant="success"
                    title="Success Message"
                    message="Be cautious when performing this action."
                    :showLink="false"
                />
            </div>
        </x-common.component-card>

        {{-- Warning Alert --}}
        <x-common.component-card title="Warning Alert">
            <div class="space-y-4">
                <x-ui.alert
                    variant="warning"
                    title="Warning Message"
                    message="Be cautious when performing this action."
                    :showLink="true"
                    linkHref="/"
                    linkText="Learn more"
                />

                <x-ui.alert
                    variant="warning"
                    title="Warning Message"
                    message="Be cautious when performing this action."
                    :showLink="false"
                />
            </div>
        </x-common.component-card>

        {{-- Error Alert --}}
        <x-common.component-card title="Error Alert">
            <div class="space-y-4">
                <x-ui.alert
                    variant="error"
                    title="Error Message"
                    message="Be cautious when performing this action."
                    :showLink="true"
                    linkHref="/"
                    linkText="Learn more"
                />

                <x-ui.alert
                    variant="error"
                    title="Error Message"
                    message="Be cautious when performing this action."
                    :showLink="false"
                />
            </div>
        </x-common.component-card>

        {{-- Info Alert --}}
        <x-common.component-card title="Info Alert">
            <div class="space-y-4">
                <x-ui.alert
                    variant="info"
                    title="Info Message"
                    message="Be cautious when performing this action."
                    :showLink="true"
                    linkHref="/"
                    linkText="Learn more"
                />

                <x-ui.alert
                    variant="info"
                    title="Info Message"
                    message="Be cautious when performing this action."
                    :showLink="false"
                />
            </div>
        </x-common.component-card>

        {{-- Additional Examples --}}
        <x-common.component-card title="Alert Variations">
            <div class="space-y-4">
                {{-- With Slot Content --}}
                <x-ui.alert variant="success" title="Custom Content Alert">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        This alert uses <strong class="text-gray-900 dark:text-white">custom slot content</strong>
                        instead of the message prop.
                    </p>
                    <ul class="mt-2 text-sm text-gray-500 dark:text-gray-400 list-disc list-inside">
                        <li>You can add any HTML content</li>
                        <li>Including lists and formatting</li>
                        <li>Perfect for complex messages</li>
                    </ul>
                </x-alert>

                {{-- Minimal Alert --}}
                <x-ui.alert
                    variant="info"
                    title="Quick Info"
                    message="Sometimes you just need a simple message."
                />

                {{-- Alert with Long Message --}}
                <x-ui.alert
                    variant="warning"
                    title="Important Notice"
                    message="This is a longer message that provides more detailed information about the warning. You should read this carefully before proceeding with your action."
                    :showLink="true"
                    linkHref="/docs"
                    linkText="View documentation"
                />
            </div>
        </x-common.component-card>

        {{-- Interactive Demo --}}
        <x-common.component-card title="Real-World Examples">
            <div class="space-y-4">
                {{-- Payment Success --}}
                <x-ui.alert variant="success" title="Payment Successful">
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                        Your payment of <strong class="text-gray-900 dark:text-white">$99.00</strong> has been processed successfully.
                    </p>
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        <p><strong>Order ID:</strong> #TAILADMIN-0014</p>
                        <p><strong>Transaction ID:</strong> TXN-1234567890</p>
                    </div>
                    <a href="/orders" class="inline-block mt-3 text-sm font-medium text-green-600 dark:text-green-400 underline hover:text-green-700">
                        View Order Details
                    </a>
                </x-alert>

                {{-- Account Warning --}}
                <x-ui.alert
                    variant="warning"
                    title="Your trial is ending soon"
                    message="Your 14-day trial will expire in 3 days. Upgrade now to continue using all features."
                    :showLink="true"
                    linkHref="/billing"
                    linkText="Upgrade now"
                />

                {{-- Validation Error --}}
                <x-ui.alert variant="error" title="Form Validation Failed">
                    <ul class="text-sm text-gray-500 dark:text-gray-400 list-disc list-inside space-y-1">
                        <li>Email field is required</li>
                        <li>Password must be at least 8 characters</li>
                        <li>Please accept the terms and conditions</li>
                    </ul>
                </x-alert>

                {{-- System Info --}}
                <x-ui.alert
                    variant="info"
                    title="Scheduled Maintenance"
                    message="Our system will undergo maintenance on November 15, 2025 from 2:00 AM to 4:00 AM EST. Some features may be unavailable during this time."
                    :showLink="true"
                    linkHref="/status"
                    linkText="Check status page"
                />
            </div>
        </x-common.component-card>
    </div>
@endsection
```

## File: `resources/views/pages/ui-elements/avatars.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Avatars" />
    
    @php
        $avatarSrc = asset('images/user/user-01.jpg');
        $sizes = ['xsmall', 'small', 'medium', 'large', 'xlarge', 'xxlarge'];
    @endphp

    <div class="space-y-5 sm:space-y-6">
        {{-- Default Avatar --}}
        <x-common.component-card title="Default Avatar">
            <div class="flex flex-col items-center justify-center gap-5 sm:flex-row">
                @foreach($sizes as $size)
                    <x-ui.avatar 
                        :src="$avatarSrc"
                        :size="$size"
                    />
                @endforeach
            </div>
        </x-common.component-card>

        {{-- Avatar with Online Indicator --}}
        <x-common.component-card title="Avatar with online indicator">
            <div class="flex flex-col items-center justify-center gap-5 sm:flex-row">
                @foreach($sizes as $size)
                    <x-ui.avatar 
                        :src="$avatarSrc"
                        :size="$size"
                        status="online"
                    />
                @endforeach
            </div>
        </x-common.component-card>

        {{-- Avatar with Offline Indicator --}}
        <x-common.component-card title="Avatar with Offline indicator">
            <div class="flex flex-col items-center justify-center gap-5 sm:flex-row">
                @foreach($sizes as $size)
                    <x-ui.avatar 
                        :src="$avatarSrc"
                        :size="$size"
                        status="offline"
                    />
                @endforeach
            </div>
        </x-common.component-card>

        {{-- Avatar with Busy Indicator --}}
        <x-common.component-card title="Avatar with busy indicator">
            <div class="flex flex-col items-center justify-center gap-5 sm:flex-row">
                @foreach($sizes as $size)
                    <x-ui.avatar 
                        :src="$avatarSrc"
                        :size="$size"
                        status="busy"
                    />
                @endforeach
            </div>
        </x-common.component-card>
    </div>
@endsection
```

## File: `resources/views/pages/ui-elements/badges.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Badges" />

    @php
        use Illuminate\Support\HtmlString;
        $colors = ['primary', 'success', 'error', 'warning', 'info', 'light', 'dark'];

        $plusIcon = new HtmlString('<svg class="fill-current" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.25012 3C5.25012 2.58579 5.58591 2.25 6.00012 2.25C6.41433 2.25 6.75012 2.58579 6.75012 3V5.25012L9.00034 5.25012C9.41455 5.25012 9.75034 5.58591 9.75034 6.00012C9.75034 6.41433 9.41455 6.75012 9.00034 6.75012H6.75012V9.00034C6.75012 9.41455 6.41433 9.75034 6.00012 9.75034C5.58591 9.75034 5.25012 9.41455 5.25012 9.00034L5.25012 6.75012H3C2.58579 6.75012 2.25 6.41433 2.25 6.00012C2.25 5.58591 2.58579 5.25012 3 5.25012H5.25012V3Z" fill=""></path>
    </svg>');
    @endphp

    <div class="space-y-5 sm:space-y-6">
        <x-common.component-card title="With Light Background">
            <div class="flex flex-wrap gap-4 sm:items-center sm:justify-center">
                @foreach ($colors as $color)
                    <x-ui.badge :color="$color">
                        {{ $color }}
                    </x-ui.badge>
                @endforeach
            </div>
        </x-common.component-card>

        <x-common.component-card title="With Solid Background">
            <div class="flex flex-wrap gap-4 sm:items-center sm:justify-center">
                @foreach ($colors as $color)
                    <x-ui.badge :color="$color" variant="solid">
                        {{ $color }}
                    </x-ui.badge>
                @endforeach
            </div>
        </x-common.component-card>

        <x-common.component-card title="Light Background with Left Icon">
            <div class="flex flex-wrap gap-4 sm:items-center sm:justify-center">
                @foreach ($colors as $color)
                    <x-ui.badge :color="$color" :startIcon="$plusIcon">
                        {{ $color }}
                    </x-ui.badge>
                @endforeach
            </div>
        </x-common.component-card>

        <x-common.component-card title="Solid Background with Left Icon">
            <div class="flex flex-wrap gap-4 sm:items-center sm:justify-center">
                @foreach ($colors as $color)
                    <x-ui.badge :color="$color" variant="solid" :startIcon="$plusIcon">
                        {{ $color }}
                    </x-ui.badge>
                @endforeach
            </div>
        </x-common.component-card>

        <x-common.component-card title="Light Background with Right Icon">
            <div class="flex flex-wrap gap-4 sm:items-center sm:justify-center">
                @foreach ($colors as $color)
                    <x-ui.badge :color="$color" :endIcon="$plusIcon">
                        {{ $color }}
                    </x-ui.badge>
                @endforeach
            </div>
        </x-common.component-card>

        <x-common.component-card title="Solid Background with Right Icon">
            <div class="flex flex-wrap gap-4 sm:items-center sm:justify-center">
                @foreach ($colors as $color)
                    <x-ui.badge :color="$color" variant="solid" :endIcon="$plusIcon">
                        {{ $color }}
                    </x-ui.badge>
                @endforeach
            </div>
        </x-common.component-card>
    </div>
@endsection
```

## File: `resources/views/pages/ui-elements/buttons.blade.php`

```blade
@extends('layouts.app')

@php
    use Illuminate\Support\HtmlString;

    // Page title
    $currentPageTitle = 'Buttons';

    // Define BoxIcon once as an HtmlString (so it won’t get escaped)
    $BoxIcon = new HtmlString('
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M9.77692 3.24224C9.91768 3.17186 10.0834 3.17186 10.2241 3.24224L15.3713 5.81573L10.3359 8.33331C10.1248 8.43888 9.87626 8.43888 9.66512 8.33331L4.6298 5.81573L9.77692 3.24224ZM3.70264 7.0292V13.4124C3.70264 13.6018 3.80964 13.775 3.97903 13.8597L9.25016 16.4952L9.25016 9.7837C9.16327 9.75296 9.07782 9.71671 8.99432 9.67496L3.70264 7.0292ZM10.7502 16.4955V9.78396C10.8373 9.75316 10.923 9.71683 11.0067 9.67496L16.2984 7.0292V13.4124C16.2984 13.6018 16.1914 13.775 16.022 13.8597L10.7502 16.4955ZM9.41463 17.4831L9.10612 18.1002C9.66916 18.3817 10.3319 18.3817 10.8949 18.1002L16.6928 15.2013C17.3704 14.8625 17.7984 14.17 17.7984 13.4124V6.58831C17.7984 5.83076 17.3704 5.13823 16.6928 4.79945L10.8949 1.90059C10.3319 1.61908 9.66916 1.61907 9.10612 1.90059L9.44152 2.57141L9.10612 1.90059L3.30823 4.79945C2.63065 5.13823 2.20264 5.83076 2.20264 6.58831V13.4124C2.20264 14.17 2.63065 14.8625 3.30823 15.2013L9.10612 18.1002L9.41463 17.4831Z"
                fill="currentColor"
            />
        </svg>
    ');
@endphp

@section('content')
    {{-- Page Breadcrumb --}}
    <x-common.page-breadcrumb :pageTitle="$currentPageTitle" />

    <div class="space-y-5 sm:space-y-6">

        {{-- Primary Buttons --}}
        <x-common.component-card title="Primary Button">
            <div class="flex items-center gap-5">
                <x-ui.button size="sm" variant="primary">Button Text</x-ui.button>
                <x-ui.button size="md" variant="primary">Button Text</x-ui.button>
            </div>
        </x-common.component-card>

        {{-- Primary Button with Left Icon --}}
        <x-common.component-card title="Primary Button with Left Icon">
            <div class="flex items-center gap-5">
                <x-ui.button size="sm" variant="primary" :startIcon="$BoxIcon">Button Text</x-ui.button>
                <x-ui.button size="md" variant="primary" :startIcon="$BoxIcon">Button Text</x-ui.button>
            </div>
        </x-common.component-card>

        {{-- Primary Button with Right Icon --}}
        <x-common.component-card title="Primary Button with Right Icon">
            <div class="flex items-center gap-5">
                <x-ui.button size="sm" variant="primary" :endIcon="$BoxIcon">Button Text</x-ui.button>
                <x-ui.button size="md" variant="primary" :endIcon="$BoxIcon">Button Text</x-ui.button>
            </div>
        </x-common.component-card>

        {{-- Outline Buttons --}}
        <x-common.component-card title="Outline Button">
            <div class="flex items-center gap-5">
                <x-ui.button size="sm" variant="outline">Button Text</x-ui.button>
                <x-ui.button size="md" variant="outline">Button Text</x-ui.button>
            </div>
        </x-common.component-card>

        {{-- Outline Button with Left Icon --}}
        <x-common.component-card title="Outline Button with Left Icon">
            <div class="flex items-center gap-5">
                <x-ui.button size="sm" variant="outline" :startIcon="$BoxIcon">Button Text</x-ui.button>
                <x-ui.button size="md" variant="outline" :startIcon="$BoxIcon">Button Text</x-ui.button>
            </div>
        </x-common.component-card>

        {{-- Outline Button with Right Icon --}}
        <x-common.component-card title="Outline Button with Right Icon">
            <div class="flex items-center gap-5">
                <x-ui.button size="sm" variant="outline" :endIcon="$BoxIcon">Button Text</x-ui.button>
                <x-ui.button size="md" variant="outline" :endIcon="$BoxIcon">Button Text</x-ui.button>
            </div>
        </x-common.component-card>

    </div>
@endsection
```

## File: `resources/views/pages/ui-elements/images.blade.php`

```blade
@extends('layouts.app')

@php
    $images = [
        [
            'src' => asset('images/grid-image/image-04.png'),
            'alt' => 'Grid image 1',
        ],
        [
            'src' => asset('images/grid-image/image-05.png'),
            'alt' => 'Grid image 2',
        ],
        [
            'src' => asset('images/grid-image/image-06.png'),
            'alt' => 'Grid image 3',
        ],
    ];
@endphp

@section('content')
    {{-- Page Breadcrumb --}}
    <x-common.page-breadcrumb pageTitle="Images" />

    <div class="space-y-5 sm:space-y-6">

        <x-common.component-card title="Responsive Image">
            <div class="relative">
                <div id="pane" class="overflow-hidden">
                    <img src="{{ asset('images/grid-image/image-01.png') }}" alt="Cover"
                        class="w-full border border-gray-200 rounded-xl dark:border-gray-800" />
                </div>
                <div id="ghostpane" class="absolute top-0 left-0 duration-300 ease-in-out"></div>
            </div>
        </x-common.component-card>

        <x-common.component-card title="Image in 2 Grid">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div>
                    <img src="{{ asset('images/grid-image/image-02.png') }}" alt="grid"
                        class="w-full border border-gray-200 rounded-xl dark:border-gray-800" />
                </div>

                <div>
                    <img src="{{ asset('images/grid-image/image-03.png') }}" alt="grid"
                        class="w-full border border-gray-200 rounded-xl dark:border-gray-800" />
                </div>
            </div>
        </x-common.component-card>

        <x-common.component-card title="Image in 3 Grid">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                @foreach ($images as $image)
                    <div>
                        <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}"
                            class="w-full border border-gray-200 rounded-xl dark:border-gray-800" />
                    </div>
                @endforeach
            </div>
        </x-common.component-card>

    </div>
@endsection
```

## File: `resources/views/pages/ui-elements/videos.blade.php`

```blade

@extends('layouts.app')

@section('content')
    {{-- Page Breadcrumb --}}
    <x-common.page-breadcrumb pageTitle="Videos" />

    <div class="grid grid-cols-1 gap-5 sm:gap-6 xl:grid-cols-2">

        <div class="space-y-5 sm:space-y-6">
            <x-common.component-card title="Video Ratio 16:9">
                <x-ui.youtube-embed videoId="dQw4w9WgXcQ" />
            </x-common.component-card>

            <x-common.component-card title="Video Ratio 4:3">
                <x-ui.youtube-embed videoId="dQw4w9WgXcQ" aspectRatio="4:3" />
            </x-common.component-card>
        </div>

        <div class="space-y-5 sm:space-y-6">
            <x-common.component-card title="Video Ratio 21:9">
                <x-ui.youtube-embed videoId="dQw4w9WgXcQ" aspectRatio="21:9" />
            </x-common.component-card>
            <x-common.component-card title="Video Ratio 1:1">
                <x-ui.youtube-embed videoId="dQw4w9WgXcQ" aspectRatio="1:1" />
            </x-common.component-card>
        </div>

    </div>
@endsection
```

## File: `resources/views/requests/all.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Semua Request" />

    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-gray-200 dark:border-gray-800 text-sm text-gray-500 dark:text-gray-400">
                    <th class="px-5 py-4 font-medium">Nomor</th>
                    <th class="px-5 py-4 font-medium">Judul</th>
                    <th class="px-5 py-4 font-medium">Pemohon</th>
                    <th class="px-5 py-4 font-medium">Kategori</th>
                    <th class="px-5 py-4 font-medium">Prioritas</th>
                    <th class="px-5 py-4 font-medium">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($requests as $req)
                    <tr class="border-b border-gray-100 last:border-0 dark:border-gray-800 text-sm hover:bg-gray-50 dark:hover:bg-white/[0.03] cursor-pointer"
                        onclick="window.location='{{ route('requests.show', $req->id) }}'">
                        <td class="px-5 py-4 font-medium text-gray-800 dark:text-white/90">{{ $req->nomor_request }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400 max-w-xs truncate">{{ $req->layanan ? ucfirst($req->layanan) : "-" }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $req->user?->nama ?? '-' }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $req->lokasi ?? "-" }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400"></td>
                        <td class="px-5 py-4">
                            <span class="inline-block rounded-full bg-gray-100 px-3 py-1 text-xs font-medium capitalize text-gray-700 dark:bg-gray-800 dark:text-gray-400">{{ $req->status }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-5 py-10 text-center text-sm text-gray-500 dark:text-gray-400">Belum ada request.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
```

## File: `resources/views/requests/create.blade.php`

```blade
@extends('layouts.app') {{-- Sesuaikan dengan layout utama Anda --}}

@section('content')
<div class="mx-auto max-w-4xl">
    
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-semibold text-black dark:text-white">Lapor Request (Layanan IT)</h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li><a class="font-medium text-primary" href="{{ route('dashboard') }}">Dashboard /</a></li>
                <li class="font-medium text-gray-500">Buat Request</li>
            </ol>
        </nav>
    </div>

    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-800">
            <h3 class="font-medium text-black dark:text-white">Formulir Permintaan Layanan</h3>
        </div>
        
        <div class="p-6.5">
            <!-- Alpine.js Data untuk Form Dinamis -->
            {{-- Nilai awal `layanan` dibaca langsung dari elemen select (bukan via string Blade)
                 agar atribut x-data tidak pernah rusak oleh karakter kutip → Alpine selalu init. --}}
            <form action="{{ route('requests.store') }}" method="POST"
                x-data="{ layanan: $el.querySelector('[name=layanan]') ? $el.querySelector('[name=layanan]').value : '' }">
                @csrf

                @if ($errors->any())
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
                        <p class="mb-1 font-medium">Perbaiki kesalahan berikut:</p>
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Error dari controller (mis. gagal simpan ke database) --}}
                @if (session('error'))
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-600 dark:border-red-800/40 dark:bg-red-800/15 dark:text-red-400">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- SECTION 1: Data Umum -->
                <div class="mb-6">
                    <h4 class="mb-4 text-lg font-semibold text-black dark:text-white">Informasi Umum</h4>
                    <div class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                        
                        <!-- Nama Pelapor -->
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Nama Pelapor</label>
                            <input type="text" value="{{ auth()->user()->nama }}" readonly class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        </div>

                        <!-- Tanggal -->
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Tanggal Request</label>
                            <input type="text" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" readonly class="w-full rounded-lg border-[1.5px] border-stroke bg-gray-100 py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        </div>

                        <!-- Jenis Layanan -->
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jenis Layanan <span class="text-meta-1">*</span></label>
                            <select x-model="layanan" name="layanan" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="">-- Pilih Layanan --</option>
                                <option value="zoom" {{ old('layanan') == 'zoom' ? 'selected' : '' }}>Permintaan Link Zoom Meeting</option>
                                <option value="akun" {{ old('layanan') == 'akun' ? 'selected' : '' }}>Reset Password Aplikasi (Srikandi/SIPT)</option>
                                <option value="peminjaman" {{ old('layanan') == 'peminjaman' ? 'selected' : '' }}>Peminjaman Perangkat IT</option>
                                <option value="konsultasi" {{ old('layanan') == 'konsultasi' ? 'selected' : '' }}>Konsultasi / Asistensi IT</option>
                                <option value="operator" {{ old('layanan') == 'operator' ? 'selected' : '' }}>Permintaan Operator Kegiatan</option>
                            </select>
                            @error('layanan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Lokasi -->
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Lokasi <span class="text-meta-1">*</span></label>
                            <select name="lokasi" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="">-- Pilih Lokasi --</option>
                                @foreach($lokasis as $lokasi)
                                    <option value="{{ $lokasi }}" {{ old('lokasi') == $lokasi ? 'selected' : '' }}>{{ $lokasi }}</option>
                                @endforeach
                            </select>
                            @error('lokasi') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Deskripsi Umum -->
                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Deskripsi Tambahan</label>
                            <textarea name="deskripsi" rows="3" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black outline-none transition focus:border-primary dark:border-gray-800 dark:bg-gray-900 dark:text-white">{{ old('deskripsi') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- SECTION 2: Form Dinamis Zoom -->
                <div x-show="layanan === 'zoom'" x-transition class="mb-6 rounded-lg border border-stroke p-5 dark:border-gray-800">
                    <h4 class="mb-4 text-lg font-semibold text-black dark:text-white">Detail Zoom Meeting</h4>
                    <div class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                        
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Bidang <span class="text-meta-1">*</span></label>
                            <select name="bidang_id" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="">-- Pilih Bidang --</option>
                                @foreach($bidangs as $bidang)
                                    <option value="{{ $bidang->id }}" {{ old('bidang_id') == $bidang->id ? 'selected' : '' }}>{{ $bidang->nama_bidang }}</option>
                                @endforeach
                            </select>
                            @error('bidang_id') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Nama Acara <span class="text-meta-1">*</span></label>
                            <input type="text" name="nama_acara" value="{{ old('nama_acara') }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('nama_acara') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jam Mulai <span class="text-meta-1">*</span></label>
                            <input type="time" name="jam_mulai" value="{{ old('jam_mulai') }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('jam_mulai') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jam Selesai <span class="text-meta-1">*</span></label>
                            <input type="time" name="jam_selesai" value="{{ old('jam_selesai') }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('jam_selesai') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jenis Acara <span class="text-meta-1">*</span></label>
                            <select name="jenis_acara" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="Rapat" {{ old('jenis_acara') == 'Rapat' ? 'selected' : '' }}>Rapat</option>
                                <option value="Webinar" {{ old('jenis_acara') == 'Webinar' ? 'selected' : '' }}>Webinar</option>
                                <option value="Hybrid" {{ old('jenis_acara') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                            </select>
                            @error('jenis_acara') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Butuh Operator? <span class="text-meta-1">*</span></label>
                            <select name="butuh_operator" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="Tidak" {{ old('butuh_operator') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                <option value="Ya" {{ old('butuh_operator') == 'Ya' ? 'selected' : '' }}>Ya</option>
                            </select>
                            @error('butuh_operator') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Bentuk Ruangan <span class="text-meta-1">*</span></label>
                            <select name="bentuk_ruangan" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="Classroom" {{ old('bentuk_ruangan') == 'Classroom' ? 'selected' : '' }}>Classroom</option>
                                <option value="Shape U" {{ old('bentuk_ruangan') == 'Shape U' ? 'selected' : '' }}>Shape U</option>
                                <option value="Theater" {{ old('bentuk_ruangan') == 'Theater' ? 'selected' : '' }}>Theater</option>
                            </select>
                            @error('bentuk_ruangan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jumlah Kursi <span class="text-meta-1">*</span></label>
                            {{-- `required` dihapus: input ini tersembunyi untuk layanan non-Zoom sehingga memblokir submit.
                                 Validasi tetap dilakukan server (required_if:layanan,zoom). --}}
                            <input type="number" name="jumlah_kursi" value="{{ old('jumlah_kursi') }}" min="1" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('jumlah_kursi') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- SECTION 3: Form Dinamis Akun (Reset Password) -->
                <div x-show="layanan === 'akun'" x-transition class="mb-6 rounded-lg border border-stroke p-5 dark:border-gray-800">
                    <h4 class="mb-4 text-lg font-semibold text-black dark:text-white">Detail Reset Password</h4>
                    <div class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jenis Pengajuan <span class="text-meta-1">*</span></label>
                            <select name="jenis_pengajuan" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="Reset Password" {{ old('jenis_pengajuan') == 'Reset Password' ? 'selected' : '' }}>Reset Password</option>
                                <option value="Buat Akun Baru" {{ old('jenis_pengajuan') == 'Buat Akun Baru' ? 'selected' : '' }}>Buat Akun Baru</option>
                            </select>
                            @error('jenis_pengajuan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Sistem Tujuan <span class="text-meta-1">*</span></label>
                            <select name="sistem_tujuan" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <option value="Srikandi" {{ old('sistem_tujuan') == 'Srikandi' ? 'selected' : '' }}>Srikandi</option>
                                <option value="SIPT" {{ old('sistem_tujuan') == 'SIPT' ? 'selected' : '' }}>SIPT</option>
                            </select>
                            @error('sistem_tujuan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">NIP Terkait <span class="text-meta-1">*</span></label>
                            <input type="text" name="nip_terkait" value="{{ old('nip_terkait') }}" placeholder="Masukkan NIP pemilik akun" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('nip_terkait') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- SECTION 4: Form Dinamis Peminjaman -->
                <div x-show="layanan === 'peminjaman'" x-transition class="mb-6 rounded-lg border border-stroke p-5 dark:border-gray-800">
                    <h4 class="mb-4 text-lg font-semibold text-black dark:text-white">Detail Peminjaman Perangkat</h4>
                    <div class="grid grid-cols-1 gap-4.5 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Jenis Perangkat <span class="text-meta-1">*</span></label>
                            <input type="text" name="jenis_perangkat" value="{{ old('jenis_perangkat') }}" placeholder="Contoh: Laptop, Proyektor, Sound System" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('jenis_perangkat') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Tanggal Mulai <span class="text-meta-1">*</span></label>
                            <input type="date" name="tgl_mulai" value="{{ old('tgl_mulai') }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('tgl_mulai') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Tanggal Kembali <span class="text-meta-1">*</span></label>
                            <input type="date" name="tgl_kembali" value="{{ old('tgl_kembali') }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('tgl_kembali') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Keperluan <span class="text-meta-1">*</span></label>
                            <textarea name="keperluan" rows="2" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">{{ old('keperluan') }}</textarea>
                            @error('keperluan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Lokasi Penggunaan <span class="text-meta-1">*</span></label>
                            <input type="text" name="lokasi_penggunaan" value="{{ old('lokasi_penggunaan') }}" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 text-black dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                            @error('lokasi_penggunaan') <p class="mt-1 text-sm text-meta-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="flex justify-end border-t border-stroke pt-5 dark:border-gray-800">
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-[#10B981] rounded-lg font-medium text-white text-sm hover:bg-green-700 transition">
                        Tambah Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
```

## File: `resources/views/requests/index.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Request Saya" />

    <div class="mb-6 flex justify-end">
        <a href="{{ route('requests.create') }}"
            class="inline-flex items-center px-5 py-2.5 bg-[#10B981] rounded-lg font-medium text-white text-sm hover:bg-green-700 transition">
            + Buat Request Baru
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700 dark:border-green-800/40 dark:bg-green-800/15 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-gray-200 dark:border-gray-800 text-sm text-gray-500 dark:text-gray-400">
                    <th class="px-5 py-4 font-medium">Nomor</th>
                    <th class="px-5 py-4 font-medium">Layanan</th>
                    <th class="px-5 py-4 font-medium">Lokasi</th>
                    
                    <th class="px-5 py-4 font-medium">Tanggal</th>
                    <th class="px-5 py-4 font-medium">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($requests as $req)
                    <tr class="border-b border-gray-100 last:border-0 dark:border-gray-800 text-sm hover:bg-gray-50 dark:hover:bg-white/[0.03] cursor-pointer"
                        onclick="window.location='{{ route('requests.show', $req->id) }}'">
                        <td class="px-5 py-4 font-medium text-gray-800 dark:text-white/90">{{ $req->nomor_request }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400 max-w-xs truncate">{{ $req->layanan ? ucfirst($req->layanan) : "-" }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $req->lokasi ?? "-" }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-400">{{ $req->tgl_request?->format('d/m/Y') ?? '-' }}</td>
                        <td class="px-5 py-4">
                            @php
                                $statusBadge = match ($req->status) {
                                    'Selesai' => 'bg-green-100 text-green-700 dark:bg-green-800/20 dark:text-green-400',
                                    'Diproses' => 'bg-blue-100 text-blue-700 dark:bg-blue-800/20 dark:text-blue-400',
                                    'Ditolak' => 'bg-red-100 text-red-700 dark:bg-red-800/20 dark:text-red-400',
                                    default => 'bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-400',
                                };
                            @endphp
                            <span class="inline-block rounded-full px-3 py-1 text-xs font-medium capitalize {{ $statusBadge }}">{{ $req->status }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-5 py-10 text-center text-sm text-gray-500 dark:text-gray-400">
                            Belum ada request. Klik "Buat Request Baru" untuk mengajukan permintaan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
```

## File: `resources/views/requests/show.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Detail Request {{ $req->nomor_request }}" />

    <div class="mb-6">
        <a href="{{ url()->previous() }}" class="text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400">&larr; Kembali</a>
    </div>

    <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
        <dl class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
            <div><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nomor</dt><dd class="text-base text-gray-800 dark:text-white/90">{{ $req->nomor_request }}</dd></div>
            <div><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</dt><dd class="text-base capitalize text-gray-800 dark:text-white/90">{{ $req->status }}</dd></div>
            <div><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Judul</dt><dd class="text-base text-gray-800 dark:text-white/90">{{ $req->deskripsi ?? "-" }}</dd></div>
            <div><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Kategori / Prioritas</dt><dd class="text-base text-gray-800 dark:text-white/90">{{ ucfirst($req->layanan ?? "-") }}</dd></div>
            <div><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Permintaan</dt><dd class="text-base text-gray-800 dark:text-white/90">{{ $req->tgl_request?->format('d/m/Y H:i') ?? '-' }}</dd></div>
            <div><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Ditagihkan Ke</dt><dd class="text-base text-gray-800 dark:text-white/90">{{ $req->user?->nama ?? '-' }}</dd></div>
            <div class="sm:col-span-2"><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Lokasi</dt><dd class="text-base text-gray-800 dark:text-white/90">{{ $req->lokasi ?? '-' }}</dd></div>
            <div class="sm:col-span-2"><dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi</dt><dd class="text-base whitespace-pre-line text-gray-800 dark:text-white/90">{{ $req->deskripsi }}</dd></div>
        </dl>
    </div>
@endsection
```

## File: `routes/console.php`

```php
<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
```

## File: `routes/web.php`

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\ServiceRequestController;


// =========================
// AUTHENTICATION
// =========================

Route::middleware('guest')->group(function () {

    Route::get('/signin', [LoginController::class, 'showLoginForm'])
        ->name('signin');

    Route::post('/signin', [LoginController::class, 'login'])
        ->name('login');

});


// =========================
// AUTHENTICATED
// =========================

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        $user = auth()->user();

        if ($user && $user->isPelapor()) {
            return view('pages.choice.index');
        }

        return redirect()->route('dashboard');
    })->name('home');

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    // DASHBOARD KHUSUS TIM IT
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ... route incidents dan requests lainnya ...
    // =========================
    // INCIDENT (Lapor Kendala)
    // =========================
    Route::get('/incidents', [IncidentController::class, 'index'])->name('incidents.index');
    Route::get('/incidents/create', [IncidentController::class, 'create'])->name('incidents.create');
    Route::post('/incidents', [IncidentController::class, 'store'])->name('incidents.store');
    Route::get('/incidents/{ticket}', [IncidentController::class, 'show'])->name('incidents.show');
    Route::put('/incidents/{ticket}', [IncidentController::class, 'update'])->name('incidents.update');
    // =========================
    // SERVICE REQUEST (Permintaan Layanan)
    // =========================
    Route::get('/requests', [ServiceRequestController::class, 'index'])->name('requests.index');
    Route::get('/requests/create', [ServiceRequestController::class, 'create'])->name('requests.create');
    Route::post('/requests', [ServiceRequestController::class, 'store'])->name('requests.store');
    Route::get('/requests/all', [ServiceRequestController::class, 'all'])->name('requests.all');
    Route::get('/requests/{id}', [ServiceRequestController::class, 'show'])->name('requests.show');

});

// =========================
// API (AJAX auto-fill lokasi) — diproteksi auth session yang sama
// =========================
Route::middleware('auth')->prefix('api')->group(function () {
    Route::get('/assets/{id}', [IncidentController::class, 'getAssetDetail']);
});


// =========================
// OTHER PAGES
// =========================

Route::get('/calendar', function () {
    return view('pages.calender', [
        'title' => 'Calendar'
    ]);
})->name('calendar');

Route::get('/profile', function () {
    return view('pages.profile', [
        'title' => 'Profile'
    ]);
})->name('profile');

Route::get('/form-elements', function () {
    return view('pages.form.form-elements', [
        'title' => 'Form Elements'
    ]);
})->name('form-elements');

Route::get('/basic-tables', function () {
    return view('pages.tables.basic-tables', [
        'title' => 'Basic Tables'
    ]);
})->name('basic-tables');

Route::get('/blank', function () {
    return view('pages.blank', [
        'title' => 'Blank'
    ]);
})->name('blank');

Route::get('/error-404', function () {
    return view('pages.errors.error-404', [
        'title' => 'Error 404'
    ]);
})->name('error-404');

Route::get('/line-chart', function () {
    return view('pages.chart.line-chart', [
        'title' => 'Line Chart'
    ]);
})->name('line-chart');

Route::get('/bar-chart', function () {
    return view('pages.chart.bar-chart', [
        'title' => 'Bar Chart'
    ]);
})->name('bar-chart');


// =========================
// UI ELEMENTS
// =========================

Route::get('/alerts', function () {
    return view('pages.ui-elements.alerts', [
        'title' => 'Alerts'
    ]);
})->name('alerts');

Route::get('/avatars', function () {
    return view('pages.ui-elements.avatars', [
        'title' => 'Avatars'
    ]);
})->name('avatars');

Route::get('/badge', function () {
    return view('pages.ui-elements.badges', [
        'title' => 'Badges'
    ]);
})->name('badges');

Route::get('/buttons', function () {
    return view('pages.ui-elements.buttons', [
        'title' => 'Buttons'
    ]);
})->name('buttons');

Route::get('/image', function () {
    return view('pages.ui-elements.images', [
        'title' => 'Images'
    ]);
})->name('images');

Route::get('/videos', function () {
    return view('pages.ui-elements.videos', [
        'title' => 'Videos'
    ]);
})->name('videos');
```

## File: `tests/Feature/ExampleTest.php`

```php
<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
```

## File: `tests/Pest.php`

```php
<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/

pest()->extend(Tests\TestCase::class)
 // ->use(Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}
```

## File: `tests/TestCase.php`

```php
<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    //
}
```

## File: `tests/Unit/ExampleTest.php`

```php
<?php

test('that true is true', function () {
    expect(true)->toBeTrue();
});
```

## File: `vite.config.js`

```javascript
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    server: {
        host: "0.0.0.0",
        port: 5173,
        strictPort: true,
        hmr: {
            host: "localhost",
        },
        watch: {
            usePolling: true,
        },
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
```

---

# SNAPSHOT SUMMARY

* Total files scanned: 192
* Total files included: 192
* Total files excluded: 15
* Sensitive files excluded: 1 (.env); secret values redacted: 2
* Dependency directories excluded: vendor/, node_modules/
* Generated files excluded: public/build/, bootstrap/cache/, storage/framework/*, storage/logs/

## Daftar File/Folder yang Dikecualikan

- vendor/ (dependency Composer - lihat composer.json)
- node_modules/ (dependency npm - lihat package.json)
- .git/ (data version control)
- .env (berisi APP_KEY & kredensial DB - diganti .env.example)
- public/build/ (hasil build Vite)
- bootstrap/cache/, storage/logs/, storage/framework/* (generated/cache)
- composer.lock, package-lock.json (lockfile besar, manifest sudah cukup)
- file binary (.png/.woff/.sqlite dll)
