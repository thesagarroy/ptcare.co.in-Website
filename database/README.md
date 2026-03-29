# P.T. Healthcare Pvt. Ltd. - Database Setup Instructions

Since the database connection is currently paused, follow these steps exactly when you are ready to connect the live website to your Hostinger database.

## Step 1: Create the Database in Hostinger
1. Log in to your Hostinger hPanel.
2. Go to **MySQL Databases**.
3. Create a new database.
   - Example Database Name: `u476804574_PTCarePHP`
   - Example Username: `u476804574_thesagarroy`
   - Password: `Create_A_Strong_Password_Here`
4. **IMPORTANT:** Ensure the newly created User is **Assigned** to the Database. (Hostinger usually does this automatically when you use the combined creation form, but verify it if connection fails).

## Step 2: Update the `config.php` File
The website relies on the `config/config.php` file to talk to the database.
1. Open `config/config.php` (either in VS Code before uploading, or directly in Hostinger File Manager).
2. Find the Database Credentials section and update it with your exact details from Step 1:
```php
define('DB_HOST', 'localhost'); // Keep this as localhost if the site is hosted on Hostinger
define('DB_USER', 'u476804574_thesagarroy'); // Replace with your actual DB User
define('DB_PASS', 'Your_Actual_Password_Here'); // Replace with your actual Password
define('DB_NAME', 'u476804574_PTCarePHP'); // Replace with your actual DB Name
```

## Step 3: Create the Tables (Import SQL)
The database is empty when you first create it. You must create the `users`, `products`, `orders`, and `order_items` tables.
1. In Hostinger MySQL Databases, click **Enter phpMyAdmin** next to your database.
2. Click on the **SQL** tab at the top.
3. Open the `database/schema.sql` file from this project folder.
4. Copy ALL the text inside `schema.sql`.
5. Paste it into the SQL box in phpMyAdmin and click **"Go"** (or **"Simulate query"** then **"Go"**).

## Step 4: Login to the Admin Panel
Once the tables are created, a default Admin account is automatically generated for you:
- **Email:** `admin@pthealthcare.in`
- **Password:** `password123`

You can log in at `https://your-website.com/login.php` to access the Admin Dashboard.

---
### Troubleshooting "Access Denied"
If you still see the `Access denied for user...` error after following these steps:
- Double-check that there are no extra spaces inside the password quotes in `config.php`.
- Reset the password in Hostinger hPanel to a simple one (e.g. `Ptcare2026!`) and update `config.php` to match.
- If testing from your local computer (VS Code), you must whitelist your Home IP Address in Hostinger's "Remote MySQL" section, and change `DB_HOST` to `srv2109.hstgr.io` (or your specific Hostinger MySQL IP). Otherwise, just test directly on the live website.
