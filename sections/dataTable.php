<div class="row">
<table class="sortable table table-striped">
    <thead>
        <tr><th>First name</th><th>Last name</th><th>Gender</th><th>Age</th></tr>
    </thead>
    <tbody>
<?php

   $data = new Boot();

        foreach ($data->get() as $u) {
            echo "<tr><td>" . $u['firstName'] . "</td><td>". $u['lastName']. "</td><td><img src='/includes/images/".$u['gender'].".png' /></td><td>".$u['age']."</td></tr>";
        };


?>
    </tbody>
</table>
</div>
