<html>
<head>
    <title>Yo</title>
    <script src="js/lib/jquery.min.js"></script>
</head>
<body>

    <div> data will be below</div>
    <br>
    <div id="data"></div>



    <script>
        var xmlhttp = new XMLHttpRequest();
        var obj = "";
        var txt = "";

        //Data is coming back here
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //Carol, Uncomment this below line to see the json data which is coming back
                document.getElementById("data").innerHTML = this.responseText;

                //This is json parsing below
                myObj = JSON.parse(this.responseText);

                for (x in myObj) {
                    //loop through the rows here, which are returned from the database
                    // document.getElementById("data").innerHTML = myObj[x].phone;
                }
            }
        };

        //Data to send
        var user = "carol@gmail.com";
        xmlhttp.open("GET", "testPHP.php?user=" + user, true);
        xmlhttp.send();
    </script>

</body>
</html>
