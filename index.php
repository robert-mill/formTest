<?php include_once 'sectionIncs/mainHead.php';?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<main role="main">

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Welcome to a world of possibilities</h1>
            <p>This is a simple servey no real purpose other than casual interest</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">

            <div class="col-lg-6  col-md-12">
                <table class="sortable table table-striped">
                    <thead>
                    <tr><th>First name</th><th>Last name</th><th>Gender</th><th>Age</th><th>Height</th></tr>
                    </thead>
                    <tbody id="tbody">
                    <?php

                    $data = new Boot();

                    foreach ($data->get() as $u) {
                        echo "<tr><td>" . $u['firstName'] . "</td><td>". $u['lastname']. "</td><td><img src='/includes/images/".$u['gender'].".png' /></td><td>".$u['age']."</td><td>".$u['height']."</td></tr>";
                    };


                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="chart-select active col-6" id="bar-chart"><img src="includes/images/bar.png"/></div><div class="chart-select col-6" id="pie-chart"><img src="includes/images/pie.png"/></div>
                <div class="charts active">
                    <h4>Bar chart</h4>
                    <div id="chart_div"></div>
                </div>
                <div class="charts">
                    <h4>Pie Chart</h4>
                    <div id="piechart_div"></div>
                </div>
                <div class="chart-select-content active col-6" id="age"><img src="includes/images/age.png"/></div><div class="chart-select-content col-6" id="height"><img src="includes/images/height.png"/></div>
            </div>


        </div>
        <div class="row">
            <div class="col"><div id="errormsg"></div></div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <p class="h4 text-center py-4">Simple servey</p>
                            <div class="md-form">
                                <i class="fa fa-user prefix grey-text"></i><label for="inputFirstName" class="font-weight-light">Your first name</label>
                                <input type="text" id="inputFirstName" name="inputFirstName" class="form-control">

                            </div>
                            <div class="md-form">
                                <i class="fa fa-user prefix grey-text"></i><label for="inputLastName" class="font-weight-light">Your last name</label>
                                <input type="text" id="inputLastName" name="inputLastName" class="form-control">

                            </div>
                            <div class="md-form">
                                <i class="fa fa-envelope prefix grey-text"></i><label for="inputEmail" class="font-weight-light">Your email</label>
                                <input type="email" id="inputEmail" name="inputEmail" class="form-control">

                            </div>
                            <div class="md-form">
                                <br><br>
                            </div>
                            <div class="md-form">
                                <label class="mr-3">
                                    <input type="radio" class="mr-1" name="gender" value="male" /> Male
                                </label>
                                <label class="mr-3">
                                    <input type="radio" class="mr-1" name="gender" value="female" /> Female
                               </label>
                            </div>
                            <div class="md-form">
                                <i class="fa fa-envelope prefix grey-text"></i><label for="selectage" class="font-weight-light">Age</label>
                                <select name="selectage" id="selectage">
                                </select> years &nbsp;&nbsp;
                                <i class="fa fa-envelope prefix grey-text"></i><label for="selectheight" class="font-weight-light">Height</label>
                                <select name="selectheight" id="selectheight">
                                </select> cm

                            </div>
                            <div class="md-form">
                                <br>
                            </div>
                            <div class="md-form">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                                                                    <!--                <div class="innerContainer">-->
<!--                    <form class="form-inline">-->
<!--                        <div class="col form-group mr-2">-->
<!--                            <label for="inputFirstName">First name</label>-->
<!--                            <input type="text" name="inputFirstName" class="form-control" id="inputFirstName" placeholder="First Name" required>-->
<!---->
<!--                            <label  for="inputLastName">Last name</label>-->
<!--                            <input type="text" name="inputLastName" class="form-control" id="inputPassword" placeholder="inputLastName" required>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col form-group mr-2">-->
<!--                            <label for="inputEmail">Email</label>-->
<!--                            <input type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="Email" required>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col form-group mr-2">-->
<!--                            <label class="mr-3">-->
<!--                                <input type="radio" class="mr-1" name="gender" value="male" /> Male-->
<!--                            </label>-->
<!--                            <label class="mr-3">-->
<!--                                <input type="radio" class="mr-1" name="gender" value="female" /> Female-->
<!--                            </label>-->
<!--                        </div>-->
<!--                        <div class="col-12">-->
<!--                            <div class="form-group">-->
<!--                                <label class="mr-3">Age-->
<!--                                    <select name="selectage" id="selectage">-->
<!---->
<!--                                    </select>-->
<!--                                </label>-->
<!---->
<!--                                <label class="mr-3">Height-->
<!--                                    <select name="selectheight" id="selectheight">-->
<!---->
<!--                                    </select>cm-->
<!--                                </label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-12">-->
<!--                            <div class="form-group">-->
<!--                                <button type="submit" class="btn btn-primary">Save</button>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </form>-->
<!---->
<!--                </div>-->
            </div>
        </div>

        <hr>

    </div> <!-- /container -->

</main>

<footer class="container">
    <p>&copy; Company 2017-2018</p>
</footer>

<?php include_once 'sectionIncs/mainFooter.php';?>
