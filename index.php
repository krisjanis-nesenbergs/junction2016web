<!DOCTYPE HTML>
<!--
    Directive by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Directive by HTML5 UP</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <script src="zzzyield.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js"></script>
        <script language="javascript">
        <?php
            $empl = -1;
            $stat = -1;
            $token = "OLF43KDW6KIJZQUIQYR6H3YL3L6WF5QB";
            if(isset($_GET['employee']) && !empty($_GET['employee'])){
                $empl = intval($_GET['employee']);
            }
            if(isset($_GET['state']) && !empty($_GET['state'])){
                $stat = intval($_GET['state']);
            }

            $svalue = $_SERVER["MYSQLCONNSTR_localdb"];
            $servername = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $svalue);
            $dbname = "zzz";
            $username = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $svalue);
            $password = preg_replace("/^.*Password=(.+?)$/", "\\1", $svalue);

            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            $sql = "";
            if($empl==10)$empl=0;
            if($empl>-1){
                $sql = "UPDATE state SET user=".$empl;
                $result = $conn->query($sql);
            } else {
                $sql = "SELECT user FROM state";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $empl = $row["user"];
                }

            }
            if($stat == 10) $stat=0;
            if($stat>-1){
                if($stat<5){
                    $sql = "UPDATE state SET s1=".$stat;
                } else {
                    $stat2 = $stat-5;
                    $sql = "UPDATE state SET s2=".$stat2;
                }
                $result = $conn->query($sql);
            }
            $conn->close();

            switch($empl){
                case 1:
                    $token = "C6Q7SYJDDCTQW4DZ2OC6CKWFMIU3LQ7V";
                    break;
                case 2:
                    $token = "CT7NQBYLSVVUQ5N4NJ4CVVY7Q22DB7OB";
                    break;
            }


        ?>
            var usr_id = <?php echo($empl) ?>;

            var data = {
                sleep:<?php
                    echo(file_get_contents('https://api.ouraring.com/v1/sleep?access_token='.$token));
                ?>,
                activity:<?php
                    echo(file_get_contents('https://api.ouraring.com/v1/activity?access_token='.$token));
                ?>,
                readiness:<?php
                    echo(file_get_contents('https://api.ouraring.com/v1/readiness?access_token='.$token));
                ?>
            }

            var deezer = {
                a0:<?php
                    echo(file_get_contents('http://api.deezer.com/album/9410104'));
                ?>,
                a1:<?php
                    echo(file_get_contents('http://api.deezer.com/album/12207938'));
                ?>,
                a2:<?php
                    echo(file_get_contents('http://api.deezer.com/album/1132644'));
                ?>
            }
            
        </script>
    </head>
    <body onload="ZZZYield.init(data,deezer,usr_id)">
        <!-- Header -->
            <div id="header">
                <img src="images/zzzyield2.png" style="margin-top:8px;width:100px"/>
                <h1>Sleep = Productivity</h1>
                <p>Increase the productivity, health and happiness of Your employees.
                <br />
                No more unproductive working hours after a busy night!</p>
            </div>

        <!-- Main -->
            <div id="main">
                <a name="graph"></a>
                <header class="major container 75%">
                    <h2>Is Your employee optimally productive?
                    <br />
                    We can help!</h2>
                     <canvas id="graph_container"></canvas>
                    <!--
                    <p>Tellus erat mauris ipsum fermentum<br />
                    etiam vivamus nunc nibh morbi.</p>
                    -->
                    <ul>
                    <li><a href = "index.php?employee=1#graph" <?php echo($empl==1?"style='background-color:#544d55;padding:10px;'":"") ?>>Employee: Richards</a></li>
                    <li><a href = "index.php?employee=2#graph" <?php echo($empl==2?"style='background-color:#544d55;padding:10px;'":"") ?>>Employee: Krisjanis</a></li>
                    <li><a href = "index.php?employee=10#graph" <?php echo($empl<1?"style='background-color:#544d55;padding:10px;'":"") ?>>Employee: Test employee</a></li>
                    </ul>
                    <span>Demo sleep states:<a href = "index.php?state=10#graph">S1</a> <a href = "index.php?state=1#graph">S2</a> <a href = "index.php?state=2#graph">S3</a> <a href = "index.php?state=3#graph">S4</a> <a href = "index.php?state=4#graph">S5</a></span>

                    <br/><span>Demo activity states:<a href = "index.php?state=5#graph">A1</a> <a href = "index.php?state=6#graph">A2</a> <a href = "index.php?state=7#graph">A3</a></span>
                </header>

                <div class="box alt container">
                    <section class="feature left">
                        <a href="#" class="image icon fa-signal"><img src="images/pic01.png" alt="" /></a>
                        <div class="content">
                            <h3>First - measure</h3>
                            <p>To detect the current state of the employees, <img src="images/zzzyield2.png" alt="zzzyield" style="width:30px;"/> relies on precise measurements of sleep patterns, activity levels and overall ability to work productively provided by <a href="https://ouraring.com/">ŌURA ring</a>.</p>
                        </div>
                    </section>
                    <section class="feature right">
                        <a href="#" class="image icon fa-code"><img src="images/pic02.png" alt="" /></a>
                        <div class="content">
                            <h3>Motivating environment</h3>
                            <p>It is often hard to go to sleep after a stressful day. Our solution integrates with the environment both at home and workplace to provide a regulating environment to relax You when You should sleep and to energize You when You should be working. This includes integration with smart lighting provided by <a href="https://casambi.com">Casambi</a> and adaptive background music selected from <a href="https://www.deezer.com">Deezer</a>.</p>
                        </div>
                    </section>
                    <section class="feature left">
                        <a href="#" class="image icon fa-mobile"><img src="images/pic03.png" alt="" /></a>
                        <div class="content">
                            <h3>Regulating productivity</h3>
                            <p>If You are feeling fresh in the morning - great! If not - Your smart <a href="http://www.pauligshop.fi/fi_fi/paulig-muki">Paulig Muki</a> coffe mug will tell You how much coffee and excercise You need. If You require more sleep, then the workplace lights will dim, music will soothe You, and You will sip Your coffee and slip into a rejuvinating powernap. Everyone knows what a boost to productivity that is!</p>
                        </div>
                    </section>
                    <section class="feature right">
                        <a href="#" class="image icon"><img id="deezer_img" src="http://cdn-images.deezer.com/images/cover/d3854b9f5ff937b6da18f3c485485681/250x250-000000-80-0-0.jpg" alt="" /></a>
                        <div class="content">
                            <h3>Deezer integration</h3>
                            <p>The seected user's favourite album info from Deezer. Also a playlist and now playing feature is in the works to provide the user the songs best used for waking up/work/going to sleep.</p>
                            <p id="deezer_p"></p>
                        </div>
                    </section>                    
                </div>

                <!--
                <div class="box container">
                    <header>
                        <h2>A lot of generic stuff</h2>
                    </header>
                    <section>
                        <header>
                            <h3>Paragraph</h3>
                            <p>This is the subtitle for this particular heading</p>
                        </header>
                        <p>Phasellus nisl nisl, varius id <sup>porttitor sed pellentesque</sup> ac orci. Pellentesque
                        habitant <strong>strong</strong> tristique <b>bold</b> et netus <i>italic</i> malesuada <em>emphasized</em> ac turpis egestas. Morbi
                        leo suscipit ut. Praesent <sub>id turpis vitae</sub> turpis pretium ultricies. Vestibulum sit
                        amet risus elit.</p>
                    </section>
                    <section>
                        <header>
                            <h3>Blockquote</h3>
                        </header>
                        <blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget.
                        tempus euismod. Vestibulum ante ipsum primis in faucibus.</blockquote>
                    </section>
                    <section>
                        <header>
                            <h3>Divider</h3>
                        </header>
                        <p>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra
                        ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel. Praesent nec orci
                        facilisis leo magna. Cras sit amet urna eros, id egestas urna. Quisque aliquam
                        tempus euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia.</p>
                        <hr />
                        <p>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra
                        ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel. Praesent nec orci
                        facilisis leo magna. Cras sit amet urna eros, id egestas urna. Quisque aliquam
                        tempus euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia.</p>
                    </section>
                    <section>
                        <header>
                            <h3>Unordered List</h3>
                        </header>
                        <ul class="default">
                            <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                            <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                            <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                            <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                        </ul>
                    </section>
                    <section>
                        <header>
                            <h3>Ordered List</h3>
                        </header>
                        <ol class="default">
                            <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                            <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                            <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                            <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                        </ol>
                    </section>
                    <section>
                        <header>
                            <h3>Table</h3>
                        </header>
                        <div class="table-wrapper">
                            <table class="default">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>45815</td>
                                        <td>Something</td>
                                        <td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
                                        <td>29.99</td>
                                    </tr>
                                    <tr>
                                        <td>24524</td>
                                        <td>Nothing</td>
                                        <td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
                                        <td>19.99</td>
                                    </tr>
                                    <tr>
                                        <td>45815</td>
                                        <td>Something</td>
                                        <td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
                                        <td>29.99</td>
                                    </tr>
                                    <tr>
                                        <td>24524</td>
                                        <td>Nothing</td>
                                        <td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
                                        <td>19.99</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td>100.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </section>
                    <section>
                        <header>
                            <h3>Form</h3>
                        </header>
                        <form method="post" action="#">
                            <div class="row">
                                <div class="6u 12u(mobilep)">
                                    <label for="name">Name</label>
                                    <input class="text" type="text" name="name" id="name" value="" placeholder="John Doe" />
                                </div>
                                <div class="6u 12u(mobilep)">
                                    <label for="email">Email</label>
                                    <input class="text" type="text" name="email" id="email" value="" placeholder="johndoe@domain.tld" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="12u">
                                    <label for="subject">Subject</label>
                                    <input class="text" type="text" name="subject" id="subject" value="" placeholder="Enter your subject" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="12u">
                                    <label for="subject">Message</label>
                                    <textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="12u">
                                    <ul class="actions">
                                        <li><input type="submit" value="Send" /></li>
                                        <li><input type="reset" value="Reset" class="alt" /></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
                -->

                <footer class="major container 75%">
                    <h3>Make Your employees sleep!</h3>
                    <p>The <img src="images/zzzyield2.png" style="width:40px"/> service tracks the sleep, activity and resulting productivity of Your employees. The smart enviroment will track them and adapt to their needs. Wake them up when needed, and put them to sleep if productivity suffers. Even their coffe consumption will be regulated for the most productive, healthy and envigorating experience.</p>
                    <p>
                    </p>
                    <ul class="actions">
                        <li><a href="#contact" class="button">Organize a Free demonstration!</a></li>
                    </ul>
                </footer>

            </div>

        <!-- Footer -->
            <div id="footer">
                <div class="container 75%">
                    <a name="contact"/>
                    <header class="major last">
                        <h2>Contact us:</h2>
                    </header>

                    <p>If You have any questions or want to organize a free demonstration of our technology please fill in the form below.</p>

                    <form method="post" action="#">
                        <div class="row">
                            <div class="6u 12u(mobilep)">
                                <input type="text" name="name" placeholder="Name" />
                            </div>
                            <div class="6u 12u(mobilep)">
                                <input type="email" name="email" placeholder="Email" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="12u">
                                <textarea name="message" placeholder="Message" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="12u">
                                <ul class="actions">
                                    <li><input type="submit" value="Send Message" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>

 git                    <ul class="copyright">
                        <li>&copy; <img src="images/zzzyield2.png" style="width:40px;"/>. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                    </ul>

                </div>
            </div>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
            <script src="assets/js/main.js"></script>
            

    </body>
</html>