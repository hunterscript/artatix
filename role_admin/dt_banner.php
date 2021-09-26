
<thead>
    <tr>
        <th>Banner Picture</th>
        <th>Event Name</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php
    $querybanner= mysqli_query($konek, "SELECT tbl_event.event_id,tbl_event.event_name, tbl_banner.banner_id, tbl_banner.banner_picture, tbl_banner.banner_status  from tbl_banner INNER join tbl_event on tbl_banner.event_id=tbl_event.event_id");
    if ($querybanner == false) {
        die("Terjadi Kesalahan : " . mysqli_error($konek));
    }
    while ($banner = mysqli_fetch_array($querybanner)) {
    ?>
        <tr>
            <td><?php echo $banner['banner_picture']; ?></td>
            <td><?php echo $banner['event_name']; ?></td>
            <td><?= $banner['banner_status'];?></td>
            <td><a href="banner_delete.php?id=<?php echo $banner['banner_id']; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i></button>&nbsp;</a></td>
        </tr>

</tbody>
<?php } ?>