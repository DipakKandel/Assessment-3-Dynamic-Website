
---

```markdown
# 🍴 Tasty Treasures Cookbook

A dynamic PHP & MySQL-powered recipe website built for food lovers to explore categorized recipes, cooking tips, and featured meals. This project is an enhanced version of a previously built static site, now upgraded with database functionality, admin controls, and a modern responsive layout.

---

## 📌 Features

### 👨‍🍳 User-Facing:
- Interactive image slider on homepage
- Browse recipes by categories (e.g., Breakfast, Lunch, Dinner)
- Featured recipes section
- View recipe details with ingredients and instructions
- Blog-style cooking tips
- Custom 404 error page

### 🔐 Admin Dashboard:
- Secure login/logout functionality
- Add/edit/delete recipes and cooking tips
- Image upload support for each recipe/tip
- View and mark contact submissions as "read"

---

## 📁 Project Structure

```

/tasty-treasures/
├── index.php
├── categories.php
├── recipe\_detail.php
├── tips.php
├── contact.php
├── 404.php
├── .htaccess
├── stylesheet.css
├── script.js
├── includes/
│   ├── config.php
│   ├── header.php
│   └── footer.php
├── admin/
│   ├── index.php (login)
│   ├── dashboard.php
│   ├── add\_recipe.php, add\_tips.php
│   ├── delete\_recipe.php, delete\_tips.php
│   ├── logout.php, mark\_read\_submission.php
│   └── admin-stylesheet.css
├── images/
│   └── categories/, recipe/, tips/, slides/
├── database/
│   └── tasty\_treasures.sql
└── INSTALL.txt

```

---

## 🛠 Installation Instructions

> 📄 See `INSTALL.txt` included in the project for step-by-step setup instructions.

Quick Summary:
1. Install [XAMPP](https://www.apachefriends.org/)
2. Start Apache and MySQL
3. Import `database/tasty_treasures.sql` via phpMyAdmin
4. Copy project folder to `htdocs/`
5. Visit `http://localhost/tasty-treasures/`

---

## 🔑 Admin Credentials (for testing)

- **Username:** `admin`
- **Password:** `dipak`

---



---

## 🧠 Built With

- PHP
- MySQL
- HTML5 / CSS3
- JavaScript (Vanilla)
- XAMPP (Apache, MySQL, PHP environment)

---

## 👥 Contributors

- **Dipak Kandel** – Database design, admin panel, backend logic
- **Roshan Dahal** – Front-end design, homepage layout, CSS styling
- **Sandip Luitel** – Tips section, contact form, layout integration

---

## 📜 License

This project is created for educational purposes. Feel free to use, modify, and learn from it.

---

## 🙌 Acknowledgements

- [ChatGPT](https://openai.com/chatgpt) – Assisted with code structure and improvements
- [W3Schools](https://www.w3schools.com/) – References for PHP, CSS, and HTML
- [Canva](https://www.canva.com/) – Logo design

```

---

