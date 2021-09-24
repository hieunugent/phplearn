<html>
    <head>
    <script>

    </script>
    </head>
   <body>
       <div>
           <form action="post.php"  method="post" enctype="multipart/form-data">
                <h3>Title</h3>
               <input type="text" name="title">
               <br>
               <h3>Post Paragraph</h3>
               <textarea type="text" name="contents" id="" cols="50vw" rows="10"></textarea>
               <br>
            Select image to upload:
               <input type="file" name="fileToUpload" id="fileToUpload">

            <br>
               <input type="submit" >
           </form>
       </div>
   </body>
</html>