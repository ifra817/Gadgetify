# Gadgetify ⚡

A modern and dynamic **Gadget & Accessories E-Commerce Web Application** built using HTML, CSS, JavaScript, PHP, and MySQL. Gadgetify provides a smooth online shopping experience for tech enthusiasts looking to purchase gadgets like headphones, smartwatches, mobile accessories, and gaming gear.

---

## 📌 Project Description

Gadgetify is a responsive web-based e-commerce platform designed to simulate a real-world online gadget store. It allows users to browse and purchase a wide range of electronic accessories while providing administrators with a powerful backend panel for managing products, categories, orders, and customers. The system focuses on usability, performance, and a visually modern interface.

This project demonstrates full-stack web development concepts including user authentication, session handling, CRUD operations, database integration, and responsive UI design.

---

## 🎯 Key Objectives

* Create a user-friendly gadget shopping platform
* Implement secure login and registration system
* Enable dynamic cart and checkout functionality
* Provide efficient admin control over store operations
* Simulate real-life e-commerce workflow

---

## 🚀 Features

### 👤 User Features

* User Registration & Login
* Browse Products by Category
* Product Search & Filters
* Product Details View
* Add to Cart & Wishlist
* Dynamic Cart Management
* Secure Checkout Process
* Order History
* Profile Management
* Product Reviews & Ratings

### 🔐 Admin Features

* Admin Authentication
* Dashboard Overview
* Add / Edit / Delete Products
* Manage Categories & Brands
* View & Process Orders
* Stock Management
* Customer Management
* Sales Reports

---

## 🛠️ Technologies Used

| Layer    | Technology              |
| -------- | ----------------------- |
| Frontend | HTML5, CSS3, JavaScript |
| Backend  | PHP                     |
| Database | MySQL                   |
| Server   | XAMPP / Apache          |

---

## 📂 Project Structure

```
Gadgetify/
│
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── script.js
│   └── images/
│
├── includes/
│   ├── db.php
│   ├── header.php
│   └── footer.php
│
├── admin/
│   ├── dashboard.php
│   ├── products.php
│   ├── orders.php
│   └── add-product.php
│
├── user/
│   ├── login.php
│   ├── register.php
│   └── profile.php
│
├── cart/
│   ├── cart.php
│   └── checkout.php
│
├── index.php
├── shop.php
├── product.php
└── README.md
```

---

## 🗃️ Database Schema Overview

### users

* id
* name
* email
* password
* phone
* address
* role

### products

* id
* name
* price
* description
* image
* category_id
* brand
* stock

### categories

* id
* category_name

### orders

* id
* user_id
* total_amount
* status
* created_at

### order_items

* id
* order_id
* product_id
* quantity
* price

---

## ⚙️ Installation & Setup

1. Install XAMPP or any local server environment
2. Clone the repository:

```bash
git clone https://github.com/yourusername/gadgetify.git
```

3. Move project folder to `htdocs`
4. Import database file into phpMyAdmin
5. Update database credentials in `includes/db.php`
6. Start Apache & MySQL
7. Open browser and run:

```
http://localhost/gadgetify
```

---

## 🧪 Demo Credentials

**User Login:**

* Email: [user@gadgetify.com](mailto:user@gadgetify.com)
* Password: user123

**Admin Login:**

* Email: [admin@gadgetify.com](mailto:admin@gadgetify.com)
* Password: admin123

---

## 📸 Screenshots

(Add screenshots of your homepage, product page, admin dashboard here)

---

## 🌟 Future Enhancements

* Online Payment Integration
* Product Comparison Feature
* AI-Based Recommendations
* Multi-language Support
* Progressive Web App (PWA)

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome!
Feel free to fork this repository and submit pull requests.

---

## 👨‍💻 Author

**Ramlah Munir**
Computer Science Undergraduate
COMSATS University Islamabad, Wah Campus

---

## 📜 License

This project is for educational purposes only and not intended for commercial use.

---

> 💡 *Built with passion for learning full-stack web development and creating modern digital solutions.*
