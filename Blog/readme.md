# Structure Build :
- main page: Read & Delete
    - this will show every one post
    - viewing all the posts by short contents
    - view delete each post 
    - choose to see fulling all posting
    - delete item
    - update item  
- post page: Create
    - post contents on this page
    - check the contents is not empty 
    - can move back and forth between the pages, or at least moving back the main page if not add any post
    - return to HomePage after post
- update page: Update
    - get old data in the input box 
    - be able to edit 
    - be able to be submitted change data
- delete page: delete 
- user&password: 
    - restrict the delete permission of Users for each article
    - page only showing the posting of User

- single Read page:
- DataBase: using MongoDB
# user data require:
 - username must be unique: need to have a function to check data.
 - username must have/haven't special characters
 - username length restriction.
 - password status: weakest or strongest
 - password res
 - using Auth of Google for now, and it can take care of the hassle.
 # NOTE:
- to read data with ID on MongoDB, we need to cast it into new MongoDB\BSON\ObjectId($value).
- name of an attribute is the value for "the GET /POST" server
- CRUD
- look for image storage choose MongoDB
- UX for button done
- add the timestamp for data in MongoDB
- do the ordering display on the web, the early come first: by modifying the filter and sort in MongoDb retrieve
- logging user, update so everyone could see your post, but only you can edit and delete it, and it's under your username
# log: 
- update NGINX
- NGINX PLUS Admin GUIDE
- https://docs.nginx.com/nginx/admin-guide/web-server/serving-static-content/?_ga=2.115856449.611436112.1636041269-804012040.1636041269
# E_Z Solution analogy 
- Frontend Server (Svelte) - Middle ware- Backend Server (Node.js), DataServer(Oracle)
- in the Middle ware must be some connect engine such as NGINX
- NGINX where pineline in update as server change
- use Oracle to beVM of the website
- aws service
- install NGINX in VM 