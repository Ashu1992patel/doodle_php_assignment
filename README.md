# doodle_php_assignment

1) Run the below commands:
    i) php artisan migrate
    ii) php artisan db:seed --class=PermissionTableSeeder
        php artisan db:seed --class=CreateAdminUserSeeder
        php artisan db:seed --class=RolesAndPermissionsSeeder
        OR
        php artisan db:seed
     OR 
     php artisan migrate:refresh --seed
    
2) Please login with the provided admin username & password
3) Go To Roles & Edit Users Permissions 
    - Select Book-List, subscribe-list, subscribe-create, subscribe-edit, subscribe-delete
    - Save the changes (user will be able to see the available book and can subscribe)
4) Now Admin Can Upload the sample file for book or can create new one as provided sample.
5) Admin can add a book manually too.
6) Post adding books, logout from the system
7) Register a New User, GOTo Books List section & Try to subscribe a book, once subscribed user will be able to see the book info.

Packages used in this project are as below:
        1) "cyber-duck/laravel-excel": "^2.1", (For Importing books record in bulk from excel)
        2) "laravel/telescope": "^3.5", (For Request Tracking & Debugging)
        3) "laravelcollective/html": "^6.1",(HTML and FORM generator allowing you to handle easy to manage forms in blade files)
        4) "spatie/laravel-permission": "^3.13" (For Role Management)

Note: All the tasks has been covered, Please let me know if there is any concern contact: ashu1992patel@gmail.com
