<!-- admin/views/list_flights.php -->

<h2>Gestion des vols</h2>

<table>
    <th>
        <td>ID</td>
        <td>Company Name</td>
        <td>Departure date & time</td>
        <td>Arrival date & time</td>
        <td>Departure airport</td>
        <td>Arrival airport</td>
        <td>Rates</td>
        <td></td>
        <td></td>
    </th>
    <?php foreach ($result as $flight) { ?>
    <tr>
        <td><?php echo $flight['id']?></td>
        <td><?php echo $flight['company_name']?></td>
        <td><?php echo $flight['departure_datetime']?></td>
        <td><?php echo $flight['arrival_datetime']?></td>
        <td><?php echo $flight['departure_airport']?></td>
        <td><?php echo $flight['arrival_airport']?></td>
        <td><?php echo $flight['rates']?></td>
        <td><a href="./?action=edit_flights&id=<?php echo $flight['id']?>">Edit</a></td>
        <td><a href="./?action=delete_flights&id=<?php echo $flight['id']?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>

<a href="./?action=add_flights">Ajouter 1 vol</a>