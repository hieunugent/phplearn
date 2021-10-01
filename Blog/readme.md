# Structure Build :
- main page:Read & Delete
    - view all the post by short contents
    - view delete each post 
    - choose to see full post
    - delete item
    - update item  
- post page:Create
    - post contents on this page
    - check the contents is not empty 
    - can move back and forth between the pages, or at least move back the main page if not add any post
    - return to mainpage for all post after post
- update page: Update
    - get old data in the input box 
    - be able to edit 
    - be able to be submit change data
- delete page: delete 

- single Read page:
- DataBase: using mongodb
# NOTE:
- to read data with ID on mongodb , we need to cast it in to new MongoDB\BSON\ObjectId($value), this way make the string that we pass in php will have same class with string ID on mongoDB ID 
- name of attribute is value for get/post server
- CRUD
- look for image storage 