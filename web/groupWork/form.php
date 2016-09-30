<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hunter J Marshall</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <header class="head">
        <h2>CS 313 - Web Engineering II</h2> </header>
    <main class="sit-content container" id="Content" role="main">
        <div class="col-lg-12 col-lg-offset-1 col-xl-8 col-xl-8 row" id="page-content">
            <div class="page-header clearfix">
                <h1>Student Survey - RESULTS</h1> </div>
            <div class="row">
                <div class="col-md-12"> <img alt="Computer Science" class="img-responsive" src="computer-sci.jpg" height="300px" width="100%" />
                    <p class="open-paragraph">These are the results of the survey, passed using a POST request.
                    </p> Your name:
                    <?php echo $_POST["name"]; ?>
                    <br/>
                    Your email:
                    <?php echo $_POST["email"]; ?>
                    <br/>
                    Your major:
                    <?php echo $_POST["major"]; ?>
                    <br/>
                    Places you have been:
                    <?php
                        if(isset($_POST['places'])){
                            if (is_array($_POST['places'])) {
                                foreach($_POST['places'] as $value){
                                    echo $value;
                                    echo " ";
                                }
                            } else {
                                $value = $_POST['places'];
                                echo $value;
                            }
                        }
                    ?>
                    <br/>
                    Your comments:
                    <?php echo $_POST['comments']; ?>
                    <br/> 
                    <br/>
                </div>
            </div>
        </div>
    </main>
    <footer class="quote-footer">
        <h4>"To be a good preofessional engineer, always smart to study late for exams because it teaches you how to manage time and tackle emergencies."" - Bill Gates</h4> </footer>
</body>

</html>