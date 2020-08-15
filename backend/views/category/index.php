<div class="container col-10">
    <div class="row">
        <div class="col">
            <h3>Employees List</h3>
        </div>
        <div class="col text-right">
            <button class="btn btn-success"><a href="#">+ ADD New Employees</a></button>
        </div>
    </div>
    <br>
    <div style="overflow-x: auto">
    <table class="table" >
        <div class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Gender</th>
            <th scope="col">Salary</th>
            <th scope="col">Birthday</th>
            <th scope="col">Created_at</th>
            <th scope="col">Action</th>
        </tr>
        </div>

            <th scope="col">#</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
            <td>
                <a href="view.php?id=<?php echo $row['0']?>"><i class="far fa-eye"></i></a>
                <a href="update.php?id=<?php echo $row['0']?>"><i class="fas fa-pencil-alt"></i></a>
                <a href="delete.php?id=<?php echo $row['0']?>" onclick="return confirm('Bạn chắc chắn muốn xóa !')"><i class="far fa-trash-alt"></i></a>
            </td>
            </tr>

    </table>
    </div>

</div>