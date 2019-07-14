#This repository is a part of submission to online test conducted by Udaan.com for recruitment purpose. Due to time constraints of 4 hours and 15 minutes, it has a very basic front end design. Also some of the functionality may still be buggy. This Web interface uses PHP, HTML, Java Script and MySQL. However, to access the web interface and APIs one must follow the procedure mentioned below.

#The folders in this repository must be moved to htdocs folder of a xampp applcation. The Xampp control panel must have apache server and mysql db enabled. After that you have to create following tables in a mysql database named : udaanapi
1. workers(worker_id,name)
2. assets(asset_id,asset_name)
3. tasks(task_id,task_name,asset_id)
4. allocated (task_id,worker_id,allocateTime, performBy)

#Web Interface will be available on localhost. The web interface will be accesible by localhost/admin/index.php and localhost/worker/viewworker.php.

#Also the API endpoints working on http calls are:

1. localhost/admin/add-asset.php
2. localhost/admin/add-task.php
3. localhost/admin/add-worker.php
4. localhost/admin/allocate-task.php
5. localhost/admin/view-assets.php
6. localhost/worker/task-for-worker.php

#Site will be hosted on www.rushabh.ml soon.
