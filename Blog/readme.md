# Structure Build :
- main page:
    - view all the post by short contents
    - view delete each post 
    - choose to see full post
    - delete item
    - update item
    
- post page:
    - post contents on this page
    - check the contents is not empty 
    - can move back and forth between the pages, or at least move back the main page if not add any post
    - return to mainpage for all post after post
# NOTE:
- to read data with ID on mongodb , we need to cast it in to new MongoDB\BSON\ObjectId($value), this way make the string that we pass in php will have same class with string ID on mongoDB ID 
- name of attribute is value for get/post server