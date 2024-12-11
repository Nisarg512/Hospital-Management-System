Hospital Management System - Readme

Project Overview
This Hospital Management System allows managing patient records, doctor appointments, bed and room management, inventory tracking, and more. The system includes features for both patients and hospital administrators, offering functionalities like doctor-patient chat, appointment bookings, medical inventory management, and reports dashboard.

---

Technologies Used
- Frontend: HTML, CSS, JavaScript
- Backend: PHP
- Database: MySQL
- Other tools: jQuery, Bootstrap, Razorpay (for payment gateway)

---

Requirements
- Web server: XAMPP, WAMP, or any LAMP stack.
- PHP version: 7.4 or higher
- MySQL version: 5.7 or higher
- Browser: Google Chrome, Firefox, or any modern browser.

---

Setup Instructions

1. Download and Install XAMPP/WAMP
   - Download XAMPP (https://www.apachefriends.org/index.html) or WAMP (http://www.wampserver.com/en/) depending on your operating system.
   - Install the software and start the Apache and MySQL servers.

2. Copy Project Files
   - Extract the contents of the zip file to the `htdocs` folder (for XAMPP) or `www` folder (for WAMP).
   - Ensure all PHP files, CSS, JavaScript, and image files are placed inside a folder named `hospital_management` in `htdocs`/`www`.

3. Database Setup
   - Open `phpMyAdmin` (usually accessible via `http://localhost/phpmyadmin`).
   - Create a new database called `myhmsdb`.
   - Import the SQL schema file (`myhmsdb.sql`):
     - Go to the "Import" tab.
     - Choose the file `myhmsdb.sql` from the `database` folder in your project.
     - Click "Go" to complete the import.

4. Update Database Connection
   - Ensure the database connection settings in the `config.php` file are correct:
     ```php
     <?php
     $con = mysqli_connect("localhost", "root", "", "myhmsdb");
     if (!$con) {
         die("Connection failed: " . mysqli_connect_error());
     }
     ?>
     ```
   - You can update the `localhost`, `root`, and password as needed if your environment has different settings.

5. Configuring Razorpay (for Payment Gateway)
   - Open the `payment.php` file and replace the following test API keys with your Razorpay test keys:
     ```php
     $apiKey = 'rzp_test_XZk7d1cPiuxuSM';  // Replace with your test API key
     ```

6. Accessing the Application
   - Visit `http://localhost/hospital_management` in your browser.
   - You should now be able to access the hospital management system.

7. Admin Login  
   - URL: `http://localhost/hospital_management/admin.php`
   - Default Credentials:
     - Username: `admin`
     - Password: `admin123`

8. Patient Login
   - URL: `http://localhost/hospital_management/login.php`
   - Users can register or login as patients.

9. Live Chat Setup
   - Ensure your chat feature is set up in `chat.php`, where patient-doctor communication happens based on the appointment. 

10. Bed and Room Management
    - You can manage the hospital’s bed and room allocations in the **Admin Panel**. To modify patient details, navigate to the `bed_management.php` file.

---

Features
- Patient and Doctor Registration and Login
- Appointment Scheduling and Management
- Real-time Patient-Doctor Chat
- Inventory and Bed Management
- Report Dashboard with Graphs for Appointments and Busy Hours
- Payment Gateway Integration (Test Mode with Razorpay)

---

Troubleshooting
- If the project fails to load, check if Apache and MySQL services are running.
- If you encounter database errors, re-import the SQL schema and verify the connection in `config.php`.
- Ensure the correct file permissions are set for uploading files in the system (if applicable).

---

Future Scope
- Implement multi-language support.
- Add more detailed graphs for administrative reports.
- Extend the payment gateway to include other modes.
