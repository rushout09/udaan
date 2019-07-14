<!DOCTYPE Html>
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<header>
<h1>Admin Control Panel.</h1>
    <nav class="center">
            <ul>
                <h3>
                    <em>
                        <li><a href="index.php" value = "Home">Home</a></li>
                        <li><a class="active" href="assetForm.php">Add Asset</a></li>
                        <li><a href="workerForm.php">Add Worker</a></li>
                        <li><a href="taskForm.php">Add Task</a></li>
                        <li><a href="allocateForm.php">Allocate Task</a></li>
                    </em>
                </h3>
            </ul>
    </nav>
</header>
<body>
    <h1>Add Assets.</h1>
    <form  method="post" action="add-asset.php">
        <fieldset class = "center">
            <legend><h2>Details</h2></legend>
                <label >Asset Id : </label><br /> 
                <input type="number" name="aid" id="aid"/><br />
                <label >Asset Name : </label><br /> 
                <input type="text" name="aname" id="aname"/><br />
                <br /><br /> 
            <input class="button" type="submit"/>
        </fieldset>
    </form>
    <br />
</body>
</html>