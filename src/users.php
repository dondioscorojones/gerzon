<!-- USERS TAB -->
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

    <!-- REGISTER USER BUTTON -->
    <div class="row p-2">
        <div class="col">
            <a href="register.php" class="btn btn-info float-end">Register User</a>
        </div>
    </div>
        
    <!-- USERS TABLE -->
    <table class="table table-sm table-hover table-bordered">
        
        <!-- USERS TABLE HEAD -->
        <thead>
            <tr class="bg-dark text-white">
                <th scope="col">ID #</th>
                <th scope="col">Full Name</th>
                <th scope="col">Contact #</th>
                <th scope="col" class="d-none d-lg-table-cell">Email</th>
                <th scope="col" class="d-none d-lg-table-cell">Course</th>
                <th scope="col">Power Allowance</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <!-- USERS TABLE BODY -->
        <tbody>
            <?php 
                if (mysqli_num_rows($result_user) > 0) {
                    while ($row = mysqli_fetch_assoc($result_user)) { 
            ?>
            <tr>
                <th><?=$row['id']; ?></th>
                <td><?=$row['full_name']; ?></td>
                <td><?=$row['contact_number']; ?></td>
                <td class="d-none d-lg-table-cell"><?=$row['email']; ?></td>
                <td class="d-none d-lg-table-cell"><?=$row['course']; ?></td>
                <td class="text-center">
                    <?php if ($row['user_type'] === 'student') { ?>
                        <?=$row['allowance']-1; ?>
                        <a class="btn btn-info btn-sm mb-lg-0 mb-md-1" 
                            href="php/update/update_user_allowance.php
                                ?id=<?php echo $row['id']; ?>
                                &allowance=<?php echo $row['allowance']+1; ?>"
                            >+
                        </a>
                    <?php } else if ($row['user_type'] === 'admin') { ?>
                        <p>N/A for Admin</p>
                    <?php } else { ?>
                        <p>N/A for Faculty</p>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($row['user_type'] === 'student') { ?>
                        <a class="btn btn-success btn-sm mb-lg-0 mb-md-1" 
                            href="add_schedule.php?user=<?php echo $row['full_name']; ?>&course=<?php echo $row['course']; ?>">Set Schedule</a>
                        <?php echo "<a class='btn btn-danger btn-sm' onClick=\"javascript: 
                            return confirm('Click OK to delete ".$row['full_name'].".');\" href='php/delete/delete_user.php?
                            id=".$row['id']."'>Remove</a>"; ?>
                    <?php } else {?>
                    <?php 
                        echo "<a class='btn btn-danger btn-sm' onClick=\"javascript: 
                            return confirm('Click OK to delete ".$row['full_name'].".');\" href='php/delete/delete_user.php?
                            id=".$row['id']."'>Remove</a>"; ?>
                    <?php } ?>
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
</div>
