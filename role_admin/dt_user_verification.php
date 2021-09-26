<thead>
    <tr>
        <th>Name</th>
        <th>No Handphone</th>
        <th>Email</th>
        <th>Status</th>
        <th>Action</th>

</thead>
<tbody>
    <?php
    $queryuser = mysqli_query($konek, "SELECT
    tbl_user.user_id,
    tbl_user.user_email,
    tbl_user.user_password,
    tbl_user.user_nmlengkap,
    tbl_user.user_notelp,
    tbl_user.user_level,
    tbl_user.uservl_status,
    tbl_user_vl.uservl_id,
    tbl_user_vl.uservl_img_identity1,
    tbl_user_vl.uservl_number_identity1,
    tbl_user_vl.uservl_name_identity1,
    tbl_user_vl.uservl_address_identity1,
    tbl_user_vl.uservl_img_identity2,
    tbl_user_vl.uservl_number_identity2,
    tbl_user_vl.uservl_name_identity2,
    tbl_user_vl.uservl_address_identity2
FROM
    tbl_user
INNER JOIN tbl_user_vl ON tbl_user.user_id = tbl_user_vl.user_id
WHERE
    tbl_user.uservl_status = '0'");
    if ($queryuser == false) {
        die("Terjadi Kesalahan : " . mysqli_error($konek));
    }
    while ($user2 = mysqli_fetch_array($queryuser)) {

    ?>




        <td><?= $user2['user_nmlengkap']; ?></td>
        <td><?= $user2['user_notelp']; ?></td>
        <td><?= $user2['user_email']; ?></td>
        <?php
        
        if ($user2['uservl_status'] == 0) {
            echo ' <td>
            <p class="text-c-pink f-w-500" </i><b> NEED VERIFICATION</b></p>
        </td>';
        } else {
            echo ' <td>
            <p class="text-c-green  f-w-500" </i><b>VERIFIED</b></p>
        </td>';
        }
        ?>
    



        <td><a href="user_verification_edit.php?id=<?= $user2['user_id']; ?>"><button class="btn btn-secondary btn-sm"><i class="fa fa-pencil fa-sm"></i></button>&nbsp;</td></a>
        </tr>

</tbody>

<div class="modal fade" id="ModalVerification<?= $id; ?>" tabindex="-1" role="dialog">
<?php } ?>
<div class="modal-dialog modal-lg " role="document">
    <?php
    $user_id2 = $user['user_id'];
    $queryuser = mysqli_query($konek, "SELECT*from tbl_user_vl WHERE user_id='$user_id2' ");
    if ($queryuser == false) {
        die("Terjadi Kesalahan : " . mysqli_error($konek));
    }
    while ($user = mysqli_fetch_array($queryuser)) {

    ?>
        <form action="user_vl_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Verification Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Fullname : </label>
                        <div class="col-sm-10">
                            <input type="file" name="uservl_img_identitas2" class="form-control" multiple="multiple">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Picture KTP</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" name="uservl_id" value="<?php echo $kodeUservl ?>" readonly>
                            <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id ?>">

                            <input type="file" name="uservl_img_identity1" class="form-control" multiple="multiple">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="uservl_number_identity1" placeholder="No KTP">
                        </div>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="uservl_name_identity1" placeholder="Nama Sesuai KTP">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <textarea rows="5" cols="5" class="form-control" name="uservl_address_identity1" placeholder="Alamat sesuai KTP"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Upload SIM/NPWP</label>
                        <div class="col-sm-10">
                            <input type="file" name="uservl_img_identitas2" class="form-control" multiple="multiple">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="uservl_no_identitas2" placeholder="No SIM/NPWP">
                        </div>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="uservl_nm_identitas2" placeholder="Nama Sesuai SIM/NPWP">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <textarea rows="5" cols="5" class="form-control" name="uservl_address_identitas2" placeholder="Alamat sesuai SIM/NPWP"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">User Status</label>
                        <div class="col-sm-10">
                            <select name="select" class="form-control">
                                <option value="opt1">Activated</option>
                                <option value="opt2">Not Active</option>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                    </div>
                </div>
            </div>
        </form>

    <?php } ?>
</div>
</div>