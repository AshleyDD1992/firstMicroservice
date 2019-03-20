f = open("index.html", "w")


script = """<!DOCTYPE html>
<html>
<title>Multi Stage Dockerfile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>

   <div class="w3-container">
       <h2>Multi-Stage Dockerfile Examle:</h2>
       <p>This page was created by a multi-stage Dockerfile executing the following steps:</p>
       <ul>
           <li>Stage 1
               <ul>
                   <li>A PHP docker container was built.</li>
                   <li>A PHP script using GD commands to create an image was copied into the PHP container.</li>
                   <li>The PHP Scipt was run and an image was created.</li>
               </ul>
           </li>
           <li>Stage 2
                <ul>
                    <li>A Python container was built.</li>
                    <li>Created a new Working Directory and copied a local Python script into it.</li>
                    <li>Ran the Python script and piped the resulting html file into an index.html file </li>
                </ul>
           </li>    
           <li>Statge 3
               <ul>
                   <li>A HTTPD (webserver) docker contianer was built. </li>
                   <li>The index.html file created by the Python Container was copied to the htdocs folder on the HTTPd container, replacing the index.html file that is already in the HTTPd container. </li>
                   <li>The image created by the PHP contianer was copied to the  htdocs folder on the HTTPd container.</li>
                   <li>Port 80 of the HTTPD continer was exposed to the world.</li>
                   <li>To test the HTTPD container the server address http://172.17.0.2/  was used</li>
               </ul>
           </li>
           <li>Statge 4
                   <ul>
                       <li>We built and tested the end product by: </li>
                       <li>docker build .</li>
                       <li>docker run -p 8080:80 DOCKER_IMAGE_ID.</li>
                   </ul>
               </li>
       </ul>
       <img src="myimage.png" style="height: 300px; width: 300px">
   </div>

</body>

</html>"""


f.write(script)
f.close()