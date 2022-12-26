<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>

<body>
    <div class="background">
        <div id="container">
            <h1>Todo List</h1>
            <form action="insertion.php" id="form-action" method="post" class="form-horizontal">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-8 col-sm-10">
                        <label class="form-label">Enter Your Activity</label>
                        <input class="form-control" name="txtActivity" />
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-8 col-sm-10">
                        <label class="form-label">Date</label>
                        <div class='input-group'>
                            <input type='text' class="form-control apdate" name="txtdate" id="txtdate" data-target-input="nearest" />
                            <span class="input-group-addon input-group-text todoDate">
                                <span class="fa fa-calendar todoDate"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-8 col-sm-10 mt-3 mb-5">
                        <input type="submit" id="form-button-Add" class="btn btn-success" name="add" value="Add" />
                        <input type="reset" id="form-button-clear" class="btn btn-danger" value="Clear" />
                    </div>
                </div>

            </form>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-8 col-sm-10">
                    <?php
                    include 'connection.php';
                    $i = 0;
                    $selectquery = "SELECT id, activity, date FROM todo";
                    $query = mysqli_query($conn, $selectquery);
                    $num = mysqli_num_rows($query); 
                    if($num>0) { ?>

                    <table class="table table-bordered text-center tableResponsive">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">Serial Number</th>
                                <th hidden scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Scheduled</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($res = mysqli_fetch_array($query)) {
                                $i++
                            ?>
                                <tr>
                                    <th class="todos-column" scope="row"><?php echo $i; ?></th>
                                    <th hidden class="todos-column" scope="row"><?php echo $res['id']; ?></th>
                                    <th class="todos-column" scope="row"><?php echo $res['activity']; ?></th>
                                    <th class="todos-column" scope="row"><?php echo date("d-m-Y", strtotime($res['date'])); ?></th>
                                    <td class="buttons-column center">
                                        <input type="submit" class="btn btn-primary" value="Delete" onclick="document.location.href='delete.php?id=<?php echo $res['id']; ?>'" />
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php }
                    else{
                        ?>
                        <div class="alert alert-danger alert-dismissible text-center" id="closeDialog">No Data Found</div>
                        <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Datepicker -->
    <script src="assets/bootstrap-datepicker.min.js"></script>
    <!-- InputMask -->
    <script src="assets/jquery.inputmask.min.js"></script>
    <script>
        $(function() {
            $('#txtdate').inputmask('99-99-9999', {
                'placeholder': 'dd/mm/yyyy'
            });

            var date = new Date();
            date.setDate(date.getDate() - 1);
            $('#txtdate').datepicker({
                startDate: date,
                autoclose: true,
                format: 'dd/mm/yyyy',
            });

        });
        $('.todoDate').on('click', function() {
            $('#txtdate').datepicker('show');
        });
    </script>
</body>

</html>