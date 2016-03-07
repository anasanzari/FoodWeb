# Documentation
## 1. Project Structure.
#### Root Scripts

  * /config.php   :   configuration variables.
  * /index.php    :   Front page.
  * /login.php    :   Login page. Handles the Login logic.
  * /logout.php   :   Logout script.

#### Folders

  * /admin        :   Admin page and other scripts for admin functionalities.
  * /classes      :   Contain helper files and other Php classes which adds to the core functionalities of the Project.
  * /includes     :   Contain Page templates reused in different pages.
  * /public       :   Contain images, fonts, stylesheets, javascript and sass files.

## 2. Schema

### Restaurant
    Fields: id,name, place, min_order, img
### Items
    Fields: item_id,restaurant_id,cuisine,name,price,img
### Users
    Fields: id,name,phone,address,email,password
### Orders
    Fields: id,userid,rest_id,address,items,status       


## 3. Other Technical Details

#### Dependencies

* materialize.js : Libray for material design and other front end components.
* illuminate/database : Php library for handling database management.
* angular.js : Library for creating dynamic applications.
* jquery.js : Javascript common tasks library.
