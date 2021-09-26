<thead>
    <tr>
        <th>Event Name</th>
        <th>User</th>
        <th>Category</th>
        <th>Event Status</th>
        <th>Jenis Event</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php
    $queryevent = mysqli_query($konek, "SELECT
    tbl_event.event_id,
    tbl_event.event_name,
    tbl_user.user_nmlengkap,
    tbl_event.event_category,
    tbl_event.event_status,
    tbl_event.event_jenis
FROM
    tbl_user
INNER JOIN tbl_event ON tbl_user.user_id = tbl_event.user_id");
    if ($queryevent == false) {
        die("Terjadi Kesalahan : " . mysqli_error($konek));
    }
    while ($event = mysqli_fetch_array($queryevent)) {
    ?>
        <tr>
            <td><?php echo $event['event_name']; ?></td>
            <td><?php echo $event['user_nmlengkap']; ?></td>
            <td><?php echo $event['event_category']; ?></td>
            <?php
                if ($event['event_status'] == 0) {
                    echo ' <td>
            <p class="text-c-pink f-w-500" </i><b> NOT ACTIVE</b></p>
        </td>';
                } else {
                    echo ' <td>
            <p class="text-c-green  f-w-500" </i><b>ACTIVE</b></p>
        </td>';
                }
                ?>
            
            <?php
                if ($event['event_jenis'] == 0) {
                    echo ' <td>
            <p class="text-c-pink f-w-500" </i><b> PRIVATE</b></p>
        </td>';
                } else {
                    echo ' <td>
            <p class="text-c-green  f-w-500" </i><b>PUBLIC</b></p>
        </td>';
                }
                ?>
            


            <td><a href="event_edit.php?id=<?php echo $event['event_id']; ?>"><button class="btn btn-secondary btn-sm"><i class="fa fa-pencil fa-sm"></i></button>&nbsp;</a></td>
        </tr>

</tbody>
<?php } ?>