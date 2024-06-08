
# Task Manager Application

This is a Laravel-based task management web application that allows users to create, edit, delete, and reorder tasks within projects. The application also includes drag-and-drop functionality to reorder tasks according to their priority.

## Features

- **Create Task**: Add a new task with a name and priority.
- **Edit Task**: Modify the details of an existing task.
- **Delete Task**: Remove a task from the project.
- **Reorder Tasks**: Drag and drop tasks to reorder them, automatically updating their priority.
- **Project Management**: Create, view, edit, and delete projects, and manage tasks within each project.

## Technologies Used

- Laravel 8
- MySQL
- Bootstrap 4
- jQuery
- jQuery UI
- SortableJS
- Axios

## Prerequisites

- PHP >= 7.3
- Composer
- MySQL
- Node.js and npm

## Installation

Follow these steps to set up and deploy the application:

### 1. Clone the Repository

```sh
git clone https://github.com/your-username/task-manager.git
cd task-manager
```

### 2. Install Dependencies

```sh
composer install
npm install
npm run dev
```

### 3. Configure Environment

Create a `.env` file by copying `.env.example` and update the database settings:

```sh
cp .env.example .env
```

Update the following lines in the `.env` file with your database credentials:

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 4. Generate Application Key

```sh
php artisan key:generate
```

### 5. Run Migrations

```sh
php artisan migrate
```

### 6. Serve the Application

```sh
php artisan serve
```

Open your browser and navigate to `http://localhost:8000` to access the application.

## Project Structure

The project has the following structure:

```
.
├── app
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── ProjectController.php
│   │   │   └── TaskController.php
│   ├── Models
│   │   ├── Project.php
│   │   └── Task.php
├── resources
│   ├── views
│   │   ├── layouts
│   │   │   └── app.blade.php
│   │   ├── projects
│   │   │   ├── create.blade.php
│   │   │   ├── edit.blade.php
│   │   │   ├── index.blade.php
│   │   │   └── show.blade.php
│   │   ├── tasks
│   │   │   ├── create.blade.php
│   │   │   ├── edit.blade.php
│   │   │   └── index.blade.php
├── routes
│   └── web.php
└── public
    ├── css
    └── js
```

## Usage

### Creating a Project

1. Navigate to the Projects page.
2. Click on the "Create Project" button.
3. Fill in the project name and submit.

### Managing Tasks

1. View a project to see its tasks.
2. Add a task by clicking the "Add Task" button.
3. Edit a task by clicking the "Edit" button next to the task.
4. Delete a task by clicking the "Delete" button next to the task.
5. Reorder tasks by dragging and dropping them. The priority will update automatically.

### Drag-and-Drop Functionality

The drag-and-drop functionality for reordering tasks is powered by SortableJS. Tasks can be reordered by dragging them to the desired position, and their priorities are automatically updated.

## Contributing

Contributions are welcome! Please submit a pull request or open an issue to discuss improvements or bugs.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Acknowledgements

- Laravel
- Bootstrap
- jQuery
- SortableJS
- Axios

## Contact

For any questions or suggestions, please contact [nkunzecaleb@gmail.com].
