<?php include 'include/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
    <script src="controller.js" type="text/javascript"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Appointment Finder</title>
</head>
<body>
    <div id="container">
        <!--info-->
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm-9 bg-secondary">
                <label for="seachfield" class="form-label">Available Names: "Doe" | "Smith"</label>
            </div>
            <div class="col-sm"></div>
        </div>

        <!--Search field-->
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm-9">
                <div class="input-group">
                    <input type="text" class="form-control" id="seachfield" placeholder="Search via ID">
                    <button type="button" class="btn btn-success" id="btn_Search">Search</button>
                </div>
            </div>
            <div class="col-sm"></div>
        </div>


        <!-- message -->
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm-9" id="searchResult">
                <label for="noOfentries" class="form-label">Number of entries found:</label>
                <input type="text" readonly class="form-control-plaintext" id="noOfentries">
                <input type="text" readonly class="form-control-plaintext" id="ids">
            </div>
            <div class="col-sm"></div>
        </div>
    </div>
</body>
</html>