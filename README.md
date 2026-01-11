# Ticket System (PHP & MySQL)

A simple ticket management system built using **PHP (procedural)** and **MySQL**.  
This project focuses on **core backend functionality**, authentication, and role-based access.

## Features
- User registration & login (password hashing)
- Role-based access (**admin / user**)
- Create, view, edit, and delete tickets
- Users can only view & edit their own tickets
- Admin can view and manage all tickets
- Session-based authentication

## Tech Stack
- PHP (procedural)
- MySQL
- HTML (basic)
- XAMPP (Apache & MySQL)

## Database Structure

### users
- `id` (Primary Key)
- `username`
- `password` (hashed)
- `role` (admin / user)
- `created_at`

### tickets
- `id` (Primary Key)
- `user_id` (Foreign Key → users.id)
- `title`
- `description`
- `status` (Open / In Progress / Done)
- `created_at`

## Access Control
- **User**: can only see and manage their own tickets
- **Admin**: can see, edit, and delete all tickets

## Purpose
This project was created to practice:
- PHP & MySQL integration
- Database relationships (one-to-many)
- Authentication & authorization logic
- Basic CRUD operations

## Setup
1. Import the database into MySQL
2. Configure database connection in `db.php`
3. Run the project using XAMPP / localhost


## Screenshots

### Login Page
![Login Page](screenshot/Login.png)

### User Dashboard
![User Dashboard](screenshot/Dashboard.png)

### Add Ticket
![Add Ticket](screenshot/Add-ticket.png)

### Admin Dashboard
![Add Ticket](screenshot/Admin-dashboard.png)

---

**Note:**  
This project focuses on backend logic and functionality rather than UI design.
