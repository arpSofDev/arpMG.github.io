<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>File Input and Output</title>
        
        <!-- links to CDN -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css"> 
        
        <style>
            .list-group-item .glyphicon{
                float: right;
            }
        </style>
        
        <?php
        //Set vars
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $_SESSION['sFolderName'] = "";
            $_SESSION['sFileName'] = "";
            $_SESSION['arFiles'] = "";
            $_SESSION['sFileData'] = "";
        }
        
        //Check the status of the text boxes
        if(isset($_POST['foldername'])){
            $_SESSION['sFolderName'] = $_POST['foldername'];
            if(strlen($_SESSION['sFolderName']) > 0){
                $_SESSION['arFiles'] = scandir($_SESSION['sFolderName']);
                //$_SESSION['arFiles'] will contain boolean FALSE if an error occurred
            }
        }
        if(isset($_POST['filename'])){
            $_SESSION['sFileName'] = $_POST['filename'];
        }
        
        //which button was clicked?
        if(isset($_POST['folderList'])){
            if(strlen($_SESSION['sFolderName']) > 0){
                $_SESSION['arFiles'] = scandir($_SESSION['sFolderName']);
                //$_SESSION['arFiles'] will contain boolean FALSE if an error occurred
            }
            
        }elseif(isset($_POST['download'])){
            if(strlen($_SESSION['sFileName']) > 0){
                $sFilepath = $_SESSION['sFolderName']."/".$_SESSION['sFileName'];
                $filehandle = fopen($sFilepath, "r");
		$_SESSION['sFileData'] = fread($filehandle, filesize($sFilepath));
		fclose($filehandle);
            }else{
                $_SESSION['sFileData'] = "No file selected";
            }
            
        }elseif(isset($_POST['upload'])){
            
            if(strlen($_SESSION['sFileName']) > 0){
                $_SESSION['sFileData'] = $_POST['contents'];
                if(strlen($_SESSION['sFileData']) > 0){
                    $sFilepath = $_SESSION['sFolderName']."/".$_SESSION['sFileName'];
                    $filehandle = fopen($sFilepath, "w");
                    fwrite($filehandle, $_SESSION['sFileData']);
                    fclose($filehandle);                    
                }
            }
            
        }elseif(isset($_POST['reset'])){
            session_destroy();
            header('Location: fileIO.php');
            exit;
        }        
        
        ?>
        
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>Directory/File Management Tools</h1>
            </div>
            <form name="frmFolder" method="post">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                </span>
                                <input type="text" class="form-control" id="foldername" name="foldername" placeholder="Folder name" 
                                       <?php if(strlen($_SESSION['sFolderName'])> 0){
                                           echo "value='".$_SESSION['sFolderName']."'";
                                       }?> >
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" id="folderList" name="folderList">List</button>
                                </span>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php 
                            if(strlen($_SESSION['sFolderName']) == 0){
                                echo "<p>No folder selected</p>";
                            }else{

                                if($_SESSION['arFiles'] === false){
                                     echo "<p>An error occured</p>"; 
                                }else{
                                    echo "<ul class='list-group'>".PHP_EOL;
                                        if(count($_SESSION['arFiles']) > 0){
                                            foreach($_SESSION['arFiles'] as $file){
                                                echo "<li class='list-group-item";
                                                if(is_dir($_SESSION['sFolderName']."/".$file)){
                                                    echo " folder'>$file<span class='glyphicon glyphicon-folder-close'></span>";
                                                }else{
                                                    echo "'>$file<span class='glyphicon glyphicon-pencil'></span>";
                                                }
                                                echo "</li>".PHP_EOL;
                                            }
                                        }
                                    echo "</ul>".PHP_EOL;
                                }
                            }
                            ?>
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-default" type="submit" name="reset">Reset Session</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </span>
                                <input type="text" class="form-control" id="filename" name="filename" placeholder="Filename"
                                       <?php if(strlen($_SESSION['sFileName'])> 0){
                                           echo "value='".$_SESSION['sFileName']."'";
                                       }?> >
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" name="download"><span class="glyphicon glyphicon-download"></span></button>
                                </span>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" name="upload"><span class="glyphicon glyphicon-upload"></span></button>
                                </span>
                            </div>
                        </div>
                        <div class="panel-body fill-height-or-more">
                            <div class="well">
                                <textarea class="form-control" rows="30" name="contents"><?php echo $_SESSION['sFileData'];?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- links to JS CDN -->
        <!-- JQuery required for Bootstrap responsive elements -->
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script>
            $('.list-group-item').on('click',function(e){
                var previous = $(this).closest(".list-group").children(".active");
                previous.removeClass('active'); // previous list-item
                $(e.target).addClass('active'); // activated list-item
                //document.getElementById("filename").value = $(e.target).text();
                $("#filename").val($(e.target).text());
            });
            $('.list-group-item').on('dblclick', function(e){
                if($(e.target).hasClass('folder')){
                    $('#foldername').val($(e.target).text());
                    $('#folderList').trigger('click');
                }
            });
        </script>
    </body>
</html>