<?php
include "header.php";
?>
<div class="container">

<div class="card col-md-6 mx-auto mt-3">

<div class="card-header">

<h3 class="text-center text-secondary">Add User</h3>

</div>


<div class="card-body">

<form action="" method="post">

<div class="mb-3">

<label for="name" class="form-Label">Name</Label>

<input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" />

</div>

<div class="mb-3">

<label for="email" class="form-Label">Email</label>

<input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" />

</div>


<div class="mb-3">

<label for="phone" class="form-Label">Phone</label>

<input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" />

</div>

<div class="mb-3">

<label for="description" class="form-Label">Description</label>

<textarea name="description" id="summernote" class="form-control"></textarea>

</div>
<div class="mb-3">

<label for="experience" class="form-Label">Experience</label>

<textarea name="experience" id="" class="form-control"></textarea>

</div>
<div class="mb-3">

<label for="project" class="form-Label">Project</label>

<textarea name="project" id="" class="form-control"></textarea>

</div>

<button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>

</form>

</div>


</div>


</div>
<?php
include "footer.php";

?>
    <script>
      $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 5',
        tabsize: 2,
        height: 100
      });
    </script>






