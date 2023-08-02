
# Repro

To repro the issue 
- clone the app
- create a database and configure it in your .env file 
- run the migrations
- start app via php artisan serve
- create a user, e.g. via tinker  User::create(['name' => 'test test', 'email' => 'test@test.com', 'password' => '111111111'])
- browse to http://localhost:8000/nova/login and login with the user credentials you just created
- browse to http://localhost:8000/nova/resources/orders and create a new order
- go back to the index view and hover the mouse over the user relationship. A window opens and you can peek at the email address of the user that is associated with the order. 
- now go to http://localhost:8000/nova/resources/orders/lens/order-lens. The same index view is provided. Hovering over the username doesn't open the window with the user's email address however. Peeking doesn't seem to work. 
- If you open the Chrome Dev Tools you'll see that without a lens a peek request is made (
http://localhost:8000/nova-api/users/1/peek). With a lens the peek request is not made. 

# Code Changes made on top of a default Nova install: 
- added a very basic Order model (https://github.com/thomasdeml/nova-peeking/blob/master/database/migrations/2023_08_02_000000_create_order_table.php and https://github.com/thomasdeml/nova-peeking/blob/master/app/Models/Order.php) 
- added a Nova resource for the Order model: https://github.com/thomasdeml/nova-peeking/blob/master/app/Nova/Order.php
- added a lens for the order resource: https://github.com/thomasdeml/nova-peeking/blob/master/app/Nova/Lenses/OrderLens.php
- added showWhenPeeking() to the email field of the Nova User resource: https://github.com/thomasdeml/nova-peeking/blob/master/app/Nova/User.php
