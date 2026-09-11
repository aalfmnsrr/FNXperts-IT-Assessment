# Mini-CRM System

A full-stack Laravel administration portal built for the FNXPERTS Web Developer Assessment. Manages companies and employees with image validation, Eloquent relationships, and a RESTful API.

---

## 🎯 The Purpose

Centralizes corporate directory management through an authenticated dashboard. Enforces schema integrity across companies and their staff while exposing endpoints for external integrations.

---

## ⚙️ How It Works

1. **Authentication Guard**: Protects routes with session-based authentication while disabling public self-registration.
2. **Relational Data Mapping**: Links `Company` has-many `Employees` and `Employee` belongs-to `Company` with cascading integrity.
3. **Form Request Validation**: Validates name fields, email formats, and restricts company logos to minimum dimensions of 100x100px.
4. **Public Storage Pipeline**: Stores uploaded logos under `storage/app/public/logos` and surfaces them via the `public/storage` symlink.
5. **Data Pagination**: Paginates company and employee listings at 10 records per page.
6. **API Transformation**: Exposes an endpoint returning a single company with its employees and an aggregated `employee_count` attribute.

---

## ✨ Key Features

- **Admin Authentication**: Pre-configured login system with registration disabled.
- **Automated Database Seeding**: Pre-seeds default administrator credentials.
- **Company CRUD**: Full management of company name, email, website, and logo upload.
- **Image Dimension Validation**: Automatically checks logos to enforce minimum 100x100px dimensions.
- **Employee CRUD**: Manages first name, last name, company foreign key, email, and phone.
- **10-per-Page Pagination**: Standardized pagination on both resource lists.
- **API Endpoint**: JSON endpoint returning company profile, employee list, and `employee_count`.

---

## 🛠️ Tech Stack

- **Backend**: Laravel (PHP)
- **Frontend**: Blade, Tailwind CSS, Alpine.js
- **Database**: MySQL
- **API Testing**: Postman

---

## 📂 Project Structure

```text
mini-crm/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/CompanyController.php   # API endpoint (Step 8)
│   │   │   ├── CompanyController.php       # Company resource controller (Step 6)
│   │   │   └── EmployeeController.php      # Employee resource controller (Step 6)
│   │   ├── Requests/                       # Validation rules (Step 5)
│   │   │   ├── StoreCompanyRequest.php
│   │   │   ├── UpdateCompanyRequest.php
│   │   │   ├── StoreEmployeeRequest.php
│   │   │   └── UpdateEmployeeRequest.php
│   │   └── Resources/                      # JSON resources (Step 8)
│   │       ├── CompanyResource.php
│   │       └── EmployeeResource.php
│   └── Models/
│       ├── Company.php                     # hasMany employees, logo_url accessor
│       ├── Employee.php                    # belongsTo company
│       └── User.php                        # Admin model
├── database/
│   ├── migrations/                         # Companies & employees schemas
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── AdminUserSeeder.php             # Seeds admin@admin.com
├── resources/views/                        # Blade views & components (Step 7)
│   ├── companies/
│   ├── employees/
│   └── layouts/
├── routes/
│   ├── api.php                             # API route: /api/companies/{id}
│   └── web.php                             # Resource routes
└── storage/app/public/logos/               # Uploaded logos
