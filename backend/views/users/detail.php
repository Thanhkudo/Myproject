<div class="container col-10" style="overflow-x: auto">
        <h3>View Employees</h3>
        <hr>
        <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <td><?php echo $select_detail['id']?></td>
                </tr>

                <tr>
                    <th>User Name</th>
                    <td><?php echo $select_detail['username']?></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>***************</td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td><?php echo $select_detail['fullname']?></td>
                </tr>
                <tr>
                    <th>Avatar</th>
                    <td><img height="100px" src="assets/images/users/<?php echo $select_detail['avatar']?>">
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?php echo $select_detail['phone']?></td>
                </tr>
                <tr>
                    <th >Email</th>
                    <td><?php echo $select_detail['email']?></td>
                </tr>
                <tr>
                    <th >Gender</th>
                    <?php if($select_detail['gender']==1):?>
                        <td>Male</td>
                    <?php else:?>
                        <td>Female</td>
                    <?php endif;?>
                </tr>
                <tr>
                    <th >Address</th>
                    <td><?php echo $select_detail['address']?></td>
                </tr>
                <tr>
                    <th >Vip</th>
                    <?php if($select_detail['vip']==1):?>
                        <td>Admin</td>
                    <?php else:?>
                        <td>Member</td>
                    <?php endif;?>
                </tr>
                <tr>
                    <th >Created_at</th>
                    <td><?php echo $select_detail['create_at']?></td>
                </tr>
        </table>
        <br>
        <button class="btn btn-primary"><a href="?controller=users" style="color: #fffFff">Back</a></button>
    <br><br>
</div>