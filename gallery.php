<!DOCTYPE html>
<html>
    <head>
        <title>SAP</title>
            <h2> SAP gallery </h2>
                <meta http-equiv="content-type" content="text/html; charset=UTF-8">
                <meta name="description" content="">
                <meta name="keywords" content="">
                <meta name="author" content="Tomislav Dokmanić">
                <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            .gallery {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 10px; }

            .gallery img {
                width: 100%;
                height: auto;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease-in-out; }

            .gallery img:hover {
                transform: scale(1.8);
                max - width: 100%;
                max - height: 100vh; }
        </style>

    </head>

    <body>
        <div class="gallery">

            <?php
                $imageFolder = 'gallery/';
                if (is_dir($imageFolder)) {             
                    if ($dh = opendir($imageFolder)) {                    
                        while (($file = readdir($dh)) !== false) {                       
                            $imagePath = $imageFolder . $file;
                            if (is_file($imagePath) && in_array(pathinfo($imagePath)['extension'], ['jpg', 'jpeg', 'png'])) {
                                echo '<img src="' . $imagePath . '" alt="Image" title="' . htmlspecialchars($file) . '">'; } }
                        closedir($dh); } }
            ?>
        </div>
        <p>Social media:<br>
            <a href="https://www.linkedin.com/company/sap/" target="_blank"><img src="img/linkedin.svg" alt="Linkedin" title="Linkedin" style="width:24px; margin-top:0.4em"></a>
            <a href="https://twitter.com/SAP" target="_blank"><img src="img/twitter.svg" alt="Twitter" title="Twitter" style="width:24px; margin-top:0.4em"></a>
            <a href="https://cloud.google.com/solutions/sap" target="_blank"><img src="img/cloud-logo.svg" alt="Google+" title="GoogleCloud" style="width:100px; margin-top:0.4em"></a>
        </p>   
    </body>
</html>