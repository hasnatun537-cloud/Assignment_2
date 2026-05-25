<?php
session_start();
include "header.php";
?>

<div class="container">

<?php
if(isset($_SESSION['success'])){ ?>

<div class="alert alert-success mt-3">
    <?= $_SESSION['success']; ?>
</div>

<?php unset($_SESSION['success']); } ?>

<div class="card col-md-6 mx-auto mt-3">

<div class="card-header">
<h3 class="text-center text-secondary">
Add User
</h3>
</div>

<div class="card-body">

<form action="./controllers/addUserController.php"
method="POST"
enctype="multipart/form-data">

<div class="mb-3">

<label class="form-label">Name</label>

<input type="text"
name="name"
class="form-control"
placeholder="Enter your name">

<?php
if(isset($_SESSION['name_err'])){ ?>

<span class="text-danger">
<?= $_SESSION['name_err']; ?>
</span>

<?php unset($_SESSION['name_err']); } ?>

</div>

<div class="mb-3">

<label class="form-label">Email</label>

<input type="email"
name="email"
class="form-control"
placeholder="Enter your email">

<?php
if(isset($_SESSION['email_err'])){ ?>

<span class="text-danger">
<?= $_SESSION['email_err']; ?>
</span>

<?php unset($_SESSION['email_err']); } ?>

</div>

<div class="mb-3">

<label class="form-label">Description</label>

<textarea name="description"
class="form-control summernote"></textarea>

<?php
if(isset($_SESSION['description_err'])){ ?>

<span class="text-danger">
<?= $_SESSION['description_err']; ?>
</span>

<?php unset($_SESSION['description_err']); } ?>

</div>

<div class="mb-3">

<label class="form-label">Experience</label>

<textarea name="experience"
class="form-control summernote"></textarea>

</div>

<div class="mb-3">

<label class="form-label">Project</label>

<textarea name="project"
class="form-control summernote"></textarea>

</div>

<div class="mb-3">

<label class="form-label">Profile</label>

<input type="file"
name="profile_image"
class="form-control">

<?php
if(isset($_SESSION['image_err'])){ ?>

<span class="text-danger">
<?= $_SESSION['image_err']; ?>
</span>

<?php unset($_SESSION['image_err']); } ?>

</div>

<button type="submit"
name="submit"
class="btn btn-primary w-100">

Submit

</button>

</form>

</div>
</div>
</div>

<?php include "footer.php"; ?>

<script>
$(document).ready(function() {
    $('.summernote').summernote({
        height: 100
    });
});
</script>