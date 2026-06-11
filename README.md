# Paw me — Pet Management & Care Platform

> A full-stack web application for pet adoption, e-commerce, veterinary services, and centralized pet care management — built with PHP and MySQL.

![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-MariaDB-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4.5-7952B3?style=flat-square&logo=bootstrap&logoColor=white)
![License](https://img.shields.io/badge/License-Academic-blue?style=flat-square)

---

## Overview

**Paw me** (database: `petbondhu`) is a one-stop platform designed to support both new and experienced pet owners. It brings together pet adoption, accessory shopping, veterinary appointments, and personal pet record management in a single, easy-to-use web experience.

Whether you are looking to adopt a companion, book a vet consultation, or manage your pet's profile — Paw me provides the tools to do it all.

---

## Key Features

### Pet Adoption
- Browse adoptable **dogs**, **cats**, **birds**, and **fish** with breed, health status, and image details
- Filter and search pets by breed, age, and health condition
- Submit adoption requests with contact information and preferences
- Admin-managed pet inventory with full CRUD operations

### Pet Accessories Shop
- Product catalog organized by pet category (Dog, Cat, Bird, Bunny) and product type (Food, Toys, Wearables, Decorations, Beds)
- Session-based shopping cart with quantity management
- Checkout flow for order completion
- Admin product management via dedicated shop editor

### Veterinary Services
- **Online consultations** — book remote vet appointments with service type and pet condition details
- **Offline consultations** — schedule in-clinic or home-visit appointments by location
- Doctor information directory
- Emergency service contact page
- Appointment history tracking for registered users

### User Dashboard
- Secure registration and login with session management
- Profile editing with photo upload
- Personal **pet profiles** (name, type, breed, age, medical history)
- Vet appointment history
- Shopping order history

### Admin Panel
- Dedicated admin authentication and dashboard
- **User management** — add, update, and delete registered users
- **Pet management** — manage dogs, cats, birds, and fish across the platform
- **Shop management** — add and edit product listings
- **Appointment oversight** — view online and offline appointment requests
- Admin settings and role management

---

## Tech Stack

| Layer | Technology |
|-------|------------|
| **Backend** | PHP 8.2 |
| **Database** | MySQL / MariaDB |
| **Frontend** | HTML5, CSS3, JavaScript |
| **UI Framework** | Bootstrap 4.5 |
| **Icons** | Font Awesome 5 |
| **Server** | Apache (XAMPP) |

---

## Database Schema

The application uses a relational MySQL database (`petbondhu`) with the following core tables:

| Table | Purpose |
|-------|---------|
| `users` | Registered user accounts and profiles |
| `admins` | Administrator accounts and roles |
| `pets` | User-owned pet records (linked to `users`) |
| `dogs` | Adoptable dog listings |
| `cats` | Adoptable cat listings |
| `birds` | Adoptable bird listings |
| `fishs` | Adoptable fish listings |
| `adoption_requests` | Submitted adoption applications |
| `petbondhu_shop` | Shop product catalog |
| `cart` | Persistent cart items per user |
| `online_appointment` | Online vet consultation bookings |
| `offline_appointment` | In-person vet consultation bookings |

A complete schema with sample data is provided in [`petbondhu.sql`](./petbondhu.sql).

---

## Project Structure

```
pet-management-DBMS/
├── index/              # Landing page & hero section
├── header/             # Shared navigation bar
├── account/            # User & admin auth, dashboards, profiles
├── admin/              # Appointment list management
├── adoption_sec/       # Adoption category hub
├── pet/                # Pet listings, filters & CRUD (dog/cat/bird/fish)
├── shop/               # Product catalog & cart actions
├── cart/               # Shopping cart & checkout
├── vet_services/       # Vet forms, doctor info & emergency services
├── about_us/           # About page & mission
├── contact/            # Contact information
├── image/              # Static assets (pet photos, backgrounds)
└── petbondhu.sql       # Database schema & seed data
```

---

## Getting Started

### Prerequisites

- [XAMPP](https://www.apachefriends.org/) (or any Apache + PHP + MySQL stack)
- PHP 8.0+
- MySQL / MariaDB 10.4+
- A modern web browser

### Installation

**1. Clone the repository**

```bash
git clone https://github.com/<your-username>/pet-management-DBMS.git
cd pet-management-DBMS
```

**2. Place the project in your web server root**

```bash
# XAMPP default path
cp -r . /path/to/xampp/htdocs/pet-management-DBMS
```

**3. Start Apache and MySQL** via the XAMPP Control Panel.

**4. Import the database**

- Open [phpMyAdmin](http://localhost/phpmyadmin)
- Create a new database named `petbondhu`
- Import `petbondhu.sql` into the database

**5. Configure database credentials** (if needed)

The default connection settings used across the project are:

```
Host:     localhost
Username: root
Password: (empty)
Database: petbondhu
```

Update these values in individual PHP files if your local environment differs.

**6. Launch the application**

```
http://localhost/pet-management-DBMS/index/index.php
```

---

## Usage Guide

### For Users

| Action | Path |
|--------|------|
| Register / Login | `account/register.php` → `account/log_in.php` |
| Browse adoption pets | `adoption_sec/adoption.php` |
| Shop accessories | `shop/shop.php` |
| Book vet appointment | `vet_services/vet_services.php` |
| Manage profile & pets | `account/dashboard.php` |
| View cart | `cart/cart.php` |

### For Admins

| Action | Path |
|--------|------|
| Admin login | `account/admin_login.php` |
| Admin dashboard | `account/admin_dashboard.php` |
| Manage users | `account/manage_users.php` |
| Manage pets | `account/manage_pets.php` |
| Manage shop products | `shop/shopedit.php` |
| View appointments | `admin/online_list.php` / `admin/offline_list.php` |

---

## Screens & Modules

```
┌─────────────────────────────────────────────────────────┐
│                      Paw me Platform                    │
├──────────────┬──────────────┬──────────────┬────────────┤
│   Adoption   │     Shop     │  Vet Services│   Account  │
│  Dogs/Cats/  │  Accessories │  Online/Off  │  Dashboard │
│ Birds/Fish   │  Cart/Checkout│  Emergency  │  Profiles  │
├──────────────┴──────────────┴──────────────┴────────────┤
│                    Admin Control Panel                  │
│  Users · Pets · Products · Appointments · Settings      │
└─────────────────────────────────────────────────────────┘
```

---

## Screenshots

> Add screenshots of your key pages here for portfolio showcase.

| Homepage | Adoption | Shop | Admin Dashboard |
|----------|----------|------|-----------------|
| _Add image_ | _Add image_ | _Add image_ | _Add image_ |

---

## Future Improvements

- [ ] Centralized database configuration file (`config.php`)
- [ ] Password hashing enforcement across all user accounts
- [ ] Prepared statements for all SQL queries (SQL injection hardening)
- [ ] RESTful API layer for mobile app integration
- [ ] Email notifications for adoption and appointment confirmations
- [ ] Payment gateway integration for shop checkout
- [ ] Role-based access control (RBAC) for admin tiers

---

## Contributors

This project was developed as a **Database Management Systems (DBMS)** academic project.

| Name | Role |
|------|------|
| Antor | Super Admin / Developer |
| Janie | Super Admin / Developer |
| Israt | Super Admin / Developer |

---

## License

This project is intended for **educational and portfolio purposes**. Please contact the authors before using it in production environments.

---

<p align="center">
  Made with care for pets and their humans &nbsp;·&nbsp; <strong>Paw me</strong> &copy; 2025
</p>
