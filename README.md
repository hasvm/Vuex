# YcodeA
Ycode test assignment

A database table should be created to store the collection's items which would make the client side have a better performance. The table wasn't created so that the server side wouldn't have any DB requests and have a better performance but it would be better for the overall performance and implementation to have the collections in a table.

I use Vue router and created a SPA, routes still need to be managed, such as 404, if we request routes that aren't defined and have more than one segment the app will not function properly. Also to have a better performance, bundle optimization should be done

Please notice that the errors from the validator from the request placeOrder should be handled by the front-end and displayed to the user.

Also to avoid "losing" the data after a page refresh the plugin vuex-persist should be installed and implemented.

To run the application just run the following commands:
php artisan serve
npm run production
