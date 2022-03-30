
<!DOCTYPE html>
<html lang="en">
<?php include("global/utility.php"); ?>
    <head>
        <?php include("partials/head.php"); ?>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.1/css/fixedHeader.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
        <title>Dashboard - OSAS</title>
    </head>
    <body class="sb-nav-fixed">
        <?php include("partials/topbar.php"); ?>
        <div id="layoutSidenav">
            <?php include("partials/leftbar.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="col-md-6">                                
                                <h1 class="my-4">Dashboard</h1>                                  
                            </div>
                            
                        </div>                       
                        <div class="row">
                            <div class="col-md-6">                                
                                <h2 class="my-4">Log</h2>                                  
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Waktu</th>
                                            <th>IDCard</th>  
                                            <th>Nama</th>                                             
                                            <th>Status</th>                                                                                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        include 'global/db_access.php';

                                        $sql = "SELECT  log_absen.*, data_siswa.nama 
                                        FROM log_absen
                                        LEFT JOIN data_siswa
                                        ON data_siswa.id_card=log_absen.id_card";
                                                                               
                                        $load = mysqli_query($conn,$sql);   
                                        while ($row = mysqli_fetch_array($load)){
                                        
                                        echo '<tr>';
                                            echo '<td>'.$row['id_log'].'</td>';                                           
                                            echo '<td>'.$row['waktu'].'</td>'; 
                                            echo '<td>'.$row['id_card'].'</td>';
                                            echo '<td>'.$row['nama'].'</td>';
                                            echo '<td>'.$row['status'].'</td>';                                                                                                                                                                                                                                                                                
                                        echo '</tr>';                                
                                        }   
                                    ?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>                  
                        
                    </div>
                </main>
                <?php include('partials/footer.php'); ?>
            </div>
        </div>
        <?php include("partials/scripts.php"); ?>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
        <script>
              $(document).ready(function() {
                    $('#bootstrap-data-table').DataTable({
                        "order": [[ 0, "desc" ]],
                        responsive : true
                        // "columnDefs" : [
                        //     {
                        //         "targets" : [0],
                        //         "visible" : false
                        //     }
                        // ]
                    });
              });
        </script>
    </body>
</html>
