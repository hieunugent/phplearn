# Structure Build :
- main page: Read & Delete
    - this will show every one post
    - view all the post by short contents
    - view delete each post 
    - choose to see full post
    - delete item
    - update item  
- post page: Create
    - post contents on this page
    - check the contents is not empty 
    - can move back and forth between the pages, or at least move back the main page if not add any post
    - return to HomePage after post
- update page: Update
    - get old data in the input box 
    - be able to edit 
    - be able to be submit change data
- delete page: delete 
- user&password: 
    - restrict the delete permission of user for each article
    - will develop a page only show one user post

- single Read page:
- DataBase: using mongodb
# user data require:
 - username must be unique: need to have a function to check unique data.
 - username no special character are allowed.
 - username length restriction.
 - password display weak , strong, strongest password
 - password must content some restriction, e.g. Capitalize, number, speacial character
# NOTE:
- to read data with ID on mongodb , we need to cast it in to new MongoDB\BSON\ObjectId($value), this way make the string that we pass in php will have same class with string ID on mongoDB ID 
- name of attribute is value for get/post server
- CRUD
- look for image storage choose mongoDB
- UX for button done
- add the timestamp for data in MongoDb
- do the ordering display on the web, the early come first: by adjusing the filter and sort in MongoDb retrieve
- logging user, update so everyone could see your post, but only you can edit and delete it, it must under your username
- 

