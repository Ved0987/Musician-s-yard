🎸 Musician’s Yard – Online Musical Instrument Store
Musician’s Yard is a dynamic eCommerce web application designed for musicians and music enthusiasts to explore and purchase musical instruments online. Built using the CodeIgniter PHP framework and following the MVC (Model-View-Controller) architecture, this project aims to provide a seamless and user-friendly experience for both customers and administrators.

The platform supports essential features like product browsing, user registration, shopping cart, and order placement. It also includes a backend admin panel for managing products, categories, and orders. The project focuses on modularity, maintainability, and clean design, with a responsive frontend developed using HTML and CSS and a MySQL database for backend operation.

🔁 Project Workflow – Musician’s Yard
1. User Interaction Layer (Frontend)
Homepage: Displays featured instruments and categories.
Browse Products: Users can view instrument listings with search and filter options.
Product Detail Page: Shows specifications, pricing, and images.
User Authentication:
Register/Login using secure sessions
Authenticated users can access cart and place orders.
Cart Management:
Users can add/remove items to/from cart.
Proceed to checkout.

2. Backend Logic (Controller – CodeIgniter)
Handles user requests and interacts with models.
Controls routing between views and business logic.
Validates forms, manages sessions, and handles user authentication.
Performs CRUD operations for admin panel via routes.

3. Database Operations (Model – CodeIgniter + MySQL)
User Model: Handles registration, login, and session data.
Product Model: Fetches product list, details, and updates inventory.
Cart & Order Model: Stores cart data and processes orders.
Admin Model: Manages product, category, and order CRUD functionality.

4. Admin Panel Workflow
Admin logs in via a secured route.
Dashboard provides access to:
Add/Edit/Delete instruments
Manage product categories
View and manage customer orders
All changes are reflected immediately in the user interface.

