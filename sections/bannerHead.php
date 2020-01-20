<section id="bannerhead-001">
    <div class="container">

        <div class="row parascroll"><div class="col-6" id="stage" style="background: rgba(0,0,0,0.5);">

                <p id="spinner" style="background: rgba(0,0,0,0.5); text-align: center; color: #fff;"><img src="/includes/images/symbol2.png" ></p>
            </div>
        </div>
        <div class="row"><div class="col-6" id="chart_div"></div> <div class="col-6" id="piechart_div" style="width: 900px; height: 500px;"></div></div>
        <?php include_once 'dataTable.php';?>
        <div class="row formBlock">
            <div class="col-3 img-section">
                <img src="/includes/images/andrewslogo_white.png" alt="Body ark pro" />
            </div>
            <div class="col">
                <div class="innerContainer">
                    <form class="form-inline">
                        <div class="form-group mr-2">
                            <label for="inputFirstName">First name</label>
                            <input type="text" name="inputFirstName" class="form-control" id="inputFirstName" placeholder="First Name" required>

                            <label  for="inputLastName">Last name</label>
                            <input type="text" name="inputLastName" class="form-control" id="inputPassword" placeholder="inputLastName" required>
                        </div>

                        <div class="form-group mr-2">
                            <label for="inputEmail">Email</label>
                            <input type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="Email" required>
                        </div>

                        <div class="form-group mr-2">
                            <label class="mr-3">
                                <input type="radio" class="mr-1" name="gender" value="male" /> Male
                            </label>
                            <label class="mr-3">
                                <input type="radio" class="mr-1" name="gender" value="female" /> Female
                            </label>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="mr-3">Age
                                    <select name="selectage" id="selectage">

                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
        <div class="col"><div id="validation"></div></div>
    </div>
</section>
<?php include_once 'mainBody.php';?>
