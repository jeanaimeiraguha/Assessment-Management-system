# Gikonko TSS Portal Overview

The **Gikonko TSS Portal** is a web-based application designed to manage the different aspects of a vocational training institution. It offers various functionalities for managing trades, trainees, marks, and reports, all through a user-friendly interface built with modern web technologies like **PHP**, **MySQL**, and **Bootstrap**.

## System Features

### 1. **User Authentication**
- The portal includes a **login system** to authenticate users based on their credentials.
- Users are redirected to the **login page** if they try to access restricted pages without being logged in.
- Upon successful login, users are granted access to the **dashboard**.

### 2. **Dashboard Overview**
- The **dashboard** serves as the main entry point after logging in.
- It provides an **overview** of the system, offering links to various sections, including **Manage Trades**, **Manage Trainees**, **Add Marks**, and **View Report**.
- The dashboard displays a **welcome message** that personalizes the experience by greeting the user with their username.

### 3. **Manage Trades**
- The **Manage Trades** section allows users to add new trade programs to the system.
- A form is provided to input the **trade name**.
- When a new trade is added, it gets stored in the **Trade table** in the MySQL database.

### 4. **Manage Trainees**
- The **Manage Trainees** section is used to add and manage trainees in different trades.
- Users can add a new trainee by entering their **first name**, **last name**, **gender**, and selecting the **trade** they are associated with.
- The trainee information is stored in the **Trainees table** in the MySQL database.

### 5. **Add Marks**
- The **Add Marks** feature allows users to input and update marks for trainees.
- This feature is designed to enhance the ability to track trainee progress and academic performance.

### 6. **View Report**
- The **View Report** section generates reports about trainees, trades, and marks.
- This allows users to have insights into the performance of trainees in various trades.

### 7. **Session Management**
- The system uses PHP **sessions** to manage logged-in users. 
- If a user is not authenticated, they are redirected to the **login page**.
- After logging in, a session is created, and users can navigate through the portal without needing to log in repeatedly.

### 8. **Responsive and User-Friendly Interface**
- The portal is designed with **Bootstrap** to ensure a **responsive** design that works well on all devices.
- The **navbar** provides easy access to all sections of the portal, and it adapts to mobile screens with a collapsible menu.
- The pages are designed to be clean and easy to navigate, with user-friendly forms for entering and managing data.

## Key Technologies Used

### **1. PHP**
- **PHP** is used as the server-side scripting language to manage user authentication, handle database operations, and implement the business logic for managing trades, trainees, marks, and reports.

### **2. MySQL**
- **MySQL** is used to manage and store the data in the system. It is used to store user credentials, trade details, trainee information, and marks.
- The system communicates with MySQL via PHP's built-in **MySQLi** functions to query and manipulate the database.

### **3. Bootstrap**
- **Bootstrap** is used to style the interface and ensure that the application is **responsive** and **mobile-friendly**.
- The **grid system**, **form controls**, and **navbar** are all based on Bootstrap’s built-in classes for easy design and layout management.
- The navigation bar uses the **navbar-expand-lg** class for larger screens and the **navbar-toggler** for smaller screens, ensuring a smooth user experience on both desktop and mobile devices.

### **4. HTML/CSS**
- The structure of the portal is built with **HTML** and styled using **CSS**. The use of flexbox and various margin/padding utilities ensures that the layout is neat and centered.
- Custom styling is applied to ensure the portal has a professional and clean appearance.

## User Roles
- The system can be configured to support different **user roles** such as **Admin** and **User**, though this specific implementation does not currently differentiate between them. Admins would typically have access to manage all trades, trainees, and marks, while regular users might have limited permissions.
  
## Security Features
- The system uses basic **user authentication** to ensure that only authorized users can access the portal’s features.
- Passwords and other sensitive data should ideally be **hashed** before being stored in the database for added security (though the current version stores passwords in plaintext, which should be updated for production systems).
  
## Future Improvements
- Implementing **password hashing** for more secure password storage.
- **Role-based access control** (RBAC) to manage different user roles with varying levels of permissions.
- Adding the ability to **export reports** to **PDF** or **Excel** for easier sharing and printing.
- Enhancing the **marks entry** system to handle more complex data like multiple subjects or scoring systems.

---

**Developed by**: Jean Aime IRAGUHA

This system serves as a robust foundation for managing vocational training institutions, and with the above improvements, it can be expanded to handle more complex requirements and provide more features for its users.
