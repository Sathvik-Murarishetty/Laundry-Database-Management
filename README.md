# Sparkle Spins Laundry Service

Sparkle Spins Laundry Service is a web application for managing laundry tasks for students and administrators.

## Features

- **Student Dashboard:** View current task status, laundry history, and manage laundry tasks.
- **Admin Dashboard:** View all tasks, manage student records, and monitor laundry activities.
- **Task Management:** Students can submit laundry tasks, and administrators can monitor and update task statuses.

## Technologies Used

- HTML
- CSS
- JS
- PHP
- MySQL

## Setup Instructions

1. Clone the repository:

    ```bash
    git clone https://github.com/Sathvik-Murarishetty/Laundry-Database-Management.git
    ```

2. Set up your database:

    - Create a new database named `trial1`.
    - Import the provided SQL file (`trial1.sql`) into your database.

3. Set up the project:

    - Move the project files to your web server directory (e.g., `htdocs` for XAMPP).

4. Access the application:

    - Open a web browser and navigate to `http://localhost/folder-name`.

## Database Structure

The database includes the following tables:

- `students`: Stores student information.
- `admins`: Stores administrator information.
- `tasks`: Stores laundry task details.

## Usage

1. **Student Login:**
   - Select "Student" as the user type.
   - Enter your username(registration number) and password.

2. **Admin Login:**
   - Select "Admin" as the user type.
   - Enter your username and password.

3. **Student Dashboard:**
   - View current task status.
   - Access laundry history.

4. **Admin Dashboard:**
   - View all tasks.
   - Manage student records.

## Contributing

If you'd like to contribute to this project, please follow these guidelines.

1. Fork the project.
2. Create a new branch: `git checkout -b feature/your-feature-name`.
3. Commit your changes: `git commit -m 'Add new feature'`.
4. Push to the branch: `git push origin feature/your-feature-name`.
5. Submit a pull request.

