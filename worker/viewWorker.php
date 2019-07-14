<!DOCTYPE Html>
<head>
    <title>Worker Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script language = "Javascript">
    function loadDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var obj = this.responseText;
                var jsonobj = JSON.parse(obj);
                var i;
                document.getElementById("data").innerHTML = "<table class='center'><tr><th>Tasks Id</th><th>Tasks Name</th></tr>";
                
                for(i=0;i<jsonobj.length;i++){
                    document.getElementById("data").innerHTML += "<tr><td>"+jsonobj[i]['task_id']+"</td><td>"+jsonobj[i]['task_name']+"</td></tr>";
                }
                document.getElementById("data").innerHTML += "</table>";
            }
        }
    };
    var url = "localhost/task-for-worker.php?wid=";
    url+=document.getElementById("wid").value;
    document.getElementById("data").innerHTML = url;
    xhttp.open("GET", url, true);
    xhttp.send();
    }
</script>
</head>
<header>
<h1>Worker Control Panel.</h1>
    <nav class="center">
            <ul>
                <h3>
                    <em>
                        <li><a class="active" href="viewWorker.php">Home</a></li>
                    </em>
                </h3>
            </ul>
    </nav>
</header>
<body>
<form>
<div id="demo">
  <h2>View All Tasks for worker</h2>
  <label> Worker ID : </label>
  <input type="text" id="wid"><br>
  <button type="button" onclick="loadDoc()">Access</button>
</div>
    <div id="data">
    </div>
</body>
</html>
