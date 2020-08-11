<?php
declare(strict_types=1);

require_once 'View/includes/Header.php';
?>
    <form>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationServer01">First name</label>
                <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationServer02">Last name</label>
                <input type="text" class="form-control is-valid" id="validationServer02" value="Otto" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>

<?php require_once 'View/includes/Footer.php'; ?>