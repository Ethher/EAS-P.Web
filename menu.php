<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow</title>
    <style>
        /* Global Styles */
        body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
          background-color: #f8f9fa;
          color: #333;
        }
        header {
          background-color: #007bff;
          color: #fff;
          padding: 1rem 2rem;
          display: flex;
          justify-content: space-between;
          align-items: center;
        }
        header .logo {
          font-size: 1.5rem;
          font-weight: bold;
        }
        header nav ul {
          list-style: none;
          margin: 0;
          padding: 0;
          display: flex;
        }
        header nav ul li {
          margin: 0 1rem;
        }
        header nav ul li a {
          color: #fff;
          text-decoration: none;
          font-weight: bold;
          cursor: pointer;
        }
        main {
            display: flex;
            flex-direction: column;
             min-height: 100vh;
            padding: 2rem;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
        }

        .desc {
            text-align: center;
        }

        .hidden {
          display: none;
        }
        .task-summary {
          display: flex;
          justify-content: space-between;
          margin-bottom: 2rem;
        }
        .card {
          background: #fff;
          padding: 1rem;
          border: 1px solid #ddd;
          border-radius: 5px;
          text-align: center;
          flex: 1;
          margin: 0 1rem;
        }
        .card h3 {
          margin: 0;
          color: #007bff;
        }
        .card p {
          font-size: 1.2rem;
        }
        .task-list {
          background: #fff;
          padding: 1.5rem;
          border: 1px solid #ddd;
          border-radius: 5px;
          max-height: 300px;
          overflow-y: auto;
        }
        section#tasks .task-list {
          height: calc(100vh - 140px);
          overflow-y: auto;
          padding: 2rem;
          margin: 0;
          box-sizing: border-box;
        }
        .task-list h2 {
          margin-top: 0;
        }

.task-item {
    display: flex;
    justify-content: space-between; /* Space between the task info and the buttons */
    align-items: center; /* Vertically center the items */
    border-bottom: 1px solid #ddd;
    padding: 1rem 0;
}

        .task-list {
    flex-grow: 1; /* This makes the task list grow to fill available space */
    overflow-y: auto; /* Scroll if content overflows */
    margin-bottom: 3rem; /* Add margin at the bottom to separate from the "Add New Task" button */
}

.task-info {
    flex: 1; /* Allows the task info to take up the remaining space */
}

        .task-item h4 {
          margin: 0;
          color: #007bff;
        }
        .task-item p {
          margin: 0.5rem 0;
        }
        .task-item button {
          padding: 0.5rem 1rem;
          border: none;
          background-color: #007bff;
          color: #fff;
          border-radius: 5px;
          cursor: pointer;
        }
        .task-item button:hover {
          background-color: #0056b3;
        }
        footer {
          text-align: center;
          padding: 1rem;
          background: #007bff;
          color: #fff;
          position: fixed;
          width: 100%;
          bottom: 0;
        }
        .profile-section {
          background: #fff;
          padding: 1.5rem;
          border: 1px solid #ddd;
          border-radius: 5px;
          max-width: 600px;
          margin: 2rem auto;
        }
        .profile-section h2 {
          margin-top: 0;
          text-align: center;
          color: #007bff;
        }
        .profile-detail {
          margin-bottom: 1rem;
          font-size: 1rem;
        }
        .profile-detail span {
          font-weight: bold;
          color: #333;
        }
        .profile-detail .password {
          font-family: 'Courier New', Courier, monospace;
          letter-spacing: 0.3rem;
        }
        .update-button {
          display: block;
          width: 100%;
          padding: 0.75rem;
          background-color: #007bff;
          color: #fff;
          border: none;
          border-radius: 5px;
          font-size: 1rem;
          text-align: center;
          cursor: pointer;
        }
        .update-button:hover {
          background-color: #0056b3;
        }

.task-item {
    display: flex;
    justify-content: space-between; /* Space between the task info and the buttons */
    align-items: center; /* Vertically center the items */
    border-bottom: 1px solid #ddd;
    padding: 1rem 0;
}

.task-info {
    flex: 1; /* Allows the task info to take up the remaining space */
}

.task-buttons {
    display: flex;
    justify-content: flex-end; /* Align buttons to the right */
    gap: 0.5rem; /* Space between the buttons */
}

.task-action-button {
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
}

.mark-in-progress {
    background-color: #ffc107;
    color: #fff;
}

.mark-in-progress:hover {
    background-color: #e0a800;
}

.mark-as-done {
    background-color: #28a745;
    color: #fff;
}

.mark-as-done:hover {
    background-color: #218838;
}

/* Button for adding new task */
.add-task-btn-container {
    text-align: center;
    margin-bottom: 2rem;
}

.add-task-button {
    padding: 1rem 2rem;
    background-color: #007bff;
    color: #fff;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.add-task-button:hover {
    background-color: #0056b3;
}


    </style>
</head>
<body>
    <?php
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 'home';
    $tasks = [
        ['title' => 'Task 1', 'description' => 'Description for task 1'],
        ['title' => 'Task 2', 'description' => 'Description for task 2'],
        ['title' => 'Task 3', 'description' => 'Description for task 3'],
        ['title' => 'Task 4', 'description' => 'Description for task 4'],
        ['title' => 'Task 5', 'description' => 'Description for task 5']
    ];
    $inProgressTasks = [
        ['title' => 'Task 2', 'description' => 'Description for task 2 (in progress)'],
        ['title' => 'Task 4', 'description' => 'Description for task 4 (in progress)']
    ];
    ?>

    <header>
        <div class="logo">TaskFlow</div>
        <nav>
            <ul>
                <li><a href="?page=home" class="<?= $currentPage === 'home' ? 'active' : '' ?>">Home</a></li>
                <li><a href="?page=tasks" class="<?= $currentPage === 'tasks' ? 'active' : '' ?>">Tasks</a></li>
                <li><a href="?page=profile" class="<?= $currentPage === 'profile' ? 'active' : '' ?>">Profile</a></li>
            </ul>
        </nav>
    </header>

    <main>
    <?php if ($currentPage === 'home'): ?>
        <h1>Welcome to TaskFlow</h1>
        <p class="desc">Track your tasks efficiently and manage your workflow.</p>

        <section class="task-summary">
            <div class="card">
                <h3>Total Tasks</h3>
                <p><?= count($tasks) ?></p>
            </div>
            <div class="card">
                <h3>In Progress Tasks</h3>
                <p><?= count($inProgressTasks) ?></p>
            </div>
            <div class="card">
                <h3>Completed Tasks</h3>
                <p>0</p>
            </div>
        </section>

        <section class="task-list">
            <h2>In Progress</h2>
            <?php foreach ($inProgressTasks as $task): ?>
                <div class="task-item">
                    <h4><?= $task['title'] ?></h4>
                    <p><?= $task['description'] ?></p>
                </div>
            <?php endforeach; ?>
        </section>

        <?php elseif ($currentPage === 'tasks'): ?>
    <section class="task-list">
        <h2>All Tasks</h2>
        <?php foreach ($tasks as $task): ?>
            <div class="task-item">
                <div class="task-info">
                    <h4><?= $task['title'] ?></h4>
                    <p><?= $task['description'] ?></p>
                </div>
                <div class="task-buttons">
                    <button class="task-action-button mark-in-progress">Mark In Progress</button>
                    <button class="task-action-button mark-as-done">Mark as Done</button>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

    <!-- Button to Add New Task -->
    <div class="add-task-btn-container">
        <button class="add-task-button">Add New Task</button>
    </div>

    <?php elseif ($currentPage === 'profile'): ?>
        <section class="profile-section">
            <h2>User Profile</h2>
            <div class="profile-detail">
                <span>Name:</span> John Doe
            </div>
            <div class="profile-detail">
                <span>Email:</span> johndoe@example.com
            </div>
            <div class="profile-detail">
                <span>Phone:</span> +1234567890
            </div>
            <div class="profile-detail">
                <span>Password:</span> <span class="password">********</span>
            </div>
            <button class="update-button">Update Profile</button>
        </section>

        <?php elseif ($currentPage === 'tasks'): ?>
            <section class="task-list">
                <h2>All Tasks</h2>
                <?php foreach ($tasks as $task): ?>
                    <div class="task-item">
                        <h4><?= $task['title'] ?></h4>
                        <p><?= $task['description'] ?></p>
                    </div>
                <?php endforeach; ?>
            </section>

        <?php elseif ($currentPage === 'profile'): ?>
            <section class="profile-section">
                <h2>User Profile</h2>
                <div class="profile-detail">
                    <span>Name:</span> John Doe
                </div>
                <div class="profile-detail">
                    <span>Email:</span> johndoe@example.com
                </div>
                <div class="profile-detail">
                    <span>Phone:</span> +1234567890
                </div>
                <div class="profile-detail">
                    <span>Password:</span> <span class="password">********</span>
                </div>
                <button class="update-button">Update Profile</button>
            </section>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 TaskFlow. All rights reserved.</p>
    </footer>
</body>
</html>
