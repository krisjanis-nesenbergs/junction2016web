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
            $empl = 0;
            $token = "OLF43KDW6KIJZQUIQYR6H3YL3L6WF5QB";
            if(isset($_GET['employee']) && !empty($_GET['employee'])){
                $empl = intval($_GET['employee']);
            }
            switch($empl){
                case 1:
                    $token = "C6Q7SYJDDCTQW4DZ2OC6CKWFMIU3LQ7V";
                    break;
                case 2:
                    $token = "CT7NQBYLSVVUQ5N4NJ4CVVY7Q22DB7OB";
                    break;
            }
        ?>
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
            
        </script>
    </head>
    <body onload="ZZZYield.init(data)">
        <!-- Header -->
            <div id="header">
                <span class="logo icon fa-paper-plane-o"><img src="test.jpg" /></span>
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
                    <li><a href = "index.php?employee=1#graph" <?php ($empl==1?"style='color=red'":"") ?>>Employee: Richards</a></li>
                    <li><a href = "index.php?employee=2#graph" <?php ($empl==2?"style='color=red'":"") ?>>Employee: Krisjanis</a></li>
                    <li><a href = "index.php?employee=0#graph" <?php ($empl==0?"style='color=red'":"") ?>>Employee: Test employee</a></li>
                    </ul>
                </header>

                <div class="box alt container">
                    <section class="feature left">
                        <a href="#" class="image icon fa-signal"><img src="images/pic01.jpg" alt="" /></a>
                        <div class="content">
                            <h3>The First Thing</h3>
                            <p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus eget. Nunc nibh morbi quis fusce lacus.</p>
                        </div>
                    </section>
                    <section class="feature right">
                        <a href="#" class="image icon fa-code"><img src="images/pic02.jpg" alt="" /></a>
                        <div class="content">
                            <h3>The Second Thing</h3>
                            <p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus eget. Nunc nibh morbi quis fusce lacus.</p>
                        </div>
                    </section>
                    <section class="feature left">
                        <a href="#" class="image icon fa-mobile"><img src="images/pic03.jpg" alt="" /></a>
                        <div class="content">
                            <h3>The Third Thing</h3>
                            <p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus eget. Nunc nibh morbi quis fusce lacus.</p>
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
                    <h3>Get shady with science</h3>
                    <p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus.</p>
                    <p>
                    </p>
                    <ul class="actions">
                        <li><a href="#" class="button" onclick="DemoData();">Get data</a></li>
                    </ul>
                </footer>

            </div>

        <!-- Footer -->
            <div id="footer">
                <div class="container 75%">

                    <header class="major last">
                        <h2>Questions or comments?</h2>
                    </header>

                    <p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor
                    orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus.</p>

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

                    <ul class="icons">
                        <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                        <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
                        <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
                    </ul>

                    <ul class="copyright">
                        <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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