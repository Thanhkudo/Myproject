<div class="container col-4">
    <div class="form-group">
        <form action="" method="post">
            <h3>Create Record</h3>
            <hr>
            <label for="name">Name <span style="color: red">*</span></label>
            <input type="text" name="name" id="name" class="form-control" value="">
            <label for="name">Description </label>
            <input type="text" name="des" id="des" class="form-control" value="">
            <label for="name">Salary </label>
            <input type="text" name="salary" id="salary" class="form-control" value="">
            <label>Gender</label><br>
            <input type="radio" name="gender" id="male" value="1" class="custom-radio" checked>
            <label for="">Male </label>
            <input type="radio" name="gender" id="female" value="0" class="custom-radio">
            <label for="">Female </label><br>
            <label for="name">Birthday</label>
            <input type="date" name="date" id="date" class="form-control" value=""><br>
            <input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary">
            <button class="btn btn-light"><a href="index.php">Cancel</a></button>
        </form>
    </div>
</div>