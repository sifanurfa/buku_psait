<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<?php
 $id_buku = $_GET['id_buku'];
 $curl= curl_init();
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 //Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
 curl_setopt($curl, CURLOPT_URL, 'http://10.33.35.32/buku_api/buku_api.php?id_buku='.$id_buku.'');
 $res = curl_exec($curl);
 $json = json_decode($res, true);
//var_dump($json);
?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Data</h2>
                    </div>
                    <p>Please fill this form and submit to add student record to the database.</p>
                    <form action="updateBukuDo.php" method="post">
                        <input type = "hidden" name="id_buku" value="<?php echo"$id_buku";?>">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" value="<?php echo($json["data"][0]["judul"]); ?>">
                        </div>
                        <div class="form-group">
                            <label>Pengarang</label>
                            <input type="mobile" name="pengarang" class="form-control" value="<?php echo($json["data"][0]["pengarang"]); ?>">
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>