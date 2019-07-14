<!DOCTYPE Html>
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script language = "Javascript">
    function loadDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            var obj = this.responseText;
            var jsonobj = JSON.parse(obj);
            var i;
            var val = "<table class='center'><tr><th>Asset Id</th><th>Asset Name</th></tr>";             
            for(i=0;i<jsonobj.length;i++){
                val +=  "<tr><td>"+jsonobj[i]['asset_id']+"</td><td>"+jsonobj[i]['asset_name']+"</td></tr>";
            }
            val+="</table>";
            document.getElementById("data").innerHTML = val;
        }
    };
    xhttp.open("GET", "view-assets.php", true);
    xhttp.send();
    }
</script>
</head>
<header>
<h1>Admin Control Panel.</h1>
    <nav class="center">
            <ul>
                <h3>
                    <em>

                        <li><a class="active" href="index.php">Home</a></li>
                        <li><a href="assetForm.php">Add Asset</a></li>
                        <li><a href="workerForm.php">Add Worker</a></li>
                        <li><a href="taskForm.php">Add Task</a></li>
                        <li><a href="allocateForm.php">Allocate Task</a></li>
                    </em>
                </h3>
            </ul>
    </nav>
</header>
<body>
<form>
<div id="demo">
  <h2>Click to View All Assets</h2>
  <button type="button" onclick="loadDoc()">Access</button>
</div>
<div id="data">
</body>
</html>
