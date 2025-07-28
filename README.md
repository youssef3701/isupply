# 🛡️ iSUPPLY Cybersecurity Hackathon Submission

## 📌 Overview

This repository contains my submission for the **iSUPPLY Cybersecurity Hackathon 2025**.  
The challenge required identifying and fixing real-world security vulnerabilities in a Laravel application running inside Docker containers.

---

## 📁 Project Structure
.
├── app/ # Laravel application core
├── routes/ # Web/API route definitions
├── database/ # Seeders, migrations, factories
├── Dockerfile # Custom PHP + Nginx Docker container
├── docker-compose.yml # Multi-container orchestration
├── php.ini # PHP custom configuration
├── .env.example # Laravel environment variables sample
├── iSUPPLY_Technical_Report_DOCKER_FIRST.pdf
├── README.md


---

## 🚨 Key Vulnerabilities Identified & Fixed

### 🔒 Laravel Fixes
- SQL Injection in login
- Insecure hardcoded credentials
- Debug mode enabled in production
- PII exposed in public endpoints
- Missing password hashing
- Unrestricted access to admin features
- Mass assignment & broken access control
- Unprotected password reset, registration, and login routes

### 🐳 Docker Fixes
- Root user in containers
- Nginx autoindex enabled
- Access to `.env`, `.git` files
- No HTTPS enforcement
- APP_DEBUG=true
- `MYSQL_ALLOW_EMPTY_PASSWORD=1`
- Over-permissive volume mounting
- Unrestricted PHP error display

---

## 🔧 How to Run the Project Locally (Dockerized Laravel)

### ✅ Prerequisites

- Docker & Docker Compose installed
- Git installed

---

### 🚀 Setup Instructions

#### 1. Clone the Repository

```bash
git clone https://github.com/youssef3701/isupply.git
cd isupply

to run the file
# Generate app key
docker exec -it app php artisan key:generate

# Run database migrations
docker exec -it app php artisan migrate

# Seed the database (admin/user accounts)
docker exec -it app php artisan db:seed
