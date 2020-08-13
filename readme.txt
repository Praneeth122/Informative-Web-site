To install/relocate this your server 
Follow this steps.
1. In your phpmyadmin create a database name "tnstc". Click on Import database and Run the SQl file database.sql in your database.
2. Go to constants.php under libs folder. (libs/constants.php)
4. Give the database name in DB_DATABASE which you added in step 1, add database username, hostname, passsword. leave the table name as it is
5. Set up your other fields like site path, site name.
6. You can manage your backend through manage-site folder.
7. If you need to create additional page just simply copy history.php and rename it. But make sure add the same name when adding the content in the database. 
E.g. if you create demo.php add demo as the page alias in the database.

