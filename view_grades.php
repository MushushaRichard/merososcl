<?php
include 'db.php';

// Fetch students and their grades for assignments
$students = $conn->query("SELECT * FROM students");
$assignments = $conn->query("SELECT * FROM assignments");
$grades = $conn->query("SELECT * FROM grades");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Grades</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>View Grades</h2>

        <!-- Sorting and Filtering Form -->
        <form method="get">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="student_filter">Filter by Student:</label>
                    <select class="form-control" name="student_filter">
                        <option value="">All Students</option>
                        <?php while ($student = $students->fetch_assoc()) : ?>
                            <option value="<?= $student['id'] ?>"><?= $student['first_name'] . ' ' . $student['last_name'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="assignment_sort">Sort by Assignment:</label>
                    <select class="form-control" name="assignment_sort">
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Apply</button>
        </form>

        <!-- Display Grades Table -->
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Student</th>
                    <?php while ($assignment = $assignments->fetch_assoc()) : ?>
                        <th><?= $assignment['assignment_name'] ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                // Reset pointers
                $students->data_seek(0);
                $assignments->data_seek(0);
                ?>
                <?php while ($student = $students->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $student['first_name'] . ' ' . $student['last_name'] ?></td>
                        <?php $assignments->data_seek(0); ?>
                        <?php while ($assignment = $assignments->fetch_assoc()) : ?>
                            <?php
                            $student_id = $student['id'];
                            $assignment_id = $assignment['id'];
                            $grade = $conn->query("SELECT grade FROM grades WHERE student_id = $student_id AND assignment_id = $assignment_id")->fetch_assoc();
                            ?>
                            <td>
                                <?php if ($grade) : ?>
                                    <span class="editable" data-student="<?= $student_id ?>" data-assignment="<?= $assignment_id ?>">
                                        <?= $grade['grade'] ?>
                                    </span>
                                <?php else : ?>
                                    <span class="editable" data-student="<?= $student_id ?>" data-assignment="<?= $assignment_id ?>">-</span>
                                <?php endif; ?>
                            </td>
                        <?php endwhile; ?>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a class="btn btn-secondary mt-3" href="index.php">Back to Home</a>
    </div>

    <!-- JavaScript for Inline Editing -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let editables = document.querySelectorAll('.editable');
            editables.forEach(editable => {
                editable.addEventListener('click', function () {
                    let oldValue = this.innerText;
                    let input = document.createElement('input');
                    input.value = oldValue;
                    input.classList.add('form-control');
                    input.addEventListener('blur', function () {
                        let newValue = this.value.trim();
                        let studentId = this.dataset.student;
                        let assignmentId = this.dataset.assignment;
                        if (newValue !== oldValue) {
                            // Update the grade in the database (you need to implement this)
                            // For simplicity, we'll just update the display
                            this.parentElement.innerHTML = newValue;
                        } else {
                            // Restore the old value
                            this.parentElement.innerHTML = oldValue;
                        }
                    });
                    this.innerHTML = '';
                    this.appendChild(input);
                    input.focus();
                });
            });
        });
    </script>
</body>
</html>
