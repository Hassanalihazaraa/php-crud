<?php
declare(strict_types=1);
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);

require_once 'includes/Header.php';

if (isset($_POST['submit'])) {
    echo '<div class="alert alert-success" role="alert">
              Your form is submitted!
          </div>';
} else {
    echo '<div class="alert alert-danger" role="alert">
             Something went wrong. Please try again!
          </div>';
}
?>
    <form>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="schoolClass">Class:</label>
                <select name="schoolClass" id="schoolClass" required>
                    <option selected disabled value="">Choose a class</option>
                    <?php
                    /** @var ClassModel[] $classes */
                    foreach ($classes as $class) {
                        echo "<option value='{$class->getId()}'>{$class->getName()}</option>";
                    }
                    ?>
                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="schoolLocation">Location:</label>
                <select name="schoolLocation" id="schoolLocation" required>
                    <option selected disabled value="">Choose a location</option>
                    <?php
                    /** @var ClassModel[] $locations */
                    foreach ($locations as $location) {
                        echo "<option value='{$location->getId()}'>{$location->getName()}</option>";
                    }
                    ?>
                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="schoolTeacher">Teacher:</label>
                <select name="schoolTeacher" id="schoolTeacher" required>
                    <option selected disabled value="">Choose a teacher</option>
                    <?php
                    /** @var ClassModel[] $teachers */
                    foreach ($teachers as $teacher) {
                        echo "<option value='{$teacher->getId()}'>{$teacher->getName()}</option>";
                    }
                    ?>
                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <fieldset id="schoolStudents" name="schoolStudents">
                    <label for="schoolStudents">Students:</label><br>
                    <?php
                    /** @var Student[] $students */
                    foreach ($students as $student) {
                        echo "<input type='checkbox' name='student{$student->getID()}' value ='{$student->getID()}'><label for='student{$student->getId()}'>{$student->getName()}</label>";
                    }
                    ?>
                    <!--<input type="checkbox" id="student1" name="student1" value="1">
                    <label for="student1">Hassan</label><br>
                    <input type="checkbox" id="student2" name="student2" value="2">
                    <label for="student2">Deni</label><br>
                    <input type="checkbox" id="student3" name="student3" value="3">
                    <label for="student3">Jeremia</label><br>-->
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </fieldset>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>

<?php require_once 'includes/Footer.php'; ?>